<style>
#map {
        height: 500px;
        width: 100%;
        background-color: grey;
       }
</style>
<script>
      function initMap() {
        var uluru = {lat: 5.6037, lng: 0.1870};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: accra,
          map: map
        });
      }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkhzSPBGRblofnQZ2YtMmC5Lh2TTkAjuk&callback=initMap">
</script>
<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        <div id="map"></div>
    </div>
</div>