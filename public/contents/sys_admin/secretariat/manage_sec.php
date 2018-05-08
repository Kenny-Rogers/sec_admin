<?php include('../includes/api.php');?>
<div class="row">
    <div class='col-md-offset-9 col-md-3'>
      <!-- <a style="color:white" href="?page=create_sec"> -->
        <button type="submit" class="btn btn-info btn-fill btn-wd" data-toggle="modal" data-target="#registerModal">
            Create New Secretariat
        </button>
       <!-- </a> -->
    </div>
</div>
<br>
<div class="row">
        <div class="col-xs-offset-1 col-xs-10">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Secretariats</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 181.7px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 231.25px;" aria-label="Browser: activate to sort column ascending">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 196.717px;" aria-label="Platform(s): activate to sort column ascending">Type</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 156.183px;" aria-label="Engine version: activate to sort column ascending">Region</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 112.15px;" aria-label="CSS grade: activate to sort column ascending">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
            <?php 
                 $secretariats = API::get_data(API::get_api_url($page));

                 $count = 1;
                 foreach($secretariats as $secretariat){
            ?>
                <tr role="row" class="odd">
                    <td class="sorting_1"><?php echo $count;  ?></td>
                    <td><?php echo strtoupper($secretariat['name']); ?></td>
                    <td><?php echo strtoupper(get_type($secretariat['type'])); ?></td>
                    <td><?php echo strtoupper(get_region(trim($secretariat['region']))); ?></td>
                    <td>
                        <a title="Edit Record" href="?page=edit_user&uid=<?php echo $secretariat['id'];?>"><i class="fa fa-edit"></i></a> &ensp;&ensp;&ensp;&ensp;
                        <a title="Delete Record" data-id="<?php echo $secretariat['id'];?>" data-toggle="modal" href="#delete_user_modal" class="deleteModal">
                        <i class="fa fa-trash-o"></i></a> 
                    </td>
                </tr>
            <?php $count++; } ?>
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
                <h4 class="modal-title">Delete Secretariat</h4>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="../includes/actions/submit_data.php?page=delete_sec&rpage=<?php echo $page; ?>" >
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Are you sure you want to delete this information?</label>
                        <input type="hidden" name="id" id="infoid" value="">
                   </div>
                   </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete Secretariat Information</button>
                </div>
              </form>
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
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Secretariat</h4>
            </div>
            <style>
            #map {
                    height: 500px;
                    width: 100%;
                    background-color: grey;
                    }
            </style>
            <div class="modal-body">
            <form role="form" method="post" action="../includes/actions/submit_data.php?page=create_sec&rpage=<?php echo $page; ?>" >
                <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name Of Police Station</label>
                    <input class="form-control" id="exampleInputEmail1" name="name" placeholder="Police Station" required type="text">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Type</label>
                    <select class="form-control" name="type" required>
                        <option  value="reg_hqr"> Regional Headquaters </option>
                        <option  value="dist_cm"> District Command </option>
                        <option  value="div_cm"> Divisional Command </option>
                        <option  value="pol_pst"> Police Post </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Region</label>
                    <select class="form-control" name="region" required>
                        <option  value="gr"> Greater Accra </option>
                        <option  value="cr"> Central </option>
                        <option  value="wr"> Western </option>
                        <option  value="er"> Eastern </option>
                        <option  value="nr"> Northern </option>
                    </select>
                </div>
                <?php 
                     $personnelle = API::get_data(API::get_api_url('list_sec_rep'));
                ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Representative</label>
                    <select class="form-control" name="rep_id" required>
                    <?php 
                        foreach($personnelle as $user){
                            $personnel = $user['personnel'];
                            $full_name = $personnel['first_name']." ".$personnel['other_names'].
                                  " ".$personnel['last_name'];
                    ?>
                        <option  value="<?php echo $user['system_user']['id']?>"> <?php echo strtoupper($full_name)?> </option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Location</label>
                    <div id="map"></div>
                </div>
                <input type="text" id="lat" name="lat"  hidden/>
                <input type="text" id="lng" name="lng" hidden/>
                <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <input type="reset" value="Reset" class="btn btn-danger">
                        <button type="submit" class="btn btn-primary">Create Secretariat</button>
                    </div>
            </form>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwpjbPox3yumBn7T5xfSAunYlkk8vk63k&callback=initialize">
            </script>
            </div>
        </div>
    </div>
</div>
