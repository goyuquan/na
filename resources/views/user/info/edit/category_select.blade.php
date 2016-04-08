<script type="text/javascript">
    $(function(){
        $("#category option").hide();
        $("#category option[data-parent='"+ $("#parent_category").val() +"']").show();

        $("#parent_category").change(function(){
            $("#category option").hide();
            $("#category option[data-parent='"+ $(this).val() +"']").show();
        });
    });
</script>
<script src="http://cdn.bootcss.com/jquery-validate/1.15.0/jquery.validate.min.js"></script>
