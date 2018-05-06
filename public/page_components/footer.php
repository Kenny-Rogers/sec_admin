 </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Lodonu Kennedy Yaw
    </div>
    <!-- Default to the left -->
    <strong><a href="#">University Of Ghana</a></strong> 
  </footer>

</div>
<!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Datepicker-->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- page script -->
<script type="text/javascript">
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  $('#datepicker').datepicker({
    autoclose: true
  })  

    $(document).ready(function(){
        // var page = jQuery.url().param("page");
        // if(page == 'answer_complaint') {
            setInterval(function(){
                $('#data_returned').load('../includes/actions/get_complaints.php');
            }, 7000);
       // } else {
        //    alert("hello");
        //}

        setInterval(function(){
                $('#mapview').load('contents/dispatcher/map.php');
            }, 10000);        
    });

    $(document).ready(function () {
      window.setTimeout(function() {
          $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
              $(this).remove(); 
          });
      }, 5000);
    });
</script>

  <?php include('jquery_funcs.php'); ?>
</body>
</html>