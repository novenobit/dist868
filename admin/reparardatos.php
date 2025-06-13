<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  CheckProdRepetido.php                                     //
// ****************************************************************
include_once("../includes/session.php");

$accordion="S";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$forms="N";
$header="N";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$loadPage="N";
$menu="N";
$message="S";
$modal="N";
$popup="N";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$tabs="N";
$table="S";
$topAdmin="N";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
// --------------------------------------------
if(!isset($areasSistema))
{
 include_once("../bots/AreasSistema.php");
}
if($AreaProductos<>"S" and $AreaAdmin<>"S")
{
  $error="No Tienes Permiso de Usar Esta Seccion";
  error();
  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."users/usersection.php>";
  exit();
}
// --------------------------------------------
if(isset($_GET['op']))
{ $op="$_GET[op]"; }
if(!isset($op))
{ $op=""; }
// ----------------------------
$num=0;
$dia=date("d");
$mes=date("m");
$ano=date("Y");
$amfm=date("a");
?>

<h2>Reparar Base de Datos</h2>
<div class="ui grid">
  <div class="six wide column">
   <?php
    include_once("../libs1/loader.php");
   ?>
  </div>
  <div class="ten wide column">
   <?php
     $tablas="areassistema, catalogos1, catalogos2, categoria, cesta, clientes, comandas, comentarios, cuentas1, cuentas2, cuentas_cliente,  productos, respaldo_cesta, respaldo_pagos, subcategoria, tipocliente, tipodeempleados, tipodeproveedor, tipodescuento, unidades, usuarios, ventas";
     echo "<br>Reparando las Tablas de la Base de Datos ";
     $sqlRT2="REPAIR TABLE $tablas";
     $result2=mysqli_query($conex1,$sqlRT2) or die ("$error en la consulta: $sqlRT2. " . mysqli_error());
     FlushData();
     // Optimizar Tablas
     echo "<br> Optimizando las Tablas de la Base de Datos";
     $sqlRT3="OPTIMIZE TABLE $tablas";
     $result3=mysqli_query($conex1,$sqlRT3) or die ("$error en la consulta: $sqlRT2. " . mysqli_error());
     FlushData();
   ?>
  </div>

</div>
<html><meta http-equiv=refresh content=4;url=right-menu.php>
