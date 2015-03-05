$(function() {
    var fileselect = document.getElementById('fileselect');
	var filedrag = document.getElementById('filedrag');

	// file select
	fileselect.addEventListener("change", FileSelectHandler, false);

	// is XHR2 available?
	var xhr = new XMLHttpRequest();
	if (xhr.upload) {
		filedrag.addEventListener("dragover", FileDragHover, false);
		filedrag.addEventListener("dragleave", FileDragHover, false);
		filedrag.addEventListener("drop", FileSelectHandler, false);
		filedrag.style.display = "block";
    }

    $("#submitBtn").bind("click", function(e) {
        submitImages(e);
    });
});

// file drag hover
function FileDragHover(e) {
	e.stopPropagation();
	e.preventDefault();
	e.target.className = (e.type == "dragover" ? "hover" : "");
}

// file selection
function FileSelectHandler(e) {

	// cancel event and hover styling
	FileDragHover(e);

	// fetch FileList object
	var files = e.target.files || e.dataTransfer.files;

	// process all File objects
	for (var i = 0, f; f = files[i]; i++) {
		ParseFile(f);
	}
}

// output file information
function ParseFile(file) {

	// display an image
	if (file.type.indexOf("image") == 0) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#imagesData').append(
			    "<div class='col-sm-6 col-md-4'>" +
				    "<div class='thumbnail'>" +
		    		    "<img src='" + e.target.result + "' />" +
                        "<div class='caption'>" +
                            "<h6>" + file.name + "</h6>" +
                        "</div>" +
                    "</div>" +
                "</div>"
			);
		}
		reader.readAsDataURL(file);
	}
}

function submitImages(e) {
    e.preventDefault();
    $.ajax({
        url:'functions/addSpot.php',
        type:'post',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data,status) {
            if(data=="ok") {
                alert(status);
                //TODO: add action for 'add' success
            }
            else{
                alert("pic failure!");
                //TODO: add action for 'add' fail
            }
        },
        error: function(xhr,desc,err){
            console.log(xhr);
            alert("Details" + err + desc);
        }
    });
}