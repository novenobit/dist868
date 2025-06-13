<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  vercat-foto3.php                                           //
// ****************************************************************
include_once("./includes/session.php");

$aos="S";
$autoPro="S";
$divider="S";
$dropdown="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="S";
$menu="S";
$message="N";
$popup="N";
$rating="N";
$sidebar="N";
$slick="S";
$swiper="S";
$table="N";
$dirRoot="./";

include_once("./includes/config.ini.php");

if(isset($_GET['codCat']))
{ $codCat="$_GET[codCat]"; }
if(isset($_GET['codSubCat']))
{ $codSubCat="$_GET[codSubCat]"; }
$linkpage2="vercat2.php";
$linkpage3="vercat3.php";
$num=0;

if(isset($codCat) and $codCat<>"")
{
 $sqlCat=mysqli_query($conex1,"select id_categoria,nom_categoria,foto_categoria,icono from categoria where cod_categoria='$codCat'");
 $catData=mysqli_fetch_array($sqlCat);
 if(isset($catData))
 {
   $idCat=$catData['id_categoria'];
   //$codCat=$catData['cod_categoria'];
   $nom_categoria=$catData['nom_categoria'];
   $fotoCat=$catData['foto_categoria'];
   $icono=$catData['icono'];
   if($fotoCat=="")
   { $fotoCat="sinfoto.png"; }
 }
 if(isset($sqlCat))
 { mysqli_free_result($sqlCat); }
}
if(isset($codSubCat) and $codSubCat<>"")
{
 $sqlSubCat=mysqli_query($conex1,"select cod_categoria,nom_subcategoria,foto_subcategoria from subcategoria where cod_subcategoria='$codSubCat'");
 $subCatData=mysqli_fetch_array($sqlSubCat);
 if(isset($subCatData))
 {
   $codCat=$subCatData['cod_categoria'];
   $nomSubCat=$subCatData['nom_subcategoria'];
   $nom_subcategoria=$subCatData['nom_subcategoria'];
   $foto_subcategoria=$subCatData['foto_subcategoria'];
   if($foto_subcategoria=="")
   { $foto_subcategoria="sinfoto.png"; }
 }
 if(isset($sqlSubCat))
 { mysqli_free_result($sqlSubCat); }
}
?>

<div class="ui container">
 <div class="ui stackable grid">
  <div class="sixteen wide column">
   <div class="ui blue segment">
    <div class="ui grid">
     <div class="sixteen wide mobile eight wide tablet twelve wide computer column">

       <div class="ui breadcrumb">
        <a class='section' href='index.php'>Inicio</a>
        <i class="right chevron icon divider"></i>
        <a class='section' href='<?php echo "vercat1.php?codCat=$codCat"; ?>'><?php echo "$nom_categoria"; ?></a>
        <i class="right chevron icon divider"></i>
        <a class='section font-red'><?php echo "$nomSubCat"; ?></a>
       </div>

     </div>
     <div class="sixteen wide mobile eight wide tablet four wide computer column right floated">

      <div class="ui scrolling dropdown">
        <div class="text">Misma Categoria</div>
        <i class="dropdown icon"></i>
        <div class="menu">

     <?php
      $tableBucar="productos";
      $campo1="id_producto";
      $campo2="cod_subcategoria";
      if(!isset($linkpage) or $linkpage=="")
      { $linkpage="vercat1.php"; }
      echo "<a class='item' href='index.php'><i class='angle double left icon'></i> Inicio</a>";
      $sqlSubCat=mysqli_query($conex1,"select * from subcategoria where cod_categoria='$codCat' order by nom_subcategoria");
      while($subCatData=mysqli_fetch_array($sqlSubCat))
      {
       $idSubCat=$subCatData['id_subcategoria'];
       $codSubCat2=$subCatData['cod_subcategoria'];
       $nom_subcategoria=$subCatData['nom_subcategoria'];
       $fotoSubCat=$subCatData['foto_subcategoria'];
       if($fotoSubCat=="")
       { $fotoSubCat="sinfoto.png"; }
       $idBuscar=$codSubCat2;
       include("./libs1/getNumber.php");

       echo "<div class='item'>";
       if($numFilas>0)
       { echo "<a class='item' href='$linkpage2?op=pl&id=$idCat&codCat=$codCat&codSubCat=$codSubCat2'>"; }
       else
       { echo "<a class='item' href='#'>"; }
         echo "<span class='blackText'>$nom_subcategoria</span></a>
         <span class='description font-red'>$numFilas</span>
       </div>";
       $Data="";
      }
     if(isset($sqlSubCat))
     { mysqli_free_result($sqlSubCat); }
     ?>
        </div>

      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>

<div class="ui center aligned column container">
 <p><div class="ui hidden divider"></div></p>
 <?php
  $imageSize="80px";
  //$codSubCat=$codSubCat2;
  include("./data/showCat2.php");
 ?>
 <p><div class="ui hidden divider"></div></p>
</div>

<div class='ui container'>
 <div class="ui grid">
  <div class="sixteen wide right aligned column">
   <div class="ui breadcrumb">
      <a class="section" href='index.php'>Home</a>
      <span class="divider">/</span>
      <?php echo "<a class='section' href='vercat2.php?codCat=$codCat&codSubCat=$codSubCat'>2Col</a>"; ?>
      <span class="divider">/</span>
      <?php echo "<a class='section' href='vercat-foto1.php?codCat=$codCat&codSubCat=$codSubCat'>4Col</a>"; ?>
      <span class="divider">/</span>
      <?php echo "<a class='section' href='vercat-foto3.php?codCat=$codCat&codSubCat=$codSubCat'>5Col</a>"; ?>
      <span class="divider">/</span>
      <?php echo "<a class='section' href='vercat-foto2.php?codCat=$codCat&codSubCat=$codSubCat'>Foto2</a>"; ?>
    </div>
  </div>
 </div>
 <h2 class="ui horizontal divider header">
 <?php echo "<span class='font-blue'><i class='$icono icon'></i>$nomSubCat</span>"; ?>
 </h2>
 <p><div class="ui hidden divider"></div></p>
 <div class="ui computer only stackable five column grid">

   <?php
     $tableBucar="productos";
     $campo1="id_productos";
     $campo2="cod_subcategoria";
     $sqlProData=mysqli_query($conex1,"select id_producto,cod_producto,codigo_barra,nom_producto,precio1_producto,precio2_producto,foto_producto from productos where cod_subcategoria='$codSubCat' and activo='S' order by nom_producto");
     while($proData=mysqli_fetch_array($sqlProData))
     {
      $idpro=$proData['id_producto'];
      $codProducto=$proData['cod_producto'];
      $codigo_barra=$proData['codigo_barra'];
      $nomProducto=$proData['nom_producto'];
      $precio1_producto=$proData['precio1_producto'];
      $precio2_producto=$proData['precio2_producto'];
      $fotoProducto=$proData['foto_producto'];
      if($fotoProducto=="")
      { $fotoProducto="sinfoto.png"; }
?>
       <div class="column stretched">
        <div class="ui stackable one column padded grid"  style="background-color:#fff;color:#000;border-radius:15px;">
          <div class="column">
            <?php echo "<a href='$linkpage3?idpro=$idpro'><img class='ui small rounded image' src='./imagenes/productos/$fotoProducto' style='height:180px;width:180px;'></a>"; ?>
          </div>
          <div class="column">
          <div class="ui items">
            <div class="item">
            <div class="content">
              <?php echo "<a class='header' href='$linkpage3?idpro=$idpro'>$nomProducto</a>"; ?>"
              <div class="meta">
                <?php echo "<span>Cod: $codigo_barra</span>"; ?>
              </div>
              <div class="description">
               <?php
                echo  "<p>Ref S:<a href='$linkpage3?idpro=$idpro'>$precio1_producto <span class='item font-red font-bold'>M:$precio2_producto</span></a></p>";
                $SiNo="N";
                if(isset($_SESSION['pedido']))
                {
                  foreach ($_SESSION['pedido'] as $item)
                  {
                   //$id_producto=implode(',',$_SESSION['pedido']);
                   $id_producto=$_SESSION['pedido'][0];
                   if($item==$idpro)
                   { $SiNo="S"; }
                  }
                }
                if($SiNo=="S")
                {
                 //echo "<a class='fluid ui button' style='background-color:#FFFF00;color:#000000;'  href='./cesta/cesta-add.php?id=$idpro&returnTo=vercat-foto3&cat1=$codCat&cat2=$codSubCat'><i class='shopping cart icon'></i> Esta en la Cesta</a>";
                }
                if($SiNo=="N")
                {
                //  echo "<a class='fluid ui button' href='./cesta/cesta-add.php?id=$idpro&returnTo=vercat-foto3&cat1=$codCat&cat2=$codSubCat' style='background-color:#4B77BE;color:#ffffff;'><i class='shopping cart icon'></i> Agrega a la Cesta</a>";
                  //echo "<a href='#' data-name='>$nomProducto' data-price='$precio1_producto' class='add-to-cart fluid ui button' style='background-color:#4B77BE;color:#ffffff;'>Add to cart</a>";
                }

               ?>

              </div>
            </div>
            </div>
          </div>
          </div>
        </div>
       </div>

<?php
      $Data="";
      $num++;
     }
     if(isset($sqlProData))
     { mysqli_free_result($sqlProData); }
     //$idCat="";
     //$codCat="";
?>

 </div>
 <?php
  if($mobile=="N")
  {
 ?>
    <p><div class="ui hidden divider"></div></p>
    <h1 class="ui horizontal divider header">Misma Categoria</h1>
    <p><div class="ui hidden divider"></div></p>
  <?php
    include("./data/showCat.php");
  }
  //$idCat="";
  //$codCat="";
 ?>
 <div class="ui hidden divider"></div>
 <div class="ui equal width center aligned padded grid">
    <div class="row blueTextFondo">
     <h1>Precios Especiales</h1>
    </div>
 </div>
</div>

<div class='ui container'>
   <div class="ui mobile only grid">
    <?php
     $tableBucar="productos";
     $campo1="id_productos";
     $campo2="cod_subcategoria";
     $sqlProData=mysqli_query($conex1,"select id_producto,cod_producto,codigo_barra,nom_producto,precio1_producto,precio2_producto,foto_producto from productos where cod_subcategoria='$codSubCat' and activo='S' order by nom_producto");
     while($proData=mysqli_fetch_array($sqlProData))
     {
      $idpro=$proData['id_producto'];
      $codProducto=$proData['cod_producto'];
      $codigo_barra=$proData['codigo_barra'];
      $nomProducto=$proData['nom_producto'];
      $precio1_producto=$proData['precio1_producto'];
      $precio2_producto=$proData['precio2_producto'];
      $fotoProducto=$proData['foto_producto'];
      if($fotoProducto=="")
      { $fotoProducto="sinfoto.png"; }
      echo "<div class='sixteen wide column'>
       <div class='ui raised fluid card'>
        <div class='content'>
          <div class='header'>
           <a class='item left aligned' href='$linkpage3?idpro=$idpro'>$nomProducto</a>
          </div>
          <div class='description'>
           Cod: <a class='item' href='$linkpage3?idpro=$idpro'>$codigo_barra</a>
           <br>Ref S:<a class='item' href='$linkpage3?idpro=$idpro'>$precio1_producto <span class='item font-red font-bold'>M:$precio2_producto</span></a>
          </div>
        </div>
       </div>
      </div>";
      $Data="";
      $num++;
     }
     if(isset($sqlProData))
     { mysqli_free_result($sqlProData); }
    ?>
   </div>
   <div class="ui hidden divider"></div>
   <!-- Adds Section -->
   <?php
   // Adds
    include("./data/varCat1Banners.php");
   ?>

<div class="ui hidden divider"></div>
<div class="ui equal width center aligned padded grid">
 <div class="row blueTextFondo">
   <h1>Somos Mayoristas</h1>
 </div>
</div>

<div class="ui hidden divider"></div>
<?php
 include("./data/add1.php");
// include("./data/categoria.php");
?>

<div class="ui hidden divider"></div>
<!-- Test Tabs -->
<div class="ui computer only container">
  <?php
   if($mobile=="N")
   {
    $textColor="whiteText";
    include("./data/last-tabs.php");
   }
   else
   {
    $textColor="blackText";
    include("./data/categoria.php");
   }
  ?>
</div>
<!-- End Test Tabs -->
<div class="ui hidden divider"></div>

</div>

<?php
if($mobile=="S")
{
?>
<div class="ui hidden divider"  style="margin-top:70px;"></div>
<?php
}
$idCat="";
$codCat="";
$endPage="N";
include("./includes/statusbar.php");
?>
<script src="./cesta/agrega-cesta2.js"></script>
