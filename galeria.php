<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  galeria.php                                                //
// ****************************************************************
include_once("./includes/session.php");

$animeJs="S";
$header="S";
$image="S";
$menu="S";
$divider="N";
$icon="S";
$input="S";
$list="S";
$sidebar="N";
$table="N";
$message="N";
$popup="N";
$label="N";
$item="N";
$rating="N";
$aos="S";
$slick="S";
$swiper="S";
$autoPro="S";
$divider="S";
$dropdown="S";
$dirRoot="./";
include_once("./includes/config.ini.php");
?>
<style>
* {
  box-sizing: border-box;
}

.row2 {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  padding: 0 4px;
}

/* Create four equal columns that sits next to each other */
.column2 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
  max-width: 25%;
  padding: 0 4px;
}

.column2 img {
  margin-top: 8px;
  vertical-align: middle;
  width: 100%;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 800px) {
  .column2 {
    -ms-flex: 50%;
    flex: 50%;
    max-width: 50%;
  }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column2 {
    -ms-flex: 100%;
    flex: 100%;
    max-width: 100%;
  }
}

.ml12 {
  font-weight: 200;
  font-size: 1.8em;
  text-transform: uppercase;
  letter-spacing: 0.5em;
}

.ml12 .letter {
  display: inline-block;
  line-height: 1em;
}
.ml15 {
  font-weight: 800;
  font-size: 3.8em;
  text-transform: uppercase;
  letter-spacing: 0.5em;
}

.ml15 .word {
  display: inline-block;
  line-height: 1em;
}
</style>

<div class="ui centered container">
 <div class="ui hidden divider"></div>

 <div class="ui grid">
  <div class="sixteen wide column center aligned"  style="background-color:#FF0099;color:#ffffff;border-top-left-radius:25px;border-top-right-radius:25px;">
     <p class="ml12">Galeria de 100 Imagenes</p>
     <p>Productos de Alta Demanda, Oferta Limitada: Ven a visitarnos antes de que todo se acabe.</p>
  </div>
  <div class="sixteen wide column  center aligned" style="background-color:#ffffff;color:#17406b;">
   <div class="row2">
    <div class='column2'>
     <?php
      $num=0;
      $tableBucar="productos";
      $campo1="id_productos";
      $campo2="cod_subcategoria";
      $sqlProDataAdd=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,precio2_producto,foto_producto from productos where foto_producto<>'' and activo='S' order by rand() limit 99");
      while($ProDataAdd=mysqli_fetch_array($sqlProDataAdd))
      {
       $idpro=$ProDataAdd['id_producto'];
       $codProducto=$ProDataAdd['cod_producto'];
       $nomProducto=$ProDataAdd['nom_producto'];
       $precio1_producto=$ProDataAdd['precio1_producto'];
       $precio2_producto=$ProDataAdd['precio2_producto'];
       $fotoProducto=$ProDataAdd['foto_producto'];
       if($fotoProducto=="")
       { $fotoProducto="sinfoto.png"; }

       echo "<div class='ui fluid card'>
        <a class='image' href='vercat3.php?idpro=$idpro'>
          <img class='ui centered image' src='$dirRoot"."imagenes/productos/$fotoProducto' alt='$nomProducto' title='$nomProducto Ref S:$precio1_producto M:$precio2_producto'>
        </a>
        <div class='content'>
          <a class='header' href='vercat3.php?idpro=$idpro'>Ref S:$precio1_producto <span class='font-red'>M:$precio2_producto</span></a>
          <div class='meta'>
            <a>$nomProducto</a>
          </div>
        </div>
       </div>";

       $num++;
       if($num>=25)
       {
        echo "</div><div class='column2'>";
        $num=1;
       }
      }
      if(isset($sqlProDataAdd))
      { mysqli_free_result($sqlProDataAdd); }
     ?>
    </div>
   </div>
  </div>
 </div>
 <div class="ui grid">
  <div class="sixteen wide column center aligned" style="background-color:#FF0099;color:#ffffff;border-bottom-left-radius:25px;border-bottom-right-radius:25px;">
   <h1 class="ml15">
     <span class="word">¡Date prisa, nuestro inventario se agota!</span>
   </h1>
   <h3>Nuestro inventario se mueve rápido: visite la tienda antes de que se acabe todo.</h3>
  </div>
 </div>
 <div class="ui hidden divider"></div>
 <div class="ui grid">
  <div class="sixteen wide column center aligned">
    <h1 style="color:#6C7A89;font-family:'Open Sans', sans-serif; font-size: 34px; font-weight: 300; line-height: 40px; margin: 0 0 16px;">Cantidad Limitada</h1>
    <h3>¡Se acabaron las existencias! ¿La mejor decisión? Visítanos ahora antes de que te lo pierdas.</h3>
  </div>
 </div>

</div>

<?php
$endPage="N";
include("./includes/statusbar.php");
?>

<script>
// Wrap every letter in a span
var textWrapper = document.querySelector('.ml12');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml12 .letter',
    translateX: [40,0],
    translateZ: 0,
    opacity: [0,1],
    easing: "easeOutExpo",
    duration: 1200,
    delay: (el, i) => 500 + 30 * i
  }).add({
    targets: '.ml12 .letter',
    translateX: [0,-30],
    opacity: [1,0],
    easing: "easeInExpo",
    duration: 1100,
    delay: (el, i) => 100 + 30 * i
  });

anime.timeline({loop: true})
  .add({
    targets: '.ml15 .word',
    scale: [14,1],
    opacity: [0,1],
    easing: "easeOutCirc",
    duration: 800,
    delay: (el, i) => 800 * i
  }).add({
    targets: '.ml15',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });
</script>
</body></html>
