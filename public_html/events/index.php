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
<title>UCSD Gammas | Events</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="http://gammazetaalpha.ucsd.edu/css/bootstrap.min.css">
<link rel="icon"  href="/favicon.png" >
<style>
body {
	padding-top: 50px;
}
</style>
<link rel="stylesheet" href="http://gammazetaalpha.ucsd.edu/css/main.css">
<link rel="stylesheet" href="http://gammazetaalpha.ucsd.edu/css/bootstrap-theme.min.css">


<script src="http://gammazetaalpha.ucsd.edu/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
<h1>Events</h1>
<p style="font-size: 14px; float: right;"><a href="./past/">View Past Events</a></p>
<div style="clear: both;"></div>
<?php

$xml=simplexml_load_file("./events.xml");


$events = $xml->xpath('/events/event');
function sort_by_date($t1, $t2) {
    if($t1['valid'] == "0")
		return -1;
		
	sscanf($t1['date'],"%d-%d-%d", $y1, $m1, $d1  );
	sscanf($t2['date'],"%d-%d-%d", $y2, $m2, $d2  );
	
	
	if($y1 > $y2)
		return 1;
	else if ($y1 < $y2)
		return -1;
	else{
		if( $m1 > $m2 )
			return 1;
		else if ($m1 < $m2 )
			return  -1;
		else{
			if( $d1 > $d2 )
				return 1;
			else if ($d1 < $d2)
				return -1; 
			else return 0;
		}
	}

	
}

usort($events, 'sort_by_date');



echo "<div class='events'>";
foreach($events as $event ){
	if($event['valid'] == "0")
		continue;
		
	echo "<div class='event' >";
	echo "<img src='". str_replace("%26", "&",$event->img) . "'</img>";
    echo "<h2>" . $event->name . "</h2>";
	
	
	echo "<p>Location: ".$event->location ."<br>Date: " .$event['date'] . " at " . $event['startTime'];
	if($event['endTime'])
		echo " - " . $event['endTime'];
	echo "<br>" . $event->type;
	
	if( property_exists($event, 'collaboration')){
		 echo "<em> with " . $event->collaboration . "</em>";
	}
	echo "</p><p>" . $event->description . "</p>";
	echo "<div style='clear: both;' ></div></div>";
}
echo "</div>";


 
?>

  <!-- /container --> 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> 
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.10.1.min.js"><\/script>')</script> 
    <script src="/js/vendor/bootstrap.min.js"></script> 
    <script src="/js/main.js"></script> 
    <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
		</script> 
  </div>
</div>
<footer>
  <div style="float: right;">
      <iframe  src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FGamma-Zeta-Alpha-UC-San-Diego%2F320563148794&amp;width&amp;height=75&amp;colorscheme=light&amp;show_faces=false&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:75px;" allowTransparency="true"></iframe>

  </div>
      <p>&copy; Gamma Zeta Alpha Fraternity Inc. Nu Chapter</p>
      <div class="clear"></div>
</footer>
</body>
</html>