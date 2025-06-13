<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  vercat1.php                                                //
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
$message="S";
$popup="N";
$rating="N";
$sidebar="N";
$slick="S";
$swiper="S";
$table="N";
$dirRoot="./";

include_once("./includes/config.ini.php");

if(isset($_GET['op']))
{ $op="$_GET[op]"; }
if(isset($_GET['id']))
{ $id="$_GET[id]"; }
if(isset($_GET['codCat']))
{ $codCat="$_GET[codCat]"; }
if(isset($_GET['codCat']))
{ $codCat="$_GET[codCat]";
  $McodCat="$_GET[codCat]";
}

if(isset($codCat) and $codCat<>"")
{
 $sqlCat=mysqli_query($conex1,"select * from categoria where cod_categoria='$codCat'");
 $catData=mysqli_fetch_array($sqlCat);
 if(isset($catData))
 {
   $idCat=$catData['id_categoria'];
   $codCat=$catData['cod_categoria'];
   $nom_categoria=htmlentities($catData['nom_categoria'], ENT_QUOTES, "UTF-8");
   $fotoCat=$catData['foto_categoria'];
   $nota=htmlentities($catData['nota'], ENT_QUOTES, "UTF-8");
   if($fotoCat=="")
   { $fotoCat="sinfoto.png"; }
   $numSubCat=0;
   $sqlNumSubCat=mysqli_query($conex1,"select id_subcategoria from subcategoria where cod_categoria='$codCat'");
   $numSubCat=mysqli_num_rows($sqlNumSubCat);
   $numSubCat=round($numSubCat/2);
 }
 if(isset($sqlCat))
 { mysqli_free_result($sqlCat); }
 if($mobile=="S")
 {
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

<?php
//if($mobile=="S" or $tablet=="S")
if($mobile=="S")
{
// include("mobile-data3.php");
 if(isset($McodCat) and $McodCat<>"")
 { $codCat=$McodCat; }

?>

 <div class="ui stackable one column grid" style="background-color:#fff;">
  <div class="column scrollmenu">
     <?php
      $tableBucar="subcategoria";
      $campo1="id_subcategoria";
      $campo2="cod_categoria";
      if(!isset($linkpage) or $linkpage=="")
      { $linkpage="vercat1.php"; }
      echo "<a class='item' href='index.php'><i class='angle double left icon'></i> Inicio</a>";
      $sqlCat2=mysqli_query($conex1,"select id_categoria,cod_categoria,nom_categoria,icono from categoria order by nom_categoria");
      while($catData2=mysqli_fetch_array($sqlCat2))
      {
       $idCat2=$catData2['id_categoria'];
       $codCat2=$catData2['cod_categoria'];
       $cod_categoria=$catData2['cod_categoria'];
       $nom_categoria2=htmlentities($catData2['nom_categoria'], ENT_QUOTES, "UTF-8");
       $icono=$catData2['icono'];
       if(!isset($icono))
       { $icono=""; }
       $idBuscar=$codCat2;
       include("./libs1/getNumber.php");

       if($numFilas>0)
       { echo "<a class='item' href='vercat1.php?op=pl&id=$idCat2&codCat=$codCat2'>"; }
       else
       { echo "<a class='item' href='#'>"; }

         echo "<span class='description'><i class='$icono icon'></i></span>
         <span class='blackText'>$nom_categoria2</span></a>";
      }
      if(isset($sqlCat2))
      { mysqli_free_result($sqlCat2); }
     ?>
  </div>
 </div>

<?php
}
?>
 <div class="ui stackable one column computer only grid">
  <div class="column">
    <div class="ui breadcrumb">
      <a class='section' href='index.php'>Inicio</a>
       <i class="right chevron icon divider"></i>
      <a class='section' href='<?php echo "vercat1.php?codCat=$codCat"; ?>'><?php echo "$nom_categoria"; ?></a>
    </div>
  </div>
  <div class="column">
   <div class="scrollmenu">
     <?php
      $tableBucar="subcategoria";
      $campo1="id_subcategoria";
      $campo2="cod_categoria";
      if(!isset($linkpage) or $linkpage=="")
      { $linkpage="vercat1.php"; }
      echo "<a class='item' href='index.php'><i class='angle double left icon'></i> Inicio</a>";
      $sqlCat2=mysqli_query($conex1,"select id_categoria,cod_categoria,nom_categoria,icono from categoria order by nom_categoria");
      while($catData2=mysqli_fetch_array($sqlCat2))
      {
       $idCat2=$catData2['id_categoria'];
       $codCat2=$catData2['cod_categoria'];
       $cod_categoria=$catData2['cod_categoria'];
       $nom_categoria2=htmlentities($catData2['nom_categoria'], ENT_QUOTES, "UTF-8");
       $icono=$catData2['icono'];
       if(!isset($icono))
       { $icono=""; }
       $idBuscar=$codCat2;
       include("./libs1/getNumber.php");

       if($numFilas>0)
       { echo "<a class='item' href='vercat1.php?op=pl&id=$idCat2&codCat=$codCat2'>"; }
       else
       { echo "<a class='item' href='#'>"; }

         echo "<span class='description'><i class='$icono icon'></i></span>
         <span class='blackText'>$nom_categoria2</span></a>";
      }
      if(isset($sqlCat2))
      { mysqli_free_result($sqlCat2); }
     ?>
   </div>

  </div>
 </div>

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
     <div class="sixteen wide mobile sixteen wide tablet twelve wide computer column">
       <div class="ui breadcrumb">
        <a class='section' href='index.php'>Inicio</a>
        <i class="right chevron icon divider"></i>
        <a class='section' href='<?php echo "vercat1.php?codCat=$codCat"; ?>'><?php echo "$nom_categoria"; ?></a>
       </div>
     </div>
     <div class="sixteen wide mobile eight wide tablet four wide computer column right floated">

      <div class="ui scrolling dropdown">
        <div class="text">Otra Categoria</div>
        <i class="dropdown icon"></i>
        <div class="menu">

     <?php
      $tableBucar="subcategoria";
      $campo1="id_subcategoria";
      $campo2="cod_categoria";
      if(!isset($linkpage) or $linkpage=="")
      { $linkpage="vercat1.php"; }
      echo "<a class='item' href='index.php'><i class='angle double left icon'></i> Inicio</a>";
      $sqlCat2=mysqli_query($conex1,"select id_categoria,cod_categoria,nom_categoria,icono from categoria order by nom_categoria");
      while($catData2=mysqli_fetch_array($sqlCat2))
      {
       $idCat2=$catData2['id_categoria'];
       $codCat2=$catData2['cod_categoria'];
       $cod_categoria=$catData2['cod_categoria'];
       $nom_categoria2=htmlentities($catData2['nom_categoria'], ENT_QUOTES, "UTF-8");
       $icono=$catData2['icono'];
       if(!isset($icono))
       { $icono=""; }
       $idBuscar=$codCat2;
       include("./libs1/getNumber.php");
       echo "<div class='item'>";
       if($numFilas>0)
       { echo "<a class='item' href='vercat1.php?op=pl&id=$idCat2&codCat=$codCat2'>"; }
       else
       { echo "<a class='item' href='#'>"; }

         echo "<span class='description'><i class='$icono icon'></i></span>
         <span class='blackText'>$nom_categoria2</span></a>
       </div>";
      }
      if(isset($sqlCat2))
      { mysqli_free_result($sqlCat2); }
     ?>
        </div>

      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
<?php
 }
if($mobile=="S")
{
 echo "<h2 class='font-red' style='text-align: center;'>$nom_categoria</h2>";
}
if($mobile=="N")
{
 include("./data/banners2.php");
 if(isset($nota) and $nota<>"")
 {
   ?>
   <div class="ui floating white message">
     <p><?php echo $nota; ?><br><span class='font-10 font-blue'>Publicidad creado por IA Bard.</span></p>
   </div>
   <?php
 }
}
?>

</div>

<?php
if($mobile=="S")
{
  echo "<div class='ui grid padded'>";
         $tableBucar="productos";
         $campo1="id_producto";
         $campo2="cod_subcategoria";
         $linkpage="vercat2.php";
         $sqlSubCat=mysqli_query($conex1,"select * from subcategoria where cod_categoria='$codCat' order by nom_subcategoria");
         while($subCatData=mysqli_fetch_array($sqlSubCat))
         {
          $idSubCat=$subCatData['id_subcategoria'];
          $codSubCat=$subCatData['cod_subcategoria'];
          $cod_subcategoria=$subCatData['cod_subcategoria'];
          $nom_subcategoria=$subCatData['nom_subcategoria'];
          $fotoSubCat=$subCatData['foto_subcategoria'];
          if($fotoSubCat=="")
          { $fotoSubCat="sinfoto.png"; }
          $idBuscar=$codSubCat;
          include("./libs1/getNumber.php");
          echo "<div class='eight wide  stretched column padded'>";
           if($numFilas>0)
           { echo "<a href='$linkpage?op=pl&id=$idCat&codCat=$codCat&codSubCat=$codSubCat'>"; }
             echo "<div class='ui raised fluid grey card hoverBox' style='border-radius:15px;'>
              <div class='image' style='background-color:#ffffff;'>
                <img class='image' src='./imagenes/menu/$fotoSubCat' alt='$nom_subcategoria'>
              </div>
              <div class='content'>
                $nom_subcategoria
              </div>
             </div>";
   //<span class='tag is-light'>($codSubCat)</span>
           if($numFilas>0)
           { echo "</a>"; }
          echo "</div>";
          $Data="";
         }
         if(isset($sqlSubCat))
         { mysqli_free_result($sqlSubCat); }
  echo "</div>";
}
if($mobile=="N")
{
 // include("./data/banners2.php");
?>
<div class="ui hidden divider"></div>
<div class="ui container">
 <h4 class="ui horizontal header divider">
    <a href="#"><span class='blueText'>Productos de <?php echo "$nom_categoria"; ?></span></a>
 </h4>
</div>

<div class="ui hidden divider"></div>

<div class="ui container">
 <div class="ui grid">
  <div class="two column row">
   <div class="four wide computer only column">
    <?php
      include("./data/add-vertical.php");
    ?>
   </div>
   <div class="sixteen wide tablet twelve wide computer column">
    <div class="ui doubling grid container">
     <div class="stretched row">
        <?php
         $tableBucar="productos";
         $campo1="id_producto";
         $campo2="cod_subcategoria";
         $linkpage="vercat2.php";
         $sqlSubCat=mysqli_query($conex1,"select * from subcategoria where cod_categoria='$codCat' order by nom_subcategoria");
         while($subCatData=mysqli_fetch_array($sqlSubCat))
         {
          $idSubCat=$subCatData['id_subcategoria'];
          $codSubCat=$subCatData['cod_subcategoria'];
          $cod_subcategoria=$subCatData['cod_subcategoria'];
          $nom_subcategoria=$subCatData['nom_subcategoria'];
          $fotoSubCat=$subCatData['foto_subcategoria'];
          if($fotoSubCat=="")
          { $fotoSubCat="sinfoto.png"; }
          $idBuscar=$codSubCat;
          include("./libs1/getNumber.php");
          echo "<div class='eight wide tablet four wide computer stretched column padded'>";
           if($numFilas>0)
           { echo "<a href='$linkpage?op=pl&id=$idCat&codCat=$codCat&codSubCat=$codSubCat'>"; }
             echo "<div class='ui raised fluid grey card hoverBox' style='border-radius:15px;'>
              <div class='image' style='background-color:#ffffff;'>
                <img class='image' src='./imagenes/menu/$fotoSubCat' alt='$nom_subcategoria'>
              </div>
              <div class='content center aligned'>
                $nom_subcategoria
              </div>
             </div>";
   //<span class='tag is-light'>($codSubCat)</span>
           if($numFilas>0)
           { echo "</a>"; }
          echo "</div>";
          $Data="";
         }
         if(isset($sqlSubCat))
         { mysqli_free_result($sqlSubCat); }
        ?>
      </div>
    </div>
    <?php
    // $idCat="";
    // $codCat="";
    ?>
   </div>
  </div>
 </div>
</div>
<?php
}
}
?>

<div class="ui hidden divider"></div>
<!-- Adds Section -->
<?php
// Adds
// include("./data/varCat1Banners.php");
if($mobile=="N")
{
?>
<div class="ui hidden divider"></div>
<?php
 include("./data/add1.php");
 include("./data/catSectionAdds.php");
}
?>
<div class="ui hidden divider"></div>

<!-- Test Tabs -->
<div class="ui container" style="margin-bottom:60px;">
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


<?php
// include("./data/categoria.php");
// StatusBar
include("./includes/statusbar.php");
?>
