<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-cat-list.php                                                        //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$aos="N";
$autoPro="S";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$findData="S";
$forms="S";
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
$modal="S";
$popup="N";
$popup="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$table="S";
$tabs="S";
$topAdmin="S";
$dirRoot="../";
$whiteBackground="S";
include_once("../includes/headfileFrame.php");
FechayHora();

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

if(isset($_GET['op2']))
{ $op2="$_GET[op2]"; }
$todoBien="N";
if(!isset($op2))
{ $op2="1"; }

if(isset($_GET['cod_categoria']))
{ $cod_categoria="$_GET[cod_categoria]"; }

if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }

if(!isset($op))
{ $op="lp"; }
if(!isset($op2))
{ $op2="lis"; }
include("$dirRoot"."bots/AreasSistema.php");
include("../includes/leftbar.php");
?>

<div class="mainContent">
 <div id="content">

  <?php
   include("sub-menu.php");
   //include("productos-list-abc.php");
  ?>
  <div class="row">
   <div class="col-9">

     <div class="ui top attached tabular menu">
      <a class="active item" data-tab="lista" style="background-color:#2d2f31;color:#bfc7c5;">Listado</a>
      <a class="item" data-tab="nuevo" style="background-color:#2d2f31;color:#bfc7c5;">Nuevo</a>
     </div>
     <div class="ui bottom attached tab segment" data-tab="lista"  style="background-color:#2d2f31;color:#bfc7c5;">
      <?php  include("pro-cat-list-data.php"); ?>
     </div>
     <div class="ui bottom attached active tab segment" data-tab="nuevo" style="background-color:#22313F;color:#FFFFFF;">
        <div class="ui hidden divider"></div>

        <form class="ui form" action="pro-cat-new2.php" method="POST" enctype="multipart/form-data" id="submitForm">
         <h3>Agrega Categoria</h3>
         <div class="field">
            <label><span class="font-white">Nombre</span></label>
           <input type="text" name="nom_categoria" placeholder="Nombre">
         </div>
         <div class="field">
            <label><span class="font-white">Foto/Imagen</span></label>
            <input type='file' name='foto_categoria'>
         </div>
         <div class="field">
             <label><span class="font-white">(Tama&ntilde;o Foto = <span class='font-yellow'>200x200px</span> del Tipo JPG o PNG)</span></label>
         </div>
         <button class="ui button" type="submit">Enviar</button>
        </form>
     </div>
   </div>
   <div class="col-3 menu">
    <?php
      include("left-menu.php");
    ?>
    <div class="result text-center"></div>
   </div>
 </div>


 </div>
</div>


<?php
// $showStatus="N";
$subCatForm="S";
$endPage="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
<script>
$(document).ready(function (e) {
 $("#submitForm").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "pro-cat-new2.php",
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
