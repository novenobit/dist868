<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  vercat1.php                                                //
// ****************************************************************
include_once("./includes/session.php");

$header="N";
$image="S";
$menu="S";
$divider="N";
$icon="S";
$input="S";
$list="S";
$sidebar="N";
$table="N";
$message="N";
$popup="N";
$label="N";
$item="N";
$rating="N";
$aos="S";
$slick="S";
$swiper="S";
$autoPro="S";
$label="S";
$divider="S";
$dropdown="S";
$topAdmin="N";
$topFile="N";
$showStatus="N";
$dirRoot="./";

include_once("./includes/config.ini.php");

if(isset($_GET['codCat']))
{ $codCat="$_GET[codCat]"; }

echo "ddd $id / $codCat";
exit();

if(isset($codCat) and $codCat<>"")
{
 $sqlCat=mysqli_query($conex1,"select * from categoria where cod_categoria='$codCat'");
 $catData=mysqli_fetch_array($sqlCat);
 if(isset($catData))
 {
   $idCat=$catData['id_categoria'];
   $codCat=$catData['cod_categoria'];
   $nom_categoria=$catData['nom_categoria'];
   $fotoCat=$catData['foto_categoria'];
   if($fotoCat=="")
   { $fotoCat="sinfoto.png"; }
   $numSubCat=0;
   $sqlNumSubCat=mysqli_query($conex1,"select id_subcategoria from subcategoria where cod_categoria='$codCat'");
   $numSubCat=mysqli_num_rows($sqlNumSubCat);
   $numSubCat=round($numSubCat/2);
 }
 if(isset($sqlCat))
 { mysqli_free_result($sqlCat); }
?>



<div class="ui container">
 <div class="ui stackable two column grid">
  <div class="column">
   <div class="ui horizontal basic card">
    <div class="image">
     <?php  echo "<img class='ui large circular image' src='./imagenes/menu/$fotoCat' alt='$nom_categoria'>"; ?>
    </div>
    <div class="content center aligned ">
      <div class="header"><a class='ui big blue tag label'> <?php echo "$nom_categoria"; ?></a></div>
      <div class="meta">
        <br><span class="category"><p><?php echo "($codCat)"; ?></p></span>
      </div>
    </div>
   </div>
  </div>
  <div class="column">
   <div class="ui sizer vertical segment">
    <div class="ui grid">
     <div class="eight wide column">
       <div class="ui large dividing header"><span class='blueTextBold'>Otra</span> Categoria</div>
     </div>
     <div class="eight wide right aligned column">
       <a class='ui left labeled icon basic button' href='javascript:history.back(1)'><i class="left arrow icon"></i> Regresa</a>
     </div>
    </div>
   </div>
   <div class="ui horizontal center aligned divided list">
     <?php
      $tableBucar="subcategoria";
      $campo1="id_subcategoria";
      $campo2="cod_categoria";
      if(!isset($linkpage) or $linkpage=="")
      { $linkpage="vercat1.php"; }
      echo "<a class='item' href='index.php'><i class='angle double left icon'></i> Inicio</a>";
      $sqlCat2=mysqli_query($conex1,"select id_categoria,cod_categoria,nom_categoria from categoria order by nom_categoria");
      while($catData2=mysqli_fetch_array($sqlCat2))
      {
       $idCat2=$catData2['id_categoria'];
       $codCat2=$catData2['cod_categoria'];
       $cod_categoria=$catData2['cod_categoria'];
       $nom_categoria2=$catData2['nom_categoria'];
       $idBuscar=$codCat2;
       include("./libs1/getNumber.php");
       if($numFilas>0)
       { echo "<a class='item' href='vercat1.php?op=pl&id=$idCat2&codCat=$codCat2'>"; }
       else
       { echo "<a class='item' href='#'>"; }
       echo "<span class='blackText'>$nom_categoria2</span></a>";
      }
      if(isset($sqlCat2))
      { mysqli_free_result($sqlCat2); }
     ?>
    </div>

  </div>
 </div>
</div>

<?php
if($mobile=="N")
{
include("./data/banners2.php");
?>
<div class="ui hidden divider"></div>

<div class="ui container">
 <h4 class="ui horizontal header divider">
    <a href="#"><span class='blueText'>Nuestro Productos</span></a>
 </h4>
</div>
<?php
}
?>

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
       $nom_subcategoria=$subCatData['nom_subcategoria'];
       $fotoSubCat=$subCatData['foto_subcategoria'];
       if($fotoSubCat=="")
       { $fotoSubCat="sinfoto.png"; }
       $idBuscar=$codSubCat;
       include("./libs1/getNumber.php");
       echo "<div class='eight wide tablet four wide computer column'>";
        if($numFilas>0)
        { echo "<a href='$linkpage?op=pl&id=$idCat&codCat=$codCat&codSubCat=$codSubCat'>"; }
          echo "<div class='ui raised fluid grey card hoverBox'>
           <div class='image'>
             <img class='image' src='./imagenes/menu/$fotoSubCat'  alt='$nom_subcategoria'>
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
     ?>
    </div>
    <?php
     $idCat="";
     $codCat="";
    ?>
   </div>
  </div>
 </div>
</div>

<?php
}
?>

<div class="ui hidden divider"></div>
<!-- Adds Section -->
<?php
// Adds
// include("./data/varCat1Banners.php");
?>
<div class="ui hidden divider"></div>
<?php
include("./data/add1.php");

include("./data/catSectionAdds.php");
?>


<div class="ui hidden divider"></div>
<!-- Test Tabs -->
 <div class="ui container">
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

<?php
// include("./data/categoria.php");
// StatusBar
include("./includes/statusbar.php");
?>
