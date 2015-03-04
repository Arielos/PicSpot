$(function() {
	$("#getBtn").bind("click", getSpot);
	$("#deleteBtn").bind("click", deleteSpot);
});

function getSpot() {
	var spotId = $("input[name='spot-id-to-get']").val();

	$.getJSON("test.php?spot="+spotId, function(jsondata) {
		var items = [];
		$.each(jsondata, function(key, val) {
			items.push("<li id='" + key + "'>" + val + "</li>");
		});
		$("<ul/>", {
			"class": "my-new-list",
			html: items.join("") 
		}).appendTo("body");
	}).fail(function() {
		alert("Faild to get spot info " + spotId);
	});
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