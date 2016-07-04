<?php
include 'dbcon.php';
include 'scripts.html';?>

<script src="js/jquery.battatech.excelexport.js"></script>

<?php
            
        $stmt=$dbcon->prepare("SELECT * FROM `hist_mantenimiento` ORDER BY fecha_fin DESC");
        $stmt->execute();
        $count = $stmt->rowCount();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($count > 0)
        {
            echo "<table id=test2 class=\"table table-condensed\">
                    <tr>
                        <td>Fecha de registro</td>
                        <td>Fecha de Culminaci&oacute;n</td>
                        <td>Usuario que registr&oacute;</td>
                        <td>Usuario que complet&oacute;</td>
                        <td>Nro. de Activo</td>
                        <td colspan=2>Descripci&oacute;n</td>
                        <td colspan=2>Comentarios Finales</td>
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
                        <td>'.$fila['fecha_reg'].'</td>
                        <td>'.$fila['fecha_fin'].'</td>
                        <td>'.$user_reg.'</td>
                        <td>'.$user_fin.'</td>
                        <td>'.$fila['nro_activo'].'</td>
                        <td colspan=2>'.$fila['desc_mant'].'</td>
                        <td colspan=2>'.$fila['comentarios'].'</td>
                        </tr>';
                        
        }
    }echo "</table>";



?>
<button id='tt'>asd</button>
<script>
$(document).ready(function(){


$('#tt').click(function(){
asd = $('#test2').html;
alert(asd);
// $(asd).battatech_excelexport({
//             containerid: "test2"
//             , datatype: "Table"
//             , worksheetName: 'Datos de Activo'
            
//         });

});
});
</script>