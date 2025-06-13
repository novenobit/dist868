<?php
//include("$dirRoot"."datafiles/proData.php");
if(isset($proData))
{
  $id=$proData['id_producto'];
  $idpro=$proData['id_producto'];
  $id_producto=$proData['id_producto'];
  $cod_producto=$proData['cod_producto'];
  $codProducto=$proData['cod_producto'];
  $codigo_barra=$proData['codigo_barra'];
  $cod_upcean=$proData['cod_upcean'];
  $cod_categoria=$proData['cod_categoria'];
  $codCat=$proData['cod_categoria'];
  $cod_subcategoria=$proData['cod_subcategoria'];
  $codSubCat=$proData['cod_subcategoria'];
  $nom_producto=$proData['nom_producto'];
  $nomProducto=$proData['nom_producto'];
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
  $stock_actual=$proData['stock_actual'];
  // $fisico=$proData['fisico'];
  // $tamano=$proData['tamano'];
  // $peso=$proData['peso'];
  // $bultos=$proData['bultos'];
  // -----------------------------------------------------
   if($nom_unidad=="")
   { $nom_unidad="<span class='font-red'>sin datos</span>"; }
   if($empaque==0 or $empaque=="")
   { $empaque=1; }
   //$empaque="<span class='font-red'>sin datos</span>";
   //if(isset($proData['nom_unidad']) and $proData['nom_unidad']<>"")
   //{ $nom_unidad=$proData['nom_unidad']; }
   //if(isset($proData['empaque']) and $proData['empaque']<>"")
   //{ $empaque=$proData['empaque']; }
  // -----------------------------------------------------
  $foto_producto=$proData['foto_producto'];
  $fotoProducto=$proData['foto_producto'];
  $especial=$proData['especial'];
  $cambia_precio=$proData['cambia_precio'];
  $submitted=$proData['submitted'];
  $estado=$proData['estado'];
  $activo=$proData['activo'];
  // -----------------------------------------------------
  if($foto_producto<>"" and $foto_producto<>"Array")
  { $fotoPro=$foto_producto; }
  else
  { $fotoPro="sinfoto.png"; }
  if($fotoProducto=="")
  { $fotoProducto="sinfoto.png"; }
  // -----------------------------------------------------
  if(!isset($findCategoria))
  { $findCategoria="N"; }
  if($findCategoria=="S")
  {
   if(isset($codCat) and $codCat<>"")
   { include("$dirRoot"."bots/find-categoria.php"); }
   else
   { $nom_categoria="Sin Categoria"; }
   if(isset($codSubCat) and $codSubCat<>"")
   { include("$dirRoot"."bots/find-subcategoria.php"); }
   if(!isset($nom_categoria))
   { $nom_categoria=""; }
  }
  //if($estado=="")
  //{ $estado="SinDatos"; }
  //if($estado==1)
  //{ $estado="Activo"; }
  //if($estado==2)
  //{ $estado="No Activo"; }
  //if($estado==3)
  //{ $estado="Queda Poco"; }
  //if($estado==4)
  //{ $estado="No Disponible"; }
  //if($estado==5)
  //{ $estado="Obsoleto"; }
  //if($estado==6)
  //{ $estado=">Borrar del Sistema"; }
}
?>
