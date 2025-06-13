<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  admin1.php                                                 //
// ****************************************************************
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
$label="N";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="S";
$divider="S";
$forms="N";
$dropdown="S";
$topAdmin="S";
$breadCrumb="S";
$dirRoot="../";
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
if(!isset($op))
{ $op="lp"; }
?>

<div class="ui container">
 <?php include("sub-menu.php"); ?>
</div>

<div class="ui padded grid">
 <div class="three wide tablet only three wide computer only column sidebar" id="sidebar">
   <?php
    include("../includes/left-menu.php");
   ?>
 </div>
 <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">

    <h2 class="menu-label">Administracion de Datos</h2>
    <?php
     $numFilas=0;
     $sqlNumVentas=mysqli_query($conex1,"select id_venta from ventas limit 100");
     $numFilas=mysqli_num_rows($sqlNumVentas);
     if($numFilas>0)
     {
     echo "$numFilas";
       //include("lista-cesta1.php");
     }
    ?>
   </div>
  </div>
 </div>
</div>

<?php
include("$dirRoot"."includes/statusAdmin.php");
?>
