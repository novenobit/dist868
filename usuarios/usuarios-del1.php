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
?>


  <h3>Borrar Usuario</h3>

<?php
include("usuarios-data.php");


$numventas=0;
$cid_usuario=$usuarioData['cid_usuario'];

 echo "<form class='w3-container w3-padding w3-border w3-round-large w3-white w3-text-blue w3-margin' action='../usuarios/usuarios-del2.php?op=del&iduser={$usuarioData['iduser']}&cid_usuario={$usuarioData['cid_usuario']}' method='post' enctype='multipart/form-data'>";
   include("$dirRoot"."bots/bot-usuarios-ventas.php");
   if($numventas==0)
   {
     echo "<input class='w3-button w3-border w3-red' type='submit' value=' Eliminar Usuario'>";
   }
   else
   {
     echo "<div class='w3-panel w3-red'><p>No Puedo Eliminar Este Usuario porque tiene varias Facturas a su Nombre</p></div>";
   }
   if($numventas<>0)
   {
     echo "<span class='font-black font-18 font-bold'>Puede Desactivarlo <a class='w3-button w3-round w3-blue' href=usuarios-del2.php?op=des&iduser={$usuarioData['iduser']}&cid_usuario={$usuarioData['cid_usuario']}>desactivar</a></span><br><br>";
   }
 echo "</form>";

 if($numventas<>0)
 {
  echo "<div class='w3-container'>";
    include("usuarios-ventas.php");
  echo "</div>";
 }
?>

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
include("$dirRoot"."includes/statusAdmin.php");
?>
