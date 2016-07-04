<?php

session_start();

include "js/common.php";
if(isset($_SESSION['userid']))
{
	error_login("el usuario ya se encuentra autenticado");
}

//Chequea que el usuario y la contraseña se hayan submitted
if(!isset($_POST['email'],$_POST['pass']))
{
	error("por favor entre un usuario y contraseña validos");
}

elseif(strlen($_POST['email'])>30 || strlen($_POST['email'])<4)
{
    error("Por favor introduzca un nombre de usuario con longitud valida");
}

elseif(strlen($_POST['pass'])>30 || strlen($_POST['pass'])<4)
{
    error("Por favor introduzca una contrasena con longitud valida");
}

else
{

	$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);

		
	try
	{
		include_once "dbcon.php";
		$stmt = $dbcon->prepare("SELECT pass FROM user WHERE email=:email");
		$stmt->bindParam(':email',$email);		
		$stmt->execute();
		$hash = $stmt->fetchColumn();

		$auth=password_verify($password,$hash);

		if($auth == false)
		{
			error("Ha fallado la autenticacion");
		}
		else
		{
		$stmt2 = $dbcon->prepare("SELECT tipo FROM user WHERE email=:user");

		$stmt2->bindParam(':user',$email);
		$stmt2->execute();
		$tipo = $stmt2->fetchColumn();

		$_SESSION['userid'] = $email;
		$_SESSION['tipo'] = $tipo;

		error_login("se ha logeado exitosamente");
		}
		
	}
	catch(exception $e)
	{	
		error("No pudimos procesar su peticion. Por favor reporte el error al administrador del sistema");

	}

}
?>