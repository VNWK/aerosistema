<?php
include "../dbcon.php";
if(!isset($_POST['email'],$_POST['pass'],$_POST['nombre'],$_POST['apellido']))
{
echo 0;
}

else
{   
    $password =  $email= \strip_tags(substr($_POST['pass'],0,60));
    $options=array( 'cost' => 11);  
    $pass=password_hash($password,PASSWORD_BCRYPT,$options);

    $nombre= \strip_tags(substr($_POST['nombre'],0,60));
    $apellido= \strip_tags(substr($_POST['apellido'],0,60));
    $cargo= \strip_tags(substr($_POST['cargo'],0,120));
    $email= \strip_tags(substr($_POST['email'],0,60));
    $tipo=  \filter_input(\INPUT_POST,'tipo',   FILTER_SANITIZE_NUMBER_INT);
    

    try
    {

        $stmt = $dbcon->prepare("INSERT INTO user (pass,nombre,apellido,cargo,email,tipo) VALUES(:pass,:nombre,:apellido,:cargo,:email,:tipo)");
        $stmt->bindParam(':pass',$pass, PDO::PARAM_STR,40);
        $stmt->bindParam(':nombre',$nombre);
        $stmt->bindParam(':apellido',$apellido);
        $stmt->bindParam(':cargo',$cargo);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':tipo',$tipo);

        $sd=$stmt->execute();
        

    echo 1;
    }


    catch (PDOException $e)
    {
        if ($e->getCode() == 23000)
        {
            echo 2;
        }
        else
        {
            echo 3;
        }
    }
}


?>