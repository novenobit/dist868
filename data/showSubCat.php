<?php
//include("$dirRoot"."data/showSubCat.php");
?>
<style>
.swiper-button-prev,
.swiper-button-next {
  color: #2F4F4F;
}
.sample-slider [class^="swiper-button-"]::after{
    font-size: 20px;
}
:root {   --swiper-navigation-size: 30px;
</style>
<?php
if(isset($codSubCat) and $codSubCat<>"")
{
 if(!isset($imageSize) or $imageSize=="")
 { $imageSize="200px"; }
?>
 <div class="swiper mySwiper6">
  <div class="swiper-wrapper">
<?php
     $tableBucar="subcategoria";
     $campo1="id_subcategoria";
     $campo2="cod_categoria";
     $linkpage="vercat1.php";
     $numFilas=0;

     $sqlSubCat2=mysqli_query($conex1,"select id_subcategoria,cod_subcategoria,nom_subcategoria,foto_subcategoria from subcategoria where cod_categoria='$codCat' order by nom_subcategoria");
     while($subCatDataB=mysqli_fetch_array($sqlSubCat2))
     {
       $idSubCat2=$subCatDataB['id_subcategoria'];
       $codSubCat2=$subCatDataB['cod_subcategoria'];
       $nom_subcategoria2=$subCatDataB['nom_subcategoria'];
       $foto_subcategoria=$subCatDataB['foto_subcategoria'];
       if($foto_subcategoria=="")
       { $foto_subcategoria="sinfoto.png"; }
       $idBuscar=$codSubCat2;
       //include("./libs1/getNumber.php");
       if($numFilas==0)
       {
        echo "<div class='center aligned swiper-slide padded' style='background-color:#ffffff;text-align:center;'>
         <div class='center aligned aos-item' aos='zoom-in'>
          <a href='vercat-foto3.php?op=pl&id=$idSubCat2&codCat=$codCat&codSubCat=$codSubCat2'>
           <img class='ui centered image' src='./imagenes/menu/$foto_subcategoria' style='height:$imageSize;' alt='$nom_subcategoria2'>
          </a>
          <div class='content'>
           <div class='meta'>
            <a>$nom_subcategoria2</a>
           </div>
          </div>
         </div>
        </div>";
       }
     }
     if(isset($sqlCat2))
     { mysqli_free_result($sqlCat2); }
?>
  </div>
    <div class="swiper-button-next" style='background-color:#ffffff;'></div>
    <div class="swiper-button-prev" style='background-color:#ffffff;'></div>  
 </div>
<?php
}
?>
