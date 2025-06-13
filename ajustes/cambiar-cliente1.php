<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
// cambiar-vendedor1.php                                                    //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$dropdown="S";
$findData="S";
$forms="S";
$header="N";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$menu="S";
$message="S";
$popup="N";
$rating="N";
$sidebar="N";
$table="S";
$topAdmin="S";
$dirRoot="../";
$tableUse="cuentas1";
include_once("../includes/headfileFrame.php");

FechayHora();
$todoBien="N";

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['sistema']))
{ $sistema=$_GET['sistema']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
//-------------------------------------------

if(isset($id_cuenta) and $id_cuenta<>"")
{
 if($sistema=="E")
 { include("$dirRoot"."bots/find-cuenta1.php"); }
 if($sistema=="V")
 { include("$dirRoot"."bots/find-pedido1.php"); }
}

if(isset($cid_cliente) and $cid_cliente<>"")
{ include("$dirRoot"."bots/bot-cliente.php"); }
?>

<div class="ui blue message">
 <div class="header">
  Cambio de Cliente
 </div>
</div>

<div class="ui container">
 <div class="ui yellow message">Cliente Actual:  <?php echo "{$clienteData['nom_cliente']}"; ?></div>
 <?php
  if(isset($id_cuenta) and $id_cuenta<>"")
  {
   echo "<form class='ui padded form' action='cambiar-cliente2.php?id_cuenta=$id_cuenta&sistema=$sistema' method='POST'>";
 ?>
    <div class="ui fluid card">
      <div class="content">
        <a class="header"> <?php echo "{$clienteData['nom_cliente']}"; ?></a>
        <div class="meta">
          <span class="date"><?php echo "{$clienteData['cid_cliente']}"; ?>
          <span class="date"><?php echo "{$clienteData['dir1_cliente']}"; ?></span>
        </div>
        <div class="description">
        <label><span class='font-red'>Cambiar Cliente</span></label>
        <select class='input' name='cid_cliente'>
          <?php
            $sqlCC=mysqli_query($conex1,"select id_cliente,cid_cliente,nom_cliente from clientes order by nom_cliente");
            while($nuevoData=mysqli_fetch_array($sqlCC))
            {
              $id_cliente=$nuevoData['id_cliente'];
              $cid_cliente=$nuevoData['cid_cliente'];
              $nom_cliente=$nuevoData['nom_cliente'];
              echo "<option value='$cid_cliente'>$nom_cliente</option>";
            }
          ?>
        </select>
        </div>
      </div>
    </div>
    <div class="extra content">
      <div class="ui grid">
        <div class="sixteen wide column">
          <input class="ui blue button" type='submit' value='Enviar Datos'>
          <input class="ui button" type='reset' value='Limpiar Campos'>
        </div>
      </div>
    </div>
  <?php
   echo "</form>";
  }
 ?>
</div>
