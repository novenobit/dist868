<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  vercat2.php                                           //
// ****************************************************************
include_once("./includes/session.php");

//$addCart="S";
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
$message="S";
$popup="N";
$rating="N";
$sidebar="N";
$slick="S";
$swiper="S";
$table="N";
$dirRoot="./";

include_once("./includes/config.ini.php");

if(isset($_GET['codCat']))
{ $codCat="$_GET[codCat]";
  $McodCat="$_GET[codCat]";
}
if(isset($_GET['codSubCat']))
{ $codSubCat="$_GET[codSubCat]"; }
$linkpage2="vercat2.php";
$linkpage3="vercat3.php";
$num=0;

if(isset($codCat) and $codCat<>"")
{
 $sqlCat=mysqli_query($conex1,"select id_categoria,nom_categoria,foto_categoria,icono,nota from categoria where cod_categoria='$codCat'");
 $catData=mysqli_fetch_array($sqlCat);
 if(isset($catData))
 {
   $idCat=$catData['id_categoria'];
   //$codCat=$catData['cod_categoria'];
   $nom_categoria=$catData['nom_categoria'];
   $fotoCat=$catData['foto_categoria'];
   $nota=htmlentities($catData['nota'], ENT_QUOTES, "UTF-8");
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

if(!isset($nomSubCat))
{ $nomSubCat="Sin Sub-Categoria"; }

//if($mobile=="S" or $tablet=="S")
if($mobile=="S")
{
 include("mobile-data3.php");
?>
<style>
div.scrollmenu {
  background-color: #fff;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: #000;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}
</style>

<?php echo "<h2 class='font-red' style='text-align: center;'><a  href='vercat1.php?codCat=$codCat'>$nom_categoria</a>"; ?>
<?php echo "<br><span class='font-black'>$nomSubCat</span></h2>"; ?>

 <div class="scrollmenu">
       <?php
         if(isset($McodCat))
         { $codCat=$McodCat; }
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
          //echo "<div class='item'>";
           if($numFilas>0)
           { echo "<a class='item' href='$linkpage2?op=pl&id=$idCat&codCat=$codCat&codSubCat=$codSubCat2'>"; }
           else
           { echo "<a class='item' href='#'>"; }
            echo "<span class='blackText'>$nom_subcategoria</span></a>
            <span class='description'>$numFilas</span>";
          $Data="";
         }
         if(isset($sqlSubCat))
         { mysqli_free_result($sqlSubCat); }
        ?>
        <a class='item' href='javascript:history.back(1)'>Regresa <span class='description font-blue'><i class="left arrow icon"></i></span></a>


 </div>
 <div class="ui hidden divider"></div>
<?php
}
else
{
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
<?php
}
if($mobile=="N")
{
?>

<div class="ui center aligned column container">
 <p><div class="ui hidden divider"></div></p>
 <?php
   $imageSize="80px";
   //$codSubCat=$codSubCat2;
   include("./data/showCat2.php");
 ?>
 <p><div class="ui hidden divider"></div></p>
</div>
<?php
}
if($mobile=="N")
{
 if($nota<>"")
 {
?>
 <div class="ui container padded">
  <div class="ui floating white message" style="background-color:#ffffff;color:#000;border-radius:25px;">
   <p><?php echo $nota; ?><br><span class='font-10 font-blue'>Publicidad creado por IA Bard.</span></p>
  </div>
 </div>
<?php
 }
?>

<div class='ui container'>
 <div class="ui grid">
  <div class="sixteen wide right aligned column">
   <div class="ui breadcrumb">
      <a class="section" href='index.php'>Inicio</a>
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

 <div class="ui grid" style="margin-top:30px;">
  <div class="two column row">
   <div class="four wide computer only column padded">

<button class="ui labeled icon blue fluid button">
  <i class="bars icon"></i>
  Misma Categoria
</button>

    <div class="ui vertical text menu" style="background-color:#ffffff;color:#000;border-radius:25px;padding:10px 10px 10px 10px;width:100%;">
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
            <span class='font-red font-10'>$numFilas</span>
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
    <div class="ui computer only stackable two column grid">
      <?php
        $ves=1;
        $tableBucar="productos";
        $campo1="id_productos";
        $campo2="cod_subcategoria";
        $sqlProData=mysqli_query($conex1,"select id_producto,cod_producto,codigo_barra,nom_producto,precio1_producto,foto_producto from productos where cod_subcategoria='$codSubCat' and activo='S' order by nom_producto");
        while($proData=mysqli_fetch_array($sqlProData))
        {
          $idpro=$proData['id_producto'];
          $idProCesta=$idpro;
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
          <div class="column">
           <div class="ui horizontal card" style="background-color:#ffffff;color:#000;border-radius:10px;">
            <div class="ui stackable two column padded grid">
              <div class="column">
                <?php echo "<a href='$linkpage3?idpro=$idpro'><img class='ui small rounded image' src='./imagenes/productos/$fotoProducto'></a>"; ?>
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
                    <?php echo  "<p>Ref: <a class='item font-greensalem font-bold' href='$linkpage3?idpro=$idpro'>$precio1_producto</a></p>"; ?>
                 </div>

                 <div class="extra padding">
                   <?php
                    $SiNo="N";
                    if(isset($_SESSION['pedido']))
                    {

//echo "<br> ssss".print_r($_SESSION['pedido']);
$numItems=0;
foreach ($_SESSION['pedido'] as $key => $value) {
    ${'id' . $key} = $value['id'];
    ${'cantidad' . $key} = $value['cantidad'];
    $id=${'id' . $key};
    $id_producto=$id;
    $cantidad=${'cantidad' . $key};
    if($item==$idpro)
    $numItems++;
    if($id==$idpro)
    { $SiNo="S"; }
}

                       //$id_producto=implode(',',$_SESSION['pedido']);
                       //if($numItems>0)
                       //{ $SiNo="S"; }
                       //$id_producto=$_SESSION['pedido'][0];
                       //if($item==$idpro)
                       //{ $SiNo="S"; }
                       //}
                     //}
                     $cat1=$codCat;
                     $cat2=$codSubCat;
                     //$idProCesta=$idpro;
                     //$returnTo="vercat3";
                     $returnTo="";

                     if($SiNo=="S")
                     {
                      //echo "<a class='ui button' style='background-color:#FFFF00;color:#000000;'  href='./cesta/cesta-add.php?id=$idpro&returnTo=vercat2&cat1=$codCat&cat2=$codSubCat'><i class='shopping cart icon'></i> Esta en la Cesta</a>";
                     // echo "<a class='ui yellow button' href='#' id='addBasket'><i class='shopping cart icon'></i>  En Cesta</a>";
                     }
                     if($SiNo=="N")
                     {
                      //echo "<a class='ui button' style='background-color:#4B77BE;color:#ffffff;' href='./cesta/cesta-add.php?id=$idpro&returnTo=vercat2&cat1=$codCat&cat2=$codSubCat'><i class='shopping cart icon'></i> Pon en Cesta</a>";
                    //  echo "<a class='ui blue button' href='#' id='addBasket'><i class='shopping cart icon'></i> Pon en Cesta</a>";
                     }
                    }
                   ?>
                 </div>
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
          $ves++;
          if($ves>=3)
          { $ves=1;
            echo "</div>"; }
        }
        if(isset($sqlProData))
        { mysqli_free_result($sqlProData); }
        $idCat="";
        ///$codCat="";
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

<?php
}
if($mobile=="N")
{
 ?>
<style>
.animate-charcter
{
 text-transform: uppercase;
  background-image: linear-gradient(
   -225deg,
    #231557 0%,
    #44107a 29%,
    #ff1361 67%,
    #fff800 100%
  );
  background-size: auto auto;
  background-clip: border-box;
  background-size: 200% auto;
  color: #fff;
  background-clip: text;
  text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip 2s linear infinite;
  display: inline-block;
  font-size: 40px;
}

@keyframes textclip {
  to {
    background-position: 200% center;
  }
}
</style>

<div class="ui container  center aligned">
 <p><div class="ui hidden divider"></div></p>
 <hr>

      <h3 class="animate-charcter">Misma Categoria</h3>

 <p><div class="ui hidden divider"></div></p>
 <?php
  include("./data/showCat.php");
 ?>
</div>

<div class='ui container'>
 <div class="ui hidden divider"></div>
 <div class="ui equal width center aligned padded grid">
  <div class="row" style="background-color:#00b5ed;color:#ffffff;border-top-left-radius:10px;border-top-right-radius:10px;">
   <h1>Precios Especiales</h1>
  </div>
 </div>
</div>
<?php
}
?>

<div class='ui container'>
   <div class="ui mobile only grid">
    <?php
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

      echo "<div class='sixteen wide column'>
       <div class='ui fluid card' style='border-radius:15px;'>
        <div class='content'>
          <div class='header'>
           <a class='item left aligned' href='$linkpage3?idpro=$idpro'>$nomProducto</a>
          </div>
          <div class='description'>";
           if($fotoProducto<>"" and $fotoProducto<>"sinfoto.png")
           { echo "<a href='$linkpage3?idpro=$idpro'><img class='ui circular image ' src='$dirRoot"."imagenes/productos/$fotoProducto' style='height:80px;float:left;padding-right:10px;'></a>"; }
           echo "Cod: <a class='item' href='$linkpage3?idpro=$idpro'>$codigo_barra</a>
           <br>Ref: <a class='item' href='$linkpage3?idpro=$idpro&returnTo=vercat2&codCat=$codCat&codSubCat=$codSubCat'>$precio1_producto</a>";
           // echo "<div class='right aligned'><a href='./cesta/cesta-add.php?id=$idpro&returnTo=vercat2&cat1=$codCat&cat2=$codSubCat'><i class='shopping cart icon blue'></i></a>
          echo "</div>
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
   <div class="ui equal width center aligned padded computer only grid">
    <div class="row" style="background-color:#00b5ed;color:#ffffff;border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
      <h1>Somos Mayoristas</h1>
    </div>
   </div>
   <div class="ui hidden divider"></div>    
<?php
   include("./data/add1.php");
   // include("./data/categoria.php");
   // ui sixteen wide mobile twelve wide tablet ten wide computer column grid
   if($mobile=="S")
   {
    ?>
    <div class="ui equal width grid">
      <div class="center aligned one column row">
        <div class="column padded">
        <a href='javascript:history.back(1)'><div class="ui pink top attached huge button" tabindex="0"><i class="arrow left icon"></i> Regresar</div></a>
        </div>
        <div class="column padded">
        <a href="#top">
          <div class="ui pink top attached huge button" tabindex="0">Subir <i class="arrow up icon"></i></div>
        </a>
        </div>
      </div>
    </div>
    <?php
   }
?>
</div>

<div class="ui hidden divider"  style="margin-top:70px;"></div>

<?php
$idCat="";
$codCat="";
include("./includes/statusbar.php");
?>
