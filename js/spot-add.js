var marker = null;

$(function() {
	var dateTextField = $("input[name='spot-date-creation']");
	dateTextField.val(getDate());
	
	$("button[name='clearBtn']").bind("click", function() {
		$(":input[type='text']").val("");
		$("textarea").val("");
		if (marker != null) {
			marker.setMap(null);
		}
	});
});

function getDate() {
	var today = new Date();
	var day = today.getDate();
	var month = today.getMonth() + 1;
	var year = today.getFullYear();

	day = (day < 10) ? '0' + day : day;
	month = (month < 10) ? '0' + month : month;
	
	today = day + '/' + month + '/' + year;
	return today;
}

function initialize() {
	var mapOptions = {
		center: { lat:31.4117256, lng: 35.0818155},
		zoom: 7
    };
	
	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	google.maps.event.addListener(map, 'click', function(e) {
		if (marker != null) {
			marker.setMap(null);
		}
		marker = placeMarker(e.latLng, map);
		$("input[name='lat']").val(e.latLng.lat());
		$("input[name='lng']").val(e.latLng.lng());
	});
}

function placeMarker(position, map) {
	var marker = new google.maps.Marker({
		position: position,
		map: map,
		title : position.toString()
	});
	return marker;
}