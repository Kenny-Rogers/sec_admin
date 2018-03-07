<?php 
   include('../includes/api.php');
   //include('../includes/functions.php');
?>

<style>
  #map {
          height: 500px;
          width: 100%;
          background-color: grey;
        }
</style>
<script>
//     function initMap() {
//     var options = {
//         zoom: 12,
//         center: { lat: 5.603717, lng: -0.186964 }
//     }

//     var map = new google.maps.Map(document.getElementById('map'), options);

//  //$response = API::get_data("http://localhost/final_proj_api/public/get_users_list.php?user_type=location&for_user=patrol_team");?>
//     //document.getElementById("mypanel").innerHTML = " \n echo "hello"; ?>\n"+"" ; //"hello" + data;
//     // $data = $response['data']; 
//         //foreach($data as $data_obj){
//           //  $location = $data_obj['location'];
//                 //addMarker({coords:{lat: echo $location['geo_lat']; ?>, lng :" echo $location['geo_long']; ?>" }})
//          //    } ?>
//     addMarker({
//         coords: { lat: 5.603717, lng: -0.186964 },
//         content: 'hi there'
//     });

//     function addMarker(props) {
//         //creating a new marker
//         var marker = new google.maps.Marker({
//             position: props.coords,
//             map: map
//         });

//         //checking if an icon was provided
//         if (props.iconImage) {
//             marker.setIcon(props.iconImage);
//         }

//         //checking if info-content was provided
//         if (props.content) {
//             //infowindow
//             var infoWindow = new google.maps.InfoWindow({
//                 content: props.content
//             });

//             //adding the listner to the marker
//             marker.addListener('click', function () {
//                 infoWindow.open(map, marker);
//             });
//         }
//     }

// }

</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkhzSPBGRblofnQZ2YtMmC5Lh2TTkAjuk&callback=get_api_data">
</script>
<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        <div id="map"></div>
        <div id="mypanel"></div>
    </div>
</div>
