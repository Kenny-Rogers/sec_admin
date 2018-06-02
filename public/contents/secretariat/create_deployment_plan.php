<?php //include('../includes/api.php');?>

<div class="row">
    <div class="col-xs-offset-1 col-xs-10">
        <div class="box box-primary">
            <form role="form" method="post" action="../includes/actions/submit_data.php?page=<?php echo $page; ?>">
                <div class="box-body">
                <?php 
                     $secretariats = API::get_data(API::get_api_url('man_sec'));
                ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Secretariat </label>
                    <select class="form-control" name="secretariat_id" required>
                    <?php 
                        foreach($secretariats as $secretariat){
                    ?>
                        <option  value="<?php echo $secretariat['id']; ?>"> <?php echo strtoupper($secretariat['name']); ?> </option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Scheduled For Date:</label>
                    <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input class="form-control pull-right" id="datepicker" name="schedule_for_date" type="text">
                </div>
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