<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  producto-cc1.php                                                        //
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
FechayHora();
if(isset($_GET['id']))
{ $id="$_GET[id]"; }
if(isset($_POST['id']))
{ $id="$_POST[id]"; }

if(isset($_POST['cod_categoria']))
{ $cod_categoria="$_POST[cod_categoria]"; }
if(isset($_POST['mcod_categoria']))
{ $cod_categoria="$_POST[mcod_categoria]"; }
if(isset($_POST['cod_subcategoria']))
{ $cod_subcategoria="$_POST[cod_subcategoria]"; }
$todoBien="N";
// echo "<br>1 $id<br>2 $cod_categoria &#124; $cod_subcategoria";

if(!isset($cod_categoria) or $cod_categoria=="")
{ $error="falta datos de la Categoria";
 error();
 exit();
 $ok="N";
}

if(!isset($cod_subcategoria) or $cod_subcategoria=="")
{ $error="falta datos de la Sub Categoria";
 error();
 exit();
 $ok="N";
}

if(!isset($id) or empty($id))
{
 $error="falta algunos datos";
 error();
 exit();
}
else
{
 //echo "<br>Estamos Actualizando los Datos";
 $query2="update productos set cod_categoria='$cod_categoria',cod_subcategoria='$cod_subcategoria' where id_producto='$id'";
 $result2=mysqli_query($conex1,$query2);
 $todoBien="S";
 if($todoBien=="S")
 {
  // echo "<html><meta http-equiv=refresh content=0;url=producto-ver1.php?id=$id>";
  echo "<html><meta http-equiv=refresh content=0;url=goto-page.php?id=$id>";
  exit();
 }
}
?>
