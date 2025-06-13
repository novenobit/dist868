<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  usuarios.php                                                            //
//  Copyright (c) 2023 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$topFile="N";
$headFile="N";
$topAdmin="N";
$findData="S";
$tabs="S";
$table="S";
$whiteBackground="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
//FechayHora();
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['modalId']))
{ $modalId=$_GET['modalId']; }
if(!isset($modalId))
{ $modalId=""; }
FechayHora();
$todoBien="N";
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(!isset($op))
{ $op="lp"; }
if(isset($_GET['iduser']))
{ $iduser=$_GET['iduser']; }
if(isset($iduser) and $iduser<>"")
{ include("$dirRoot"."bots/bot-usuarios.php"); }
if(!isset($AreaSisUsuario))
{ include_once("$dirRoot"."bots/AreaSisUsuario.php"); }

$num=0;
$ves=1;
$title="Usuario";
//include("sub-menu.php");
//include("usuarios-abc1.php");
//-----------------------------------------------
//include("usuario-top.php");
?>

<div class="ui stackable grid">
  <div class="four wide column center aligned">

    <?php
      $foto="{$usuarioData['foto']}";
      if(!empty($foto))
      {
        echo "<img class='ui medium circular centered image' src='$dirRoot"."imagenes/people/{$usuarioData['foto']}'>";
      }
      else
      { echo "<img class='ui medium circular centered image' src='$dirRoot"."imagenes/people/patrick.png'><br>sin foto"; }
    ?>

  </div>
  <div class="twelve wide column">
   <div class="ui centered grid">
     <div class="sixteen wide tablet sixteen wide computer column">
       <div class="ui top attached tabular menu">
          <a class="ui white button active item" data-tab="Data" style="background-color:#fff;color:#000;">Usuario</a>
          <a class="ui white button item" data-tab="Areas" style="background-color:#fff;color:#000;">Areas</a>
       </div>
       <div class="ui bottom attached active tab segment" data-tab="Data">
            <?php
             //include("usuario-top.php");
             include("usuario-data.php");
            ?>
       </div>
       <div class="ui bottom attached tab segment" data-tab="Areas">
            <?php
             include("usuario-edit-ac.php");
            ?>
       </div>
     </div>
     <div class="sixteen wide tablet sixteen wide computer column">
       <?php
         //include("./left-menu.php");
       ?>
       <div class="description">
         <div class="result text-center"></div>
       </div>
      </div>
   </div>
  </div>
</div>

<?php
if(!isset($op))
{  $op=""; }
echo "<a class='ui blue button' href='usuario-edit1.php?op=edt&id=$iduser&iduser=$iduser' target='data2'>Edita</a>
<a class='ui blue button' href='usuario-del1.php?op=del&id=$iduser&iduser=$iduser' target='data2'>Borrar</a>
<a class='ui blue button' href='#'>Ventas</a>
<a class='ui blue button' href='#'>Graphs</a>
<a class='ui blue button' href='#' target='data2'>Buscar</a>";
?>

<p><div class="ui hidden divider"></div></p>
<p><div class="spaceSection"></div></p>

<br><br><br>
<?php
$endPage="S";
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
