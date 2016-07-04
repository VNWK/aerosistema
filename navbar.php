<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
<div class="wrap-featured zerogrid">
	<div class="slider">
		<div class="rslides_container">
			<ul class="rslides" id="slider">
				<li><img class="width" src="img/logo-gob.jpg"/></li>
				<li><img  class="width"src="img/logo-gob2.jpg"/></li>
			</ul>
		</div>
	</div></div><a href="#" class="centered-btns_nav centered-btns1_nav prev">Previous</a><a href="#" class="centered-btns_nav centered-btns1_nav next">Next</a>
    <div class="change"><img src="img/logo-gob-min.jpg"/></div>	<!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Aeropuerto La Chinita</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <?php if ($_SESSION['tipo']==2){?>
                <li>
                    <a href="activos.php">Activos</a>
                </li>
                <?php } if ($_SESSION['tipo']==3 or $_SESSION['tipo']==2){?>
                <li>
                    <a href="mantenimiento.php">Mantenimiento</a>
                </li>
                <?php } if ($_SESSION['tipo']==1){?>
                <li>
                    <a href="sistema.php">Sistema</a>
                </li>
                <?php }						

                if (isset($_SESSION)){?>
    
    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
     <?php } ?>
  </ul>

        </div>
        

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>