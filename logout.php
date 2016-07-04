<?php
include "js/common.php";
// Begin the session
session_start();

// Unset all of the session variables.
session_unset();

// Destroy the session.
session_destroy();

error_lvl("Ha salido del sistema");
?>