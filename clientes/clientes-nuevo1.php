<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  clientes.php                                                             //
//  Copyright (c) 2023 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$accordion="S";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$findData="S";
$forms="S";
$grids="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$jQueryModal="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$popup="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$table="S";
$topAdmin="S";
$autoCliente="S";
$dirRoot="../";

include_once("../includes/headfileFrame.php");

if(isset($_SESSION['iduser']))
{ $iduser=$_SESSION['iduser']; }
if(isset($_SESSION['idnivel']))
{ $idnivel=$_SESSION['idnivel']; }


if(!isset($iduser))
{ include_once("../users/user-check2.php"); }
if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
include_once("../bots/AreasSistema.php");
FechayHora();
$todoBien="N";

if($idnivel>=3)
{
 echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."cta-vendedor/pedironline.php>";
 exit();
}
else
{
 include("../includes/leftbar.php");
?>
<div class="mainContent">
 <div id="content">
   <?php
      include("sub-menu.php");
   ?>
   <div class="ui grid">
    <div class="sixteen wide column">
      <h2 class="menu-label"><i class="large users icon"></i> Cliente Nuevo</h2>
    </div>
    <div class="twelve wide column">

        <form class="ui form" action="'clientes-nuevo2.php?op=cl" method="POST" enctype="multipart/form-data" id="submitForm">
         <div class="ui stackable grid" style="background-color:#2d2d2d;color:#ffffff;">
         <div class='eight wide column'>
         <?php
           echo "<label>CI/RIF: <i class='check icon'></i></label>
           <input size='15' maxlength='15' type='text' class='ui input' name='cid_cliente'>";
         ?>
         </div>
         <div class='eight wide column'>
         <?php
           echo "<label>Nombre <i class='check icon'></i></label>
           <input class='ui input' type='text' name='nom_cliente'>";
         ?>
         </div>

         <div class='eight wide column'>
         <?php
           echo "<label>Empresa</label>
           <input class='ui input' type='text' name='empresa'>";
         ?>
         </div>
         <div class='eight wide column'>
         <?php
           echo "<label>Encargado</label>
           <input class='ui input' type='text' name='encargado'>";
         ?>
         </div>
         <div class='eight wide column'>
         <?php
           echo "<label>Direcci&oacute;n1 <i class='check icon'></i></label>
           <textarea class='ui input' name='dir1_cliente' rows='2' cols='30'></textarea>";
         ?>
         </div>
         <div class='eight wide column'>
         <?php
           echo "<label>Direcci&oacute;n2 <i class='check icon'></i></label>
           <textarea class='ui input' name='dir2_cliente' rows='2' cols='30'></textarea>";
         ?>
         </div>

         <div class='eight wide column'>
         <?php
           echo "<label>Tel&eacute;fono Celular <i class='check icon'></i></label>
           <input class='ui input' type='text' name='tel1_cliente'>";
         ?>
         </div>
         <div class='eight wide column'>
         <?php
           echo "<label>Tel&eacute;fono Local</label>
           <input class='ui input' type='text' name='tel2_cliente'>";
         ?>
         </div>

         <div class='five wide column'>
         <?php
           echo "<label>Clave de Acceso</label>
           <input class='ui input' type='password' name='cod_cliente'>";
         ?>
         </div>

         <div class='five wide column'>
         <?php
           echo "<label>eMail/Correo <i class='check icon'></i></label>
           <input class='ui input' type='text' name='email_cliente'>";
         ?>
         </div>
         <div class='six wide column'>
         <?php
           echo "<label>Sitio Web</label>
           <input class='ui input' type='text' name='url_cliente'>";
         ?>
         </div>

         <div class='five wide column'>
           <label>Nivel de Precios <i class='check icon'></i></label>
         <?php
           include("$dirRoot"."datafiles/select-nivel-precios.php");
         ?>
         </div>

         <div class='six wide column'>
             <?php
               include("select-tipo-cliente.php");
             ?>
         </div>
         <div class='five wide column'>
             <?php
               include("select-vendedor.php");
             ?>
         </div>
         <?php
         // <div class='eight wide column'>
         //  <label>Lista Correo</label>
         //  echo "<input class='ui checkbox' type=radio value='S' name='lista_correo' checked> S &nbsp; <input class='ui checkbox' type=radio value='N' name='lista_correo'> N";
         // </div>
         // <div class='eight wide column'>
         //   <label>Contribuyente Especial</label>
         //  echo "<input class='ui checkbox' type=radio value='S' name='contribuyente' checked> S &nbsp; <input class='ui checkbox' type=radio value='N' name='contribuyente'> N";
         // </div>
         ?>
         <div class='sixteen wide column'>
            <?php
              echo "<label>Nota Extra</label>
              <br><textarea class='ui input' name='nota_cliente' rows='2' cols='30'></textarea>";
            ?>
         </div>

       </div>
       <br><br>
       <button class="ui button blue" type="submit">Enviar Datos</button>
       <button class="ui button" type="reset">Limpiar Campos</button>

       <br><br>
      </form>
      
    </div>
    <div class="four wide column">
      <div class="result text-center"></div>
      <?php include("clientes-last.php"); ?>
    </div>
   </div>
 </div>
</div>
<?php
}
?>

<br><br><br>
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
         url: "clientes-nuevo2.php",
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
