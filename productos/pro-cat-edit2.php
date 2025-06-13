<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-cat-edit2.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
include_once("../libs1/loader.php");
$findData="S";
include_once("../includes/headfileFrame.php");
//include_once("../includes/headfileFrame.php");
FechayHora();
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
FechayHora();
if(isset($_GET['op2']))
{ $op2="$_GET[op2]"; }
$todoBien="N";
if(!isset($op2))
{ $op2="1"; }


if(isset($_GET['id']))
{ $id=$_GET['id'];
 $id_categoria=$id;
}
//--------------------------------
include("$dirRoot"."bots/bot-categoria.php");
include("$dirRoot"."datafiles/catData.php");

$mcod_categoria=$cod_categoria;
$mnom_categoria=$nom_categoria;
$mfoto_categoria=$foto_categoria;
//--------------------------------
if(isset($_POST['nom_categoria']))
{ $nom_categoria="$_POST[nom_categoria]"; }
if(isset($_POST['foto_categoria']))
{ $foto_categoria="$_POST[foto_categoria]"; }

if(empty($nom_categoria))
{
 $error="falta algunos datos";
 error();
 exit();
}
if($mnom_categoria<>$nom_categoria)
{
 echo "<br><br><br>Estamos Actualizando los Datos";
 $query2="update categoria set nom_categoria='$nom_categoria' where id_categoria='$id'";
 $result2=mysqli_query($conex1,$query2);
 $todoBien="S";
 // $lnom_item=substr($nom_item,0,1);
}
// -------------------------------------------
// start copy foto ---------------------------
if(isset($_FILES['foto_categoria']) and $_FILES['foto_categoria']<>"")
{
   $foto=stripslashes($_FILES['foto_categoria']['name']);
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
     $filename=stripslashes($_FILES['foto_categoria']['name']);
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
      $size=filesize($_FILES['foto_categoria']['tmp_name']);
      //list($width, $height)=getimagesize($_FILES['foto_categoria']['tmp_name']);
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
      $name2=$_FILES['foto_categoria']['tmp_name'];
      $foto=$name2;
    //  echo "x1 $newname <br>2 $filename <br>3 $name2 <br>4 {$_FILES['foto_categoria']}<br>";
      $copied=copy($_FILES['foto_categoria']['tmp_name'], $newname);
     }
    }
   }
}
// end Foto -----------------------------------
// Foto Sub-Categoria -------------------------
if($filename<>$mfoto_categoria)
{
    $query="update categoria set foto_categoria='$filename' where id_categoria='$id'";
    $result=mysqli_query($conex1,$query);
    $todoBien="S";
}
// -------------------------------------------
if($todoBien=="N")
{
 $boxColorH="cardColor";
 $boxTitle="Nada Aqui";
 $boxData="<p>No Se Cambio Los Datos .....</p>";
}
if($todoBien=="S")
{
 $boxColorH="cardColor";
 $boxTitle="Listo";
 $boxData="<p>Los Datos Fueron Actualizados .....</p>";
}
$boxColor="white";
$boxFoot="";
$boxColorF="";
include("$dirRoot"."data/boxData.php");
echo "<html><meta http-equiv=refresh content=0;url=pro-cat-edit1.php?id=$id>";
?>
