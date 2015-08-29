$('#formRuta').submit(function(){
    $.ajax({        
        type:'get',
        url: Routing.generate('daw_autostop_nueva_ruta',{'fecha':$('input[name=fecha]').val(),
                                                        'hora':$('input[name=hora]').val(),
                                                        'capacidad':$('input[name=capacidad]').val(),
                                                        'costo':$('input[name=costo]').val()}),
        success:function(data){
            console.log(data);
        }
    });
});



