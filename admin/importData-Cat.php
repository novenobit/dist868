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
    <h2>Importar las Categorias de los Productos</h2>
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
$fileD868="categoria.csv";
if(!file_exists("../docs/$fileD868")) {
 echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
 echo "<html><meta http-equiv=refresh content=6;url=right-menu.php>";
 exit();
}

$fileOpenD868=fopen("../docs/$fileD868", 'r');
if($fileOpenD868 !== FALSE)
{
 while(($dataD868 = fgetcsv($fileOpenD868, 400, '|')) !== FALSE)
 {
 // Datos de la Hoja de Calculo --------------------------------
     $id_categoria=$dataD868[0];
     $cod_categoria=$dataD868[1];
     $nom_categoria=$dataD868[2];
     $foto_categoria=$dataD868[3];
     $banner_categoria=$dataD868[4];
     $icono=$dataD868[5];
 // Agregar Datos  -------------------------------------------
     if($cod_categoria<>"")
     {
        $numFilas=0;
        $query="select id_categoria from categoria where cod_categoria='$cod_categoria' or nom_categoria='$nom_categoria' ";
        $result=mysqli_query($conex1,$query);
        $num_filas=mysqli_num_rows($result);
        if($num_filas>0)
        {
         echo "<br>$nom_categoria esta categoria ya fue publicado";
        }
        else
        {
         $nom_categoria=ucwords($nom_categoria);
         $filename=stripslashes($_FILES['foto_categoria']['name']);
         if(isset($filename) and $filename<>"")
         {
          include("pro-cat-foto-upload.php");
         }
         if(!isset($banner_categoria))
         { $banner_categoria=""; }
         if(!isset($icono))
         { $icono=""; }
         if(!isset($nota))
         { $nota=""; }
         $query2="insert into categoria(cod_categoria, nom_categoria, foto_categoria,banner_categoria, icono, nota)
         values('$cod_categoria', '$nom_categoria', '$filename','$banner_categoria', '$icono', '$nota')";
         $result2=mysqli_query($conex1,$query2);
        }
     }

 } // end DoWhile
}
echo "<h1>Total Cambios: $num</h1>";
echo "<br>".rand();
fclose($fileOpenD868);
if($num>0)
{ exit(); }
?>
<html><meta http-equiv=refresh content=4;url=right-menu.php>
