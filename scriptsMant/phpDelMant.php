<?php

include "../dbcon.php";
$id= \filter_input(\INPUT_POST,'id',   FILTER_SANITIZE_NUMBER_INT);


 try
  {

  $stmt = $dbcon->prepare("DELETE FROM mantenimiento WHERE id=:id");
  $stmt->bindParam(':id',$id);
  
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