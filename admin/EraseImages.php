<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  admin1.php                                                 //
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
$num=0;
$num2=0;
$dia=date("d");
$mes=date("m");
$ano=date("Y");
$amfm=date("a");
$submitted="$dia/$mes/$ano";
$cod_empresa="supermariche";
?>

<div class="table-container">
<h2>Fotos No Existe en Disco</h2>
<table class="ui unstackable celled long scrolling table">
<thead>
 <tr>
  <th style="background-color:#F9690E;color:#ffffff;">Foto</th>
  <th style="background-color:#F9690E;color:#ffffff;">Producto</th>
  <th style="background-color:#F9690E;color:#ffffff;">Codigo</th>
 </tr>
</thead>
<tbody>
<?php
$fileList = glob("../imagenes/productos/*");
foreach($fileList as $filename)
{
 if(is_file($filename))
 {
   $numFilas=0;
   $filename=basename($filename);
//Productos
   if($filename<>"")
   {
    $sql1=mysqli_query($conex1,"select codigo_barra,nom_producto,foto_producto from productos where foto_producto='$filename'");
    $numFilas=mysqli_num_rows($sql1);
    if($numFilas>0)
    {
      $proData=mysqli_fetch_array($sql1);
      $codigo_barra=trim($proData['codigo_barra']);
      $nom_producto=$proData['nom_producto'];
      $foto_producto=$proData['foto_producto'];
//--------------------------------------------------
       echo "<tr>
         <td>
          <img src='../imagenes/productos/$foto_producto' style='width:100px'>
         </td>
         <td>$nom_producto</td>
         <td>$codigo_barra</td>
       </tr>";
       $num++;
    }
// Items
    if($numFilas==0)
    {
     $sql2=mysqli_query($conex1,"select codigo_barra,nom_item,foto_item from items where foto_item='$filename'");
     $numFilas=mysqli_num_rows($sql2);
     if($numFilas>0)
     {
      $itemData=mysqli_fetch_array($sql2);
      $codigo_barra=trim($itemData['codigo_barra']);
      $nom_item=$itemData['nom_item'];
      $foto_item=$itemData['foto_item'];
      echo "<tr>
       <td>
          <img src='../imagenes/productos/$foto_item' style='width:100px'>
         </td>
         <td>$nom_item</td>
         <td>$codigo_barra</td>
      </tr>";
      $num++;
     }
    }
    if($numFilas==0)
    {
       $baseName=substr($filename,0, -4);
       $sql1=mysqli_query($conex1,"select codigo_barra,nom_producto,foto_producto from productos where codigo_barra='$baseName'");
       $numFilas=mysqli_num_rows($sql1);
       if($numFilas>0)
       {
         $proData=mysqli_fetch_array($sql1);
         $codigo_barra=trim($proData['codigo_barra']);
         $nom_producto=$proData['nom_producto'];
         $foto_producto=$proData['foto_producto'];
   //--------------------------------------------------
          echo "<tr>
            <td>
             <img src='../imagenes/productos/$foto_producto' style='width:100px'>
            </td>
            <td>$nom_producto</td>
            <td>$codigo_barra</td>
          </tr>";
          $num++;
       }
    }
    if($numFilas==0)
    {
       echo "<tr>
         <td colspan=4>
          $filename
          <br><img src='../imagenes/productos/$filename' style='width:100px'>
          <br><a class='button' href='#'>Borrar</a>
         </td>
       </tr>";
       $num2++;
    }
   }
 }
}
?>
</tbody></table>
</div>
<?php
echo "<h1>Total Fotos: $num Sin Datos: $num2</h1>";
if($num>0)
{ exit(); }
?>
<br><br><br>
<html><meta http-equiv=refresh content=6;url=right-menu.php>
