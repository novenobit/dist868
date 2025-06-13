<?php
session_start();
unset($_SESSION['pedido']);
$_SESSION['message'] = 'Cart cleared successfully';
//header('location:../index.php');
echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
?>
