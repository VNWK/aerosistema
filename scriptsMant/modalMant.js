function modificarMant(data){
 BootstrapDialog.confirm({
            title: 'Modificar Mantenimiento',
            message: data,
            type: BootstrapDialog.TYPE_WARNING, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: true, // <-- Default value is false
            draggable: true, // <-- Default value is false
            btnCancelLabel: 'Eliminar',
            btnCancelClass: 'btn-danger',  // <-- Default value is 'Cancel',
            btnOKLabel: 'Aceptar', // <-- Default value is 'OK',
            btnOKClass: 'btn-warning', // <-- If you didn't specify it, dialog type will be used,
            callback: function(result) {
                // result will be true if button was click, while it will be false if users close the dialog directly.
                if(result) {
                			modmant = $('#modificar_mant').serializeArray();		
	                     	BootstrapDialog.confirm({
				            title: 'Confirmar',
				            message: '¿Esta seguro que desea completar este requerimiento?',
				            type: BootstrapDialog.TYPE_WARNING, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
				            closable: true, // <-- Default value is false
				            draggable: true, // <-- Default value is false
				            btnCancelLabel: 'Cancelar',
				            btnOKLabel: 'Aceptar', // <-- Default value is 'OK',
				            btnOKClass: 'btn-warning', // <-- If you didn't specify it, dialog type will be used,
				            callback: function(result2) {
				                // result will be true if button was click, while it will be false if users close the dialog directly.
				                if(result2) {

				                	ajaxModMant(modmant);	
				                						
				                }else {
				                   
				                     BootstrapDialog.alert({
                                    title:'Error',
                                    message: 'Se ha cancelado el requerimiento',
                                    type: BootstrapDialog.TYPE_DANGER,
                                    closable: true,
                                    draggable: true,
                                    buttonLabel: 'Aceptar',});
				                }
				            }
				        });

                }
                else{
                    modmant = $('#modificar_mant').serializeArray();    
                    eliminarModMant(modmant);
                }
                
            }
        });
    };

       function ajaxModMant(modmant)
    {
    	
    	jQuery.ajax({
    		url:'scriptsMant/phpModMant.php',
    		global:false,
    		data:modmant,
    		type:'POST',
    		dataType:'html',
    		success:function(data)
    		{
    			if(data==1){
    				BootstrapDialog.alert({
    				title:'Exito!',
    				message: 'Su requerimiento fue procesado exitosamente',
    				type: BootstrapDialog.TYPE_SUCCESS,
    				closable: true,
					draggable: true,
					buttonLabel: 'Aceptar',});
    			}
    			else{
    				BootstrapDialog.alert({
    				title:'Error',
    				message: 'Se presento un error al procesar su requerimiento',
    				type: BootstrapDialog.TYPE_DANGER,
    				closable: true,
					draggable: true,
					buttonLabel: 'Aceptar',});
    			}
    		},
    		error:function(xhr,status,errorThrown)
    		{
    			BootstrapDialog.alert('Hubo un Problema!');
				console.log( "Error: " + errorThrown );
                console.log( "Status: " + status );
                console.dir( xhr );
    		},
    	});
    };

    function eliminarModMant(modmant)
    {
    	
    	jQuery.ajax({
    		url:'scriptsMant/phpDelMant.php',
    		global:false,
    		data:modmant,
    		type:'POST',
    		dataType:'html',
    		success:function(data)
    		{
    			if(data==1){
    				BootstrapDialog.alert({
    				title:'Exito!',
    				message: 'Su requerimiento fue procesado exitosamente',
    				type: BootstrapDialog.TYPE_SUCCESS,
    				closable: true,
					draggable: true,
					buttonLabel: 'Aceptar',});
    			}
    			else{
    				BootstrapDialog.alert({
    				title:'Error',
    				message: 'Se presento un error al procesar su requerimiento',
    				type: BootstrapDialog.TYPE_DANGER,
    				closable: true,
					draggable: true,
					buttonLabel: 'Aceptar',});
    			}
    		},
    		error:function(xhr,status,errorThrown)
    		{
    			BootstrapDialog.alert('Hubo un Problema!');
				console.log( "Error: " + errorThrown );
                console.log( "Status: " + status );
                console.dir( xhr );
    		},
    	});
    };