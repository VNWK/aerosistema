<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
		<div class="wrap-featured zerogrid">
		<div class="slider">
			<div class="rslides_container">
				<ul class="rslides" id="slider">
					<li><img class="width" src="img/logo-gob1.jpg"/></li>
					<li><img  class="width"src="img/logo-gob1.jpg"/></li>
				</ul>
			</div></div>
<div class="change"><img src="img/logo-gob-min.jpg"/></div>
				

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Aeropuerto La Chinita</a>
	  </div>
 
    <div class="collapse navbar-collapse" id="myNavbar">
    <?php if(isset($_SESSION['userid']))
    {
    if ($_SESSION['tipo']==1){?>
    <ul class="nav navbar-nav">        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="creacion_usuarios.php">Agregar Usuarios</a></li>
            <li class="divider"></li>
            <li ><a href="modificar_usuarios.php">Modificar Usuarios</a></li>
            
          </ul>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sistema <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="respaldarBd.php">Respaldar Base de Datos</a></li>
            
          </ul>
        </li>
      
      </ul>
      <?php }
      elseif($_SESSION['tipo']==2){ ?>
      <ul class="nav navbar-nav">        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Activos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="insert_datos.php">Incorporar Activos</a></li>
            <li class="divider"></li>
            <li><a href="modificar_datos.php">Modificar Activos</a></li> 
            <li class="divider"></li>
            <li><a href="lista_datos.php">Listado Activos</a></li> 
          
          </ul>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Coord2<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li> 
        <li><a href="#">Page 3</a></li> 
          </ul>
        </li>
      
      </ul>
      <?php }
      elseif($_SESSION['tipo']==3){ ?>
      <ul class="nav navbar-nav">        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mant <span class="caret"></span></a>
          <ul class="dropdown-menu">
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li> 
        <li><a href="#">Page 3</a></li> 
          </ul>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mant2 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li> 
        <li><a href="#">Page 3</a></li> 
          </ul>
        </li>
      
      </ul>
      <?php } ?>
     
      <ul class="nav navbar-nav navbar-right">     
        
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
      </ul>
      <?php }  ?>
    </div>
  </div>
</nav>