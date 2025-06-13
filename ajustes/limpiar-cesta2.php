<?php
// ******************************************************** 2006 - 2017 ***
// Sistema Dist868                 //
// Copyright (c) 2006 NovenoBIT.com                                      //
// ************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
$topAdmin="N";
$topFile="N";
$tableUse="cuentas1";
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libUsers.php");
include_once("$dirRoot"."libs1/libGeneral.php");
//include_once("../includes/headfileFrame.php");
include_once("../libs1/loader.php");

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta="$_GET[id_cuenta]"; }
if(isset($_GET['sistema']))
{ $sistema=$_GET['sistema']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
$queryerror="Error en los Datos";

if(isset($id_cuenta) and $id_cuenta<>"")
{
 if($op=="B")
 {
  if($sistema=="E")
  {
   $query="update cuentas1 set total_venta1='0.00',descuento='',descuento_venta='0.00',total_venta2='0.00',valor_iva='0.00',impuesto_iva='0.00',valor_igtf='0.00',impuesto_igtf='0.00',servicios='0.00',monto_apagar='0.00',pago_cliente='0.00',total_cambio='0.00',preparado='',chequeado='',despachado='',cerracuenta='',nota_venta='Cuenta fue borrado por $usuario' where id_cuenta='$id_cuenta'";
   $result=mysqli_query($conex1,$query);
   $sqldel="delete from cuentas2 where id_cuenta='$id_cuenta'";
   $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $sqldel. " . mysqli_error());
  }
  if($sistema=="V")
  {
   $query="update pedido1 set total_venta1='0.00',descuento='',descuento_venta='0.00',total_venta2='0.00',valor_iva='0.00',impuesto_iva='0.00',valor_igtf='0.00',impuesto_igtf='0.00',servicios='0.00',monto_apagar='0.00',pago_cliente='0.00',total_cambio='0.00',preparado='',chequeado='',despachado='',cerracuenta='',nota_venta='Cuenta fue borrado por $usuario' where id_cuenta='$id_cuenta'";
   $result=mysqli_query($conex1,$query);
   $sqldel="delete from pedido2 where id_cuenta='$id_cuenta'";
   $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $sqldel. " . mysqli_error());
  }
 }
 if($op=="all")
 {
  if($sistema=="E")
  {
   $sqldel="delete from cuentas1 where id_cuenta='$id_cuenta'";
   $result=mysqli_query($conex1,$sqldel);
   $sqldel="delete from cuentas2 where id_cuenta='$id_cuenta'";
   $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $sqldel. " . mysqli_error());
  }
  if($sistema=="V")
  {
   $sqldel="delete from pedido1 where id_cuenta='$id_cuenta'";
   $result=mysqli_query($conex1,$sqldel);
   $sqldel="delete from pedido2 where id_cuenta='$id_cuenta'";
   $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $sqldel. " . mysqli_error());
  }
 }
}

if($sistema=="E")
{
 if($op=="B")
 {
  // echo "<html><meta http-equiv=refresh content=0;url=../cuentas/ajustes.php?id_cuenta=$id_cuenta>";
  echo "<html><meta http-equiv=refresh content=0;url=../cuentas/cuenta-ver1.php?id_cuenta=$id_cuenta&sistema=$sistema>";
 }
 else
 {
  echo "<html><meta http-equiv=refresh content=0;url=../cuentas/cuentas.php?sistema=$sistema&filter=e>";
 }
}
if($sistema=="V")
{
 if($op=="B")
 {
  // echo "<html><meta http-equiv=refresh content=0;url=../cuentas/ajustes.php?id_cuenta=$id_cuenta>";
   echo "<html><meta http-equiv=refresh content=0;url=../cuentas/cuentas-ver1.php?id_cuenta=$id_cuenta&sistema=$sistema>";
 }
 else
 {
  echo "<html><meta http-equiv=refresh content=0;url=../cuentas/cuentas.php?sistema=$sistema&filter=o>";
 }
}
?>
