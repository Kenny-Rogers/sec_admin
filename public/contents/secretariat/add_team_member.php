<?php include('../includes/api.php');?>

<div class="row">
    <div class="col-xs-offset-1 col-xs-10">
        <div class="box box-primary">
            <form role="form" method="post" action="../includes/actions/submit_data.php?page=<?php echo $page; ?>">
                <div class="box-body">
                <?php 
                     $patrol_teams = API::get_data(API::get_api_url('list_patrol_team'));
                ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Patrol Team </label>
                    <select class="form-control" name="patrol_team_id" required>
                    <?php 
                        foreach($patrol_teams as $patrol_team){
                    ?>
                        <option  value="<?php echo $patrol_team['id']; ?>"> <?php echo strtoupper($patrol_team['team_name']); ?> </option>
                    <?php } ?>
                    </select>
                </div>
                <?php 
                     $personnelle = API::get_data(API::get_api_url('list_non_team_members'));
                ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Member </label>
                    <select class="form-control" name="personnel_id" required>
                    <?php 
                        foreach($personnelle as $personnel){
                            $full_name = $personnel['first_name']." ".$personnel['other_names'].
                                  " ".$personnel['last_name'];
                    ?>
                        <option  value="<?php echo $personnel['id']; ?>"> <?php echo strtoupper($full_name); ?> </option>
                    <?php } ?>
                    </select>
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