<?php
//include("$dirRoot"."data/swiperSlider2.php");
?>
<style>
.swiper-container {
  width: 100%;
}
.swiper-slide33333 {
  height: 200px;
  background: #ffffff;
  line-height: 300px;
  text-align: center;
}

.swiper-slide {
   background: #ffffff;
}

.swiper-slide:nth-child(2) {
  background: #ffffff;
}
.swiper-slide:nth-child(3) {
  background: #ffffff;
}
.swiper-slide:nth-child(4) {
  background: #ffffff;
}
.swiper-slide:nth-child(5) {
  background: #ffffff;
}
.swiper-slide:nth-child(6) {
  background: #ffffff;
}
.swiper-slide:nth-child(7) {
  background: #ffffff;
}

.container3 {
  min-width: 100%;
  overflow: hidden;
}
.scrolling3 {
  animation: marquee 20s linear infinite;
  display: inline-block;
  min-width: 100%;
  white-space: nowrap;
  overflow: hidden;
}

@keyframes marquee {
  from {
    transform: translateX(100%);
  }
  to {
    transform: translateX(-100%);
  }
}
</style>

<a  href='user-registrar1.php' class="ui visible message" style="background-color:#010101;color:#fff;text-align:center;border-radius:15px;">
  <h3>Revendedores, Mayoristas y Distribuidores Entra Aqui.</h3>
</a>

<div class="ui hidden divider"></div>
<div class="swiper mySwiper">
  <div class="swiper-wrapper">
     <?php
      $num=1;
      $tableBucar="productos";
      $campo1="id_productos";
      $campo2="cod_subcategoria";
      $sqlProDataAdd=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,precio2_producto,foto_producto from productos where foto_producto<>'' and activo='S' order by rand() limit 20");
      while($ProDataAdd=mysqli_fetch_array($sqlProDataAdd))
      {
       $idpro=$ProDataAdd['id_producto'];
       $codProducto=$ProDataAdd['cod_producto'];
       $nomProducto=strtolower($ProDataAdd['nom_producto']);
       $precio1_producto=$ProDataAdd['precio1_producto'];
       $precio2_producto=$ProDataAdd['precio2_producto'];
       $fotoProducto=$ProDataAdd['foto_producto'];
       if($fotoProducto=="")
       { $fotoProducto="sinfoto.png"; }
     ?>
      <div class="swiper-slide" style="line-height:1;margin-right:10px;margin-left:10px;">
       <div class="ui card" style="background-color:#fff;padding:1em;height:200px;">
         <div class="image" style="background-color:#fff;">
          <?php
            // echo "<a href='vercat3.php?idpro=$idpro'><img class='ui medium centered image' src='$dirRoot"."imagenes/productos/$fotoProducto' style='height:100px;width:100px;'></a>";
            echo "<a href='vercat3.php?idpro=$idpro'>";
             if(!file_exists("$dirRoot"."imagenes/productos/$fotoProducto"))
             {
               echo "<img class='ui medium centered image' src='$dirRoot"."imagenes/sinfoto.png' style='height:100px;width:100px;' alt='$nomProducto'>";
             }
             else
             {
               echo "<img class='ui medium centered image' src='$dirRoot"."imagenes/productos/$fotoProducto' style='height:100px;width:100px;' alt='$nomProducto'>";
             }
            echo "</a>";

          ?>
         </div>
         <div>
         <div class="extra content">
          <div class="description">
            <?php echo $nomProducto; ?>
            <p><a class="header">Ref
            <?php
              if($precio1_producto>0)
              {
               echo "S:$precio1_producto <span class='font-red'>M:$precio2_producto</span>";
              }
              else
              {
               if($precio2_producto>0)
               {
                echo "<span class='font-red'>M:$precio2_producto</span>";
               }
              }
            ?></p></a>
          </div>
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

<div class="ui hidden divider"></div>
<div class="ui visible message"  style="border-radius:25px;background-color:#fff;color:#000;text-align:center">
  <span class='font-16'>Descubre tu próxima oportunidad de negocio visitando nuestra tienda.</span>
  <div class="container3 font-18"><p class="scrolling3">Unirse a nuestra comunidad de rápido crecimiento y encuentre lo que necesita. Tenemos más de 6000 productos en más de 20 categorías.</p></div>
</div>
