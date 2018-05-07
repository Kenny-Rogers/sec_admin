<?php include('../../../includes/api.php');?>

<form role="form" method="post" action="../includes/actions/submit_data.php?page=enroll_team&rpage=view_dep_plan">
    <div class="box-body">
    <?php 
            $patrol_teams = API::get_data(API::get_api_url('view_dep_plan'));
    ?>
    <div class="form-group">
        <label for="exampleInputPassword1">Deployment Plan</label>
        <select class="form-control" name="dep_plan_id"  disabled="" required>
        <?php 
            $select_id = 0;
            foreach($patrol_teams as $patrol_team){
                if($_GET['uid'] == $patrol_team['id']) {
                    $select_id = $patrol_team['id'];
                    ?>
            <option  value="<?php echo $patrol_team['id']; ?>"> <?php echo strtoupper($patrol_team['schedule_for_date']); ?> </option>
        <?php } }?>
        </select>
        <?php if($select_id!=0){ ?>
        <input name="dep_plan_id" value="<?php echo $select_id; ?>" type="hidden">
        <?php } ?>
    </div>
    <?php 
            $personnelle = API::get_data(API::get_api_url('list_patrol_team'));
    ?>
    <div class="form-group">
        <label for="exampleInputPassword1">Patrol Team </label>
        <select class="form-control" name="pat_team_id" required>
        <?php 
            foreach($personnelle as $personnel){
        ?>
            <option  value="<?php echo $personnel['id']; ?>"> <?php echo strtoupper($personnel['team_name']); ?> </option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Jurisdiction</label>
        <input class="form-control" id="exampleInputEmail1" name="jurisdiction" placeholder="Jurisdiction" required type="text">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <input type="reset" value="Reset" class="btn btn-danger">
        <button type="submit" class="btn btn-primary">Add Patrol Team</button>
   </div>
</form>
       