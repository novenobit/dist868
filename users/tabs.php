<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema com868.com                    //
// *  admin1.php                                                 //
// ****************************************************************
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
$tabs="S";
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


if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
FechayHora();
$todoBien="N";
if(isset($_SESSION['iduser']))
{ $iduser=$_SESSION['iduser']; }
if(isset($_SESSION['idnivel']))
{ $idnivel=$_SESSION['idnivel']; }
include_once("../bots/AreasSistema.php");
if(!isset($AreaAdmin) or $AreaAdmin=="N")
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

FechayHora();
$todoBien="N";
$iduser=$_SESSION['iduser'];
$idnivel=$_SESSION['idnivel'];
include_once("../bots/AreasSistema.php");
if(!isset($AreaAdmin) or $AreaAdmin=="N")
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}




 include("leftbar.php");
?>
 <div class="mainContent">
  <?php include("sub-menu.php"); ?>

<div class="ui brown three item inverted large menu">
  <a class="item">Features</a>
  <a class="item">Testimonials</a>
  <a class="item">Sign-in</a>
</div>

   <div class="ui four item stackable tabs menu">
          <a class="active item" data-tab="definition">Definition</a>
          <a class="item" data-tab="examples">Examples</a>
          <a class="item" data-tab="usage">Usage</a>
          <a class="item" data-tab="settings">Settings</a>
   </div>
   <div class="main ui container">
     <div class="ui active tab" data-tab="definition">
        <p>Tabs are connecting using paths specified in the data-tab attribute. Tab is then initialized in Javascript on the activating elements.</p>
     </div>
     <div class="ui tab" data-tab="examples">
      <p>Basic Examples</p>
     </div>
     <div class="ui intro tab" data-tab="usage">
      <h2 class="ui dividing header">Initializing Tabs</h2>
     </div>
     <div class="ui tab" data-tab="settings">
       <h3 class="ui header font-white">
         Tab Settings
         <div class="sub header font-white">Form settings modify the tab behavior</div>
       </h3>
     </div>
   </div>



  <div class="ui top attached tabular menu">
   <a class="active item" data-tab="abierta">Cuentas Abiertas</a>
   <a class="item grey-background" data-tab="online">Online</a>
  </div>
  <div class="ui bottom attached tab segment" data-tab="abierta">
   <?php
     include("cuentas-abiertas.php");
   ?>
  </div>
  <div class="ui bottom attached active tab segment" data-tab="online" style="background-color:#79CDCD;color:#FFFFFF;">
   <?php
     include("cuentas-online.php");
   ?>
  </div>
 </div>



  </div>
  </div>
</div>

<?php
$showStatus="N";
include("../includes/statusAdmin.php");
?>
