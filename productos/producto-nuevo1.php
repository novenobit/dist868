<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  productos-nuevo1.php                                                    //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$findData="S";
$forms="S";
$gridCss="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$noFrame="S";
$pdscripts="S";
$popup="S";
$popupWindow="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$table="S";
$tabs="S";
$topAdmin="S";
$whiteBackground="S";
$dirRoot="../";

include_once("../includes/headfileFrame.php");
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}

FechayHora();
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['codigo_barra']))
{ $codigo_barra=$_GET['codigo_barra']; }
if(isset($_POST['codigo_barra']))
{ $codigo_barra=$_POST['codigo_barra']; }
if(isset($_GET['mcod_categoria']))
{ $mcod_categoria="$_GET[mcod_categoria]"; }
if(!isset($codigo_barra))
{ $codigo_barra=""; }
include("../includes/leftbar.php");
?>

<div class="mainContent">
 <div id="content">
  <?php
   include("sub-menu.php");
   include("productos-list-abc.php");
  ?>
  <div class="row">
   <div class="col-9">
     <div class="ui top attached tabular menu">
        <a class="active item" data-tab="nuevo" style="background-color:#5b4ade;color:#ffffff;">Nuevo</a>
        <a class="item" data-tab="recien" style="background-color:#fff;color:#171717;">Recien Agregados</a>
      </div>
      <div class="ui bottom attached active tab segment" data-tab="nuevo"  style="background-color:#5b4ade;color:#bfc7c5;">
        <?php
          include("./producto-form.php");
        ?>
      </div>
      <div class="ui bottom attached tab segment" data-tab="recien"  style="background-color:#fff;color:#171717;">
        <?php
          include("./productos-recien.php");
        ?>
      </div>
   </div>
   <div class="col-3 menu">
    <?php
      include("./left-menu.php");
    ?>
    <div class="result text-center"></div>
   </div>
  </div>
 </div>
</div>

<br><br>
<?php
// $showStatus="N";
$endPage="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
<script>
$(document).ready(function (e) {
 $("#submitForm").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "producto-nuevo2.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
        success: function (data) {
          console.log(data);
          $('.result').html(data);
        }
      });
 }));
});
</script>
</body></html>
