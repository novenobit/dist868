<?php
$cod_producto=$proData['cod_producto'];
//include("$dirRoot"."bots/bot-productos.php");
//$cod_producto=$proData['cod_producto'];
$textoremove=$nom_producto;
include("$dirRoot"."bots/Remove_Simbols.php");
$nom_producto=ucwords($textoremove);
if(!isset($pro_brevedato))
{ $pro_brevedato=""; }
if(!isset($brand_marca))
{ $brand_marca=""; }
$cambios="N";
//--------------------------
if(isset($cod_categoria) and $cod_categoria<>"")
{
  if($proData['cod_categoria']<>$cod_categoria)
  {
   $query2="update productos set cod_categoria='$cod_categoria' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Categoria";
  }
}
//--------------------------
if(isset($cod_subcategoria) and $cod_subcategoria<>"")
{
  if($proData['cod_subcategoria']<>$cod_subcategoria)
  {
   $query2="update productos set cod_subcategoria='$cod_subcategoria' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Sub-Categoria";
  }
}
//--------------------------
if(isset($nom_producto) and $nom_producto<>"")
{
  if($proData['nom_producto']<>$nom_producto)
  {
   $query2="update productos set nom_producto='$nom_producto' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio Nombre";
  }
}
//--------------------------
if(isset($codigo_barra) and $codigo_barra<>"")
{
  if($proData['codigo_barra']<>$codigo_barra)
  {
   $query2="update productos set codigo_barra='$codigo_barra' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Codigo Barra";
  }
}
//--------------------------
if(isset($cod_upcean) and $cod_upcean<>"")
{
  if($proData['cod_upcean']<>$cod_upcean)
  {
   $query2="update productos set cod_upcean='$cod_upceana' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de UPCEAN";
  }
}
//--------------------------
if(isset($pro_brevedato) and $pro_brevedato<>"")
{
  if($proData['pro_brevedato']<>$pro_brevedato)
  {
   $query2="update productos set pro_brevedato='$pro_brevedato' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Breve Descp";
  }
}
//--------------------------
if(isset($datos_producto) and $datos_producto<>"")
{
  if($proData['datos_producto']<>$datos_producto)
  {
   $query2="update productos set datos_producto='$datos_producto' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Datos";
  }
}
//--------------------------
if(isset($cod_proveedor) and $cod_proveedor<>"")
{
  if($proData['cod_proveedor']<>$cod_proveedor)
  {
   $query2="update productos set cod_proveedor='$cod_proveedor' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Proveedor";
  }
}
//--------------------------
if(isset($paisorigen) and $paisorigen<>"")
{
  if($proData['paisorigen']<>$paisorigen)
  {
   $query2="update productos set paisorigen='$paisorigen' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Pais";
  }
}
//--------------------------
if(isset($brand_marca) and $brand_marca<>"")
{
  if($proData['brand_marca']<>$brand_marca)
  {
   $query2="update productos set brand_marca='$brand_marca' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Marca";
  }
}
//--------------------------
if(isset($precio_compra) and $precio_compra<>"")
{
  if($proData['precio_compra']<>$precio_compra)
  {
   $query2="update productos set precio_compra='$precio_compra' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Precio Compra";
  }
}
//--------------------------
if(isset($precio1_producto) and $precio1_producto>0)
{
  if($proData['precio1_producto']<>$precio1_producto)
  {
   $query2="update productos set precio1_producto='$precio1_producto' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Precio1";
  }
}
//--------------------------
if(isset($precio2_producto) and $precio2_producto>0)
{
  if($proData['precio2_producto']<>$precio2_producto)
  {
   $query2="update productos set precio2_producto='$precio2_producto' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Precio2";
  }
}
//--------------------------
if(isset($precio3_producto) and $precio3_producto>0)
{
 if($cambia_precio=="S")
 {
  if($proData['precio3_producto']<>$precio3_producto)
  {
   $query2="update productos set precio3_producto='$precio3_producto' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Precio3";
  }
 }
}
//--------------------------
if(isset($precio4_producto) and $precio4_producto>0)
{
 if($cambia_precio=="S")
 {
  if($proData['precio4_producto']<>$precio4_producto)
  {
   $query2="update productos set precio4_producto='$precio4_producto' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Precio4";
  }
 }
}

if(isset($cambia_precio))
{
  if($proData['cambia_precio']<>$cambia_precio)
  {
   $query2="update productos set cambia_precio='$cambia_precio' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio el campo cambia_precio";
  }
}

//--------------------------
if(!isset($nom_unidad))
{ $nom_unidad=""; }
if($proData['nom_unidad']<>$nom_unidad)
{
  if($nom_unidad<>"" and $nom_unidad<>"selecciona" and $nom_unidad<>"Unidad &#124; Medida")
  {
   $query2="update productos set nom_unidad='$nom_unidad' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Unidad";
  }
}
//--------------------------
if(isset($empaque) and $empaque<>"")
{
  if($proData['empaque']<>$empaque)
  {
   $query2="update productos set empaque='$empaque' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Empaque";
  }
}
//--------------------------
if(isset($stock_actual) and $stock_actual<>"")
{
  if($proData['stock_actual']<>$stock_actual)
  {
   $query2="update productos set stock_actual='$stock_actual' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Stock_Actual";
  }
}

//--------------------------
if(isset($estado) and $estado<>"")
{
  if($proData['estado']<>$estado)
  {
   $query2="update productos set estado='$estado' where id_producto='$id'";
   $result2=mysqli_query($conex1,$query2);
   $cambios="S";
   $datos_cambio="Cambio de Estado";
  }
}

// start copy foto -------------------------------
include("../datafiles/fotoProductos.php");
// end copy foto ---------------------------------

if($cambios=="S")
{
 $fecha_cambio="$dia/$mes/$ano";
 //$datos_cambio="";
 if(!isset($cid_empleado))
 { $cid_empleado=""; }
 $query2="insert into pro_cambios(cod_producto,nom_producto,usuario,cid_empleado,fecha_cambio,datos_cambio)
 values('$cod_producto','$nom_producto','$usuario','$cid_empleado','$fecha_cambio','$datos_cambio')";
// $result2=mysqli_query($conex1,$query2);
 //echo "<br>  $query2";
}

// --------------------------------------
$todoBien="S";
?>
