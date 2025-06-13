<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                             //
//  cuentas-del1.php                                                         //
//  Copyright (c) 2023 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.    //
// ***************************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="S";
$icon="S";
$input="S";
$list="N";
$sidebar="S";
$table="S";
$message="S";
$popup="N";
$label="S";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="S";
$divider="S";
$forms="N";
$breadCrumb="S";
$findData="S";
$popup="S";
$topAdmin="S";
$dropdown="S";
$dirRoot="../";
$tableUse="cuentas";
include_once("../includes/headfileFrame.php");

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(isset($_GET['idcart']))
{ $idcart=$_GET['idcart']; }
if(isset($idcart))
{
 $sqldel="delete from pedironline1 where idcart='$idcart'";
 $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
 $sqldel="delete from pedironline2 where idcart='$idcart'";
 $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());

 $sql1="REPAIR TABLE pedironline1,pedironline2";
 $result2=mysqli_query($conex1,$sql1) or die ("$queryerror $query. " . mysqli_error());
}
echo "<html><meta http-equiv=refresh content=0;url=pedidos.php>";
exit();

?>
