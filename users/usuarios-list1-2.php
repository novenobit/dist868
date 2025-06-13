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
$breadCrumb="S";
$dirRoot="../";
include_once("../includes/config.ini.php");
// Variables 2
$num_filas=0;
?>

<link rel="stylesheet" href="<?php echo "$dirRoot".""; ?>libs2/jquery/jquery-ui/jquery-ui.min.css">
<script src="<?php echo "$dirRoot".""; ?>libs2/jquery/jquery.min.js"></script>
<script src="<?php echo "$dirRoot".""; ?>libs2/jquery/jquery-ui/jquery-ui.min.js"></script>

<style>
.ui-autocomplete-loading {
  background: white url("../imagenesgraphs/ui-anim_basic_16x16.gif") right center no-repeat;
}
</style>

<script>
 $(function() {
  var dirRoot="<?php echo $dirRoot; ?>";
  var dirDatosEmpresa="<?php echo $dirDatosEmpresa; ?>";
  $( "#search" ).autocomplete(
   {
     source:"../../bots/auto-usuarios.php?dirRoot=<?php echo "$dirRoot&dirDatosEmpresa=$dirDatosEmpresa"; ?>",
     minLength:3
   })
});
</script>

<! Tabs Men&uacute; !>
<div class="w3-bar w3-padding">
 <button class="w3-bar-item w3-button w3-round w3-border linkButton w3-hover-black tablink w3-hover-pink" onclick="openTabs(event,'buscar')">Buscar</button>
 <button class="w3-bar-item w3-button w3-round w3-border linkButton w3-hover-black tablink w3-hover-pink" onclick="openTabs(event,'datos')">Estadistica</button>
</div>

<! Tabs 1 Area !>
<div id="buscar" class="tabsData w3-padding">
 <div class='w3-row'>
  <div class='w3-col w3-padding w3-round navSubBar s12 m12 l12'>
   <span class='font-18 font-bold w3-animate-left'>Buscar Datos</span>
  </div>
 </div>
 <div class='w3-row w3-white w3-padding'>
  <div class='w3-col s8 m6 l6'>
     <form action="<?php echo "usuarios-buscar4.php"; ?>" method="POST" onsubmit="if (this.search_type.value=='clients') { this.action='search-usuarios'; }">
     <input class='w3-input w3-border ' size='30' type="text"  name="buscar" placeholder='Buscar Usuario por Nombre' id="search">
  </div>
  <div class='w3-col s4 m4 l4'>
    <select class="w3-select" name="dondebuscar">
             <option value="">donde</option>
             <option value=""></option>
               <option value="cid_usuario">Usuario (rif/ci)</option>
               <option value="nombre">Usuario (nombre)</option>
               <option value="telefono">Usuario (telefono)</option>
              <option value=""></option>
            </select>
  </div>
  <div class='w3-col s4 m2 l2'>
    <input  class='w3-button w3-block w3-round linkButton w3-border w3-hover-pink' type="submit" value=" Buscar"/>
    </form>
  </div>
 </div>
 <br>
 <div class='w3-row w3-white w3-border-bottom w3-round w3-padding'>
  <div class='w3-col  s8 m6 l6'>
    Agrega Nuevos usuarios
  </div>
  <div class='w3-col s4 m6 l6'>
   <?php
      echo "<a class='w3-button w3-round  w3-block linkButton w3-border w3-hover-pink' href='usuario-nuevo1.php?op=cl'>Nuevo usuarios</a>";
    ?>
  </div>
 </div>
 <br>
 <div class='w3-row w3-white w3-border-bottom w3-round w3-padding'>
  <div class='w3-col s8 m6 l6'>
    Muestra los usuarios que estan desactivados y puede Recupera los usuarios desactivados
  </div>
  <div class='w3-col w3-padding s4 m6 l6'>
   <?php
      echo "<a class='w3-button w3-round  w3-block linkButton w3-border w3-hover-pink' href=\"javascript:popup_center('usuarios-eliminados.php?op=des','800','500'); \">DesActivados</a>";
    ?>
  </div>
 </div>
 <br>
 <div class='w3-row w3-white w3-border-bottom w3-round w3-padding'>
  <div class='w3-col s8 m6 l6'>
    Muestra los usuarios que fueron eliminados y Aqu&iacute; puede Recupera los usuarios eliminados
  </div>
  <div class='w3-col w3-padding s4 m6 l6'>
    <?php
     echo "<a class='w3-button w3-round w3-block linkButton w3-border w3-hover-pink' href=\"javascript:popup_center('usuarios-eliminados.php?op=elm','800','500'); \">Eliminados</a>";
    ?>
  </div>
 </div>
<?php
 if($sys_ventas=="S")
 {
?>
 <br>
 <div class='w3-row w3-white w3-border-bottom w3-round w3-padding'>
  <div class='w3-col s8 m6 l6'>
    Borra los usuarios que no tienen consumo durante el a&ntilde;o
  </div>
  <div class='w3-col w3-padding s4 m6 l6'>
    <?php
      echo "<a class='w3-button w3-round  w3-block linkButton w3-border w3-hover-pink' href='usuarios-borrar.php?op=cl'>Elimina Viejos</a>";
    ?>
  </div>
 </div>
<?php
 }
?>

 <br> <br>
</div>
<! Tabs 2 Area !>
<div id="datos" class="tabsData w3-padding w3-center" style="display:none">
<div class='w3-row'>
 <div class='w3-col w3-padding w3-round navSubBar s12 m12 l12'>
  <span class='font-18 font-bold w3-animate-left'>Estadisticas</span>
 </div>
  <div class='w3-col w3-padding s12 m12 l12'>
 </div>
</div>
 <?php
  $op="usuarios";
  include("$dirRoot"."libs/db-static.php");
 ?>
</div>

<br><br><br>

<?php
// $endPage="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
