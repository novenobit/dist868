<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="S";
$icon="S";
$input="S";
$list="N";
$sidebar="S";
$table="S";
$message="S";
$popup="N";
$label="S";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="S";
$divider="S";
$forms="S";
$breadCrumb="S";
$findData="S";
$popup="S";
$dropdown="S";
$topAdmin="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

FechayHora();
$autoPro="S";
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['idpro']))
{ $idpro=$_GET['idpro']; }

if(empty($id))
{
 $error="error en los datos, No esta Seleccionado una Categoria";
 error();
 exit();
}
$numFilas=0;
$sql=mysqli_query($conex1, "select * from pro_subcat where id_subcategoria='$id'");
$numFilas=mysqli_num_rows($sql);
if($numFilas>0)
{
  $subCatData=mysqli_fetch_array($sql);
  $cod_subcategoria=$subCatData['cod_subcategoria'];
?>

<div class='ui grid'>
  <div class='sixteen wide column'>
   <h2><?php echo "{$subCatData['nom_subcategoria']}"; ?></h2>
 </div>
</div>

<div class='ui grid'>
  <div class='eight wide column'>
  <?php
   $foto="{$subCatData['foto_subcategoria']}";
   if(empty($foto))
   { $foto="sinfoto.png"; }
   echo "<img src='$dirRoot"."imagenes/$fotosDir/$foto'><br>";
  ?>
 </div>
 <div class='eight wide column'>
   <div class='ui grid'>
    <div class='sixteen wide column'>
     C&oacute;digo
     <?php echo "{$subCatData['cod_subcategoria']}"; ?>
    </div>
    <div class='sixteen wide column'>
     Nombre
     <?php echo $subCatData['nom_subcategoria']; ?>
    </div>
   </div>
 </div>
</div>
<?php
 if(isset($sql))
 { mysqli_free_result($sql); }
}
?>

<br><br>
<?php
include("subcat-productos.php");
?>

<br><br><br>
<?php
if($mobile=="S")
{
 $showStatus="S";
 $sysNormalM="S";
 $sysCuentaM="N";
}
else
{
 $showStatus="S";
 $sysNormal="S";
 $sysCuenta="N";
}
// $endPage="N";
$resizeFrame2="S";
//checkSession();
include("$dirTra"."includes/statusbar2.php");
?>
