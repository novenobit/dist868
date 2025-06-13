<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-subcat.php                                                          //
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
$popupWindow="S";
$popup="S";
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

include("find-products.php");

//FechayHora();
if(isset($_GET['id']))
{ $id=$_GET['id']; }
//-----------------------------------------------
$title="Ficha del Producto";
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



<div class="ui top attached tabular menu">
  <a class="active item" data-tab="datos">Datos</a>
  <a class="active item" data-tab="foto">Foto</a>
</div>
<div class="ui bottom attached active tab segment" data-tab="datos">


    <div class="">
     <div class="ui header big text"><?php echo $nom_producto; ?></div>
     <div class="ui large vertical fluid menu">
      <?php
        if(!isset($nom_subcategoria))
        { $nom_subcategoria="sin-datos"; }
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

        if($stock_actual>0)
        { echo "<p class='item'>Stock: $stock_actual</p>"; }

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

  </div>

</div>
<div class="ui bottom attached tab segment" data-tab="foto">
  <?php echo "<img class='ui medium image' src='$dirRoot"."imagenes/productos/$fotoPro' style='width:400px'>"; ?>
</div>

<?php
if(isset($CambiarDatos) and $CambiarDatos=="S")
{
  include("statusbar.php");
}

$tab="S";
include("$dirRoot"."includes/statusAdmin.php");
?>
