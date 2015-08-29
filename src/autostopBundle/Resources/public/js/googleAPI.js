/**
 * Created by lk on 16/06/2015.
 */
///<reference path="js/jquery-2.1.0-vsdoc.js"/>
///<reference path="js/google-maps-3-vs-1-0-vsdoc.js"/>
var map;
var waypts = [];
var start;
var end;
var directionDisplay;
var directionsService = new google.maps.DirectionsService();

function initialize() {
    directionDisplay = new google.maps.DirectionsRenderer();
    navigator.geolocation.getCurrentPosition(function (position) {
        //Ubicacion actual del usuario
        var espol = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        //Opciones del mapa
        var mapOptions = {
            zoom: 17,
            center: espol,
            mapTypeId:google.maps.MapTypeId.ROADMAP,
            disableDefaultUI:true
        }
        //Muestra el mapa
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center); 

        directionDisplay.setMap(map);
        //Agrega un mmanejador del evento click sobre el mapa
        google.maps.event.addListener(map, 'click', addLatLng);

    });
}
function addLatLng(event) {

    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(event.latLng.A, event.latLng.F),
        title: '#',
        draggable: true,
        map: map
    });
    if (start == null) {
        start = new google.maps.LatLng(event.latLng.A, event.latLng.F);
        return;
    } else if (end == null) {
        end = new google.maps.LatLng(event.latLng.A, event.latLng.F);
    } else {
        waypts.push({
            location: end,
            stopover: false
        });
        end = new google.maps.LatLng(event.latLng.A, event.latLng.F);
    }
    var request = {
        origin: start,
        destination: end,
        waypoints: waypts,
        optimizeWaypoints: true,
        travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionDisplay.setDirections(response);
            /*var route = response.routes[0];
             var summaryPanel = document.getElementById('directions_panel');
             summaryPanel.innerHTML = '';
             //
             for(var i=0;i<route.legs.length;i++){
             var routeSegment=i+1;
             summaryPanel.innerHTML+='<b>Route Segment: '+routeSegment+'</b><br>';
             summaryPanel.innerHTML+=route.legs[i].start_address+'to';
             summaryPanel.innerHTML += route.legs[i].end_address+'<br>';
             summaryPanel.innerHTML+= route.legs[i].distance.text+'<br><br>';
             }*/
        }
    });
}

google.maps.event.addDomListener(window, 'load', initialize);