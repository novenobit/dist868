<?php
// *******************************************************************
// Sistema Dist868                                                  //
// Copyright (c) 2023-2024 NovenoBIT.com                            //
// *******************************************************************
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
$dirRoot="../";
include_once("../includes/headfileFrame.php");

FechayHora();
$autoPro="S";

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

if(isset($_GET['nom_producto']))
{ $nom_producto=$_GET['nom_producto']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
if(isset($_GET['nom_producto']))
{ $nom_producto="$_GET[nom_producto]"; }
if(isset($_GET['proDataFoto']))
{ $proDataFoto="$_GET[proDataFoto]"; }

if(!isset($op))
{ $op="lp"; }
if(!isset($op2))
{ $op2="lis"; }
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
      if($op2=="lis")
      { $titlePage="Productos"; }
      if($op2=="nom")
      { $titlePage="Listado por Nombre"; }
      if($op2=="cod")
      { $titlePage="Listado por <b>Codigo</b>"; }
      if($op2=="cat")
      { $titlePage="<b>Categoria > $nom_categoria</b>"; }
      if($op2=="subcat")
      { $titlePage="<b>Sub-Categoria - $nom_subcategoria</b>"; }
   ?>
   <div class="ui grid">
    <div class="sixteen wide center aligned column">
      <?php
       include("productos-list-abc.php");
      ?>
    </div>
    <div class="eight wide column">
     <?php
      if(!isset($codCat))
      { $codCat=""; }
      if(!isset($codSubCat))
      { $codSubCat=""; }
      echo "<div class='ui pointing below blue label'>
       <i class='product hunt icon'></i><span class='font-16 font-bold'>$titlePage</span>
      </div>";
     ?>
    </div>
    <div class="four wide center aligned column">
     <?php
      echo "<a href='productos.php?proDataFoto=N&op2=$op2&codCat=$codCat&codSubCat=$codSubCat'>
       <div class='ui vertical animated button' tabindex='0'>
        <div class='hidden content'>Texto</div>
         <div class='visible content'>
         <i class='newspaper outline icon'></i>
        </div>
       </div>
      </a>";
      echo "<a href='productos.php?proDataFoto=S&op2=$op2&codCat=$codCat&codSubCat=$codSubCat'>
       <div class='ui vertical animated button' tabindex='0'>
        <div class='hidden content'>Imagen</div>
         <div class='visible content'>
         <i class='file image outline icon'></i>
        </div>
       </div>
      </a>";
     ?>
    </div>
    <div class="four wide right aligned column">
      <a class="ui animated button" tabindex="0" href='#'>
       <div class="visible content">Retornar</div>
       <div class="hidden content">
         <i class="left arrow icon"></i>
       </div>
      </a>
    </div>
   </div>
   <?php
//--------------------------------
//  include("productos-list.php");
    if(!isset($op2))
    { $op2="lis"; }
    if(!empty($nom_producto))
    { $refreshfile="productos-list.php?op=$op&op2=$op2&op2=$op2&nom_producto=$nom_producto"; }
    else
    { $refreshfile="productos-list.php?op=$op&op2=$op2&op2=$op2"; }

    //include("../includes/report-submenu.php");
    FlushData();
    //include("productos-list-abc.php");
    //echo "<br>";
    FlushData();
    $num=0;
    $num1=1;
   if(!isset($_GET['page']))
   { $page=1; }
   else
   { $page=$_GET['page']; }
   if(!isset($max_results))
   {  $max_results="50"; }
   $table="productos";
   $toreturn="productos.php";
   $from=(($page * $max_results) - $max_results);
   if(!isset($start)) $start=0;
   if($op2=="lis")
   { $sqldata="select * from productos where activo='S' order by nom_producto limit 2"; }
   if($op2=="nom")
   {
    if(!isset($nom_producto) or $nom_producto=="")
    { $nom_producto="A"; }
    $sqldata="select * from productos where nom_producto like '$nom_producto%' and activo='S' order by nom_producto limit 2";
   }
   if($op2=="cod")
   { $sqldata="select * from productos where activo='S' order by nom_producto limit 2"; }
   if($op2=="cat")
   { $sqldata="select * from productos where cod_categoria='$codCat' and activo='S' order by nom_producto limit 2"; }
   if($op2=="subcat")
   { $sqldata="select * from productos where cod_subcategoria='$codSubCat' and activo='S' order by nom_producto limit 2";

   if(!isset($proDataFoto))
   { $proDataFoto="N"; }}
 // ------------------------------------
  $numFilas=0;
  $sqlNumVentas=mysqli_query($conex1,"select id_producto from productos");
  $numFilas=mysqli_num_rows($sqlNumVentas);
  if($numFilas>0)
  {
   if($op2=="lis")
   { $sqldata="select * from productos where activo='S' order by nom_producto"; }
   if($op2=="nom")
   { $sqldata="select * from productos where nom_producto like '$nom_producto%' and activo='S' order by nom_producto"; }
   if($op2=="cod")
   { $sqldata="select * from productos where activo='S'order by nom_producto"; }
   if($op2=="cat")
   { $sqldata="select * from productos where cod_categoria='$codCat' and activo='S' order by nom_producto"; }
   if($op2=="subcat")
   { $sqldata="select * from productos where cod_subcategoria='$codSubCat' and activo='S' order by nom_producto"; }

   if(!isset($proDataFoto))
   { $proDataFoto="N"; }
   if($proDataFoto=="S")
   { include("productos-data-foto.php"); }
   else
   { include("producto-data.php"); }
  }
?>

 </div>
</div>

<?php
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
