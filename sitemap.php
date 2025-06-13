<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  index.php                                                  //
// ****************************************************************
include_once("./includes/session.php");
$breadCrumb="S";
$header="S";
$image="S";
$menu="S";
$icon="S";
$input="S";
$list="S";
$sidebar="N";
$message="N";
$popup="N";
$item="N";
$rating="N";
$aos="S";
$slick="S";
$swiper="S";
$autoPro="S";
$divider="S";
$forms="S";
$nags="N";
$tabs="S";
$table="S";
$countUp="S";
$dropdown="S";
$dirRoot="./";

include_once("./includes/config.ini.php");
//include("./data/cat-list1.php");
?>

<div class="ui hidden divider"></div>
<div class="ui centered computer only grid container">
 <div class="sixteen wide center aligned column">
   <p class="countUp">Mas de <span data-vanilla-counter data-start-at="5000" data-end-at="6000" data-delay="0" data-format="{}"></span> Productos</p>
 </div>
</div>

<?php
// include("./data/buscar-datos.php");
// include("./data/front-add.php");
?>
<div class="ui centered computer only grid container">
  <div class="ui top tabular menu">
    <a class="active item" data-tab="texto">Texto</a>
    <a class="item" data-tab="imagenes">Imagenes</a>
    <a class="item" data-tab="guia">Guia</a>
  </div>
  <div class="ui bottom attached active tab segment" data-tab="texto" style="background-color:#ffffff;color:#000000;border-top-left-radius:25px;border-top-right-radius:25px;border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;">
    <?php
      include("sitemap-text.php");
    ?>
  </div>
  <div class="ui bottom attached tab segment" data-tab="imagenes" style="background-color:#ffffff;color:#000000;border-top-left-radius:25px;border-top-right-radius:25px;border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;">
    <?php
      include("sitemap-images.php");
    ?>
  </div>
  <div class="ui bottom attached tab segment" data-tab="guia" style="background-color:#ffffff;color:#000000;border-top-left-radius:25px;border-top-right-radius:25px;border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;">
    <?php
      include("sitemap-guia.php");
    ?>
  </div>
</div>

<?php
include("./includes/statusbar.php");
?>
