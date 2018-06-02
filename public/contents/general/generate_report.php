<div class="row">
    <div class="col-xs-offset-1 col-xs-10">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Complaints</h3>
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
                                            aria-label="Rendering engine: activate to sort column descending">Complainant Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 231.25px;" aria-label="Browser: activate to sort column ascending">Complaint Type</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 196.717px;" aria-label="Platform(s): activate to sort column ascending">Complaint Details</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 156.183px;" aria-label="Engine version: activate to sort column ascending">Current Stage</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 112.15px;" aria-label="CSS grade: activate to sort column ascending">Date of Complaint</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $complaint_details = API::get_data(API::get_api_url("generate_report"));

                                        foreach ($complaint_details as $complaint_detail) {
                                            $complain = $complaint_detail["complain"];
                                            $complainant = $complaint_detail["complainant"];
                                            $complain_action = $complaint_detail["complain_action"];
                                    ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">
                                                <?php echo ucwords($complainant['first_name']." ".$complainant['last_name']); ?>
                                            </td>
                                            <td>
                                                <?php echo ucwords($complain["type_issue"]); ?>
                                            </td>
                                            <td>
                                                <?php echo ucwords($complain["nature_of_issue"]); ?>
                                            </td>
                                            <td>
                                                <?php echo ucwords($complain_action["type_of_action"]); ?>
                                            </td>
                                            <td>
                                                <?php echo $complain["date_time_of_report"]; ?>
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