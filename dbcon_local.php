<?php
try{
$dbcon = new PDO('mysql:host=localhost;dbname=aerosistema','root','');
$stmt= $dbcon->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage();
	die();
}
?>