<?php include('../includes/api.php');?>

<div class="row">
    <div class="col-xs-offset-1 col-xs-10">
        <div class="box box-primary">
            <form role="form" method="post" action="../includes/actions/submit_data.php?page=<?php echo $page; ?>">
                <div class="box-body">
                <?php 
                     $patrol_teams = API::get_data(API::get_api_url('view_dep_plan'));
                ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Deployment Plan</label>
                    <select class="form-control" name="dep_plan_id" required>
                    <?php 
                        foreach($patrol_teams as $patrol_team){
                    ?>
                        <option  value="<?php echo $patrol_team['id']; ?>"> <?php echo strtoupper($patrol_team['schedule_for_date']); ?> </option>
                    <?php } ?>
                    </select>
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
                <div class="box-footer">
                    <div class="row">
                    <div class="col-xs-offset-8 col-xs-4">
                    <input type="reset" value="Reset" class="btn btn-danger">
                    <button type="submit" class="btn btn-primary">Create Patrol Team</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>