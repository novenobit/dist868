<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  CheckProdRepetido.php                                     //
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
if(isset($_GET['op']))
{ $op="$_GET[op]"; }
if(!isset($op))
{ $op=""; }
// ----------------------------
$num=0;
$dia=date("d");
$mes=date("m");
$ano=date("Y");
$amfm=date("a");
$numCambios=0;
?>

<h2>Compare Data de ProductosLimpio con Produtos </h2>
<div class="ui grid">
<?php
$sqldata="select * from productoslimpio";
$sql=mysqli_query($conex1,"$sqldata");
while($proData=mysqli_fetch_array($sql))
{
 $Tid_producto=$proData['id_producto'];
 $Tcod_producto=$proData['cod_producto'];
 $Tcodigo_barra=$proData['codigo_barra'];
 $Tcod_upcean=$proData['cod_upcean'];
 $Tcod_categoria=$proData['cod_categoria'];
 $Tcod_subcategoria=$proData['cod_subcategoria'];
 $Tnom_producto=$proData['nom_producto'];
 $Tpro_brevedato=$proData['pro_brevedato'];
 $Tdatos_producto=$proData['datos_producto'];
 $Tcod_proveedor=$proData['cod_proveedor'];
 $Tpaisorigen=$proData['paisorigen'];
 $Tbrand_marca=$proData['brand_marca'];
 $Tprecio_compra=$proData['precio_compra'];
 $Tprecio1_producto=$proData['precio1_producto'];
 $Tprecio2_producto=$proData['precio2_producto'];
 $Tprecio3_producto=$proData['precio3_producto'];
 $Tprecio4_producto=$proData['precio4_producto'];
 $Tnom_unidad=$proData['nom_unidad'];
 $Tempaque=$proData['empaque'];
 $Tstock_actual=$proData['stock_actual'];
 $Tfoto_producto=$proData['foto_producto'];
 $Tespecial=$proData['especial'];
 $Tcambia_precio=$proData['cambia_precio'];
 $Tsubmitted=$proData['submitted'];
 $Testado=$proData['estado'];
 $Tactivo=$proData['activo'];

// ----------------------------------------

 if($Tcod_producto=="")
 {
  $Tcod_producto=$Tcodigo_barra;
  $query2="update productoslimpio set cod_producto='$Tcodigo_barra' where id_producto='$Tid_producto'";
  echo "<br><span class='font-red'>".$query2."</span>";
  $result2=mysqli_query($conex1,$query2);
  //echo "<br>".$query2;
  $cambios="S";
  $numCambios++;
  $datos_cambio="Cambio de codigo barra";
 }
 if($Tnom_producto<>"")
 {
  // ----------------------------------------
  $TempNom_producto=str_replace("'", "", $Tnom_producto);
  // ----------------------------------------
  $numFilas1=0;
  $sql2=mysqli_query($conex1, "select * from productos where nom_producto='$TempNom_producto'");
  $numFilas1=mysqli_num_rows($sql2);

  $numFilas3=0;
  $sql3=mysqli_query($conex1, "select id_producto from productos where codigo_barra='$Tcodigo_barra'");
  $numFilas3=mysqli_num_rows($sql3);

  if($numFilas1==0 and $numFilas3==0)
  {
   if(is_numeric($Tcodigo_barra) and strlen($Tcodigo_barra)>=8)
   {
    if($Tnom_producto<>"")
    {
      if($Tprecio1_producto>0 or $Tprecio2_producto>0)
      {
        $id_producto=$proData['id_producto'];
        $cod_producto=$proData['cod_producto'];
        $codigo_barra=$proData['codigo_barra'];
        $cod_upcean=$proData['cod_upcean'];
        $cod_categoria=$proData['cod_categoria'];
        $cod_subcategoria=$proData['cod_subcategoria'];
        $nom_producto=$proData['nom_producto'];
        $pro_brevedato=$proData['pro_brevedato'];
        $datos_producto=$proData['datos_producto'];
        $cod_proveedor=$proData['cod_proveedor'];
        $paisorigen=$proData['paisorigen'];
        $brand_marca=$proData['brand_marca'];
        $precio_compra=$proData['precio_compra'];
        $precio1_producto=$proData['precio1_producto'];
        $precio2_producto=$proData['precio2_producto'];
        $precio3_producto=$proData['precio3_producto'];
        $precio4_producto=$proData['precio4_producto'];
        $nom_unidad=$proData['nom_unidad'];
        $empaque=$proData['empaque'];
        $stock_actual=$proData['stock_actual'];
        $foto_producto=$proData['foto_producto'];
        $especial=$proData['especial'];
        $cambia_precio=$proData['cambia_precio'];
        $submitted=$proData['submitted'];
        $estado=$proData['estado'];
        $activo=$proData['activo'];
      echo "<div class='sixteen wide column'>";
        include("../datafiles/insertProductos.php");
      echo "<br><span class='font-red'>".$query2."</span>";
        //$cod_producto++;
        $todoBien="S";
        $numCambios++;
      echo "</div>";
      }
    }
   }
  }
  if($numFilas1>0)
  {
  // Data 1----------------------------------
    echo "<div class='sixteen wide column'>
      <strong>$Tid_producto) $Tnom_producto - $Tcodigo_barra</strong> - (".number_format($Tprecio1_producto,2,',', '.').") - (".number_format($Tprecio2_producto,2,',', '.').") - (".number_format($Tprecio3_producto,2,',', '.').") - (".number_format($Tprecio4_producto,2,',', '.').") - $Tfoto_producto";
      while($proData2=mysqli_fetch_array($sql2))
      {
        $id_producto=$proData2['id_producto'];
        $cod_producto=$proData2['cod_producto'];
        $codigo_barra=$proData2['codigo_barra'];
        $cod_upcean=$proData2['cod_upcean'];
        $cod_categoria=$proData2['cod_categoria'];
        $cod_subcategoria=$proData2['cod_subcategoria'];
        $nom_producto=$proData2['nom_producto'];
        $pro_brevedato=$proData2['pro_brevedato'];
        $datos_producto=$proData2['datos_producto'];
        $cod_proveedor=$proData2['cod_proveedor'];
        $paisorigen=$proData2['paisorigen'];
        $brand_marca=$proData2['brand_marca'];
        $precio_compra=$proData2['precio_compra'];
        $precio1_producto=$proData2['precio1_producto'];
        $precio2_producto=$proData2['precio2_producto'];
        $precio3_producto=$proData2['precio3_producto'];
        $precio4_producto=$proData2['precio4_producto'];
        $nom_unidad=$proData2['nom_unidad'];
        $empaque=$proData2['empaque'];
        $stock_actual=$proData2['stock_actual'];
        $foto_producto=$proData2['foto_producto'];
        $especial=$proData2['especial'];
        $cambia_precio=$proData2['cambia_precio'];
        $submitted=$proData2['submitted'];
        $estado=$proData2['estado'];
        $activo=$proData2['activo'];
    // Data 2----------------------------------
        echo "<br>{$proData2['id_producto']} - {$proData2['nom_producto']} - {$proData2['codigo_barra']} - ". number_format($Tprecio1_producto,2,',', '.') . " - ". number_format($Tprecio2_producto,2,',', '.') . " - ". number_format($Tprecio3_producto,2,',', '.') . " - ". number_format($Tprecio4_producto,2,',', '.') . " - $Tfoto_producto";
        $num++;
        //---------------------------------------------------------------
        if(isset($Tcod_producto) and $Tcod_producto<>"" and is_numeric($Tcod_producto))
        {
        if($cod_producto=="")
        {
          $query2="update productos set cod_producto='$Tcod_producto' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Codigo";
        }
        }
        //---------------------------------------------------------------
        if(isset($Tcodigo_barra) and $Tcodigo_barra<>"" and is_numeric($Tcodigo_barra))
        {
        if($codigo_barra=="")
        {
          $query2="update productos set codigo_barra='$Tcodigo_barra' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Codigo Barra";
        }
        }
        //---------------------------------------------------------------
        if($Tcod_upcean<>"" and is_numeric($Tcod_upcean))
        {
        if($cod_upcean=="")
        {
          $query2="update productos set cod_upcean='$Tcod_upcean' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de cod_upcean";
        }
        }
        //---------------------------------------------------------------
        if($Tcod_categoria<>"" and is_numeric($Tcod_categoria))
        {
        if($cod_categoria=="")
        {
          $query2="update productos set cod_categoria='$Tcod_categoria' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de cod_categoria";
        }
        }
        //---------------------------------------------------------------
        if($Tcod_subcategoria<>"" and is_numeric($Tcod_subcategoria))
        {
        if($cod_subcategoria=="")
        {
          $query2="update productos set cod_subcategoria='$Tcod_subcategoria' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de $cod_subcategoria";
        }
        }
        //---------------------------------------------------------------
        if($Tnom_producto<>"")
        {
        if($Tnom_producto<>$nom_producto)
        {
          $query2="update productos set nom_producto='$Tnom_producto' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          //$result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de nom_producto";
        }
        }
        //---------------------------------------------------------------
        $pro_brevedato=substr($pro_brevedato,0,100);
        $Tpro_brevedato=substr($Tpro_brevedato,0,100);
        if($Tpro_brevedato<>"")
        {
        if($pro_brevedato<>"")
        {
          //if($Tpro_brevedato<>$pro_brevedato)
          //{ $pro_brevedato=trim($pro_brevedato)." ".trim($Tpro_brevedato); }
        }
        if($pro_brevedato=="")
        { $pro_brevedato=$Tpro_brevedato; }
        $query2="update productos set pro_brevedato='$pro_brevedato' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
        $result2=mysqli_query($conex1,$query2);
        $cambios="S";
        $numCambios++;
        $datos_cambio="Cambio Breve Dato";
        }
        //---------------------------------------------------------------
        if($Tdatos_producto<>"")
        {
        if($datos_producto<>"")
        {
          if($Tdatos_producto<>$datos_producto)
          { $datos_producto="$datos_producto - $Tdatos_producto"; }
        }
        if($datos_producto=="")
        { $datos_producto=$Tdatos_producto; }
        $query2="update productos set datos_producto='$datos_producto' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
        $result2=mysqli_query($conex1,$query2);
        $cambios="S";
        $numCambios++;
        $datos_cambio="Cambio Datos";
        }
        //---------------------------------------------------------------
        if($Tcod_proveedor<>"")
        {
        if($cod_proveedor=="")
        {
          $query2="update productos set cod_proveedor='$Tcod_proveedor' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de cod_proveedor";
        }
        }
        //---------------------------------------------------------------
        if($Tpaisorigen<>"")
        {
        if($paisorigen=="")
        {
          $query2="update productos set paisorigen='$Tpaisorigen' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de paisorigen";
        }
        }
        //---------------------------------------------------------------
        if($Tbrand_marca<>"")
        {
        if($brand_marca=="")
        {
          $query2="update productos set brand_marca='$Tbrand_marca' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de brand_marca";
        }
        }
        //---------------------------------------------------------------
        if(is_numeric($Tprecio_compra) and $Tprecio_compra>0)
        {
        if($precio_compra==0)
        {
          $query2="update productos set precio_compra='$Tprecio_compra' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de precio_compra";
        }
        }
        //---------------------------------------------------------------
        if(is_numeric($Tprecio1_producto) and $Tprecio1_producto>0)
        {
        if($precio1_producto==0)
        {
          $query2="update productos set precio1_producto='$Tprecio1_producto' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de precio1_producto";
        }
        }
        //---------------------------------------------------------------
        if(is_numeric($Tprecio2_producto) and $Tprecio2_producto>0)
        {
        if($precio2_producto==0)
        {
          $query2="update productos set precio2_producto='$Tprecio2_producto' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de precio2_producto";
        }
        }
        //---------------------------------------------------------------
        if(is_numeric($Tprecio3_producto) and $Tprecio3_producto>0)
        {
        if($precio3_producto==0)
        {
          $query2="update productos set precio3_producto='$Tprecio3_producto' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de precio3_producto";
        }
        }
        //---------------------------------------------------------------
        if(is_numeric($Tprecio4_producto) and $Tprecio4_producto>0)
        {
        if($precio4_producto==0)
        {
          $query2="update productos set precio4_producto='$Tprecio4_producto' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de precio4_producto";
        }
        }
        //---------------------------------------------------------------
        if($Tnom_unidad<>"")
        {
        if($nom_unidad==0)
        {
          $query2="update productos set nom_unidad='$Tnom_unidad' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de nom_unidad";
        }
        }
        //---------------------------------------------------------------
        if($Tempaque<>"")
        {
        if($empaque==0)
        {
          $query2="update productos set empaque='$Tempaque' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de empaque";
        }
        }
        //---------------------------------------------------------------
        if(is_numeric($Tstock_actual) and $Tstock_actual>0)
        {
        if($stock_actual==0 or $stock_actual=="")
        {
          $query2="update productos set stock_actual='$Tstock_actual' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de stock_actual";
        }
        }
        //---------------------------------------------------------------
        if($Tfoto_producto<>"")
        {
        if($foto_producto==0)
        {
          $query2="update productos set foto_producto='$Tfoto_producto' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de foto_producto";
        }
        }
        //---------------------------------------------------------------
        if($Tespecial<>"")
        {
        if($especial=="")
        {
          $query2="update productos set especial='$Tespecial' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de especial";
        }
        }
        //---------------------------------------------------------------
        if($Tcambia_precio<>"")
        {
        if($cambia_precio=="")
        {
          $query2="update productos set cambia_precio='$Tcambia_precio' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de cambia_precio";
        }
        }
        //---------------------------------------------------------------
        if($Testado<>"")
        {
        if($estado=="")
        {
          $query2="update productos set estado='$Testado' where id_producto='$id_producto'";
    echo "<br><span class='font-red'>".$query2."</span>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de estado";
        }
        }
      echo "<hr></div>";
    }
  }
 }
 // Flush output
 flush();
 ob_flush();
}
?>
</div>

<div class="ui grid">
 <div class="eight wide column">
   <?php
    echo "<h1>Total Cambios: $num</h1>";
    if($num>0)
    {
     //echo "<a class='ui red button' href='CheckProdRepetido.php?op=del'>Borrar Datos</a>";
    }
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
if($num>0)
{
 $sql1="repair table productos";
 $result2=mysqli_query($conex1,$sql1) or die ("$queryerror $query. " . mysqli_error());
 exit();
}
?>
<html><meta http-equiv=refresh content=4;url=right-menu.php>
