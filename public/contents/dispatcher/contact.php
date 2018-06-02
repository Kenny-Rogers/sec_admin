<?php 
    //include("../includes/api.php");
    $complaint_id = isset($_GET["complaint"]) ? $_GET["complaint"]:"";
    
    if($complaint_id == ""){
        output_message("No complaint selected", "fail");
    } else {
        $complaint = API::get_data(API::get_api_url('get_complaint')."&complaint_id=$complaint_id");    
        if (!$complaint){
            output_message("No complaint selected", "fail");
        } else {
            $complaint = $complaint[0]; 
            $complainant_id = $complaint["complainant_id"];
            $complainant = API::get_data(API::get_api_url('get_complainant')."&complainant_id=$complainant_id");
            $complainant = $complainant[0];   
?>
<!-- <style>
  #map {
          height: 500px;
          width: 100%;
          background-color: grey;
        }
</style>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwpjbPox3yumBn7T5xfSAunYlkk8vk63k&callback=get_api_data">
</script> -->
<div class="row">
    <div class="col-sm-4">
        <div class="box box-primary collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Complaint Details</h3>
             <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
          </div>
          <div class="box-body" style="display: none;">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-primary">
              <div class="widget-user-image">
                <img class="img-circle" src="dist/img/avatar.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo $complainant["first_name"]." ".$complainant["last_name"];?></h3>
              <h5 class="widget-user-desc"><?php echo $complainant["email"]."/0".$complainant["telephone"]; ?></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Type of Issue <span class="pull-right"><?php echo $complaint["type_issue"]; ?></span></a></li>
                <li><a href="#">Description <span class="pull-right"><?php echo $complaint["nature_of_issue"]; ?></span></a></li>
                <li><a href="#">Date Time Reported <span class="pull-right"><?php echo datetime_to_text($complaint['date_time_of_report']); ?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
          </div>
          <!-- /.box-body -->
        </div>
        
        <div class="box box-primary collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Complaint Media</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body" style="display: none;">
            <?php 
              $complaint = API::get_data(API::get_api_url('get_media')."&complaint_id=$complaint_id");    
              if (!$complaint){
                  output_message("No complaint selected", "fail");
              } else {
                $type =  $complaint["media_type"]; 
                $url = API::get_api_url('get_media_file').$complaint["media_name"];
        
              if (($type=="image/jpeg")||($type=="image/jpg")||($type=="image/pjpeg")||
                  ($type=="image/x-png")||($type=="image/png")) {
            ?>
                <img class="img-responsive pad" src="<?php echo $url; ?>" alt="Photo">
            <?php } else{ ?>
                <video width="320" height="240" controls>
                  <source src="<?php echo $url; ?>" type="<?php echo $type; ?>">
                  Your browser does not support the video tag.
                </video>
            <?php } }?>
          </div>
          <!-- /.box-body -->
        </div>

        <div class="box box-primary collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Assign Patrol Team</h3>
             <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
             </div>
          </div>

          <div class="box-body" style="display: none;" class="panel-collapse collapse">
            <form role="form" method="POST" action="../includes/actions/submit_data.php?page=<?php echo $page; ?>">
                <input type="hidden" name="complain_id" value="<?php echo $complaint_id; ?>">
                <input type="hidden" name="type_of_action" value="<?php echo "assignment"; ?>">
                <div class="form-group" >
                  <label>Select A Patrol Team</label>
                  <select class="form-control" name="personnel_id">
                  <?php 
                        $teams = API::get_data(API::get_api_url('list_patrol_team')."&status=online");
                        foreach ($teams as $team) {
                  ?>
                    <option value="<?php echo $team["id"]; ?>"><?php echo $team["team_name"]; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>
            </form>
          </div>
         </div>
    

    </div>
    <div class="col-sm-8">
        <div id="mapview"></div>
        <!-- <div id="mypanel"></div> -->
    </div>
</div>

<?php } } ?>
