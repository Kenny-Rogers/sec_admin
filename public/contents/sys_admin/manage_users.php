<?php include('../includes/api.php'); ?>
<div class="row">
    <div class='col-md-offset-10 col-md-2'>
      <!-- <a style="color:white" href="?page=create_user"> -->
        <button type="submit" class="btn btn-info btn-fill btn-wd" data-toggle="modal" data-target="#registerModal">
            Create New User
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
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 181.7px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Staff Number</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 231.25px;" aria-label="Browser: activate to sort column ascending">Full Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 196.717px;" aria-label="Platform(s): activate to sort column ascending">Rank</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 156.183px;" aria-label="Engine version: activate to sort column ascending">Portfolio</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 112.15px;" aria-label="CSS grade: activate to sort column ascending">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
            <?php 
                 $system_users = API::get_data(API::get_api_url($page));

                 //print_r($users);

                 foreach($system_users as $system_user){
                     $user = $system_user["personnel"];
                     $full_name = $user['first_name']." ".$user['other_names'].
                                  " ".$user['last_name']; 
            ?>
                <tr role="row" class="odd">
                    <td class="sorting_1"><?php echo$user['staff_no'];  ?></td>
                    <td><?php echo strtoupper($full_name); ?></td>
                    <td><?php echo strtoupper($user['rank']); ?></td>
                    <td><?php echo strtoupper($system_user['system_user']['role']); ?></td>
                    <td>
                        <a title="Edit Record" data-id="<?php echo $system_user['system_user']['id'];?>" data-toggle="modal" href="#edit_user_modal" class="editModal1"><i class="fa fa-edit"></i></a> &ensp;&ensp;&ensp;&ensp;
                        <a title="Delete Record" data-id="<?php echo $system_user['system_user']['id'];?>" data-toggle="modal" href="#delete_user_modal" class="deleteModal"><i class="fa fa-trash-o"></i></a> 
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


<!--Delete Modal -->
<div class="modal fade" id="delete_user_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete System User Information</h4>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="../includes/actions/submit_data.php?page=delete_user&rpage=<?php echo $page; ?>" >
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Are you sure you want to delete this information?</label>
                        <input type="hidden" name="id" id="infoid" value="">
                   </div>
                   </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete Sytem User Information</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

<!--Edit User Modal -->
<div class="modal fade" id="edit_user_modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Secretariat</h4>
            </div>
            <div class="modal-body">
            <div id="edit_user_Form"></div>
            </div>
        </div>
    </div>
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
            <form role="form" method="post" action="../includes/actions/submit_data.php?page=create_user&rpage=<?php echo $page; ?>">
                <div class="box-body">
                <?php 
                     $personnelle = API::get_data(API::get_api_url('list_non_user_personnel'));
                ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <select class="form-control" name="personnel_id" required>
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
                    <label for="exampleInputPassword1">Role</label>
                    <div class="radio">
                        <label>
                            <input name="role" id="optionsRadios1" value="dispatcher" checked="" type="radio">
                            Dispatcher
                        </label>
                        <label>
                            <input name="role" id="optionsRadios1" value="secretariat representative"  type="radio">
                            Secretariat Representative
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input class="form-control" id="exampleInputPassword1" name="user_name" placeholder="Username" required type="text">
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