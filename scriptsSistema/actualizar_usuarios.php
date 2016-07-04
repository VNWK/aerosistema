<?php
include "../dbcon.php";
$stmt = $dbcon->prepare("UPDATE user SET pass=:pass,nombre=:nombre,apellido=:apellido,cargo=:cargo,email=:email,tipo=:tipo WHERE id=:id");

$stmt->bindParam(':pass',$pass);
$stmt->bindParam(':nombre',$nombre);
$stmt->bindParam(':apellido',$apellido);
$stmt->bindParam(':cargo',$cargo);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':tipo',$tipo);

$stmt->bindParam(':id',$id);
$id= \filter_input(\INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT); 
$password= \strip_tags(substr($_POST['pass'],0,30));
$options=array(	'cost' => 11);			
$pass=password_hash($password,PASSWORD_BCRYPT,$options);
$nombre= \strip_tags(substr($_POST['nombre'],0,60));
$apellido= \strip_tags(substr($_POST['apellido'],0,60));
$cargo= $_POST['cargo'];
$email= \strip_tags(substr($_POST['email'],0,60));
$tipo=  \filter_input(\INPUT_POST,'tipo',   FILTER_SANITIZE_NUMBER_INT);


try
{
$sd=$stmt->execute();

if ($sd==TRUE) 
{
   
   echo 1;
}
}

catch (PDOException $ex){
    echo 0;
}
$dbcon=null;
?>