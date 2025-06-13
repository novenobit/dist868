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
    <h2>Importar las Marcas de los Productos</h2>
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
$conex1=mysqli_connect($DBhost, $DBuser, $DBpass) or die("NO se pudo realizar la conexi&oacute;n");
$db_selected1=mysqli_select_db($conex1,$DBase1);
// ----------------------------
$fileD868="nombre-marcas.csv";
if(!file_exists("../docs/$fileD868")) {
 echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
 echo "<html><meta http-equiv=refresh content=6;url=right-menu.php>";
 exit();
}
$fileOpenD868=fopen("../docs/$fileD868", 'r');
if($fileOpenD868 !== FALSE)
{
 while(($dataD868 = fgetcsv($fileOpenD868, 200, '|')) !== FALSE)
 {
   $cod_marca=$dataD868[0];
   $nom_marca=$dataD868[1];
 // ---------------------
   $num_filas=0;
   $result=mysqli_query($conex1,"select id from  marcas where cod_marca='$cod_marca'");
   $num_filas=mysqli_num_rows($result);
   if($num_filas==0)
   {
    $query2="insert into marcas(cod_marca,nom_marca)
    values('$cod_marca',  '$nom_marca')";
    echo "<br>    $query2";
    $result2=mysqli_query($conex1,$query2);
   }
 } // end DoWhile
}
fclose($fileOpenD868);
?>
