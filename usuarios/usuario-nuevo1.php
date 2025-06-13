<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema com868.com                    //
// *  usuarios-nuevo1.php                                        //
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
$loadPage="S";
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
$whiteBackground="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

FechayHora();
$todoBien="N";
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

Function selecttipoemp()
{
 global $conex1, $Mid_tipoemp;
 echo "<select class='select' name='id_tipoemp'>
 <option selected>seleccione</option>";
 $cons="select id_tipoemp,tipo_empleado from tipodeempleados order by tipo_empleado";
 $resultado=mysqli_query($conex1,$cons);
 while($tipoemp=mysqli_fetch_array($resultado))
 {
  echo "<option value='{$tipoemp['id_tipoemp']}'>{$tipoemp['tipo_empleado']}</option>";
 }
 echo "</select>";
}
?>

<div class="ui container">
 <?php include("sub-menu.php"); ?>
</div>

<div class="ui padded grid">

 <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">

   <div class="ui grid">
    <div class="four wide column">
      <h2 class="menu-label">Nuevo Usuario</h2>
    </div>
    <div class="twelve wide column">
     <?php
      include("./usuarios-abc1.php");
     ?>
    </div>
   </div>

<form class='ui form' action='usuario-nuevo2.php' method='POST' id='submitForm'>
 <div class="ui stackable grid" style="background-color: #3c3c3c;color: #ffffff;">
  <div class='eight wide column'>
    <label class='font-16'>Usuario: <i class='check icon'></i></label>
    <input size='15' maxlength='20' type='text' class='ui input' name='usuario' placeholder='todo minuscula y sin espacio' autocomplete="off">
  </div>

  <div class='eight wide column'>
    <label class='font-16'>CI/RIF: <i class='check icon'></i></label>
    <input size='15' maxlength='20' type='text' class='ui input' name='cid_usuario' autocomplete="off">
  </div>

  <div class='eight wide column'>
    <label class='font-16'>Nombre: <i class='check icon'></i></label>
    <input class='ui input' type='text' name='nombre' autocomplete="off">
  </div>
  <div class='eight wide column'>
    <label class='font-16'>Apellido: <i class='check icon'></i></label>
    <input class='ui input' type='text' name='apellido' autocomplete="off">
  </div>

  <div class='eight wide column'>
    <label class='font-16'>Clave: <i class='check icon'></i></label>
    <input class='ui input' name="clave" type="password" placeholder="Clave" autocomplete="off">
  </div>

  <div class='eight wide column'>
    <label>Correo</label>
    <input class='ui input' type='text' name='email'>
  </div>

  <div class='eight wide column'>
    <label class='font-16'>Tel&eacute;fono Celular: <i class='check icon'></i></label>
     <input class='ui input' type='text' name='telefono' autocomplete="off">
  </div>

  <div class='eight wide column'>
     <label>Tel&eacute;fono Local</label>
     <input class='ui input' type='text' name='celular' autocomplete="off">
  </div>

  <div class='five wide column'>
     <label>Tipo Usuario</label>
     <div class="field">
         <div class="ui selection dropdown">
             <input type="hidden" name="tipousuario">
             <i class="dropdown icon"></i>
             <div class="default text">Tipo Usuario</div>
             <div class="menu">
                 <div class="item" data-value="C">Cliente</div>
                 <div class="item" data-value="E">Empleado</div>
             </div>
         </div>
     </div>
  </div>
  <div class='five wide column'>
     <label>Tipo Empleado</label>
        <?php selecttipoemp(); ?>
  </div>

  <div class='six wide column'>
     <label>Foto Usuario</label>
     <input class='ui input' type='file' name='foto'>
  </div>
 </div>
 
 <br><br>
 <button class="ui button blue" type="submit">Enviar Datos</button>
 <button class="ui button" type="reset">Limpiar Campos</button>
<br><br>
</form>
 </div>
 <div class="three wide tablet only three wide computer only column sidebar" id="sidebar">
   <?php
    include("left-menu.php");
   ?>
   <div class="ui card">
    <div class="content">
     <div class="meta">
       <span class="date">Nuevos Datos</span>
     </div>
     <div class="description">
      <div class="result text-center"></div>
     </div>
    </div>
   </div>
 </div>
 </div>


</div>

<br><br><br>
<?php
$endPage="N";
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
<script>
$(document).ready(function (e) {
 $("#submitForm").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "usuario-nuevo2.php",
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
