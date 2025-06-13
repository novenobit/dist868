<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  clientes.php                                                             //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$accordion="S";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$findData="S";
$forms="S";
$grids="S";
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
$popupWindow="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$table="S";
$topAdmin="S";
$autoCliente="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(!isset($iduser))
{ include_once("../users/user-check2.php"); }
if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

FechayHora();
$todoBien="N";

if($AreaClientes=="N" or $idnivel>=4)
{
 echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."cuentas/cuentas.php>";
 exit();
}
else
{
 include("../includes/leftbar.php");
?>

 <div class="mainContent">
  <div id="content">
   <div class="ui grid">
    <div class="sixteen wide column">
       <?php
         include("sub-menu.php");
       ?>
    </div>
    <div class="ten wide column">
      <?php
        //include("clientes-list-abc1.php");
        $numFilas=0;
        $sqlNumVentas=mysqli_query($conex1,"select id_cliente from clientes");
        $numFilas=mysqli_num_rows($sqlNumVentas);
        if($numFilas>0)
        {
          // echo "$numFilas";
          include("clientes-list1.php");
        }
      ?>
    </div>
    <div class="six wide column">
      <iframe src='clientes-last.php' height='700' width='100%' name='data2'  frameborder='0' scrolling='auto' allowtransparency='true' onload='resizeIframe(this)'></iframe>
      <div class="mainContent">
       <div id="content"></div>
      </div>
    </div>
   </div>
  </div>
 </div>

<?php
}

// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
