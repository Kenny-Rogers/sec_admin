<?php 
   include('../includes/api.php');
?>
<div class="notif">
    <div id="data_returned" ></div>
</div>
<style>
  #map {
          height: 500px;
          width: 100%;
          background-color: grey;
        }
</style>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwpjbPox3yumBn7T5xfSAunYlkk8vk63k&callback=get_api_data">
</script>
<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        <div id="map"></div>
        <div id="mypanel"></div>
    </div>
</div>
