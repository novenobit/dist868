
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
$popup="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$table="S";
$topAdmin="S";
$autoCliente="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
include("submenu-buscar.php");

if(!isset($iduser))
{ include_once("../users/user-check2.php"); }
if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

FechayHora();
$todoBien="N";

if(isset($_GET['sistema']))
{ $sistema=$_GET['sistema']; }
if(isset($_POST['sistema']))
{ $sistema=$_POST['sistema']; }
if(isset($_POST['buscar']))
{ $buscar=$_POST['buscar']; }
if(isset($_POST['dondebuscar']))
{ $dondebuscar=$_POST['dondebuscar']; }

if($AreaClientes=="N" and $idnivel>=4)
{
 echo "<html><meta http-equiv=refresh content=0;url=cuentas.php?sistema=$sistema>";
 exit();
}

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
          $campoBuscar="nom_cliente";
          $sqlDataCliente="select * from clientes where $campoBuscar like '$buscar%' order by nom_cliente";
        }
        if($dondebuscar=="rifcid")
        { $titleBuscar="RIF/CI";
          $campoBuscar="cid_cliente";
          $sqlDataCliente="select * from clientes where $campoBuscar='$buscar'";
        }
        if($dondebuscar=="ultimos")
        { $titleBuscar="Ultimos 20";
          $sqlDataCliente="select * from clientes order by id_cliente desc limit 20";
        }
        if($dondebuscar=="tel1")
        { $titleBuscar="Telefono/Celular";
          $campoBuscar="tel1_cliente";
          $sqlDataCliente="select * from clientes where $campoBuscar='$buscar%' order by nom_cliente";
        }
        $titlePage="Buscar: $buscar > $titleBuscar";


        $numFilas=0;
        $sqlCliente=mysqli_query($conex1,$sqlDataCliente);
        $numFilas=mysqli_num_rows($sqlCliente);
        if($numFilas>0)
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
            Puede Agregar este Cliente <a href='../clientes/cliente-nuevo1.php'>Nuevo</a>
          </div>
    <?php
        }


// $showStatus="N";
//include("$dirRoot"."includes/statusAdmin.php");
?>
