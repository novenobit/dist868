<?php
session_start();
//check if product is already in the cart
if(!in_array($_GET['id'], $_SESSION['pedido']))
{
 array_push($_SESSION['pedido'], $_GET['id']);
 $_SESSION['message'] = 'Producto agregado a tu cesta';
}
else
{
 $_SESSION['message'] = 'Este Producto ya esta en tu cesta';
}
$id=$_GET['id'];

if(isset($_GET['returnTo']))
{ $returnTo=$_GET['returnTo']; }
if(isset($returnTo) and $returnTo<>"")
{
 if(isset($_GET['codCat']))
 { $codCat=$_GET['codCat']; }
 if(isset($_GET['codSubCat']))
 { $codSubCat=$_GET['codSubCat']; }
 if(isset($_GET['codCat']) and $_GET['codCat']<>"")
 {
  echo "<html><meta http-equiv=refresh content=0;url=../$returnTo?codCat=$codCat&codSubCat=$codSubCat>";
  exit();
 }
 else
 {
  echo "<html><meta http-equiv=refresh content=0;url=../vercat3.php?idpro=$id>";
 }
}
else
{
 //header('location: ../vercat3.php?idpro=$id');
 echo "<html><meta http-equiv=refresh content=0;url=../vercat3.php?idpro=$id>";
}
?>
