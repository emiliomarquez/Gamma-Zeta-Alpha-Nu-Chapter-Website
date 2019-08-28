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
<title>Gamma Zeta Alpha: Gallery</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="http://gammazetaalpha.ucsd.edu/css/bootstrap.min.css">
<link rel="stylesheet" href="http://gammazetaalpha.ucsd.edu/css/main.css">
<link rel="stylesheet" href="http://gammazetaalpha.ucsd.edu/css/bootstrap-theme.min.css">
<script src="http://gammazetaalpha.ucsd.edu/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="http://gammazetaalpha.ucsd.edu/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
<script src="http://gammazetaalpha.ucsd.edu/js/vendor/bootstrap.min.js"></script>
<script src="http://gammazetaalpha.ucsd.edu/js/main.js"></script>
<script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
<style type="text/css" >
.galleryPreview {
	display: inline-table;
	margin: 5px;
	font-size: 15px;
	text-align: center;
	font-weight: bold;
	border: 1px solid rgba(0, 0, 0, 0.66);
}
	#active {
		background-color: rgba(0,0,0,.8) !important;
		position: fixed !important;
		height: 100% !important;
		width: 100% !important;
		left: 0px !important;
		top: 20px !important;
		text-align: center !important;
		display: flex !important;
	}
	
	#active .centered-data {
		max-width: 600px;
		margin: auto;
		width: auto;
    }
	#active .exit p {
		width: 24px;
		height: 24px;
		font-size: 20px;
		background-color: hsla(0, 100%, 50%, 0.77);
		font-weight: bolder;
		color: #FFF;
		text-align: center;
		margin: 0px;
		float: right;
		padding: 0px;
    }
#active .exit {
	width: 100%;
	text-align: right;
	display: block;
	height: 25px;
	background-color: black;
}
	.albumList, .previewContainer{
		background-color: white;
		border-radius: 5px;
		width: 100%;
		display:none;
	}
	.albumList p{
		padding: 0px 50px;
	}
	.centered-data{
		background-color: white;
		text-align: center;
	}
	table {
		width: 100%;
	}
	table p {
    padding: 0px;
    margin: 0px;
    font-weight: bold;
	text-align: right;
    }
	table tr td:first-child p{
		text-align:left !important;
	}
	img.photothumb {
    margin: 5px;
    border: solid 1px;
    }
	img#mainImage {
    width: auto;
    max-width: 400px;
    height: auto;
    max-height: 350px;
}

</style>

<script type="text/javascript" >
	function activateChild(ev){
		var active = document.getElementById("active");
		
		if(active != null)
			return;
		else{	
			var new_active = ev.getElementsByClassName("albumList")[0];
			if(new_active != null )	new_active.id = "active";
		}
	}
	
	function exit(){
		var ev = document.getElementById("active");
		ev.id="";
	}
	function showcaseImage(image){
		var main = document.getElementById('mainImage');
		var container = document.getElementsByClassName('previewContainer')[0];
		var src = image.getAttribute('src');
		
		main.src = src.replace('_s.jpg', '.jpg');
		main.title = image.id;
		container.id = "active";
	}
	
	function nextImage(){
		var main_image = document.getElementById('mainImage').title;
		var current_image = document.getElementById(main_image);
		var next_image = current_image.nextSibling;
		if(next_image == null)
			next_image = document.getElementsByClassName("photothumb")[0];
		
		showcaseImage(next_image);
	}
	
	function prevImage(){
		var main_image = document.getElementById('mainImage').title;
		var current_image = document.getElementById(main_image);
		var next_image = current_image.previousSibling;
		if(next_image == null){
			photos = document.getElementsByClassName("photothumb");
			next_image = photos[photos.length-1];
		}
		showcaseImage(next_image);
	}
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
    <h1 style="text-align:center;">Triton Gammas Gallery</h1>
    <?php
	
	$id = $_GET["id"];
	$album_flag = $_GET["isAlbum"];
	$isAlbum = false;
	$curl_url = "";
	$omitFirst = false;
	if($album_flag == "1")
		$isAlbum = true;
		
	if($id != "" || $id != NULL)
		$omitFirst = true;
	
	
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	
	if($isAlbum and $id != NULL and $id != ""){
		$curl_url = "https://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key=d860142542b321579799aa356ebf8dbd&photoset_id={$id}&user_id=138484761%40N06&extras=url_sq%2C+url_m&format=json&nojsoncallback=1";
	}else{
		$curl_url ="https://api.flickr.com/services/rest/?method=flickr.collections.getTree&api_key=d860142542b321579799aa356ebf8dbd&user_id=138484761%40N06&format=json&nojsoncallback=1";
		if( $id != NULL and $id != "" )
			$curl_url = $curl_url . "&collection_id={$id}";
		
	}
	curl_setopt($curl,CURLOPT_URL,$curl_url );
	$resp = curl_exec($curl);
	curl_close($curl);
	$data_j = json_decode($resp, true);
	
	if($isAlbum)
		DisplayPhotoSets($data_j['photoset']);
	else
		DisplayCollections($data_j['collections']['collection'], $omitFirst);
     
	function DisplayCollections($data, $skipfirst){
		foreach($data as $collection){
			if($skipfirst){
				$skipfirst = false;
				continue;
			}
			$albumset = $collection['set'];
			if($albumset != NULL){
				echo "<div class='galleryPreview' title='{$collection['title']}' id='{$col['id']}' ><img onclick='activateChild(this.parentElement)' src='{$collection['iconlarge']}' /><p>{$collection['title']}</p>";
				echo "<div class='albumList' ><div class='centered-data'><div class='exit' onclick='exit()'><p>X</p></div>";
				foreach($albumset as $album){
					echo "<a href='./?id={$album['id']}&isAlbum=1'><p>{$album['title']}</p></a>";
				}
				echo "</div></div></div>";
			}else{
				echo "<a href='./?id={$collection['id']}&isAlbum=0' >
				<div class='galleryPreview' title='{$collection['title']}' id='{$col['id']}'>
				<img src='{$collection['iconlarge']}' /><p>{$collection['title']}</p>
				</div></a>";
			}
		
		}	
	}
	
	function DisplayPhotoSets($data){
		echo "<h2>{$data['title']}</h2>";
		echo "<div class='previewContainer'><div class='centered-data' ><div class='exit' onclick='exit()'><p>X</p></div><img  id='mainImage' src='' /><table><tr><td><p onclick='prevImage();'>Prev</p></td><td><p onclick='nextImage();'>Next</p></td></tr></table></div></div>";
		echo "<div id='photos' >";
		foreach($data['photo'] as $photo){
			
			echo "<img class='photothumb' onclick='showcaseImage(this);' id='{$photo['id']}' src='{$photo['url_sq']}'/>";
		}	
		echo "</div>";
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
