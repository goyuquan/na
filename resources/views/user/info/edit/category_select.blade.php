<script type="text/javascript">
    $(function(){
        $("#category option").hide();
        $("#category option[data-parent='"+ $("#parent_category").val() +"']").show();

        $("#parent_category").change(function(){
            $("#category option").hide();
            $("#category").val("");
            $("#category option[data-parent='"+ $(this).val() +"']").show();
        });
    });
</script>
