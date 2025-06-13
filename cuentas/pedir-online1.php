<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                          //
//  pedir-online.php                                                        //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$findData="S";
$forms="N";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$menu="S";
$message="S";
$popup="N";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$table="S";
$topAdmin="S";
$dirRoot="../";
$tableUse="cuentas1";
include_once("../includes/headfileFrame.php");

FechayHora();
$todoBien="N";

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
include("sub-menu.php");
?>

<div class="ui centered grid">
 <div class="twelve wide tablet twelve wide computer column">
  <div class="ui raised segment">
   <div class="ui stackable two column grid">
    <div class="column">
     <?php
      // include("sub-menu.php");
      include("cuenta-data.php");
     ?>
    </div>
    <div class="column right aligned">
      <?php
       include("cuenta-menu.php");
      ?>
    </div>
   </div>
  </div>
  <?php
   include("lista-cesta1.php");
   include("list-pagos1.php");
  ?>
 </div>
 <div class="four wide tablet four wide computer column">
    <?php
      include("left-menu.php");
    ?>
    <div class="result text-center"></div>
 </div>
</div>

<br><br>
<?php
// $showStatus="N";
$endPage="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
