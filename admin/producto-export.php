<?php
header('Content-Type: application/json');
//header('Content-Type: text/csv; charset=utf-8');
include_once("../includes/session.php");
$dirRoot="../";
$topAdmin="N";
$topFile="N";
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libUsers.php");
include_once("$dirRoot"."libs1/libGeneral.php");
//include_once("../includes/headfileFrame.php");
include_once("../libs1/loader.php");

//--------------------------------------------------
$File="productos.csv";
if(!isset($dirExport))
{ $dirExport="c:"; }
//--------------------------------------------------
if(PHP_OS=="Linux")
{
  if(!is_dir("$dirExport"."export"))
  { mkdir("$dirRoot"."export/", 0777,TRUE); }
  $myFile="$dirRoot"."export/$File";
  if(file_exists("$myFile"))
  { unlink("$myFile"); }
}
if(PHP_OS=="DOS" or PHP_OS=="WIN" or PHP_OS=="WINNT")
{
  if(!isset($diskTrabajo))
  { $diskTrabajo="C"; }
  if(!is_dir("$dirRoot"."export"))
  { mkdir("$dirRoot"."export", 0777,TRUE); }
  $myFile="$dirRoot"."export/$File";
  if(file_exists("$myFile"))
  { unlink("$myFile"); }
}
//--------------------------------------------------
$file_to_read = fopen($myFile, 'w') or die("can't open file -> $myFile");
//--------------------------------------------------
$result=mysqli_query($conex1,"SELECT * from productos limit 19");
while($proData=mysqli_fetch_array($result))
{
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
   $foto_producto=$proData['foto_producto'];
   $submitted=$proData['submitted'];
   $activo=$proData['activo'];

   $stringData="$cod_producto|$codigo_barra|$cod_upcean|$cod_categoria|$cod_subcategoria|$nom_producto|$pro_brevedato|$datos_producto|$cod_proveedor|$paisorigen|$brand_marca|$precio_compra|$precio1_producto|$precio2_producto|$precio3_producto|$precio4_producto|$nom_unidad|$empaque|$foto_producto|$submitted|$activo\r\n";
   fwrite($file_to_read, $stringData);
}
//--------------------------------------------------
fclose($file_to_read);
//--------------------------------------------------

?>
