<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  admin1.php                                                 //
// ****************************************************************
include_once("../includes/session.php");

$accordion="N";
$aos="N";
$autoPro="N";
$breadCrumb="N";
$divider="S";
$dropdown="S";
$forms="S";
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
$tabs="S";
$table="N";
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

if(isset($_POST['id']))
{ $id="$_POST[id]"; }
if(isset($_POST['nom']))
{ $nom="$_POST[nom]"; }
if(isset($_POST['nombre']))
{ $nombre="$_POST[nombre]"; }

$filename=$nombre;
$fileList = glob("../imagenes/productos/*");
if($nom<>"")
{
  $filename1=basename($nom);
  $baseName1=substr($nom,0, -4);
  $ext1=substr($nom,-3);
}
if($nombre<>"")
{
  $filename2=basename($nombre);
  $baseName2=substr($nombre,0, -4);
  $ext2=substr($nombre,-3);
}
?>

<div class="ui grid">
 <div class="sixten wide column"><h3>Cambiar Nombre</h3></div>
</div>

<div class="ui floating message">
 <?php
   echo "<p>Nombre Actual: $nom
   <br>Nuevo Nombre: $nombre</p>";
   if($nom<>"" and $nombre<>"")
   {
    $error="N";
    if($ext1=="")
    {
     echo "<h2 class='font-red'>Error en los Datos</h2> <p>Debe tener la una extension: $ext1";
     $error="S";
    }
    if($ext2=="")
    { echo "<h2 class='font-red'>Error en los Datos</h2> <p>Debe tener la una extension: $ext2";
      $error="S";
    }
    if($nombre=="")
    { echo "<h2 class='font-red'>Error en los Datos</h2> <p>Debe tener un Nombre Nuevo";
      $error="S";
    }
    if($ext1<>$ext2)
    { echo "<h2 class='font-red'>Error en los Datos</h2> <p>Debe tener la misma extension: $ext1 - $ext2";
      $error="S";
    }
    if($nom==$nombre)
    { echo "<h2 class='font-red'>Error en los Datos</h2> <p>No hay cambios en el nombre: $nom - $nombre";
      $error="S";
    }
    if($nombre<>"" and $ext1==$ext2 and $error=="N")
    {
      if($nom<>$nombre)
      {
        $query="update productos set foto_producto='$nombre' where id_producto='$id'";
        $result1=mysqli_query($conex1,$query);
        echo "<h2 class='font-red'>Operacion Existosa</h2>";
        echo "<html><meta http-equiv=refresh content=2;url=blank.php?fileToRun=FindImagesNotOnDisk1>";
      }
    }
   }
   else
   {
    echo "<h2 class='font-red'>Error en los Datos</h2>";
   }
 ?>
</div>
