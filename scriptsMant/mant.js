$(document).ready(function(){

$('#consultaMant').submit(function(){
event.preventDefault();
data = $(this).serializeArray();
// Ajax Called When Page is Load/Ready (Load Manufacturer)
jQuery.ajax({
            url: 'scriptsMant/datosMant.php',
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
                        message:'El mantenimiento no existe',
                        btnOkLabel:'Aceptar',
                        callback:function(){location.reload();},
                    });
                }
                else{
                modificarMant(data);}
            },
            error: function(xhr,status,errorThrown) {
                alert( "Se encontro un Problema!"+data);
                console.log( "Error: " + errorThrown );
                console.log( "Status: " + status );
                console.dir( xhr );
            },  
        }); 
    });

$('#planMant').submit(function(){
event.preventDefault();
data = $(this).serializeArray();
// Ajax Called When Page is Load/Ready (Load Manufacturer)
jQuery.ajax({
            url: 'scriptsMant/save_mant.php',
            global: false,
            data: data,
            type: "POST",
            dataType: "html",
              success:function(ret3){
                console.log(ret3);
               if(ret3 == 3)
                {
                    BootstrapDialog.alert({
                        title:'Error',
                        type:BootstrapDialog.TYPE_DANGER,
                        message: 'Seleccione los datos y presione Completar',
                        btnOkLabel:'Aceptar',

                    });
                }
                else
                    if(ret3 == 0){
                BootstrapDialog.alert({
                        title:'Error',
                        type:BootstrapDialog.TYPE_DANGER,
                        message: 'Se presento un error',
                        btnOkLabel:'Aceptar',
                        callback:function(){location.reload();}
                    });
            }
            else
                    if(ret3 == 2)
                        {
                    BootstrapDialog.alert({
                            title:'Error',
                            type:BootstrapDialog.TYPE_DANGER,
                            message: 'El mantenimiento no Existe',
                            btnOkLabel:'Aceptar',
                        });
            }
            else
                  {
                    BootstrapDialog.alert({
                            title:'Exito!',
                            type:BootstrapDialog.TYPE_SUCCESS,
                            message: 'Su requerimiento fue procesado exitosamente',
                            btnOkLabel:'Aceptar',
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

$('#finish_mant').submit(function(event){
event.preventDefault();
data = $(this).serializeArray();
// Ajax Called When Page is Load/Ready (Load Manufacturer)
jQuery.ajax({
            url: 'scriptsMant/update_mant.php',
            global: false,
            data: data,
            type: "POST",
            dataType: "html",
            success:function(ret2){
                
               if(ret2 == 0)
                {
                    BootstrapDialog.alert({
                        title:'Error',
                        type:BootstrapDialog.TYPE_DANGER,
                        message: 'Seleccione los datos y presione Completar',
                        btnOkLabel:'Aceptar',
                    });
                }
                else
                    if(ret2 == 2){
                BootstrapDialog.alert({
                        title:'Error',
                        type:BootstrapDialog.TYPE_DANGER,
                        message: 'Se presento un error',
                        btnOkLabel:'Aceptar',
                        callback:function(){location.reload();}
                    });
            }
            else
                    if(ret2 == 3)
                        {
                    BootstrapDialog.alert({
                            title:'Error',
                            type:BootstrapDialog.TYPE_DANGER,
                            message: 'El mantenimiento no Existe',                           
                            btnOkLabel:'Aceptar',
                            callback:function(){location.reload();}
                        });
            }
            else
                  {
                    BootstrapDialog.alert({
                            title:'Exito!',
                            type:BootstrapDialog.TYPE_SUCCESS,
                            message: 'Su requerimiento fue procesado exitosamente',
                            btnOkLabel:'Aceptar',
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


$('#planificado').click(function(){

                BootstrapDialog.show({
                    title:'Listado de Mantenimientos pendientes',
                    message:function(dialog) {
                        var $message = $('<div></div>');
                        var pageToLoad = dialog.getData('pageToLoad');
                        $message.load(pageToLoad);
                
                        return $message;
                    },
                    data: {
                        'pageToLoad': 'mant/tabla_planificado.php'
                     },
                    type:BootstrapDialog.TYPE_WARNING,
                    size:BootstrapDialog.SIZE_WIDE,
                    closable:true,
                    draggable:true,
                     buttons: [{
                        label: 'Exportar Excel',
                        cssClass: 'btn-success',
                        action: function(){
                            $('#tplanificado').battatech_excelexport({
                            containerid: "tplanificado"
                            , datatype: "Table"
                            , worksheetName: 'Datos de Activo'
                            
                        });

                        }
                    }, 
                    {
                        label: 'Exportar PDF',
                        cssClass: 'btn-danger',
                        action: function(){
                           data = {table:$('#tplanificado').prop('outerHTML')};
                        post('pdf.php',data);
                        }
                     

                    }]
                    });
                
           
        });

$('#historico').click(function(){

                BootstrapDialog.show({
                    title:'Historico de Mantenimientos Realizados',
                    message:function(dialog) {
                        var $message = $('<div></div>');
                        var pageToLoad = dialog.getData('pageToLoad');
                        $message.load(pageToLoad);
                
                        return $message;
                    },
                    data: {
                        'pageToLoad': 'mant/tabla_historico.php'
                     },
                    type:BootstrapDialog.TYPE_WARNING,
                    size:BootstrapDialog.SIZE_WIDE,
                    closable:true,
                    draggable:true,
                     buttons: [{
                        label: 'Exportar Excel',
                        cssClass: 'btn-success',
                        action: function(){
                         $('#thistorico').battatech_excelexport({
                         containerid: "thistorico"
                        , datatype: "Table"
                        , worksheetName: 'Datos de Activo'
                              
                        });
                    }, 
                },
                    {
                        label: 'Exportar PDF',
                        cssClass: 'btn-danger',
                        action: function(){                        
                        
                        data = {table:$('#thistorico').prop('outerHTML')};
                        post('pdf.php',data);

                        }
                     

                    }]
                    });
                
           
        });
});