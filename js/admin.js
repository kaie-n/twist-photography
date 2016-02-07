
$(document).on('change', '.btn-file :file', function () {
    var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});

$(document).ready(function () {
    $('.btn-file :file').on('fileselect', function (event, numFiles, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

        if (input.length) {
            input.val(log);
        } else {
            if (log) alert(log);
        }

    });
});

function confirmDelete(){
    return confirm("Are you sure? \n (Photos and Album covers will be deleted as well!)");
}


function checkSize(max_img_size) {
    var input = document.getElementById("album_cover");
    // check for browser support (may need to be modified)
    if (input.files && input.files.length == 1) {
        if (input.files[0].size > max_img_size) {
            document.getElementById("success").innerHTML = "<p>The file "+ input.files[0].name +" must be less than " + (max_img_size / 1024 / 1024) + "MB </p>"
            //alert("The file must "+ input.files[0].name +" be less than " + (max_img_size / 1024 / 1024) + "MB");
            return false;
        }
    }
    var input2 = document.getElementById("album_photos");
    var bool = true;
    document.getElementById("success").innerHTML = "";
    for (var i = 0; i < input2.files.length; i++) {

        if (input2.files && input2.files.length >= 1) {
            if (input2.files[i].size > max_img_size) {
                document.getElementById("success").innerHTML += "<p>The file "+ input2.files[i].name +" must be less than " + (max_img_size / 1024 / 1024) + "MB </p>"
                //alert("The file "+ input2.files[i].name +"  must be less than " + (max_img_size / 1024 / 1024) + "MB");
                bool = false;
            }
        }
    }
    if (!bool) {
        return false;
    }
    if (bool) {
        return true;
    }
}