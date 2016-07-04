<?php
include '../dbcon.php';

    if(isset($_POST['activos']))
    {
    $nro= \strip_tags(substr($_POST['activos'],0,60));
    $serial= \strip_tags(substr($_POST['activos'],0,120));
   
    $stmt = $dbcon->prepare("SELECT * FROM activo WHERE serial=:serial OR nro=:nro");
    $stmt->bindParam(':serial',$serial);
    $stmt->bindParam(':nro',$nro);
    $stmt->execute();
    $rows=$stmt->fetch(PDO::FETCH_ASSOC);
    $numrows=$stmt->rowCount();
    if($numrows==0)
    {
        echo 0;
    }
    else
    {
     $stmt=$dbcon->query("SELECT nombre FROM marca WHERE id=$rows[marca_id]");
     $marca=$stmt->fetchColumn();
     $stmt2=$dbcon->query("SELECT nombre FROM modelo WHERE id=$rows[modelo_id]");
     $modelo=$stmt2->fetchColumn();
     $stmt3=$dbcon->query("SELECT nombre FROM ubicacion WHERE id=$rows[ubicacion_id]");
     $ubicacion=$stmt3->fetchColumn();
    ?>
    <script>$(document).ready(function(){var myLanguage = {errorTitle : 'Envio de formulario fallido!', requiredFields : 'No ha llenado los campos requeridos', badTime : 'No ha introducido una hora valida', badEmail : 'No ha introducido un email valido', badTelephone : 'You have not given a correct phone number', badSecurityAnswer : 'You have not given a correct answer to the security question', badDate : 'No ha introducido una fecha correcta', lengthBadStart : 'debe introducir una valor entre ', lengthBadEnd : ' caracteres', lengthTooLongStart : 'Ha introducido un valor mayor a  ', lengthTooShortStart : 'Ha introducido un valor menor a ', notConfirmed : 'Los valores no pudieron ser confirmados', badDomain : 'Dominio incorrecto', badUrl : 'URL no valida', badCustomVal : 'Valor incorrecto', badInt : 'Ha introducido un numero no valido', badSecurityNumber : 'Your social security number was incorrect', badUKVatAnswer : 'Incorrect UK VAT Number', badStrength : 'La contrasena es muy simple', badNumberOfSelectedOptionsStart : 'Debe elegir al menos ', badNumberOfSelectedOptionsEnd : ' respuestas', badAlphaNumeric : 'El valor solo puede contener caracteres alfanumericos ', badAlphaNumericExtra: ' y ', wrongFileSize : 'The file you are trying to upload is too large', wrongFileType : 'The file you are trying to upload is of wrong type', groupCheckedRangeStart : 'Por favor elija entre ', groupCheckedTooFewStart : 'Por favor elija al menos ', groupCheckedTooManyStart : 'Por favor elija maximo ', groupCheckedEnd : ' item(s)'}; $.validate({language : myLanguage }); });</script> <form  name="modificarUsuarios" id="modificarUsuarios">
    <form method="POST" name="modificar_activos" id="modificar_activos">            
            <input type="hidden" name="id" value=<?php echo $rows['id'];?>>
            <div class="form-group">
            <label for="serial" class=control-label>Serial:</label>
            <input type="text" class="form-control" name="serial" data-validation="alphanumeric" data-validation-allowing="-_" value="<?php echo $rows['serial'];?>">            
            <label for="nro" class=control-label>N&uacute;mero: </label>
            <input type="text" class="form-control" name="nro"  maxlength="5" data-validation="alphanumeric" value="<?php echo $rows['nro'];?>" >            
            <label for="funcion" class=control-label>Funci&oacute;n:</label>
            <input type="text" class="form-control" name="funcion" data-validation="alphanumeric" data-validation-allowing="-_"  value="<?php echo $rows['funcion'];?>">            
            <label for="descripcion" class=control-label>Descripci&oacute;n:</label>
            <input type="text" class="form-control" name="descripcion" data-validation="required" value="<?php echo $rows['descripcion'];?>">            
            <label for="mantenible" class=control-label>Mantenible:</label>
            <select class=form-control name="mantenible">
                <option value="S" <?php if($rows['mantenible']=='S') echo "selected"?>>Si</option>
                <option value="N" <?php if($rows['mantenible']=='N') echo "selected"?>>No</option>
            </select>            
            <label for="status" class=control-label>Estatus:</label>
            <select class=form-control name="status" id="status">
                <option value="I" <?php if($rows['status']=='I') echo "selected"?>>Incorporado</option>
                <option value="D" <?php if($rows['status']=='D') echo "selected"?>>Desincorporado</option>
            </select>            
            <label for="marca" class=control-label>Marca:</label>
             <input class="form-control" list="marca" name="marca" autocomplete="on"  data-validation="alphanumeric" value="<?php echo $marca;?>">
                <datalist id="marca">
                    <?php
                           include "dbcon.php";

                            foreach($dbcon->query("SELECT nombre FROM marca") as $row)
                            {
                                    echo "<option value=".$row['nombre'].">";
                             
                            }
                    ?>
                </datalist>            
            <label for="modelo" class=control-label>Modelo:</label>
            <input class="form-control" list="modelo" name="modelo" autocomplete="on" data-validation="alphanumeric" value="<?php echo $modelo;?>">
                <datalist id="modelo">
                    <?php
                           include "dbcon.php";

                            foreach($dbcon->query("SELECT nombre FROM modelo") as $row)
                            {
                                    echo "<option value=".$row['nombre'].">";
                             
                            }
                    ?>
                </datalist>            
            <label for="ubicacion" class=control-label>Ubicaci&oacute;n:</label>
            <input class="form-control" list="ubicacion" name="ubicacion" autocomplete="on" data-validation="alphanumeric" value="<?php echo $ubicacion;?>">
                <datalist id="ubicacion">
                    <?php
                           include "dbcon.php";

                            foreach($dbcon->query("SELECT nombre FROM ubicacion") as $row)
                            {
                                    echo "<option value=".$row['nombre'].">";
                             
                            }
                    ?>
                </datalist>

<?php }}
else
    {
        echo 0;
    }?>