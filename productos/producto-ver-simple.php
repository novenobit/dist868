<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  producto-ver1.php                                                      //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$image="S";
$menu="S";
$divider="S";
$icon="S";
$input="S";
$table="S";
$message="S";
$label="S";
$autoPro="S";
$divider="S";
$forms="S";
$breadCrumb="S";
$findData="S";
$popupWindow="S";
$modal="S";
$dropdown="S";
$topAdmin="S";
$loadPage="S";
$whiteBackground="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

FechayHora();
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['idpro']))
{ $idpro=$_GET['idpro']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['op2']))
{ $op2=$_GET['op2']; }
if(isset($_GET['nom_producto']))
{ $nom_producto=$_GET['nom_producto']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
if(isset($_GET['nom_producto']))
{ $nom_producto="$_GET[nom_producto]"; }
if(isset($_GET['codigo_barra']))
{ $codigo_barra=$_GET['codigo_barra']; }

if(!isset($op))
{ $op="lp"; }
$num=0;
$ves=1;

$title="Ficha del Producto";
//-----------------------------------------------
include("$dirRoot"."bots/bot-productos.php");
if(!isset($proData) or empty($proData))
{
 $error="Hay en Error en Los Datos<br>Prueba con otro Producto o Revisa que la Tabla existe y este este bien...";
 error();
  exit();
}
$findCategoria="S";
include("$dirRoot"."datafiles/proData.php");
//-----------------------------------------------
//include("$dirRoot"."bots/bot-categoria.php");
//include("$dirRoot"."datafiles/catData.php");
//include("$dirRoot"."bots/bot-subcategoria.php");
//include("$dirRoot"."datafiles/subCatData.php");
//-----------------------------------------------
?>

<style>
br {
 display: block;
 margin: 10px 0;
 line-height:10px;
}
br:after {
  content: '';
}
</style>
<div class="ui container">

<div class="ui visible blue message">
  <h2><?php echo $nom_producto; ?></h2>
</div>

<div class="ui horizontal fluid raised card" style="background-color:#22313F;color:#ffffff;">
 <div class="image" style=" padding: 20px 10px 10px 10px;">
   <?php echo "<img class='ui image' src='$dirRoot"."imagenes/productos/$fotoPro'>"; ?>
 </div>
 <div class="content">
  <div class="ui large vertical fluid menu" style=" padding: 10px 10px 10px 10px;">

    <?php
      if($codigo_barra<>"")
      { echo "C&oacute;digo Barra: ".$codigo_barra.""; }
      else
      { echo "C&oacute;digo: ".$cod_producto.""; }
      echo "<br>Categor&iacute;a: ".$nom_categoria."";
      echo "<br>Sub-Categor&iacute;a: ".$nom_subcategoria."";
      if($brand_marca<>"")
      { echo "<br>Marca: ". $brand_marca.""; }
      if($nom_unidad<>"")
      { echo "<br>Unidad/Medida: ".$nom_unidad.""; }
      if($empaque<>"")
      { echo "<br>Empaque: $empaque"; }
      if($stock_actual>0)
      { echo "<br>Stock: $stock_actual"; }
      //if($fisico<>"")
      //{ echo "<br>Fisico: $fisico"; }
      //if($tamano>0)
      //{ echo "<br>Tamano: $tamano"; }
      //if($peso>0)
      //{ echo "<br>Peso: $peso"; }
      //if($bultos<>"")
      //{ echo "<br>Bultos: $bultos"; }
      if($cod_proveedor<>"")
      { echo "<br>Proveedor: $cod_proveedor"; }
      if($paisorigen<>"")
      { echo "<br>Pais Origen: $paisorigen"; }
      if($precio_compra>0)
      {
        echo "<br>Precio Compra ". number_format($precio_compra,2,',', '.') . "";
      }
      if($precio1_producto>0)
      {
        echo "<br>Precio Ref. Venta ". number_format($precio1_producto,2,',', '.') . "";
      }
      if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
      {
        if($precio2_producto>0)
        {
        echo "<br>Precio Mayor ". number_format($precio2_producto,2,',', '.') . "";
        }
      }
      if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
      {
        if($precio3_producto>0)
        {
        echo "<br>Precio Especial ". number_format($precio3_producto,2,',', '.') . "";
        }
      }
      if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
      {
        if($precio4_producto>0)
        {
         echo "<br>Precio Gran Mayorista ". number_format($precio4_producto,2,',', '.') . "";
        }
        if(isset($cambia_precio))
        { echo "<br>Cambiar Precio Gran Mayorista: $cambia_precio"; }
      }

      if(isset($pro_brevedato) and $pro_brevedato<>"")
      {
        echo "<br>Breve Datos: $pro_brevedato";
      }
      if(isset($datos_producto) and $datos_producto<>"")
      {
        echo "<br>Descripci&oacute;n: ".$datos_producto."";
      }
      if($submitted<>"")
      {
        echo "<br>Publicado: ".$submitted."</p>";
      }
    ?>

  </div>
</div>
</div>
<a class="ui blue bottom attached button" href="javascript:window.close()">Cierra la Ventana</a>
<p><div class="ui hidden divider"></div></p>
