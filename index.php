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

//if($mobile=="S" or $tablet=="S")
if($mobile=="S")
{
 //include("./mobile/mobile-data.php");
 echo "<html><meta http-equiv=refresh content=0;url=./mobile.php>";
 exit();
}
else
{
?>
   <div class="ui container">
    <div class="ui mobile only grid">
     <div class="stretched row">
        <div class="column">
          <?php
           include("./data/categoria-swipe.php");
          ?>
        </div>
      </div>
    </div>
    <div class="ui tablet only grid">
     <div class="stretched row">
        <div class="column">
          <?php
           include("./data/categoria4.php");
          ?>
        </div>
      </div>
    </div>
    <div class="ui computer only grid">
     <div class="stretched row">
        <div class="sixteen wide column">
          <?php
           include("./data/categoria4.php");
          ?>
        </div>
      </div>
    </div>
   </div>


   <!--End Section-->
   <div class="ui container">
    <div class="ui tablet only grid">
     <div class="stretched row">
        <div class="column">
         <?php
           include("./data/front3.php");
         ?>
        </div>
       </div>
    </div>
   </div>
   <!--End Section-->
   <div class="ui hidden divider"></div>
   <div class="ui container">
       <h2 class="ui horizontal divider header aos-item" aos='fade-up-right'> <span class='blueText'><i class="heart outline icon"></i></span> Te van a <span class='blueTextBold'>gustar</span> estos productos populares</h2>

    <div class="ui computer only grid">
     <div class="stretched row">
        <div class="twelve wide column">
         <?php
           include("./data/front3.php");
         ?>
        </div>
        <div class="three wide column">
         <?php
           $numRegShow=1;
           include("./data/one-product.php");
         ?>
        </div>
       </div>
    </div>
    <div class="ui computer only grid">
     <div class="stretched row">
        <div class="three wide column">
         <?php
           $numRegShow=1;
           include("./data/one-product.php");
         ?>
        </div>
        <div class="twelve wide column">
         <?php
           include("./data/front3.php");
         ?>
        </div>
       </div>
    </div>

   <div class="ui hidden divider"></div>

   <div class="ui container">
    <div class="ui computer only  grid">
     <div class="stretched row">
        <div class="three wide column">
         <?php
           $numRegShow=1;
           include("./data/one-product.php");
         ?>
        </div>
        <div class="twelve wide column">
         <?php
           include("./data/front3.php");
         ?>
        </div>
       </div>
     </div>
   </div>


   </div>
   <!--End Section-->
   <div class="ui hidden divider"></div>
   <?php
    include("./data/one-dolar.php");
   ?>
   <!--End Section-->

   <div class="ui hidden divider"></div>
   <!--End Section-->
   <div class="ui container" style="max-width:1100px;margin-top:10px;">
     <?php
       include("./data/swiperSlider2.php");
     ?>
   </div>
   <!--End Section-->

   <div class="ui container" style="max-width:1100px;margin-top:30px;">
    <?php
     //include("./data/buscar-datos.php");
     include("./data/add1.php");
     include("./data/ofertas3.php");
     //include("./data/navidad.php");
    ?>
   </div>


   <!-- -------------------------------------- -->
   <div class="ui text container center aligned" style="max-width:1100px;margin-top:40px;color:#000000;text-align:center;border-radius:25px;padding: 10px 10px 10px 10px;">
   <!-- ------------------------- -->

    <div class="ui stackable three column grid">
     <div class="column">
         <?php
           $numRegShow=2;
           include("./data/one-product.php");
         ?>
     </div>
     <div class="column center aligned">
      <div class="ui centered card">
       <h2>Síguenos en Whatsapp</h2>
        <div class="image">
           <a href='https://wa.me/574242729756?text=I'm%20interested%20in%20your%20products%20for%20sale%20dist868' target='_blank'><img src="./imagenes/people/manager.png"" alt="Whatsapp"></a>
        </div>
        <div class="content" style="max-width:100%;background-color:#ffffff;color:#000000;">
          <h1>Tienes una Pregunta?</h1>

            <span class='font-14'><i class="phone alternate icon"></i> Habla con uno de nuestro Experto en Ventas</span>
            <p><span class='font-12'>Póngase en contacto y permítanos saber cómo podemos ayudarle.
             <br>Si tenemos tus productos Favoritos al Mejor Precio
             <br>Si tenemos Servicios de Despacho en la Gran Caracas</span></p>

          <div class="description">
            <a aria-label="Chat en WhatsApp" href="https://wa.me/574242729756" target="_blank"> <img alt="Chat con WhatsApp" src="./imagenes/empresa/whatsappButton.png" class='ui rounded image'></a>
          </div>
        </div>
     </div>
     </div>
     <div class="column">
         <?php
           $numRegShow=2;
           include("./data/one-product.php");
         ?>
     </div>
    </div>
    <div class="ui hidden divider"></div>
    <a class="ui primary button" href='productos-buscar.php'>Pisa Aquí Para Ver Todos Los Nuevos Productos Que Han Llegado A Nuestros Estantes.</a>
    <div class="ui hidden divider"></div>
   </div>
   <!-- ------------------------- -->

<?php
  include("./data/last-minute.php");

} // end Not Mobile

$endPage="N";
include("./includes/statusbar.php");
?>
<script>
var swiper = new Swiper(".mySwiper", {
  watchSlidesProgress: true,
  watchSlidesVisibility: true,
  slidesPerView: 6,
  loop: true,
});
</script>
</body>
</html>
