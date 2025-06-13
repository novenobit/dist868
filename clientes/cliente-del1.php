<?php
// ******************************************************** 2023 - 2017 ***
// Sistema Dist868                 //
// Copyright (c) 2023-2025 NovenoBIT.com                                      //
// ************************************************************************
include_once("../includes/session.php");
$accordion="N";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$findData="S";
$forms="S";
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
$popupWindow="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$tag="S";
$table="S";
$topAdmin="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(isset($_GET['id']))
{ $id_cliente=$_GET['id']; }
include("$dirRoot"."bots/bot-cliente.php");
?>

<h2 class="font-red">Borrar Cliente</h2>
<div class="ui message">
<?php
 include("cliente-data1.php");
?>
</div>

<div class="ui red message">
 <?php
   $numventas=0;
   $cid_cliente=$clienteData['cid_cliente'];
   echo "<form class='ui form' action='cliente-del2.php?op=del&id_cliente={$clienteData['id_cliente']}&cid_cliente={$clienteData['cid_cliente']}' method='post' enctype='multipart/form-data'>";
      include("$dirRoot"."bots/bot-clientes-ventas.php");
      if($numventas==0)
      {
        echo "<input class='ui red button' type='submit' value=' Eliminar Cliente'>";
      }
      else
      {
        echo "<div class='ui red message'><p>No Puedo Eliminar Este Cliente porque tiene varias Facturas a su Nombre</p></div>";
      }
      if($numventas>0)
      {
        echo "<span class='ui button font-black font-18 font-bold'>Puede Desactivarlo <a class='ui primary button' href=cliente-del2.php?op=des&id_cliente={$clienteData['id_cliente']}&cid_cliente={$clienteData['cid_cliente']}>desactivar</a></span><br><br>";
      }
   echo "</form>";
 ?>
</div>

<?php
if($numventas>0)
{
  // include("cliente-ventas.php");
}
?>
<br><br><br>
