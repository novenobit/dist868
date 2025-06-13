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

if(isset($id_cuenta) and $id_cuenta<>"")
{
 if($sistema=="E")
 { include("$dirRoot"."bots/find-cuenta1.php"); }
 if($sistema=="V")
 { include("$dirRoot"."bots/find-pedido1.php"); }
}

if(isset($_POST['nota_venta']))
{ $nota_venta=$_POST['nota_venta'];
  if($nota_venta<>"")
  {
   // if($cuentaData['nota_venta']<>"")
   // { $nota="{$cuentaData['nota_venta']} $nota_venta";  }
   // else
   // { $nota=$nota_venta; }
   if(isset($id_cuenta) and $id_cuenta<>"")
   {
    if($sistema=="E" and $nota_venta<>"")
    {
      $query="update cuentas1 set nota_venta='$nota_venta' where id_cuenta='$id_cuenta'";
      $result=mysqli_query($conex1,$query);
    }
    if($sistema=="V" and $nota_venta<>"")
    {
      $query="update pedido1 set nota_venta='$nota_venta' where id_cuenta='$id_cuenta'";
      $result=mysqli_query($conex1,$query);
    }
   }
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
