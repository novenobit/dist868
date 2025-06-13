<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-subcat.php                                                     //
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
include_once("../includes/headfileFrame.php");
FechayHora();

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

if(isset($_GET['cod_categoria']))
{ $cod_categoria="$_GET[cod_categoria]"; }

if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['codCat']))
{ $codCat=$_GET['codCat'];
  if($codCat<>"")
  {
    $cod_categoria=$codCat;
    include("$dirRoot"."bots/bot-categoria.php");
    include("$dirRoot"."datafiles/catData.php");    
    if(isset($nom_categoria))
    { $titlePage=$nom_categoria; }
  }
}
$todoBien="N";
if(isset($_GET['op2']))
{ $op2="$_GET[op2]"; }
if(!isset($op))
{ $op="lp"; }
if(!isset($op2))
{ $op2="lis"; }

include("../includes/leftbar.php");
include("sub-menu.php");
//  include("productos-list-abc.php");
?>
<div class="row">
 <div class="col-9">
   <div class="ui top attached tabular menu">
     <a class="item active" data-tab="subCat" style="background-color:#2d2f31;color:#bfc7c5;">SubCat</a>
     <a class="item" data-tab="nuevo" style="background-color:#2d2f31;color:#bfc7c5;">Nuevo</a>
     <a class="item" data-tab="sinFoto" style="background-color:#2d2f31;color:#bfc7c5;">SinFoto</a>
   </div>
   <div class="ui bottom attached tab segment active" data-tab="subCat">
     <?php
   //    include("pro-subcat-data.php");
     ?>
   </div>
   <div class="ui bottom attached tab segment" data-tab="nuevo"  style="background-color:#22313F;color:#ffffff;">
     <form class="ui form font-white" action="pro-subcat-nuevo2.php" method="POST" enctype="multipart/form-data" id="submitForm">
        <h3 class="ui header">Agrega Sub-Categoria</h3>
        <div class="field">
              <label><span class='font-white'>Nombre</span></label>
              <?php include("$dirRoot"."bots/Select_ProCat.php"); ?>
        </div>
        <div class="field">
              <label><span class='font-white'>Categor&iacute;a</span></label>
              <input type="text" name="nom_subcategoria" placeholder="Nombre Sub Categoria">
        </div>
        <div class="field">
              <label><span class='font-white'> Descripci&oacute;n</span></label>
               <textarea name='datos_subcategoria' rows=2 cols=40></textarea>
        </div>
        <div class="field">
              <label><span class='font-white'>Foto</span></label>
               <input type='file' name='foto_subcategoria' data-buttonText="Your label here.">
               <p>(Tama&ntilde;o Foto = 300x300px del Tipo JPG o PNG)</p>
        </div>
        <button class="ui orange button" type="submit">Enviar</button>
        <input class="ui submit blue button" type="submit" value="Enviar Datos" id="btnSubmit">
     </form>
   </div>
   <div class="ui bottom attached tab segment" data-tab="sinFoto">
     <?php
      include("pro-subcat-sinfoto.php");
     ?>
   </div>
 </div>
 <div class="col-3 menu">
   <?php
      include("left-menu.php");
   ?>
   <div class="result text-center"></div>
   <iframe src='blank.php' height='200' width='100%' name='data2' frameborder='0' scrolling='auto' allowtransparency='true'></iframe>
 </div>
</div>

<?php
$tab="S";
$subCatForm="S";
$endPage="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
<script>
$(document).ready(function (e) {
 $("#submitForm").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "pro-subcat-nuevo2.php",
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
