<?php
include_once "js/common.php";
session_start();


if(!isset($_SESSION['userid']))
{
	error_lvl("Debe estar autenticado para acceder a estas opciones");
	
}

else
{
	try
	{

		include_once "dbcon.php";

		$stmt = $dbcon->prepare("SELECT email FROM user WHERE email=:email");
		$stmt->bindParam(':email', $_SESSION['userid'],PDO::PARAM_INT);

		$stmt->execute();

		$user=$stmt->fetchColumn();

		if($user == false)
		{
			error("Ha ocurrido un error de accesso. Por favor reporte este error al administrador del sistema");
		}
		
	}
	catch(exception $e)
	{
		error("Ha ocurrido un error de sistema. Por favor reporte este error al administrador del sistema");
	}
}
?>