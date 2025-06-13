<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  producto-edit2.php                                                      //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
include_once("../libs1/loader.php");
include_once("../includes/headfileFrame.php");
include_once("../libs1/libFindData.php");
FechayHora();
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_POST['id']))
{ $id=$_POST['id']; }

if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['op2']))
{ $op2=$_GET['op2']; }
if(!isset($op))
{ $op="lp"; }
if(!isset($op2))
{ $op2="lis"; }
// include("productos-list-abc.php");
include("../libs1/loader.php");
include("$dirRoot"."bots/getExtension.php");
// ------------------------------------
$precio1_producto=0;
$precio_compra=0;
include("$dirRoot"."bots/bot-productos.php");
include("setProductos.php");
if(empty($nom_producto))
{
 $error="falta algunos datos";
 error();
 exit();
}

if(isset($nom_unidad))
{
 include("$dirRoot"."datafiles/find-unidades.php");
}

if(isset($nom_producto))
{ $lnom_producto=substr($nom_producto,0,1); }

include("editData.php");

//if($op=="empaque")
//{
 // echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."productos/blank.php?op=$op&id=$id>";
//}
//else
//{
  echo "<html><meta http-equiv=refresh content=0;url=producto-ver2.php?op=ver&id=$id>";
//}
?>
