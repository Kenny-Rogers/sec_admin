<?php 
    include('../../../includes/api.php');
    $user_id = $_GET['uid'];
    $dep_plan = API::get_data(API::get_api_url('dep_plan_info') ."&uid=$user_id");
?>
<form role="form" method="post" action="../includes/actions/submit_data.php?page=edit_dep_plan&rpage=view_dep_plan">
    <div class="box-body">
    <?php 
            $secretariats = API::get_data(API::get_api_url('man_sec'));    
    ?>
    <div class="form-group">
        <label for="exampleInputPassword1">Secretariat </label>
        <input name="id" type="hidden" value="<?php echo $dep_plan["id"]; ?>">
        <select class="form-control" name="secretariat_id" required>
        <?php 
            foreach($secretariats as $secretariat){
                if($dep_plan['secretariat_id'] == $secretariat['id']){
        ?>
            <option  selected value="<?php echo $secretariat['id']; ?>"> <?php echo strtoupper($secretariat['name']); ?> </option>
        <?php } else { ?>
            <option  value="<?php echo $secretariat['id']; ?>"> <?php echo strtoupper($secretariat['name']); ?> </option>
        <?php } }?>
        </select>
    </div>
    <div class="form-group">
        <label>Scheduled For Date:</label>
        <div class="input-group date">
        <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
        </div>
        <?php 
            $time = strtotime($dep_plan['schedule_for_date']);
            $date = strftime("%Y-%m-%d", $time);
        ?>
        <input class="form-control pull-right" id="datepicker" name="schedule_for_date" type="text" value="<?php echo $date;  ?>">
    </div>
    </div>
    <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <input type="reset" value="Reset" class="btn btn-danger">
            <button type="submit" class="btn btn-primary">Edit Deployment Plans</button>
        </div>
</form>