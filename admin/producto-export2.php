<?php
// ******************************************************** 2006 - 2017 ***
// Sistema Dist868                 //
// Copyright (c) 2006 NovenoBIT.com                                      //
// ************************************************************************
if(!isset($_SESSION))
{ session_start(); }
ini_set("max_execution_time", "0");
header('Content-Type: application/json');
//header('Content-Type: text/csv; charset=utf-8');
// Variables to Activate
include_once("../libs1/config-db.php");
include_once("../libs1/libUsers.php");
include_once("../libs1/libGeneral.php");
//include_once("../includes/headfileFrame.php");
//-------------------------------------------------
FechayHora();
$filename="productos-$dia$mes$ano.cvs";
header("Expires: Sat, 01 Jan 2022 00:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: public");
header("Content-Description: File Transfer");
// session_cache_limiter("must-revalidate");
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="' . $filename .'"');

$data2="";
$header2="";
$select2="select * from productos";
$export2=mysqli_query($conex1,$select2);
$fields2=mysqli_num_fields($export2);
for ($i2 =0; $i2 < $fields2; $i2++)
{
 $header2="ID CodProducto CodigoBarra CodUpcean CodCategoria CodSubCategoria NomProducto BreveDato DatosProducto CodProveedor PaisOrigen Brand_Marca Precio_compra Precio1Producto Precio2Producto Precio3Producto Precio4Producto Unidad Empaque FotoProducto Submitted Activo";
}
while($row2=mysqli_fetch_row($export2))
{
 $line2="";
 foreach($row2 as $value2)
 {
  if((!isset($value2)) OR ($value2 == ""))
  {
   $value2="\t";
  } else {
   $value2=str_replace('"', '""', $value2);
   $value2=str_replace('.', ',', $value2);
   $value2='"' . $value2 . '"' . "\t";
  }
  $line2 .= $value2;
 }
 $data2 .= trim($line2)."\n";
}
$data2=str_replace("\r","",$data2);
print "$header2\n$data2";
//echo "<html><meta http-equiv=refresh content=10;url=database.php>";
?>
