<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="S";
$icon="S";
$input="S";
$list="N";
$sidebar="S";
$table="S";
$message="S";
$popup="N";
$label="S";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="S";
$divider="S";
$forms="S";
$breadCrumb="S";
$findData="S";
$popup="S";
$dropdown="S";
$topAdmin="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

FechayHora();
$autoPro="S";
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

$todoBien="N";
$cod="02";

if(isset($_POST['cod_categoria']))
{ $cod_categoria="$_POST[cod_categoria]"; }
if(isset($_GET['cod_categoria']))
{ $cod_categoria="$_GET[cod_categoria]"; }
if(isset($_POST['nom_subcategoria']))
{ $nom_subcategoria="$_POST[nom_subcategoria]"; }
if(isset($_GET['nom_subcategoria']))
{ $nom_subcategoria="$_GET[nom_subcategoria]"; }
if(isset($_GET['datos_subcategoria']))
{ $datos_subcategoria="$_GET[datos_subcategoria]"; }

if(isset($_POST['foto']))
{ $foto="$_POST[foto]"; }
if(isset($_GET['foto']))
{ $foto="$_GET[foto]"; }
 if(!isset($datos_subcategoria))
 { $datos_subcategoria=""; }

 if(isset($cod_categoria))
 {
  $result=mysqli_query($conex1,"select id_subcategoria,cod_subcategoria,cod_categoria from pro_subcat where cod_categoria='$cod_categoria' order by id_subcategoria desc limit 1");
  $numFilas=0;
  $numFilas=mysqli_num_rows($result);
  if($numFilas>0)
  {
   $data=mysqli_fetch_array($result);
   $cod_subcategoria="{$data['cod_subcategoria']}";
   $cod_categoria="{$data['cod_categoria']}";
   if(empty($cod_subcategoria))
   { $cod_subcategoria="$cod_categoria$cod"; }
   else
   { $cod_subcategoria=$cod_subcategoria+2; }
  }
  if(empty($cod_subcategoria))
  { $cod_subcategoria="$cod_categoria$cod"; }
  if(empty($nom_subcategoria) or $nom_subcategoria=="" or $cod_subcategoria=="seleccione02"  or $cod_subcategoria=="seleccione")
  {
   $error="falta algunos datos";
   error();
   exit();
  }
  else
  {
   $query="select cod_subcategoria from pro_subcat where cod_subcategoria='$cod_subcategoria'";
   $result=mysqli_query($conex1,$query);
   $num_filas=mysqli_num_rows($result);
   if($num_filas>0)
   {
    $error="estos datos ya fue publicado ($cod_subcategoria)";
    error();
    exit();
   }
   else
   {
    $num_filas=0;
    $query2="select nom_subcategoria from pro_subcat where nom_subcategoria='$nom_subcategoria' limit 2";
    $result2=mysqli_query($conex1,$query2);
    $num_filas=mysqli_num_rows($result2);
    if($num_filas>0)
    {
     $error="estos datos ya fue publicado ($nom_subcategoria)";
     error();
     exit();
    }
    else
    {
     $nom_subcategoria=ucwords($nom_subcategoria);
     if(isset($_FILES['foto_subcategoria']))
     {
      //$foto="$_FILES[foto_subcategoria]";
      $foto=stripslashes($_FILES['foto_subcategoria']['name']);
     }
     if(!isset($foto))
     { $foto=""; }
     if($foto=="Array")
     { $foto=""; }
     if(!isset($banner))
     { $banner=""; }
     if($banner=="Array")
     { $banner=""; }
     if(!isset($pedironline))
     { $pedironline=""; }
     $query2="insert into pro_subcat(cod_subcategoria, cod_categoria, nom_subcategoria, foto_subcategoria)
     values('$cod_subcategoria', '$cod_categoria', '$nom_subcategoria', '$foto')";
     $result2=mysqli_query($conex1,$query2);
     $todoBien="S";
    }
   }
  }
 }
 else
 { echo "error en los datos";
 }
 if($todoBien=="S")
 {
  //echo "<html><meta http-equiv=refresh content=0;url=../items/listado1.php?cod=$cod_categoria>";
  echo "<html><meta http-equiv=refresh content=0;url=subcategoria-nuevo1.php>";
  exit();
 }
?>
