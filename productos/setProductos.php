<?php
if(isset($_POST['id_producto']))
{ $id_producto="$_POST[id_producto]"; }
if(isset($_POST['cod_producto']))
{ $cod_producto="$_POST[cod_producto]"; }
if(isset($_POST['codigo_barra']))
{ $codigo_barra="$_POST[codigo_barra]"; }
if(isset($_POST['cod_upcean']))
{ $cod_upcean="$_POST[cod_upcean]"; }
if(isset($_POST['cod_categoria']))
{ $cod_categoria="$_POST[cod_categoria]"; }
if(isset($_POST['cod_subcategoria']))
{ $cod_subcategoria="$_POST[cod_subcategoria]"; }
if(isset($_POST['nom_producto']))
{ $nom_producto="$_POST[nom_producto]"; }
if(isset($_POST['pro_brevedato']))
{ $pro_brevedato="$_POST[pro_brevedato]"; }
if(isset($_POST['datos_producto']))
{ $datos_producto="$_POST[datos_producto]"; }
if(isset($_POST['cod_proveedor']))
{ $cod_proveedor="$_POST[cod_proveedor]"; }

if(isset($_POST['paisorigen']))
{ $paisorigen="$_POST[paisorigen]"; }
if(isset($_POST['brand_marca']))
{ $brand_marca="$_POST[brand_marca]"; }
if(isset($_POST['precio_compra']))
{ $precio_compra="$_POST[precio_compra]"; }

if(isset($_POST['precio1_producto']))
{ $precio1_producto="$_POST[precio1_producto]"; }
if(isset($_POST['precio2_producto']))
{ $precio2_producto="$_POST[precio2_producto]"; }
if(isset($_POST['precio3_producto']))
{ $precio3_producto="$_POST[precio3_producto]"; }
if(isset($_POST['precio4_producto']))
{ $precio4_producto="$_POST[precio4_producto]"; }
if(isset($_POST['cambia_precio']))
{ $cambia_precio="$_POST[cambia_precio]";
 if($cambia_precio=="on")
 { $cambia_precio="S"; }
 else
 { $cambia_precio="N"; }
}

if(isset($_POST['id_unidad']))
{ $id_unidad="$_POST[id_unidad]"; }
if(isset($_POST['nom_unidad']))
{ $nom_unidad="$_POST[nom_unidad]"; }

if(isset($_POST['empaque']))
{ $empaque="$_POST[empaque]"; }
if(isset($_POST['stock_actual']))
{ $stock_actual="$_POST[stock_actual]"; }

if(isset($_POST['fisico']))
{ $fisico="$_POST[fisico]"; }
if(isset($_POST['tamano']))
{ $tamano="$_POST[tamano]"; }
if(isset($_POST['peso']))
{ $peso="$_POST[peso]"; }
if(isset($_POST['bultos']))
{ $bultos="$_POST[bultos]"; }
if(isset($_POST['foto_producto']))
{ $foto_producto="$_POST[foto_producto]"; }
if(isset($_GET['foto_producto']))
{ $foto_producto="$_GET[foto_producto]"; }


// Set Prtoductos ---------------------------------------
if(!isset($cod_subcategoria))
{ $cod_subcategoria=""; }
if($cod_subcategoria=="seleccione")
{ $cod_subcategoria=""; }

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
if(!isset($paisorigen))
{ $paisorigen=""; }
if(!isset($brand_marca))
{ $brand_marca=""; }
if(!isset($precio_compra))
{ $precio_compra=0; }
if(!isset($precio1_producto))
{ $precio1_producto=0; }
if(!isset($precio2_producto))
{ $precio2_producto=0; }
if(!isset($precio3_producto))
{ $precio3_producto=0; }
if(!isset($precio4_producto))
if(!isset($cambia_precio))
{ $cambia_precio="S"; }


{ $precio4_producto=0; }
if(isset($id_unidad) and $id_unidad=="Unidad &#124; Medida")
{ $id_unidad=""; }
if(!isset($nom_unidad))
{ $nom_unidad=""; }
if(!isset($empaque))
{ $empaque=""; }
if(!isset($stock_actual))
{ $stock_actual=0; }

if(!isset($fisico))
{ $fisico=""; }
if(!isset($tamano))
{ $tamano=0; }
if(!isset($peso))
{ $peso=0; }
if(!isset($bultos))
{ $bultos=""; }
if(!isset($foto_producto))
{ $foto_producto="";  }
?>
