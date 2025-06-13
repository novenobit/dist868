<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  coemnta-ver.php                                                         //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$topFile="N";
$headFile="N";
$topAdmin="N";
$findData="S";
$tabs="S";
$table="S";
$whiteBackground="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
//FechayHora();
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['modalId']))
{ $modalId=$_GET['modalId']; }
if(!isset($modalId))
{ $modalId=""; }
FechayHora();
$todoBien="N";
if(!isset($op))
{ $op="lp"; }
$num=0;
$ves=1;

// --------------------------------------------
if(!isset($areasSistema))
{
 include_once("../bots/AreasSistema.php");
}
if($AreaProductos<>"S" and $AreaAdmin<>"S")
{
  $error="No Tienes Permiso de Usar Esta Seccion";
  error();
  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."users/usersection.php>";
  exit();
}
// --------------------------------------------
$numFilas=0;
$sql=mysqli_query($conex1,"select * from comentarios where id='$id'");
$numFilas=mysqli_num_rows($sql);
if($numFilas>0)
{
  while($comentaData=mysqli_fetch_array($sql))
  {
     $id=$comentaData['id'];
     $nombre=$comentaData['nombre'];
     $email=$comentaData['email'];
     $celular=$comentaData['celular'];
     $dia=$comentaData['dia'];
     $mes=$comentaData['mes'];
     $ano=$comentaData['ano'];
     $hora=$comentaData['hora'];
     $mensaje=$comentaData['mensaje'];

     if($comentaData['email']<>"")
     { $mail=" &#124; ".$comentaData['email']; }
     if(!isset($dir))
     { $dir=""; }
     if(!isset($tel))
     { $tel=""; }
     $numCuentas=0;
     if($email<>"")
     {
      $numCliente=0;
      $sqlCliente="select cid_cliente,nom_cliente from clientes where email_cliente='$email'";
      $resultCliente=mysqli_query($conex1,$sqlCliente);
      $numCliente=mysqli_num_rows($resultCliente);
      if($numCliente>0)
      {
        $clienteData=mysqli_fetch_array($resultCliente);
        $cid_cliente=$clienteData['cid_cliente'];
        $sqlCliente="select id_cuenta from cuentas1 where cid_cliente='$cid_cliente'";
        $sqlCuentas2=mysqli_query($conex1,$sqlCliente);
        $numCuentas=mysqli_num_rows($sqlCuentas2);
      }
     }
     echo "De: $nombre
     <br>Correo: $email
     <br>Celular: $celular
     <br>Fecha: $dia-$mes
     <br>Mensaje: $mensaje";

  }
}
// ---------------------------------------
if($numFilas==0)
{
  $boxColorH="cardColor";
  $boxTitle="Nada Aqu&iacute;";
  $boxData="<p>No Hay Datos Para Esta Fecha .....</p>";
  $boxColor="white";
  $boxFoot="";
  $boxColorF="";
  include("$dirRoot"."data/boxData.php");
}

if(isset($sql))
{ mysqli_free_result($sql); }
?>

