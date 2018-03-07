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

function initMap() {
    var options = {
        zoom: 12,
        center: { lat: 5.603717, lng: -0.186964 }
    }

    var map = new google.maps.Map(document.getElementById('map'), options);


    //listen for click on map
    google.maps.event.addListener(map, 'click',
        function (event) {
            //add marker to the map
            addMarker({ coords: event.latLng });
        }
    );

    /*
    //add marker
    var marker = new google.maps.Marker({
      position: {lat: 5.603717, lng: -0.186964},
      map: map
    });

    //infowindow
    var infoWindow = new google.maps.InfoWindow({
      content:'<h1><u>Accra</u></h1>'
      });

    //adding the listner to the marker
    marker.addListener('click', function(){
      infoWindow.open(map, marker);
    });*/

    // Add Marker function
    /*
            //v1
            addMarker({lat: 5.603717, lng: -0.186964});
            addMarker({lat: 6.603717, lng: -0.186964});
            
            function addMarker(coords){
               var marker = new google.maps.Marker({
                position: coords,
                map: map
              });
            }
    */
    //v2
    //maker with image
    // addMarker({
    //     coords: { lat: 5.603717, lng: -0.186964 },
    //     iconImage: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/car.png'
    // });

    //marker with content
    addMarker({
        coords: { lat: 5.603717, lng: -0.186964 },
        content: 'hi there'
    });


    //LOOP can be used to the addMarker call

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

}

function get_api_data(url ) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("mypanel").innerHTML += this.responseText;
            return this.responseText;
        }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}