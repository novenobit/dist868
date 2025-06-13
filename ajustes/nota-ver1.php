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
if(isset($_GET['id_cuenta']))
{ $id_cuenta="$_GET[id_cuenta]"; }
if(isset($_GET['sistema']))
{ $sistema=$_GET['sistema']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }

if(isset($id_cuenta) and $id_cuenta<>"")
{
 if($sistema=="E")
 { include("$dirRoot"."bots/find-cuenta1.php"); }
 if($sistema=="V")
 { include("$dirRoot"."bots/find-pedido1.php"); }
}

?>

<div class="ui blue message">
  <div class="header">
    Notas de la Cuenta
  </div>
</div>
<form class='ui form' action='<?php echo "nota-ver2.php?id_cuenta=$id_cuenta&sistema=$sistema"; ?>' method='POST' enctype='multipart/form-data'>
 <div class="ui grid container">
  <div class="row">
   <div class="sixteen wide column">

      <div class="ui form">
        <div class="field">
          <label>Nota de Interes</label>
            <textarea style='resize:none' name='nota_venta' id='field2' rows='4'>
              <?php echo "{$cuentaData['nota_venta']}"; ?>
            </textarea>
        </div>
      </div>

   </div>
  </div>
  <div class="row">
   <div class="sixteen wide column">
     <button class="ui blue fluid button" type="submit"><i class="add icon"></i> Enviar</button>
   </div>
  </div>
 </div>
</form>
