<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  showFilesDoc.php                                           //
// ****************************************************************
include_once("../includes/session.php");

$accordion="N";
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
?>
<h2>Subir Archivos</h2>
<hr>
<?php

    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      printf('<b>%s</b>', $_SESSION['message']);
      unset($_SESSION['message']);
    }
  ?>
  <form class="ui form" method="POST" action="uploadfile2.php" enctype="multipart/form-data">
   <h3>Selecciona el Archivo a subir:</h3>
   <div class="ui file input">
     <input type="file" name="uploadedFile" />
   </div>
   <div class="field padded">
      <input class="ui blue button" type="submit" name="uploadBtn" value="SubirArchivo" />
   </div>
  </form>
<br><hr><br>
<a class="ui orange button" href="menu.php">
 <i class="left arrow icon"></i>
  Regresar
</a>
