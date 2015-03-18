$(function() {

    $("#nextBtn").bind("click", submitImage);

    $("#image-category-picker").append(
        "<option value='' disabled selected>Select Category</option>"
    );

    var categories = ["Birds", "Landscapes", "Macro", "Nature", "Portraits",
        "Street", "Architecture", "Fashion", "Weddings", "Other"];

    for (var i = 1; i < categories.length; i++) {
        $("#image-category-picker").append(
            "<option>" + categories[i] + "</option>"
        );
    }

    var fileselect = document.getElementById('imagesSelect');
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

});

// file drag hover
function FileDragHover(e) {
	e.stopPropagation();
	e.preventDefault();
	e.target.className = "col-lg-offset-2 col-lg-10 " + (e.type == "dragover" ? "hover" : "");
}

// file selection
function FileSelectHandler(e) {

	// cancel event and hover styling
	FileDragHover(e);

	// fetch FileList object
	var files = e.target.files || e.dataTransfer.files;

	// process all File objects
	//ParseFile(files[0]);
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
			    "<div class='col-sm-3 col-md-3'>" +
				    "<div class='thumbnail fadeInAnim'>" +
		    		    "<img src='" + e.target.result + "' class='scale'/>" +
                        "<div class='caption'>" +
                            "<h6>" + file.name + "</h6>" +
                        "</div>" +
                    "</div>" +
                "</div>"
			);
		}
		reader.readAsDataURL(file);
		filedrag.remove();
	}
}

function validateForm() {
    var msg = "";

    if (marker == null) {
        msg += "Choose image location on the map\n";
    }

    if ($("#image-description").val() === "") {
        msg += "Enter image description\n";
    }

    if ($("#image-category-picker option:selected").index() === 0) {
        msg += "Please choose a category\n";
    }
    if (msg.length > 0) {
        alert(msg);
        return false;
    } else {
        return true;
    }
}

function submitImage()
{
    var formData = new FormData();

    formData.append('spot-id', 1);
    formData.append('image-description', $("#image-description").val());
    formData.append('image-category', $("#image-category-picker option:selected").val());
    formData.append('image-file', $("#imagesSelect").prop('files'));

    e.preventDefault();

    $.ajax({
        url:'functions/AddSpot.php',
        type:'post',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data,status) {
            if(data == "ok") {
                alert(status);
                //TODO: add action for 'add' success
                $("#nextBtn").unbind("click", submitImage);
            }
            else{
                alert("failure!");
                //TODO: add action for 'add' fail
            }
        },
        error: function(xhr, desc, err){
            console.log(xhr);
            alert("Details" + err + desc);
        }
    });
}