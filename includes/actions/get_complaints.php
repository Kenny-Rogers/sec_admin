<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Unattended Complaints</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="box-group" id="accordion">

    <?php 
      //class for API Transactions
      include('../api.php');
      include('../functions.php');

      //performing API call
      $complaints = API::get_data(API::get_api_url('get_complaint'));
      $index = 1;
      foreach ($complaints as $complaint) {
        $time_ago = datetime_to_text($complaint['date_time_of_report']);
    ?>
        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
        <div class="panel box box-danger">
          <div class="box-header with-border">
            <h4 class="box-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $index; ?>">
                <?php echo "Emergency : ". $complaint["type_issue"]; ?>
              </a>
            </h4>
          </div>
          <div id="collapse<?php echo $index; ?>" class="panel-collapse collapse">
            <div class="box-body">
              Time logged : <?php echo $time_ago; ?> <br>
              Details : <?php echo $complaint["nature_of_issue"]; ?> <br>
              <a href="?page=answer_complaint&complaint=<?php echo $complaint["id"]; ?>"><button type="button" class="btn btn-block btn-info btn-sm">View More Details</button></a>
            </div>
          </div>
        </div>
    <?php $index++; } ?>
    </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->