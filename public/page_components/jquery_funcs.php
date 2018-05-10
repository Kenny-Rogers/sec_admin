 <script type="text/javascript">
 $(document).on("click", ".editModal", function () {
            var url = "contents/general/edit_personnel.php?uid="+$(this).data('id');
            $('#edit_user_modal #loadForm').load(url);
        });

 $(document).on("click", ".edit_sec_modal", function () {
            var url = "contents/sys_admin/secretariat/edit_sec.php?uid="+$(this).data('id');
            $('#editSecModal #edit_sec_Form').load(url);
        });

 $(document).on("click", ".editModal1", function () {
            var url = "contents/sys_admin/edit_user.php?uid="+$(this).data('id');
            $('#edit_user_modal #edit_user_Form').load(url);
        });

  $(document).on("click", ".deleteModal", function () {
            var id = $(this).data('id');
            $("#delete_user_modal #infoid").val(id);
        });

 $(document).on("click", ".enroll", function () {
            var url = "contents/secretariat/enroll_team.php?uid="+$(this).data('id');
            $('#enrollModal #enrollForm').load(url);
        });

 $(document).on("click", ".edit_dep", function () {
            var url = "contents/secretariat/edit_deployment_plan.php?uid="+$(this).data('id');
            $('#editDepModal #enroll_dep_Form').load(url);
        });

</script>