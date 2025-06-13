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

if(isset($_GET['nom']))
{ $nom="$_GET[nom]"; }
if(isset($_POST['nom']))
{ $nom="$_POST[nom]"; }
if(isset($_POST['returnTo']))
{ $returnTo="$_POST[returnTo]"; }
if(!isset($returnTo))
{
 $returnTo="FindImagesNotDataBase";
}

$filename=$nom;
//$filename=basename($filename);
$baseName=substr($filename,0, -4);
$ext=substr($filename,-3);

$fileList = glob("../imagenes/productos/*");
?>

<div class="ui grid">
 <div class="sixten wide column"><h3>Eliminar</h3></div>
</div>

<div class="ui floating message">
 <?php
   if($nom<>"")
   {
    // $unlink="../imagenes/productos/$filename";
    if($baseName<>"sinfoto" and $baseName<>"sinfoto2" and $baseName<>"index")
    { unlink("../imagenes/productos/$filename"); }
    if (!file_exists("../imagenes/productos/$filename"))
    {
       echo "<h2 class='font-red'>Operacion Existosa</h2>";
       echo "<html><meta http-equiv=refresh content=2;url=blank.php?fileToRun=$$returnTo>";
    }
    else
    {
     echo "<h2 class='font-red'>Error No Se Borro</h2>";
    }
   }
   else
   {
    echo "<h2 class='font-red'>Error de Datos</h2>";
   }
 ?>
</div>
