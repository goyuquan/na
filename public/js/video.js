$(function(){

    $("#video_upload").click(function(){
        $('#file_formv').submit(function(e) {

            e.preventDefault();
            var fd = new FormData(this); // Neex AJAX2
            // You could show a loading image for example...
            $.ajax({
                url: "/admin/video/upload/uploadstore",
                xhr: function() { // custom xhr (is the best)
                    var xhr = new XMLHttpRequest();
                    var total = 0;
                    // Get the total size of files
                    $.each(document.getElementById('video').files, function(i, file) {
                        total += file.size;
                    });
                    // Called when upload progress changes. xhr2
                    xhr.upload.addEventListener("progress", function(evt) {
                        // show progress like example
                        var loaded = (evt.loaded / total).toFixed(2)*100; // percent
                        $('#video_progress').width(loaded + '%');
                    }, false);
                    return xhr;
                },
                type: 'post',
                headers: { 'X-CSRF-TOKEN': $('#video_token').val() },
                processData: false,
                contentType: false,
                data: fd,
                success: function(data) {
                    console.log(data);
                    $("input[name='video']").val(data);
                    $('#video_upload').addClass('disabled');
                    $('#video_file').closest('.input-file').addClass('state-disabled');
                    $('#video_progress').removeClass('bg-color-primary').addClass('progress-bar-success');
                    $('#video_progress').parent().removeClass('active');
                    $('#upload_bt1').removeClass("btn-warning").addClass("btn-success").html("<i class='fa fa-upload'></i>缩略图已上传");
                    $("#upload_bt1").after('<i class="fa fa-video-camera text-info" style="font-size: 2em; position: relative; left: 1em; top: 6px;"></i>');
                }
            });
        });

        $('#file_formv').submit();
    });

    $("#upload_bt").click(function(){
        $('.ui.modal').modal('show');
    });
});
