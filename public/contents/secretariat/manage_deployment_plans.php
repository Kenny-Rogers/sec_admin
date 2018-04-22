<?php include('../includes/api.php'); ?>
<div class="row">
    <div class='col-md-offset-8 col-md-3'>
        <!--a style="color:white" href="?page=create_dep_plan"-->
        <button type="submit" class="btn btn-info btn-fill btn-wd" data-toggle="modal" data-target="#registerModal">
            Create New Deployment Plan
        </button>
        <!--/a-->
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-offset-1 col-xs-10">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Deployment Plans</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 181.7px;" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">#</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 231.25px;" aria-label="Browser: activate to sort column ascending">Secretariat</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 196.717px;" aria-label="Platform(s): activate to sort column ascending">Scheduled For</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 156.183px;" aria-label="Engine version: activate to sort column ascending">Number Of Teams</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 112.15px;" aria-label="CSS grade: activate to sort column ascending">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                 $dep_plans = API::get_data(API::get_api_url($page));


                 foreach($dep_plans as $dep_plan){
                     $sec = API::get_data(API::get_api_url('sec_info')."&uid=".$dep_plan['secretariat_id']);
                     $date =  get_displayable_date($dep_plan['schedule_for_date']);
            ?>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <?php echo $dep_plan['id'];  ?>
                                        </td>
                                        <td>
                                            <?php echo strtoupper($sec[0]['name']); ?>
                                        </td>
                                        <td>
                                            <?php echo strtoupper($date); ?>
                                        </td>
                                        <td>
                                            <?php //echo strtoupper($system_user['system_user']['role']); ?>
                                        </td>
                                        <td>
                                            <a title="Add Patrol Team" href="?page=enroll_team&uid=<?php echo $dep_plan['id'];?>">
                                                <i class="fa fa-users"></i>
                                            </a> &ensp;&ensp;&ensp;&ensp;
                                            <a title="Edit Record" href="?page=edit_user&uid=<?php echo $system_user['system_user']['id'];?>">
                                                <i class="fa fa-edit"></i>
                                            </a> &ensp;&ensp;&ensp;&ensp;
                                            <a title="Delete Record" href="?page=delete_user&uid=<?php echo $system_user['system_user']['id'];?>">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>

<!--Register Modal -->
<div class="modal fade" id="registerModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register Person</h4>
            </div>
            <div class="modal-body">
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
                <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <input type="reset" value="Reset" class="btn btn-danger">
                        <button type="submit" class="btn btn-primary">Create Deployment Plans</button>
                    </div>
            </form>
            </div>
        </div>
    </div>