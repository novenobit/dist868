<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  contact1.php                                                //
// ****************************************************************
include_once("./includes/session.php");
$aos="S";
$autoPro="S";
$countUp="S";
$divider="S";
$dropdown="S";
$forms="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="S";
$menu="S";
$message="S";
$nags="N";
$popup="N";
$rating="N";
$sidebar="N";
$slick="S";
$swiper="S";
$table="N";
$dirRoot="./";

include_once("./includes/config.ini.php");

if(isset($_GET['buscar']))
{ $buscar="$_GET[buscar]"; }
if(isset($_POST['buscar']))
{ $buscar="$_POST[buscar]"; }
if(!isset($buscar))
{ $buscar=""; }

//if($mobile=="S" or $tablet=="S")
if($mobile=="S")
{
 include("mobile-data3.php");
?>
<style>
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
</style>
<div class="ui container center aligned" >
 <h3 class="ui center aligned blue header">Buscar Producto</h3>
 <div class="ui hidden divider"></div>
 <form  action="barcode2.php" method="POST" enctype="multipart/form-data" id="submitForm">
  <div class="field">
    <label><i class="barcode icon"></i>Codigo de Barra</label>
    <input type="text" placeholder="Codigo de Barra..."  name="buscar" autocomplete="off" value="<?php echo $buscar; ?>" maxlength="13" style="border-radius:10px;">
  </div>
  <div class="field">
    <input class="ui submit blue button" type="submit" value="Buscar" id="btnSubmit">
    <a class="ui submit button" href="barcode1.php">Reset</a>
  </div>
 </form>

 <div class="ui hidden divider"></div>
 <div class="result text-center"></div>

</div>
<div class="ui icon floating message">
  <i class="barcode icon"></i>
  <div class="content">
    <div class="header">
      Buscar Productos
    </div>
    <p>Puede buscar entre los 6mil productos en nuestra base de datos.</p>
  </div>
</div>
<?php
}
else
{
?>

<div class="ui container center aligned" >
 <div class="ui hidden divider"></div>
 <h3 class="ui center aligned blue header">Buscar Producto</h3>
 <div class="ui hidden divider"></div>
 <form class="ui form center aligned" action="barcode2.php" method="POST" enctype="multipart/form-data" id="submitForm">
   <div class="ui grid">
     <div class="sixteen wide column center aligned text-center">
       <div class="ui left icon input">
        <input type="text" placeholder="Codigo de Barra..."  name="buscar" autocomplete="off" value="<?php echo $buscar; ?>" maxlength="13" style="border-radius:10px;">
        <i class="barcode red icon"></i>
       </div>
     </div>
     <div class="sixteen wide column">
           <input class="ui submit blue button" type="submit" value="Buscar" id="btnSubmit">
           <a class="ui submit button" href="barcode1.php">Reset</a>
     </div>
   </div>
 </form>

 <div class="ui hidden divider"></div>
 <div class="result text-center"></div>

</div>

<?php
}
$endPage="N";
include("./includes/statusbar.php");
?>

<script>
$(document).ready(function (e) {
 $("#submitForm").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "barcode2.php",
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
 submitForm.reset();
return $submitForm;
 }));
});
</script>
</body></html>
