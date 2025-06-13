<?php
// ******************************************************* 2023 ***
// *  Pagina de Encabezado Principal del Sistema ven868.net      //
// *  headfile.php                                               //
// ****************************************************************
ini_set('default_charset', 'windows-1252');
?>
<!DOCTYPE html>
<html lang="es-US" class="notranslate" translate="no">
<head>
<title>Distribuidora 868 C.A</title>
<meta charset="utf-8">
<meta name="google" content="notranslate" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="Accesorios Bebe, Articulos de Limpieza, Automotriz, Electricidad, Electrodomesticos, Escolar y Oficina, Ferreteria, Herramienta, Hogar y Cocina, Iluminacion, Institucional, Jardineria y Exteriores, Juegos y Juguetes, Mascota, Ofertas, Plomeria y Griferia, Quincalleria, Salud y Belleza">
<meta name="description" content="Importacion y Distribucion de Productos Para: Ferreteria, Quincalleria en General, Cosmeticos, Articulos de Uso Diario, Articulos de Limpieza, Cauchos y Baterias">
<?php
if(!isset($pageLoader))
{ $pageLoader="N"; }
if($pageLoader=="S")
{
?>
<style>
/* SKELETON */
.skeleton {
    position: relative;
}
.skeleton::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 10;
    background: linear-gradient(90deg, #eee, #f9f9f9, #eee);
    background-size: 200%;
    animation: skeleton 1s infinite reverse;
}
@keyframes skeleton {
    0% {
        background-position: -100% 0;
    }
    100% {
        background-position: 100% 0;
    }
}
/* SKELETON */
</style>

<?php
}
if(!isset($noFrame))
{ $noFrame="S"; }
if($noFrame=="S")
{
?>
<base target='_top'>
<script>
 // this page should never load inside of another frame
 if (top.location != self.location)
 { top.location = self.location; }
 function InitFrames()
 {
  if( "object" == typeof( top.deeptree ) && "unknown" == typeof( top.deeptree.Sync ) )
  { top.deeptree.Sync(); }
 }
</script>
<?php
}
?>
<!-- Site Properties -->

<link href="<?php echo $dirRoot; ?>libs2/components/reset.min.css" rel="stylesheet">
<link href="<?php echo $dirRoot; ?>libs2/components/site.min.css" rel="stylesheet">
<link href="<?php echo $dirRoot; ?>libs2/components/container.min.css" rel="stylesheet">
<link href="<?php echo $dirRoot; ?>libs2/components/grid.min.css" rel="stylesheet">
<link href="<?php echo $dirRoot; ?>libs2/components/card.min.css" rel="stylesheet">
<link href="<?php echo $dirRoot; ?>libs2/components/segment.min.css" rel="stylesheet">
<link href="<?php echo $dirRoot; ?>libs2/components/button.min.css" rel="stylesheet">
<link href="<?php echo $dirRoot; ?>libs2/components/text.min.css" rel="stylesheet">

<!-- If Using CSS -->
<?php
if(!isset($transition))
{ $transition="N";
  if(isset($dropdown) and $dropdown=="S")
  { $transition="S"; }
}
if($transition=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/transition.min.css" rel="stylesheet">
<?php
}
if(!isset($header))
{ $header="N"; }
if($header=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/header.min.css" rel="stylesheet">
<?php
}
if(!isset($image))
{ $image="N"; }
if($image=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/image.min.css" rel="stylesheet">
<?php
}
if(!isset($menu))
{ $menu="N"; }
if($menu=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/menu.min.css" rel="stylesheet">
<?php
}
if(!isset($placeHolder))
{ $placeHolder="N"; }
if($placeHolder=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/placeholder.min.css" rel="stylesheet">
<?php
}

if(!isset($breadCrumb))
{ $breadCrumb="N"; }
if($breadCrumb=="S")
{
?>
<link href="<?php echo $dirRoot; ?>/libs2/components/breadcrumb.min.css" rel="stylesheet">
<?php
}

if(!isset($divider))
{ $divider="N"; }
if($divider=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/divider.min.css" rel="stylesheet">
<?php
}
if(!isset($icon))
{ $icon="N"; }
if($icon=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/icon.min.css" rel="stylesheet">
<?php
}
if(!isset($icofont))
{ $icofont="N"; }
if($icofont=="S")
{
 if(isset($iconBusiness) and $iconBusiness=="S")
 {
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/icofont/business.min.css">
<?php
 }
 if(isset($iconConstruction) and $iconConstruction=="S")
 {
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/icofont/construction.min.css">
<?php
 }
 if(isset($iconDirectional) and $iconDirectional=="S")
 {
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/icofont/directional.min.css">
<?php
 }
 if(isset($iconEducation) and $iconEducation=="S")
 {
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/icofont/education.min.css">
<?php
 }
 if(isset($iconFood) and $iconFood=="S")
 {
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/icofont/food.min.css">
<?php
 }
 if(isset($iconKids) and $iconKids=="S")
 {
?>
<link href="<?php echo $dirRoot; ?>libs2/icofont/kids.min.css" rel="stylesheet" type="text/css" >
<?php
 }
 if(isset($iconMathmetical) and $iconMathmetical=="S")
 {
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/icofont/mathmetical.min.css">
<?php
 }
 if(isset($iconMedical) and $iconMedical=="S")
 {
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/icofont/medical.min.css">
<?php
 }
 if(isset($iconMobileui) and $iconMobileui=="S")
 {
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/icofont/mobileui.min.css">
<?php
 }
 if(isset($iconPerson) and $iconPerson=="S")
 {
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/icofont/person.min.css">
<?php
 }
 if(isset($iconSearch) and $iconSearch=="S")
 {
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/icofont/search.min.css">
<?php
 }
 if(isset($iconSocial) and $iconSocial=="S")
 {
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/icofont/social.min.css">
<?php
 }
 if(isset($iconSports) and $iconSports=="S")
 {
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/icofont/sports.min.css">
<?php
 }
 if(isset($iconTransport) and $iconTransport=="S")
 {
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/icofont/transport.min.css">
<?php
 }
}

if(!isset($input))
{ $input="N"; }
if($input=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/input.min.css" rel="stylesheet">
<?php
}

if(!isset($checkbox))
{ $checkbox="N"; }
if($checkbox=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/checkbox.min.css" rel="stylesheet">
<?php
}

if(!isset($forms))
{ $forms="N"; }
if($forms=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/form.min.css" rel="stylesheet">
<?php
}

if(!isset($list))
{ $list="N"; }
if($list=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/list.min.css" rel="stylesheet">
<?php
}
if(!isset($placeholder))
{ $placeholder="N"; }
if($placeholder=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/placeholder.min.css" rel="stylesheet">
<?php
}

if(!isset($sideBar))
{ $sideBar="N"; }
if($sideBar=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/sidebar.min.css" rel="stylesheet">
<?php
}
if(!isset($tabs))
{ $tabs="N"; }
if($tabs=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/tab.min.css" rel="stylesheet">
<?php
}
if(!isset($table))
{ $table="N"; }
if($table=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/table.min.css" rel="stylesheet">
<?php
}
if(!isset($message))
{ $message="N"; }
if($message=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/message.min.css" rel="stylesheet">
<?php
}
if(!isset($modal))
{ $modal="N"; }
if($modal=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/dimmer.min.css" rel="stylesheet">
<link href="<?php echo $dirRoot; ?>libs2/components/modal.min.css" rel="stylesheet">
<?php
}

if(!isset($jQueryModal))
{ $jQueryModal="N"; }
if($jQueryModal=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/jqmodal/jquery.modal.min.css" rel="stylesheet">
<style>
.modal a.close-modal[class*="icon-"] {
  top: -10px;
  right: -10px;
  width: 20px;
  height: 20px;
  color: #fff;
  line-height: 1.25;
  text-align: center;
  text-decoration: none;
  text-indent: 0;
  background: #900;
  border: 2px solid #fff;
  box-shadow: 1px 1px 5px rgba(0,0,0,0.5);
}
</style>
<?php
}
if(!isset($popup))
{ $popup="N"; }
if($popup=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/popup.min.css" rel="stylesheet">
<?php
}
if(!isset($label))
{ $label="N"; }
if($label=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/label.min.css" rel="stylesheet">
<?php
}
if(!isset($item))
{ $item="N"; }
if($item=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/item.min.css" rel="stylesheet">
<?php
}

if(!isset($rating))
{ $rating="N"; }
if($rating=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/rating.min.css" rel="stylesheet">
<?php
}

if(!isset($slider))
{ $slider="N"; }
if($slider=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/slider.min.css" rel="stylesheet">
<?php
}

if(!isset($nags))
{ $nags="N"; }
if($nags=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/nag.min.css" rel="stylesheet">
<?php
}
if(!isset($dropdown))
{ $dropdown="N"; }
if($dropdown=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/dropdown.min.css" rel="stylesheet">
<?php
}
if(!isset($accordion))
{ $accordion="N"; }
if($accordion=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/accordion.min.css" rel="stylesheet">
<?php
}
if(!isset($step))
{ $step="N"; }
if($step=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/step.min.css" rel="stylesheet">
<?php
}

if(!isset($addVertise))
{ $addVertise="N"; }
if($addVertise=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/components/ad.min.css" rel="stylesheet">
<?php
}
// end Fomantic -----------------------

if(!isset($adminArea))
{ $adminArea="N"; }
if($adminArea=="S")
{
?>
<style type="text/ css" rel="stylesheet">
    .hidden.menu {
      display: none;
    }
    .masthead.segment {
      min-height: 700px;
      padding: 1em 0em;
    }
    .masthead .logo.item img {
      margin-right: 1em;
    }
    .masthead .ui.menu .ui.button {
      margin-left: 0.5em;
    }
    .masthead h1.ui.header {
      margin-top: 3em;
      margin-bottom: 0em;
      font-size: 4em;
      font-weight: normal;
    }
    .masthead h2 {
      font-size: 1.7em;
      font-weight: normal;
    }

    .ui.vertical.stripe {
      padding: 8em 0em;
    }
    .ui.vertical.stripe h3 {
      font-size: 2em;
    }
    .ui.vertical.stripe .button + h3,
    .ui.vertical.stripe p + h3 {
      margin-top: 3em;
    }
    .ui.vertical.stripe .floated.image {
      clear: both;
    }
    .ui.vertical.stripe p {
      font-size: 1.33em;
    }
    .ui.vertical.stripe .horizontal.divider {
      margin: 3em 0em;
    }

    .quote.stripe.segment {
      padding: 0em;
    }
    .quote.stripe.segment .grid .column {
      padding-top: 5em;
      padding-bottom: 5em;
    }

    .footer.segment {
      padding: 5em 0em;
    }

    .secondary.pointing.menu .toc.item {
      display: none;
    }

    @media only screen and (max-width: 700px) {
      .ui.fixed.menu {
        display: none !important;
      }
      .secondary.pointing.menu .item,
      .secondary.pointing.menu .menu {
        display: none;
      }
      .secondary.pointing.menu .toc.item {
        display: block;
      }
      .masthead.segment {
        min-height: 350px;
      }
      .masthead h1.ui.header {
        font-size: 2em;
        margin-top: 1.5em;
      }
      .masthead h2 {
        margin-top: 0.5em;
        font-size: 1.5em;
      }
    }
</style>
<?php
}
?>
<!-- End If Using CSS -->
<!-- Extra -->

<?php
if(!isset($aos))
{ $aos="N"; }
if($aos=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/aos/aos.css" rel="stylesheet">
<?php
}
if(!isset($slick))
{ $slick="N"; }

if($slick=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/slick/slick.min.css" rel="stylesheet">
<link href="<?php echo $dirRoot; ?>libs2/slick/slick-theme.min.css" rel="stylesheet">
<?php
}
if(!isset($swiper))
{ $swiper="N"; }
if($swiper=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/swiper/swiper-bundle.min.css" rel="stylesheet">
<link href="<?php echo $dirRoot; ?>libs2/swiper/swiper.css" rel="stylesheet">
<?php
}

if(!isset($scrollBar))
{ $scrollBar="N"; }
if($scrollBar=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/scrollbar/perfect-scrollbar.css" rel="stylesheet">
<?php
}

if(!isset($countUp))
{ $countUp="N"; }
if($countUp=="S")
{
?>
<style>
.countUp { font-size: 2.5rem; font-weight: 500; }
.countUp span { color: #42413d; }
</style>
<?php
}
if(!isset($jqueryUI))
{ $jqueryUI="N"; }
if($jqueryUI=="S")
{
?>
<!-- Google Fonts -->
<link href="<?php echo $dirRoot; ?>libs2/jquery-ui/jquery-ui.min.css" rel="stylesheet">
<!-- Styles -->
<?php
}

if(!isset($userLogin))
{ $userLogin="N"; }

if(!isset($topAdmin))
{ $topAdmin="N"; }
if($topAdmin=="S")
{
?>
<link href="<?php echo $dirRoot; ?>libs2/css/style-admin.css" rel="stylesheet">
<link href="<?php echo $dirRoot; ?>libs2/css/cards.css" rel="stylesheet">
<link href="<?php echo $dirRoot; ?>libs2/css/grid.css" rel="stylesheet">
<?php
}
else
{
?>
<link href="<?php echo $dirRoot; ?>libs2/css/style.css" rel="stylesheet">
<link href="<?php echo $dirRoot; ?>libs2/css/cards.css" rel="stylesheet">
<?php
if($userLogin=="S")
{
?>
<style>
body {
 background: #e3e6e6;
 background-color: #e3e6e6;
 color:#000;
}
a {
    color: #000;
}
</style>
<?php
 }
}
?>
<link href="<?php echo $dirRoot; ?>libs2/css/fontsstyle.css" rel="stylesheet">
<?php
$mobile="N";
$tablet="N";
require_once "$dirRoot"."libs1/Mobile_Detect.php";
$detect = new Mobile_Detect;
// Any mobile device (phones or tablets).
if ( $detect->isMobile() ) {
 $mobile="S";
}
// Any tablet device.
if( $detect->isTablet() ){
 $tablet="S";
}
if(!isset($mainFile))
{ $mainFile="N"; }
if($mainFile=="S")
{
?>
<style>
body {
background: rgb(23,64,107);
background: linear-gradient(180deg, rgba(23,64,107,1) 0%, rgba(23,64,107,1) 12%, rgba(255,255,255,1) 100%);
    height: 100%;
    margin: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
</style>
<?php
}
?>
<link rel="apple-touch-icon" href="<?php echo $dirRoot; ?>imagenes/favicon_io/favicon.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $dirRoot; ?>imagenes/favicon_io/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $dirRoot; ?>imagenes/favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $dirRoot; ?>imagenes/favicon_io/favicon-16x16.png">
</head>
<?php
if(!isset($topAdmin))
{ $topAdmin="N"; }
if(!isset($forms))
{ $forms="N"; }
if($mobile=="S")
{
?>
<body id="top" translate="no" style="background-color:#e3e6e6;color:#000;margin-top:60px;">
<?php
}

if($topAdmin=="S" and $mobile=="N")
{
?>
<body id="top" translate="no" style="background-color:#fff;color:#000">
<?php
}
else
{
 if($userLogin=="S")
 {
?>
<body id="top" translate="no" style="margin-top:60px;" onLoad="document.forms[0].elements[0].focus()">
<?php
  }else{
  if($forms=="S" and $topAdmin=="N")
  {
?>
<body id="top" translate="no" style="margin-top:60px;" onLoad="document.forms[0].elements[0].focus()">
<?php
  }else{
?>
<body id="top" translate="no" style="margin-top:60px;" style="background-color:#fff;color:#000">
<?php
  }
 }
}
if($pageLoader=="S")
{
?>
<!-- Page Loader -->
<div id="loader-wrapper">
 <div id="loader"></div>
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div>
<?php
}
?>
