<?php
include "dbcon.php";
?><!DOCTYPE html>
<html lang="en">

<head>

<?php include "scripts.html";?>
<script>
$(document).ready(function(){

$('#dick').click(function(){

 BootstrapDialog.confirm({
            title: 'PRUEBA',
            message: 
            '<div class="center">'+
            '<label>Culo</label><div class="form-group"><input type="text" class="form-control"></input></div>'+
            '<label>Culo</label><div class="form-group"><input type="text" class="form-control"></input></div>'+
            '<label>Culo</label><div class="form-group"><input type="text" class="form-control"></input></div>'+
            '<label>Culo</label><div class="form-group"><input type="text" class="form-control"></input></div></div>',
            type: BootstrapDialog.TYPE_WARNING, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: true, // <-- Default value is false
            draggable: true, // <-- Default value is false
            btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
            btnOKLabel: 'Aceptar', // <-- Default value is 'OK',
            btnOKClass: 'btn-warning', // <-- If you didn't specify it, dialog type will be used,
            callback: function(result) {
                // result will be true if button was click, while it will be false if users close the dialog directly.
                if(result) {
                             BootstrapDialog.show({
				            title: 'Confirmar',
				            type: BootstrapDialog.TYPE_WARNING,
				            message: 'Esta seguro de esta solicitud?\n Los cambios no se pueden deshacer.',
				            buttons: [{

				                label: 'Aceptar',
				                action: function(dialog)
				                 {
				                	dialog.setTitle('Exito');
				                    dialog.setMessage('Se ha modificado Exitosamente');
				                    dialog.setType(BootstrapDialog.TYPE_SUCCESS);
				                }
					            }, 
					            {
				                label: 'Cancelar',
				                action: function(dialog) {
				                	dialog.setTitle('Error');
				                    dialog.setMessage('Se ha Cancelado La Solicitud');
				                    dialog.setType(BootstrapDialog.TYPE_DANGER);
				                }
				            }]
				        });
                }else {
                    BootstrapDialog.alert('Nope.');
                }
            }
        });
    });

});
</script>
<script>
        BootstrapDialog.confirm({
            title: 'WARNING',
            message: 'Warning! Drop your banana?',
            type: BootstrapDialog.TYPE_WARNING, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: true, // <-- Default value is false
            draggable: true, // <-- Default value is false
            btnCancelLabel: 'Do not drop it!', // <-- Default value is 'Cancel',
            btnOKLabel: 'Drop it!', // <-- Default value is 'OK',
            btnOKClass: 'btn-warning', // <-- If you didn't specify it, dialog type will be used,
            callback: function(result) {
                // result will be true if button was click, while it will be false if users close the dialog directly.
                if(result) {
                    alert('Yup.');
                }else {
                    alert('Nope.');
                }
            }
        });
        </script>
</head>

<body>
    <div class="content-section-a">

        <div class="container contain">
      <br><br>
<h1 align="center">Modulo de Activos<br> Departamento de Informatica</h1><br><br>
        <div class="row">

        <button class="btn btn-large btn-danger" id="dick">CLICK ME!!!</button>

        </div>
        </div>
        </div>
        </body>
