<?php
try{
$dbcon = new PDO('mysql:host=localhost;dbname=u553241902_aero','u553241902_vnwk','HrSwD0ciShKN');
$stmt= $dbcon->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage();
	die();
}
?>