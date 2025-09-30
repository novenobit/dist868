<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  productos-nuevo2.php                                                    //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
$topAdmin="N";
$topFile="N";
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libUsers.php");
include_once("$dirRoot"."libs1/libGeneral.php");
//include_once("../includes/headfileFrame.php");
include_once("../libs1/loader.php");
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}

// Variables 2
FechayHora();
$testData="N";
//-----------------------------------------------
$nom_categoria=$_POST['nom_categoria'];
//New_Codigo_ProCat();
include("$dirRoot"."bots/New_Codigo_ProCat.php");
//echo "<br>2 $cod_categoria<br>3 $nom_categoria";
if(empty($cod_categoria) or empty($nom_categoria))
{
  $error="falta algunos datos";
  error();
  exit();
}
else
{
  $query="select id_categoria from categoria where cod_categoria='$cod_categoria' or nom_categoria='$nom_categoria' ";
  $result=mysqli_query($conex1,$query);
  $num_filas=mysqli_num_rows($result);
  if($num_filas>0)
  {
   $error="esta categoria ya fue publicado";
   error();
   exit();
  }
  else
  {
   $nom_categoria=ucwords($nom_categoria);
   $filename=stripslashes($_FILES['foto_categoria']['name']);
   if(isset($filename) and $filename<>"")
   {
    include("pro-cat-foto-upload.php");
   }
   if(!isset($banner_categoria))
   { $banner_categoria=""; }
   if(!isset($icono))
   { $icono=""; }
   if(!isset($nota))
   { $nota=""; }
   $query2="insert into categoria(cod_categoria, nom_categoria, foto_categoria,banner_categoria, icono, nota)
   values('$cod_categoria', '$nom_categoria', '$filename','$banner_categoria', '$icono', '$nota')";
   $result2=mysqli_query($conex1,$query2);
   $todoBien="S";
   $boxColorH="cardColor";
   $boxTitle="Listo";
   $boxData="<p>Los Datos Fueron Actualizados .....
   <br>1 $cod_categoria &#124; $nom_categoria<br>Puede Continuar Trabajando</p>";
   $boxColor="white";
   $boxFoot="";
   $boxColorF="";
   include("$dirRoot"."data/boxData.php");
   echo "<html><meta http-equiv=refresh content=1;url=pro-cat-list.php?op2=1>";
  }
}
?>
