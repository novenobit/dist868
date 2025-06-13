<?php
if(isset($codCat) and $codCat<>"")
{
?>
 <!-- Swiper -->
 <div class="swiper mySwiper1">
  <div class="swiper-wrapper">
   <?php
      $tableBucar="b1920x300";
      $sqlBannerAdd=mysqli_query($conex1,"select * from b1920x300 where cod_categoria='$codCat' order by rand() limit 5");
      while($bannerAdd=mysqli_fetch_array($sqlBannerAdd))
      {
       $id=$bannerAdd['id'];
       $cod_banner=$bannerAdd['cod_banner'];
       $cod_categoria=$bannerAdd['cod_categoria'];
       $cod_subcategoria=$bannerAdd['cod_subcategoria'];
       $nom_banner=$bannerAdd['nom_banner'];
       $subtitle_banner=$bannerAdd['subtitle_banner'];
       $link_banner=$bannerAdd['link_banner'];
       $imagen_banner=$bannerAdd['imagen_banner'];
       $submitted=$bannerAdd['submitted'];
       $activo=$bannerAdd['activo'];
       if($imagen_banner<>"")
       {
         echo "<div class='swiper-slide'>
          <img class='ui image' src='./imagenes/banners/$imagen_banner'>
         </div>";
       }
      }
     ?>
  </div>
  <!-- Add Arrows -->
  <div class="swiper-button-next blueText"></div>
  <div class="swiper-button-prev blueText"></div>
 </div>
<?php
}
?>
