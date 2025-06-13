<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  usuarios-nuevo1.php                                                     //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
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
$forms="S";
$dropdown="S";
$breadCrumb="S";
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
   <div class="ui grid">
    <div class="four wide column">
      <h2 class="menu-label">usuario Nuevo</h2>
    </div>
    <div class="twelve wide column">
     <?php
      include("usuarios-list-abc1.php");
     ?>
    </div>
   </div>

<div class="ui container">
  <i class="large users icon"></i>

<form class='ui form' action='usuarios-nuevo2.php?op=cl' method='post' enctype='multipart/form-data'>
 <div class='ui grid'>
  <div class='eight wide column'>
   <?php
     echo "<label class='label font-pink font-bold'>CI/RIF:</label>
     <input size='15' maxlength='15' type='text' class='ui input' name='cid_usuario'>";
   ?>
  </div>
  <div class='eight wide column'>
   <?php
     echo "<label class='label font-pink font-bold'>Nombre</label>
     <input class='ui input' type='text' name='nombre'>";
   ?>
  </div>

  <div class='eight wide column'>
   <?php
    echo "<label>Empresa</label>
    <input class='ui input' type='text' name='empresa'>";
   ?>
  </div>


  <div class='eight wide column'>
   <?php
     echo "<label class='label font-pink font-bold'>Tel&eacute;fono Celular</label>
     <input class='ui input' type='text' name='email'>";
   ?>
  </div>

  <div class='eight wide column'>
   <?php
     echo "<label>Tel&eacute;fono Local</label>
     <input class='ui input' type='text' name='celular'>";
   ?>
  </div>

  <div class='eight wide column'>
   <?php
     echo "<label>Activo: S</label>";
   ?>
  </div>
 </div>
<br><br>
<button class="ui button blue" type="submit">Enviar Datos</button>
<button class="ui button" type="reset">Limpiar Campos</button>

<br><br>
 </form>
  </div>

 </div>
</div>

<br><br><br>
<?php
 include("$dirRoot"."includes/statusAdmin.php");
?>
