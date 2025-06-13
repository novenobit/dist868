<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  productos-nuevo2.php                                                    //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
$topAdmin="N";
$topFile="N";
$tableUse="cuentas1";
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libUsers.php");
include_once("$dirRoot"."libs1/libGeneral.php");
//include_once("../includes/headfileFrame.php");
// include_once("../libs1/loader.php");
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
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
if(!isset($areasSistema))
{
 include("$dirRoot"."bots/AreasSistema.php");
}
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
      $campoBuscar="nom_producto";
      $buscar = preg_replace("/=/", "=\"\"", $buscar);
      $buscar = preg_replace("/&quot;/", "&quot;\"", $buscar);
      $buscar=substr($buscar,0,20);
      $sqldata="select * from productos where $campoBuscar like '$buscar%' and activo='S' order by nom_producto";
     }
     if($dondebuscar=="precio")
     {
       if(!is_numeric($buscar))
       {
        $error="No es un valor Numerico; $buscar";
        error();
        exit();
       }
       $titleBuscar="Precio";
       $campoBuscar="precio1_producto";
       $sqldata="select * from productos where $campoBuscar='$buscar' and activo='S' order by nom_producto";
     }
     if($dondebuscar=="ultimos")
     { $titleBuscar="Ultimos 90";
       $sqldata="select * from productos where activo='S' order by id_producto desc limit 90";
     }
     if($dondebuscar=="pais")
     { $titleBuscar="Pais Origen";
       $campoBuscar="paisorigen";
       $sqldata="select * from productos where $campoBuscar='$buscar' and activo='S' order by nom_producto";
     }
     if($dondebuscar=="codbarra")
     { $titleBuscar="Codigo Barra";
       $campoBuscar="codigo_barra";
       // $buscar=trim($buscar);
       $buscar=substr($buscar,0,14);
       $sqldata="select * from productos where $campoBuscar='$buscar' and activo='S' order by nom_producto";
     }
     if($dondebuscar=="upcean")
     { $titleBuscar="Codigo UPC/EAN";
       $campoBuscar="cod_upcean";
       $buscar=substr($buscar,0,14);
       $sqldata="select * from productos where $campoBuscar='$buscar' and activo='S' order by nom_producto";
     }
     $titlePage="Buscar: $buscar > $titleBuscar";
   ?>

   <div class="ui grid">
    <div class="ten wide column">
     <?php
      include("productos-list-abc.php");
      if(!isset($codCat))
      { $codCat=""; }
      if(!isset($codSubCat))
      { $codSubCat=""; }
      echo "$titlePage / <a href='productos.php?proDataFoto=N&op2=$op2&codCat=$codCat&codSubCat=$codSubCat&sistema=$sistema'>Texto</a> / <a href='productos.php?proDataFoto=S&op2=$op2&codCat=$codCat&codSubCat=$codSubCat&sistema=$sistema'>Foto</a> ";
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
    $sqlPro=mysqli_query($conex1,"$sqldata");
    $numFilas=mysqli_num_rows($sqlPro);
    if($numFilas>0)
    {
     if($dondebuscar=="codbarra")
     {
       echo "<html><meta http-equiv=refresh content=0;url=producto-ver1.php?codigo_barra=$buscar&sistema=$sistema>";
       exit();
     }
     if(!isset($proDataFoto))
     { $proDataFoto="N"; }
     if($proDataFoto=="S")
     { include("productos-data-foto.php"); }
     else
     { include("producto-data.php"); }
    }
    else
    {
     if($dondebuscar=="codbarra")
     {
      echo "<html><meta http-equiv=refresh content=0;url=producto-nuevo1.php?op=$op&codigo_barra=$buscar&sistema=$sistema>";
     }
?>
      <div class='ui warning message'>
        <div class='header'>
          No Hay Datos
        </div>
        Puede Agregar este Producto <a href='producto-nuevo1.php?sistema=$sistema'>Nuevo</a>
      </div>
<?php
    }
?>

 </div>
</div>

<?php
//include("$dirRoot"."includes/statusAdmin.php");
?>
