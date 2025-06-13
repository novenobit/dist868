<?php
// ******************************************************* 2023 ***
// *  Pagina de Encabezado Principal del Sistema ven868.net      //
// *  headfileFrame.php                                          //
// ****************************************************************
if (ob_get_level() == 0) ob_start();
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libUsers.php");
include_once("$dirRoot"."libs1/libGeneral.php");
//include_once("$dirRoot"."libs1/libMail.php");
//include_once("$dirRoot"."libs1/libBarsBoxes.php");
//include_once("$dirRoot"."libs1/libBanners.php");
//include_once("$dirRoot"."libs1/libImages.php");
if(!isset($findData))
{ $findData="N"; }
if($findData=="S")
{ include_once("$dirRoot"."libs1/libFindData.php"); }
//include_once("$dirRoot"."libs1/libAC.php");
//include_once("$dirRoot"."includes/configSet.php");
//include_once("$dirRoot"."includes/configVAR.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Distribuidora 868 C.A</title>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/reset.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/site.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/container.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/grid.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/card.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/segment.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/button.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/transition.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/text.min.css">
<!-- If Using CSS -->
<?php

if(!isset($noFrame))
{ $noFrame="N"; }
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

if(!isset($header))
{ $header="N"; }
if($header=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/header.min.css">
<?php
}
if(!isset($image))
{ $image="N"; }
if($image=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/image.min.css">
<?php
}
if(!isset($menu))
{ $menu="N"; }
if($menu=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/menu.min.css">
<?php
}

if(!isset($breadCrumb))
{ $breadCrumb="N"; }
if($breadCrumb=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>/libs2/components/breadcrumb.min.css">
<?php
}

if(!isset($divider))
{ $divider="N"; }
if($divider=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/divider.min.css">
<?php
}
if(!isset($icon))
{ $icon="N"; }
if($icon=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/icon.min.css">
<?php
}
if(!isset($input))
{ $input="N"; }
if($input=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/input.min.css">
<?php
}

if(!isset($checkbox))
{ $checkbox="N"; }
if($checkbox=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/checkbox.min.css">
<?php
}

if(!isset($forms))
{ $forms="N"; }
if($forms=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/form.min.css">
<?php
}

if(!isset($list))
{ $list="N"; }
if($list=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/list.min.css">
<?php
}
if(!isset($sideBar))
{ $sideBar="N"; }
if($sideBar=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/sidebar.min.css">
<?php
}
if(!isset($tabs))
{ $tabs="N"; }
if($tabs=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/tab.min.css">
<?php
}
if(!isset($table))
{ $table="N"; }
if($table=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/table.min.css">
<?php
}
if(!isset($message))
{ $message="N"; }
if($message=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/message.min.css">
<?php
}
if(!isset($modal))
{ $modal="N"; }
if($modal=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/dimmer.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/modal.min.css">
<?php
}

if(!isset($jQueryModal))
{ $jQueryModal="N"; }
if($jQueryModal=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/jqmodal/jquery.modal.min.css">
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
  -webkit-border-radius:  26px;
  -moz-border-radius:     26px;
  -o-border-radius:       26px;
  -ms-border-radius:      26px;
  -moz-box-shadow:    1px 1px 5px rgba(0,0,0,0.5);
  -webkit-box-shadow: 1px 1px 5px rgba(0,0,0,0.5);
  box-shadow:         1px 1px 5px rgba(0,0,0,0.5);
}
</style>
<?php
}
if(!isset($popup))
{ $popup="N"; }
if($popup=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/popup.min.css">
<?php
}
if(!isset($label))
{ $label="N"; }
if($label=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/label.min.css">
<?php
}
if(!isset($item))
{ $item="N"; }
if($item=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/item.min.css">
<?php
}

if(!isset($rating))
{ $rating="N"; }
if($rating=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/rating.min.css">
<?php
}

if(!isset($slider))
{ $slider="N"; }
if($slider=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/slider.min.css">
<?php
}

if(!isset($nags))
{ $nags="N"; }
if($nags=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/nag.min.css">
<?php
}
if(!isset($dropdown))
{ $dropdown="N"; }
if($dropdown=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/dropdown.min.css">
<?php
}
if(!isset($accordion))
{ $accordion="N"; }
if($accordion=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/accordion.min.css">
<?php
}
if(!isset($step))
{ $step="N"; }
if($step=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/step.min.css">
<?php
}
// end Fomantic -----------------------

if(!isset($adminArea))
{ $adminArea="N"; }
if($adminArea=="S")
{
?>
<style type="text/css">
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
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/aos/aos.css">
<?php
}
if(!isset($slick))
{ $slick="N"; }

if($slick=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/slick/slick.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/slick/slick-theme.min.css">
<?php
}
if(!isset($swiper))
{ $swiper="N"; }
if($swiper=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/swiper/swiper-bundle.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/swiper/swiper.css">
<?php
}

if(!isset($scrollBar))
{ $scrollBar="N"; }
if($scrollBar=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/scrollbar/perfect-scrollbar.css">
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
if(!isset($jqueryUi))
{ $jqueryUi="N"; }
if($jqueryUi=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/jquery-ui/jquery-ui.min.css">
<?php
}
if(!isset($topAdmin))
{ $topAdmin="N"; }
if($topAdmin=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/css/style-admin.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/css/cards.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/css/grid.css">
<?php
}
else
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/css/cards.css">
<?php
}
?>

<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/css/fontsstyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/css/buttons-round.css">

<?php
if(!isset($checkbox2))
{ $checkbox2="N"; }
if($checkbox2=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/css/check-box.css">
<?php
}

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
?>
</head>
<?php
if(!isset($whiteBackground))
{
 $whiteBackground="N";
}

if(!isset($forms))
{ $forms="N"; }
if($forms=="S" and $whiteBackground=="N")
{
//<body id="top" onLoad="document.forms[0].elements[0].focus()" style="background-color:#2d2f31;color:#ffffff;">
// $whiteBackground="N";
}
if($whiteBackground=="S")
{
//<body id="top" style="background-color:#ededed;color:#000;">
}
else{
//<body id="top" style="background-color:#fff;color:#000;">
}
?>
<body id="top">
<?php
if(isset($_SESSION))
{
 if(isset($_SESSION['iduser']))
 { $iduser=$_SESSION['iduser']; }
 if(isset($_SESSION['usuario']))
 { $usuario=$_SESSION['usuario']; }
 if(isset($_SESSION['idnivel']))
 { $idnivel=$_SESSION['idnivel']; }
}
if(!isset($iduser))
{ $iduser=""; }
if(!isset($idnivel))
{ $idnivel="4"; }

if(!isset($areasSistema))
{
 include_once("../bots/AreasSistema.php");
}
if(isset($_GET['sistema']))
{ $sistema=$_GET['sistema']; }
?>
