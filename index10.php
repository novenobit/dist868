<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  index.php                                                  //
// ****************************************************************
include_once("./includes/session.php");

$header="S";
$image="S";
$menu="S";
$icon="S";
$input="S";
$list="S";
$sidebar="N";
$message="S";
$popup="N";
$item="N";
$rating="N";
$aos="S";
$slick="S";
$swiper="S";
$autoPro="S";
$divider="S";
$forms="S";
$nags="N";
$table="S";
$countUp="N";
$dropdown="S";
$dirRoot="./";
$mainFile="N";
include_once("./includes/config.ini.php");
//include("./data/cat-list1.php");
if(!isset($mobile))
{ $mobile="N"; }

if($mobile=="S" or $tablet=="S")
{
 include("./data/mobile-data.php");
}
else
{
?>
   <div class="ui container">
    <div class="ui tablet only grid">
     <div class="stretched row">
        <div class="column">
         <?php
           include("./data/front1.php");
         ?>
        </div>
      </div>
    </div>
    <div class="ui computer only grid">
     <div class="stretched row">
        <div class="twelve wide column">
         <?php
           include("./data/front1.php");
         ?>
        </div>
        <div class="four wide column">
         <?php
           $numRegShow=1;
           include("./data/one-product.php");
         ?>
        </div>
      </div>
    </div>
   </div>
   <div class="ui hidden divider"></div>
   <!--End Section-->
   <?php
       //include("./data/front2.php");
   ?>
   <!--End Section-->
   <?php
    // include("front2.php");
   ?>
   <!--End Section-->

   <div class="ui container">
    <div class="ui floating message" style="background-color:#ffffff;color:#000000;">
      <p>Parada �nica para todas sus necesidades. �Buscas un lugar para comprar todo lo que necesitas? �No busque m�s all� de ven868.net! Tenemos una amplia selecci�n de mercanc�a general, que incluye herramientas, productos electr�nicos, art�culos para el hogar y m�s. Somos el lugar perfecto para la comprar de productos de uso diarias. Ya sea que est� buscando un nuevo juego de toallas, una lampara, un bombillo, lo tenemos cubierto.
      �Vis�tenos hoy y compruebe por qu� somos la tienda �nica para todas sus necesidades!</p>
    </div>
    <div class="ui hidden divider"></div>
   </div>

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

    <div class="ui computer only grid">
     <div class="stretched row">
        <div class="four wide column">
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
   <div class="ui container">
    <div class="ui computer only  grid">
     <div class="stretched row">
        <div class="four wide column">
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

   <div class="ui hidden divider"></div>
   <div class="ui centered computer only grid container">
    <div class="ui center aligned column container">
     <a href='vercat1.php?op=pl&id=1&codCat=1020'>
     <h2 class="aos-item" aos='fade-up-right'>Articulos para el Hogar</h2>
     </a>
     <p><div class="ui hidden divider"></div></p>
     <?php
      $codCat="120";
      include("./data/showCat.php");
     ?>
    </div>

<div class="ui segment" style="width:100%;background: #12c2e9;background: -webkit-linear-gradient(to right, #f64f59, #c471ed, #12c2e9);background: linear-gradient(to right, #f64f59, #c471ed, #12c2e9);color:#fffff;">
 <h2 class="font-white aos-item" aos='fade-up-left'>Escolar y Oficina</h2>
</div>

    <p><div class="ui hidden divider"></div></p>
    <div class="ui center aligned column container">
     <a href='vercat1.php?op=pl&id=1&codCat=115'>
      <h2 class="aos-item" aos='fade-up-left'>Escolar y Oficina</h2>
     </a>
     <p><div class="ui hidden divider"></div></p>
     <?php
      $codCat="145";
      include("./data/showCat.php");
     ?>
    </div>

<div class="ui segment" style="width:100%;background: #FFE000;background: -webkit-linear-gradient(to right, #799F0C, #FFE000);background: linear-gradient(to right, #799F0C, #FFE000);color:#fffff;">
 <h2 class="font-white aos-item" aos='zoom-in'>Salud y Belleza</h2>
</div>

    <p><div class="ui hidden divider"></div></p>
    <div class="ui center aligned column container">
     <a href='vercat1.php?op=pl&id=1&codCat=115'>
      <h2 class="aos-item" aos='fade-up-left'>Salud y Belleza</h2>
     </a>
     <p><div class="ui hidden divider"></div></p>
     <?php
      $codCat="115";
      include("./data/showCat.php");
     ?>
    </div>

<div class="ui segment" style="width:100%;background: #9796f0;background: -webkit-linear-gradient(to right, #fbc7d4, #9796f0);background: linear-gradient(to right, #fbc7d4, #9796f0);color:#fffff;">
 <h2 class="font-white aos-item" aos='zoom-in'>Ilumunacion</h2>
</div>


    <p><div class="ui hidden divider"></div></p>
    <div class="ui center aligned column container">
     <a href='vercat1.php?op=pl&id=1&codCat=130'>
       <h2 class="aos-item" aos='zoom-in'>Ilumunacion</h2>
     </a>
      <p><div class="ui hidden divider"></div></p>
     <?php
      $codCat="130";
      include("./data/showCat.php");
     ?>
    </div>

<div class="ui segment" style="width:100%;background:#BBD2C5;background:-webkit-linear-gradient(to right,#536976,#BBD2C5);background:linear-gradient(to right,#536976,#BBD2C5);color:#fffff;">
 <h2 class="font-white aos-item" aos='zoom-in'>Herramientas</h2>
</div>

    <p><div class="ui hidden divider"></div></p>
    <div class="ui center aligned column container">
     <a href='vercat1.php?op=pl&id=1&codCat=1025'>
       <h2 class="aos-item" aos='zoom-in'>Herramientas</h2>
     </a>
      <p><div class="ui hidden divider"></div></p>
     <?php
      $codCat="125";
      include("./data/showCat.php");
     ?>
    </div>
   </div>

   <div class="ui container">
    <div class="ui hidden divider"></div>
    <?php
     //include("./data/buscar-datos.php");
     include("./data/add1.php");
    ?>
    <div class="ui text container center aligned ">
     <h1 class="ui huge red header">Distribuidora 868</h1>
     <h2 class="aos-item" aos='fade-up-right'>IMPORTACION DISTRIBUCION Y REPRESENTACION</h2>
     <h4>Ofrecemos gran variedad de productos de uso diario esenciales   nacionales e importados que complementa a las  empresas  de consumo masivo.</h4>
    </div>
    <div class="ui hidden divider"></div>
    <div class="ui floating message" style="background-color:#ffffff;color:#000000;text-align: center">
      <p>Estamos tan seguros de que te encantar� comprar con nosotros porque tenemos una amplia selecci�n de mercanc�a y precios bajos todos los d�as.</p>
    </div>
    <div class="ui hidden divider"></div>
    <div class="ui centered computer only grid container">
<!-- Next Section -->
     <div class="four wide center aligned column padding1" style="text-align:center">
      <div class="ui centered card aos-item" aos="fade-down-right" style="background-color:#ffffff;color:#000000;text-align:center">
       <div class="content">
        <img class='ui centered image' src='./imagenes/100x100/banner1.jpg'>
        <a class="header">Linternas</a>
       </div>
      </div>
     </div>
<!-- Next Section -->
     <div class="four wide center aligned column padding1" style="text-align:center">
      <div class="ui centered card aos-item" aos="flip-left" style="background-color:#ffffff;color:#000000;text-align:center">
       <div class="content">
        <img class='ui centered image' src='./imagenes/100x100/banner2.jpg'>
        <a class="header">Segetas</a>
       </div>
      </div>
     </div>
<!-- Next Section -->
     <div class="four wide center aligned column padding1" style="text-align:center">
      <div class="ui centered card aos-item" aos="fade-down-left" style="background-color:#ffffff;color:#000000;text-align:center">
       <div class="content">
        <img class='ui centered image' src='./imagenes/100x100/banner3.jpg'>
        <a class="header">Destornilladores</a>
       </div>
      </div>
     </div>
<!-- Next Section -->
     <div class="four wide center aligned column padding1" style="text-align:center">
      <div class="ui centered card aos-item" aos="fade-up-right" style="background-color:#ffffff;color:#000000;text-align:center">
       <div class="content">
        <img class='ui centered image' src='./imagenes/100x100/banner4.jpg'>
        <a class="header">Medidores</a>
       </div>
      </div>
     </div>
<!-- Next Section -->
     <div class="four wide center aligned column padding1" style="text-align:center">
      <div class="ui centered card aos-item" aos="flip-right" style="background-color:#ffffff;color:#000000;text-align:center">
       <div class="content">
        <img class='ui centered image' src='./imagenes/100x100/banner5.jpg'>
        <a class="header">Espatulas</a>
       </div>
      </div>
     </div>
<!-- Next Section -->
     <div class="four wide center aligned column padding1" style="text-align:center">
      <div class="ui centered card aos-item" aos="fade-down-right" style="background-color:#ffffff;color:#000000;text-align:center">
       <div class="content">
        <img class='ui centered image' src='./imagenes/100x100/banner6.jpg'>
        <a class="header">Caja de Herramienta</a>
       </div>
      </div>
     </div>
<!-- Next Section -->
     <div class="four wide center aligned column padding1" style="text-align:center">
      <div class="ui centered card aos-item" aos="flip-right" style="background-color:#ffffff;color:#000000;text-align:center">
       <div class="content">
        <img class='ui centered image' src='./imagenes/100x100/banner7.jpg'>
        <a class="header">Electricos</a>
       </div>
      </div>
     </div>
<!-- Next Section -->
     <div class="four wide center aligned column padding1" style="text-align:center">
      <div class="ui centered card aos-item" aos="fade-down-left" style="background-color:#ffffff;color:#000000;text-align:center">
       <div class="content">
        <img class='ui centered image' src='./imagenes/100x100/banner8.jpg'>
        <a class="header">Planchas</a>
       </div>
      </div>
     </div>
<!-- Next Section -->
    </div>
   </div>

    </div>

    <div class="ui hidden divider"></div>
    <div class="ui text container">
      <div class="ui horizontal fluid card">
        <div class="image" style="background-color:#ffffff;">
            <a href='https://wa.me/584228868868?text=I'm%20interested%20in%20your%20products%20for%20sale%20dist868' target='_blank'><img src="./imagenes/people/manager.png"" alt="Whatsapp"></a>
        </div>
        <div class="content" style="background-color:#ffffff;color:#000000;">
          <h1>Tienes una Pregunta?</h1>
          <div class="meta">
            <span class='font-14'><i class="phone alternate icon"></i> Habla con uno de nuestro Experto en Ventas</span>
          </div>
          <div class="description">
            <a aria-label="Chat en WhatsApp" href="https://wa.me/584228868868"> <img alt="Chat con WhatsApp" src="./imagenes/empresa/whatsappButton.png" class='ui rounded image'></a>
          </div>
        </div>
      </div>
    </div>
   </div>


<?php
} // end Not Mobile
include("./includes/statusbar.php");
?>
