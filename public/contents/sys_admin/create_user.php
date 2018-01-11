<?php include('../includes/api.php');?>
<div class="row">
    <div class="col-xs-offset-1 col-xs-10">
        <div class="box box-primary">
            <form role="form" method="post" action="../includes/actions/submit_data.php?page=<?php echo $page; ?>">
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