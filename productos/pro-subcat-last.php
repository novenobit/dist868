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

include("find-products.php");
// include("pro-subcat-last.php");
?>

<table class="ui unstackable celled long scrolling table">
 <tr>
  <td>10 Ultimos SubCat</td>
 </tr>
 <tr>
  <thead>
   <th class='center aligned' style="background-color:#fc411e;color:#ffffff;">C&oacute;digo</th>
   <th style="background-color:#fc411e;color:#ffffff;">Sub-Categor&iacute;a</th>
  </thead>
 </tr>
 <tbody>
 <?php
  $num=0;
  $sql=mysqli_query($conex1,"select * from subcategoria  order by id_subcategoria desc limit 10");
  while($subCatData=mysqli_fetch_array($sql))
  {
   $num_filas=0;
   include("$dirRoot"."datafiles/subCatData.php");
   echo "<tr>
    <td class='center aligned'>
      $cod_subcategoria
    </td>
    <td>
      <a href='pro-subcat-edit1.php?id=$id_subcategoria&modalId=$num'>$nom_subcategoria</a>
    </td></tr>";
   FlushData();
   $num++;
  }
 ?>
 </tbody>
</table>
