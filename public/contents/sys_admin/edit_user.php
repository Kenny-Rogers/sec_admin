<?php 
    include('../../../includes/api.php');
    $user_id = $_GET['uid'];
    $results = API::get_data(API::get_api_url('user_info1')."&uid=$user_id");
    $result1 = array_shift($results);
    $person = $result1['system_user'];
    //print_r($person);
?>
<form role="form" method="post" action="../includes/actions/submit_data.php?page=edit_user&rpage=man_users">
    <input type="hidden" name="id" value="<?php echo $person["id"]; ?>">
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
                if($person["personnel_id"] == $personnel["id"]){
        ?>
           <option selected="true" value="<?php echo $personnel['id']?>"> <?php echo strtoupper($full_name)?> </option>
        <?php } else{?>
            <option  value="<?php echo $personnel['id']?>"> <?php echo strtoupper($full_name)?> </option>
        <?php } }?>
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
        <input class="form-control" id="exampleInputPassword1" name="user_name" value="<?php echo $person["user_name"]; ?>" placeholder="Username" required type="text">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $person["password"]; ?>" placeholder="Password" required type="password">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <input type="reset" value="Reset" class="btn btn-danger">
        <button type="submit" class="btn btn-primary">Edit System User Information</button>
   </div>
</form>