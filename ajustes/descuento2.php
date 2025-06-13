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
if(isset($_GET['id_cuenta']))
{ $id_cuenta="$_GET[id_cuenta]"; }
if(isset($_GET['sistema']))
{ $sistema=$_GET['sistema']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
if(isset($_GET['id_descuento']))
{ $id_descuento="$_GET[id_descuento]"; }
if(isset($_POST['descuento']))
{ $descuento="$_POST[descuento]"; }

if(isset($id_cuenta) and $id_cuenta<>"")
{
 if($sistema=="E")
 {
   $query="update cuentas1 set descuento='$descuento' where id_cuenta='$id_cuenta'";
   $result=mysqli_query($conex1,$query);
 }
 if($sistema=="V")
 {
   $query="update pedido1 set descuento='$descuento' where id_cuenta='$id_cuenta'";
   $result=mysqli_query($conex1,$query);
 }
}

if($sistema=="E")
{
  echo "<html><meta http-equiv=refresh content=0;url=../cuentas/ajustes.php?id_cuenta=$id_cuenta>";
}
if($sistema=="V")
{
  echo "<html><meta http-equiv=refresh content=0;url=../cuentas/ajustes.php?id_cuenta=$id_cuenta>";
}
?>
