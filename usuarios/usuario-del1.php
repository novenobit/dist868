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
$findData="S";
$whiteBackground="S";
include_once("../includes/headfileFrame.php");
if(isset($_GET['iduser']))
{ $iduser="$_GET[iduser]"; }
if(isset($_GET['cid_usuario']))
{ $cid_usuario="$_GET[cid_usuario]"; }
include_once("../bots/bot-usuarios.php");
?>

<h3 class='font-red'>Borrar Usuario</h3>

<?php
include("usuario-data.php");
$cid_usuario=$usuarioData['cid_usuario'];
$numventas=0;
$sqlVentas=mysqli_query($conex1,"select monto_apagar from ventas where empleado='$cid_usuario'");
$numventas=mysqli_num_rows($sqlVentas);

echo "<form class='w3-container w3-padding w3-border w3-round-large w3-white w3-text-blue w3-margin' action='../usuarios/usuario-del2.php?op=del&iduser={$usuarioData['iduser']}&cid_usuario={$usuarioData['cid_usuario']}' method='post' enctype='multipart/form-data'>";
//   include("$dirRoot"."bots/bot-user-ventas.php");
   if($numventas==0)
   {
     echo "<input class='ui button red' type='submit' value=' Eliminar Usuario'>";
   }
   else
   {
     echo "<div class='red'><p>No Puedo Eliminar Este Usuario porque tiene varias Facturas a su Nombre</p></div>";
   }
   if($numventas<>0)
   {
     echo "<span class='font-black font-18 font-bold'>Puede Desactivarlo <a class='ui button blue' href=usuario-del2.php?op=des&iduser={$usuarioData['iduser']}&cid_usuario={$usuarioData['cid_usuario']}>desactivar</a></span><br><br>";
   }
 echo "</form>";

 if($numventas<>0)
 {
  echo "<div class='w3-container'>";
    // include("usuarios-ventas.php");
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
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
