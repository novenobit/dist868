<?php
//include("$dirRoot"."bots/find-producto.php");
if(isset($codPro) and $codPro<>"")
{ $sqlProData=mysqli_query($conex1,"select id_producto,cod_producto,cod_categoria,cod_subcategoria,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto,foto_producto from productos where cod_producto='$codPro'"); }
if(isset($id) and $id<>"")
{ $sqlProData=mysqli_query($conex1,"select id_producto,cod_producto,cod_categoria,cod_subcategoria,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto,empaque,foto_producto from productos where id_producto='$id'"); }
if(isset($id_producto) and $id_producto<>"")
{ $sqlProData=mysqli_query($conex1,"select id_producto,cod_producto,cod_categoria,cod_subcategoria,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto,empaque,foto_producto from productos where id_producto='$id_producto'"); }
if(isset($cod_barra) and $cod_barra<>"")
{ $sqlProData=mysqli_query($conex1,"select id_producto,cod_producto,cod_categoria,cod_subcategoria,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto,empaque,foto_producto from productos where cod_barra='$cod_barra'"); }
if(isset($sqlProData))
{
  $proData=mysqli_fetch_array($sqlProData);
  if(isset($proData))
  {
    $id_producto=$proData['id_producto'];
    $codProducto=$proData['cod_producto'];
    $cod_categoria=$proData['cod_categoria'];
    $cod_subcategoria=$proData['cod_subcategoria'];
    $nomproducto=$proData['nom_producto'];
    $nomProducto=$proData['nom_producto'];
    $precio1_producto=$proData['precio1_producto'];
    $precio2_producto=$proData['precio2_producto'];
    $precio3_producto=$proData['precio3_producto'];
    $precio4_producto=$proData['precio4_producto'];
    $empaque=$proData['empaque'];
    $fotoProducto=$proData['foto_producto'];
    if($fotoProducto=="")
    { $fotoProducto="sinfoto.png"; }
  }
}
?>
