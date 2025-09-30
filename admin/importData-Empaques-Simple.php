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
   <h2>Importar Empaques Eimple de los Productos</h2>
   <div class="ui pink big  message">
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
$fileD868="productos-empaques-simple.csv";
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
   $empaque=$dataD868[1];
   $cambios="N";
//-----------------------------------------------
   if($codigo_barra<>"" and $empaque<>"")
   {
    $numFilas1=0;
    $sqlData=mysqli_query($conex1, "select id_producto,nom_producto,empaque from productos where codigo_barra='$codigo_barra'");
    $numFilas1=mysqli_num_rows($sqlData);
    if($numFilas1>0)
    {
      $proData=mysqli_fetch_array($sqlData);
      $id=$proData['id_producto'];
      $Pnom_producto=$proData['nom_producto'];
      $Pempaque=$proData['empaque'];

      if(!isset($Pempaque))
      { $Pempaque=""; }

      //-------------------------------------
      $activo="S";
      $submitted="$dia/$mes/$ano";
      //-------------------------------------
      if(isset($empaque) and $empaque<>"")
      {
        if($proData['empaque']<>$empaque)
        {
          $query2="update productos set empaque='$empaque' where id_producto='$id'";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Empaque";
        }
      }
      //-------------------------------------
      if($cambios=="S")
      {
        //echo "<br>NEW: $nom_producto &#124; $codigo_barra &#124; $nom_unidad &#124;  $empaque";
        echo "$id &#124; $Pnom_producto &#124; $codigo_barra &#124; $empaque";
        //echo "<br>Numero de Cambios: $numCambios";
        echo "<hr>";
      }
      //-------------------------------------
    }
   }
   $num++;
 } // end DoWhile
}

fclose($fileOpenD868);


if($numCambios>0)
{
?>
<div class="ui grid">
 <div class="eight wide column">
   <?php
    echo "<hr><br>Numero de Cambios: $numCambios";
   ?>
  </div>
  <div class="eight wide column">
   <a class="ui blue button" href="right-menu.php">
     <i class="left arrow icon"></i>
     Regresar
   </a>
  </div>
</div>
<?php
 exit();
}
?>

<html><meta http-equiv=refresh content=1;url=right-menu.php>
