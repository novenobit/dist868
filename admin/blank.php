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
if(isset($_GET['id']))
{ $id="$_GET[id]"; }
if(isset($_GET['op']))
{ $op="$_GET[op]"; }
if(!isset($op))
{ $op=""; }
if(isset($_GET['fileToRun']))
{ $fileToRun="$_GET[fileToRun]"; }
if(!isset($fileToRun))
{ $fileToRun=""; }
//--------------------------------------
if($fileToRun=="CheckProPrice")
{ echo "<h1>Buscando los Precios de Productos</h1>"; }
if($fileToRun=="CheckProRepetidoCod")
{ echo "<h1>Buscando Datos Repetidos por Codigo de Producto</h1>"; }
if($fileToRun=="CheckProRepetidoCodBarra")
{ echo "<h1>Buscando Datos Repetidos por Codigo de Barra</h1>"; }
if($fileToRun=="CheckProdRepetido0")
{ echo "<h1>Buscando Datos Repetidos con Codigo 0 al inicio</h1>"; }
if($fileToRun=="fotosEnDiscoNoDataDase")
{ echo "<h1>Busca Fotos En Disco Que No Estan En La Base De Datos</h1>"; }
if($fileToRun=="FindImagesNotDataBase")
{ echo "<h1>Buscar Images En La Base De Datos Que No Estan En Disco</h1>"; }
if($fileToRun=="FindImagesNotDataBase2")
{ echo "<h1>Buscar Images En La Base De Datos Que No Estan En Disco 2</h1>"; }
if($fileToRun=="copyRenameProductosFotos")
{ echo "<h1>Copy Rename Productos Fotos</h1>"; }
if($fileToRun=="BorraImagenesNoExiste")
{ echo "<h1>Borra las Imagenes de Disco que no existe en la Base de Datos</h1>"; }
if($fileToRun=="FindImagesNotOnDisk1")
{ echo "<h1>No Esta la Foto en Disco</h1>"; }
if($fileToRun=="AllImagesOnDisk")
{ echo "<h1>Muestra Totas las Foto en Disco</h1>"; }
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
if($fileToRun=="CheckProPrice")
{
  echo "<html><meta http-equiv=refresh content=0;url=CheckProPrice.php>";
  exit();
}
if($fileToRun=="CheckProRepetidoCod")
{
  echo "<html><meta http-equiv=refresh content=0;url=CheckProRepetidoCod.php>";
  exit();
}
if($fileToRun=="CheckProRepetidoCodBarra")
{
  echo "<html><meta http-equiv=refresh content=0;url=CheckProRepetidoCodBarra.php>";
  exit();
}
if($fileToRun=="CheckProdRepetido0")
{
  echo "<html><meta http-equiv=refresh content=0;url=CheckProdRepetido0.php>";
  exit();
}
if($fileToRun=="fotosEnDiscoNoDataDase")
{ echo "<html><meta http-equiv=refresh content=0;url=fotosEnDiscoNoDataDase.php>";
  exit();
}

if($fileToRun=="FindImagesNotDataBase")
{ echo "<html><meta http-equiv=refresh content=0;url=FindImagesNotDataBase.php>";
  exit();
}
if($fileToRun=="FindImagesNotDataBase2")
{ echo "<html><meta http-equiv=refresh content=0;url=FindImagesNotDataBase2.php>";
  exit();
}
if($fileToRun=="copyRenameProductosFotos")
{ echo "<html><meta http-equiv=refresh content=0;url=copyRenameProductosFotos.php>";
  exit();
}
if($fileToRun=="BorraImagenesNoExiste")
{ echo "<html><meta http-equiv=refresh content=0;url=BorraImagenesNoExiste.php>";
  exit();
}
if($fileToRun=="FindImagesNotOnDisk1")
{ echo "<html><meta http-equiv=refresh content=0;url=FindImagesNotOnDisk1.php>";
  exit();
}
if($fileToRun=="AllImagesOnDisk")
{ echo "<html><meta http-equiv=refresh content=0;url=AllImagesOnDisk.php>";
  exit();
}

if($fileToRun=="")
{ echo "<html><meta http-equiv=refresh content=0;url=right-menu.php>";
  exit();
}
?>

<html><meta http-equiv=refresh content=4;url=right-menu.php>
