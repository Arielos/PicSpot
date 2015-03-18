$(function() {
	$("button[name='clearBtn']").bind("click", function() {
		$(":input[type='text']").val("");
		$("textarea").val("");
		if (marker != null) {
			marker.setMap(null);
		}
	});
    $("#nextBtn").bind("click", function() {
        if (validateForm()) {
            $('#main h4').empty().append("Insert Spot Info");
            $('#mainform1').attr('hidden', 'hidden');
            $('#mainform2').removeAttr('hidden');
            $("#submitBtn").bind("click", submitSpotClickHandler);
        }
    });
});

function submitSpotClickHandler(e) {

    var spotName = $("input[name='spot-name']").val();
    var spotDescription = $("#spotdescription").val();

    var spotLat = marker.position.lat();
    var spotLng = marker.position.lng();

    e.preventDefault();
    $.ajax({
        url:'functions/AddSpot.php',
        type:'post',
        data: {
                'spot-name' : spotName,
                'spot-description' : spotDescription,
                'spot-lat' : spotLat,
                'spot-lng' : spotLng
        },
        success: function(data,status) {
            if(data=="ok") {
                alert(status);
                //TODO: add action for 'add' success
                $("#submitBtn").unbind("click", submitSpotClickHandler);
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
}