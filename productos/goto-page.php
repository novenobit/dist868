<?php
include_once("../includes/session.php");

$accordion="N";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$findData="S";
$forms="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$jQueryModal="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$popupWindow="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$tag="S";
$table="S";
$topAdmin="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
include_once("$dirRoot"."bots/AreasSistema.php");
if(!isset($iduser))
{ include_once("$dirRoot"."users/user-check2.php"); }
if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

include("find-products.php");

if(isset($_GET['id']))
{ $id="$_GET[id]"; }

//echo "producto-ver3.php ? id = $id & modalId = $modalId";
//echo "<html><meta http-equiv=refresh content=0;url=producto-ver3.php?op=ver&id=$id&modalId=$modalId>";
//producto-ver3.php?id=$id_producto&modalId=$num
// echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."productos/producto-ver3.php?op=ver&id=$id>";
include("$dirRoot"."bots/bot-productos.php");
include("$dirRoot"."data/producto-data.php");
?>

<div class="ui attached message">
  <div class="header">
   <?php echo "<h2>$nom_producto</h2>"; ?>
  </div>
</div>
<?php
  include("producto-ver3.php");
  include("statusbar.php");
?>

