<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Google\Cloud\Speech\SpeechClient;
use Illuminate\Http\Request;
use Debugbar;
use FFMpeg;
use Illuminate\Support\Facades\DB;


class SpeechController extends Controller
{
    public function create(Request $request)
    {
        # Instantiates a client.
        # https://github.com/googleapis/google-cloud-php/blob/master/AUTHENTICATION.md#client-authentication
        // This shouldn't be necessary in prod. Maybe check an env variable?
        $speech = new SpeechClient([
            'languageCode' => 'en-US',
            'keyFile' => json_decode(file_get_contents('../sfview-220601-aa213eb940f9.json'), true),
            'projectId' => 'sfview-220601',
        ]);

        # Decode audio from the request.
        # https://stackoverflow.com/questions/30572374/how-to-convert-base64-string-into-an-audio-mp3-file
        $encodedAudio = $request->input('audio');
        $decodedAudio = base64_decode($encodedAudio);

        # Temporarily save the file locally.
        # https://stackoverflow.com/questions/24748942/php-base64-decode-with-audio
        $trackName = 'track' . date('_Ymd_His');
        file_put_contents(storage_path('app/' . $trackName . '.webm'), $decodedAudio);

        # Convert from WebM audio format to WAV.
        FFMpeg::fromDisk('local')
            ->open($trackName . '.webm')
            ->export()
            ->inFormat(new \FFMpeg\Format\Audio\Wav)
            ->save($trackName . '.wav');

        # Recognize speech in the audio file.
        $results = $speech->recognize(
            fopen(storage_path('app/' . $trackName . '.wav'), 'r')
        );

        # Deletes the file.
        unlink(storage_path('app/' . $trackName . '.wav'));

        Debugbar::info($results);
        if ($results == []) {
            return "Didn't catch that. Try again.";
        }

        $transcript = $results[0]->alternatives()[0]['transcript'];
        $transcript = strtolower($transcript);

        // Use the transcript to query the db for a valid location.
        $pdo = DB::connection('mysql')->getPdo();

        define("DBUSER", "sfview_user");
        define("DBPASS", "pass");

        $sql = "SELECT location FROM locations WHERE location = :location";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":location", $transcript);
        $success = $stmt->execute();

        if ($success) {
            $result = $stmt->fetch();
            return $result['location'];
        } else {
            return "No such location: {$transcript}";
        }

        // return redirect()->route('HomeController@panorama', ['wildcard_filename' => $transcript]);

    }
}

