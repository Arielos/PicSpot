$(function() {
	$("#getBtn").bind("click", getSpot);
	$("#deleteBtn").bind("click", deleteSpot);
});

function getSpot() {
	var spotId = $("input[name='spot-id-to-get']").val();

	var data = {
		'spot-id':spotId
	};
	data = $(this).serialize() + "&" + $.param(data);
	$.ajax({
		url:'functions/getSpot.php',
		type:'post',
		data: data,
		success: function(dat) {
			alert(dat);
		},
		error: function(xhr,desc,err){
			console.log(xhr);
			alert("Details" + err + desc);
		}
	});

	/*
	$.getJSON("functions/getSpot.php?spot-id="+spotId, function(jsondata) {
		var items = [];

		$("<ul/>", {
			"class": "my-new-list",
			html: items.join("")
		}).appendTo("body");
	}).fail(function() {
		alert("Faild to get spot info " + spotId);
	});
	*/
}

function deleteSpot() {
	var spotId = $("input[name='spot-id-to-get']").val();
	
	var request = $.ajax({
		type: "GET",
		url: "resources/spots/" + spotId,
		data: {action: "delete"}
	});
	
	request.done(function() {
		alert("Spot " + spotId + " deleted");
	});
	
	request.fail(function() {
		alert("Faild to delete spot " + spotId);
	});
}