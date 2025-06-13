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
//-------------------------------------------

if(isset($id_cuenta) and $id_cuenta<>"")
{ include("$dirRoot"."bots/find-cuenta1.php"); }

?>
<div class="ui blue message">
  <div class="header">
    Pasos Compleatado
  </div>
</div>

<div class="ui yellow message">Preparado / Chequeado / Despachado</div>

<?php
 echo "<form class='ui form' action='pasos2.php?id_cuenta=$id_cuenta' method='POST'>";

  echo "<input type='hidden' name='id_cuenta' value='$id_cuenta'>";
  echo "<table class='ui unstackable celled selectable table' style='width:100%;background-color:#fff;color:#000;'>";
   echo "<tr>
   <td>Preparado</td><td>";
    if(isset($preparado) and $preparado=="S")
    {
     echo "<input type=radio checked value='S' name='preparado'> SI &nbsp; <input type=radio value='N' name='preparado'> NO";
    }
    else
    {
     echo "<input type=radio name='preparado'> SI &nbsp; <input type=radio checked value='N'  name='preparado'> NO";
    }
   echo "</td></tr>";
   echo "<tr>
   <td>Chequeado</td><td>";
    if(isset($chequeado) and $chequeado=="S")
    {
     echo "<input type=radio checked value='S' name='chequeado'> SI &nbsp; <input type=radio value='N' name='chequeado'> NO";
    }
    else
    {
     echo "<input type=radio name='chequeado'> SI &nbsp; <input type=radio checked value='N'  name='chequeado'> NO";
    }
   echo "</td></tr>";
   echo "<tr>
   <td>Despachado</td><td>";
    if(isset($despachado) and $despachado=="S")
    {
     echo "<input type=radio checked value='S' name='despachado'> SI &nbsp; <input type=radio value='N' name='despachado'> NO";
    }
    else
    {
     echo "<input type=radio name='despachado'> SI &nbsp; <input type=radio checked value='N'  name='despachado'> NO";
    }
   echo "</td></tr>";
  echo "</table>";

?>
  <div class="ui grid">
    <div class="sixteen wide column">
      <input class="ui blue button" type='submit' value='Enviar Datos'>
      <input class="ui button" type='reset' value='Limpiar Campos'>
    </div>
  </div>
<?php echo "</form>"; ?>


