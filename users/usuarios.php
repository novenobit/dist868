<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  usuarios.php                                                            //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$accordion="N";
$aos="N";
$autoPro="N";
$breadCrumb="S";
$divider="N";
$dropdown="S";
$findData="N";
$forms="N";
$header="N";
$icon="S";
$image="S";
$input="N";
$item="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$popup="N";
$rating="N";
$sidebar="N";
$slick="N";
$swiper="N";
$tabs="S";
$table="S";
$topAdmin="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(!isset($iduser))
{ include_once("../users/user-check2.php"); }
if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

FechayHora();
$todoBien="N";

if(!isset($AreaUsuario) or $AreaUsuario=="N" or $AreaUsuario=="")
{
 echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."cuentas/cuentas.php>";
 exit();
}
else
{
 include("../includes/leftbar.php");
 FechayHora();
 $todoBien="N";
 if(isset($_GET['id']))
 { $id=$_GET['id']; }
 if(isset($_GET['op']))
 { $op=$_GET['op']; }
 if(isset($_GET['op2']))
 { $op2=$_GET['op2']; }
?>

 <div class="mainContent">
  <div id="content">
   <div class="ui grid">
    <div class="sixteen wide column">
      <?php
       include("sub-menu.php");
      ?>
    </div>
    <div class="ten wide column">
     <?php
      $op="lis";
      include("usuarios-list.php");
     ?>
    </div>
    <div class="six wide column">
      <iframe src='users-last.php' height='700' width='100%' name='data2'  frameborder='0' scrolling='auto' allowtransparency='true' onload='resizeIframe(this)'></iframe>
    </div>
  </div>
 </div>
</div>

<?php
}

$endPage="N";
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>

<script>
$(document).ready(function (e) {
 $("#submitForm").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "usuario-edit3.php",
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
</body>
</html>
