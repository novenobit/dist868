<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Usuarios                                          //
//  usersection3.php                                                         //  
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.          //
// ***************************************************************************
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
$dirRoot="../";
include_once("../includes/headfileFrame.php");
include('../userconfigSet.php');
//echo "x1 $iduser / $usuario / $clave <br>";
FindUsuario2();
userid();
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=usercontrol.php>";
exit();
}
else
{
 include('usersection4.php');
}
?>
