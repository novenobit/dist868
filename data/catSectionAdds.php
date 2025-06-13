<!-- catSectionAdds.php -->
<div class="ui container">
 <div class="ui hidden divider"></div>
 <h2 class="ui horizontal divider header aos-item" aos="zoom-in-down">
  <span class='font-red'>Favoritos</span>
 </h2>
 <div class="ui hidden divider"></div>
 <div class="ui computer only centered grid">
  <div class="four column stretched row">
   <?php
    $num=0;
    // include("./data/add-vertical.php");
    // <img class="ui rounded image aos-item" aos="zoom-in-right" src="./imagenes/banners/catSectionBannerL.png">
    $sqlSubCat3=mysqli_query($conex1,"select cod_subcategoria from productos where foto_producto<>'' and activo='S' order by rand() limit 4");
    while($subCatData3=mysqli_fetch_array($sqlSubCat3))
    {
      $cod_subcategoria=$subCatData3['cod_subcategoria'];
      echo "<div class='column'>";
        $numRegShow=1;
        include("$dirRoot"."data/one-product.php");
      echo "</div>";
      $num++;
    }
   ?>
  </div>
  <div class=" center aligned sixteen wide column">
   <a href="galeria.php" class="item">Los mejores items importados de USA y China.</a>
  </div>
 </div>
</div>
