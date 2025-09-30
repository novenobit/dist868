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
$numCod=0;
$numNom=0;
$dia=date("d");
$mes=date("m");
$ano=date("Y");
$amfm=date("a");
$numCambios=0;
?>

<h2>Compare Data de ProPrecios con Produtos </h2>
<h2>Productos Precios</h2>
<table class="ui unstackable celled very long scrolling table">
<thead>
 <tr>
  <th class='ui blue'>Producto</th>
  <th class='ui blue'>Codigo</th>
  <th class='ui blue'>Precio Detal</th>
  <th class='ui blue'>Precio Mayor</th>
  <th class='ui blue'>Precio SuperMayor</th>
  <th class='ui blue'>Precio Especial</th>
 </tr>
</thead>
<tbody>
<?php
$sqldata="select * from proprecios";
$sql=mysqli_query($conex1,"$sqldata");
while($proData=mysqli_fetch_array($sql))
{
 $Tid_producto=$proData['id_producto'];
 $Tcodigo_barra=$proData['codigo_barra'];
 $Tnom_producto=$proData['nom_producto'];
 $Tprecio1_producto=$proData['precio1_producto'];
 $Tprecio2_producto=$proData['precio2_producto'];
 $Tprecio3_producto=$proData['precio3_producto'];
 if(isset($proData['precio4_producto']))
 { $Tprecio4_producto=$proData['precio4_producto']; }
 else
 { $Tprecio4_producto=0; }

//---------------------------------------------------------------------------
// Codigo
//---------------------------------------------------------------------------
   if($Tcodigo_barra<>"")
   {
    $numFilas1=0;
    //echo "<br>select * from productos where codigo_barra='$Tcodigo_barra'";
    $sql2=mysqli_query($conex1,"select * from productos where codigo_barra='$Tcodigo_barra'");
    $numFilas1=mysqli_num_rows($sql2);
    if($numFilas1>0)
    {
    $proData2=mysqli_fetch_array($sql2);
    $id=$proData2['id_producto'];
    $Dcodigo_barra=$proData2['codigo_barra'];
    $Dnom_producto=$proData2['nom_producto'];
    $Dprecio1_producto=$proData2['precio3_producto'];
    $Dprecio2_producto=$proData2['precio2_producto'];
    $Dprecio3_producto=$proData2['precio1_producto'];
    if(isset($proData2['precio4_producto']))
    { $Dprecio4_producto=$proData2['precio4_producto']; }
    else
    { $Dprecio4_producto=0; }

  //----------------------------------------------------
    $cambios="N";
    if($Dnom_producto<>$Tnom_producto)
    { $cambios="S"; }
  //----------------------------------------------------
    if($Tprecio1_producto<>$Dprecio1_producto)
    { $cambios="S"; }
    if($Tprecio2_producto<>$Dprecio2_producto)
    { $cambios="S"; }
    if($Tprecio3_producto<>$Dprecio3_producto)
    { $cambios="S"; }
    if($Tprecio4_producto<>$Dprecio4_producto and $Dprecio4_producto>0)
    { $cambios="S"; }
  //----------------------------------------------------
    if($cambios=="S")
    {
      echo "<tr>";
        echo "<td>$Dnom_producto</td>
        <td>$Dcodigo_barra</td>
        <td>". number_format($Dprecio1_producto,2,',', '.') . "</td>
        <td>". number_format($Dprecio2_producto,2,',', '.') . "</td>
        <td>". number_format($Dprecio3_producto,2,',', '.') . "</td>
        <td>". number_format($Dprecio4_producto,2,',', '.') . "</td>
      </tr>";
      echo "<tr class='ui inverted yellow'>";
        echo "<td>$Tnom_producto</td>
        <td>$Tcodigo_barra</td>
        <td>". number_format($Tprecio1_producto,2,',', '.') . "</td>
        <td>". number_format($Tprecio2_producto,2,',', '.') . "</td>
        <td>". number_format($Tprecio3_producto,2,',', '.') . "</td>
        <td>". number_format($Tprecio4_producto,2,',', '.') . "</td>
      </tr>";
    //-----------------------------------------------------
      if($Dnom_producto<>$Tnom_producto)
      {
            $query2="update productos set nom_producto='$Tnom_producto' where id_producto='$id'";
            echo "<tr><td colspan='6'>".$query2."</td></tr>";
            $result2=mysqli_query($conex1,$query2);
            $cambios="S";
            $numCambios++;
            $datos_cambio="Cambio de Nombre";
      }
    //-----------------------------------------------------
      if($Tprecio1_producto<>$Dprecio1_producto)
      {
            $query2="update productos set precio1_producto='$Tprecio1_producto' where id_producto='$id'";
            echo "<tr><td colspan='6'>".$query2."</td></tr>";
            $result2=mysqli_query($conex1,$query2);
            $cambios="S";
            $numCambios++;
            $datos_cambio="Cambio de Precio1";
      }
      if($Tprecio2_producto<>$Dprecio2_producto)
      {
            $query2="update productos set precio2_producto='$Tprecio2_producto' where id_producto='$id'";
            echo "<tr><td colspan='6'>".$query2."</td></tr>";
            $result2=mysqli_query($conex1,$query2);
            $cambios="S";
            $numCambios++;
            $datos_cambio="Cambio de Precio2";
      }
      if($Tprecio3_producto<>$Dprecio3_producto)
      {
            $query2="update productos set precio3_producto='$Tprecio3_producto' where id_producto='$id'";
            echo "<tr><td colspan='6'>".$query2."</td></tr>";
            $result2=mysqli_query($conex1,$query2);
            $cambios="S";
            $numCambios++;
            $datos_cambio="Cambio de Precio3";
      }
      if($Tprecio4_producto<>$Dprecio4_producto and $Dprecio4_producto>0)
      {
            $query2="update productos set precio4_producto='$Tprecio4_producto' where id_producto='$id'";
            echo "<tr><td colspan='6'>".$query2."</td></tr>";
            $result2=mysqli_query($conex1,$query2);
            $cambios="S";
            $numCambios++;
            $datos_cambio="Cambio de Precio4";
      }
      $numCod++;
    }
    }
   }
//-----------------------------------------------------
// Nombre
//-----------------------------------------------------

  $numFilas2=0;
  $sql2=mysqli_query($conex1,"select * from productos where nom_producto='$Tnom_producto'");
  $numFilas2=mysqli_num_rows($sql2);
  if($numFilas2>0)
  {
   $proData2=mysqli_fetch_array($sql2);
   $id=$proData2['id_producto'];
   $Dcodigo_barra=$proData2['codigo_barra'];
   $Dnom_producto=$proData2['nom_producto'];
   $Dprecio1_producto=$proData2['precio3_producto'];
   $Dprecio2_producto=$proData2['precio2_producto'];
   $Dprecio3_producto=$proData2['precio1_producto'];
   if(isset($proData2['precio4_producto']))
   { $Dprecio4_producto=$proData2['precio4_producto']; }
   else
   { $Dprecio4_producto=0; }

 //----------------------------------------------------
   $cambios="N";
   if($Dcodigo_barra<>$Tcodigo_barra)
   { $cambios="S"; }
 //----------------------------------------------------
   if($Tprecio1_producto<>$Dprecio1_producto)
   { $cambios="S"; }
   if($Tprecio2_producto<>$Dprecio2_producto)
   { $cambios="S"; }
   if($Tprecio3_producto<>$Dprecio3_producto)
   { $cambios="S"; }
   if($Tprecio4_producto<>$Dprecio4_producto and $Dprecio4_producto>0)
   { $cambios="S"; }
 //----------------------------------------------------
   if($cambios=="S")
   {
    echo "<tr>";
      echo "<td>$Dnom_producto</td>
      <td>$Dcodigo_barra</td>
      <td>". number_format($Dprecio1_producto,2,',', '.') . "</td>
      <td>". number_format($Dprecio2_producto,2,',', '.') . "</td>
      <td>". number_format($Dprecio3_producto,2,',', '.') . "</td>
      <td>". number_format($Dprecio4_producto,2,',', '.') . "</td>
    </tr>";
    echo "<tr class='ui inverted yellow'>";
      echo "<td>$Tnom_producto</td>
      <td>$Tcodigo_barra</td>
      <td>". number_format($Tprecio1_producto,2,',', '.') . "</td>
      <td>". number_format($Tprecio2_producto,2,',', '.') . "</td>
      <td>". number_format($Tprecio3_producto,2,',', '.') . "</td>
      <td>". number_format($Tprecio4_producto,2,',', '.') . "</td>
    </tr>";
   //-----------------------------------------------------
     if($Dcodigo_barra<>$Tcodigo_barra)
     {
          $query2="update productos set cod_producto='$Tcodigo_barra',codigo_barra='$Tcodigo_barra' where id_producto='$id'";
          echo "<tr><td colspan='6'>".$query2."</td></tr>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Codigos";
     }
   //-----------------------------------------------------
     if($Tprecio1_producto<>$Dprecio1_producto)
     {
          $query2="update productos set precio1_producto='$Tprecio1_producto' where id_producto='$id'";
          echo "<tr><td colspan='6'>".$query2."</td></tr>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Precio1";
     }
     if($Tprecio2_producto<>$Dprecio2_producto)
     {
          $query2="update productos set precio2_producto='$Tprecio2_producto' where id_producto='$id'";
          echo "<tr><td colspan='6'>".$query2."</td></tr>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Precio2";
     }
     if($Tprecio3_producto<>$Dprecio3_producto)
     {
          $query2="update productos set precio3_producto='$Tprecio3_producto' where id_producto='$id'";
          echo "<tr><td colspan='6'>".$query2."</td></tr>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Precio3";
     }
     if($Tprecio4_producto<>$Dprecio4_producto and $Dprecio4_producto>0)
     {
          $query2="update productos set precio4_producto='$Tprecio4_producto' where id_producto='$id'";
          echo "<tr><td colspan='6'>".$query2."</td></tr>";
          $result2=mysqli_query($conex1,$query2);
          $cambios="S";
          $numCambios++;
          $datos_cambio="Cambio de Precio4";
     }
     $numNom++;
    }
  }

//-----------------------------------------------------
// Add New Product
//-----------------------------------------------------
  if($numFilas1==0 and $numFilas2==0)
  {
    $id_producto=$proData['id_producto'];
    $codigo_barra=$proData['codigo_barra'];
    $nom_producto=$proData['nom_producto'];
    $precio1_producto=$proData['precio1_producto'];
    $precio2_producto=$proData['precio2_producto'];
    $precio3_producto=$proData['precio3_producto'];
    if(isset($proData['precio4_producto']))
    { $precio4_producto=$proData['precio4_producto']; }
    else
    { $precio4_producto=0; }
    $query2="";
    // include("../datafiles/pro-variables.php");
    // include("../datafiles/insert-pro-data.php");
include("../datafiles/insertProductos.php");

    if(isset($query2))
    {
       echo "<tr><td colspan='6'>".$query2."</td></tr>";
    }
  }


 // Flush output
 flush();
 ob_flush();
}

?>
</table>

<div class="ui grid">
 <div class="eight wide column">
   <?php
    echo "<h1>Total Cambios $numCambios / Cod: $numCod / Nom: $numNom</h1>";
    //if($numCod>0 or $numNom>0)
    //{
     //echo "<a class='ui red button' href='CheckProdRepetido.php?op=del'>Borrar Datos</a>";
    //}
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
if($numCod>0 or $numNom>0)
{
 $sql1="repair table productos";
 $result2=mysqli_query($conex1,$sql1) or die ("$queryerror $query. " . mysqli_error());
 exit();
}
?>
<html><meta http-equiv=refresh content=4;url=right-menu.php>
