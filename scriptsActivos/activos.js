$(document).ready(function(){

$('#consultaActivos').submit(function(){
event.preventDefault();
data = $(this).serializeArray();
// Ajax Called When Page is Load/Ready (Load Manufacturer)
jQuery.ajax({
            url: 'scriptsActivos/datosActivos.php',
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
                        message:'El Activo no existe',
                        btnLabel:'Aceptar',
                        callback:function(){location.reload();}
                    });
                }
                else{
                modificarActivos(data);}
         
                   },
            error: function(xhr,status,errorThrown) {
                alert( "Se encontro un Problema!"+data);
                console.log( "Error: " + errorThrown );
                console.log( "Status: " + status );
                console.dir( xhr );
            },  
        }); 
    });



$('#consultaActivos2').submit(function(){
event.preventDefault();
data = $(this).serializeArray();
// Ajax Called When Page is Load/Ready (Load Manufacturer)
jQuery.ajax({
            url: 'scriptsActivos/datosActivos2.php',
            global: false,
            data: data,
            type: "POST",
            dataType: "html",
            success:function(ret){
                // console.log(ret);
                   if(ret == 0)
                {
                    BootstrapDialog.alert({
                        title:'Error',
                        type:BootstrapDialog.TYPE_DANGER,
                        message:'El Activo no existe',
                        btnLabel:'Aceptar',
                        callback:function(){location.reload();}
                    });
                }
                else{
                BootstrapDialog.show({
                    title:'Datos de Activo',
                    message:ret,
                    type:BootstrapDialog.TYPE_WARNING,
                    closable:true,
                    draggable:true,
                     buttons: [{
                        label: 'Exportar Excel',
                        cssClass: 'btn-success',
                        action: function(){
                                     $('#ida').battatech_excelexport({
                                        containerid: "ida"
                                        , datatype: "Table"
                                        , worksheetName: 'Datos de Activo'
                                        
                                    });
                        }
                    }, 
                    {
                        label: 'Exportar PDF',
                        cssClass: 'btn-danger',
                        action: function(data){
                             data = {table:$('#ida').prop('outerHTML')};
                        post('pdf.php',data);
                           
                        }
                     

                    }]
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

$('#creacion_datos').submit(function(event){
    event.preventDefault();
data =$(this).serializeArray();

jQuery.ajax({
            url: 'scriptsActivos/insertActivos.php',
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
                    message:'Se ha insertado el activo exitosamente',
                    type:BootstrapDialog.TYPE_SUCCESS,
                    callback:function(){location.reload();}
                    });
                    }
                    else
                        if(ret5==2){
                    BootstrapDialog.alert({
                    title:'Error',
                    message:'El activo ya existe',
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

$('#buscarActivos').click(function(){
data ={status: $('#selectActivos').val()};

jQuery.ajax({
            url: 'scriptsActivos/listaActivos.php',
            global: false,
            data: data,
            type: "POST",
            dataType: "html",
            success:function(ret4){
                if(ret4==0){
                    BootstrapDialog.alert({
                    title:'Error',
                    message:'No existen activos bajo esta descripcion',
                    type:BootstrapDialog.TYPE_DANGER,
                    callback:function(){location.reload();} 
                    });
                }
                else
                    if(ret4==2){
                    BootstrapDialog.alert({    
                    title:'Error',
                    message:'No se ha cargado nigun dato',
                    type:BootstrapDialog.TYPE_DANGER,
                    callback:function(){location.reload();}
                    });
                    }
                    else{
                BootstrapDialog.show({
                    title:'Datos de Activos',
                    message:ret4,
                    type:BootstrapDialog.TYPE_WARNING,
                    size:BootstrapDialog.SIZE_WIDE,
                    closable:true,
                    draggable:true,
                     buttons: [{
                        label: 'Exportar Excel',
                        cssClass: 'btn-success',
                        action: function(){
                            $('#idc').battatech_excelexport({
                                        containerid: "idc"
                                        , datatype: "Table"
                                        , worksheetName: 'Datos de Activo'
                                        
                                    });
                            
                        }
                    }, 
                    {
                        label: 'Exportar PDF',
                        cssClass: 'btn-danger',
                        action: function(){
                            data = {table:$('#idc').prop('outerHTML')};
                        post('pdf.php',data);
                        }
                     

                    }]
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
});
