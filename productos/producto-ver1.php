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

<div class="ui floating message" style="background-color:#22313F;color:#ffffff;">
 <div class="ui breadcrumb">
  <div class="ui breadcrumb">
   <?php echo "<a class='section' href='productos.php'>Productos</a>"; ?>
   <i class='right angle icon divider'></i>
   <?php echo "<a class='section' href='pro-subcat.php?codCat=$cod_categoria'>$nom_categoria</a>"; ?>
   <i class='right angle icon divider'></i>
   <?php echo "<a class='section' href='productos-list.php?op2=subcat&codSubCat=$cod_subcategoria'>$nom_subcategoria</a>"; ?>
   <i class='right angle icon divider'></i>
   <?php echo "<a class='section'>$nom_producto</a>"; ?>
  </div>
 </div>
</div>

<div class="ui horizontal fluid raised card" style="background-color:#22313F;color:#ffffff;">
 <div class="image">
   <?php echo "<img class='ui image' src='$dirRoot"."imagenes/productos/$fotoPro' style='width:500px'>"; ?>
 </div>
 <div class="content">
  <div class="ui header big text" style="color:#ffffff;"><?php echo $nom_producto; ?></div>
  <div class="ui large vertical fluid menu">
    <?php
      if($codigo_barra<>"")
      { echo "<p class='item'>C&oacute;digo Barra: ".$codigo_barra."</p>"; }
      else
      { echo "<p class='item'>C&oacute;digo: ".$proData['cod_producto']."</p>"; }
      echo "<p class='item'>Categor&iacute;a: ".$nom_categoria."</p>";
      echo "<p class='item'>Sub-Categor&iacute;a: ".$nom_subcategoria."</p>";
      if($brand_marca<>"")
      { echo "<p class='item'>Marca: ". $proData['brand_marca']."</p>"; }
      if($nom_unidad<>"")
      { echo "<p class='item'>Unidad/Medida: ". $proData['nom_unidad']."</p>"; }
      if($empaque<>"")
      { echo "<p class='item'>Empaque: $empaque</p>"; }
      //if($fisico<>"")
      //{ echo "<p class='item'>Fisico: $fisico</p>"; }
      //if($tamano>0)
      //{ echo "<p class='item'>Tamano: $tamano</p>"; }
      //if($peso>0)
      //{ echo "<p class='item'>Peso: $peso</p>"; }
      //if($bultos<>"")
      //{ echo "<p class='item'>Bultos: $bultos</p>"; }
      if($cod_proveedor<>"")
      { echo "<p class='item'>Proveedor: $cod_proveedor</p>"; }
      if($paisorigen<>"")
      { echo "<p class='item'>Pais Origen: $paisorigen</p>"; }
      if($precio_compra>0)
      {
        echo "<p class='item'>Precio Compra ". number_format($precio_compra,2,',', '.') . "</p>";
      }
      if($precio1_producto>0)
      {
        echo "<p class='item'>Precio Ref. Venta ". number_format($precio1_producto,2,',', '.') . "</p>";
      }
      if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
      {
        if($precio2_producto>0)
        {
        echo "<p class='item'>Precio Mayor ". number_format($precio2_producto,2,',', '.') . "</p>";
        }
      }
      if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
      {
        if($precio3_producto>0)
        {
        echo "<p class='item'>Precio Especial ". number_format($precio3_producto,2,',', '.') . "</p>";
        }
      }
      if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
      {
        if($proData['precio4_producto']>0)
        {
        echo "<p class='item'>Precio Gran Mayorista ". number_format($proData['precio4_producto'],2,',', '.') . "</p>";
        }
        echo "<p class='item'>Cambiar Precio Gran Mayorista ". number_format($proData['cambia_precio'],2,',', '.') . "</p>";
      }

      if($pro_brevedato<>"")
      {
        echo "<p class='item'>Breve DAtos: $pro_brevedato</p>";
      }
      if($datos_producto<>"")
      {
        echo "<p class='item'>Descripci&oacute;n: ".$proData['datos_producto']."</p>";
      }
      if($submitted<>"")
      {
        echo "<p class='item'>Publicado: ".$proData['submitted']."</p>";
      }
    ?>
  </div>
  <div class="ui hidden divider"></div>
  <?php
  if(isset($CambiarDatos) and $CambiarDatos=="S")
  {
   echo "<div class='ui grid'>
     <div class='sixteen wide column'>
      <div class='ui wrapping spaced stackable buttons'>
        <a class='ui compact blue button' href='$dirRoot"."productos/producto-edit1.php?id=$id_producto' target='blank'><i class='edit icon'></i> Edit</a>
        <a class='ui compact blue button' href='$dirRoot"."productos/producto-cc1.php?id=$id_producto' target='blank'><i class='puzzle piece icon'></i> Categoria</a>
        <a class='ui compact blue button' href='$dirRoot"."productos/producto-foto1.php?id=$id_producto' target='blank'><i class='image icon'></i> Imagen</a>
        <a class='ui compact red button' href='$dirRoot"."productos/producto-del1.php?id=$id_producto' target='blank'><i class='trash alternate outline icon'></i> Borrar</a>
      </div>
     </div>
   </div>";
  }
  ?>
 </div>
</div>

<?php
// $limit=20;
// include("ingredientes.php");
?>

<p><div class="ui hidden divider"></div></p>
<p><div class="spaceSection"></div></p>

<?php
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
