<?php // common.php
 
function error($msg) {
?>
<html>
<head>
  <script language="JavaScript">
  <!--
  alert("<?=$msg?>");
  history.back();
  //-->
  </script>
</head>
<body>
</body>
</html>
<?php
exit;
}

function error_lvl($msg) {
?>
<html>
<head>
  <script language="JavaScript">
  <!--
  alert("<?=$msg?>");
  window.location="login.php";
  //-->
  </script>
</head>
<body>
</body>
</html>
<?php
exit;
}

function error_login($msg) {
?>
<html>
<head>
  <script language="JavaScript">
  <!--
  alert("<?=$msg?>");
  window.location="index.php";
  //-->
  </script>
</head>
<body>
</body>
</html>
<?php
exit;
}

?>
