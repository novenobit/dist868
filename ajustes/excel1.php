<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  ajustes.php                                                            //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$aos="N";
$findData="S";
$forms="S";
$header="N";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$menu="S";
$message="S";
$popupWindow="S";
$rating="N";
$sidebar="N";
$table="S";
$topAdmin="S";
$dirRoot="../";
$tableUse="cuentas1";
include_once("../includes/headfileFrame.php");

FechayHora();
$todoBien="S";

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
if(isset($id_cuenta) and $id_cuenta<>"")
{ include_once("../bots/find-cuenta1.php"); }
$RifCliente=$cid_cliente;

if(isset($cid_cliente) and $cid_cliente<>"")
{
 $sqlCliente=mysqli_query($conex1,"select nom_cliente from clientes where cid_cliente='$cid_cliente'");
 $numFilas=mysqli_num_rows($sqlCliente);
 if($numFilas>0)
 {
  $clienteData=mysqli_fetch_array($sqlCliente);
  $Cliente=$clienteData['nom_cliente'];
 }
}
else
{
  $todoBien="N";
  echo "Error en los Datos";
  exit();
}
?>

<div class="ui purple message" style="border-radius:25px;">
  <div class="header">
    Export Excel Paso 1
  </div>
</div>

<?php
$filename="$cid_cliente-$id_cuenta-$dia$mes$ano.xls";
if($sistema=="c")
{
 $db1="cuentas1";
 $db2="cuentas2";
}
else
{
 $db1="pedido1";
 $db2="pedido2";
}
if(!isset($db1) or $db1=="")
{ $todoBien="N"; }

$num=0;
$Total1=0;
$Tcant=0;
$numFilas=0;
$Fecha="$dia/$mes/$ano";
$sqlpedido2=mysqli_query($conex1,"select * from $db2 where id_cuenta='$id_cuenta'");
$numFilas=mysqli_num_rows($sqlpedido2);

if($numFilas>0)
{
  while($pedido2Data=mysqli_fetch_array($sqlpedido2))
  {
    $id_cuenta=$pedido2Data['id_cuenta'];
    $Cuenta=$pedido2Data['id_cuenta'];
    $id_producto=$pedido2Data['id_producto'];
    $Cantidad=$pedido2Data['cantidad'];
    $Empaque=$pedido2Data['empaque'];
    $Precio=$pedido2Data['precio_producto'];
  // Find Oroducto
    $sqlPro=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto from productos where id_producto='$id_producto'");
    $proData=mysqli_fetch_array($sqlPro);
    if(isset($proData))
    {
        $id_producto=$proData['id_producto'];
        $Codigo=$proData['cod_producto'];
        $Producto=$proData['nom_producto'];
  //---------------------------------------------
        if(is_numeric($Empaque))
        { $Tcant=$Empaque*$Cantidad; }
        else
        { $Tcant=$Cantidad; }
        if($Tcant>0 and $Precio>0)
        {
          $Total1=$Tcant*$Precio;
          //Total1=Total1+$total;
        }
    }
    // Cesta Data
    // <td class='center aligned'>$num</td>
    $numFilas3=0;
    $sqlpedido3=mysqli_query($conex1,"select Cuenta from excel1 where RifCliente='$RifCliente' and Cuenta='$Cuenta' and Codigo='$Codigo'");
    $numFilas3=mysqli_num_rows($sqlpedido3);
    if($numFilas3==0)
    {
     $queryInsert2="insert into excel1(Cuenta,RifCliente,Cliente,Codigo,Producto,Cantidad,Empaque,Precio,Total1,Fecha)
     values('$Cuenta', '$RifCliente', '$Cliente', '$Codigo', '$Producto', '$Tcant', '$Empaque', '$Precio', '$Total1', '$Fecha')";
     //echo "<font color='#fff'> $query3";
     $result3=mysqli_query($conex1,$queryInsert2);
     $num++;
     //$reg++;
    }
  }
}

if($todoBien=="S")
{
 echo "<html><meta http-equiv=refresh content=0;url=excel2.php?id_cuenta=$id_cuenta>";
}

// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
