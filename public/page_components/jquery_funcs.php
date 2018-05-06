 <script type="text/javascript">
 $(document).on("click", ".editModal", function () {
            var url = "contents/general/edit_personnel.php?uid="+$(this).data('id');
            $('#edit_user_modal #loadForm').load(url);
        });

  $(document).on("click", ".deleteModal", function () {
            var id = $(this).data('id');
            $("#delete_user_modal #infoid").val(id);
        });
</script>