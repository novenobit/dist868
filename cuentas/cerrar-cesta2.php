<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  cerrar-cesta2.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$topFile="N";
$headFile="N";
$topAdmin="N";
$findData="S";
$grids="S";
$header="S";
$image="S";
$input="S";
$label="S";
$loadPage="S";
$message="S";
$table="S";
$dirRoot="../";
$tableUse="cuentas1";
include_once("../includes/headfileFrame.php");

FechayHora();
$todoBien="N";
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
if(isset($_GET['idPago']))
{ $idPago=$_GET['idPago']; }
//include("sub-menu.php");
?>

<div class="ui centered grid">
 <div class="eleven wide tablet eleven wide computer column">
   <?php
     //include("sub-menu-3.php");
     include("cuenta-data.php");
     include("cuenta-pago2.php");
   ?>
   <div class="result text-center"></div>
 </div>
 <div class="five wide tablet five wide computer column">
    <?php
     include("lista-cesta-items3.php");
    ?>
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
         url: "cerrar-cesta3.php",
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
