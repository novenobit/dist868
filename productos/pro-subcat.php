<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-subcat.php                                                          //
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
$popupWindow="S";
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
if(isset($_GET['nomBuscar']))
{ $nomBuscar=$_GET['nomBuscar']; }

//-----------------

if(isset($_GET['codCat']))
{ $codCat=$_GET['codCat'];
  if($codCat<>"")
  {
    $cod_categoria=$codCat;
    include("$dirRoot"."bots/bot-categoria.php");
    $titlePage=$catData['nom_categoria'];
  }
}

if(!isset($op))
{ $op="lp"; }
if(!isset($op2))
{ $op2="lis"; }
include("../includes/leftbar.php");
?>

<div class="mainContent">
 <div id="content">
  <div class="ui grid">
   <div class="sixteen wide column">
      <?php
       include("sub-menu.php");
       include("pro-subcat-abc.php");
      ?>
   </div>
   <div class="ten wide column">


      <div class="ui top attached tabular menu">
          <a class="item active" data-tab="lista">SubCat</a>
          <a class="item" data-tab="nuevo">Nuevo</a>
          <a class="item" data-tab="sinFoto">SinFoto</a>
      </div>
      <div class="ui bottom attached tab segment active" data-tab="lista">
          <?php
            include("pro-subcat-data.php");
          ?>
      </div>
      <div class="ui bottom attached tab segment" data-tab="nuevo">
          <form class="ui form" action="pro-subcat-nuevo2.php" method="POST" enctype="multipart/form-data" id="submitForm"  style="background-color:#fc411e;color:#ffffff;border-radius:15px;padding:1em;">
              <h3 class="ui header" style="color:#ffffff;">Agrega Sub-Categoria</h3>
              <div class="field">
                    <label>Nombre</label>
                    <?php include("$dirRoot"."bots/Select_ProCat.php"); ?>
              </div>
              <div class="field">
                    <label>Categor&iacute;a</label>
                    <input type="text" name="nom_subcategoria" placeholder="Nombre Sub Categoria">
              </div>
              <div class="field">
                    <label>Descripci&oacute;n</label>
                    <textarea name='datos_subcategoria' rows=2 cols=40></textarea>
              </div>
              <div class="field">
                    <label>Foto</label>
                    <input type='file' name='foto_subcategoria' data-buttonText="Your label here.">
                    <p>(Tama&ntilde;o Foto = 300x300px del Tipo JPG o PNG)</p>
              </div>
              <button class="ui black button" type="submit">Enviar</button>
              <input class="ui submit blue button" type="submit" value="Enviar Datos" id="btnSubmit">
          </form>
      </div>
      <div class="ui bottom attached tab segment" data-tab="sinFoto">
        <?php
          include("pro-subcat-sinfoto.php");
        ?>
      </div>
      <div class="ui bottom attached tab segment" data-tab="abc">
        <?php
         include("pro-subcat-abc.php");
        ?>
       </div>

   </div>
   <div class="six wide column">
      <iframe src='pro-subcat-last.php' height='700' width='100%' name='data2'  frameborder='0' scrolling='auto' allowtransparency='true' onload='resizeIframe(this)'></iframe>
      <div class="result text-center"></div>
   </div>
  </div>
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
