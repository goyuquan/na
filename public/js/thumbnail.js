$(function(){

    $("#img_upload").click(function(){
        $('#file_form').submit(function(e) {
            e.preventDefault();
            var fd = new FormData(this); // Neex AJAX2
            // You could show a loading image for example...
            $.ajax({
                url: "/upload/thumbnail",
                xhr: function() { // custom xhr (is the best)
                    var xhr = new XMLHttpRequest();
                    var total = 0;
                    // Get the total size of files
                    $.each(document.getElementById('thumbnail').files, function(i, file) {
                        total += file.size;
                    });
                    // Called when upload progress changes. xhr2
                    xhr.upload.addEventListener("progress", function(evt) {
                        var loaded = (evt.loaded / total).toFixed(2)*100; // percent
                        $('#progress').width(loaded + '%');
                        $('#progress').text(loaded + '%');
                    }, false);
                    return xhr;
                },
                type: 'post',
                headers: { 'X-CSRF-TOKEN': $('#thumbnail_token').val() },
                processData: false,
                contentType: false,
                data: fd,
                success: function(data) {
                    // $("input[name='thumbnail']").val(data);
                    $("#thumbnail_bt").after("<input type='hidden' name='thumbnail' value='"+data+"'>")
                    .after("<img src='/uploads/thumbnails/"+data+"'>");
                    $("#thumbnail_bt").remove();
                    $('#img_upload').hide();
                    $('#progress').css({
                        'background':'#3c763d',
                        'padding-right':'1em'
                    }).text("上传成功");
                    $('#upload_bt0').removeClass("btn-warning").addClass("btn-success").html("<i class='fa fa-upload'></i>缩略图已上传");
                }
            });
        });

        $('#file_form').submit();
    });

    $("#thumbnail_bt").click(function(){ $('.background').fadeIn(); });
    $('.background').click(function(){ $(this).fadeOut(); })
    $('.myModal').click(function(e){ e.stopPropagation(); })
    $('.close_bt').click(function(){ $('.background').fadeOut(); });

    $("#photos_bt").click(function(){
        $(".dz-message span").text("拖拽图片上传,每个文件不能超过500K");
        $('.background_photos').fadeIn();
     });
    $('.background_photos').click(function(){ $(this).fadeOut(); })
    $('.myModal_photos').click(function(e){ e.stopPropagation(); })
    $('.close_bt').click(function(){ $('.background_photos').fadeOut(); });

});
