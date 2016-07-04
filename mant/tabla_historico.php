<?php
include '../dbcon.php';
;
// session_start();
			
		$stmt=$dbcon->prepare("SELECT * FROM `hist_mantenimiento` ORDER BY fecha_fin DESC");
		$stmt->execute();
		$count = $stmt->rowCount();
		$array = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if($count > 0)
		{
			echo "<div id=hist><table id=thistorico class=\"table table-condensed\">
					<tr>
						<td bgcolor=indianred>Fecha de registro</td>
						<td bgcolor=indianred>Fecha de Culminaci&oacute;n</td>
						<td bgcolor=indianred>Usuario que registr&oacute;</td>
						<td bgcolor=indianred>Usuario que complet&oacute;</td>
						<td bgcolor=indianred>Nro. de Activo</td>
						<td bgcolor=indianred>Descripci&oacute;n</td>
						<td bgcolor=indianred>Comentarios Finales</td>
					</tr>
			";

			foreach($array as $fila)
			{

			
				$stmt4=$dbcon->prepare("SELECT nombre,apellido FROM user WHERE id = :user_fin");
				$stmt4->bindParam(":user_fin", $fila['user_fin']);
				$stmt4->execute();
				$array= $stmt4->fetch();
				$user_fin=$array['nombre'].' '.$array['apellido'];
				$stmt5=$dbcon->prepare("SELECT nombre,apellido FROM user WHERE id = :user_reg");
				$stmt5->bindParam(":user_reg", $fila['user_reg']);
				$stmt5->execute();
				$array2 = $stmt5->fetch();
				$user_reg=$array2['nombre'].' '.$array2['apellido'];
						
				
					echo '<tr>
						<td bgcolor=cornsilk>'.$fila['fecha_reg'].'</td>
						<td bgcolor=cornsilk>'.$fila['fecha_fin'].'</td>
						<td bgcolor=cornsilk>'.$user_reg.'</td>
						<td bgcolor=cornsilk>'.$user_fin.'</td>
						<td bgcolor=cornsilk>'.$fila['nro_activo'].'</td>
						<td bgcolor=cornsilk>'.$fila['desc_mant'].'</td>
						<td bgcolor=cornsilk>'.$fila['comentarios'].'</td>
						</tr>';
						
		}
	}echo "</table></div>";



?>