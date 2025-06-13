<?php
// ******************************************************** 2023 - 2017 ***
// SiAdVe4  System POS 4 Small Business                 //
// Copyright (c) 2023 NovenoBIT.com                                      //
// ************************************************************************
include_once("../includes/session.php");
$autoPro="N";
$cards="S";
$dropdown="S";
$findData="S";
$findData="S";
$forms="S";
$grid="S";
$header="S";
$headFile="N";
$icon="S";
$image="S";
$input="S";
$item="S";
$label="S";
$loadPage="S";
$menu="S";
$message="S";
$popup="S";
$table="S";
$tabs="S";
$topAdmin="N";
$topFile="N";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
include("$dirRoot"."bots/bot-cliente.php");
?>

<h3 class="font-red">Borrar Cliente</h3>
<?php
 include("cliente-data.php");
?>

<div class="ui red message">
 <?php
   $numventas=0;
   $cid_cliente=$clienteData['cid_cliente'];
   echo "<form class='ui form' action='../clientes/clientes-del2.php?op=del&id_cliente={$clienteData['id_cliente']}&cid_cliente={$clienteData['cid_cliente']}' method='post' enctype='multipart/form-data'>";
      include("$dirRoot"."bots/bot-clientes-ventas.php");
      if($numventas==0)
      {
        echo "<input class='ui red button' type='submit' value=' Eliminar Cliente'>";
      }
      else
      {
        echo "<div class='ui red message'><p>No Puedo Eliminar Este Cliente porque tiene varias Facturas a su Nombre</p></div>";
      }
      if($numventas<>0)
      {
        echo "<span class='ui button font-black font-18 font-bold'>Puede Desactivarlo <a class='w3-button w3-round w3-blue' href=clientes-del2.php?op=des&id_cliente={$clienteData['id_cliente']}&cid_cliente={$clienteData['cid_cliente']}>desactivar</a></span><br><br>";
      }
   echo "</form>";
 ?>
</div>

<?php
if($numventas<>0)
{
  // include("cliente-ventas.php");
}
?>
<br><br><br>
