function get_details(column, value, display) {
    if (value.length == 0) {
        document.getElementById(display).innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(display).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../includes/actions/get_details.php?col="+ column +"&value="+ value , true);
        xmlhttp.send();
    }
}

function get_api_data() {
    url = "http://localhost/final_proj_api/public/get_users_list.php?user_type=location&for_user=patrol_team";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            initMap(data);
        } 
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    
}

function initMap(map_data) {

    var team_locations = map_data.data;
    var size = Object.keys(team_locations).length;
    var display_size = 0;
    var total_lat = 0;
    var total_lng = 0 ;

    //adding all the latitudes and longitudes
    for (var index = 1; index <= size; index++) {
        if (team_locations[index].location.geo_lat !== "" && 
            team_locations[index].location.geo_long !== ""){

            total_lat += parseFloat(team_locations[index].location.geo_lat);
            total_lng += parseFloat(team_locations[index].location.geo_long);

            display_size++;
        }
    }

    //calculating the map center
    var center_lat = total_lat / display_size;
    var center_lng = total_lng / display_size;

    //setting the map options
    var options = {
        zoom: 14,
        center: { lat: center_lat, lng: center_lng }
    }

    //creating a new map
    var map = new google.maps.Map(document.getElementById('map'), options);
    
    function addMarker(props) {
        //creating a new marker
        var marker = new google.maps.Marker({
            position: props.coords,
            map: map
        });

        //checking if an icon was provided
        if (props.iconImage) {
            marker.setIcon(props.iconImage);
        }

        //checking if info-content was provided
        if (props.content) {
            //infowindow
            var infoWindow = new google.maps.InfoWindow({
                content: props.content
            });

            //adding the listner to the marker
            marker.addListener('click', function () {
                infoWindow.open(map, marker);
            });
        }
    }

    //adding the markers 
    var current_lat = 0;
    var current_lng = 0;
    var description = "";
    for (var index = 1; index <= size; index++) {
        if (team_locations[index].location.geo_lat !== "" &&
            team_locations[index].location.geo_long !== "") {

            current_lat = parseFloat(team_locations[index].location.geo_lat);
            current_lng = parseFloat(team_locations[index].location.geo_long);
            description = "<h4><b>" + team_locations[index].patrol_team.team_name.toUpperCase() +"<b></h4><br>"
                + "Status: <u>" + team_locations[index].patrol_team.status.toUpperCase()+"</u>";

            addMarker({
                coords: { lat: current_lat, lng: current_lng },
                content: description
            });
        }
    }
    
}