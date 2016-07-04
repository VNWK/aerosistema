<?php 
include '../dbcon.php';
include '../accesscontrol.php';

date_default_timezone_set('America/Caracas');
if (isset($_POST['ticket']) && isset($_POST['comentarios'])) 
{
$ticket = $_POST['ticket'];
$comentarios = $_POST['comentarios'];
$fecha_fin = date('Y-m-d');

$stmt3 =$dbcon->prepare("SELECT * FROM mantenimiento WHERE id=:ticket");
$stmt3->bindParam(':ticket',$ticket);
$stmt3->execute();
$countrows = $stmt3->rowCount();
if($countrows == 0)
{
	echo 3;
}

else
{
	$mant = $stmt3->fetch();
try
	{
	$dbcon->beginTransaction();
	 	
	$stmt2 = $dbcon->prepare("SELECT id FROM user WHERE email=:email");
	$stmt2->bindParam(':email',$_SESSION['userid']);
	$stmt2->execute();
	$user_id = $stmt2->fetchColumn();



	$stmt5 = $dbcon->prepare("SELECT * FROM activo WHERE id=:activo_id");
	$stmt5->bindParam(':activo_id',$mant['activo_id']);
	$stmt5->execute();
	$activo_id = $stmt5->fetchColumn();
	
	$stmt4 =$dbcon->prepare("INSERT INTO hist_mantenimiento (fecha_reg,fecha_fin,user_fin,user_reg,nro_activo,desc_mant,comentarios) 
														VALUES(:fecha_reg,:fecha_fin,:user_fin,:user_reg,:nro_activo,:desc_mant,:comentarios)");
	$stmt4->bindParam(':fecha_reg',$mant['fecha_reg']);
	$stmt4->bindParam(':fecha_fin',$fecha_fin);
	$stmt4->bindParam(':user_fin',$user_id);
	$stmt4->bindParam(':user_reg',$mant['user_reg']);
	$stmt4->bindParam(':nro_activo',$activo_id);
	$stmt4->bindParam(':desc_mant',$mant['desc_mant']);
	$stmt4->bindParam(':comentarios',$comentarios);
	$stmt4->execute();
	
	$stmt5 =$dbcon->prepare("DELETE FROM mantenimiento WHERE id=:ticket");
	$stmt5->bindParam(':ticket',$ticket);
	$stmt5->execute();
	
	$dbcon->commit();
	echo 1;

	
}
	catch (PDOException $ex)
	{
    $dbcon->rollBack();
    echo 2;
	}
	$dbcon=null;
}
}
else
{
	echo 0;
}
 ?>