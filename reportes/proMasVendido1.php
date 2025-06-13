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
FechayHora();
$submitted=$hoydia;
?>
<h4>Productos Mas Vendidos</h4>
<?php
$reg=0;
$num=0;
$Ttotal=0;
$numFilas=0;
$sqlT="truncate table promadvendido";
$resultT=mysqli_query($conex1,$sqlT) or die ("Error en la tabla o base de datos $sqlT. " . mysqli_error());

$sqlPro=mysqli_query($conex1,"select id_producto,cod_producto,codigo_barra,nom_producto,foto_producto from productos");
while($proData=mysqli_fetch_array($sqlPro))
{
  $cod_producto=$proData['cod_producto'];
  $codigo_barra=$proData['codigo_barra'];
  $numFilas=0;
  $sqlCesta=mysqli_query($conex1,"select idcesta,id_cuenta,cantidad,precio1_producto from respaldo_cesta where cod_producto='$cod_producto' or codigo_barra='$codigo_barra'");
  $numFilas=mysqli_num_rows($sqlCesta);
  if($numFilas>0)
  {
   $cantidad=0;
   $Tcantidad=0;
   $nom_producto=$proData['nom_producto'];
   $foto_producto=$proData['foto_producto'];
   while($cestaData=mysqli_fetch_array($sqlCesta))
   {
    //$idcesta=$cestaData['idcesta'];
    //$id_cuenta=$cestaData['id_cuenta'];
    //$cod_producto=$cestaData['cod_producto'];
    $cantidad=$cestaData['cantidad'];
    $Tcantidad=$Tcantidad+$cantidad;
   }
   if($Tcantidad>0)
   {
    $query2="insert into promadvendido(cod_producto, codigo_barra, nom_producto, foto_producto, cantidad, dia, mes, ano, submitted)
    values('$cod_producto', '$codigo_barra', '$nom_producto', '$foto_producto', '$Tcantidad', '$dia', '$mes', '$ano', '$submitted')";
    $result2=mysqli_query($conex1,$query2);
    $num++;
   }
  }
}
if($num==0)
{
  echo "<h2>No Hay Datos</h2>";
}

if($num>0)
{
 echo "<html><meta http-equiv=refresh content=0;url=proMasVendido2.php>";
}
?>
