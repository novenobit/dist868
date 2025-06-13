<?php
// ******************************************************** 2023 - 2017 ***
// SiAdVe4  System POS 4 Small Business                 //
// Copyright (c) 2023 NovenoBIT.com                                      //
// ************************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="S";
$icon="S";
$input="S";
$list="N";
$sidebar="S";
$table="S";
$message="S";
$popup="N";
$label="N";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="S";
$divider="S";
$forms="N";
$dropdown="S";
$breadCrumb="S";
$dirRoot="../";
include_once("../includes/config.ini.php");
include("usuarios-ver-top3.php");
include("$dirRoot"."bots/bot-usuario.php");
if(isset($usuarioData))
{
  $nextcli=$iduser+1;
  $befcli=$iduser-1;
  $idantes=$iduser-1;
  $idsiguiente=$iduser+1;
  if($idantes==0 or $idsiguiente==0)
  {$idantes=$num_rows;
   $idsiguiente=$num_rows;
  }
}
?>

<div class='w3-row'>
 <div class='w3-col w3-padding w3-round formButton s12 m12 l12'>
  <span class='font-18 font-bold w3-animate-left'>Edita los Datos del Usuario</span>
 </div>
</div>

<?php
 echo "<form class='w3-container w3-padding' action='../usuarios/usuarios-edit2.php?op=cl&iduser={$usuarioData['iduser']}' method='post'>";
 $cid_usuario=$usuarioData['cid_usuario'];
 $id_pais=$usuarioData['id_pais'];
 if(empty($id_pais))
 { $id_pais="ve"; }
 include("$dirRoot"."bots/bot-usuarios-ventas.php");
?>

 <div class='w3-row'>
  <div class='w3-col w3-padding s6 m6 l6'>
   <?php
   if($numventas==0)
   {
     echo "<label class='w3-label'>CI/RIF:</label>
     <input class='w3-input' type='text' name='cid_usuario' value='{$usuarioData['cid_usuario']}'>";
   }
   else
   {
     echo "<label class='w3-label w3-text-blue'>CI/RIF: <b>{$usuarioData['cid_usuario']}</b>:</label>";
   }
   ?>
  </div>
  <div class='w3-col w3-padding s6 m6 l6'>
   <?php
     echo "<label class='w3-label'>Nombre:</label>
     <input class='w3-input' type='text' name='nombre' value='{$usuarioData['nombre']}'>";
   ?>
  </div>

  <div class='w3-col w3-padding s6 m6 l6'>
   <?php
     echo "<label class='w3-label'>Tel&eacute;fono 1:</label>
     <input class='w3-input' type='text' name='email' value='{$usuarioData['email']}'>";
   ?>
  </div>
  <div class='w3-col w3-padding s6 m6 l6'>
   <?php
     echo "<label class='w3-label'>Tel&eacute;fono 2:</label>
     <input class='w3-input' type='text' name='celular' value='{$usuarioData['celular']}'>";
   ?>
  </div>

  <div class='w3-col w3-padding s6 m6 l6'>
   <?php
     echo "<label class='w3-label'>eMail:</label>
     <input class='w3-input' type='text' name='email' value='{$usuarioData['email']}'>";
   ?>
  </div>
 </div>

  <div class='w3-col w3-padding s6 m6 l6'>
   <div class='w3-border w3-white w3-padding'>
    <div class='w3-row'>
     <div class='w3-col s12 m12 l12'>
       <label class='w3-label'>Usuario Activo (S/N):</label>
     </div>
     <div class='w3-col s12 m12 l12'>
      <?php
       $activo=$usuarioData['activo'];
       if($activo=="S")
       { echo "<label class='rocker rocker-small'><input type='checkbox' name='activo' checked><span class='switch-left'>Si</span><span class='switch-right'>No</span>:</label>"; }
       else
       { echo "<label class='rocker rocker-small'><input type='checkbox' name='activo'><span class='switch-left'>Si</span><span class='switch-right'>No</span>:</label>"; }
      ?>
     </div>
    </div>
   </div>
  </div>
 </div>
 <div class='w3-row w3-padding-32'>
  <div class='w3-col w3-padding s12 m12 l12'>
    <input class="w3-button w3-round adminSend w3-border w3-hover-pink  w3-ripple" type="submit" value='Enviar Datos'>
    <input class="w3-button w3-round adminSend w3-border w3-hover-pink w3-ripple" type ="reset" value='Limpiar Campos'>
  </div>
 </div>
<br><br>
 </form>
</div>

<br><br><br>
<?php
if(!isset($mobile))
{ $mobile="N"; }
if($mobile=="S")
{
 $sysNormalM="S";
 $sysCuentaM="N";
}
else
{
  $sysNormal="S";
  $sysCuenta="N";
}
$resizeFrame2="S";
include("$dirRoot"."includes/statusAdmin.php");
?>
