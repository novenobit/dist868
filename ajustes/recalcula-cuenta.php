<?php
// ******************************************************** 2006 - 2017 ***
// Sistema Dist868                 //
// Copyright (c) 2006 NovenoBIT.com                                      //
// ************************************************************************
if(!isset($_SESSION))
 session_start();
if(!headers_sent())
{ header("Cache-Control: no-cache, must-revalidate");
 header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
}
ini_set("max_execution_time", "0");

// Variables to Activate
$subdir=2;
$dirLevel=2;
$jquery="S";
$jqueryTop="N";
$container="S";
//$prototype="S";

$topMenu="N";
// $hover="S";
$frame="S";
// $tabsMenu="S";
// $onlyData="S";
// $dataTables="S";
$showstatus="N";
$noFrame="N";
//$tableExit="S";
// $sistema="productos";
// $popup="S";
// $endPage="N";

include_once("../includes/config-top.php");
include("$dirTra"."includes/headfile.php");
include_once("$dirRoot"."libs1/libFindData.php");

$monto_apagar=0;
$total_venta1=0;
$descuento_venta=0;
$total_venta2=0;
$impuesto_iva=0;
$pago_cliente=0;
$total_cambio=0;
$propina=0;
$ttotal=0;
if(!isset($cuentaData))
{ $sqlCuenta=mysqli_query($conex1,"select * from $db1 where id_cuenta='$id_cuenta'");
  $cuentaData=mysqli_fetch_array($sqlCuenta);
  mysqli_free_result($sqlCuenta);
}
if($sistema=="R")
{ $servi_cuenta=0;
  $sqlcuentas=mysqli_query($conex1,"select servi_cuenta from cuentas where id_cuenta='$id_cuenta'");
  $cuentaData=mysqli_fetch_array($sqlcuentas);
  $servi_cuenta=$cuentaData['servi_cuenta'];
  mysqli_free_result($sqlcuentas);
}

$tipo_iva="A";
include("$dirRoot"."datafiles/iva-find.php");

// ceil() / floor() / round()
$query1="update $db1 set total_venta1='0', descuento='', descuento_venta='0', total_venta2='0', impuesto_iva='0', servi_cuenta='0', monto_apagar='0', pago_cliente='0', total_cambio='0', propina='0',pago_cambio='', cerracuenta=''  where id_cuenta='$id_cuenta'";
$result1=mysqli_query($conex1,$query1);

$sql=mysqli_query($conex1,"select id_item,cantidad from $db2 where id_cuenta='$id_cuenta'");
while($cestaData=mysqli_fetch_array($sql))
{
 $sqlbot=mysqli_query($conex1,"select precio1_item from items where id_item='{$cestaData['id_item']}'");
 $itemData=mysqli_fetch_array($sqlbot);
 $total_precio=$cestaData['cantidad']*$itemData['precio1_item'];
 $total_venta1=$total_precio+$total_venta1;
}
if(!empty($cuentaData['descuento']) and $cuentaData['descuento']<>'FIJO')
{ $descuento_venta=($total_venta1*$mesacalData['descuento'])/100; }
elseif($cuentaData['descuento']<>'FIJO')
{ $descuento_venta=0; }

 $ttotal=$ttotal+$total_venta1;
 $total_venta1=$ttotal;
 $total_venta2=($total_venta1-$descuento_venta);

 if($sistema=="R" and $cuentaData['servi_cuenta']>0)
 {
  $valorServicios=$cuentaData['servi_cuenta'];
  $servi_cuenta=($total_venta2*$valorServicios)/100;
 }
 if($sistema=="S" and $BSservi_cuentaS>0)
 {
  $valorServicios=$BSservi_cuentaS;
  $servi_cuenta=($total_venta2*$BSservi_cuentaS)/100;
 }
 if($sistema=="D" and $BSservi_cuentaD>0)
 {
  $valorServicios=$BSservi_cuentaD;
  $servi_cuenta=($total_venta2*$BSservi_cuentaD)/100;
 }
 include("$dirRoot"."libs1/CaluclaIVA.php");

 $impuesto_iva=($total_venta2*$iva)/100;
 $monto_apagar2=($total_venta2+$servi_cuenta+$impuesto_iva);
 $monto_apagar=0;
 $monto_apagar=(($total_venta2*$iva)/100)+$total_venta2+$servi_cuenta;
//---------------------------------
$query1="update $db1 set total_venta1='$total_venta1', descuento='', descuento_venta='0', total_venta2='$total_venta1', impuesto_iva='$impuesto_iva', servi_cuenta='$servi_cuenta', monto_apagar='$monto_apagar', pago_cliente='0', total_cambio='0', propina='0',pago_cambio='', cerracuenta=''  where id_cuenta='$id_cuenta'";
$result1=mysqli_query($conex1,$query1);
$query2="delete from $db_pagos where id_cuenta='$id_cuenta'";
$result2=mysqli_query($conex1,$query2);
$Table=$db1;
TableStatus();
if($dbEngine=="MyISAM")
{
 $sqlR="repair table $db1, $db2, $db_pagos";
 $resultR=mysqli_query($conex1,$sqlR) or die ("$queryerror $query. " . mysqli_error());
}
echo "<html><meta http-equiv=refresh content=0;url=../factura/formapago1.php?id_cuenta=$id_cuenta&sistema=$sistema&areaMesas=$areaMesas>";
exit();
?>
