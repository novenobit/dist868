<?php
// *******************************************************************
// Sistema SiAdRe                                                   //
// Copyright (c) 2023-2007 NovenoBIT.com                            //
// *******************************************************************
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
$label="N";
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
include_once("../includes/config.ini.php");
include("$dirRoot"."bots/bot-usuario.php");
if(!isset($op))
 $op="";
if($op=="del")
{
 $query1="insert into usuarios_del select * from usuarios where iduser={$usuarioData['iduser']}";
 $result1=mysqli_query($conex1,$query1);
 $sqldel="delete from usuarios where iduser={$usuarioData['iduser']}";
 $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
 $Table="usuarios";
 TableStatus();
 if($dbEngine=="MyISAM")
 {
  $sql1="repair table usuarios, usuarios_del";
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
echo "<html><meta http-equiv=refresh content=0;url=usuarios-del3.php?op=$op&cid_usuario={$usuarioData['cid_usuario']}&nombre={$usuarioData['nombre']}>";
exit();
?>
