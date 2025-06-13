<?php
// include("../datafiles/insertProductos.php");
// include("$dirRoot"."datafiles/insertProductos.php");
$nom_producto=ucwords($nom_producto);
if(!isset($cod_producto) or $cod_producto=="")
{ $cod_producto=""; }
if(!isset($codigo_barra))
{ $codigo_barra=""; }
if(!isset($cod_upcean))
{ $cod_upcean=""; }
if(!isset($pro_brevedato))
{ $pro_brevedato=""; }
if(!isset($datos_producto))
{ $datos_producto=""; }
if(!empty($datos_producto))
{  $datos_producto=ucwords($datos_producto); }

if(!isset($cod_categoria))
{  $cod_categoria=""; }
if(!isset($cod_subcategoria))
{  $cod_subcategoria=""; }

if(!isset($cod_proveedor))
{ $cod_proveedor=""; }
if(!isset($paisorigen) or $paisorigen=="seleccione")
{ $paisorigen="ve"; }

if(!isset($brand_marca))
{ $brand_marca=""; }
if(!isset($precio_compra) or $precio_compra=="" )
{ $precio_compra="0.00"; }
if(!isset($precio1_producto) or $precio1_producto=="")
{ $precio1_producto="0.00"; }
if(!isset($precio2_producto) or $precio2_producto=="")
{ $precio2_producto="0.00"; }
if(!isset($precio3_producto) or $precio3_producto=="")
{ $precio3_producto="0.00"; }
if(!isset($precio4_producto) or $precio4_producto=="")
{ $precio4_producto="0.00"; }
if(!isset($nom_unidad))
{ $nom_unidad=""; }
if(!isset($empaque))
{ $empaque=""; }
if(!isset($stock_actual) or $stock_actual=="")
{ $stock_actual="0.00"; }
// ---------------------------------------------
//if(!isset($fisico))
//{ $fisico=""; }
//if(!isset($tamano) or $tamano=="")
//{ $tamano="0.00"; }
//if(!isset($peso) or $peso=="")
//{ $peso="0.00"; }
//if(!isset($bultos))
//{ $bultos=""; }
// ---------------------------------------------
if(isset($filename) and $filename<>"")
{ $foto_producto=$filename; }
if(!isset($foto_producto))
{ $foto_producto=""; }
if(!isset($foto_producto))
{ $foto_producto="";  }
if(!isset($cambia_precio))
{ $cambia_precio="S"; }
if(!isset($especial))
{ $especial=""; }
if(!isset($activo) or $activo=="")
{ $activo="S"; }
if(!isset($submitted))
{ $submitted="$dia/$mes/$ano"; }
//---------------------------------------------
if(strlen($nom_unidad)>5)
{
  if($datos_producto=="")
  { $datos_producto=$nom_unidad; }
  $nom_unidad=substr($nom_unidad, 5);
}
if(!isset($nom_unidad) or $nom_unidad=="")
{ $nom_unidad="UND"; }
if($cod_producto=="" and $codigo_barra<>"")
{ $cod_producto=$codigo_barra; }
if(strlen($cod_upcean)>20)
{
  if($datos_producto=="")
  { $datos_producto=$cod_upcean; }
  $cod_upcean="";
}
//---------------------------------------------
if(!isset($cod_producto) or $cod_producto=="")
{
//    $cod_producto=rand();
}
//---------------------------------------------
if($precio1_producto>0)
{ $precio1_producto = str_replace(',', '.', $precio1_producto); }
if($precio2_producto>0)
{ $precio2_producto = str_replace(',', '.', $precio2_producto); }
if($precio3_producto>0)
{ $precio3_producto = str_replace(',', '.', $precio3_producto); }
if($precio4_producto>0)
{ $precio4_producto = str_replace(',', '.', $precio4_producto); }
//---------------------------------------------

include("insert-pro-data.php");

// echo "<br>1 $cod_producto<br>2codigo_barra $codigo_barra<br>3cod_upcean $cod_upcean<br>4cod_categoria $cod_categoria<br>5 $cod_subcategoria<br>6nom_producto $nom_producto<br>7pro_brevedato $pro_brevedato<br>8 $datos_producto<br>9 $cod_proveedor<br>0paisorigen $paisorigen<br>1$brand_marca $brand_marca<br>2precio_compra $precio_compra<br>3precio1_producto $precio1_producto<br>4precio2_producto $precio2_producto<br>5precio3_producto $precio3_producto<br>6precio1_producto $precio4_producto<br>7nom_unidad $nom_unidad<br>8empaque $empaque<br>9fisico $fisico<br>0tamano $tamano<br>1 $peso<br>2 $bultos<br>3 $foto_producto<br>4 $submitted<br>5 activo";
//$query2="insert into productos(cod_producto, codigo_barra, cod_upcean, cod_categoria, cod_subcategoria, nom_producto, pro_brevedato, datos_producto, cod_proveedor, paisorigen, brand_marca, precio_compra, precio1_producto, precio2_producto, precio3_producto, precio4_producto, nom_unidad, empaque, stock_actual, foto_producto, especial, cambia_precio, submitted, activo)
//values('$cod_producto', '$codigo_barra', '$cod_upcean', '$cod_categoria', '$cod_subcategoria', '$nom_producto', '$pro_brevedato', '$datos_producto', '$cod_proveedor', '$paisorigen', '$brand_marca', '$precio_compra', '$precio1_producto', '$precio2_producto', '$precio3_producto', '$precio4_producto', '$nom_unidad', '$empaque', '$stock_actual', '$foto_producto', '$especial', '$cambia_precio', '$submitted', '$activo')";
//$result2=mysqli_query($conex1,$query2);
?>
