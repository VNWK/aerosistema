<?php

include "../dbcon.php";
$id= \filter_input(\INPUT_POST,'id',   FILTER_SANITIZE_NUMBER_INT);
$serial= \strip_tags(substr($_POST['serial'],0,120));
$funcion= \strip_tags(substr($_POST['funcion'],0,240));
$descripcion= \strip_tags(substr($_POST['descripcion'],0,600));
$marca= \strip_tags(substr($_POST['marca'],0,120));
$modelo= \strip_tags(substr($_POST['modelo'],0,120));
$nro=  \filter_input(\INPUT_POST,'nro',   FILTER_SANITIZE_NUMBER_INT);
$status= \strip_tags(substr($_POST['status'],0,2));
$mantenible= \strip_tags(substr($_POST['mantenible'],0,2));
$ubicacion= \strip_tags(substr($_POST['ubicacion'],0,120));


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

  $stmt = $dbcon->prepare("UPDATE activo SET serial=:serial,nro=:nro,status=:status,funcion=:funcion,descripcion=:descripcion,mantenible=:mantenible,ubicacion_id=:ubicacion_id,modelo_id=:modelo_id,marca_id=:marca_id WHERE id=:id");
  $stmt->bindParam(':id',$id);
  $stmt->bindParam(':serial',$serial);
  $stmt->bindParam(':nro',$nro);
  $stmt->bindParam(':status',$status);
  $stmt->bindParam(':funcion',$funcion);
  $stmt->bindParam(':descripcion',$descripcion);
  $stmt->bindParam(':mantenible',$mantenible);        
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
           
    echo 0;
      echo $e;
  }
?>