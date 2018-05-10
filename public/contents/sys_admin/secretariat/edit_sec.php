<?php 
    include('../../../../includes/api.php');
      $user_id = $_GET['uid'];
      $results = API::get_data(API::get_api_url('sec_info')."&uid=$user_id");
      $secretariat = array_shift($results);
?>
<style>
  #map {
          height: 500px;
          width: 100%;
          background-color: grey;
        }
</style>
<form role="form" method="post" action="../includes/actions/submit_data.php?page=edit_sec&rpage=man_sec" >
    <input type="hidden" name="id" value="<?php echo $secretariat["id"]?>">
    <div class="box-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Name Of Police Station</label>
        <input class="form-control" id="exampleInputEmail1" name="name" value="<?php echo $secretariat["name"]?>" placeholder="Police Station" required type="text">
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
    <input type="text" id="lat" name="lat" value="<?php echo $secretariat["lat"]?>" hidden/>
    <input type="text" id="lng" name="lng"value="<?php echo $secretariat["lng"]?>" hidden/>
    <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Edit Secretariat Information</button>
    </div>
</form>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwpjbPox3yumBn7T5xfSAunYlkk8vk63k&callback=initialize">
</script>
<!--script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkhzSPBGRblofnQZ2YtMmC5Lh2TTkAjuk&callback=initialize">
</script-->