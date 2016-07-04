<?php
include '../dbcon.php';
;
// session_start();
			
		$stmt=$dbcon->prepare("SELECT * FROM `mantenimiento` ORDER BY prioridad DESC");
		$stmt->execute();
		$count = $stmt->rowCount();
		$array = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if($count > 0)
		{
			echo "<table id=tplanificado class=\"table table-condensed\">
					<tr>
						<td bgcolor=indianred>Fecha de registro</td>
						<td bgcolor=indianred>Descripci&oacute;n</td>
						<td bgcolor=indianred>Ubicaci&oacute;n</td>
						<td bgcolor=indianred>Prioridad</td>
						<td bgcolor=indianred>Usuario que Registra</td>
						<td bgcolor=indianred>Activo</td>
						<td bgcolor=indianred>Enviar Email de Notificacion</td>
					</tr>
			";

			foreach($array as $fila)
			{

				$stmt2=$dbcon->prepare("SELECT ubicacion_id FROM `activo` WHERE id = :fila");
				$stmt2->bindParam(":fila", $fila['activo_id']);
				$stmt2->execute();
				$ubicacion= $stmt2->fetchColumn();
				$stmt3=$dbcon->prepare("SELECT nombre FROM ubicacion WHERE id = :ubicacion");
				$stmt3->bindParam(":ubicacion", $ubicacion);
				$stmt3->execute();
				$ubic_nombre = $stmt3->fetchColumn();

				$stmt4=$dbcon->prepare("SELECT * FROM `activo` WHERE id = :activo_id");
				$stmt4->bindParam(":activo_id", $fila['activo_id']);
				$stmt4->execute();
				$array2 = $stmt4->fetch(PDO::FETCH_ASSOC);

				$stmt5=$dbcon->prepare("SELECT nombre FROM modelo WHERE id = :modelo_id");
				$stmt5->bindParam(":modelo_id", $array2['modelo_id']);
				$stmt5->execute();
				$modelo = $stmt5->fetchColumn();

				$stmt5=$dbcon->prepare("SELECT nombre,apellido FROM user WHERE id = :user_reg");
				$stmt5->bindParam(":user_reg", $fila['user_reg']);
				$stmt5->execute();
				$array3 = $stmt5->fetch();
				// var_dump($array3);
				$user_reg=$array3['nombre'].' '.$array3['apellido'];
				
				
				if($fila['prioridad'] == 1)
					$prioridad = 'Baja';
				elseif($fila['prioridad'] == 2)
					$prioridad = 'Normal';
				elseif($fila['prioridad'] == 3)
					$prioridad = 'Alta';
				elseif($fila['prioridad'] == 4)
					$prioridad = 'Urgente';



				
				
					echo '<tr>
						<td bgcolor=cornsilk>'.$fila['fecha_reg'].'</td>
						<td bgcolor=cornsilk>'.$fila['desc_mant'].'</td>
						<td bgcolor=cornsilk>'.$ubic_nombre.'</td>
						<td bgcolor=cornsilk>'.$prioridad.'</td>
						<td bgcolor=cornsilk>'.$user_reg.'</td>
						<td bgcolor=cornsilk>'.$array2['funcion'].'-'.$modelo.'</td>
						<td bgcolor=cornsilk>
						<button onclick=emailMant('.$fila['id'].')><img src="img/mail.png" widtd="32px" height="32px"></button></td>
						</tr>';
						
		}
	}echo "</table>";



?>