<?php
include '../dbcon.php';
        if(isset($_POST['status']))
        {
        if($_POST['status']=='I'){
          
        $stmt = $dbcon->prepare("SELECT * FROM activo WHERE status ='I'");
        $stmt->execute();
        }
        else
        {
          $stmt = $dbcon->prepare("SELECT * FROM activo WHERE status='D'");
            $stmt->execute();  
        }
    /*    else{
        $stmt = $dbcon->prepare("SELECT * FROM hist_desinc");
        $stmt->execute();

        }*/
                $row=$stmt->fetchAll(PDO::FETCH_ASSOC);

        $numrows=$stmt->rowCount();
        if($numrows==0)
        {
            echo 0;
        }
        else
        {       
        echo '<table id=idc><tr><td bgcolor=indianred>Serial</td><td bgcolor=indianred>Numero</td><td bgcolor=indianred>Funcion</td><td bgcolor=indianred>Descripcion</td><td bgcolor=indianred>Mantenible</td><td bgcolor=indianred>Estatus</td><td bgcolor=indianred>Marca</td><td bgcolor=indianred>Modelo</td><td bgcolor=indianred>Ubicacion</td>'; foreach($row as $rows){$stmt=$dbcon->query("SELECT nombre FROM marca WHERE id=$rows[marca_id]"); $marca=$stmt->fetchColumn(); $stmt2=$dbcon->query("SELECT nombre FROM modelo WHERE id=$rows[modelo_id]"); $modelo=$stmt2->fetchColumn(); $stmt3=$dbcon->query("SELECT nombre FROM ubicacion WHERE id=$rows[ubicacion_id]"); $ubicacion=$stmt3->fetchColumn(); ?>      <tr><td bgcolor="cornsilk"><?php echo $rows['serial'];?></td><td bgcolor="cornsilk"><?php echo $rows['nro'];?></td><td bgcolor="cornsilk"><?php echo $rows['funcion'];?></td><td bgcolor="cornsilk"><?php echo $rows['descripcion'];?></td><td bgcolor="cornsilk"><?php if($rows['mantenible']=='S') echo "Si"; else echo "No";?></td><td bgcolor="cornsilk"><?php if($rows['status']=='I') echo "Incorporado"; else echo "Desincorporado";  ?></td><td bgcolor="cornsilk"><?php echo $marca;?></td><td bgcolor="cornsilk"><?php echo $modelo;?></td><td bgcolor="cornsilk"> <?php echo $ubicacion;?></td></tr> <?php } }
     }
else
{
    echo 2;
}
?>