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
$topAdmin="S";
$breadCrumb="S";
$whiteBackground="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

include("$dirRoot"."bots/bot-cliente.php");
//include("cliente-ver-top3.php");
include("clientes-top-menu.php");
if(!isset($nom_cliente))
{ $nom_cliente=""; }
include("clientes-list-abc3.php");
echo "<iframe src='clientes-list1-1.php?op=lis&nom_cliente=$nom_cliente' height='600' width='100%' name='data1' frameborder='0' scrolling='auto' allowtransparency='true' onload='resizeIframe(this)'></iframe>";
// echo "<iframe src='cliente-ver-ventas.php?op=ven&id_cliente={$clienteData['id_cliente']}' height='$frameHeight' width='100%' name='data2' frameborder='0' scrolling='auto' allowtransparency='true' onload='resizeIframe(this)'></iframe>";
?>

<br><br><br>
<?php
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
