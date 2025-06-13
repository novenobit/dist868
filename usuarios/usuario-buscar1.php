<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  productos.php                                                           //
//  Copyright (c) 2023 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
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
$forms="S";
$breadCrumb="S";
$findData="S";
$popup="S";
$dropdown="S";
$topAdmin="S";
$autoCliente="S";
$whiteBackground="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
FechayHora();
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['op2']))
{ $op2=$_GET['op2']; }
if(!isset($op))
{ $op="lp"; }
if(!isset($op2))
{ $op2="lis"; }

if(isset($_POST['buscar']))
{ $buscar=$_POST['buscar']; }
if(isset($_POST['dondebuscar']))
{ $dondebuscar=$_POST['dondebuscar']; }
?>

<div class="ui container">
 <?php include("sub-menu.php"); ?>
</div>

<div class="ui padded grid">
 <div class="three wide tablet only three wide computer only column sidebar" id="sidebar">
   <?php
    include("left-menu.php");
   ?>
 </div>
 <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">
   <?php
     if(!isset($_POST['buscar']) or $_POST['buscar']=="")
     {
      $error="No indico lo que voy a buscar";
      error();
      exit();
     }
     if(!isset($_POST['dondebuscar']) or $_POST['dondebuscar']=="")
     {
      $error="No indico lo que voy a buscar";
      error();
      exit();
     }
     if($dondebuscar=="nombre")
     {
      $titleBuscar="Nombre";
      $campoBuscar1="nombre";
      $sqlDataCliente="select * from usuarios where $campoBuscar1 like '$buscar%' order by nompre";
     }
     if($dondebuscar=="rifcid")
     { $titleBuscar="RIF/CI";
      $campoBuscar="cid_cliente";
      $sqlDataCliente="select * from usuarios where $campoBuscar='$buscar'";
     }
     if($dondebuscar=="ultimos")
     { $titleBuscar="Ultimos 20";
      $sqlDataCliente="select * from usuarios order by id_cliente desc limit 20";
     }
     if($dondebuscar=="tel1")
     { $titleBuscar="Telefono/Celular";
      $campoBuscar="tel1_cliente";
      $sqlDataCliente="select * from usuarios where $campoBuscar='$buscar%' order by nom_cliente";
     }
     $titlePage="Buscar: $buscar > $titleBuscar";
   ?>

   <div class="ui grid">
    <div class="ten wide column">
     <?php
      include("usuarios-list-abc.php");
      if(!isset($codCat))
      { $codCat=""; }
      if(!isset($codSubCat))
      { $codSubCat=""; }
      echo "$titlePage";
     ?>
    </div>

    <div class="six wide right aligned column">
      <a class="ui animated button" tabindex="0" href='javascript:history.back(1)'>
       <div class="visible content">Retornar</div>
       <div class="hidden content">
         <i class="left arrow icon"></i>
       </div>
      </a>
    </div>

   </div>
   <?php
    $numFilas=0;
    $sqlCliente=mysqli_query($conex1,$sqlDataCliente);
    $numFilas=mysqli_num_rows($sqlCliente);
    if($numFilas<>0)
    {
      include("cliente-buscar2.php");
    }
    else
    {
?>
      <div class='ui warning message'>
        <div class='header'>
          No Hay Datos
        </div>
        Puede Agregar este Cliente <a href='cliente-nuevo1.php'>Nuevo</a>
      </div>
<?php
    }
?>

 </div>
</div>

<?php
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
