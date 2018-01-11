<div class="row">
    <div class="col-xs-offset-1 col-xs-10">
        <div class="box box-primary">
            <!--div class="box-header with-border">
                <h3 class="box-title">Quick Example</h3>
            </div-->
            <!-- /.box-header -->
            <!-- form start -->
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
                        <option  value="asp"> ASP </option>
                        <option  value="dsp"> DSP </option>
                        <option  value="dcop"> DCOP </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Secretarait Details</label>
                    <select class="form-control"  onchange="get_details('region', this.value, 'type')">
                        <option  value="-1"> Choose a Region....</option>
                        <option  value="gr"> Greater Accra </option>
                        <option  value="cr"> Central </option>
                        <option  value="wr"> Western </option>
                        <option  value="er"> Eastern </option>
                        <option  value="nr"> Northern </option>
                    </select><hr>
                    <div id="type">
                    <select class="form-control">
                        <option  value="">  </option>
                    </select></div><hr>
                    <div id="station_name">
                     <select class="form-control" name="sec_id" required>
                        <option  value="">  </option>
                    </select>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                    <div class="col-xs-offset-8 col-xs-4">
                    <input type="reset" value="Reset" class="btn btn-danger">
                    <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>