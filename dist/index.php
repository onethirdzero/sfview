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

  <script src="js/vendor/uevent.js"></script>
  <script src="js/vendor/three.js"></script>
  <script src="js/vendor/doT.js"></script>
  <script src="js/vendor/D.js"></script>
  <script src="js/vendor/photo-sphere-viewer.js"></script>
  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script> <!--Photosphere logic should go inside here...-->
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
      window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
      ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</head>

<?php include("php/nav-bar.php") ?>

<body style="width: 100%; height: 100%;">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<div class="panorama" id="pan1" style="width: 100%; height: 100%;"></div>

<!-- Photosphere Logic: This should be moved to an external js file..
Currently experiencing problems with linking to Photo Sphere Viewer, 
so we're putting this here for now (see main.js )-->
<script type="text/javascript">
  function setPanorama2(div_id, url){
    let div = document.getElementById(div_id);
    let params = {
      container: div,
      panorama: url,
    };

    return new PhotoSphereViewer(params);
  }
</script>
<script> setPanorama2("pan1", "img/stock_nature.jpg") </script> 

</body>

</html>
