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

$nombre="sin datos";
$apellido="sin datos";

if(isset($clienteData['vendedor']) and $clienteData['vendedor']<>"")
{
  $sqlVendedor=mysqli_query($conex1,"select iduser,cid_usuario,nombre,apellido from usuarios where cid_usuario='{$clienteData['vendedor']}'");
  $vendedorData=mysqli_fetch_array($sqlVendedor);
  if(isset($vendedorData))
  {
   $nombre=$vendedorData['nombre'];
   $apellido=$vendedorData['apellido'];
  }
}
?>

<div class="ui blue message">
 <div class="header">
  Cambio de Vendedor
 </div>
</div>

<div class="ui container">
 <div class="ui yellow message">Vendedor Actual:  <?php echo "$nombre $apellido"; ?></div>
 <?php
  if(isset($id_cuenta) and $id_cuenta<>"")
  {
   echo "<form class='ui padded form' action='cambiar-vendedor2.php?id_cuenta=$id_cuenta&sistema=$sistema&cliente={$clienteData['cid_cliente']}' method='POST'>";
 ?>
    <div class="ui fluid card">
      <div class="content">
        <a class="header"> <?php echo "$nombre $apellido"; ?></a>
        <div class="meta">
          <span class="date">Vendedor Actual</span>
        </div>
        <div class="description">
        <label><span class='font-blue'>Nuevo Vendedor</span></label>
        <select class='input' name='vendedor'>
          <?php
            $sqlTC=mysqli_query($conex1,"select iduser,cid_usuario,nombre,apellido from usuarios order by nombre");
            while($vendedorData=mysqli_fetch_array($sqlTC))
            {
              $iduser=$vendedorData['iduser'];
              $vendedor=$vendedorData['cid_usuario'];
              $nombre=$vendedorData['nombre'];
              $apellido=$vendedorData['apellido'];
              echo "<option value='$vendedor'>$nombre $apellido</option>";
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
