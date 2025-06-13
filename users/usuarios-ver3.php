<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  usuarios.php                                               //
// ****************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$icon="S";
$input="S";
$list="N";
$sidebar="N";
$table="S";
$message="S";
$popup="N";
$label="S";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="N";
$divider="N";
$forms="S";
$topAdmin="S";
$dropdown="S";
$breadCrumb="S";
$findData="S";
$tabs="S";
$dirRoot="../";
include_once("../includes/config.ini.php");

FechayHora();
$todoBien="N";
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
    include("left-menu.php");
   ?>
    <div class="description">
      <div class="result text-center"></div>
     </div>
 </div>
 <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">
   <?php
    //include("usuarios-list-abc1.php");
   ?>

   <div class="ui top attached tabular menu">
    <a class="active item" data-tab="Data">Usuario</a>
    <a class="item" data-tab="Areas">Areas</a>
   </div>
   <div class="ui bottom attached active tab segment" data-tab="Data">
      <?php
       include("usuarios-ver-top3.php");
       include("usuarios-ver-data.php");
      ?>
   </div>
   <div class="ui bottom attached tab segment" data-tab="Areas">
      <?php
       include("usuario-edit-ac.php");
      ?>
   </div>


 </div>
</div>

<br><br><br>
<?php
$endPage="N";
include("$dirRoot"."includes/statusAdmin.php");
?>

<script>
$(document).ready(function (e) {
 var cid = "<?php echo $cid; ?>";

 $("#submitForm").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
   url: "usuario-edit3.php?cid=<?php echo $cid; ?>",
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
