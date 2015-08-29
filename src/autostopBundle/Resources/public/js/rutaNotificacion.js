
$( "#rutaNotificacion" ).click(function(){

    /* select the div you want to be a dialog, in our case it is 'basicModal'
    you can add parameters such as width, height, title, etc. */

    var $mymodal = $("<div id='basicModal'><h4>Maria va ser un recorrido:</h4><div class='form-group'><p>Desde:</p></div><div class='form-group'><p>Hasta:</p></div></div>");
    $('body').append($mymodal);
    $( "#basicModal" ).dialog({
        modal: true,
        title: "Nueva Ruta",
		draggable: false,
		resizable: false,
        buttons: {
            "Pedir Aventon": function() {
                $( this ).dialog( "close" );
            },
            "Cancelar": function() {
                $( this ).dialog( "close" );
            }
        }
    });
    $('.ui-widget-overlay').css('opacity', 0.6);
});