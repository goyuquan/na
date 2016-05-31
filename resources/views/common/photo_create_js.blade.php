<script src="{{url('/js/dropzone.min.js')}}"></script>
<script type="text/javascript">
$(function(){

    $(".photo_wrap").on("click","#photos_bt",function(){
        $(".dz-message span").text("拖拽图片上传,每个文件不能超过500K");
        $('.background_photos').fadeIn();
     });
    $('.background_photos').click(function(){ $(this).fadeOut(); })
    $('.myModal_photos').click(function(e){ e.stopPropagation(); })
    $('.close_bt').click(function(){ $('.background_photos').fadeOut(); });

	$('#delete_photos').click(function(){
		var page = $("input[name='page']").val();
		var sha1 = $("#photos_sha1").val();
		$.ajax({
			type:"GET",
			url:"/delete/page/"+page+"/photos/"+sha1,
			success:function(data){
				$("#delete_photos").after('<button type="button" id="photos_bt">上传图片</button>');
				$("#delete_photos,.photo_wrap img").remove();
			}
		});
	});

    $("#my-awesome-dropzone").dropzone({
        url: "/upload/photos/"+$("#photos_sha1").val(),
        parallelUploads: 1,
        maxFilesize: 0.5,
        maxFiles:10,
        thumbnailWidth: 100,
        thumbnailHeight: 100,
        dictFileTooBig:"文件太大了",
        dragenter:function(){
            $("#my-awesome-dropzone").css("border-color","#eea236");
        },
        dragleave:function(){
            $("#my-awesome-dropzone").css("border-color","#398439");
        }
     });
});
</script>
