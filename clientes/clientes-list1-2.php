<?php
// ******************************************************** 2023 - 2017 ***
// Sistema Dist868                 //
// Copyright (c) 2023-2025 NovenoBIT.com                                      //
// ************************************************************************
include_once("../includes/session.php");
$autoPro="N";
$cards="S";
$dropdown="S";
$findData="S";
$findData="S";
$forms="S";
$grid="S";
$header="S";
$headFile="N";
$icon="S";
$image="S";
$input="S";
$item="S";
$label="S";
$loadPage="S";
$menu="S";
$message="S";
$popup="S";
$table="S";
$tabs="S";
$topAdmin="N";
$topFile="N";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
include("$dirRoot"."bots/bot-cliente.php");
// Variables 2
$num_filas=0;
?>

<link rel="stylesheet" href="<?php echo "$dirRoot".""; ?>libs2/jquery/jquery-ui/jquery-ui.min.css">
<script src="<?php echo "$dirRoot".""; ?>libs2/jquery/jquery.min.js"></script>
<script src="<?php echo "$dirRoot".""; ?>libs2/jquery/jquery-ui/jquery-ui.min.js"></script>

<!-- Tabs Men&uacute; -->
<div class="ui top attached tabular menu">

  <div class="active item" data-tab="one">Menu</div>
  <div class="center item" data-tab="two">Estadistica</div>

</div>

<!-- Tabs 1 Area -->
<div class="ui bottom attached active tab segment" data-tab="one">
<div class='ui grid'>
  <div class='eight wide column'>
       Agrega Nuevos Clientes
     </div>
  <div class='eight wide column'>
      <?php
         echo "<a class='ui primary button' href='cliente-nuevo1.php?op=cl'>Nuevo Clientes</a>";
       ?>
     </div>
    </div>
<div class='ui hidden divider'></div>
<div class='ui grid'>
  <div class='eight wide column'>
       Muestra los clientes que estan desactivados y puede Recupera los clientes desactivados
     </div>
  <div class='eight wide column'>
      <?php
         echo "<a class='ui primary button' href=\"javascript:popup_center('clientes-eliminados.php?op=des','800','500'); \">DesActivados</a>";
       ?>
     </div>
    </div>
<div class='ui hidden divider'></div>
<div class='ui grid'>
  <div class='eight wide column'>
       Muestra los clientes que fueron eliminados y Aqu&iacute; puede Recupera los clientes eliminados
     </div>
  <div class='eight wide column'>
       <?php
        echo "<a class='ui primary button' href=\"javascript:popup_center('clientes-eliminados.php?op=elm','800','500'); \">Eliminados</a>";
       ?>
     </div>
    </div>
   <?php
    //if($sys_ventas=="S")
    //{
   ?>
<div class='ui hidden divider'></div>
<div class='ui grid'>
  <div class='eight wide column'>
       Borra los clientes que no tienen consumo durante el a&ntilde;o
     </div>
  <div class='eight wide column'>
       <?php
         echo "<a class='ui primary button' href='clientes-borrar.php?op=cl'>Elimina Viejos</a>";
       ?>
     </div>
    </div>
   <?php
    //}
   ?>

</div>

<!-- Tabs 2 Area -->
<div class="ui bottom attached tab segment" data-tab="two">
 <div class='ui grid'>
  <div class='sixteen wide column'>
   <span class='font-18 font-bold'>Estadisticas</span>
  </div>
 </div>
 <?php
  $op="clientes";
  //include("$dirRoot"."libs1/db-static.php");
 ?>
</div>

<?php
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
