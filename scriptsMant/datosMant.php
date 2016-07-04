<?php
include '../dbcon.php';
    if(isset($_POST['ticket2']))
    {
    $ticket = $_POST['ticket2'];
   
    $stmt = $dbcon->prepare("SELECT * FROM mantenimiento WHERE id=:ticket");
    $stmt->bindParam(':ticket',$ticket);
    $stmt->execute();
    $rows=$stmt->fetch(PDO::FETCH_ASSOC);
    $numrows=$stmt->rowCount();
    if($numrows==0)
    {
        echo 0;
    }
    else
    {

    $stmt4=$dbcon->prepare("SELECT * FROM activo WHERE id = :id_plan");
    $stmt4->bindParam(":id_plan", $rows['activo_id']);
    $stmt4->execute();
    $array2 = $stmt4->fetch(PDO::FETCH_ASSOC);

    $stmt3=$dbcon->prepare("SELECT nombre FROM ubicacion WHERE id = :id_ubic");
    $stmt3->bindParam(":id_ubic", $array2['ubicacion_id']);
    $stmt3->execute();
    $ubic = $stmt3->fetchColumn();

    $stmt2=$dbcon->prepare("SELECT nombre FROM marca WHERE id = :id_marca ");
    $stmt2->bindParam(":id_marca", $array2['marca_id']);
    $stmt2->execute();
    $marca = $stmt2->fetchColumn();

    $stmt1=$dbcon->prepare("SELECT nombre FROM modelo WHERE id = :id_modelo");
    $stmt1->bindParam(":id_modelo", $array2['modelo_id']);
    $stmt1->execute();
    $modelo = $stmt1->fetchColumn();

    ?>
<script>$(document).ready(function(){var myLanguage = {errorTitle : 'Envio de formulario fallido!', requiredFields : 'No ha llenado los campos requeridos', badTime : 'No ha introducido una hora valida', badEmail : 'No ha introducido un email valido', badTelephone : 'You have not given a correct phone number', badSecurityAnswer : 'You have not given a correct answer to the security question', badDate : 'No ha introducido una fecha correcta', lengthBadStart : 'debe introducir una valor entre ', lengthBadEnd : ' caracteres', lengthTooLongStart : 'Ha introducido un valor mayor a  ', lengthTooShortStart : 'Ha introducido un valor menor a ', notConfirmed : 'Los valores no pudieron ser confirmados', badDomain : 'Dominio incorrecto', badUrl : 'URL no valida', badCustomVal : 'Valor incorrecto', badInt : 'Ha introducido un numero no valido', badSecurityNumber : 'Your social security number was incorrect', badUKVatAnswer : 'Incorrect UK VAT Number', badStrength : 'La contrasena es muy simple', badNumberOfSelectedOptionsStart : 'Debe elegir al menos ', badNumberOfSelectedOptionsEnd : ' respuestas', badAlphaNumeric : 'El valor solo puede contener caracteres alfanumericos ', badAlphaNumericExtra: ' y ', wrongFileSize : 'The file you are trying to upload is too large', wrongFileType : 'The file you are trying to upload is of wrong type', groupCheckedRangeStart : 'Por favor elija entre ', groupCheckedTooFewStart : 'Por favor elija al menos ', groupCheckedTooManyStart : 'Por favor elija maximo ', groupCheckedEnd : ' item(s)'}; $.validate({language : myLanguage }); });</script>
    <table class="table table-hover"><tr><td>Numero</td><td>Serial</td><td>Funcion</td><td>Marca</td><td>Modelo</td><td>Ubicacion</td></tr>
    <tr><td><?php echo $array2['nro'];?></td><td><?php echo $array2['serial'];?></td><td><?php echo $array2['funcion'];?></td><td><?php echo $marca;?></td><td><?php echo $modelo;?></td><td><?php echo $ubic;?></td></tr></table>
    <form method="POST" name="modificar_mant" id="modificar_mant">
            <input type="hidden" name="id" value="<?php echo $rows['id'];?>" data-validation="alphanumeric" data-validation-allowing="-_">
            <label for="serial" class=control-label>Descripci&oacute;n:</label>
            <textarea class="form-control" data-validation="required" name="desc_mant"><?php echo $rows['desc_mant'];?></textarea>            
            <label for="serial" class=control-label>Prioridad:</label>
             <select class=form-control name="prioridad">
                <option value="1" <?php if($rows['prioridad']=='1') echo "selected"?>>Baja</option>
                <option value="2" <?php if($rows['prioridad']=='2') echo "selected"?>>Normal</option>
                <option value="3" <?php if($rows['prioridad']=='3') echo "selected"?>>Alta</option>
                <option value="4" <?php if($rows['prioridad']=='4') echo "selected"?>>Urgente</option>
            </select>            
            
<?php }}
else
    {
        echo 0;
    }?>