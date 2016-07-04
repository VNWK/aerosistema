<?php
include "../accesscontrol.php";

if(!isset($_POST['nro'],$_POST['serial'],$_POST['descripcion'],$_POST['funcion']) or $_POST['nro']=='' or $_POST['serial']=='' or $_POST['descripcion']=='' or $_POST['funcion']=='')

{
echo 0;
}


else
{   
    include "../dbcon.php";
    $user=  \filter_input(\INPUT_POST,'username');
    $serial= \strip_tags(substr($_POST['serial'],0,120));
    $funcion= \strip_tags(substr($_POST['funcion'],0,240));
    $descripcion= \strip_tags(substr($_POST['descripcion'],0,600));
    $marca= \strip_tags(substr($_POST['marca'],0,120));
    $modelo= \strip_tags(substr($_POST['modelo'],0,120));
    $nro=  \filter_input(\INPUT_POST,'nro',   FILTER_SANITIZE_NUMBER_INT);
    $fecha = date('Y-m-d');
    $mantenible= \strip_tags(substr($_POST['mantenible'],0,2));
    $ubicacion= \strip_tags(substr($_POST['ubicacion'],0,120));
    $status = "I";

      $stmt2 = $dbcon->prepare("SELECT id FROM user WHERE email=:user");
      $stmt2->bindParam(':user',$user);
      $stmt2->execute();
      $userId=$stmt2->fetchColumn(); 


      $stmt0 = $dbcon->prepare("SELECT id FROM marca WHERE nombre=:marca");
      $stmt0->bindParam(':marca',$marca);
      $stmt0->execute();
      $marcacount=$stmt0->rowCount();
              
      if($marcacount==0)
      {
      $stmt1 = $dbcon->prepare("INSERT INTO marca (nombre) VALUES (:marca)");
      $stmt1->bindParam(':marca',$marca);
      $stmt1->execute();

      $stmt2 = $dbcon->prepare("SELECT id FROM marca WHERE nombre=:marca");
      $stmt2->bindParam(':marca',$marca);
      $stmt2->execute();
      $marcaId=$stmt2->fetchColumn();
      }
      else
      {
      $marcaId=$stmt0->fetchColumn();
      }

      $stmt0 = $dbcon->prepare("SELECT id FROM modelo WHERE nombre=:modelo");
      $stmt0->bindParam(':modelo',$modelo);
      $stmt0->execute();
      $modelocount=$stmt0->rowCount();
           
      if($modelocount==0)
      {
      $stmt1 = $dbcon->prepare("INSERT INTO modelo (nombre) VALUES (:modelo)");
      $stmt1->bindParam(':modelo',$modelo);
      $stmt1->execute();

      $stmt2 = $dbcon->prepare("SELECT id FROM modelo WHERE nombre=:modelo");
      $stmt2->bindParam(':modelo',$modelo);
      $stmt2->execute();
      $modeloId=$stmt2->fetchColumn();
      
      }
      else
      {

      $modeloId=$stmt0->fetchColumn();

      }
      $stmt0 = $dbcon->prepare("SELECT id FROM ubicacion WHERE nombre=:ubicacion");
      $stmt0->bindParam(':ubicacion',$ubicacion);
      $stmt0->execute();
      $ubicacioncount=$stmt0->rowCount();
           
      if($ubicacioncount==0)
      {
      $stmt1 = $dbcon->prepare("INSERT INTO ubicacion (nombre) VALUES (:ubicacion)");
      $stmt1->bindParam(':ubicacion',$ubicacion);
      $stmt1->execute();

      $stmt2 = $dbcon->prepare("SELECT id FROM ubicacion WHERE nombre=:ubicacion");
      $stmt2->bindParam(':ubicacion',$ubicacion);
      $stmt2->execute();
      $ubicacionId=$stmt2->fetchColumn();
      
      }
      else
      {
      $ubicacionId=$stmt0->fetchColumn();

      }      
        $stmt = $dbcon->prepare("INSERT INTO activo (serial,nro,status,funcion,descripcion, mantenible,fecha_reg,user_id,ubicacion_id,modelo_id,marca_id) 
                                             VALUES(:serial,:nro,:status,:funcion,:descripcion,:mantenible,:fecha_reg,:user_id,:ubicacion_id,:modelo_id,:marca_id)");
        $stmt->bindParam(':serial',$serial);
        $stmt->bindParam(':nro',$nro);
        $stmt->bindParam(':status',$status);
        $stmt->bindParam(':funcion',$funcion);
        $stmt->bindParam(':descripcion',$descripcion);
        $stmt->bindParam(':mantenible',$mantenible);
        $stmt->bindParam(':fecha_reg',$fecha);
        $stmt->bindParam(':user_id',$userId);
        $stmt->bindParam(':ubicacion_id',$ubicacionId);
        $stmt->bindParam(':modelo_id',$modeloId);
        $stmt->bindParam(':marca_id',$marcaId);
        try
        {
        $sd=$stmt->execute();
        
        if($sd==TRUE)
        {
        echo 1;
        }
        }
    catch (PDOException $e)
    {
    	
        if ($e->getCode() == 23000)
        {
           echo 2;
        }
        else
        {
            error("No se pudo registrar el activo.\nReporte el problema al adminstrador del sistema");
        }
    }
}
?>