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
<h1>Fotos En Disco Que No Estan En La Base De Datos</h1>
<table class="fixed-table">
<thead>
 <tr>
  <th style='background-color:#336699;color:#fff;text-align: center;'>Foto</th>
  <th style='background-color:#336699;color:#fff;text-align: center;'>Producto</th>
  <th style='background-color:#336699;color:#fff;text-align: center;'>CodigoBarra</th>
 </tr>
</thead>
<tbody>

<?php
$fileList = glob("../imagenes/productos/*");
foreach($fileList as $filename)
{
 if(is_file($filename))
 {
   $numFilas1=0;
   $numFilas2=0;
   $filename=basename($filename);
   $baseName=substr($filename,0, -4);
//Productos
// echo "<br>$baseName / $filename<br><img src='../imagenes/productos/$filename' style='width:100px'><br>select id_producto,codigo_barra,nom_producto,foto_producto from productos where codigo_barra='$baseName'";
   if($filename<>"")
   {
    $sql1=mysqli_query($conex1,"select id_producto,codigo_barra,nom_producto,foto_producto from productos where codigo_barra='$baseName'");
    $numFilas1=mysqli_num_rows($sql1);
    if($numFilas1>0)
    {
      $proData=mysqli_fetch_array($sql1);
      $id_producto=$proData['id_producto'];
      $codigo_barra=trim($proData['codigo_barra']);
      $nom_producto=$proData['nom_producto'];
      $foto_producto=$proData['foto_producto'];
      $codigoBarra=$codigo_barra;
      $nomProducto=$nom_producto;
      $fotoProducto=$foto_producto;
      if($fotoProducto=="")
      {
        echo "<tr>
         <td style='background-color:#FF0000;color:#000000;text-align: center;'>
          <img src='../imagenes/productos/$filename' style='width:100px'>
         </td>
         <td style='background-color:#FF0000;color:#000000;'>$nomProducto</td>
         <td style='background-color:#FF0000;color:#000000;text-align:center;'>$codigoBarra</td>
        </tr>";
        $query="update productos set foto_producto='$filename' where id_producto='$id_producto'";
        $result1=mysqli_query($conex1,$query);
        $num++;
      }
      if($fotoProducto=="ssssss")
      {
       echo "<tr>
        <td style='background-color:#ffffff;color:#000000;text-align:center;''>
         <img src='../imagenes/productos/$filename' style='width:100px'>
        </td>
        <td style='background-color:#ffffff;color:#000000;'>$nomProducto</td>
        <td style='background-color:#ffffff;color:#000000;text-align:center;'>$baseName</td>
       </tr>";
      }
    }
   }
 }
}
?>
</tbody></table>
</div>
<?php
echo "<h1>Total Fotos: $num Sin Datos: $num</h1>";
if($num>0)
{ exit(); }
?>
<html><meta http-equiv=refresh content=10;url=right-menu.php>
