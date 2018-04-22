<?php include '../includes/api.php';?>
<div class="row">
    <div class='col-md-offset-9 col-md-3'>
        <!--a style="color:white" href="?page=reg_personnel" -->
        <button type="submit" class="btn btn-info btn-fill btn-wd" data-toggle="modal" data-target="#registerModal">
            Create New Personnel
        </button>
        <!--/a-->
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-offset-1 col-xs-10">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Personnel</h3>
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
                                            aria-label="Rendering engine: activate to sort column descending">Staff Number</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 231.25px;" aria-label="Browser: activate to sort column ascending">Full Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 196.717px;" aria-label="Platform(s): activate to sort column ascending">Rank</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 156.183px;" aria-label="Engine version: activate to sort column ascending">Secretariat</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 112.15px;" aria-label="CSS grade: activate to sort column ascending">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $personnelle = API::get_data(API::get_api_url($page));

                                        foreach ($personnelle as $personnel) {
                                            $full_name = $personnel['first_name'] . " " . $personnel['other_names'] .
                                                " " . $personnel['last_name'];

                                            $secretariat = API::get_data(API::get_api_url('sec_info') . "&uid=" . $personnel['sec_id']);
                                    ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">
                                                <?php echo $personnel['staff_no']; ?>
                                            </td>
                                            <td>
                                                <?php echo strtoupper($full_name); ?>
                                            </td>
                                            <td>
                                                <?php echo strtoupper($personnel['rank']); ?>
                                            </td>
                                            <td>
                                                <?php echo strtoupper($secretariat[0]['name']) ?>
                                            </td>
                                            <td>
                                                <a title="Edit Record" href="?page=edit_user&uid=<?php echo $system_user['system_user']['id']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a> &ensp;&ensp;&ensp;&ensp;
                                                <a title="View Record" href="?page=edit_user&uid=<?php echo $system_user['system_user']['id']; ?>">
                                                    <i class="fa fa-info-circle"></i>
                                                </a>&ensp;&ensp;&ensp;&ensp;
                                                <a title="Delete Record" href="?page=delete_user&uid=<?php echo $system_user['system_user']['id']; ?>">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php }?>
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
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input class="form-control" id="exampleInputEmail1" name="first_name" placeholder="First Name" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Last Name</label>
                            <input class="form-control" id="exampleInputPassword1" name="last_name" placeholder="Last Name" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Other Names</label>
                            <input class="form-control" id="exampleInputPassword1" name="other_names" placeholder="Other Names" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Staff Number</label>
                            <input class="form-control" id="exampleInputPassword1" name="staff_no" placeholder="Staff Number" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Rank</label>
                            <select class="form-control" name="rank" required>
                                <option value="asp"> ASP </option>
                                <option value="dsp"> DSP </option>
                                <option value="dcop"> DCOP </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Secretarait Details</label>
                            <select class="form-control" onchange="get_details('region', this.value, 'type')">
                                <option value="-1"> Choose a Region....</option>
                                <option value="gr"> Greater Accra </option>
                                <option value="cr"> Central </option>
                                <option value="wr"> Western </option>
                                <option value="er"> Eastern </option>
                                <option value="nr"> Northern </option>
                            </select>
                            <hr>
                            <div id="type">
                                <select class="form-control">
                                    <option value=""> </option>
                                </select>
                            </div>
                            <hr>
                            <div id="station_name">
                                <select class="form-control" name="sec_id" required>
                                    <option value=""> </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <input type="reset" value="Reset" class="btn btn-danger">
                        <button type="submit" class="btn btn-primary">Create New Personnel</button>
                    </div>
            </div>
        </div>
    </div>