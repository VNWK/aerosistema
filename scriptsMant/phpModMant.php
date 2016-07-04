<?php

include "../dbcon.php";
$id= \filter_input(\INPUT_POST,'id',   FILTER_SANITIZE_NUMBER_INT);
$desc_mant= \strip_tags(substr($_POST['desc_mant'],0,600));
$prioridad= \strip_tags(substr($_POST['prioridad'],0,2));


 try
  {

  $stmt = $dbcon->prepare("UPDATE mantenimiento SET desc_mant=:desc_mant,prioridad=:prioridad WHERE id=:id");
  $stmt->bindParam(':id',$id);
  $stmt->bindParam(':desc_mant',$desc_mant);
  $stmt->bindParam(':prioridad',$prioridad);

  
  $sd=$stmt->execute();

  if($sd==TRUE)
  {
    echo 1;
  }
  }
  catch (PDOException $e)
  {
    echo 0;
  }
?>