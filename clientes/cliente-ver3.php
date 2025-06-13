<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  clientes.php                                                             //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$accordion="S";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$findData="S";
$forms="S";
$grids="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$jQueryModal="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$popupWindow="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$table="S";
$topAdmin="S";
$autoCliente="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
include("submenu-buscar.php");

//FechayHora();
if(isset($_GET['id']))
{ $id=$_GET['id'];
 $id_cliente=$id;
}

if(isset($_GET['modalId']))
{ $modalId=$_GET['modalId']; }

FechayHora();
$num=0;
$ves=1;
$todoBien="N";
$autoCliente="S";

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

if(isset($id) and $id<>"")
{
 include("$dirRoot"."bots/bot-cliente.php");
 // include("cliente-ver-top3.php");
 // include("cliente-ver-data.php");
 include("cliente-ver-data.php");
 if(!isset($op))
 {  $op=""; }
 echo "<a class='ui blue button' href='cliente-edit1.php?op=edt&id=$id_cliente&id_cliente=$id_cliente' target='data2'>Edita</a>
 <a class='ui blue button' href='cliente-del1.php?op=del&id=$id_cliente&id_cliente=$id_cliente' target='data2'>Borrar</a>
 <a class='ui blue button' href='clientes-list1-2.php' target='data2'>Menu</a>";

}



// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
