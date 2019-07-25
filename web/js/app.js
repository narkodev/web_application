$(document).ready(function () {

    attachInputFileButtonHandler();

    removeImageButtonHandler();

});


function attachInputFileButtonHandler() {

    $("#attach-image-button").on("click", function () {
        $("#drug-image-file-input").click();
    });

    $("#drug-image-file-input").change(function () {

        var inputFile = $("#drug-image-file-input")[0].files[0];

        if(inputFile instanceof File) {
            var inputFileNameValue = inputFile['name'];
        } else {
            inputFileNameValue = 'Виберіть зображення';
        }

        $("#attach-image-button").html(inputFileNameValue);
    });

}

function removeImageButtonHandler() {

    $("#remove-drug-image-btn").on("click", function () {

        if(confirm('Ви впевнені що хочете видалити цю картинку?')) {

            $.ajax({
                type: "post",
                url: "/drugs/delete-image",
                data: {
                    drug_id: $("#remove-drug-image-btn").attr("data-drug-id"),
                    '_csrf' : $("input[name='_csrf']").val()
                },
                success: function (response, status) {

                    if(status === "success") {

                        if(response === "image-was-deleted") {
                            document.location.reload();
                        } else {
                            alert(response);
                        }

                    }

                }
            });

        }

    });

}

