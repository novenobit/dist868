<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  lista-cuenta1.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$divider="S";
$findData="S";
$forms="N";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$menu="S";
$message="S";
$popup="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
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
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
?>

<div class="ui container">
 <?php include("sub-menu.php"); ?>
</div>

<div class="container is-fluid">
 <div class="columns">
  <div class="column is-3 ">
   <?php
    include("left-menu.php");
   ?>
  </div>
  <div class="column is-9">
    <h2 class="menu-label">Cuentas Abiertas</h2>
    <div class="box">
     <article class="media">
      <div class="media-left">
       <?php
        // Cuenta Data
        $sqlCuentas=mysqli_query($conex1,"select id_cuenta,cid_cliente,monto_apagar from cuentas1 where usuario='$usuario'");
        $cuentaData=mysqli_fetch_array($sqlCuentas);
        if(isset($cuentaData))
        { $cid_cliente=$cuentaData['cid_cliente']; }
        // Cliente Data
        $sqlCliente=mysqli_query($conex1,"select id_cliente,cid_cliente,nom_cliente,tel1_cliente,nivelprecio from clientes where cid_cliente='$cid_cliente'");
        $clienteData=mysqli_fetch_array($sqlCliente);
        if(isset($clienteData))
        {
         $id=$clienteData['id_cliente'];
         $cid_cliente=$clienteData['cid_cliente'];
         $nom_cliente=$clienteData['nom_cliente'];
         $tel1_cliente=$clienteData['tel1_cliente'];
         $nivelprecio=$clienteData['nivelprecio'];
         if($clienteData['nivelprecio']<>"")
         {
          $nivelprecio=$clienteData['nivelprecio'];
          if(!isset($nivelprecio) or $nivelprecio=="")
          { $nivelprecio=1; }
          include("$dirRoot"."datafiles/find-nivel-precios.php");
         }
         echo "<b>Cuenta:</b> RIF: $cid_cliente / <strong>$nom_cliente</strong>";
         if($tel1_cliente<>"")
         { echo " / $tel1_cliente"; }
         echo " / Nivel Precio: ".$nom_nivel;
        }
       ?>
      </div>
     </article>
    </div>
    <?php
     $numFilas=0;
     $sqlCuentas=mysqli_query($conex1,"select id_cuenta,monto_apagar from cuentas1 where usuario='$usuario' and cid_cliente='$cid_cliente'");
     //$cuentaData=mysqli_fetch_array($sqlCuentas);
     $numFilas=mysqli_num_rows($sqlCuentas);
     if($numFilas>0)
     {
       include("lista-cesta1.php");
     }
    ?>
  </div>
 </div>
</div>

<?php
 include("$dirRoot"."includes/statusAdmin.php");
?>
