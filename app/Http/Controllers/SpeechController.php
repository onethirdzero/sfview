<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Google\Cloud\Speech\SpeechClient;
use Illuminate\Http\Request;
use Debugbar;
use FFMpeg;


class SpeechController extends Controller
{
    public function create(Request $request)
    {
        # Instantiates a client.
        # https://github.com/googleapis/google-cloud-php/blob/master/AUTHENTICATION.md#client-authentication
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
        file_put_contents(storage_path('app/track.webm'), $decodedAudio);

        # Convert from WebM audio format to WAV.
        FFMpeg::fromDisk('local')
            ->open('track.webm')
            ->export()
            ->inFormat(new \FFMpeg\Format\Audio\Wav)
            ->save('track.wav');

        # Recognize speech in the audio file.
        $results = $speech->recognize(
            fopen(storage_path('app/track.wav'), 'r')
        );

        # Deletes the file.
        unlink(storage_path('app/track.wav'));

        Debugbar::info($results);

        foreach ($results as $result) {
            return 'Transcription: ' . $result->alternatives()[0]['transcript'] . PHP_EOL;
        }
    }
}

