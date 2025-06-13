<?php
if(!isset($_SESSION))
{ session_start(); }
$idcart=$_SESSION['rand_num'];
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
echo "<html><meta http-equiv=refresh content=0;url=../cuentas/cuentas-ver1.php?rand_num=$rand_num>";
?>
