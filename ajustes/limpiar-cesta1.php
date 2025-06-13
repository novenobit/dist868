<?php
// ******************************************************** 2006 - 2017 ***
// Sistema Dist868                 //
// Copyright (c) 2006 NovenoBIT.com                                      //
// ************************************************************************
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
if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta="$_GET[id_cuenta]"; }
if(isset($_GET['sistema']))
{ $sistema=$_GET['sistema']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }

if($op=="B")
{
?>
<div class="ui blue message">
  <div class="header">
    Limpiar la Cesta
  </div>
</div>
 <div class="ui grid container">
  <div class="row">
   <div class="sixteen wide column">
    <h3 class='font-white '>Se va a Borrar Todos los Datos de la Cesta.</h3>
    <p>Si esta seguro que quiere borrar los Datos, Pisa el siguiente boton</p>
   </div>
  </div>
  <div class="row">
   <div class="sixteen wide column">
     <?php echo "<a class='ui blue fluid button' href='limpiar-cesta2.php?id_cuenta=$id_cuenta&sistema=$sistema&op=B'><i class='erase icon'></i> Borrar la Cesta</button></a>"; ?>
   </div>
  </div>
 </div>
<?php
}
if($op=="all")
{
?>
<div class="ui blue message">
  <div class="header">
    Borrar Toda la Cuenta
  </div>
</div>
 <div class="ui grid container">
  <div class="row">
   <div class="sixteen wide column">
    <h3 class='font-white '>Se va a Borrar Todos los Datos de la Cuenta.</h3>
    <p>Si esta seguro que quiere borrar los Datos, Pisa el siguiente boton</p>
   </div>
  </div>
  <div class="row">
   <div class="sixteen wide column">
     <?php echo "<a class='ui blue fluid button' href='limpiar-cesta2.php?id_cuenta=$id_cuenta&sistema=$sistema&op=all'><i class='erase icon'></i> Borrar Toda la Cuenta</button></a>"; ?>
   </div>
  </div>
 </div>
<?php
}
?>
