<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  agrea-cesta5.php                                                        //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
$topAdmin="N";

$topFile="N";
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libUsers.php");
include_once("$dirRoot"."libs1/libGeneral.php");
//include_once("$dirRoot"."includes/headfileFrame.php");
include_once("$dirRoot"."libs1/loader.php");
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."index.php>";
  exit();
}

// Variables 1
if(isset($_POST['id']))
{ $id=$_POST['id']; }
if(isset($_POST['cod_producto']))
{ $cod_producto="$_POST[cod_producto]"; }
if(isset($_POST['id_producto']))
{ $id_producto="$_POST[id_producto]"; }
if(isset($_POST['codPro']))
{ $codPro=$_POST['codPro']; }
if(isset($_POST['id_cuenta']))
{ $id_cuenta="$_POST[id_cuenta]"; }
//if(isset($_POST['empaque']))
//{ $Mempaque="$_POST[empaque]"; }
if(isset($_POST['cantidad']))
{ $Mcantidad="$_POST[cantidad]"; }
if(isset($_POST['precio']))
{ $Mprecio="$_POST[precio]"; }

if(isset($_POST['precio2']))
{ $precio2="$_POST[precio2]"; }

if(isset($precio2) and $precio2>0)
{ $Mprecio=$precio2; }

if(isset($_POST['unidad']))
{ $Munidad="$_POST[unidad]"; }

if(isset($_GET['codCat']))
{ $codCat=$_GET['codCat']; }
if(isset($_POST['codSubCat']))
{ $codSubCat=$_POST['codSubCat']; }
if(isset($_GET['nivelprecio']))
{ $nivelprecio=$_GET['nivelprecio']; }

if(isset($Munidad) and $Munidad=="on")
{ $unidad="N";
  $Munidad="N";
  $bultos="S";
}
if(isset($Munidad) and $Munidad=="off")
{ $Munidad="S";
  $unidad="S";
  $bultos="N";
}
if(!isset($Munidad))
{ $Munidad="N"; }

if(isset($_POST['bultos']))
{ $bultos="$_POST[bultos]";
  if($bultos=="on")
  { $bultos="S";
    $Munidad="N";
  }
}
if(!isset($bultos))
{ $bultos="N";
  $Munidad="S";
  $empaque=1;
}

// start Testing
// echo "<br><font color='#fff'><br>";
if($Munidad=="S")
{
 //echo "<font color='#fff'>empaque Unidad S";
}
else
{
 // echo "<font color='#fff'>empaque Bultos S";
}

// end  Testing

// Variables 2
FechayHora();
$testData="N";
$Tcantidad=0;
$num_Cesta=0;
//$empaque=1;
$todoBien="N";
$submitted="$dia/$mes/$ano";
$linkpage="agrega-cesta4.php";

if(isset($codPro) or isset($id_producto))
{
 include("$dirRoot"."bots/find-cuenta1.php");
 include("$dirRoot"."bots/find-producto.php");
 include("$dirRoot"."bots/find-producto-pedido.php");

 //if($Mcantidad==0 and $num_Cesta>0)
 if($Mcantidad==0)
 {
    $sqldel="delete from cuentas2 where id_cuenta='$id_cuenta' and id_producto='$id_producto'";
    $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $sqldel. " . mysqli_error());
    $sql1="repair table cuentas2";
    $result2=mysqli_query($conex1,$sql1) or die ("$queryerror $query. " . mysqli_error());
    $Tcantidad=0;
    $todoBien="S";
 }
 else
 {

   if($bultos=="N")
   { $empaque=1; }
   if($num_Cesta>0)
   {
    if($Munidad=="S")
    {
      $Mempaque=1;
    }
    if($bultos=="S")
    { $Mempaque=$empaque; }

    // echo "<br><font color='#ffffff'>Product: unidad $unidad / empaque $empaque";
    // echo "<hr>PEDIDO: unidad $Munidad <br> Tcantidad $Tcantidad <br> Mcantidad $Mcantidad <br> Mempaque $Mempaque <br> bultos $bultos";
    if($Tcantidad>0)
    {
     // Update Cantidad/Price/Empaque Data
     $query="update cuentas2 set cantidad='$Mcantidad',empaque='$Mempaque' where id_cuenta='$id_cuenta' and id_producto='$id_producto'";
     $result=mysqli_query($conex1,$query) or die ("Error in query: $query. " . mysqli_error());
     if(isset($Mprecio) and $Mprecio>0 and $Mprecio<>$Tprecio_producto)
     {
       $query="update cuentas2 set precio_producto='$Mprecio' where id_cuenta='$id_cuenta' and id_producto='$id_producto'";
       $result=mysqli_query($conex1,$query) or die ("Error in query: $query. " . mysqli_error());
     }
     if($Mempaque==1 and $Munidad=="S")
     {
       $query="update cuentas2 set empaque='$Mempaque' where id_cuenta='$id_cuenta' and id_producto='$id_producto'";
       $result=mysqli_query($conex1,$query) or die ("Error in query: $query. " . mysqli_error());
     }
     if($Mempaque<>$empaque)
     {
       $query="update cuentas2 set empaque='$Mempaque' where id_cuenta='$id_cuenta' and id_producto='$id_producto'";
       $result=mysqli_query($conex1,$query) or die ("Error in query: $query. " . mysqli_error());
     }
    }
   }
   else
   {
     include("../datafiles/insert-cuentas2.php");
   }
   if($preparado=="S" or $chequeado=="S" or $despachado=="S")
   {
     $query="update cuentas1 set preparado='N',chequeado='N',despachado='N' where id_cuenta='$id_cuenta'";
     $result=mysqli_query($conex1,$query) or die ("Error in query: $query. " . mysqli_error());
   }
 }
}


// echo "<html><meta http-equiv=refresh content=0;url=agrega-cesta3.php?id_cuenta=$id_cuenta&idCat=$idCat&codCat=$codCat&codSubCat=$codSubCat>";
// window.parent.location = window.parent.location + '?parent-updated=true'
echo "<html><meta http-equiv=refresh content=0;url=agrega-cesta3.php?id_cuenta=$id_cuenta&codCat=$codCat&codSubCat=$codSubCat&nivelprecio=$nivelprecio&sistema=$sistema>";
exit();
?>

<script>
window.parent.location = window.parent.location
</script>
