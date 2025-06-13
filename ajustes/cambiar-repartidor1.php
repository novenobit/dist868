<?php
// *******************************************************************
// Sistema Dist868                                                  //
// Copyright (c) 2023-2024 NovenoBIT.com                            //
// *******************************************************************
if(!isset($_SESSION))
 session_start();
if(!headers_sent())
{ header("Cache-Control: no-cache, must-revalidate");
 header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
}
ini_set("max_execution_time", "0");

// Variables to Activate
$subdir=2;
$dirLevel=2;
$jquery="S";
$jqueryTop="N";
$container="S";
//$prototype="S";

$topMenu="S";
$hover="S";
// $frame="S";
// $tabsMenu="S";
// $onlyData="S";
// $dataTables="S";
$showstatus="S";
$noFrame="S";
//$tableExit="S";
// $sistema="productos";
// $popup="S";
// $endPage="N";
$resizeFrame="S";
// $ChartJs="S";
include_once("../includes/config-top.php");
include("$dirTra"."includes/headfile.php");

if(isset($_GET['id_cuenta']))
{ $id_cuenta="$_GET[id_cuenta]"; }
if(isset($_GET['sistema']))
{ $sistema=$_GET['sistema']; }

 $sqlmesa=mysqli_query($conex1,"select * from delivery where id_cuenta='$id_cuenta'");
 $mesaData=mysqli_fetch_array($sqlmesa);
 $id_empleado="{$mesaData['id_empleado']}";
 $sqlemp=mysqli_query($conex1,"select nom_empleado, ape_empleado,sexo_empleado,id_tipoemp,foto_empleado from empleados where id_empleado='$id_empleado'");
 $repartidor=mysqli_fetch_array($sqlemp);
 $sqlCli=mysqli_query($conex1,"select nom_cliente from clientes where cid_cliente='{$mesaData['cid_cliente']}'");
 $cliente=mysqli_fetch_array($sqlCli);
 $tdheight='620';
?>

<div class='ui grid'>
  <div class='eight wide column'>
    <h2 class='font-24'>Asignar Repartidor</h2>
 </div>
 <div class='eight wide column'>
  <?php
   echo "Cuenta: $id_cuenta";
   ?>
 </div>
</div>
<div class='ui hidden divider'></div>
<div class='ui grid'>
  <div class='eight wide column'>
  <?php
   echo "<span class='$fontColorWB'>Cliente</span><br>{$cliente['nom_cliente']}";
   ?>
 </div>
 <div class='eight wide column'>
  <?php
   echo "<span class='$fontColorWB'>Repartidor Actual</span><br>{$repartidor['nom_empleado']} {$repartidor['ape_empleado']}";
   ?>
 </div>
</div>

<div class='ui hidden divider'></div>
<div class="three column row">
 <?php
   $sql=mysqli_query($conex1,"select id_empleado,cid_empleado,nom_empleado, ape_empleado,sexo_empleado,id_tipoemp,foto_empleado from empleados where id_empleado<>'$id_empleado'");
   while($repartidorData=mysqli_fetch_array($sql))
   {
     $mcid_empleado="{$repartidorData['cid_empleado']}";
     include("$dirRoot"."bots/AreasSistema.php");
     if($areasSistema2['ServirMesa']=="S" and $repartidorData['id_tipoemp']<>'1' )
     {
       $sqlTE=mysqli_query($conex1, "select tipo_empleado from tipodeempleados where id_tipoemp='{$repartidorData['id_tipoemp']}'");
       $TipoEmpleado=mysqli_fetch_array($sqlTE);
       $foto=$repartidorData['foto_empleado'];
       include("$dirRoot"."bots/FotoEmpleado.php");
       echo "<div class='column center aligned'>
        <a href='cambiar-repartidor2.php?id_cuenta=$id_cuenta&id={$repartidorData['id_empleado']}&sistema=D'>";
        //<img class='ui image  hvr-grow' src='$dirRoot"."imagenes/empleados/$fotosDir/$foto'><br>
        if(substr($foto,0,7)=="sinfoto" or $foto=="leslie.png")
        { echo "<img class='ui image' src='$dirRoot"."imagenes/empleados/$foto' style='height:80px;'>"; }
        else
        { echo "<img class='ui image' src='$dirRoot"."imagenes/empleados/$fotosDir/$foto' style='height:80px;'>"; }
        echo "<br>{$repartidorData['nom_empleado']} {$repartidorData['ape_empleado']}</a>
        <br>{$TipoEmpleado['tipo_empleado']}
       </div>";
     }
   }
 ?>
</div>

