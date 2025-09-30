<?php
// ******************************************************* 2023 ***
// *  Pagina de Encabezado Principal del Sistema ven868.net      //
// *  headfilePrinter.php                                        //
// ****************************************************************
ini_set('default_charset', 'windows-1252');
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
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>Distribuidora 868 C.A</title>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
<meta name="description" content="ven868.net es un sistema de Venta de productos al detal y al mayor">
<!-- Site Properties -->
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

if(!isset($list))
{ $list="N"; }
if($list=="S")
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/components/list.min.css">
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
?>

<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/grid/simple-grid.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dirRoot; ?>libs2/css/fontsstyle.css">

</head>
<body>
