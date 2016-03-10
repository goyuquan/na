$(function(){

    $("#img_upload").click(function(){

        $('#file_form').submit(function(e) {
            e.preventDefault();
            var fd = new FormData(this); // Neex AJAX2
            // You could show a loading image for example...
            $.ajax({
                url: "/admin/thumbnail",
                xhr: function() { // custom xhr (is the best)
                    var xhr = new XMLHttpRequest();
                    var total = 0;
                    // Get the total size of files
                    $.each(document.getElementById('thumbnail').files, function(i, file) {
                        total += file.size;
                    });
                    // Called when upload progress changes. xhr2
                    xhr.upload.addEventListener("progress", function(evt) {
                        // show progress like example
                        var loaded = (evt.loaded / total).toFixed(2)*100; // percent
                        $('#progress').width(loaded + '%');
                    }, false);
                    return xhr;
                },
                type: 'post',
                headers: { 'X-CSRF-TOKEN': $('#thumbnail_token').val() },
                processData: false,
                contentType: false,
                data: fd,
                success: function(data) {
                    console.log(data);
                    $("input[name='thumbnail']").val(data);
                    $('#img_upload').addClass('disabled');
                    $('#file').closest('.input-file').addClass('state-disabled');
                    $('#progress').removeClass('bg-color-primary').addClass('progress-bar-success');
                    $('#progress').parent().removeClass('active');
                    $('#upload_bt0').removeClass("btn-warning").addClass("btn-success").html("<i class='fa fa-upload'></i>缩略图已上传");
                }
            });
        });

        $('#file_form').submit();
    });

    $("#upload_bt").click(function(){
        $('.ui.modal').modal('show');
    });




    $("#img_upload2").click(function(){

        $('#file_form2').submit(function(e) {
            e.preventDefault();
            var fd = new FormData(this); // Neex AJAX2
            // You could show a loading image for example...
            $.ajax({
                url: "/admin/thumbnail2",
                xhr: function() { // custom xhr (is the best)
                    var xhr = new XMLHttpRequest();
                    var total = 0;
                    // Get the total size of files
                    $.each(document.getElementById('thumbnail2').files, function(i, file) {
                        total += file.size;
                    });
                    // Called when upload progress changes. xhr2
                    xhr.upload.addEventListener("progress", function(evt) {
                        // show progress like example
                        var loaded = (evt.loaded / total).toFixed(2)*100; // percent
                        $('#progress2').width(loaded + '%');
                    }, false);
                    return xhr;
                },
                type: 'post',
                headers: { 'X-CSRF-TOKEN': $('#thumbnail_token2').val() },
                processData: false,
                contentType: false,
                data: fd,
                success: function(data) {
                    $("input[name='thumbnail2']").val(data);
                    $('#img_upload2').addClass('disabled');
                    $('#file2').closest('.input-file').addClass('state-disabled');
                    $('#progress2').removeClass('bg-color-primary').addClass('progress-bar-success');
                    $('#progress2').parent().removeClass('active');
                    $('#upload_bt02').removeClass("btn-warning").addClass("btn-success").html("<i class='fa fa-upload'></i>缩略图已上传");
                }
            });
        });

        $('#file_form2').submit();
    });

    $("#upload_bt2").click(function(){alert(2);
        $('.ui.modal2').modal('show');
    });


});
