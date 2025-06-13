<?php
//include("$dirRoot"."data/swiperSlider.php");
?>
<style>
.mySwiper3 {
  width: 100%;
  text-align: center;
}
</style>
<div class="swiper mySwiper3">
  <div class="swiper-wrapper">
     <?php
      $num=1;
      $tableBucar="productos";
      $campo1="id_productos";
      $campo2="cod_subcategoria";
      $sqlProDataAdd=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,foto_producto from productos where foto_producto<>'' and activo='S' order by rand() limit 20");
      while($ProDataAdd=mysqli_fetch_array($sqlProDataAdd))
      {
       $idpro=$ProDataAdd['id_producto'];
       $codProducto=$ProDataAdd['cod_producto'];
       $nomProducto=$ProDataAdd['nom_producto'];
       $precio1_producto=$ProDataAdd['precio1_producto'];
       $fotoProducto=$ProDataAdd['foto_producto'];
       if($fotoProducto=="")
       { $fotoProducto="sinfoto.png"; }
       if($num==1)
       {
     ?>
       <div class="swiper-slide active-slider">
     <?php
       }
       else
       {
     ?>
       <div class="swiper-slide">
     <?php
       }
     ?>
        <div class="ui horizontal card">
          <div class="rounded image" style='background-color:#ffffff;'>
           <?php
            echo "<a href='vercat3.php?idpro=$idpro'>";
             if(!file_exists("$dirRoot"."imagenes/productos/$fotoProducto"))
             {
               echo "<img class='ui small centered image' src='$dirRoot"."imagenes/sinfoto.png' style='height:160px;' alt='$nomProducto'>";
             }
             else
             {
               echo "<img class='ui small centered image' src='$dirRoot"."imagenes/productos/$fotoProducto' style='height:160px;' alt='$nomProducto'>";
             }
            echo "</a>";
           ?>
          </div>
          <div class="content">
           <div class="header"> <?php echo $nomProducto; ?></div>
           <div class="meta">
            <span class="category font-red">Ref: <?php echo $precio1_producto; ?></span>
           </div>
           <div class="description">
            <p></p>
           </div>
          </div>
        </div>
       </div>
     <?php
       $num++;
       $Data="";
      }
      if(isset($sqlProDataAdd))
      { mysqli_free_result($sqlProDataAdd); }
    ?>
 </div>
</div>
