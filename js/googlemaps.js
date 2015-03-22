$(function() {
    google.maps.event.addDomListener(window, 'load', initialize);

    $.getJSON(
        'functions/getSpot.php'
    ).done(function(data) {
        $.each(data, function(i, item) {
            console.log("i: " + i, "item: " + item);
            return true;
        });
    });
    console.log("google map script ready done!");
});

var marker = null;
var map = null;

function initialize() {

	var mapOptions = {
		center: { lat:31.4117256, lng: 35.0818155},
		zoom: 7
    };

	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	google.maps.event.addListener(map, 'click', function(e) {

		if (marker != null) {
			marker.setMap(null);
		}

		marker = placeMarker(e.latLng, map);
        google.maps.event.addListener(marker, 'click', function() {
            updateCoordsLabel(marker);
        });

        updateCoordsLabel(marker);
    });

    if(window.navigator.geolocation) {
        window.navigator.geolocation.getCurrentPosition(myfunc, errfunc);
    } else {
        console.log("geolocation is not supported");
    }
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

function myfunc(ob) {
    var myLatlng = new google.maps.LatLng(ob.coords.latitude, ob.coords.longitude);

    marker = placeMarker(myLatlng, map);
    updateCoordsLabel(marker);

    console.log("latitude=" + ob.coords.latitude +" longitude="+ ob.coords.longitude);
}
function errfunc(ob) {
    console.log(ob.message);
}
