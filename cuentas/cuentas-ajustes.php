<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  ajustes.php                                                            //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$aos="N";
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
$popupWindow="S";
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
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
if(isset($id_cuenta) and $id_cuenta<>"")
{ include_once("../bots/find-cuenta1.php"); }
?>

<div class="ui purple message" style="border-radius:25px;">
  <div class="header">
    Ajustes de Datos
  </div>
</div>
<br>

<div class='ui grid'>
  <div class='eight wide column'>

   <div class="card">
    <div class="description">
      <?php echo "<a class='fluid ui blue button' href='../ajustes/pasos1.php?sistema=E&id_cuenta=$id_cuenta'><i class='add icon'></i> Pasos Completo</a>"; ?>
    </div>
   </div>

  </div>
  <div class='eight wide column'>

   <div class="card">
    <div class="description">
      <?php echo "<a class='fluid ui purple button' href='../ajustes/descuento1.php?sistema=E&id_cuenta=$id_cuenta'><i class='add icon'></i> Descuento ( % )</a>"; ?>
    </div>
   </div>

  </div>
  <div class='eight wide column'>

   <div class="card">
    <div class="description">
        <?php echo "<a class='fluid ui purple button' href='../ajustes/cambiar-vendedor1.php?sistema=E&id_cuenta=$id_cuenta'><i class='add icon'></i> Cambiar Vendedor</a>"; ?>
    </div>
   </div>

  </div>
  <div class='eight wide column'>

   <div class="card">
    <div class="description">
        <?php echo "<a class='fluid ui purple button' href='../ajustes/cambiar-cliente1.php?sistema=E&id_cuenta=$id_cuenta'><i class='exchange alternate icon'></i> Cambio de Cliente</a>"; ?>
    </div>
   </div>

  </div>

  <div class='eight wide column'>
   <div class="card">
    <div class="description">
        <?php echo "<a class='fluid ui purple button' href=\"javascript:popup_center('despacho-printer.php?sistema=E&id_cuenta=$id_cuenta&winClose=S','960','740'); \"><i class='print icon'></i> Imprimir Orden</a>"; ?>
    </div>
   </div>
  </div>

  <div class='eight wide column'>
   <div class="card">
    <div class="description">
        <?php echo "<a class='fluid ui purple button' href='../ajustes/limpiar-cesta1.php?sistema=E&id_cuenta=$id_cuenta&op=B'><i class='add icon'></i> Limpiar la Cesta</a>"; ?>
    </div>
   </div>
  </div>

  <div class='eight wide column'>
   <div class="card">
    <div class="description">
        <?php echo "<a class='fluid ui red button' href='../ajustes/limpiar-cesta1.php?sistema=E&id_cuenta=$id_cuenta&op=all'><i class='add icon'></i> Borrar Todo</a>"; ?>
    </div>
   </div>
  </div>

  <div class='eight wide column'>
   <div class="card">
    <div class="description">
        <?php echo "<a class='fluid ui purple button' href='../ajustes/nota-ver1.php?sistema=E&id_cuenta=$id_cuenta'><i class='add icon'></i> Notas Extras</a>"; ?>
    </div>
   </div>
  </div>

  <div class='eight wide column'>
   <div class="card">
    <div class="description">
        <?php echo "<a class='fluid ui purple button' href='../ajustes/excel1.php?sistema=E&id_cuenta=$id_cuenta'><i class='add icon'></i> Export Excel</a>"; ?>
    </div>
   </div>
  </div>

  <div class='eight wide column'>
   <?php
    if($preparado=='S' and $chequeado=='S' and $despachado=='S')
    {
   ?>
  <div class='eight wide column'>
    <div class="card">
      <div class="description">
          <?php echo "<a class='fluid ui blue button' href='cerrar-cuenta.php?sistema=E&id_cuenta=$id_cuenta'><i class='add icon'></i> Cerrar la Cuenta</a>"; ?>
      </div>
    </div>
   </div>
   <?php
    }
   ?>

</div>
<br><br>

<?php
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
