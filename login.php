<?php


?>
<html>

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "scripts.html" ?>

</head>

<body>

<!--header-->
<?php  include "header1.php" ?>

<!--body-->
<div class="jumbotron" style="background-color:WHITE"><br><br>
<h1 class="text-center2">
Login Sistema</h1>



<div class="row">
<!--left col-->
<div class="col-md-3 col-lg-3"></div>

<!--middle col--> 
<div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6">

<!--form-->
<form  name="login" id="login" action="loginSubmit.php" method="POST">

<!--form.division-->
<div class="form-group">
    <label for="division" class="control-label">E-Mail: </label>    
    <input class="form-control" type="text" name="email" id="email" \> 
</div>

<!--form.concepto-->  
<div class="form-group">
    <label for="concepto" class="control-label" >Contrase&ntilde;a: </label>        
    <input class="form-control"  type="password" name="pass" id="pass" \>
</div>


<br>
<div class="form-group">
<button type="submit" id="nSubmit" name="nSubmit" form="login" class="btn btn-lg btn-default btn-block center-block"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Ingresar</button>
</div>
</form>

</div>

<!--right col "BUTTONS"-->
<div class="col-sm-6 col-xs-6 col-md-3 col-lg-3"></div>
</div>
</body>
</html>
