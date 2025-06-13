<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  usuarios-ver3.php                                                        //
//  Copyright (c) 2023 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
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
$findData="S";
$popup="S";
$dirRoot="../";
include_once("../includes/config.ini.php");

FechayHora();
$todoBien="N";
$autoUsuarios="S";
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
?>

<div class="ui container">
 <?php include("sub-menu.php"); ?>
</div>

<div class="ui padded grid">
 <div class="three wide tablet only three wide computer only column sidebar" id="sidebar">
   <?php
    include("../includes/left-menu.php");
   ?>
 </div>
 <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">

   <h2 class="menu-label">Usuarios</h2>
   <?php
    include("usuarios-list-abc1.php");
     include("usuarios-ver-top3.php");
     include("usuarios-ver-data.php");
   ?>

 </div>
</div>

<br><br><br>
<?php
include("$dirRoot"."includes/statusAdmin.php");
?>
