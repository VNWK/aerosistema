function emailMant(data){
 BootstrapDialog.confirm({
            title: 'Enviar Email',
            message: '<div class="center-block"><form method="POST" name=emailform id=emailform><div class=form-group><label>Email Usuario</label><input type=hidden name=id_plan id=id_plan value='+data+'><br><input class="form-control" type=email name=email id=email></div>',
            type: BootstrapDialog.TYPE_WARNING, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: true, // <-- Default value is false
            draggable: true, // <-- Default value is false
            btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
            btnOKLabel: 'Aceptar', // <-- Default value is 'OK',
            btnOKClass: 'btn-warning', // <-- If you didn't specify it, dialog type will be used,
            callback: function(result) {
                // result will be true if button was click, while it will be false if users close the dialog directly.
                if(result) {
                			correo = $('#emailform').serializeArray();
                            // console.log(correo);				                	
	                     	BootstrapDialog.confirm({
				            title: 'Confirmar',
				            message: '¿Esta seguro que desea completar este requerimiento?',
				            type: BootstrapDialog.TYPE_WARNING, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
				            closable: true, // <-- Default value is false
				            draggable: true, // <-- Default value is false
				            btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
				            btnOKLabel: 'Aceptar', // <-- Default value is 'OK',
				            btnOKClass: 'btn-warning', // <-- If you didn't specify it, dialog type will be used,
				            callback: function(result2) {
				                // result will be true if button was click, while it will be false if users close the dialog directly.
				                if(result2) {

				                	ajaxEmail(correo);	
				                						
				                }else {
				                    BootstrapDialog.alert('Se ha cancelado el proceso.');
				                }
				            }
				        });

                }
                
                
            }
        });
    };

   function ajaxEmail(correo)
    {    	
    	jQuery.ajax({
    		url:'./email.php',
    		global:false,
    		data:correo,
    		type:'POST',
    		dataType:'html',
    		success:function(data)
    		{
    			BootstrapDialog.alert(data);
    		},
    		error:function(xhr,status,errorThrown)
    		{
    			BootstrapDialog.alert('Se ha Producido un error');
				console.log( "Error: " + errorThrown );
                console.log( "Status: " + status );
                console.dir( xhr );
    		},
    	});
    };