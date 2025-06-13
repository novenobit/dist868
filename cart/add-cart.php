<?php
session_start();
//check if product is already in the cart
if(!in_array($_GET['id'], $_SESSION['cart']))
{
 array_push($_SESSION['cart'], $_GET['id']);
 $_SESSION['message'] = 'Producto agregado a tu cesta';
}
else
{
 $_SESSION['message'] = 'Este Producto ya esta en tu cesta';
}
$id=$_GET['id'];
//header('location: ../vercat3.php?idpro=$id');
echo "<html><meta http-equiv=refresh content=0;url=../vercat3.php?idpro=$id>";
?>
