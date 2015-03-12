var marker = null;

$(function() {
	$("#clearBtn").bind("click", function() {
		$(":input[type='text']").val("");
		$("textarea").val("");
		if (marker != null) {
			marker.setMap(null);
		}
	});

	$("#submitBtn").bind("click", function(e) {

		var spotName = $("input[name='spot-name']").val();
		var spotDescription = $("#spotdescription").val();
		var spotTips = $("#spottips").val();
		var spotLat = marker.position.lat();
		var spotLng = marker.position.lng();
		var categoryId = $("input[name='category-id']").val();

		e.preventDefault();
		$.ajax({
			url:'functions/addSpot.php',
			type:'post',
			data: {
					'spot-name':spotName,
					'spot-description':spotDescription,
					'spot-tips':spotTips,
					'spot-lat':spotLat,
					'spot-lng':spotLng
			},
			success: function(data,status) {
				if(data=="ok") {
					alert(status);
					//TODO: add action for 'add' success
				}
				else{
					alert("failure!");
					//TODO: add action for 'add' fail
				}
			},
			error: function(xhr,desc,err){
				console.log(xhr);
				alert("Details" + err + desc);
			}
		});
	});
});

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