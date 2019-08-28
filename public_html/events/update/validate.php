<!DOCTYPE html>
<html>

<body>
<h1>Events</h1>

<?php
function isExpired($ev){
	$st = $ev['date'];
	sscanf($ev['date'],"%d-%d-%d", $y1, $m1, $d1  );
	sscanf(date("Y-m-d"),"%d-%d-%d", $y2, $m2, $d2  );
	echo $y1, $m1, $d1," compared to ",$y2 ,$m2 ,$d2, "\n";
		
		
	if($y1 < $y2)
		return 0;
	else if($y1 == $y2)
		if( $m1 < $m2 )
			return 0;
		else if ($m1 == $m2)
			if( $d1 < $d2 )
				return 0; 
	
	
	return 1;
		
}
if( $_POST == 0 ){
	echo "Nothing to see here";
	return;
}

if( strcmp($_POST["pwc"], "TuSabes87Nu2004") ){
	echo "Incorrect password, please try again";
	return;
}
$xml=simplexml_load_file("./../events.xml");


foreach($xml->event as $ev)
	if( strcmp( $ev['valid'] , "1" ) == 0 ){
		$ev['valid'] = isExpired($ev);
	}

$event = $xml->addChild("event");
if( $_POST['imgDesc'] != "")
	$event->addChild("img", $_POST['imgDesc']);
$event->addChild("location", $_POST['loc']);	


$event->addAttribute("date",$_POST['eventDate']);
$event->addAttribute("startTime", $_POST['eventBTime']);
$event->addAttribute("valid", "1");
if( $_POST['eventETime'] != "")
	$event->addAttribute("endTime", $_POST['eventETime']);


$event->addChild("name", $_POST["eventName"] );
$event->addChild("type", $_POST['type'] ." Event" );
if( trim($_POST['with']) != "")
	$event->addChild("collaboration", $_POST['with']);
$event->addChild("description", $_POST['description']);

$xml->asXML('./../events.xml');

echo "Your event has been posted, you can check the <a href='./../' >Event Page</a>  to see your result";

?>

</body>
</html>