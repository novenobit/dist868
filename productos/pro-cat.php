<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-cat-list.php                                                        //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$aos="N";
$autoPro="S";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$findData="S";
$forms="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$popup="N";
$popup="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$table="S";
$tabs="S";
$topAdmin="S";
$dirRoot="../";
$whiteBackground="S";
include_once("../includes/headfileFrame.php");
FechayHora();

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

if(isset($_GET['op2']))
{ $op2="$_GET[op2]"; }
$todoBien="N";
if(!isset($op2))
{ $op2="1"; }

if(isset($_GET['cod_categoria']))
{ $cod_categoria="$_GET[cod_categoria]"; }

if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }

if(!isset($op))
{ $op="lp"; }
if(!isset($op2))
{ $op2="lis"; }
if(isset($_GET['nomBuscar']))
{ $nomBuscar=$_GET['nomBuscar']; }

include("../includes/leftbar.php");
?>

<div class="mainContent">
 <div id="content">
  <div class="ui grid">
   <div class="sixteen wide column">
     <?php
      include("sub-menu.php");
      include("pro-cat-abc.php");
     ?>
   </div>
   <div class="sixteen wide column">

     <div class="ui top attached tabular menu">
      <a class="active item" data-tab="lista">Listado</a>
      <a class="item" data-tab="nuevo">Nuevo</a>
     </div>
     <div class="ui bottom attached tab segment" data-tab="lista">
      <h3>Categoria de Productos</h3>
      <?php
       include("pro-cat-list-data.php"); ?>
     </div>
     <div class="ui bottom attached active tab segment" data-tab="nuevo" style="background-color:#5b4ccc;color:#ffffff;border-radius:15px;padding:1em;">
        <div class="ui hidden divider"></div>
        <form class="ui form" action="pro-cat-list2.php?op2=add" method="post" enctype="multipart/form-data">
         <h3>Agrega Categoria</h3>
         <div class="field">
            <label><span class="font-white">Nombre</span></label>
           <input type="text" name="nom_categoria" placeholder="Nombre">
         </div>
         <div class="field">
            <label><span class="font-white">Foto/Imagen</span></label>
            <input type='file' name='foto_categoria'>
         </div>
         <div class="field">
             <label><span class="font-white">(Tama&ntilde;o Foto = <span class='font-yellow'>200x200px</span> del Tipo JPG o PNG)</span></label>
         </div>
         <button class="ui button" type="submit">Enviar</button>
        </form>
     </div>
     <div class="ui bottom attached tab segment" data-tab="abc"  style="background-color:#2d2f31;color:#bfc7c5;">
      <?php

      ?>
      <iframe src="blank2.php" height='500px'  width='100%' name='data3' frameborder='0' scrolling='auto' allowtransparency='true'></iframe>
     </div>
   </div>


   </div>
   <div class="six wide column">
     <iframe src='blank.php' height='700' width='100%' name='data2'  frameborder='0' scrolling='auto' allowtransparency='true' onload='resizeIframe(this)'></iframe>
    <div class="result text-center"></div>
   </div>
  </div>
 </div>
</div>

<?php
// $showStatus="N";
$subCatForm="S";
include("$dirRoot"."includes/statusAdmin.php");
?>
