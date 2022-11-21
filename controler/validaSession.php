<?php

session_start();
if($_SESSION['usuarioAutenticado'] != 'SIM'){
  header('Location: controler/logoff.php');
}

?>