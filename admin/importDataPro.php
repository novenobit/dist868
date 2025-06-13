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
    <h2>Importar Productos</h2>
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
$fileD868="productos.csv";
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
   $cod_producto=trim($dataD868[0]);
   $codigo_barra=trim($dataD868[1]);
   $cod_upcean=$dataD868[2];
   $cod_categoria=$dataD868[3];
   $cod_subcategoria=$dataD868[4];
   $nom_producto=$dataD868[5];
   $pro_brevedato=$dataD868[6];
   $datos_producto=$dataD868[7];
   $cod_proveedor=$dataD868[8];
   $paisorigen=$dataD868[9];
   $brand_marca=$dataD868[10];
   $precio1_producto=$dataD868[11];
   $precio2_producto=$dataD868[12];
   $precio3_producto=$dataD868[13];
   $precio4_producto=$dataD868[14];
   $nom_unidad=$dataD868[15];
   $empaque=$dataD868[16];
   $foto_producto=$dataD868[17];
   if(isset($dataD868[8]))
   { $activo=$dataD868[18]; }
//-----------------------------------------------
   $nom_producto=htmlspecialchars($nom_producto, ENT_NOQUOTES, "UTF-8");
//-----------------------------------------------
   if(!isset($cod_producto))
   {
     $cod_subcategoria2=$cod_subcategoria."01";
     $cod_producto=$cod_subcategoria2;
   }
   if($precio1_producto>0)
   { $precio1_producto = str_replace(',', '.', $precio1_producto); }
   if($precio2_producto>0)
   { $precio2_producto = str_replace(',', '.', $precio2_producto); }
   if($precio3_producto>0)
   { $precio3_producto = str_replace(',', '.', $precio3_producto); }
   if($precio4_producto>0)
   { $precio4_producto = str_replace(',', '.', $precio4_producto); }

   if(isset($activo) and $activo<>"")
   {
   }
   else
   { $activo="S"; }

   //$precio1_producto = intval($precio1_producto);
   echo "<br>$cod_producto &#124; $cod_categoria &#124; $cod_subcategoria2 &#124; $cod_subcategoria &#124; $nom_producto &#124; $codigo_barra &#124; $datos_producto &#124; $nom_unidad &#124; $precio1_producto &#124; $activo";
 // ---------------------
   // categoria 4 num 1015
   // sub-categoria 4 num 1014
   // 0 libre
   // num-producto 1015-1014-0-1
 // ---------------------
   if($codigo_barra<>"" and $nom_producto<>"")
   {
    $numFilas1=0;
    $numFilas2=0;
    $sql1=mysqli_query($conex1, "select id_producto from productos where cod_producto='$codigo_barra' or codigo_barra='$codigo_barra'");
    $numFilas1=mysqli_num_rows($sql1);
    if($numFilas1==0 and $cod_producto<>"")
    {
     $sql2=mysqli_query($conex1, "select id_producto from productos where cod_producto='$cod_producto' or codigo_barra='$cod_producto'");
     $numFilas1=mysqli_num_rows($sql2);
    }
    if($numFilas1==0 and $numFilas2==0)
    {
      include("../datafiles/insertProductos.php");
      echo "<br>    $query2";
      //$cod_producto++;
      $todoBien="S";
      $numCambios++;
    }  
   }
 } // end DoWhile
}
fclose($fileOpenD868);
if($numCambios>0)
{
 echo "<hr><br>Numero de Cambios: $numCambios<br><br>";
 exit();
}
?>
<html><meta http-equiv=refresh content=10;url=right-menu.php>
