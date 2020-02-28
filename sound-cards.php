<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<title>Sound cards | Sounds of the World | A sound map of the world #sounds #soundscapes #streetmusic</title>
<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
<meta name="description" content="A map created to share the sonorous wealth of our planet. You will discover different varieties of sounds, from nearby and remote places, sounds of nature, music, soundscapes, etc.">
<meta name="keywords" content="world, map, sounds, soundscapes, music, street musician, nature, birds, animals">
<meta name="author" content="b1tdreamer">
<link rel="apple-touch-icon" sizes="180x180" href="img/180icon.png">
<link rel="manifest" href="img/192icon.png">
<link rel="icon" href="img/64icon.png">
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.css' rel='stylesheet' />
<link href='css/sotw.css' rel='stylesheet' />
</head>
<body>
	<div class="logo"><img src="img/SoundsOfTheWorld.png" alt="Sounds of the World logo"/></div>
	<div id='map'></div>
	<div class="info">
		<img class="infologo" src="img\SoundsOfTheWorld-title.png" alt="Sounds of the World logo"/>
		<p>A map created to share the sonorous wealth of our planet. You will discover different varieties of sounds, from nearby and remote places, sounds of nature, music, soundscapes, etc.</p>
		<img src="img/blueCircle.png" alt="Soundscapes category" class="circle"/>
		<h2>Soundscapes</h2>
		<p>Sounds of urban and rural areas, sounds that transport you to towns and cities of different cultures, languages and lifestyles.</p>
		<img src="img/orangeCircle.png" alt="Street music category" class="circle"/>
		<h2>Street Music</h2>
		<p>Recordings of musicians giving away their art on the streets, parks and squares throughout the world.</p>
		<img src="img/greenCircle.png" alt="Nature sounds category" class="circle"/>
		<h2>Nature Sounds</h2>
		<p>Sounds of nature, of the elements, plants and animals. Sound landscapes without human intervention.</p>
		<img src="img/redCircle.png" alt="Nature sounds category" class="circle"/>
		<h2>People Praying</h2>
		<p>Recordings of different people praying their gods.</p>
		<div class="footer">Project created by <a href="https://b1tdreamer.me" title="b1tdreamer website" target="_blank">b1tdreamer</a> under <a href="https://creativecommons.org" target="_blank" class="copy-left">&copy;</a></div>
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

map.on('click', function(e) {
	// Creates a popup with the information of the point
  var features = map.queryRenderedFeatures(e.point, {
    layers: ['street-music','nature','soundscapes','people-praying'] // replace this with the name of the layer
  });
  if (!features.length) {
    return;
  }
  var feature = features[0];
	var popUpContent = '<h3>' + feature.properties.name + '</h3><p>' + feature.properties.description + '</p>' +	'<iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/' + feature.properties.audio_id + '&color=%23f6b100&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>'
	var tags = feature.properties.tags.split(' ');
	tags.forEach(setTag);
	function setTag(item, index) {
		popUpContent += '<span class="tag">#' + tags[index] + '</span> ';
	}
	var popup = new mapboxgl.Popup({ offset: [0, -15] })
    .setLngLat(feature.geometry.coordinates)
    .setHTML(popUpContent)
		.addTo(map);
});

map.on('mouseenter', 'street-music', function(e) {
	// Change the cursor style as a UI indicator.
	map.getCanvas().style.cursor = 'pointer';
});
map.on('mouseenter', 'nature', function(e) {
	// Change the cursor style as a UI indicator.
	map.getCanvas().style.cursor = 'pointer';
});
map.on('mouseenter', 'soundscapes', function(e) {
	// Change the cursor style as a UI indicator.
	map.getCanvas().style.cursor = 'pointer';
});
map.on('mouseenter', 'people-praying', function(e) {
	// Change the cursor style as a UI indicator.
	map.getCanvas().style.cursor = 'pointer';
});

map.on('mouseleave', 'street-music', function() {
	map.getCanvas().style.cursor = '';
	//popup.remove();
});
map.on('mouseleave', 'nature', function() {
	map.getCanvas().style.cursor = '';
	//popup.remove();
});
map.on('mouseleave', 'soundscapes', function() {
	map.getCanvas().style.cursor = '';
	//popup.remove();
});
map.on('mouseleave', 'people-praying', function() {
	map.getCanvas().style.cursor = '';
	//popup.remove();
});

</script>
</body>
</html>
