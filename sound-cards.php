<?php
require_once("includes/conn.php");
if($_GET['p']){
  $cardP = mysqli_real_escape_string($link,$_GET['p']);
}else{
	printf("Didn't receive a valid postcard");
}
$cardQuery = "SELECT *, cards.name AS cardName FROM cards WHERE cards.name = '".$cardP."' LIMIT 1";
$card = mysqli_query($link,$cardQuery);
$rcsCard = mysqli_fetch_array($card);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<title><?=ucfirst($rcsCard["name"])?> - Sound cards | Sounds of the World</title>
<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
<meta name="description" content="<?=$rcsCard["description"]?>">
<meta name="keywords" content="<?=$rcsCard["tags"]?>">
<meta name="author" content="b1tdreamer">
<link rel="apple-touch-icon" sizes="180x180" href="/img/180icon.png">
<link rel="manifest" href="/img/192icon.png">
<link rel="icon" href="/img/64icon.png">
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.css' rel='stylesheet' />
<link href='/css/sotw.css' rel='stylesheet' />
</head>
<body>
	<div class="logo">
		<a href="https://SoundsOfTheWorld.org" title="Sounds Of the World">
      <img src="/img/SoundsOfTheWorld-title.png" alt="Sounds of the World title"/>
  		<img class="logoCircle" src="/img/SoundsOfTheWorld_circle.png" alt="Sounds of the World circle"/>
		</a>
	</div>
	<div id='map'></div>
	<div class="sound-card">
    <span class="close">&times;</span>
		<h1><?=ucfirst($rcsCard["title"])?></h1>
		<?
if($rcsCard["video_id"]){
?>
    <div class="videoWrapper" style="--aspect-ratio: 3 / 4;"><iframe class="infoMedia" src="https://www.youtube.com/embed/<?=$rcsCard["video_id"]?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
<? }else{ ?>
    <img class="infoMedia" src="/cards/<?=$rcsCard["name"]?>.jpg" alt="<?=$rcsCard["name"]?>"/>
<? } ?>
		<h3><?=$rcsCard["location"]?> - <?=$rcsCard["date"]?></h3>
		<a href="https://instagram.com/<?=$rcsCard["author"]?>" title="Created by <?=$rcsCard["author"]?>" target="_blank"><h2 class="author">@<?=$rcsCard["author"]?></h2></a>
    <div class="infoCard">
      <p><?=$rcsCard["description"]?></p>
    </div>
    <iframe width="100%" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?=$rcsCard["audio_id"]?>&color=%23f6cf00&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
	</div>
<script>
mapboxgl.accessToken = "pk.eyJ1IjoiYjF0ZHJlYW1lciIsImEiOiJjazNrc2R2ZTkwOXQ3M2pxcWN3NHF2eWg3In0.Q_eYKI5Jv6EJH_5Bc97lFw"
var map = new mapboxgl.Map({
	container: 'map', // container id
	style: 'mapbox://styles/b1tdreamer/ck3othd2m0p9c1cp0qg1uln74', // b1t stylesheet location
	//style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
	center: [10.922027, 19.816733], // starting position [lng, lat]
	zoom: 2.25 // starting zoom
});
</script>
</body>
</html>
