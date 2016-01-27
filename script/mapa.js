var directionsDisplay = new google.maps.DirectionsRenderer();
var directionsService = new google.maps.DirectionsService();

var request = {
 origin: $('#origen').val(),
 destination: $('#destino').val(),
 travelMode: google.maps.DirectionsTravelMode[$('#modo_viaje').val()],
 unitSystem: google.maps.DirectionsUnitSystem[$('#tipo_sistema').val()],
 provideRouteAlternatives: true
 };

 directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel($("#panel_ruta").get(0));
        directionsDisplay.setDirections(response);
    } else {
            alert("No existen rutas entre ambos puntos");
    }
});
$('#buscar').live('click', function(){
    rockAndRoll();
});
 
$('.opciones_ruta').live('change', function(){
    rockAndRoll();
});