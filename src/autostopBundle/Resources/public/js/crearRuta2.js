///<reference path="js/jquery-2.1.0-vsdoc.js"/>
///<reference path="js/google-maps-3-vs-1-0-vsdoc.js"/>

var directionsService = new google.maps.DirectionsService();
var infowindow = new google.maps.InfoWindow();
var directionDisplay;
var mapa;
var inicio = null;
var fin = null;
var waypts = [];
var markers = [];	
var Json = '';
var formValues={};

function main(){
    geoLocalizacion();
    $('#crearRuta').click(function(){
        $('.rutaReset').fadeIn(1000);        
        calcRoute();
    });    
}

function addMarker(latlng) {
    markers.push(new google.maps.Marker({
      position: latlng, 
      map: mapa,
      draggable:false,
      icon: "http://maps.google.com/mapfiles/marker" + String.fromCharCode(markers.length + 65) + ".png"
    }));    
}

function calcRoute() {
    if (inicio == null) {
      alert("Click on the map to add a start point");
      return;
    }
    
    if (fin == null) {
      alert("Click on the map to add an end point");
      return;
    }
    
    var mode = google.maps.DirectionsTravelMode.DRIVING;
    var request = {
        origin: inicio,
        destination: fin,
        waypoints: waypts,
        travelMode: mode,
        optimizeWaypoints: true,
        avoidHighways: false
    };
    
      directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
          var route = response.routes[0];
          $('#exampleModal').modal('show');
          /*obj = new Object();
          obj["latinicio"] = markers[0].position.lat();
          obj["lnginicio"] = markers[0].position.lng();
          obj["latfin"] = markers[markers.length-1].position.lat();
          obj["lngfin"] = markers[markers.length-1].position.lng();
          for(var i = 1 ; i < markers.length-1 ; i++){
              obj["lat"+i] = markers[i].position.lat();
              obj["lng"+i] = markers[i].position.lng();
          }
          obj["size"] = markers.length;*/
              /*var jsone = {"ruta":[{"latitud":"2.5","longitud":"-79.6"},
                                  {"latitud":"5.9","longitud":"50.4"},
                                  {"latitud":"25.6","longitud":"25.6"} 
                                 ]
                         };*/
          Json = '{"ruta":[';
          for( var i = 0 ; i < markers.length ; i++ ){
              Json = Json + '{"latitud":"'+markers[i].position.lat()+'",'+'"longitud":"'+markers[i].position.lng()+'"}';
              if(i < markers.length-1){ Json = Json + ','; }
          }
          Json = Json + ']}';
          /*var jsone = JSON.parse(Json);    
          $.ajax({
              type:'GET',
              url:Routing.generate('daw_autostop_puntos'),
              data:jsone,
              contentType: 'application/json',
              success: function (data, textStatus, jqXHR) {
                  result = JSON.parse(data);
                  console.log(result);              
              }
          });*/
		/*var points_text = "", format = "raw";
		if (document.getElementById("json").checked) {
			format = "json";
			points_text += 'var routeCenter = ' + serializeLatLng(response.routes[0].bounds.getCenter()) + ';\n';
			points_text += 'var routeSpan = ' + serializeLatLng(response.routes[0].bounds.toSpan()) + ';\n';
			points_text += 'var routePoints = [\n'
		}*/
		/*response.routes[0].bounds.getCenter.lng
		var nPoints = response.routes[0].overview_path.length;
		for (var i = 0; i < nPoints; i++) { 
			if ( format == "json" ) {
				points_text += '\t' + serializeLatLng(response.routes[0].overview_path[i]) + (i < (nPoints - 1) ? ',\n' : '');
			} else {
				points_text += response.routes[0].overview_path[i].lat() + ',' + response.routes[0].overview_path[i].lng() + '\n';
			}
		}
		if ( format == "json" ) {
			points_text += '\n];'
		}
		var points_textarea=document.getElementById("points_textarea");
		points_textarea.value = points_text;*/
        clearMarkers();
	directionDisplay.setDirections(response);
      }
    });
  }

function showError(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            alert("El requerimiento negado por el usuario");
            break;
        case error.POSITION_UNAVAILABLE:
            alert("Informacion de localizacion no disponible");
            break;
        case error.TIMEOUT:
            alert("Tiempo de espera expirado");
            break;
        case error.UNKNOWN_ERROR:
            alert("ERROR DESCONOCIDO");
            break;
    }
}

function showPosition(position){
    directionDisplay = new google.maps.DirectionsRenderer();
    // Create a Google coordinate object for where to center the map
    var latlng = new google.maps.LatLng( position.coords.latitude, position.coords.longitude );
    var myOptions = {
      zoom:15,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      draggableCursor: "pointer",
      center: latlng
    }
    mapa = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
    directionDisplay.setMap(mapa);
    // Place a Google Marker at the same location as the map center 
    // When you hover over the marker, it will display the title
	var marker = new google.maps.Marker( { 
        position: latlng,     
        map: mapa,      
        title: "Te encontramos"
    });
    var contentString = "<strong>"+marker.getTitle()+"</strong>"
    var infowindow = new google.maps.InfoWindow( { content: contentString } );
    // Set event to display the InfoWindow anchored to the marker when the marker is clicked.
    google.maps.event.addListener( marker, 'click', function() { infowindow.open( mapa, marker ); });
    // Manejar el evento de click en el mapa para colocar los marcadores
    google.maps.event.addListener(mapa, 'click', function(event) {
      if (inicio == null) {
        inicio = event.latLng;
        addMarker(inicio);
      } else if (fin == null) {
        fin = event.latLng;
        addMarker(fin);
      } else {
        if (waypts.length < 9) {
          waypts.push({ location: fin, stopover: true });
          fin = event.latLng;
          addMarker(fin);
        } else {
          alert("Se alcanzo el maximo numero de waypoints");
        }
      }
    });
}

function geoLocalizacion(){
    if(navigator.geolocation){
         navigator.geolocation.getCurrentPosition(showPosition,showError);
    }else {
         alert("GeoLocation no es soportado por el navegador");
    }
}

function clearMarkers() {
    for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(null);
    }
}

function clearWaypoints() {
    markers = [];
    inicio = null;
    fin = null;
    waypts = [];
}

function reset() {
    clearMarkers();
    clearWaypoints();
    directionDisplay.setMap(null);
    directionDisplay.setPanel(null);
    directionDisplay = new google.maps.DirectionsRenderer();
    directionDisplay.setMap(mapa);
}

$('#enviarRuta').click(function(e){
    var jsone = JSON.parse(Json);
    $.each($('#formRuta').serializeArray(), function (i, field){
        formValues[field.name] = field.value;
    });
    $.ajax({
              type:'GET',
              url:Routing.generate('daw_autostop_nueva_ruta'),
              data:{"formulario":formValues,"puntos":jsone},
              //data:datos,
              contentType: 'application/json',
              success: function (data, textStatus, jqXHR) {
                   $('#exampleModal').modal('hide');         
              }
          });
    e.preventDefault();      
});

google.maps.event.addDomListener(window, 'load', main);