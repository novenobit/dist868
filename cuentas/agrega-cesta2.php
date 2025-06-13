<?php
// ************************************************************* 2023 ********
//  agrega-cesta1.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$aos="N";
$findData="S";
$forms="S";
$header="N";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$menu="S";
$message="S";
$popup="N";
$rating="N";
$sidebar="N";
$table="S";
$topAdmin="S";
$dirRoot="../";
$tableUse="cuentas1";

include_once("../includes/headfileFrame.php");

FechayHora();
$todoBien="N";
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['idCat']))
{ $idCat=$_GET['idCat']; }
if(isset($_GET['codCat']))
{ $codCat=$_GET['codCat']; }
if(isset($_GET['codSubCat']))
{ $codSubCat=$_GET['codSubCat']; }
if(isset($_GET['nivelprecio']))
{ $nivelprecio=$_GET['nivelprecio']; }
if(!isset($nivelprecio))
{ $nivelprecio=1; }

$linkpage="agrega-cesta3.php";
if(isset($codCat) and $codCat<>"")
{ include("../bots/find-categoria.php"); }
if(isset($catData))
{
  $linkpage="agrega-cesta3.php";
  //include("../bots/find-subcategoria.php");
  include("list-subcategoria.php");
}
// include("$dirRoot"."includes/statusAdmin.php");
?>
