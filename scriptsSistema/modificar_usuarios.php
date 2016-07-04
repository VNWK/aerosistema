
<?php
include '../accesscontrol.php';

if (isset($_POST['usuario']))
{
    $username= \strip_tags(substr($_POST['usuario'],0,30));
   
    $stmt = $dbcon->prepare("SELECT * FROM user WHERE email=?");
    $stmt->execute(array($username));
    $rows=$stmt->fetch(PDO::FETCH_ASSOC);
    $numrows=$stmt->rowCount();

    if($numrows==0)
    {
        echo 0;
    }
else
{
?>
<script>$(document).ready(function(){var myLanguage = {errorTitle : 'Envio de formulario fallido!', requiredFields : 'No ha llenado los campos requeridos', badTime : 'No ha introducido una hora valida', badEmail : 'No ha introducido un email valido', badTelephone : 'You have not given a correct phone number', badSecurityAnswer : 'You have not given a correct answer to the security question', badDate : 'No ha introducido una fecha correcta', lengthBadStart : 'debe introducir una valor entre ', lengthBadEnd : ' caracteres', lengthTooLongStart : 'Ha introducido un valor mayor a  ', lengthTooShortStart : 'Ha introducido un valor menor a ', notConfirmed : 'Los valores no pudieron ser confirmados', badDomain : 'Dominio incorrecto', badUrl : 'URL no valida', badCustomVal : 'Valor incorrecto', badInt : 'Ha introducido un numero no valido', badSecurityNumber : 'Your social security number was incorrect', badUKVatAnswer : 'Incorrect UK VAT Number', badStrength : 'La contrasena es muy simple', badNumberOfSelectedOptionsStart : 'Debe elegir al menos ', badNumberOfSelectedOptionsEnd : ' respuestas', badAlphaNumeric : 'El valor solo puede contener caracteres alfanumericos ', badAlphaNumericExtra: ' y ', wrongFileSize : 'The file you are trying to upload is too large', wrongFileType : 'The file you are trying to upload is of wrong type', groupCheckedRangeStart : 'Por favor elija entre ', groupCheckedTooFewStart : 'Por favor elija al menos ', groupCheckedTooManyStart : 'Por favor elija maximo ', groupCheckedEnd : ' item(s)'}; $.validate({language : myLanguage }); });</script> <form  name="modificarUsuarios" id="modificarUsuarios">
        <input type="hidden" name="id" value=<?php echo $rows['id'];?>>
            <label for=email class=control-label>Correo Electr&oacute;nico:</label>
            <input type=email class="form-control" name=email data-validation="email" value="<?php echo $rows['email'];?>" >
            <label for=pass class=control-label>Contrase&ntilde;a:</label>
            <input type=password class="form-control" name="pass" data-validation="required">
            <label for=nombre class=control-label>Nombre:</label>
            <input type=text class="form-control" name=nombre value="<?php echo $rows['nombre'];?>" data-validation="custom" data-validation-regexp="^([a-z A-Z]+)$">
            <label for=apellido class=control-label>Apellido:</label>
            <input type=text class="form-control" name=apellido value="<?php echo $rows['apellido'];?>" data-validation="custom" data-validation-regexp="^([a-z A-Z]+)$">
            <label for=cargo class=control-label>Cargo:</label>
            <input type=text class="form-control" name=cargo value="<?php echo $rows['cargo'];?>" data-validation="alphanumeric" data-validation-allowing=" ">
              <label for=tipo class=control-label>Tipo de Usuario:</label>
            <select class=form-control name=tipo>
                <option value="3" <?php if($rows['tipo']==3) echo "selected"?>>Tecnico</option>
                <option value="2" <?php if($rows['tipo']==2) echo "selected"?>>Coordinador/Gerente de Area</option>
                <option value="1" <?php if($rows['tipo']==1) echo "selected"?>>Administrador del Sistema</option>
            </select>
           
    </form>
<?php } }?>