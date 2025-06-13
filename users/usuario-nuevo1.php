<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  admin1.php                                                 //
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

if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(!isset($iduser) or !isset($_SESSION['apellido']))
{ include_once("../users/user-check2.php"); }
FechayHora();
$todoBien="N";

if($idnivel>=4)
{
 echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."cuentas/cuentas.php>";
 exit();
}

if(!isset($mobile))
{ $mobile="N"; }

//if($mobile=="S" or $tablet=="S")
if($mobile=="S")
{
 echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."mobile/index.php>";
 exit();
}
else
{
 include("../includes/leftbar.php");
?>

 <div class="mainContent" id="content">
   <div class="ui grid">
    <div class="sixteen wide column">
      <?php
       include("sub-menu.php");
       if($VerVentas=="S")
       { include("$dirRoot"."data/marquee.php");  }
      ?>
    </div>
    <div class="four wide column">
       <h2 class="menu-label">Nuevo Usuario</h2>
    </div>
    <div class="twelve wide column">
      <?php
       include("./usuarios-abc1.php");
      ?>
    </div>
    <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">

      <form class='ui form' action='usuario-nuevo2.php' method='POST' id='submitForm'>
       <div class="ui stackable grid" style="background-color: #2f50c1;color: #d9e6fd;border-radius:15px;">
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
       <button class="ui button pink" type="submit">Enviar Datos</button>
       <button class="ui button" type="reset">Limpiar Campos</button>
      <br><br>
      </form>

     </div>
     <div class="three wide tablet only three wide computer only column sidebar" id="sidebar">

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

<?php
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
