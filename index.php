<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuT51pdC9Crt9R0MmhD-UMK_FYQUiHkNY">
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: { lat:32.0808800	, lng: 34.7805700},
          zoom: 12
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
         google.maps.event.addListener(map, 'click', function(e) {
			placeMarker(e.latLng, map);
			document.getElementById("lng").innerHTML = ""+e.latLng.lat();
			document.getElementById("lat").innerHTML = ""+e.latLng.lng();
			window.open("addSpot.php?lat="+e.latLng.lat()+"&&lng="+e.latLng.lng()+"");
    //<?php> php scripit should placed here
//<?>
  });
      }
      function placeMarker(position, map) {
		var marker = new google.maps.Marker({
			position: position,
			map: map,
			title : position.toString()
			});
		}

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
  	<p id ="lng">name</p>
  	<p id ="lat">name</p>
<div id="map-canvas" style ="width : 720px; height : 720px;margin:0 auto"></div>
  </body>
</html>
