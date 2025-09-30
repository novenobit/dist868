<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-subcat-edit2.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
include_once("../libs1/loader.php");
include_once("../includes/headfileFrame.php");
include_once("../libs1/libFindData.php");
//include_once("../includes/headfileFrame.php");
FechayHora();
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

include("$dirRoot"."bots/getExtension.php");
$todoBien="N";
FechayHora();
if(isset($_GET['id']))
{ $id=$_GET['id'];
  $id_subcategoria=$id;
}
include("$dirRoot"."bots/bot-subcategoria.php");
include("$dirRoot"."datafiles/subCatData.php");
//-------------------------------------
if(isset($_POST['cod_categoria']))
{ $Ncod_categoria="$_POST[cod_categoria]"; }
if(isset($_POST['cod_subcategoria']))
{ $Ncod_subcategoria="$_POST[cod_subcategoria]"; }
if(isset($_POST['nom_subcategoria']))
{ $Nnom_subcategoria="$_POST[nom_subcategoria]"; }
if(isset($_POST['datos_subcategoria']))
{ $Ndatos_subcategoria="$_POST[datos_subcategoria]"; }
if(isset($_POST['foto_subcategoria1']))
{ $Nfoto_subcategoria1="$_POST[foto_subcategoria1]"; }
$filename=stripslashes($_FILES['foto_subcategoria']['name']);
if(isset($_FILES['foto_subcategoria']))
{
   //if(isset($_FILES['foto']))
   //$filename=basename($foto);
   $filename=stripslashes($_FILES['foto_subcategoria']['name']);
   $foto_subcategoria=$filename;
}
else
{ $filename="";
   $foto_subcategoria="";
}
if(!isset($foto_subcategoria1))
{ $foto_subcategoria1=""; }
if(!isset($foto_subcategoria2))
{ $foto_subcategoria2=""; }
if(!isset($banner1))
{ $banner1=""; }
if(!isset($banner2))
{ $banner2=""; }
//   echo " <br>1 $id &#124; $id_subcategoria<br>2 <br>3 $cod_subcategoria<br>4 $cod_categoria<br>5 $nom_subcategoria<br>6 $foto_subcategoria <br>7 $foto<br>8 $filename";
// echo "<hr> <br>1 $id &#124; $Ncod_subcategoria<br>4 $Ncod_categoria<br>5 $Nnom_subcategoria<br>6 $Nfoto_subcategoria <br>7 $foto<br>8 $filename";

if(empty($cod_subcategoria) or empty($nom_subcategoria))
{
   $error="falta algunos datos";
   error();
   exit();
}
else
{
  $cambiaCategoria="N";
  $cambiaSubCategoria="N";
  if(!empty($Ncod_categoria) and $Ncod_categoria<>$cod_categoria)
  {
    if($Ncod_categoria<>"")
    {
     $query="update subcategoria set cod_categoria='$Ncod_categoria' where id_subcategoria='$id'";
     $result=mysqli_query($conex1,$query);
     $cambiaCategoria="S";
     $todoBien="S";
    }
  }
  if(isset($Ncod_subcategoria) and $Ncod_subcategoria<>"")
  {
    if(!empty($cod_subcategoria) and $cod_subcategoria<>$Ncod_subcategoria)
    {
     if($Ncod_subcategoria<>"")
     {
      $query="update subcategoria set cod_subcategoria='$Ncod_subcategoria' where id_subcategoria='$id'";
      $result=mysqli_query($conex1,$query);
      $cambiaSubCategoria="S";
      $todoBien="S";
     }
    }
  }
  if(isset($Nnom_subcategoria) and $Nnom_subcategoria<>"")
  {
    if(!empty($Nnom_subcategoria) and $Nnom_subcategoria<>$nom_subcategoria)
    {
     $Nnom_subcategoria=ucwords($Nnom_subcategoria);
     $query="update subcategoria set nom_subcategoria='$Nnom_subcategoria' where id_subcategoria='$id'";
     $result=mysqli_query($conex1,$query);
     $todoBien="S";
    }
  }
// -----------------------------------------------
// start copy foto -------------------------------
// echo "<br>xxxx  ".$_FILES['foto_subcategoria'];
  if(isset($_FILES['foto_subcategoria']) and $_FILES['foto_subcategoria']<>"")
  {
   $foto=stripslashes($_FILES['foto_subcategoria']['name']);
   if(empty($foto))
   { $foto=""; }
   if(isset($foto) and !empty($foto))
   {
    if(!defined("MAX_SIZE"))
    { define ("MAX_SIZE","1024"); }
    $filesize= MAX_SIZE;
    $errors=0;
    if(!empty($foto))
    {
      $filename=stripslashes($_FILES['foto_subcategoria']['name']);
      $extension = new SplFileInfo($filename);
      $extension=$extension->getExtension();
      // $extension=getExtension($filename);
      $extension=strtolower($extension);
      if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
      {
        $error="<h1>No se acepta este tipo de archivo!</h1>";
        $errors=1;
        error();
        exit();
      }
      else
      {
        $size=filesize($_FILES['foto_subcategoria']['tmp_name']);
        list($width, $height)=getimagesize($_FILES['foto_subcategoria']['tmp_name']);
        if ($size > MAX_SIZE*1024)
        {
          $error="<h1>El tama&ntilde;o del archivo es demasiado grande<br>El limite es de $filesize kb!</h1>";
          $errors=1;
          error();
          exit();
        }
        if(!file_exists("$dirRoot"."imagenes/menu"))
        {  mkdir("$dirRoot"."imagenes/menu", 0777, true);
          if(PHP_OS<>"WINNT")
          {
            chmod("$dirRoot"."imagenes", 0777);
          }
        }
        $newwidth="90";
        $newheight="90";
        $imagedir="$dirRoot"."imagenes/menu/";
        //  copy image --------------------------------------
        $foto_name=time().'.'.$extension;
        $newname="$dirRoot"."imagenes/menu/".$filename;
        $name2=$_FILES['foto_subcategoria']['tmp_name'];
        //  echo "x1 $newname <br>2 $filename <br>3 $name2 <br>4 {$_FILES['foto_subcategoria']}<br>";
        $copied=copy($_FILES['foto_subcategoria']['tmp_name'], $newname);
      }
    }
   }
  }
  if(!isset($foto_subcategoria))
  { $foto_subcategoria=""; }
  if(isset($foto_subcategoria))
  { $filename=basename($foto_subcategoria); }
  else
  { $filename=""; }
  if($foto_subcategoria<>"")
  {
   if(is_file($foto_subcategoria))
   {
    unlink($foto_subcategoria);
   }
   $mask = "*.jpg";
   array_map( "unlink", glob( $mask ) );
   $mask = "*.png";
   array_map( "unlink", glob( $mask ) );
  }
// end Foto ------------------------------------
// Foto Sub-Categoria --------------------------
  if(!empty($filename))
  {
    $query="update subcategoria set foto_subcategoria='$filename' where id_subcategoria='$id'";
    $result=mysqli_query($conex1,$query);
    $todoBien="S";
  }
//-----------------------------
  if($cambiaCategoria=="S" and $cambiaSubCategoria=="N")
  {
    $query="update productos set cod_categoria='$Ncod_categoria' where cod_categoria='$cod_categoria' and cod_subcategoria='$cod_subcategoria'";
    $result=mysqli_query($conex1,$query);
    $todoBien="S";
   }
   if($cambiaSubCategoria=="S" and $cambiaCategoria=="N")
   {
    $query="update productos set cod_subcategoria='$Ncod_subcategoria' where cod_subcategoria='$cod_subcategoria'";
    $result=mysqli_query($conex1,$query);
    $todoBien="S";
   }
}

echo "<html><meta http-equiv=refresh content=0;url=pro-subcat-edit1.php?id=$id>";
?>
