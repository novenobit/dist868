<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  blank.php                                                //
// ****************************************************************
include_once("../includes/session.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Distribuidora 868 C.A</title>
<link rel="stylesheet" type="text/css" href="../libs2/css/style.css"/>
<style>
.parent {
display: grid;
grid-template-columns: repeat(2, 1fr);
grid-template-rows: 1fr;
grid-column-gap: 0px;
grid-row-gap: 0px;
}
</style>
</head>
<body id="top" style="background-color:#ffffff;color:#000;padding: 10px 20px 30px 40px;">

<?php
//--------------------------------------
if($fileToRun=="proMasVendido")
{ echo "<h1>Productos Mas Vendido</h1>"; }
?>

<div class="parent">
 <div class="ten wide column">
   <img src='../imagenes/otros/clock-watch.gif' >
 </div>
 <div class="six wide column" style="line-height: 1.2;">
   <h3>Esta operaci&oacute;n puede tardar uno o varios minutos<br>Estoy Buscando los Datos<br>Espere un Momento<br><br>Te aviso cuando estoy listo ...<br><br><br><br></h3>
 </div>
</div>

<?php
//include_once("../libs1/loader.php");
if($fileToRun=="proMasVendido")
{
  echo "<html><meta http-equiv=refresh content=0;url=proMasVendido.php>";
  exit();
}

if($fileToRun=="")
{ echo "<html><meta http-equiv=refresh content=0;url=reportes.php>";
  exit();
}
?>

<html><meta http-equiv=refresh content=4;url=reportes.php>
