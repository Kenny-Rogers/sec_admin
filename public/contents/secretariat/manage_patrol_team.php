<?php include('../includes/api.php');?>
<div class="row">
    <div class='col-md-offset-9 col-md-3'>
      <!-- <a style="color:white" href="?page=create_patrol_team"> -->
        <button type="submit" class="btn btn-info btn-fill btn-wd" data-toggle="modal" data-target="#registerModal">
            Create New Patrol Team
        </button>
       <!-- </a> -->
    </div>
</div>
<br>
<div class="row">
        <div class="col-xs-offset-1 col-xs-10">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">System Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 181.7px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Team Members</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 231.25px;" aria-label="Browser: activate to sort column ascending">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 196.717px;" aria-label="Platform(s): activate to sort column ascending">Expiration</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 156.183px;" aria-label="Engine version: activate to sort column ascending">Team Leader</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 112.15px;" aria-label="CSS grade: activate to sort column ascending">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
            <?php 
                 $system_users = API::get_data(API::get_api_url('list_patrol_team'));

                 foreach($system_users as $system_user){
                     $personnel = API::get_data(API::get_api_url('personnel_info')."&uid=".$system_user['leader_id']);
                     $full_name = $personnel['first_name']." ".$personnel['other_names'].
                                  " ".$personnel['last_name'];
            ?>
                <tr role="row" class="odd">
                    <td class="sorting_1"><?php echo $system_user['team_name'];  ?></td>
                    <td><?php echo strtoupper($system_user['status']); ?></td>
                    <td><?php echo strtoupper($system_user['expiration']); ?></td>
                    <td><?php echo strtoupper($full_name); ?></td>
                    <td>
                        <a title="Add Patrol Team Member" href="?page=assign_patrol_team&team_id=<?php echo $system_user['id'];?>"><i class="fa fa-user-plus"></i></a> &ensp;&ensp;&ensp;&ensp;
                        <a title="Edit Record" href="?page=edit_user&uid=<?php echo $system_user['id'];?>"><i class="fa fa-edit"></i></a> &ensp;&ensp;&ensp;&ensp;
                        <a title="Delete Record" href="?page=delete_user&uid=<?php echo $system_user['id'];?>"><i class="fa fa-trash-o"></i></a> 
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
                <button type="button" class="close" data-dismiss="modal" >&times;</button>
                <h4 class="modal-title">Create User</h4>
            </div>
            <div class="modal-body">
            <form role="form" method="post" action="../includes/actions/submit_data.php?page=create_patrol_team&rpage=<?php echo $page; ?>">
                <div class="box-body">
                 <div class="form-group">
                    <label >Team Name</label>
                    <input class="form-control"  name="team_name" placeholder="Team Name" required type="text">
                </div>
                <?php 
                     $personnelle = API::get_data(API::get_api_url('list_non_leader_personnel'));
                ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Team Leader</label>
                    <select class="form-control" name="leader_id" required>
                    <?php 
                        foreach($personnelle as $personnel){
                            $full_name = $personnel['first_name']." ".$personnel['other_names'].
                                  " ".$personnel['last_name'];
                    ?>
                        <option  value="<?php echo $personnel['id']?>"> <?php echo strtoupper($full_name)?> </option>
                    <?php } ?>
                    </select>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required type="password">
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <input type="reset" value="Reset" class="btn btn-danger">
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
            </form>
            </div>
        </div>
    </div>