<?php
session_start();

if (isset($_GET['id'])) {
  $proid = $_GET['id'];

  unset($_SESSION['pedido'][$proid]);
  header("location: cesta-ver.php");
}

?>
