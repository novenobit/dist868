<?php
//productos/producto-insert.php
if(!isset($codigo_barra))
{ $codigo_barra=""; }
if(!isset($cod_upcean))
{ $cod_upcean=""; }
if(!isset($pro_brevedato))
{ $pro_brevedato=""; }
if(!isset($datos_producto))
{ $datos_producto=""; }
if(!isset($cod_proveedor))
{ $cod_proveedor=""; }
if(!isset($paisorigen) or $paisorigen=="seleccione")
{ $paisorigen="ve"; }
if(!isset($brand_marca))
{ $brand_marca=""; }
if(!isset($precio_compra) or $precio_compra=="" )
{ $precio_compra="0.00"; }
if(!isset($precio1_producto))
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
//if(!isset($fisico))
//{ $fisico=""; }
//if(!isset($tamano) or $tamano=="")
//{ $tamano="0.00"; }
//if(!isset($peso) or $peso=="")
//{ $peso="0.00"; }
//if(!isset($bultos))
//{ $bultos=""; }
// ----------------
if(isset($filename) and $filename<>"")
{ $foto_producto=$filename; }
if(!isset($foto_producto))
{ $foto_producto=""; }
if(!isset($foto_producto))
{ $foto_producto="";  }
// ----------------
if(!isset($especial))
{ $especial=""; }
$activo="S";
$submitted="$dia/$mes/$ano";
if(!isset($estado))
{ $estado=""; }
// ----------------
insert("../datafiles/insert-pro-data.php");

//$query2="insert into productos(cod_producto, codigo_barra, cod_upcean, cod_categoria, cod_subcategoria, nom_producto, pro_brevedato, datos_producto, cod_proveedor, paisorigen, brand_marca, precio_compra, precio1_producto, precio2_producto, precio3_producto, precio4_producto, nom_unidad, empaque, foto_producto, especial, submitted, activo)
//values('$cod_producto', '$codigo_barra', '$cod_upcean', '$cod_categoria', '$cod_subcategoria', '$nom_producto', '$pro_brevedato', '$datos_producto', '$cod_proveedor', '$paisorigen', '$brand_marca', '$precio_compra', '$precio1_producto', '$precio2_producto', '$precio3_producto', '$precio4_producto', '$nom_unidad', '$empaque', '$foto_producto', '$especial', '$submitted', '$activo')";
//$result2=mysqli_query($conex1,$query2);
$todoBien="S";
?>
