<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  empaque2php                                                            //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$accordion="N";
$aos="N";
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
$jQueryModal="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$popup="N";
$rating="N";
$sidebar="S";
$tabs="S";
$table="S";
$topAdmin="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
// Variables 2
FechayHora();
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['op2']))
{ $op2=$_GET['op2']; }
if(isset($_POST['buscar']))
{ $codigo_barra="$_POST[buscar]"; }
$codigo_barra=trim($codigo_barra);
$title="Ficha del Producto";
//echo "<br> $codigo_barra";
include("../bots/bot-productos.php");

if(!isset($codigo_barra) or empty($codigo_barra))
{
 $error="Hay en Error en Los Datos<br>Prueba con otro Producto o Revisa que la Tabla existe y este este bien...";
 error();
 echo "<html><meta http-equiv=refresh content=3;url=blank.php>";
 exit();
}
if(!isset($proData) or $proData=="")
{
 $error="No Existe Este Producto<br>Prueba con otro Producto...";
 error();
 echo "<html><meta http-equiv=refresh content=3;url=blank.php>";
 exit();
}
if(isset($proData))
{
    $id=$proData['id_producto'];
    $id_producto=$proData['id_producto'];
    $cod_producto=$proData['cod_producto'];
    $codigo_barra=$proData['codigo_barra'];
    $cod_upcean=$proData['cod_upcean'];
    $cod_categoria=$proData['cod_categoria'];
    $cod_subcategoria=$proData['cod_subcategoria'];
    $nom_producto=$proData['nom_producto'];
    $pro_brevedato=$proData['pro_brevedato'];
    $datos_producto=$proData['datos_producto'];
    $cod_proveedor=$proData['cod_proveedor'];
    $paisorigen=$proData['paisorigen'];
    $brand_marca=$proData['brand_marca'];
    $precio_compra=$proData['precio_compra'];
    $precio1_producto=$proData['precio1_producto'];
    $precio2_producto=$proData['precio2_producto'];
    $precio3_producto=$proData['precio3_producto'];
    $precio4_producto=$proData['precio4_producto'];
    $nom_unidad=$proData['nom_unidad'];
    $empaque=$proData['empaque'];
    //$fisico=$proData['fisico'];
    //$tamano=$proData['tamano'];
    //$peso=$proData['peso'];
    //$bultos=$proData['bultos'];
    $foto_producto=$proData['foto_producto'];
    $submitted=$proData['submitted'];

   //-----------------------------------------------
    //Find_ProCat_Cod();
    include("$dirRoot"."bots/Find_ProCat_Cod.php");
    //include("$dirRoot"."datafiles/find-pro-cat.php");
    include("$dirRoot"."bots/Find_ProSubCat_Cod.php");
    if(isset($proCatData))
    { $nom_categoria=$proCatData['nom_categoria']; }
    else
    { $nom_categoria=""; }
    if(isset($subCatData))
    { $nom_subcategoria=$subCatData['nom_subcategoria']; }
    else
    { $nom_subcategoria=""; }
   //-----------------------------------------------
    if($proData['foto_producto']<>"" and $proData['foto_producto']<>"Array")
    { $fotoPro=$proData['foto_producto']; }
    else
    { $fotoPro="sinfoto.png"; }
   //-----------------------------------------------



// echo "<form class='ui form' action='producto-edit2.php?op=empaque&id=$id' method='POST'>";
?>

<div class="ui top attached tabular menu">
  <a class="active item" data-tab="datos" style="background-color:#ffffff;color:#000000;">Datos</a>
  <a class="item" data-tab="foto" style="background-color:#cccccc;color:#000000;">Foto</a>
</div>

<div class="ui bottom attached active tab segment" data-tab="datos">
  <?php
   include("./form-data.php");
  ?>
</div>
<div class="ui bottom attached tab segment" data-tab="foto" style="background-color:#cccccc;color:#000000;">

   <?php
    if($foto_producto<>"" and $foto_producto<>"Array")
    {
      echo "<div class='field'>
       <img class='boxShadow' src='../imagenes/productos/$foto_producto' style='height:200px;'>
     </div>";
    }
    else
    { echo "<div class='field'>
        <img class='roundBox boxShadow' src='../imagenes/productos/sinfoto.png' style='height:200px;'>
      </div>";
    }
   ?>

</div>





<div class="ui hidden divider"></div>



<?php
}
//$endPage="N";
//$showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
