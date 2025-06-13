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

  $numFilas=0;
echo "<br>select * from productos where codigo_barra='$Tcodigo_barra'";

  $sql2=mysqli_query($conex1,"select * from productos where codigo_barra='$Tcodigo_barra'");
  $numFilas=mysqli_num_rows($sql2);
  if($numFilas>0)
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
   echo "<br> $Dnom_producto / $Dcodigo_barra
      /". number_format($Dprecio1_producto,2,',', '.') . "
      /". number_format($Dprecio2_producto,2,',', '.') . "
      /". number_format($Dprecio3_producto,2,',', '.') . "
      ". number_format($Dprecio4_producto,2,',', '.') . "
   ";
   echo "<br>** $Tnom_producto /  $Tcodigo_barra
      /". number_format($Tprecio1_producto,2,',', '.') . "
      /". number_format($Tprecio2_producto,2,',', '.') . "
      /". number_format($Tprecio3_producto,2,',', '.') . "
      /". number_format($Tprecio4_producto,2,',', '.') . "";
   echo "<hr>";
   //-----------------------------------------------------
  }

//-----------------------------------------------------
// Nombre
//-----------------------------------------------------

  $umFilas=0;
  $sql2=mysqli_query($conex1,"select * from productos where nom_producto='$Tnom_producto'");
  $numFilas=mysqli_num_rows($sql2);
  if($umFilas>0)
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
   echo "";
      echo "<br>$Dom_producto / $Dcodigo_barra
      /". number_format($Dprecio1_producto,2,',', '.') . "
      /". number_format($Dprecio2_producto,2,',', '.') . "
      /". number_format($Dprecio3_producto,2,',', '.') . "
      /". number_format($Dprecio4_producto,2,',', '.') . "
   ";
   echo "<br>** $Tnom_producto / $Tcodigo_barra
      /". number_format($Tprecio1_producto,2,',', '.') . "
      /". number_format($Tprecio2_producto,2,',', '.') . "
      /". number_format($Tprecio3_producto,2,',', '.') . "
      /". number_format($Tprecio4_producto,2,',', '.') . "";
   //-----------------------------------------------------
     $numNom++;
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
if($numCod>0 or $numNom>0)
{
 $sql1="repair table productos";
 $result2=mysqli_query($conex1,$sql1) or die ("$queryerror $query. " . mysqli_error());
 exit();
}
?>
