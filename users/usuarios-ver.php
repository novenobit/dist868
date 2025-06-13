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
//include("usuarios-ver-top3.php");
include("usuarios-top-menu.php");
if(!isset($nombre))
{ $nombre=""; }
?>

  <?php
   include("usuarios-list-abc3.php");
  ?>

  <?php
   echo "<iframe src='usuarios-list1-1.php?op=lis&nombre=$nombre&sistema=$sistema' height='600' width='100%' name='data1' frameborder='0' scrolling='auto' allowtransparency='true' onload='resizeIframe(this)'></iframe>";
  ?>

  <?php
   echo "<iframe src='usuarios-ver-ventas.php?op=ven&iduser={$usuarioData['iduser']}&sistema=$sistema' height='$frameHeight' width='100%' name='data2' frameborder='0' scrolling='auto' allowtransparency='true' onload='resizeIframe(this)'></iframe>";
  ?>


<br><br><br>
<?php
include("$dirRoot"."includes/statusAdmin.php");
?>
