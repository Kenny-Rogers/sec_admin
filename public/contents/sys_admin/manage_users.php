<?php include('../includes/api.php');?>
<div class="row">
    <div class='col-md-offset-10 col-md-2'>
      <a style="color:white" href="?page=create_user">
        <button type="submit" class="btn btn-info btn-fill btn-wd" >
            Create New User
        </button>
       </a>
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
                        <a title="Edit Record" href="?page=edit_user&uid=<?php echo $system_user['system_user']['id'];?>"><i class="fa fa-edit"></i></a> &ensp;&ensp;&ensp;&ensp;
                        <a title="Delete Record" href="?page=delete_user&uid=<?php echo $system_user['system_user']['id'];?>"><i class="fa fa-trash-o"></i></a> 
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
