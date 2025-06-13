<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-buscar1.php                                                         //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$accordion="N";
$aos="N";
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
$jQueryModal="N";
$label="S";
$list="N";
$tabs="S";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$popupWindow="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$table="S";
$topAdmin="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(!isset($iduser))
{ include_once("../users/user-check2.php"); }
if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

if($AreaProductos<>"S" or $idnivel>=4)
{
 echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."cuentas/cuentas.php>";
 exit();
}

//include("find-products.php");

if($AreaProductos=="S")
{
 FechayHora();
 $todoBien="N";
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
     //id_producto,nom_producto,codigo_barra,precio1_producto,precio2_producto,precio3_producto,precio4_producto,nom_unidad,empaque
     $sqldata="select id_producto,nom_producto,codigo_barra,precio1_producto,precio2_producto,precio3_producto,precio4_producto,nom_unidad,empaque from productos where $campoBuscar like '%$buscar%' and activo='S' order by nom_producto";
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
     $sqldata="select id_producto,nom_producto,codigo_barra,precio1_producto,precio2_producto,precio3_producto,precio4_producto,nom_unidad,empaque from productos where $campoBuscar='$buscar' and activo='S' order by nom_producto";
   }

   if($dondebuscar=="ultimos")
   { $titleBuscar="Ultimos 20";
     $sqldata="select id_producto,nom_producto,codigo_barra,precio1_producto,precio2_producto,precio3_producto,precio4_producto,nom_unidad,empaque from productos where activo='S' order by id_producto desc limit 20";
   }

   if($dondebuscar=="pais")
   { $titleBuscar="Pais Origen";
     $campoBuscar="paisorigen";
     $sqldata="select id_producto,nom_producto,codigo_barra,precio1_producto,precio2_producto,precio3_producto,precio4_producto,nom_unidad,empaque from productos where $campoBuscar='$buscar' and activo='S' order by nom_producto";
   }

   if($dondebuscar=="codbarra")
   { $titleBuscar="Codigo Barra";
     $campoBuscar="codigo_barra";
     if(is_numeric($buscar))
     { $buscar=trim($buscar); }
     $buscar=substr($buscar,0,14);
     $sqldata="select * from productos where $campoBuscar='$buscar' and activo='S'";
   }

   if($dondebuscar=="upcean")
   { $titleBuscar="Codigo UPC/EAN";
     $campoBuscar="cod_upcean";
     if(is_numeric($buscar))
     { $buscar=trim($buscar); }
     $buscar=substr($buscar,0,14);
     $sqldata="select * from productos where $campoBuscar='$buscar' and activo='S'";
   }

   $titlePage="Buscar $titleBuscar = $buscar ";
   ?>

   <div class="ui grid">
    <div class="ten wide column">
     <?php
      // include("productos-list-abc.php");
      if(!isset($codCat))
      { $codCat=""; }
      if(!isset($codSubCat))
      { $codSubCat=""; }
      echo "$titlePage / <a href='productos.php?proDataFoto=N&op2=$op2&codCat=$codCat&codSubCat=$codSubCat'>Texto</a> / <a href='productos.php?proDataFoto=S&op2=$op2&codCat=$codCat&codSubCat=$codSubCat'>Foto</a> ";
     ?>
    </div>
    <div class="six wide right aligned column">
     <a class="ui animated button" tabindex="0" href='#'>
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
        $codigo_barra=$buscar;
        // echo "<html><meta http-equiv=refresh content=0;url='producto-ver1.php?codigo_barra=$buscar'>";
        include("producto-ver2.php");
      }
      if($dondebuscar=="upcean")
      {
        $upcean=$buscar;
        include("producto-ver2.php");
      }
      if($dondebuscar=="nombre")
      {
        //$codigo_barra=$buscar;
        include("producto-data.php");
      }
      //if(!isset($proDataFoto))
      //{ $proDataFoto="N"; }
      //if($proDataFoto=="S")
      //{ include("productos-data-foto.php"); }
      //else
      //{ include("producto-data.php"); }
     }
     else
     {
      if($dondebuscar=="codbarra" and $CrearProductos=="S")
      {
        echo "<html><meta http-equiv=refresh content=0;url=producto-nuevo1.php?op=$op&codigo_barra=$buscar>";
      }
   ?>
      <div class='ui warning message'>
       <div class='header'>
         No Hay Datos
       </div>
       <?php
         if($CrearProductos=="S")
         {
          echo "Puede Agregar este Producto <a href='producto-nuevo1.php'>Nuevo</a>";
         }
       ?>
      </div>
   <?php
     }
   ?>

  </div>
 </div>
<?php
}
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
