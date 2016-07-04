<?php
include "dbcon.php";
include "accesscontrol.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

<?php
 include "scripts.html";
?>

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

                        <h1>Aeropuerto Internacional<br>"La Chinita"</h1>
                        <h3>Aplicacion Web.</h3>
                        <hr class="intro-divider">
						
                        <ul class="list-inline intro-social-buttons">
                        <?php if ($_SESSION['tipo']==2){?>
                            <li>
                                <a href="activos.php" class="btn btn-default btn-lg"><img src="img/inventory.png" /><br />&nbsp &nbsp &nbsp <i class="fa fa-keyboard-o fa-fw"></i> <span class="network-name">Activos &nbsp &nbsp &nbsp</span></a>
                            </li>
                            <?php }
                            if ($_SESSION['tipo']==3 or $_SESSION['tipo']==2){ ?>
                            <li>
                                <a href="mantenimiento.php" class="btn btn-default btn-lg"><img src="img/wrench.png" /><br /><i class="fa fa-desktop fa-fw"></i> <span class="network-name">Mantenimiento</span></a>
                            </li>
                           <?php }
                            if ($_SESSION['tipo']==1){ ?>
                            <li>
                                <a href="sistema.php" class="btn btn-default btn-lg"><img src="img/wrench.png" /><br />&nbsp &nbsp &nbsp <i class="fa fa-desktop fa-fw"></i> <span class="network-name">Sistema &nbsp &nbsp &nbsp </span></a>
                            </li>
                            <?php } ?>
                        </ul>
						
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->



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
						<p>Código Postal 4012</p></div>
						
                    <!-- <p class="copyright text-muted small">Proyecto de Informatica</p> -->
                </div>
            </div>
        </div>
    </footer>

</body>

</html>





