<?php 
include '../dbcon.php';
include '../accesscontrol.php';
if (isset($_POST['activos3']) && isset($_POST['desc_mant']) && isset($_POST['prioridad'])) 
{
$activos=$_POST['activos3'];
$fecha_reg = date('Y-m-d');

$stmt = $dbcon->prepare("SELECT id FROM activo WHERE serial=:activos OR nro=:activos");
$stmt->bindParam(':activos',$activos);
$stmt->execute();
$countactivos = $stmt->rowCount();


if($countactivos !=0 ){

$activo_id = $stmt->fetchColumn();
$stmt2 = $dbcon->prepare("SELECT id FROM user WHERE email=:email");
$stmt2->bindParam(':email',$_SESSION['userid']);
$stmt2->execute();
$user_id = $stmt2->fetchColumn();

	$stmt3 =$dbcon->prepare("INSERT INTO mantenimiento (fecha_reg, desc_mant, prioridad, user_reg, activo_id) VALUES (:fecha_reg, :desc_mant, :prioridad, :user_reg, :activo_id)");
	$stmt3->bindParam(':fecha_reg',$fecha_reg);
	$stmt3->bindParam(':desc_mant',$_POST['desc_mant']);
	$stmt3->bindParam(':prioridad',$_POST['prioridad']);
	$stmt3->bindParam(':user_reg',$user_id);
	$stmt3->bindParam(':activo_id',$activo_id);

	try
	{
		$stmt3->execute();
		echo 1;
	}
	catch (PDOException $ex)
	{
    	echo 0;
	}
	$dbcon=null;
}

else
{
	echo 2;
}
}
else
{
	echo 3;
}
?>