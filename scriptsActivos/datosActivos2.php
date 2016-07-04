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
    ?>      <div>
            <table id="ida" class="table table-hover"></script><tr><td bgcolor="indianred">Serial:</td></tr> <tr><td bgcolor="cornsilk"><?php echo $rows['serial'];?></td></tr> <tr><td bgcolor="indianred">N&uacute;mero: </td></tr> <tr><td bgcolor="cornsilk"><?php echo $rows['nro'];?></td></tr> <tr><td bgcolor="indianred">Funci&oacute;n:</td></tr> <tr><td bgcolor="cornsilk"><?php echo $rows['funcion'];?></td></tr> <tr><td bgcolor="indianred">Descripci&oacute;n:</td></tr> <tr><td bgcolor="cornsilk"><?php echo $rows['descripcion'];?></td></tr> <tr><td bgcolor="indianred">Mantenible:</td></tr> <tr><td bgcolor="cornsilk"><?php if($rows['mantenible']=='S') echo "Si"; else echo "No";?></td></tr> <tr><td bgcolor="indianred">Estatus:</td></tr> <tr><td bgcolor="cornsilk"><?php if($rows['status']=='I') echo "Incorporado"; else echo "Desincorporado";  ?></td></tr> <tr><td bgcolor="indianred">Marca:</td></tr> <tr><td bgcolor="cornsilk"><?php echo $marca;?></td></tr> <tr><td bgcolor="indianred">Modelo:</td></tr> <tr><td bgcolor="cornsilk"><?php echo $modelo;?></td></tr> <tr><td bgcolor="indianred">Ubicaci&oacute;n:</td></tr> <tr><td bgcolor="cornsilk"> <?php echo $ubicacion;?></td></tr> </tr> </table> </div>
             <?php }
         }
    else
    {
        echo 0;
    }?>