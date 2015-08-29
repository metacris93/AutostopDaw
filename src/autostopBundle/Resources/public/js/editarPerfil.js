/**
 * Created by lk on 26/06/2015.
 */
$.fn.editable.defaults.mode = 'inline';
$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
$.fn.editableform.buttons = '<button type="submit" class="privateBtn btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
    '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';
function editarUsuario(){
    $('#username').css("cursor","pointer");
    $('#username').editable({
        type:'text',
        pk:1,
        title:'ingrese...',
        validate: function(value) {
            if($.trim(value) == '')
                alert('campo requerido');
            else if($.trim(value).length>10)
                return 'Solo se permiten 10 caracteres';
        },
        success:function(response,newvalue){
            alert("actualizacion exitosa");
        }
    });
    $('#username').css("border-bottom","none");
}
function editarFecha(){
    $('#signup').css("cursor","pointer");
    $('#signup').editable(
        {
            type: 'combodate',
            date: {
                format: 'yyyy/mm/dd',
                viewformat: 'dd/mm/yyyy',
                weekStart: 1
            },
            success:function(response,newvalue){
                alert("actualizacion exitosa");
            }
        });
    $('#signup').css("border-bottom","none");
}
function editarNombre(){
    $('#nombres').css("cursor","pointer");
    $('#nombres').editable({
        type:'text',
        pk:1,
        title:'ingrese...',
        validate: function(value) {
            if($.trim(value) == '')
                alert('campo requerido');
            else if($.trim(value).length>30)
                return 'Solo se permiten 30 caracteres';
        },
        success:function(response,newvalue){
            alert("actualizacion exitosa");
        }
    });
    $('#nombres').css("border-bottom","none");
}
function editarApellido(){
    $('#apellidos').css("cursor","pointer");
    $('#apellidos').editable({
        type:'text',
        pk:1,
        title:'ingrese...',
        validate: function(value) {
            if($.trim(value) == '')
                alert('campo requerido');
            else if($.trim(value).length>30)
                return 'Solo se permiten 30 caracteres';
        },
        success:function(response,newvalue){
            alert("actualizacion exitosa");
        }
    });
    $('#apellidos').css("border-bottom","none");
}

function editarPlaca(){
    $('#placa').css('cursor','pointer');
    $('#placa').editable({
        type:'text',
        pk:1,
        title:'placa',
        validate: function(value){
            if($.trim(value)==''){
                $(this).text("no tiene auto");
            }else{
                var tester = /^[A-Za-z]{3}-[0-9]{3,4}$/;
                if(!tester.test(value)){
                    return "patron incorrecto, Ej: GXY-1234";
                }
            }
        },
        success:function(response,newvalue){
            alert("actualizacion exitosa");
        }
    });
    $('#placa').css("border-bottom","none");
}

function editarImagen(){
    $('#avatar').css("cursor","pointer");
    try {
        document.createElement('IMG').appendChild(document.createElement('B'));
    } catch(e) {
        Image.prototype.appendChild = function(el){}
    }

    var last_gritter
    $('#avatar').editable({
        type: 'image',
        name: 'avatar',
        value: null,
        image: {
            //specify ace file input plugin's options here
            btn_choose: 'Change Avatar',
            droppable: true,
            maxSize: 110000,//~100Kb

            //and a few extra ones here
            name: 'avatar',//put the field name here as well, will be used inside the custom plugin
            on_error : function(error_type) {//on_error function will be called when the selected file has a problem
                if(last_gritter) $.gritter.remove(last_gritter);
                if(error_type == 1) {//file format error
                    last_gritter = $.gritter.add({
                        title: 'File is not an image!',
                        text: 'Please choose a jpg|gif|png image!',
                        class_name: 'gritter-error gritter-left'
                    });
                } else if(error_type == 2) {//file size rror
                    last_gritter = $.gritter.add({
                        title: 'File too big!',
                        text: 'Image size should not exceed 100Kb!',
                        class_name: 'gritter-error gritter-left'
                    });
                }
                else {//other error
                }
            },
            on_success : function() {
                $.gritter.removeAll();
            }
        },
        url: function(params) {
            // ***UPDATE AVATAR HERE*** //
            //for a working upload example you can replace the contents of this function with
            //examples/profile-avatar-update.js

            var deferred = new $.Deferred

            var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
            if(!value || value.length == 0) {
                deferred.resolve();
                return deferred.promise();
            }


            //dummy upload
            setTimeout(function(){
                if("FileReader" in window) {
                    //for browsers that have a thumbnail of selected image
                    var thumb = $('#avatar').next().find('img').data('thumb');
                    if(thumb) $('#avatar').get(0).src = thumb;
                }

                deferred.resolve({'status':'OK'});

                if(last_gritter) $.gritter.remove(last_gritter);
                last_gritter = $.gritter.add({
                    title: 'Avatar Updated!',
                    text: 'Uploading to server can be easily implemented. A working example is included with the template.',
                    class_name: 'gritter-info gritter-left'
                });

            } , parseInt(Math.random() * 800 + 800))

            return deferred.promise();
        },

        success: function(response, newValue) {
        }
    });
}
function init(){
    $('#username').on("mouseover click", editarUsuario);
    $('#signup').on("mouseover click", editarFecha);
    $('#nombres').on("mouseover click", editarNombre);
    $('#apellidos').on("mouseover click", editarApellido);
    $('#avatar').on("mouseover click", editarImagen);
    $('#placa').on('mouseover click', editarPlaca);

    $('.privateBtn').on('click',function(evt){
        alert('click');
    });
}
window.addEventListener("load", init, false);
