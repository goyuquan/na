$(function(){
    $('.background').height($('html').height()).css('margin','0');
    $('.background_photos').height($('html').height()).css('margin','0');

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

    $(".thumb_wrap").on("click","#thumbnail_bt",function(){ $('.background').fadeIn(); });
    $('.background').click(function(){ $(this).fadeOut(); })
    $('.myModal').click(function(e){ e.stopPropagation(); })
    $('.close_bt').click(function(){ $('.background').fadeOut(); });

    $('#delete_thumb').click(function(){
        var src = $("#thumbnail").attr("name");
        var page = $("input[name='page']").val();
        $.ajax({
            type:"GET",
            url:"/delete/page/"+page+"/thumbnail/"+src,
            success:function(data){
                $("#delete_thumb").after('<label for="thumbnail">缩略图</label> <button type="button" id="thumbnail_bt">上传缩略图</button>')
                $("#delete_thumb,#thumbnail,.thumb_wrap input").remove();
            }
        });
    });

});
