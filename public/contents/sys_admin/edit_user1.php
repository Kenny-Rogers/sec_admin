<?php 
    include('../includes/api.php');
    $user = API::get_data(API::get_api_url('user_info')."&uid=".$_GET['uid']);
    $personnel = $user[0]['personnel'];
    $user_details = $user[0]['system_user'];
?>

<div class="row">
    <div class="col-xs-offset-1 col-xs-10">
        <div class="box box-primary">
            <!--div class="box-header with-border">
                <h3 class="box-title">Quick Example</h3>
            </div-->
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="../includes/actions/submit_data.php?page=<?php echo $page; ?>">
                <input type="hidden" name="uid" value="<?php echo $user_details['id'];?>">
                <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input class="form-control" id="exampleInputEmail1" name="first_name" value="<?php echo $personnel['first_name']; ?>" required type="text">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Last Name</label>
                    <input class="form-control" id="exampleInputPassword1" name="last_name" value="<?php echo $personnel['last_name']; ?>" required type="text">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Other Names</label>
                    <input class="form-control" id="exampleInputPassword1" name="other_names" value="<?php echo $personnel['other_names']; ?>" required type="text">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Staff Number</label>
                    <input class="form-control" id="exampleInputPassword1" name="staff_no" value="<?php echo $personnel['staff_no']; ?>" required type="text">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Rank</label>
                    <select class="form-control" name="rank" required>
                        <option <?php if($personnel['rank'] == 'asp'){ echo "selected='selected'";} ?> value="asp"> ASP </option>
                        <option <?php if($personnel['rank'] == 'dsp'){ echo "selected='selected'";} ?> value="dsp"> DSP </option>
                        <option <?php if($personnel['rank'] == 'dcop'){ echo "selected='selected'";} ?> value="dcop"> DCOP </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Role</label>
                    <div class="radio">
                        <label>
                            <input name="role" id="optionsRadios1" value="dispatcher" <?php if($user_details['role'] == 'dispatcher'){ echo "checked=''";} ?> type="radio">
                            Dispatcher
                        </label>
                        <label>
                            <input name="role" id="optionsRadios1" value="secretariat representative" <?php if($user_details['role'] == 'secretariat representative'){ echo "checked='checked'";} ?> type="radio">
                            Secretariat Representative
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input class="form-control" id="exampleInputPassword1" name="user_name"  value="<?php echo $user_details['user_name']; ?>" required type="text">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $user_details['password']; ?>" required type="text">
                </div>
                <div class="box-footer">
                    <div class="row">
                    <div class="col-xs-offset-8 col-xs-4">
                    <input type="reset" value="Reset" class="btn btn-danger">
                    <button type="submit" class="btn btn-primary">Edit User Info</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>