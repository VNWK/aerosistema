$(document).ready(function(){

$('#crearUsuarios').submit(function(){
event.preventDefault();
data = $(this).serializeArray();
jQuery.ajax({
            url: 'scriptsSistema/creacion_usuarios.php',
            global: false,
            data: data,
            type: "POST",
            dataType: "html",
            success:function(ret5){
                if(ret5==0){
                    BootstrapDialog.alert({
                    title:'Error',
                    message:'Por favor introduzca todos los datos',
                    type:BootstrapDialog.TYPE_DANGER,
                    });
                }
                else
                    if(ret5==1){
                    BootstrapDialog.alert({    
                    title:'Exito!',
                    message:'Se ha insertado el usuario exitosamente',
                    type:BootstrapDialog.TYPE_SUCCESS,
                    callback:function(){location.reload();}
                    });
                    }
                    else
                        if(ret5==2){
                    BootstrapDialog.alert({
                    title:'Error',
                    message:'El usuario ya existe',
                    type:BootstrapDialog.TYPE_DANGER,
                    callback:function(){location.reload();}
                    });
                }
                else
                    {
                    BootstrapDialog.alert({
                    title:'Error',
                    message:'Se ha producido un error',
                    type:BootstrapDialog.TYPE_DANGER,
                    callback:function(){location.reload();}  
                    });
                }
           },
            error: function(xhr,status,errorThrown) {
                alert( "Se encontro un Problema!"+data);
                console.log( "Error: " + errorThrown );
                console.log( "Status: " + status );
                console.dir( xhr );
            }, 
        });
    });



$('#consultarUsuarios').submit(function(event){
event.preventDefault();
data = $(this).serializeArray();
jQuery.ajax({
            url: 'scriptsSistema/modificar_usuarios.php',
            global: false,
            data: data,
            type: "POST",
            dataType: "html",
            success:function(data){ 
                if(data == 0)
                {
                    BootstrapDialog.alert({
                        title:'Error',
                        type:BootstrapDialog.TYPE_DANGER,
                        message:'El Usuario no existe',
                        btnLabel:'Aceptar',
                        callback:function(){location.reload();}
                    });
                }
                else{
                modificarUsuario(data);}
         
                   },
            error: function(xhr,status,errorThrown) {
                alert( "Se encontro un Problema!"+data);
                console.log( "Error: " + errorThrown );
                console.log( "Status: " + status );
                console.dir( xhr );
            },  
        });
    });

});