<style>
  #map {
          height: 500px;
          width: 100%;
          background-color: grey;
        }
</style>
<?php include('../includes/api.php');?>
<div class="row">
    <div class="col-xs-offset-1 col-xs-10">
        <div class="box box-primary">
            <form role="form" method="post" action="../includes/actions/submit_data.php?page=<?php echo $page; ?>" >
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
                <div class="box-footer">
                    <div class="row">
                    <div class="col-xs-offset-8 col-xs-4">
                    <input type="reset" value="Reset" class="btn btn-danger">
                    <button type="submit" class="btn btn-primary">Create Secretariat</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwpjbPox3yumBn7T5xfSAunYlkk8vk63k&callback=initialize">
</script>
<!--script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkhzSPBGRblofnQZ2YtMmC5Lh2TTkAjuk&callback=initialize">
</script-->