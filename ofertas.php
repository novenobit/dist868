<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  index.php                                                  //
// ****************************************************************
include_once("./includes/session.php");

$aos="S";
$autoPro="S";
$countUp="N";
$dirRoot="./";
$divider="S";
$dropdown="S";
$forms="S";
$header="S";
$icon="S";
$icofont="N";
$iconKids="N";
$image="S";
$input="S";
$item="N";
$label="S";
$list="S";
$mainFile="N";
$menu="S";
$message="S";
$nags="N";
$frame="S";
$noFrame="S";
$pageLoader="N";
$popup="N";
$rating="N";
$sidebar="N";
$slick="S";
$swiper="S";
$table="S";

include_once("./includes/config.ini.php");
//include("./data/cat-list1.php");
if(!isset($mobile))
{ $mobile="N"; }
?>

<style>
.spacer {
    height: 50px;
}
</style>
<div class="spacer"></div>

<!-- header -->
<div class="ui container pad-top-30 pad-bottom-30">
   <div class="center aligned segment">
      <div class="ui horizontal divider">Monthly Specials</div>
   </div>
</div>

<div class="spacer"></div>

<!-- cards -->
<div class="ui container">
   <div class="ui four column grid">
      <div class="row">
         <div class="column">
            <div class="ui card">
               <div class="image">
                  <a class="ui red right ribbon label">-50%</a>
                  <img src="https://mrpg.scene7.com/is/image/MRP/01_1104170929_SI_11?wid=360&hei=540&qlt=80" />
               </div>
               <div class="content">
                  <a class="header">Denim Dress</a>
                  <div class="description">
                     Nec vestibulum eget augue sit vel varius, lacus sem.
                  </div>
               </div>
               <div class="extra content">
                  <a class="ui teal tag label">R500</a>
               </div>
            </div>
         </div>
         <div class="column">
            <div class="ui card">
               <div class="image">
                  <a class="ui red right ribbon label">-50%</a>
                  <img src="https://mrpg.scene7.com/is/image/MRP/01_1100211387_SI_11?wid=360&hei=540&qlt=80" />
               </div>
               <div class="content">
                  <a class="header">Patterned Tunic</a>
                  <div class="description">
                     Nec vestibulum eget augue sit vel varius, lacus sem.
                  </div>
               </div>
               <div class="extra content">
                  <a class="ui teal tag label">R460</a>
               </div>
            </div>
         </div>
         <div class="column">
            <div class="ui card">
               <div class="image">
                  <a class="ui red right ribbon label">-50%</a>
                  <img src="https://mrpg.scene7.com/is/image/MRP/01_1110210428_SI_11?wid=360&hei=540&qlt=80" />
               </div>
               <div class="content">
                  <a class="header">Yellow Floral Dress</a>
                  <div class="description">
                     Nec vestibulum eget augue sit vel varius, lacus sem.
                  </div>
               </div>
               <div class="extra content">
                  <a class="ui teal tag label">R780</a>
               </div>
            </div>
         </div>
         <div class="column">
            <div class="ui card">
               <div class="image">
                  <a class="ui red right ribbon label">-50%</a>
                  <img src="https://mrpg.scene7.com/is/image/MRP/01_1150210826_SI_11?wid=360&hei=540&qlt=80" />
               </div>
               <div class="content">
                  <a class="header">Maroon Bodycon Dress</a>
                  <div class="description">
                     Nec vestibulum eget augue sit vel varius, lacus sem.
                  </div>
               </div>
               <div class="extra content">
                  <a class="ui teal tag label">R300</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="spacer"></div>


<?php
$endPage="N";
include("./includes/statusbar.php");
?>
</body>
</html>
