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
$dia=date("d");
$mes=date("m");
$ano=date("Y");
$amfm=date("a");
$submitted="$dia/$mes/$ano";
$cod_empresa="supermariche";
$cambio="24.48";
?>

<h1>Revisa Copia y Cambia el Nombre de los Productos Fotos</h1>

<?php
$numFilas=0;
$sqldata="select * from productos";
$sql=mysqli_query($conex1,"$sqldata");
while($proData=mysqli_fetch_array($sql))
{
 $id_producto=$proData['id_producto'];
 $cod_producto=$proData['cod_producto'];
 $nom_producto=$proData['nom_producto'];
 $codigo_barra=trim($proData['codigo_barra']);
 $fotoProducto=$proData['foto_producto'];
 if($fotoProducto<>"")
 {
  if(file_exists("../imagenes/productos/$fotoProducto"))
  {
   echo "<br>$nom_producto &#124; $codigo_barra &#124; ";
   $baseName=substr($fotoProducto,0, -4);
   if($codigo_barra<>$baseName)
   {
     $path_parts=pathinfo("../imagenes/productos/$fotoProducto");
     $extenxion=$path_parts['extension'];
     $newName="$codigo_barra.$extenxion";
     echo "<font color=red>$codigo_barra $fotoProducto</font> &#124; $newName";
     //echo "<img src='../../imagenes/supermariche/$fotoProducto'>";
     //rename("../../imagenes/supermariche/$fotoProducto", "../../imagenes/supermariche/$newName");
     copy("../imagenes/productos/$fotoProducto", "../imagenes/productos/$newName");
     $numFilas++;
     if(file_exists("../imagenes/productos/$newName"))
     {
      $query="update productos set foto_producto='$newName' where id_producto='$id_producto'";
      $result1=mysqli_query($conex1,$query);
     }
   }
  }
 }
}
?>
</div>
<?php
echo "<h1>Total Cambios: $numFilas</h1>";
if($numFilas>0)
{ exit(); }
?>
<html><meta http-equiv=refresh content=4;url=index.php>
