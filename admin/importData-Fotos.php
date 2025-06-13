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
$cod_empresa="dist868";
$submitted="$dia/$mes/$ano";
?>

<div class="ui grid">
  <div class="ten wide column">
    <h2>Importar las Fotos de los Productos</h2>
    <div class="ui pink big message">
      <p>Esta Operacion puede Durar Varios Minutos
      <br>Te Aviso cuando estoy listo</p>
    </div>
  </div>
  <div class="six wide column">
   <?php include("../libs1/loader.php"); ?>
  </div>
</div>

<?php
$fileD868="productos-foto.csv";
if(!file_exists("../docs/$fileD868")) {
 echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
 echo "<html><meta http-equiv=refresh content=6;url=right-menu.php>";
 exit();
}
$fileOpenD868=fopen("../docs/$fileD868", 'r');
if($fileOpenD868 !== FALSE)
{
 while(($dataD868 = fgetcsv($fileOpenD868, 400, '|')) !== FALSE)
 {
 // Datos de la Hoja de Calculo --------------------------------
    $codigo_barra=$dataD868[0];
    $foto_producto=$dataD868[1];
 // Agregar Datos  -------------------------------------------
  if($foto_producto<>"" and $codigo_barra<>"")
  {
    $sql1=mysqli_query($conex1, "select foto_producto from productos where codigo_barra='$codigo_barra'");
    $numFilas=0;
    $numFilas=mysqli_num_rows($sql1);
    if($numFilas>0)
    {
      $proData=mysqli_fetch_array($sql1);
      if($foto_producto<>$proData['foto_producto'])
      {
       echo "<br>$codigo_barra &#124; $nom_producto &#124; $foto_producto ";
       $query2="update productos set foto_producto='$foto_producto' where codigo_barra='$codigo_barra'";
       $result2=mysqli_query($conex1,$query2);
       $todobien="S";
       $num++;
     }
    }
  }
 } // end DoWhile
}
echo "<br>".rand();
fclose($fileOpenD868);
if($num>0)
{ exit(); }
?>
<html><meta http-equiv=refresh content=4;url=url=database.php>
