<?php
//include("$dirRoot"."datafiles/subCatData.php");
if(isset($subCatData))
{
  $id_subcategoria=$subCatData['id_subcategoria'];
  $cod_subcategoria=$subCatData['cod_subcategoria'];
  $cod_categoria=$subCatData['cod_categoria'];
  $mcod_categoria=$subCatData['cod_categoria'];
  $nom_subcategoria=$subCatData['nom_subcategoria'];
  $datos_subcategoria=$subCatData['datos_subcategoria'];
  $foto_subcategoria=$subCatData['foto_subcategoria'];
}
if(!isset($nom_subcategoria))
{ $nom_subcategoria=""; }
if(!isset($foto_subcategoria) or $foto_subcategoria=="" or $foto_subcategoria=="Array")
{ $foto_subcategoria="sinfoto.png"; }
?>
