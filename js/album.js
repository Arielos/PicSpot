$(function() {
    var defVal = 6;

    $('.button-collapse').sideNav();
    $('#linkInTitle').attr('checked', false);
    $('#linkInAction').attr('checked', false);
    $('#withDescription').attr('checked', true);
    $('#flipper').attr('checked', false);

    $('#submitBtn').click(function() {
        showVal($('#imageResizer').val());
    });

    $('#imageResizer').val(defVal);
    showVal(defVal);
});

function fillModal(handler)
{
    var cardId = handler.parent().parent().attr('id');

    $('#modal-body').empty();

    /*
    $.getJSON(
        'data.json'//, { id: cardId }
    ).done(function(data) {
            $.each(data, function(i, item) {
                console.log('I = ' + i);
                    if (i == 'name')
                    {
                        $('#modal-body').append("<p>" + item + "</p>");
                    }
                else if (i == 'link') {
                        $('#modal-body').prepend("<img src='" + item + "' width='400' />");
                    }
                return true;
            });
    });
     */
}

function showVal(value) {

    var imageSize = "'col l" + value + " m6 s12'";

    $('#imageContainer').empty();

    var descriptionTag = "";
    var description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dapibus aliquam quam eget porttitor. Sed vel tortor hendrerit lacus aliquet placerat. Nam facilisis feugiat quam non iaculis. In hac habitasse platea dictumst. Phasellus id mi efficitur, auctor massa in, gravida massa. Etiam ut venenatis odio. Praesent magna massa, euismod in enim sed, pellentesque pellentesque risus. Cras ac sagittis ante.";
    var pressDesc = description.substring(0, parseInt(description.length * ((value - 1) / 12)));

    var titleLink = "Card title";
    var actionLink = "";

    if ($('#linkInTitle').prop('checked')) {
        titleLink = "<a href='#'>Card title</a>";
    }

    if ($('#linkInAction').prop('checked')) {
            actionLink = "<div class='card-action'><a class='modal-trigger' href='#modal1' onclick='fillModal($(this))'>More Info</a></div>";
        }

    if ($('#withDescription').prop('checked')) {
        descriptionTag = "<div class='card-content'>" +
                            "<p>" + pressDesc + "</p>" +
                         "</div>"
    }

    for (var i = 1; i <= 24; i++) {
        $('#imageContainer').append(
            "<div class=" + imageSize + ">" +
                "<div class='card materialboxed'>" +
                    "<div class='card-image'>" +
                        "<img src='img/custom/test.jpg'>" +
                        "<span class='card-title'>" + titleLink + "</span>" +
                    "</div>" +
                     descriptionTag +
                     actionLink +
                "</div>" +
            "</div>" +
        "");
    }

    $('.materialboxed').materialbox();

    $('.modal-trigger').leanModal();
}