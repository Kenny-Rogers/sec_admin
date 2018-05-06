<?php  include('../../../includes/api.php');
      $user_id = $_GET['uid'];
      $personnel = API::get_data(API::get_api_url('personnel_info')."&uid=$user_id");
?>
<form role="form" method="post" action="../includes/actions/submit_data.php?page=edit_personnel&rpage=list_personnel">
    <div class="box-body">
    <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $personnel['id']; ?>">
        <label for="exampleInputEmail1">First Name</label>
        <input class="form-control" id="exampleInputEmail1" name="first_name" value="<?php echo $personnel['first_name']; ?>" placeholder="First Name" required type="text">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Last Name</label>
        <input class="form-control" id="exampleInputPassword1" name="last_name" value="<?php echo $personnel['last_name']; ?>" placeholder="Last Name" required type="text">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Other Names</label>
        <input class="form-control" id="exampleInputPassword1" name="other_names" value="<?php echo $personnel['other_names']; ?>" placeholder="Other Names" required type="text">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Staff Number</label>
        <input class="form-control" id="exampleInputPassword1" name="staff_no" value="<?php echo $personnel['staff_no']; ?>" placeholder="Staff Number" required type="text">
    </div>
    <!-- <div class="form-group">
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
    </div> -->
    <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <input type="reset" value="Reset" class="btn btn-danger">
        <button type="submit" class="btn btn-primary">Edit Personnel Information</button>
   </div>
</form>
