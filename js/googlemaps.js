$(function() {
    google.maps.event.addDomListener(window, 'load', initialize);

/*
    $.getJSON(
        'functions/getSpot.php'
    ).done(function(data) {
        $.each(data, function(i, item) {
            alert("i: " + i, "item: " + item);
            return true;
        });
    });
    */
    //var coords = new google.maps.LatLng(32.09374408993661, 35.13043239712715);
    //var m = placeMarker(coords, map);
    alert("done");
});

function initialize() {
	var mapOptions = {
		center: { lat:31.4117256, lng: 35.0818155},
		zoom: 7
    };

	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	google.maps.event.addListener(map, 'click', function(e) {

		//if (marker != null) {
		//	marker.setMap(null);
		//}

		var marker = placeMarker(e.latLng, map);
        google.maps.event.addListener(marker, 'click', function() {
            updateCoordsLabel(marker);
        });

        updateCoordsLabel(marker);
    });
}

function placeMarker(position, map) {
	var newMarker = new google.maps.Marker({
		position: position,
		map: map,
		title : position.toString()
	});

	return newMarker;
}

function updateCoordsLabel(m) {
    $('#gps-coordinates-label').empty();
    $('#gps-coordinates-label').append('GPS Coordinates: ' + m.position.lat() + ', ' + m.position.lng());
}