<?php
//include("$dirRoot"."data/categoria-swipe.php");
?>
<style>
.swiper-button-prev,
.swiper-button-next {
  color: #666;
}
.ico-title {
    font-size: 2em;
}
.iconlist {
    margin: 0;
    padding: 0;
    list-style: none;
    text-align: center;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
}
.iconlist li {
    position: relative;
    margin: 5px;
    width: 150px;
    cursor: pointer;
}
.iconlist li .icon-holder {
    position: relative;
    text-align: center;
    border-radius: 3px;
    overflow: hidden;
    padding-bottom: 5px;
    background: #F15025;
    color: #ffffff;
    border: 1px solid #E4E5EA;
    border-radius: 12px;
    transition: all 0.2s linear 0s;
}
.iconlist li .icon-holder:hover {
    background: #00C3DA;
    color: #ffffff;
}
.iconlist li .icon-holder:hover .icon2 i {
    color: #ffffff;
}
.iconlist li .icon-holder .icon2 {
    padding: 10px;
    text-align: center;
}
.iconlist li .icon-holder .icon2 i {
    font-size: 3em;
    color: #ffffff;
}
.iconlist li .icon-holder span {
    font-size: 12px;
    display: block;
    margin-top: 5px;
    border-radius: 3px;
}
</style>
<div class="swiper mySwiper2">
 <div class="swiper-wrapper">
  <ul class="iconlist">
 <?php
  if(!isset($textColor))
  { $textColor="blueTextBold"; }
  $tableBucar="subcategoria";
  $campo1="cod_categoria";
  $campo2="cod_subcategoria";
  $sqlCat=mysqli_query($conex1,"select id_categoria,cod_categoria,nom_categoria,icono from categoria order by nom_categoria");
  while($catData=mysqli_fetch_array($sqlCat))
  {
    $idCat=$catData['id_categoria'];
    $codCatT=$catData['cod_categoria'];
    $nom_categoria=$catData['nom_categoria'];
    $icono=$catData['icono'];
    echo "<a class='item swiper-slide padded' href='vercat1.php?op=pl&id=$idCat&codCat=$codCatT'>
     <li>
         <div class='icon-holder'>
           <div class='icon2'>
            <i class='$icono icon'></i>
           </div>
           <span>$nom_categoria</span>
         </div>
     </li>
    </a>";
 }
 if(isset($sqlCat))
 { mysqli_free_result($sqlCat); }
?>
  </ul>
 </div>
</div>
