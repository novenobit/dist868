<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  vercat2.php                                           //
// ****************************************************************
include_once("./includes/session.php");

$aos="S";
$autoPro="S";
//$addCart="S";
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
 $sqlSubCat=mysqli_query($conex1,"select cod_categoria,cod_subcategoria,nom_subcategoria,foto_subcategoria from subcategoria where cod_subcategoria='$codSubCat'");
 $subCatData=mysqli_fetch_array($sqlSubCat);
 if(isset($subCatData))
 {
   $codCat=$subCatData['cod_categoria'];
   $codSubCat=$subCatData['cod_subcategoria'];
   $cod_categoria=$subCatData['cod_categoria'];
   $nomSubCat=$subCatData['nom_subcategoria'];
   $nom_subcategoria=$subCatData['nom_subcategoria'];
   $foto_subcategoria=$subCatData['foto_subcategoria'];
   if($foto_subcategoria=="")
   { $foto_subcategoria="sinfoto.png"; }
   $numSubCat=0;
   $sqlNumSubCat=mysqli_query($conex1,"select id_producto from productos where cod_subcategoria='$codSubCat' and activo='S'");
   $numSubCat=mysqli_num_rows($sqlNumSubCat);
   $numSubCat=round($numSubCat/2);
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
          echo "<a class='item' href='index.php'>Inicio <span class='description'><i class='home icon font-blue'></i></span></a>";
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
            <span class='description'>$numFilas</span>
          </div>";
          $Data="";
         }
         if(isset($sqlSubCat))
         { mysqli_free_result($sqlSubCat); }
        ?>
        <a class='item' href='javascript:history.back(1)'>Regresa <span class='description font-blue'><i class="left arrow icon"></i></span></a>

       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
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

 <div class="ui grid">
  <div class="two column row">
   <div class="four wide computer only column padded">
    <div class="ui medium header">Misma Categoria</div>
    <div class="ui vertical text menu">
       <?php
         $tableBucar="productos";
         $campo1="id_producto";
         $campo2="cod_subcategoria";
         if(!isset($linkpage) or $linkpage=="")
         { $linkpage="vercat1.php"; }
         echo "<a class='active item' href='index.php'>Inicio <span class='description'><i class='home icon'></i></span></a>";
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
          //echo "a class='item'>";
           if($numFilas>0)
           { echo "<a class='item' href='$linkpage2?op=pl&id=$idCat&codCat=$codCat&codSubCat=$codSubCat2'>"; }
           else
           { echo "<a class='item' href='#'>"; }
            echo "<span class='blackText'>$nom_subcategoria</span>
            <span class='description'><span class='font-deeppink'>$numFilas</span></span>
          </a>";
          $Data="";
         }
         if(isset($sqlSubCat))
         { mysqli_free_result($sqlSubCat); }
       ?>
    </div>
    <div class="ui hidden divider"></div>
    <div class="ui divider"></div>
    <div class="ui medium header">Productos Disponibles</div>
    <?php
     include("./data/add-vertical.php");
    ?>
   </div>
   <div class="twelve wide tablet twelve wide computer column">
    <div class="ui hidden divider"></div>
    <div class="ui computer only stackable four column grid">
      <?php
        $ves=1;
        $tableBucar="productos";
        $campo1="id_productos";
        $campo2="cod_subcategoria";
        $sqlProData=mysqli_query($conex1,"select id_producto,cod_producto,codigo_barra,nom_producto,precio1_producto,foto_producto from productos where cod_subcategoria='$codSubCat' and activo='S' order by nom_producto");
        while($proData=mysqli_fetch_array($sqlProData))
        {
          $idpro=$proData['id_producto'];
          $codProducto=$proData['cod_producto'];
          $codigo_barra=$proData['codigo_barra'];
          $nomProducto=$proData['nom_producto'];
          $precio1_producto=$proData['precio1_producto'];
          $fotoProducto=$proData['foto_producto'];
          if($fotoProducto=="")
          { $fotoProducto="sinfoto.png"; }
          if($ves==1)
          { echo "<div class='row'>"; }
      ?>
          <div class="column stretched">

<div class="ui card"   style="background-color:#ffffff;border-radius:15px;">
  <div class="ui slide masked reveal image" style="background-color:#ffffff;">

                <?php
                 echo "<a href='$linkpage3?idpro=$idpro'>
                  <img  class='ui small rounded centered image' src='./imagenes/productos/$fotoProducto' alt='$nomProducto' style='height:100px;'>
                 </a>";
                ?>

  </div>
  <div class="content">
    <?php echo "<a class='header' href='$linkpage3?idpro=$idpro'>$nomProducto</a>"; ?>"
    <div class="meta">
       <?php echo "<span>Cod: $codigo_barra</span>"; ?>
    </div>
                 <div class="description">
                    <?php echo  "<p>Ref: <a class='item font-greensalem font-bold' href='$linkpage3?idpro=$idpro'>$precio1_producto</a></p>"; ?>
                 </div>
  </div>
  <div class="extra content">
                <?php
                    $SiNo="N";


       $cat1=$cod_categoria;
       $cat2=$codSubCat;
       $idProCesta=$idpro;
       //$returnTo="vercat3";
       $returnTo="";
       //echo "<a class='ui white button' href='#' id='addBasket'><i class='shopping cart icon'></i></a>";
      // echo "<a href='./cesta/cesta-add.php?id=$idProducto' class='button'>Add</a>";
       //echo "<a class='big ui blue button' href='user-registrar1.php'>Registrate y Compra</a>";


                    if($SiNo=="S")
                    {
                     //echo "<a class='ui button' style='background-color:#FFFF00;color:#000000;'  href='./cesta/cesta-add.php?id=$idpro&returnTo=vercat-foto1&cat1=$codCat&cat2=$codSubCat'><i class='shopping cart icon'></i> Esta en Cesta</a>";
                    }
                    if($SiNo=="N")
                    {
                     // echo "<a class='ui button' style='background-color:#4B77BE;color:#ffffff;' href='./cesta/cesta-add.php?id=$idpro&returnTo=vercat-foto&cat1=$codCat&cat2=$codSubCat'><i class='shopping cart icon'></i> Pon en Cesta</a>";
                    }
                   ?>

  </div>
</div>

          </div>
      <?php
          $Data="";
          $num++;
          $ves++;
          if($ves>=5)
          { $ves=1;
            echo "</div>"; }
        }
        if(isset($sqlProData))
        { mysqli_free_result($sqlProData); }
        //$idCat="";
        //$codCat="";
        if($ves<=2)
        { $ves=1;
          echo "</div>";
        }
      ?>
    </div>
   </div>
  </div>
 </div>
</div>

<div class='ui container'>
  <?php
   if($mobile=="N")
   {
  ?>
    <p><div class="ui hidden divider"></div></p>
    <h1 class="ui horizontal divider header">Otra Categoria</h1>
    <p><div class="ui hidden divider"></div></p>
  <?php
    include("./data/showCat.php");
   }
   $idCat="";
   $codCat="";
  ?>

 <div class="ui hidden divider"></div>
 <div class="ui equal width center aligned padded grid">
  <div class="row blueTextFondo" style="border-radius:15px;">
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
     $sqlProData=mysqli_query($conex1,"select id_producto,cod_producto,codigo_barra,nom_producto,precio1_producto,foto_producto from productos where cod_subcategoria='$codSubCat'  and activo='S' order by nom_producto");
     while($proData=mysqli_fetch_array($sqlProData))
     {
      $idpro=$proData['id_producto'];
      $codProducto=$proData['cod_producto'];
      $codigo_barra=$proData['codigo_barra'];
      $nomProducto=$proData['nom_producto'];
      $precio1_producto=$proData['precio1_producto'];
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
           <br>Ref: <a class='item' href='$linkpage3?idpro=$idpro'>$precio1_producto</a>
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
 <div class="row blueTextFondo" style="border-radius:15px;">
   <h1>Somos Mayoristas</h1>
 </div>
</div>
<div class="ui hidden divider"></div>

<?php
 include("./data/add1.php");
 include("./data/categoria.php");
?>

 <div class="ui equal width grid">
  <div class="center aligned two column row">
    <div class="column">
     <a href='javascript:history.back(1)'><div class="ui pink top attached huge button" tabindex="0" style="border-radius:15px;"><i class="arrow left icon"></i> Regresar</div></a>
    </div>
    <div class="column">
     <a href="#top">
      <div class="ui pink top attached huge button" tabindex="0" style="border-radius:15px;">Subir <i class="arrow up icon"></i></div>
     </a>
    </div>
  </div>
 </div>

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
include("./includes/statusbar.php");
?>
