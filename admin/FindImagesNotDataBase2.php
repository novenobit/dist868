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
$numD=0;
$num2=0;
$dia=date("d");
$mes=date("m");
$ano=date("Y");
$amfm=date("a");
$submitted="$dia/$mes/$ano";
$cod_empresa="supermariche";
?>

<div class="table-container">
<h1>Busca Images que no esta en la DataBase de Productos</h1>
<?php
$fileList = glob("../imagenes/productos/*");
foreach($fileList as $filename)
{
 if(is_file($filename))
 {
   $numFilas1=0;
   $filename=basename($filename);
   $baseName=substr($filename,0, -4);
//Productos
   if($filename<>"")
   {
    $sql1=mysqli_query($conex1,"select codigo_barra,nom_producto,foto_producto from productos where codigo_barra='$baseName' or foto_producto='$filename'");
    $numFilas1=mysqli_num_rows($sql1);

    if($numFilas1==0)
    {
     echo "<br>$baseName //  ";
     $unlink="../imagenes/productos/$filename";
     echo " <font color=red>$unlink</font>";
     //if($baseName<>"sinfoto" and $baseName<>"sinfoto2" and $baseName<>"index")
     //{ unlink("../imagenes/productos/$filename"); }
     $numD++;
    }
   }
   $num++;
 }
}
?>
</div>
<?php
echo "<h1>Total Fotos: $num Sin Datos: $numD</h1>";
if($num>0)
{ exit(); }
?>
<br><br><br>
<html><meta http-equiv=refresh content=6;url=right-menu.php>
