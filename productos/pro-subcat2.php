<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-cat-list.php                                                        //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$aos="N";
$autoPro="S";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$findData="S";
$forms="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$popup="S";
$popupWindow="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$table="S";
$tabs="S";
$topAdmin="S";
$dirRoot="../";
$whiteBackground="S";
include_once("../includes/headfileFrame.php");
FechayHora();

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

if(isset($_GET['op2']))
{ $op2="$_GET[op2]"; }
$todoBien="N";
if(!isset($op2))
{ $op2="1"; }

if(isset($_GET['cod_categoria']))
{ $cod_categoria="$_GET[cod_categoria]"; }

if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }

if(!isset($op))
{ $op="lp"; }
if(!isset($op2))
{ $op2="lis"; }
if(isset($_GET['nomBuscar']))
{ $nomBuscar=$_GET['nomBuscar']; }

include("pro-subcat-data.php");

include("$dirRoot"."includes/statusAdmin.php");
?>
