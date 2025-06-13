<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  productos-ver3.php                                                      //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$topFile="N";
$headFile="N";
$topAdmin="N";
$findData="S";
$grid="S";
$whiteBackground="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
//FechayHora();
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['modalId']))
{ $modalId=$_GET['modalId']; }
if(!isset($modalId))
{ $modalId=""; }

if(!isset($id) or $id=="")
{
 $error="No Tengo los datos del producto a busar.";
 error();
 exit();
}

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
if($activo=="" or $activo=="N")
{
 $op="act";
 $button="Activar";
}
else
{
 $op="des";
 $button="Desactivar";
}
//-----------------------------------------------
//include("$dirRoot"."bots/bot-categoria.php");
//include("$dirRoot"."datafiles/catData.php");
//include("$dirRoot"."bots/bot-subcategoria.php");
//include("$dirRoot"."datafiles/subCatData.php");
//-----------------------------------------------
?>

<style>
*{  margin: 0;  padding: 0;}
/* body { align-items: center; background: #212121; } */

.button {
  background-color: #008CBA;
  border: none;
  color: white;
  padding: 8px 16px;
border-radius: 12px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
transition-duration: 0.4s;
}

.button2 {
  height: 48px;
  width: 180px;
  text-align: center;
  color: #000;
  font-size: 1rem;
  font-weight: 200;
  background: transparent;
  border: 1px solid #fff;
  border-radius: 4px;
  margin: 20px 0;
  cursor: pointer;
  transition: all 0.3s ease;
  outline: none;
}

.button:hover {
 background-color: #000;
 color: #FE7880;
 border: 1px solid red;
}

.button:active {
  outline: none;
}

.button:active:after {
  padding: 0;
  margin: 0;
  opacity: 1;
  transition: 0s
}
.button-secondary {
  border: 1px solid #FE7880;
  color: #FE7880;
}

.button-secondary:hover {
  background: #FE7880;
  color: #fff;
}
.responsive {
  width: 100%;
  max-width: 400px;
  height: auto;
  border-radius: 20%;
}
p {
  line-height: 1;
}
br {
 display: block;
 margin: 10px 0;
 line-height:10px;
}
br:after {
  content: '';
}
</style>


<div class="ui two column grid pading">
 <div class='column'>
   <?php echo "<form class='ui form' action='producto-del2.php?op=del&id=$id' method='post' enctype='multipart/form-data'>"; ?>
     <button class="ui red fluid button" type="submit"><i class="trash icon"></i> Borra</button>
   </form>
 </div>
 <div class='column'>
   <?php echo "<form class='ui form' action='producto-del2.php?op=$op&id=$id' method='post' enctype='multipart/form-data'>"; ?>
    <button class="ui blue fluid button" type="submit"><?php echo $button; ?></button>
   </form>
 </div>
</div>

<div class="equal width row">
  <?php
     if($proData['foto_producto']<>"")
     {
       echo " <div class='column center'>
        <img class='ui tiny image' src='$dirRoot"."imagenes/productos/$fotoPro'>
       </div>";
     }
  ?>
  <div class="column">
    <?php
      echo "<h2><b>$nom_producto</h2>";
      if($codigo_barra<>"")
      { echo "<b>C&oacute;digo Barra</b>: ".$codigo_barra.""; }
      else
      { echo "<b>C&oacute;digo</b>: ".$proData['cod_producto'].""; }
      echo "<br><b>Categor&iacute;a</b>: ".$nom_categoria."";
      if(isset($nom_subcategoria))
      { echo "<br><b>Sub-Categor&iacute;a</b>: ".$nom_subcategoria.""; }
      if($brand_marca<>"")
      { echo "<br><b>Marca</b>: ". $proData['brand_marca'].""; }
      if($nom_unidad<>"")
      { echo "<br><b>Unidad/Medida</b>: ". $proData['nom_unidad'].""; }
      if($empaque<>"")
      { echo "<br><b>Empaque</b>: $empaque"; }

      if($stock_actual>0)
      { echo "<br><b>Stock</b>: $stock_actual"; }

      //if($fisico<>"")
      //{ echo "<br><b>Fisico</b>: $fisico"; }
      //if($tamano>0)
      //{ echo "<br><b>Tamano</b>: $tamano"; }
      //if($peso>0)
      //{ echo "<br><b>Peso</b>: $peso"; }
      //if($bultos<>"")
      //{ echo "<br><b>Bultos</b>: $bultos"; }

      if($cod_proveedor<>"")
      { echo "<br><b>Proveedor</b>: $cod_proveedor"; }
      if($paisorigen<>"")
      { echo "<br><b>Pais Origen</b>: $paisorigen"; }
      if($precio_compra>0)
      {
        echo "<br><b>Precio Compra</b>: ". number_format($precio_compra,2,',', '.') . "";
      }
      if($precio1_producto>0)
      {
        echo "<br><b>Precio Detal</b>: ". number_format($precio1_producto,2,',', '.') . "";
      }
      if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
      {
        if($precio2_producto>0)
        {
          echo "<br><b>Precio Mayor</b>: ". number_format($precio2_producto,2,',', '.') . "";

        }
      }
      if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
      {
        if($precio3_producto>0)
        {
          echo "<br><b>Precio Gran Mayorista</b>: ". number_format($precio3_producto,2,',', '.') . "";
          echo "<br>Cambiar Precio Gran Mayorista $cambia_precio";
        }
      }
      if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
      {
        if($proData['precio4_producto']>0)
        {
          echo "<br><b>Precio Especial</b>: ". number_format($proData['precio4_producto'],2,',', '.') . "";
        }
      }
      if($pro_brevedato<>"")
      {
        echo "<br><b>Breve Datos</b>: $pro_brevedato";
      }
      if($datos_producto<>"")
      {
        echo "<br><b>Descripci&oacute;n</b>: ".$proData['datos_producto']."";
      }
      if($submitted<>"")
      {
        echo "<br><b>Publicado</b>: ".$proData['submitted']."";
      }
    ?>
      <div class="ui hidden divider"></div>
      <div class="ui two column grid pading">
       <div class='column'>
        <?php echo "<form class='ui form' action='producto-del2.php?op=del&id=$id' method='post' enctype='multipart/form-data'>"; ?>
          <button class="ui red fluid button" type="submit"><i class="trash icon"></i> Borra</button>
        </form>
       </div>
       <div class='column'>
        <?php echo "<form class='ui form' action='producto-del2.php?op=$op&id=$id' method='post' enctype='multipart/form-data'>"; ?>
          <button class="ui blue fluid button" type="submit"><?php echo $button; ?></button>
        </form>
       </div>
      </div>
  </div>
</div>

<?php
include("statusbar.php");
?>
