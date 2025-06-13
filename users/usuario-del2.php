<?php
// ******************************************************** 2023 - 2017 ***
// Sistema Dist868                 //
// Copyright (c) 2023-2025 NovenoBIT.com                                      //
// ************************************************************************
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
$forms="N";
$dropdown="S";
$breadCrumb="S";
$dirRoot="../";
$findData="S";
include_once("../includes/headfileFrame.php");
include_once("../libs1/loader.php");

if(isset($_GET['iduser']))
{ $iduser="$_GET[iduser]"; }
if(isset($_GET['cid_usuario']))
{ $cid_usuario="$_GET[cid_usuario]"; }
include_once("../bots/bot-usuarios.php");

if(isset($_GET['op']))
{ $op="$_GET[op]"; }

if(!isset($op))
{ $op=""; }

if($op=="del")
{
 //$query1="insert into usuarios_del select * from usuarios where iduser={$usuarioData['iduser']}";
 //$result1=mysqli_query($conex1,$query1);
 if(isset($iduser) and $iduser<>"")
 {
   $sqldel="delete from areassistema where cid_usuario='$cid_usuario'";
   $result=mysqli_query($conex1,$sqldel) or die ("Error data:  $sqldel. " . mysqli_error());

   $sqldel="delete from usuarios where iduser='$iduser'";
   $result=mysqli_query($conex1,$sqldel) or die ("Error data:  $sqldel. " . mysqli_error());
 }
 $Table="usuarios";
 TableStatus();
 if($dbEngine=="MyISAM")
 {
  $sql1="repair table usuarios, areassistema";
  $result2=mysqli_query($conex1,$sql1) or die ("$queryerror $query. " . mysqli_error());
 }
}

if($op=="des")
{
 $query1DA="update usuarios set activo='N' where iduser={$usuarioData['iduser']}";
 $result1DA=mysqli_query($conex1,$query1DA);
 $Table="usuarios";
 TableStatus();
 if($dbEngine=="MyISAM")
 {
  $sql1="repair table usuarios";
  $result2=mysqli_query($conex1,$sql1) or die ("$queryerror $query. " . mysqli_error());
 }
}

echo "<html><meta http-equiv=refresh content=0;url=usuario-del3.php?op=$op&cid_usuario={$usuarioData['cid_usuario']}&nombre={$usuarioData['nombre']}>";
exit();
?>
