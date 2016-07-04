<?php
include_once "js/common.php";
include 'accesscontrol.php';
if($_SESSION['tipo']!=1)
{
?>
<html>
<head>

<script language="JavaScript" src="js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
<script language="JavaScript" src='js/jquery-1.11.2.min.js'></script>
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet">

</head>
<body>

<?php include "header.php"; ?>

<div class="jumbotron" style="background-color:#40869B"><br><br><h1 class="text-center" style="color:ghostwhite">
Visualizar Datos</h1>
</div>

<div class="container-fluid">

<div class="row">
<div class="col-md-1 col-lg-1" >
</div>
<div class=" col-xs-12 col-sm-12 col-md-10 col-lg-10">
    <h4 class="text-center" style="color:teal">Ingrese el rango de fechas a consultar:</h4>
    <br>
    <form  class="form-inline text-center" action="" method="POST" name="rangoFecha" id="rangoFecha">
    <div class="form-group">
    <input class="form-control" type="date" name="rango1" id="rango1">
    </div>
    <div class="form-group">
    <input class="form-control" type="date" name="rango2" id="rango2">
    </div>
    <div class="form-group">  
    <input class="btn btn-info center-block" type="submit" name="consulta" value="consultar">
    </div>
    </form>
    <hr>
    
<?php
if (isset($_POST['consulta']))
{
$rango1=$_POST['rango1'];
$rango2=$_POST['rango2'];
$stmt2=$dbcon->prepare("SELECT division_id FROM user WHERE username=:sessionid");
$stmt2->bindParam(':sessionid',$_SESSION['userid']);
$stmt2->execute();
$user_div=$stmt2->fetchColumn();

$begin = new DateTime( $rango1 );
$end = new DateTime( $rango2);
$end->add(new DateInterval('P1D')); //Add 1 day to include the end date as a day
$interval = new DateInterval('P1D'); 
$period = new DatePeriod($begin, $interval, $end);
$aResult = array();
$days = 2;
foreach($period as $dt)
{
    $days=$days+1;
    $dates[] = $dt->format('Y-m-d');
    $week[$dt->format('W')][] = $dt->format('Y-m-d');
}

var_dump($week);
//query retorna valores del registro entre el rango especificado

$stmt=$dbcon->prepare("SELECT * FROM registro WHERE DATE(fecha) BETWEEN :rango1 AND :rango2 AND division_id=:user_div AND status='C'");
$stmt->bindParam(':rango1',$rango1);
$stmt->bindParam(':rango2',$rango2);
$stmt->bindParam(':user_div',$user_div);
$stmt->execute();
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
$numrows=$stmt->rowCount();
    if($numrows==0)
    {
        error('El Rango Seleccionado no Existe');
    }
else
{
    
foreach($rows as $row)
   
{
    $rango_fe[]=$row['fecha'];
    $id=$row['id'];
    $subseccion_id=$row['subseccion_id'];
    $stmt5 = $dbcon->prepare("SELECT  concepto.nombre co, seccion.nombre se, subseccion.nombre su, subseccion.id suid FROM concepto,seccion,subseccion
    WHERE seccion.concepto_id=concepto.id AND subseccion.seccion_id=seccion.id");
    
    $stmt5-> bindParam(':subseccion_id',$subseccion_id);
    $stmt5-> bindParam(':id',$id);
    $stmt5-> execute();
    $rows5 = $stmt5->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($rows5 as $row5) 
        {    
            $newArrayNom [$row5['co']] [$row5['se']] [$row5['su']]  = $row5['suid'];

        }
}

$rango_fi=array_unique($rango_fe);
sort($rango_fi);
echo "<tr>";



//inicializa el ciclo de cada tabla de la visualizacion
foreach($newArrayNom as $key => $val)
{
$dias=array();
echo "<table class=\"table table-hover table-condensed table-bordered id=salasituacional\"><tr><td class=text-center colspan=".$days." style=\"background-color:crimson;color:snow\"><b>".$key."</b></td></tr>
<tr><td class=text-center style=\"background-color:crimson;color:snow\" colspan=2 rowspan=2><b>Semanas</b></td>";

//inicio loop muestra dias de la semana
    foreach ($period as $dt)
    {
        echo "<td style=\"background-color:crimson;color:snow\">".$dt->format('D - j')."</td>";
    }
    echo "</tr>";
//fin Celdas Dias

//ciclo que crea las celdas de semanas
foreach($week as $semrow =>$valsem)
    {

        echo "<td class=text-center style=\"background-color:lightcoral;color:snow\" colspan=".count($valsem).">".$semrow."</td>";


        foreach ($valsem as $semrow2 =>$valsem2)
        {
           $dias[]=$valsem2;
            
        }
    }
    echo "</tr>";
    //fin loop Semanas

/*
    //loop dias segun cada semana

foreach($dias as $diasrow =>$valdias)
        {
          echo "<td class=text-center style=\"background-color:lightcoral;color:snow\">".$valdias."</td>";  
        }
                 
        echo "</tr>";

    //fin loop semanas

*/

    foreach($val as $key2 => $val2)
    {
        echo "<tr><td width=20% rowspan=".count($val2)." style=\"background-color:lightcoral;color:snow\">".$key2."</td>";

        foreach($val2 as $key3 =>$val3)
        {

                echo "<td  width=40%>".$key3."</td>";

                for($i=0;$i<count($dates);$i++)
                {
                echo "<td class=text-center>";
                $fecha=$dates[$i];
                $stmt2=$dbcon->prepare("SELECT valor FROM registro WHERE subseccion_id=:val3 AND fecha=:fecha AND status='C'");
                $stmt2->bindParam(':val3',$val3);
                $stmt2->bindParam(':fecha',$fecha);
                $stmt2->execute();
                $valor=$stmt2->fetchColumn();

                echo $valor;

                echo "</td>";
               
                }
                
        echo "</tr>"; 
        }

    }
echo "</table>";
}


?>
</table>
    <hr>
    <div class="center-block">
<button id="btnExport" class="btn btn-info">Exportar</button>
</div>
<script src="js/jquery.battatech.excelexport.js"></script>
<script>
$("#btnExport").click(function () {
       $("#salasituacional").battatech_excelexport({
                containerid: "salasituacional"
                , datatype: "Table"
                , worksheetName: 'PRODUCCION E INV. FISICO'
                
            });
        });
</script>
    </div>
    <div class="col-md-1 col-lg-1">
    </div>
    </div>
</div>
</body>
</html>

<?php } }
}
else
{
    include_once "logout.php";
}?>