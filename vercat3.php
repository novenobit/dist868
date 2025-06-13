<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  vercat3.php                                           //
// ****************************************************************
include_once("./includes/session.php");

$aos="S";
$autoPro="S";
$accordion="S";
$addCart="S";
$countUp="S";
$divider="S";
$dropdown="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="S";
$label="N";
$label="S";
$list="S";
$menu="S";
$message="S";
$popup="N";
$rating="S";
$sidebar="N";
$slick="S";
$swiper="S";
$table="N";
$table="S";
$dirRoot="./";

include_once("./includes/config.ini.php");

if(isset($_GET['codCat']))
{ $codCat="$_GET[codCat]";
  $McodCat="$_GET[codCat]";
}
if(isset($_GET['codSubCat']))
{ $codSubCat="$_GET[codSubCat]"; }
if(!isset($McodCat) and $codCat<>"")
{ $McodCat=$codCat; }

$nomSubCat="";
$nom_subcategoria="";
$Tnom_subcategoria="";
$foto_subcategoria="";
$linkpage2="vercat2.php";
$linkpage3="vercat3.php";

$linkpage="vercat3.php";
if(isset($_GET['idpro']))
{ $idpro="$_GET[idpro]";
  $sqlProData=mysqli_query($conex1,"select * from productos where id_producto='$idpro'");
  $proData=mysqli_fetch_array($sqlProData);
  if(isset($proData))
  {
// -------------------------------------
   $idProducto=$proData['id_producto'];
   $codProducto=$proData['cod_producto'];
   $codBarra=$proData['codigo_barra'];
   //$cod_categoria=$proData['$cod_categoria'];
   $nomProducto=$proData['nom_producto'];
   $fotoProducto=$proData['foto_producto'];
   if($fotoProducto<>"")
   {
    if(file_exists("./imagenes/productos/$fotoProducto"))
    {
     $img_size_array = getimagesize("./imagenes/productos/$fotoProducto");
     $width = $img_size_array[0];
     $height = $img_size_array[1];
     //echo "Width is ".$width."px and height is ".$height."px";
     if($height>600)
     {
       $height="400";
     }
    }
   }

   if($fotoProducto=="")
   { $fotoProducto="sinfoto.png"; }

// -------------------------------------
   //$id_producto=$proData['id_producto'];
   //$cod_producto=$proData['cod_producto'];
   //$codigo_barra=$proData['codigo_barra'];
   $cod_upcean=$proData['cod_upcean'];
   $cod_categoria=$proData['cod_categoria'];
   $cod_subcategoria=$proData['cod_subcategoria'];
   //$nom_producto=$proData['nom_producto'];
   $pro_brevedato=$proData['pro_brevedato'];
   $datos_producto=$proData['datos_producto'];
   $cod_proveedor=$proData['cod_proveedor'];
   $paisorigen=$proData['paisorigen'];
   $brand_marca=$proData['brand_marca'];
   $precio_compra=$proData['precio_compra'];
   $precio1_producto=$proData['precio1_producto'];
   $precio2_producto=$proData['precio2_producto'];
   $precio3_producto=$proData['precio3_producto'];
   $precio4_producto=$proData['precio4_producto'];
   $nom_unidad=$proData['nom_unidad'];
   $empaque=$proData['empaque'];
   //$fisico=$proData['fisico'];
   //$tamano=$proData['tamano'];
   //$peso=$proData['peso'];
   //$bultos=$proData['bultos'];
   //$foto_producto=$proData['foto_producto'];
   $submitted=$proData['submitted'];
   $activo=$proData['activo'];
   $fotoProducto=$proData['foto_producto'];
   if($fotoProducto=="")
   { $fotoProducto="sinfoto.png"; }
  }
}
if(isset($cod_categoria) and !is_numeric($cod_categoria))
{ $cod_categoria=""; }
if(isset($cod_subcategoria) and !is_numeric($cod_subcategoria))
{ $cod_subcategoria=""; }
if(isset($cod_categoria) and $cod_categoria<>"")
{
    $sqlCat=mysqli_query($conex1,"select id_categoria,cod_categoria,nom_categoria,foto_categoria from categoria where cod_categoria='$cod_categoria'");
    $catData=mysqli_fetch_array($sqlCat);
    if(isset($catData))
    {
      $idCat=$catData['id_categoria'];
      $codCat=$catData['cod_categoria'];
      $nom_categoria=$catData['nom_categoria'];
      $fotoCat=$catData['foto_categoria'];
      if($fotoCat=="")
      { $fotoCat="sinfoto.png"; }
    }
    if(isset($sqlCat))
    { mysqli_free_result($sqlCat); }
}
if(isset($cod_subcategoria) and $cod_subcategoria<>"")
{
    $sqlSubCat=mysqli_query($conex1,"select nom_subcategoria,foto_subcategoria from subcategoria where cod_subcategoria='$cod_subcategoria'");
    $subCatData=mysqli_fetch_array($sqlSubCat);
    if(isset($subCatData))
    {
      $nomSubCat=$subCatData['nom_subcategoria'];
      $nom_subcategoria=$subCatData['nom_subcategoria'];
      $Tnom_subcategoria=$nom_subcategoria;
      $foto_subcategoria=$subCatData['foto_subcategoria'];
      if($foto_subcategoria=="")
      { $foto_subcategoria="sinfoto.png"; }
    }
    if(isset($sqlSubCat))
    { mysqli_free_result($sqlSubCat); }
}
if(!isset($foto_subcategoria) or $foto_subcategoria=="")
{ $foto_subcategoria="sinfoto.png"; }
if(!isset($nom_categoria) or $nom_categoria=="")
{ $nom_categoria="SinCategoria"; }
if(!isset($nomSubCat) or $nomSubCat=="")
{ $nomSubCat="Sin Sub-Categoria"; }
if($foto_subcategoria=="")
{ $foto_subcategoria="sinfoto.png"; }

//if($mobile=="S" or $tablet=="S")
if($mobile=="S")
{
 $linkpage="";
 include("mobile-data3.php");
 $linkpage="vercat3.php";
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
  padding: 9px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}
</style>
<div class="ui message">
 <h3><a class='section' href='<?php echo "vercat1.php?codCat=$codCat"; ?>'><?php echo "$nom_categoria"; ?></a>
   <a class='section font-red'><?php echo "$nomSubCat"; ?></a>
 </h3>
</div>

 <div class="scrollmenu">

       <?php
         if(isset($cod_categoria))
         { $codCat=$cod_categoria; }
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
          <a class='section font-red' href='<?php echo "vercat2.php?op=plcodCat=$cod_categoria&codSubCat=$cod_subcategoria"; ?>'><?php echo "$nomSubCat"; ?></a>
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
            echo "<a class='item' href='index.php'>Inicio <span class='description font-red'><i class='home icon'></i></span></a>";
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
            if(!isset($idCat))
            { $idCat=""; }
            echo "<div class='item'>";
            if($numFilas>0)
            { echo "<a class='item' href='vercat2.php?op=pl&id=$idCat&codCat=$codCat&codSubCat=$codSubCat2'>"; }
            else
            { echo "<a class='item' href='#'>"; }
              echo "<span class='blackText'>$nom_subcategoria</span></a>
              <span class='description'><span class='font-red'>$numFilas</span></span>
            </div>";
            $Data="";
          }
          if(isset($sqlSubCat))
          { mysqli_free_result($sqlSubCat); }
          ?>
          <a class='item' href='javascript:history.back(1)'>Regresa <span class='description font-red'><i class="left arrow icon"></i></span></a>
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
  $codSubCat=$codSubCat2;
  include("./data/showSubCat.php");
 ?>
 <p><div class="ui hidden divider"></div></p>
</div>
<?php
}
if($mobile=="S")
{
 //<h1 class="ui center aligned header">$nomProducto</h1>
}
?>

<div class='ui container' style="background-color:#ffffff;color:#000;border-radius:25px;">
 <div class="ui stackable two column padded grid">
  <div class="column" style="color:#FF69B4;text-align:center;">
    <?php
     if(!file_exists("./imagenes/productos/$fotoProducto"))
     {
      echo "<img class='ui centered image' src='./imagenes/sinfoto.png' alt='$nomProducto'>";
     }
     else
     {
      if(isset($height) and $height<>"")
      { echo "<img class='ui centered rounded image' src='./imagenes/productos/$fotoProducto' style='height:$height;' alt='$nomProducto'>"; }
      else
      { echo "<img class='ui centered rounded image' src='./imagenes/productos/$fotoProducto' alt='$nomProducto'>"; }
     }
    ?>
    <h4>Importado</h4>
  </div>
  <div class="column">
   <div class="content padded">
    <h1 class="ui header"><?php echo "$nomProducto"; ?></h1>
    <h3 class="ui header"><span class='blueTextBold'><?php echo "$nomSubCat"; ?></span></h3>
    <div class="content">
     <div class="description padded">
      <?php
       // echo "<p>Codigo: $codProducto</p>";
       if(isset($codBarra) and $codBarra<>"")
       { echo "<p>CodBarra: $codBarra</p>"; }
       if(!isset($cod_upceana) and $cod_upcean<>"")
       { echo "<p>UPC/EAN: ".$cod_upcean."</p>"; }
       echo "<p>Categoria: <a href='vercat1.php?codCat=$cod_categoria'>$nom_categoria</a></p></p>
       <p>SubCategoria: <a href='vercat2.php?op=pl&id=3&codCat=$cod_categoria&codSubCat=$cod_subcategoria'>$Tnom_subcategoria</a></p>";
       if(isset($nom_unidad) and $nom_unidad<>"")
       { echo "<p>Und: $nom_unidad</p>"; }
       if(isset($empaque) and $empaque<>"")
       { echo "<p>Empaque: ".$empaque."</p>"; }
       if(isset($brand_marca) and $brand_marca<>"")
       { echo "<p>TM: ".$brand_marca."</p>"; }
       //if(isset($tamano) and $tamano>0)
       //{ echo "<p>Tamano: ".$tamano."</p>"; }
       //if(isset($peso) and $peso>0)
       //{ echo "<p>Peso: ".$peso."</p>"; }
       //if(isset($bultos) and $bultos<>"")
       //{ echo "<p>Bultos: ".$bultos."</p>"; }

       if(isset($datos_producto) and $datos_producto<>"")
       {
        echo "<p><b>Datos</b>: $datos_producto</p>";
       }
       echo "<p>Excelente Calidad</p>";
       echo "<p>Disponible en Nuestra Tienda</p>";
       //echo "<p><a class='ui tag label teal'>Ref: <del>$precio1_producto</del> $precio2_producto</a></p>";
       echo "<p><span class='font-14'>Ref S: $precio1_producto</span></p><p><span class='font-red font-bold font-16'>Ref M: $precio2_producto</span></a></p>";       
      ?>
      <p>Precio Especial para Distribuidores</p>
      <p>Compartir con tus amigos:</p>
      <p><a href='#'><i class="large envelope blue icon"></i></a>
      <a href='#'><i class="large facebook blue icon"></i></a>
      <a href='#'><i class="large twitter blue icon"></i></a></p>

      <div class="ui red rating disabled">
       <i class="heart icon active"></i>
       <i class="heart icon active"></i>
       <i class="heart icon active"></i>
       <i class="heart icon active"></i>
       <i class="heart icon"></i>
      </div>
     </div>
    </div>
   </div>
   <div class="ui hidden divider"></div>
   <div class="ui grid">
    <div class="sixteen wide column">
     <?php
       $cat1=$cod_categoria;
       $cat2=$cod_subcategoria;
       $idProCesta=$idpro;
       //$returnTo="vercat3";
       $returnTo="";
       //echo "<a class='big ui blue button' href='#' id='addBasket'><i class='shopping cart icon'></i></a>";
      // echo "<a href='./cesta/cesta-add.php?id=$idProducto' class='button'>Add</a>";
      echo "<a class='big ui blue button' href='user-registrar1.php'>Arma Tu Presupuesto</a>";
      if($mobile=="S")
      {
       echo "<div id='basketContent'></div>";
      }
   ?>
    </div>
   </div>
  </div>

  <?php
   //<div class="sixteen wide column center aligned">
   //  <p>Puede Ordenar para la entrega o recogida hoy.<br>No compre este art&iacute;culos en ning&uacute;n lugar que no sea aqui porque tenemos el mejor precio.</p>
   //</div>
  ?>


 </div>
</div>
<div class="ui hidden divider"></div>

<style>
.price {
  margin: 1.5em 0;
  color: #42413d;
  font-size: 1.2em;
}
.price span {
  padding-left: 0.15em;
  font-size: 2.9em;
}
.normalprice {
  padding-left: 0.15em;
  font-size: 2em;
}
</style>
<?php
  //$num1=flor($precio1_producto);
  //$num1=round($precio1_producto, 0, PHP_ROUND_HALF_ODD);
  $num1=floor($precio1_producto);



if($precio2_producto<=1)
{
  include("$dirRoot"."data/one-dolar.php");
  echo "<div class='ui container center aligned' style='margin-top:40px;'><h4>El hecho de que estos productos sean más baratos no significa que sean de menor calidad.</h4></div>";
}

if($mobile=="S")
{
?>
  <h4 class="ui horizontal divider header computer only"><i class="product hunt icon"></i> Relacionados</h4>
<?php
}
if($mobile=="N")
{
?>
  <div class="ui container">
    <div class="ui hidden divider"></div>
    <div class="ui hidden divider"></div>
    <h2 class="ui horizontal divider header aos-item" aos="zoom-in-dowwn">
     Productos Relacionados
    </h2>
    <div class="ui hidden divider"></div>
  </div>
<?php
}
?>

<style>
.item-img {
  position: relative;
  float: left;
  display: block;
  width: 50%;
  transform-origin: 50% 50%;
  transform-style: preserve-3d;
  -webkit-animation: floating 5s -1s infinite;
          animation: floating 5s -1s infinite;
}
.item-img img {
  display: block;
  width: 100%;
  height: auto;
  transform-origin: 50% 100%;
  transform: translateZ(-5rem);
}

.item-3d:nth-child(even) .item-img {
  float: right;
  order: 1;
}

@-webkit-keyframes floating {
  0%, 100% {
    transform: translateY(-5%);
  }
  50% {
    transform: translateY(0);
  }
}

@keyframes floating {
  0%, 100% {
    transform: translateY(-5%);
  }
  50% {
    transform: translateY(0);
  }
}
</style>

<div class="ui hidden divider"></div>
<div class="ui doubling grid container">
  <div class="stretched row">
   <?php
     $tableBucar="productos";
     $campo1="id_productos";
     $campo2="cod_subcategoria";
     $sqlProData=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto ,foto_producto from productos where id_producto<>'$idProducto' and cod_subcategoria='$cod_subcategoria' and activo='S' order by rand() limit 8");
     while($proData=mysqli_fetch_array($sqlProData))
     {
      $idpro=$proData['id_producto'];
      $codProducto=$proData['cod_producto'];
      $nomProducto=$proData['nom_producto'];
      $precio1_producto=$proData['precio1_producto'];
      $fotoProducto=$proData['foto_producto'];
      if($fotoProducto=="")
      { $fotoProducto="sinfoto.png"; }
      if($mobile=="S")
      {
       echo "<div class='eight wide mobile eight wide tablet four wide computer column  padded'>
        <div class='ui fluid raised link card aos-item' aos='zoom-in-up'  style='background-color:#ffffff;color:#000;border-radius:25px;'>
         <div class='image center aligned'>
          <a class='item left aligned' href='vercat3.php?idpro=$idpro'>";
            if(!file_exists("./imagenes/productos/$fotoProducto"))
            {
             echo "<img class='ui medium image' src='./imagenes/sinfoto.png' style='height:200px' alt='$nomProducto'>";
            }
            else
            {
              echo "<img class='ui medium image' src='./imagenes/productos/$fotoProducto' style='height:200px' alt='$nomProducto'>";
            }
           echo "</a>
         </div>
        <div class='content'>
         <div class='extra center aligned'>
          <a class='item left aligned' href='vercat3.php?idpro=$idpro'>$nomProducto</a>
          <p class='font-10 font-red'>Ref: $precio1_producto</p>
         </div>
        </div>
        </div>
       </div>";
      }
      else
      {
       echo "<div class=' eight wide mobile eight wide tablet four wide computer column  padded'>
        <div class='ui fluid raised link card aos-item' aos='zoom-in-up'  style='background-color:#ffffff;color:#000;border-radius:25px;'>
         <div class='content'>
         <div class='image center aligned'>
          <a class='item left aligned' href='vercat3.php?idpro=$idpro'>
           <div class='item-img'>";
            if(!file_exists("./imagenes/productos/$fotoProducto"))
            {
             echo "<img class='ui medium image' src='./imagenes/sinfoto.png' style='height:200px' alt='$nomProducto'>";
            }
            else
            {
              echo "<img class='ui medium image' src='./imagenes/productos/$fotoProducto' style='height:200px' alt='$nomProducto'>";
            }
           echo "</div>
           </a>
         </div>
         <div class='extra center aligned'>
          <a class='item left aligned' href='vercat3.php?idpro=$idpro'>$nomProducto</a>
          <p class='font-10 font-red'>Ref: $precio1_producto</p>
         </div>
        </div>
        </div>
       </div>";
      }
      $Data="";
     }
     if(isset($sqlProData))
     { mysqli_free_result($sqlProData); }
    ?>
  </div>
</div>
<div class="ui hidden divider"></div>
<?php
 include("./data/add1.php");
 echo "<div class='ui container center aligned' style='margin-top:5px;'><h4>Productos Populares Seleccionados Especialmente Con Grandes Ahorros</h4></div>";
?>
<div class="ui hidden divider"></div>
<!-- Test Tabs -->
<div class="ui computer only container">
  <?php
   if($mobile=="N")
   {
    $textColor="font-white";
    include("./data/last-tabs.php");
   }
   else
   {
    $textColor="font-black";
    include("./data/categoria.php");
   }
  ?>
</div>

<?php
   if($mobile=="S")
   {
?>
<div class="ui container">
 <div class="ui grid">
  <div class="center aligned sixteen wide column">
    <a href='javascript:history.back(1)'><div class="ui pink top attached huge button" tabindex="0"><i class="arrow left icon"></i> Regresar</div></a>
  </div>
  <div class="center aligned sixteen wide column">
   <a href="#top">
     <div class="ui pink top attached huge button" tabindex="0">Subir <i class="arrow up icon"></i></div>
   </a>
  </div>
 </div>
</div>

<?php
   }
?>
<!-- End Test Tabs -->
<div class="ui hidden divider"  style="margin-top:70px;"></div>
<?php
// include("./data/misma-categoria.php");
include("./includes/statusbar.php");
?>
