<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  cuentas.php                                                             //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$accordion="N";
$aos="N";
$autoPro="N";
$breadCrumb="S";
$divider="N";
$dropdown="S";
$findData="S";
$forms="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$jQueryModal="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$noFrame="S";
$popup="S";
$rating="N";
$sidebar="N";
$slick="N";
$swiper="N";
$table="S";
$topAdmin="S";
$tableUse="cuentas1";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(!isset($iduser))
{ include_once("$dirRoot"."users/user-check2.php"); }
if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

FechayHora();
$todoBien="N";
if(!isset($AreaCuentas))
{ $AreaCuentas="N"; }
if(!isset($CrearCuenta))
{ $CrearCuenta="N"; }
if(!isset($idnivel) or $idnivel=="")
{ $idnivel=4; }
if(isset($_SESSION['sistema']))
{ $sistem=$_SESSION['sistema']; }


if($CrearCuenta=="N" or $AreaCuentas=="N" or $idnivel>=4)
{ $sistema="c"; }

if($CrearCuenta=="S" or $AreaCuentas=="S")
{  $sistema="e"; }

// echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."cuentas/cuentas.php?sistema=$sistema>";
// exit();

if(isset($sistema) and $sistema<>"")
{
 if($sistema=="e" or $sistema=="v")
 { include("../includes/leftbar.php"); }
 if($sistema=="c" or $sistema=="o")
 { include("../includes/leftbar-clientes.php"); }

 FechayHora();
 if(isset($_GET['id']))
 { $id=$_GET['id']; }
 if(isset($_GET['op']))
 { $op=$_GET['op']; }
 if(isset($_GET['op2']))
 { $op2=$_GET['op2']; }
 if(isset($_GET['id_cuenta']))
 { $id_cuenta=$_GET['id_cuenta']; }
 if(isset($_GET['rand_num']))
 { $rand_num=$_GET['rand_num']; }
?>

 <div class="mainContent">
  <div id="content">
   <div class="ui grid">
    <div class="sixteen wide column">
      <?php
       include("sub-menu.php");
       include("productos-list-abc.php");
      ?>
    </div>
    <div class="ten wide column">
      <div class="ui grid">
       <div class="eight wide column">
          <h2 class="menu-label" style="color:#6a49fa;">Cuentas Abiertas</h2>
       </div>
       <div class="eight wide column" style="text-align:right;color:#6a49fa;">
         /Preparado /Chequeado /Despachado
       </div>
      </div>

       <?php
        $numFilas=0;
        if($idnivel<=1 or $AreaCuentas=="S")
        {
         if($filter<>"")
         { $sqlCuentas=mysqli_query($conex1,"select id_cuenta from cuentas1 where sistema='$filter'"); }
         else
         { $sqlCuentas=mysqli_query($conex1,"select id_cuenta from cuentas1"); }
        }
        else
        { $sqlCuentas=mysqli_query($conex1,"select id_cuenta from cuentas1 where usuario='$usuario'"); }
        //$cuentaData=mysqli_fetch_array($sqlCuentas);
        $numFilas=mysqli_num_rows($sqlCuentas);
        if($numFilas>0)
        {
          include("cuentas-lista2.php");
        }
        else
        {
         echo "<div class='ui purple message aligned center'>
          <h1>Todavia No Hay Datos</h1><p>Pisa el siguiente boton para crear una nueva cuenta.</p>";
          if($sistema=="e" or $sistema=="v")
          {
           echo "<a class='ui button pink' href='abrir-cuenta1.php?id=$iduser&sistema=$sistema' target='data2'>NuevaCuenta</a>";
          }
          if($sistema=="c" or $sistema=="o")
          {
           echo "<a class='ui button pink' href='abrir-cuenta2.php?id=$iduser&sistema=$sistema' target='data2'>NuevaCuenta</a>";
          }
         echo "</div>";
        }
       ?>

    </div>
    <div class="six wide column">
     <?php
      if($sistema=="e" or $_SESSION['idnivel']==1)
      {
     ?>
      <iframe src='cuentas-last.php' height='700' width='100%' name='data2'  frameborder='0' scrolling='auto' allowtransparency='true' onload='resizeIframe(this)'></iframe>
     <?php
      }
      else
      {
     ?>
      <h3>15 Ultimos Productos</h3>
      <iframe src='productos-last.php' height='700' width='100%' name='data2'  frameborder='0' scrolling='auto' allowtransparency='true' onload='resizeIframe(this)'></iframe>
     <?php
      }

     ?>
    </div>

   </div>
  </div>
 </div>

<?php
}

// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
