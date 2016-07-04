<?php
include "dbcon.php";
include "accesscontrol.php"; 
include "validate_23.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include "scripts.html";?>
<script language="JavaScript" src="js/gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
<script src="scriptsMant/mant.js"></script>
<script src="scriptsMant/modalMant.js"></script>
<script src="scriptsMant/modalEmail.js"></script>
<script src="js/jquery.battatech.excelexport.js"></script>
<script src="js/jspdf.debug.js"></script>

</head>

<body>
<!-- Navigation -->
<?php include "navbar.php";?>
    <!-- Header -->
    <div class="intro-header">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">

                        <h1>Mantenimiento</h1>
                        <h3>Aplicacion Web.</h3>
                        <hr class="intro-divider">
                    <?php if($_SESSION['tipo']==2){ ?>    
                    <div class="container" style="color:#444444">
                        <div class="row">
                        <div class="col-lg-4">
                                <button id="clicky" class="btn btn-default btn-lg"><i class="fa fa-keyboard-o fa-fw"></i> <span class="network-name">Planificar<br>Mantenimiento</span></button>
                                <?php include "mant/planMant.php";?>
                        </div>                               
                        <div class="col-lg-4">
                                <button id="clicky2" class="btn btn-default btn-lg"><i class="fa fa-desktop fa-fw"></i> <span class="network-name">Modificar<br>Mantenimiento</span></button>
                                <?php include "mant/modiMant.php";?>
                        </div>                               
                        <div class="col-lg-4">
                                <button id="clicky3" class="btn btn-default btn-lg"><i class="fa fa-keyboard-o fa-fw"></i> <span class="network-name">Completar<br>Manteniminento</span></button>
                                <?php include "mant/finishMant.php";?>
                        </div>                               
                       
                        </div>
                        <div class="row">

                        <div class="col-lg-2"></div>
                        <div class="col-lg-4"><button id="planificado" class="btn btn-default btn-lg"><i class="fa fa-keyboard-o fa-fw"></i> 
                        <span class="network-name">Planificados</span></button></div>
                        <div class="col-lg-4"><button id="historico" class="btn btn-default btn-lg"><i class="fa fa-keyboard-o fa-fw"></i>
                         <span class="network-name">Historico</span></button> </div>
                        <div class="col-lg-2"></div>
                        </div>

                    </div>
                    <?php } if($_SESSION['tipo']==3){ ?>
                       <div class="container" style="color:#444444">
                        <div class="row">                                                   
                        <div class="col-lg-4">
                                <button id="clicky3" class="btn btn-default btn-lg"><i class="fa fa-keyboard-o fa-fw"></i> <span class="network-name">Completar<br>Manteniminento</span></button>
                                <?php include "mant/finishMant.php";?>
                        </div>                               
                       <div class="col-lg-4"><button id="planificado" class="btn btn-default btn-lg"><i class="fa fa-keyboard-o fa-fw"></i> 
                        <span class="network-name">Planificados</span></button></div>
                        <div class="col-lg-4"><button id="historico" class="btn btn-default btn-lg"><i class="fa fa-keyboard-o fa-fw"></i>
                        <span class="network-name">Historico</span></button> </div>
                        </div>

                    </div>
                    <?php } ?>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    </div>


    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                     
                    </ul>
					<div class="kit"><a href="http://ailc.baer.gob.ve/"><img src="img/ailc.jpg" /><a><a href="http://www.mpptaa.gob.ve/"><img  src="img/mpptaa.png" /><a href="http://www.inac.gob.ve/home.php"><img  src="img/inac.png" /></a></div>
					
					<div class="cat">					
					<p>Ministerio del Poder Popular para Transporte Acuático y Aéreo</p>
						<p>Bolivariana de Aeropuertos, S.A. (BAER) RIF: G-20008992-0</p>
						<p>Aeropuerto Internacional La Chinita</p>
						<p>Av. Don Manuel Belloso al Final, Municipio San Francisco</p>
						<p>Código Postal 4012</p>
                    </div>
                    <!-- <p class="copyright text-muted small">Proyecto de Informatica</p> -->
                </div>
            </div>
        </div>
    </footer>

 
</body>

</html>





