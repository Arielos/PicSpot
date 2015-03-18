$(function() {
	$("#getBtn").bind("click", getSpot);
	$("#deleteBtn").bind("click", deleteSpot);
});

function getSpot() {
	var spotId = $("input[name='spot-id-to-get']").val();

	$.getJSON("test.php?spot=" + spotId, function(jsondata) {
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
	
	$.ajax({
		url: 'functions/spots/',
		type: "delete",
		data: {'spot-id': spotId},
        success: function(data,status) {
            if(data == "ok") {
                alert(status);
                //TODO: add action for 'delete' success
            }
            else{
                alert("failure!");
                //TODO: add action for 'delete' fail
            }
        },
        error: function(xhr,desc,err){
            console.log(xhr);
            alert("Details" + err + desc);
        }
    }
}