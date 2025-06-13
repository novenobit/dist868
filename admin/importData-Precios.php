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
    <h2>Importar Precios de los Productos</h2>
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
$fileD868="productos-precios.csv";
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
   $precio1_producto=$dataD868[2];
   $precio2_producto=$dataD868[3];
   $precio3_producto=$dataD868[4];
   //$precio4_producto=$dataD868[5];
//-----------------------------------------------
   if($precio1_producto>0)
   { $precio1_producto = str_replace(',', '.', $precio1_producto); }
   if($precio2_producto>0)
   { $precio2_producto = str_replace(',', '.', $precio2_producto); }
   if($precio3_producto>0)
   { $precio3_producto = str_replace(',', '.', $precio3_producto); }
   //if($precio4_producto>0)
   //{ $precio4_producto = str_replace(',', '.', $precio4_producto); }

   if(!isset($precio1_producto) or $precio1_producto=="")
   { $precio1_producto="0.00"; }
   if(!isset($precio2_producto) or $precio2_producto=="")
   { $precio2_producto="0.00"; }
   if(!isset($precio3_producto) or $precio3_producto=="")
   { $precio3_producto="0.00"; }
   if(!isset($precio4_producto) or $precio4_producto=="")
   { $precio4_producto="0.00"; }
   if(!isset($empaque))
   { $empaque=""; }

   //$precio1_producto = intval($precio1_producto);
 // ---------------------
   // categoria 4 num 1015
   // sub-categoria 4 num 1014
   // 0 libre
   // num-producto 1015-1014-0-1
 // ---------------------
   if($codigo_barra<>"")
   {
    $numFilas1=0;
    $sqlData=mysqli_query($conex1, "select id_producto,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto,empaque,cambia_precio from productos where codigo_barra='$codigo_barra'");
    $numFilas1=mysqli_num_rows($sqlData);
    if($numFilas1>0)
    {
      $proData=mysqli_fetch_array($sqlData);
      $id=$proData['id_producto'];
      $nom_producto=$proData['nom_producto'];
      $Pprecio1_producto=$proData['precio1_producto'];
      $Pprecio2_producto=$proData['precio2_producto'];
      $Pprecio3_producto=$proData['precio3_producto'];
      $Pprecio4_producto=$proData['precio4_producto'];
      $Pempaque=$proData['empaque'];
      $cambia_precio=$proData['cambia_precio'];

      if(!isset($Pprecio1_producto))
      { $Pprecio1_producto="0.00"; }
      if(!isset($Pprecio2_producto) or $Pprecio2_producto=="")
      { $Pprecio2_producto="0.00"; }
      if(!isset($Pprecio3_producto) or $Pprecio3_producto=="")
      { $Pprecio3_producto="0.00"; }
      if(!isset($Pprecio4_producto) or $Pprecio4_producto=="")
      { $Pprecio4_producto="0.00"; }
      if(!isset($Pempaque))
      { $Pempaque=""; }

echo "<br>$nom_producto &#124; $codigo_barra &#124; $precio1_producto &#124; $precio2_producto &#124; $precio3_producto &#124; $precio4_producto &#124; $empaque";

      //-------------------------------------
      $activo="S";
      $submitted="$dia/$mes/$ano";
      //--------------------------
      if(isset($nom_producto) and $nom_producto>"")
      {
        if($proData['nom_producto']<>$nom_producto)
        {
          $query2="update productos set nom_producto='$nom_producto' where id_producto='$id'";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Nombre";
        }
      }
      //--------------------------
      if(isset($precio1_producto) and $precio1_producto>0)
      {
        if($proData['precio1_producto']<>$precio1_producto)
        {
          $query2="update productos set precio1_producto='$precio1_producto' where id_producto='$id'";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Precio1";
        }
      }
      //--------------------------
      if(isset($precio2_producto) and $precio2_producto>0)
      {
        if($proData['precio2_producto']<>$precio2_producto)
        {
        $query2="update productos set precio2_producto='$precio2_producto' where id_producto='$id'";
        $result2=mysqli_query($conex1,$query2);
        $cambios="S";
        $numCambios++;
        $datos_cambio="Cambio de Precio2";
        }
      }
      //--------------------------
      if(isset($precio3_producto) and $precio3_producto>0)
      {
       if($cambia_precio=="S")
       {
        if($proData['precio3_producto']<>$precio3_producto)
        {
          $query2="update productos set precio3_producto='$precio3_producto' where id_producto='$id'";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Precio3";
        }
       }
      }
      //--------------------------
      if(isset($precio4_producto) and $precio4_producto>0)
      {
       if($cambia_precio=="S")
       {
        if($proData['precio4_producto']<>$precio4_producto)
        {
          $query2="update productos set precio4_producto='$precio4_producto' where id_producto='$id'";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Precio4";
        }
       }
      }
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

      // -------------------------------------------------

    }  
   }
   $num++;
 } // end DoWhile
}
fclose($fileOpenD868);
echo "<hr><br>Numero de Cambios: $numCambios<br><br>";
?>
<html><meta http-equiv=refresh content=10;url=right-menu.php>
