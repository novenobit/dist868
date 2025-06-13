<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  menu.php                                                   //
// ****************************************************************
include_once("../includes/session.php");

$accordion="S";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$forms="N";
$header="N";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$loadPage="N";
$menu="N";
$message="S";
$modal="N";
$popup="N";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$tabs="N";
$table="S";
$topAdmin="N";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
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
?>

<table class="ui unstackable celled table">
 <thead>
  <tr>
    <th style="width:240px;">Operaci&oacute;n</th>
    <th>Descripci&oacute;n</th>
  </tr>
 </thead>
 <tbody>

<!-- Reportes -->
      <tr>
       <td style="width:240px;">
         <a class='fluid  ui violet button' href="../reportes/reporte.php">Area de Reportes</a>
       </td>
       <td>
         Reporte de Venta
       </td>
      </tr>
<!-- Muestra Archivos -->
      <tr>
       <td style="width:240px;">
             <a class='fluid  ui violet button' href="showFilesDoc.php">Muestra Archivos</a>
       </td>
       <td>
         Muestra los archivos del Directorio de Descargas
       </td>
      </tr>
<!-- UpLoad Files -->
      <tr>
       <td style="width:240px;">
          <a class='fluid  ui violet button' href="uploadfile1.php">Subir Archivos</a>
       </td>
       <td>
        Subir archivos del Directorio de Descargas
       </td>
      </tr>
<!-- Actuliza Respaldo Cesta con Clientes -->
      <tr>
       <td style="width:240px;">
          <a class='fluid  ui violet button' href="actualiza-clientes.php">Actuliza Presupuesto</a>
       </td>
       <td>
        Actuliza los Datos de Clientes con los Presupuestos.
       </td>
      </tr>
 <tbody>
</table>
<br><br>
<?php
$showStatus="N";
include("../includes/statusAdmin.php");
?>
