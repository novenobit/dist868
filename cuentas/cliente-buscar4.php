<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  cliente-buscar4.php                                                     //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$autoCliente="S";
$topFile="N";
$headFile="N";
$topAdmin="N";
$findData="S";
$dirRoot="../";
$autoPro="S";
$dropdown="S";
$findData="S";
$forms="S";
$header="S";
$label="S";
$menu="S";
$message="S";
$icon="S";
$image="S";
$input="S";
$item="S";
$loadPage="S";
$popup="S";
$table="S";
$tabs="S";
include_once("../includes/headfileFrame.php");
//-------------------------------------------
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

if(isset($_GET['dondebuscar']))
{ $dondebuscar="$_GET[dondebuscar]"; }
if(isset($_POST['dondebuscar']))
{ $dondebuscar="$_POST[dondebuscar]"; }
if(isset($_POST['buscar']))
{ $buscar="$_POST[buscar]"; }
$ves=1;
$bgcolor='#ffffff';
$ves=1;
if(isset($_GET['num2']))
{ $num2="$_GET[num2]"; }
$num2=0;
if(!isset($dia) and !isset($mes))
{ FechayHora(); }

if(empty($dondebuscar) or empty($buscar))
{
    $error="falta los datos<br>del Cliente como Nombre CI o Rif";
    error();
    exit();
}
else
{
  if($dondebuscar=="rif_cliente")
  { echo "<span class='font-14 font-bold'>Bucar Cliente por: CI/RIF $buscar</span>";
    $query1="select * from clientes where cid_cliente like '%$buscar%'";
  }
  if($dondebuscar=="nom_cliente")
  { echo "<span class='font-14 font-bold'>Bucar Cliente por: Nombre</span>";
    $query1="select * from clientes where nom_cliente like '%$buscar%'";
  }
  if($dondebuscar=="tel_cliente")
  { echo "<span class='font-14 font-bold'Bucar Cliente por: Telefono</span>";
    $query1="select * from clientes where tel1_cliente like '%$buscar%'";
  }
  $num_filas1=0;
  $num_filas2=0;
  $sqlBC1=mysqli_query($conex1,$query1);
  $num_filas1=mysqli_num_rows($sqlBC1);
  if($num_filas1>=1)
  {
   echo "<table class='ui table'>
    <tr>
     <td class='center aligned'>
      CID/RIF
     </td>
     <td class='center aligned'>
       Nombre del Cliente
     </td>
     <td class='center aligned'>
       Num
     </td>
     <td class='right aligned'>
       Ventas
     </td>
     <td class='center aligned'>
       Fecha
     </td>
    </tr>";
    while($clienteData=mysqli_fetch_array($sqlBC1))
    {
     $fecha="";
     $Tventas=0;
     $num=0;
     $sql2=mysqli_query($conex1,"select monto_apagar,dia,mes,ano from $dbVentasRes where cid_cliente='{$clienteData['cid_cliente']}'");
     while($ventasData=mysqli_fetch_array($sql2))
     { $Tventas=$Tventas+$ventasData['monto_apagar'];
       $num++;
       $fecha="{$ventasData['dia']}/{$ventasData['mes']}/{$ventasData['ano']}";
     }
     if($num==0)
     { $num=""; }
     $cid=$clienteData['cid_cliente'];
     $nom=$clienteData['nom_cliente'];
     $dir="";
     if($clienteData['dir1_cliente']<>"")
     { $dir=" / ".$clienteData['dir1_cliente']; }
     $tel="";
     if($clienteData['tel1_cliente']<>"")
     { $tel=" / ".$clienteData['tel1_cliente']; }
     $mail="";
     if($clienteData['email_cliente']<>"")
     { $mail=" / ".$clienteData['email_cliente']; }
     $CliData="$nom $dir $tel $mail";
     echo "<tr>
      <td >
       <a data-inverted='' data-tooltip='$CliData' data-position='top left' href='../clientes/cliente-ver3.php?op=cl&id_cliente={$clienteData['id_cliente']}' target='data2'>{$clienteData['cid_cliente']}</a>
      </td>
      <td";
        if($areasSistema['EditaClientes']=="S")
        {
         if($mobile=="S")
         { echo "<a href='../clientes/cliente-ver3.php?op=cl&id_cliente={$clienteData['id_cliente']}&mobile=S'>{$clienteData['nom_cliente']}</a>"; }
         else
         { echo "<a data-inverted='' data-tooltip='$CliData' data-position='top left' href='../clientes/cliente-ver3.php?op=cl&id_cliente={$clienteData['id_cliente']}' target='data2'>{$clienteData['nom_cliente']}</a>"; }
        }
        else
        { echo "<a data-inverted='' data-tooltip='$CliData' data-position='top left' href='#'>{$clienteData['nom_cliente']}</a>"; }
      echo "</td>
      <td class=center aligned'>
       <span class='font-red'>$num</span>
      </td>";
      echo "<td class='right aligned'>
        ". number_format($Tventas,2,',', '.') . "
      </td>
      <td class='center aligned'>
        $fecha
      </td>";
     echo "</tr>";
    }
  }
  if(isset($sqlBC1))
  { mysqli_free_result($sqlBC1); }
}
?>
