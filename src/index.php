<!doctype html>
<html class="no-js" lang="en" style="width: 100%; height: 100%;">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>SFView</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <link rel="icon" href="favicon.ico">
  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/vendor/photo-sphere-viewer.css">
  <link rel="stylesheet" href="css/vendor/bootstrap.css">

  <script type="text/javascript" src="js/vendor/uevent.js"></script>
  <script type="text/javascript" src="js/vendor/three.js"></script>
  <script type="text/javascript" src="js/vendor/doT.js"></script>
  <script type="text/javascript" src="js/vendor/D.js"></script>
  <script type="text/javascript" src="js/vendor/photo-sphere-viewer.js"></script>
  <script type="text/javascript" src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script type="text/javascript" src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script type="text/javascript" src="js/plugins.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
      window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
      ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
      </script>
  <script type="text/javascript" src="https://www.google-analytics.com/analytics.js" async defer></script>
</head>

<?php include("php/nav-bar.php") ?>

<body style="width: 100%; height: 100%;">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<div class="panorama" id="pan1" style="width: 100%; height: 90%;"></div>
<script>
// Quick example of panorama and marker logic
var pan = setPanorama("pan1", "img/wideview.jpg", "SFU Burnaby Campus")
var info = "<b>Welcome to SFView!</b> <br> To explore the SFU Burnaby Campus, press space!"
addMarkerToPan2(pan, 1, info)
</script>

<div id="voice-input-triggerable">
  <button id="voice-input-button">Speak a new location!</button>
  <br>
  <p>Alternatively, press 'Space' and then start speaking.<p>
  <p>Otherwise, tap/click here and then start speaking.</p>
  <p id="voice-input-result"><em>...diagnostic messages</em></p>
</div>

<script type="text/javascript" src="js/voice.js"></script>

</body>

</html>
