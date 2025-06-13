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
?>


  <h3>Borrar Usuario</h3>

<?php
include("usuarios-data.php");


$numventas=0;
$cid_usuario=$usuarioData['cid_usuario'];

 echo "<form class='ui form' action='../users/usuarios-del2.php?op=del&iduser={$usuarioData['iduser']}&cid_usuario={$usuarioData['cid_usuario']}' method='post' enctype='multipart/form-data'>";
   include("$dirRoot"."bots/bot-usuarios-ventas.php");
   if($numventas==0)
   {
     echo "<input class='ui pink button' type='submit' value=' Eliminar Usuario'>";
   }
   else
   {
     echo "<div class='font-red'><p>No Puedo Eliminar Este Usuario porque tiene varias Facturas a su Nombre</p></div>";
   }
   if($numventas>0)
   {
     echo "<span class='font-black font-18 font-bold'>Puede Desactivarlo <a class='ui primary button' href=usuarios-del2.php?op=des&iduser={$usuarioData['iduser']}&cid_usuario={$usuarioData['cid_usuario']}>desactivar</a></span><br><br>";
   }
 echo "</form>";

 if($numventas>0)
 {
  echo "<div class='ui container'>";
    include("usuarios-ventas.php");
  echo "</div>";
 }
?>

<div class="ui hidden divider"></div>

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
include("$dirRoot"."includes/statusAdmin.php");
?>
