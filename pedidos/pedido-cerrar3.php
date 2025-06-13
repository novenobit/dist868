<?php
// ************************************************************* 2023 ********
//  agrega-cesta1.php                                                       //
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
$label="S";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="S";
$divider="S";
$forms="N";
$breadCrumb="S";
$findData="S";
$popup="S";
$topAdmin="S";
$dropdown="S";
$dirRoot="../";
$tableUse="pedidos";
include_once("../includes/headfileFrame.php");


FechayHora();
$todoBien="N";
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
if(isset($_GET['idPago']))
{ $idPago=$_GET['idPago']; }
if(isset($_GET['id_formapago']))
{ $id_formapago=$_GET['id_formapago']; }
if(isset($_POST['montopago']))
{ $montopago=$_POST['montopago']; }

if(!isset($montopago) or $montopago=="")
{
 $error="No Indico el Monto";
 error();
 exit();
}

if(!isset($id_cuenta) or $id_cuenta=="")
{
 $error="No Tengo los Datos de la Cuenta";
 error();
 exit();
}
?>

<div class="ui padded grid">
 <div class="three wide tablet only three wide computer only column sidebar" id="sidebar">
   <?php
    include("lista-pedido-items3.php");
   ?>
 </div>
 <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">

  <div class="ui raised segment">
   <div class="ui stackable two column grid">
    <div class="column">
     <?php
      include("sub-menu-3.php");
      include("pedido-data.php");
     ?>
    </div>
   </div>
  </div>
  <?php
    include("../libs/loader.php");  
    include("pedido-pago3.php");
  ?>
 </div>
</div>

<?php
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
