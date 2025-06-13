<?php
session_start();
//remove the id from our cart array
$key = array_search($_GET['id'], $_SESSION['pedido']);
unset($_SESSION['pedido'][$key]);

unset($_SESSION['cantidad'][$_GET['index']]);
//rearrange array after unset
$_SESSION['cantidad'] = array_values($_SESSION['cantidad']);

$_SESSION['message'] = "Producto eliminado de la Cesta";
header('location: ver.php');
?>
