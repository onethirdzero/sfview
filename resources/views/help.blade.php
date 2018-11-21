{{-- https://laravel.com/docs/5.7/blade#extending-a-layout --}}
@extends('shared.layout')

{{-- Fill in our title. --}}
@section('title', 'Index')

{{-- Include scripts that we need. --}}
@section('scripts')
    @include('scripts')
@endsection

{{-- Fill in our content. --}}
@section('content')

    <html>
    <head>
        <link rel="stylesheet" href="./css/app.css">
    </head>

    <body>
    <div style="margin:30px">
        <div id="title"><h1>Help Page</h1></div>

        <h3>How do I use this app?</h3>
        <p>From the main page (you can click SFView at the top left of the page to get there) you can press space or tap
        your device and then speak a location. If that location is in our database it will load up prompty as a photosphere,
        You can scroll and look around in the photosphere, zoom, and click on info markers that pop up to gain information
        on different areas.</p>

        <p>In summary:</p>
        <ol style="margin-left:30px">
            <li>Go to the main page (click SFView)</li>
            <li>press space or tap device</li>
            <li>speak a location you want to see</li>
            <li>look around and click info markers</li>
        </ol>

        <h3>Nothing happens when I talk!</h3>
        <p>Make sure you have a mic plugged in.</p>
        <p>Maybe your mic is not enabled? In chrome this link should help: <a href="https://support.google.com/chrome/answer/2693767?hl=en">Enable mic in chrome</a></p>
        <p>On other browsers google is your friend: <a href="https://www.google.com/search?q=enabling+mic+in+browser&oq=enabling+mic+in+browser">Google search</a></p>

        <p>Good luck! I hope you can get it working!</p>

        <h3>Why should I log in?</h3>
        <p>You can use the application without logging in. If you want to upload your own photosphere, or sign up for any
        email blasts, then you might want to make an account.</p>

        <h3>The location I wanted to view doesn't exist</h3>
        <p>You can always add it yourself! :)</p>

        <h3>I want to post a new photosphere</h3>
        <p>In the navigation menu (top of your browser) select Upload to get started.</p>
        <p>To take the photo, I recommend using Google StreetView app with any device.</p>

        <h3>Other concerns/questions</h3>
        <p>Feel free to contact <a href="mailto:cbabnik@sfu.ca">cbabnik@sfu.ca</a></p>

    </div>

    </body>

    </html>
@endsection
