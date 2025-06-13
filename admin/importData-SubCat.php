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
?>

<div class="ui grid">
  <div class="ten wide column">
    <h2>Importar las SubCategoria de los Productos</h2>
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
$fileD868="subcategoria.csv";
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
     $id_subcategoria=$dataD868[0];
     $cod_subcategoria=$dataD868[1];
     $cod_categoria=$dataD868[2];
     $nom_subcategoria=$dataD868[3];
     $datos_subcategoria=$dataD868[4];
     $foto_subcategoria=$dataD868[5];
 // Agregar Datos  -------------------------------------------
     if(!isset($foto_subcategoria))
     { $foto_subcategoria=""; }
     if($foto_subcategoria=="Array")
     { $foto_subcategoria=""; }
     if(!isset($banner))
     { $banner=""; }
     if($banner=="Array")
     { $banner=""; }
     if(!isset($pedironline))
     { $pedironline=""; }
     if(!isset($datos_subcategoria))
     { $datos_subcategoria=""; }
     $numFilas=0;
     $sql3=mysqli_query($conex1, "select id_subcategoria from subcategoria where cod_subcategoria='$cod_subcategoria'");
     $numFilas=mysqli_num_rows($sql3);
     if($numFilas==0)
     {
       $query2="insert into subcategoria(cod_subcategoria, cod_categoria, nom_subcategoria, datos_subcategoria, foto_subcategoria)
       values('$cod_subcategoria', '$cod_categoria', '$nom_subcategoria', '$datos_subcategoria', '$foto_subcategoria')";
       $result2=mysqli_query($conex1,$query2);
       echo "<br>$query2";
       $num++;
     }
 } // end DoWhile
}
echo "<br>".rand();
fclose($fileOpenD868);
echo "<h1>Total Cambios: $num</h1>";
if($num>0)
{ exit(); }
?>

<html><meta http-equiv=refresh content=4;url=url=database.php>
