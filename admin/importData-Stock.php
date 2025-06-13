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
$numCambios=0;
?>

<div class="ui grid">
  <div class="ten wide column">
    <h2>Importar Stock de Existencia de los Productos</h2>
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
$fileD868="productos-stock.csv";
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
   $codigo_barra=$dataD868[0];
   $stock_actual=$dataD868[1];
//-----------------------------------------------
   if($codigo_barra<>"")
   {
    $numFilas1=0;
    $sqlData=mysqli_query($conex1, "select id_producto,nom_producto,stock_actual from productos where codigo_barra='$codigo_barra'");
    $numFilas1=mysqli_num_rows($sqlData);
    if($numFilas1>0)
    {
      $proData=mysqli_fetch_array($sqlData);
      $id=$proData['id_producto'];
      $nom_producto=$proData['nom_producto'];
      $Pstock_actual=$proData['stock_actual'];
      echo "<br>$nom_producto &#124; $codigo_barra &#124; Antes: $Pstock_actual &#124; Ahora: $stock_actual";
      //-------------------------------------
      $activo="S";
      $submitted="$dia/$mes/$ano";
      //--------------------------
      $query2="update productos set stock_actual='$stock_actual' where id_producto='$id'";
      $result2=mysqli_query($conex1,$query2);
      $cambios="S";
      $numCambios++;
      $datos_cambio="Cambio de Stock";
      $num++;
    }
   }
 } // end DoWhile
}
fclose($fileOpenD868);
echo "<hr><br>Numero de Cambios: $numCambios<br><br>";
?>
<html><meta http-equiv=refresh content=10;url=right-menu.php>
