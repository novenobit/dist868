<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  usuario-nuevo2.php                                                      //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
$topAdmin="N";
$topFile="N";
$todoBien="N";
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libUsers.php");
include_once("$dirRoot"."libs1/libGeneral.php");
include_once("$dirRoot"."libs1/libFindData.php");
//include_once("../includes/headfileFrame.php");
include_once("../libs1/loader.php");
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
//FechayHora();
$todoBien="N";

if(isset($_GET['id_cuenta']))
{ $id_cuenta="$_GET[id_cuenta]"; }
if(isset($_GET['sistema']))
{ $sistema=$_GET['sistema']; }
if(isset($_POST['id_cuenta']))
{ $id_cuenta="$_POST[id_cuenta]"; }

if(isset($_POST['preparado']))
{ $Mpreparado="$_POST[preparado]"; }
if(isset($_POST['chequeado']))
{ $Mchequeado="$_POST[chequeado]"; }
if(isset($_POST['despachado']))
{ $Mdespachado="$_POST[despachado]"; }

//-------------------------------------------

if(isset($id_cuenta) and $id_cuenta<>"")
{ include("$dirRoot"."bots/find-cuenta1.php"); }

//-------------------------------------------
if($Mpreparado=="on" or $Mpreparado=="S")
{ $Mpreparado="S"; }
else
{ $Mpreparado="N"; }
if($Mchequeado=="on" or $Mchequeado=="S")
{ $Mchequeado="S"; }
else
{ $Mchequeado="N"; }
if($Mdespachado=="on" or $Mdespachado=="S")
{ $Mdespachado="S"; }
else
{ $Mdespachado="N"; }

///-------------------------------------------

if(isset($id_cuenta) and $id_cuenta<>"")
{
  if($Mpreparado<>$preparado)
  {
    $queryUP1="update cuentas1 set preparado='$Mpreparado' where id_cuenta='$id_cuenta'";
    $resultUP1=mysqli_query($conex1,$queryUP1);
  }
  if($Mchequeado<>$chequeado)
  {
    $queryUP1="update cuentas1 set chequeado='$Mchequeado' where id_cuenta='$id_cuenta'";
    $resultUP1=mysqli_query($conex1,$queryUP1);
  }
  if($Mdespachado<>$despachado)
  {
    $queryUP1="update cuentas1 set despachado='$Mdespachado' where id_cuenta='$id_cuenta'";
    $resultUP1=mysqli_query($conex1,$queryUP1);
  }
}
?>
<div class="ui red message">Los Datos fueron Actualizados</div>

<?php
echo "<html><meta http-equiv=refresh content=0;url=pasos1.php?id_cuenta=$id_cuenta>";
?>

