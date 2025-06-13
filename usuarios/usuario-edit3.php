<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  usuario-nuevo2.php                                                      //
//  Copyright (c) 2023 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
$topAdmin="N";
$topFile="N";
$todoBien="N";
include_once("$dirRoot"."libs/config-db.php");
include_once("$dirRoot"."libs/libUsers.php");
include_once("$dirRoot"."libs/libGeneral.php");
include_once("$dirRoot"."libs/libFindData.php");
//include_once("../includes/headfileFrame.php");
include_once("../libs/loader.php");

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
//FechayHora();
$todoBien="N";

if(isset($_GET['iduser']))
{ $iduser="$_GET[iduser]"; }
if(isset($_POST['cid']))
{ $cid_usuario="$_POST[cid]"; }
if(isset($_POST['cid_usuario']))
{ $cid_usuario="$_POST[cid_usuario]"; }
if(isset($_GET['Mcid_usuario']))
{ $Mcid_usuario="$_GET[Mcid_usuario]"; }
if(isset($_POST['Mcid_usuario']))
{ $Mcid_usuario="$_POST[Mcid_usuario]"; }
if(isset($_POST['mAreaAdmin']))
{ $mAreaAdmin="$_POST[mAreaAdmin]"; }
if(isset($_POST['mAreaProductos']))
{ $mAreaProductos="$_POST[mAreaProductos]"; }
if(isset($_POST['mAreaCuentas']))
{ $mAreaCuentas="$_POST[mAreaCuentas]"; }
if(isset($_POST['mAreaUsuario']))
{ $mAreaUsuario="$_POST[mAreaUsuario]"; }
if(isset($_POST['mAreaClientes']))
{ $mAreaClientes="$_POST[mAreaClientes]"; }
if(isset($_POST['mCrearProductos']))
{ $mCrearProductos="$_POST[mCrearProductos]"; }
if(isset($_POST['mCambiarDatos']))
{ $mCambiarDatos="$_POST[mCambiarDatos]"; }
if(isset($_POST['mCrearCuenta']))
{ $mCrearCuenta="$_POST[mCrearCuenta]"; }
if(isset($_POST['mDescuento']))
{ $mDescuento="$_POST[mDescuento]"; }
if(isset($_POST['mLimpiarCuenta']))
{ $mLimpiarCuenta="$_POST[mLimpiarCuenta]"; }
if(isset($_POST['mFacturar']))
{ $mFacturar="$_POST[mFacturar]"; }
if(isset($_POST['mAnularItems']))
{ $mAnularItems="$_POST[mAnularItems]"; }
if(isset($_POST['mVerPrecioMayor']))
{ $mVerPrecioMayor="$_POST[mVerPrecioMayor]"; }
if(isset($_POST['mVerPrecioEspecial']))
{ $mVerPrecioEspecial="$_POST[mVerPrecioEspecial]"; }
if(isset($_POST['mVerVentas']))
{ $mVerVentas="$_POST[mVerVentas]"; }
if(isset($_POST['mCambiaFotos']))
{ $mCambiaFotos="$_POST[mCambiaFotos]"; }
if(isset($_POST['mCambiarPrecios']))
{ $mCambiarPrecios="$_POST[mCambiarPrecios]"; }
//----------------------------
include_once("./usuario-areas.php");
?>
<div class="ui red message">Los Datos fueron Actualizados</div>
<?php

//exit();
echo "<html><meta http-equiv=refresh content=0;url=usuario-ver.php?iduser=$iduser&cid_usuario=$Mcid_usuario>";
//echo "<html><meta http-equiv=refresh content=2;url=$dirRoot"."usuarios/usuarios.php>";

