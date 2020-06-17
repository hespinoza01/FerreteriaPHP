<?php
  session_start();
  unset($_SESSION["user"]); 
  unset($_SESSION["last_access"]);
  session_destroy();
  header("Location: acceso.php");
  exit;
?>