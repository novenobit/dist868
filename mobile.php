<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  admin1.php                                                 //
// ****************************************************************
include_once("./includes/session.php");

$aos="N";
$autoPro="S";
$countUp="N";
$divider="S";
$dropdown="S";
$forms="N";
$header="S";
$icon="S";
$icofont="N";
$iconKids="N";
$image="S";
$input="N";
$item="N";
$label="S";
$list="S";
$mainFile="N";
$menu="S";
$message="S";
$mobile="S";
$nags="N";
$pageLoader="S";
$popup="N";
$rating="N";
$sidebar="N";
$slick="N";
$swiper="N";
$tabs="N";
$dirRoot="./";
//include_once("./includes/headfileFrame.php");
include_once("./includes/config.ini.php");

//if($mobile=="S" or $tablet=="S")
if($mobile=="S")
{
 include("mobile-data3.php");
?>

<?php
 include("mobile-data.php");
 // include("mobile-data4.php");
}
?>

<div class="ui message center aligned">
   <h3 class="ui center aligned blue header">Buscar Producto</h3>
   <a class='big ui button' href='./barcode1.php'>
   <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
     <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0z"/>
   </svg>
   </a>
</div>
<div class="ui hidden divider"></div>

<?php
// EndPage
$showStatus="S";
$endPage="S";
include("./includes/statusbar.php");
?>
