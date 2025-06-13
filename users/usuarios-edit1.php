<?php
// ******************************************************** 2023 - 2017 ***
// Sistema Dist868                 //
// Copyright (c) 2023-2025 NovenoBIT.com                                      //
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
$label="S";
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

<div class='ui grid'>
  <div class='sixteen wide column'>
   <span class='font-18 font-bold'>Edita los Datos del Usuario</span>
 </div>
</div>

<?php
 echo "<form class='ui form' action='../users/usuarios-edit2.php?op=cl&iduser={$usuarioData['iduser']}' method='post'>";
 $cid_usuario=$usuarioData['cid_usuario'];
 $id_pais=$usuarioData['id_pais'];
 if(empty($id_pais))
 { $id_pais="ve"; }
 include("$dirRoot"."bots/bot-usuarios-ventas.php");
?>

 <div class='ui grid'>
  <div class='eight wide column'>
   <?php
   if($numventas==0)
   {
     echo "<label class='label'>CI/RIF:</label>
     <input class='ui input' type='text' name='cid_usuario' value='{$usuarioData['cid_usuario']}'>";
   }
   else
   {
     echo "<label class='label'>CI/RIF: <b>{$usuarioData['cid_usuario']}</b>:</label>";
   }
   ?>
  </div>
  <div class='eight wide column'>
   <?php
     echo "<label class='label'>Nombre:</label>
     <input class='ui input' type='text' name='nombre' value='{$usuarioData['nombre']}'>";
   ?>
  </div>

  <div class='eight wide column'>
   <?php
     echo "<label class='label'>Tel&eacute;fono 1:</label>
     <input class='ui input' type='text' name='email' value='{$usuarioData['email']}'>";
   ?>
  </div>
  <div class='eight wide column'>
   <?php
     echo "<label class='label'>Tel&eacute;fono 2:</label>
     <input class='ui input' type='text' name='celular' value='{$usuarioData['celular']}'>";
   ?>
  </div>

  <div class='eight wide column'>
   <?php
     echo "<label class='label'>eMail:</label>
     <input class='ui input' type='text' name='email' value='{$usuarioData['email']}'>";
   ?>
  </div>
 </div>
 <div class='eight wide column'>

    <div class='ui grid'>
     <div class='sixteen wide column'>
       <label class='label'>Usuario Activo (S/N):</label>
     </div>
     <div class='sixteen wide column'>
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
 <div class='ui grid'>
  <div class='sixteen wide column'>
    <input class="ui pink button" type="submit" value='Enviar Datos'>
    <input class="ui button" type ="reset" value='Limpiar Campos'>
  </div>
 </div>

 </form>
</div>

<br><br><br>
<?php
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
