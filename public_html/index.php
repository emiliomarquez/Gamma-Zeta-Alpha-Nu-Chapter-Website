<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Gamma Zeta Alpha: Chapters</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="http://gammazetaalpha.ucsd.edu/css/bootstrap.min.css">

<link rel="stylesheet" href="http://gammazetaalpha.ucsd.edu/css/main.css">
<link rel="stylesheet" href="http://gammazetaalpha.ucsd.edu/css/bootstrap-theme.min.css">
<script src="http://gammazetaalpha.ucsd.edu/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="http://gammazetaalpha.ucsd.edu/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
<script src="http://gammazetaalpha.ucsd.edu/js/vendor/bootstrap.min.js"></script>
<script src="http://gammazetaalpha.ucsd.edu/js/js/main.js"></script>
<script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
</head>
<body>
<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]--> 
<!-- Include this following line in all files to load main Navigation --> 
<script src="http://gammazetaalpha.ucsd.edu/js/mainNavigation.js"></script> 
<!-- Include the line on top to load main Navigation -- > 

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
<div class="container">
  <?php

    // Include the UberGallery class
    include('resources/UberGallery.php');

    // Initialize the UberGallery object
    $gallery = new UberGallery();

    // Initialize the gallery array
    $galleryArray = $gallery->readImageDirectory('gallery-images');
    
    // Define theme path
    if (!defined('THEMEPATH')) {
        define('THEMEPATH', $gallery->getThemePath());
    }

    // Set path to theme index
    $themeIndex = $gallery->getThemePath(true) . '/index.php';

    // Initialize the theme
    if (file_exists($themeIndex)) {
        include($themeIndex);
    } else {
        die('ERROR: Failed to initialize theme');
    }
?>
</div>
</div>
<footer>
  <div style="float: right;">
    <iframe  src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FGamma-Zeta-Alpha-UC-San-Diego%2F320563148794&amp;width&amp;height=75&amp;colorscheme=light&amp;show_faces=false&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:75px;" allowTransparency="true"></iframe>
  </div>
  <p style="min-width: 150px;">&copy; Gamma Zeta Alpha Fraternity Inc. Nu Chapter</p>
</footer>
</body>
</html>
