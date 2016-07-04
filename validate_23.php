<?php
include_once "accesscontrol.php";
//DESTRUCCION SESION ACCESO NO AUTORIZADO !=NIVEL 1
if($_SESSION['tipo']!=2 AND $_SESSION['tipo']!=3){
$_SESSION=NULL;
session_destroy();
error_lvl('\No tiene privilegios para acceder a estas opciones\n\n SU SESION SERA TERMINADA');

}
?>