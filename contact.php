<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  contact.php                                                //
// ****************************************************************
include_once("./includes/session.php");

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

<div class="ui container center aligned ">
  <img class="ui fluid image" src="./imagenes/empresa/logo868-l.png" alt="868.com">
  <h2>IMPORTACION DISTRIBUCION Y REPRESENTACION</h2>
  <h4>Ofrecemos gran variedad de productos de uso diario esenciales   nacionales e importados que complementa a las  empresas  de consumo masivo.</h4>
</div>

<div class="ui container">
  <div class="ui vertical stripe segment">
    <div class="ui middle aligned stackable grid container">
      <div class="row">
        <div class="eight wide column">
          <h3 class="ui header">Distribuidora 868 </h3>
          <p>Ofrecemos gran variedad de productos de uso diario esenciales   nacionales e importados que complementa a las  empresas  de consumo masivo.</p>

          <h3 class="ui header">Te Invitamos a Visitenos</h3>
          <p>Direccion:  Esquina Peinero A Dr Diaz - Edificio 888 Pb - La Hoyada, Caracas - Distrito Capital 1020, Venezuela</p>
          <h3 class="ui header">Horario de Trabajo</h3>
          <p>Lun - Vie: 8:00 am - 4:00 pm</p>
          <p>Saabado: 8:00 am - 2:00 pm</p>
          <p>Domingo: Cerrado</p>

          <h3 class="ui header">Contacto</h3>
          <p>Correo1: com868@hotmail.com</p>
          <p>Correo2: chengdist868@gmail.com</p>
          <p>Telf: +58 212 5417903
`         <br>Reciba información sobre nuestras promociones, nuevos productos y las Ofertas.</p>

          <h3 class="ui header">Buscar</h3>
          <p>BarCode: <?php echo "<a class='item' href='$dirRoot"."barcode1.php'><i class='big barcode icon'></i></a>"; ?></p>
        </div>
        <div class="six wide right floated column">
          <img class="ui large bordered rounded image aos-item" aos="zoom-in-up" src="./imagenes/empresa/868-logo1.png">
        </div>
      </div>
      <div class="row">
        <div class="center aligned column aos-item" aos="fade-up">
          <a class="ui huge button" href='user-registrar1.php'>Te Invitamos a Formar Parte del Equipo</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Mapa de Ubicacion -->
<div class="dmRespRow" id="1614663308">
 <div class="dmRespColsWrapper" id="1058267601">
   <div class="dmRespCol large-12 medium-12 small-12" id="1772324701">
    <div class="u_1782459108 default dmDefaultGradient align-center inlineMap" data-type="inlineMap" data-lat="10.50238" data-lng="-66.91151" data-address="Liceo Avila, Avenida Este 6 Bolivariano Libertador Venezuela" data-height="" data-msid="" data-mapurl="" data-lang="es" data-color-scheme="" data-zoom="13" data-layout="" data-popup-display="" data-popup-show="true" data-popup-title="DISTRIBUIDORA 868" data-popup-title-visible="true" data-popup-description="" data-popup-description-visible="false" id="1782459108" dmle_extension="mapextension" data-element-type="mapextension" modedesktop="map" modemobile="map" addresstodisplay="Liceo Avila, Avenida Este 6 Bolivariano Libertador Venezuela" geocompleteaddress="Liceo Avila, Avenida Este 6 Bolivariano Libertador Venezuela" data-popup-display-desktop="" data-popup-display-mobile="" data-display-type="block" data-anim-extended="eyJkZXNrdG9wIjp7InRyaWdnZXIiOiJlbnRyYW5jZSIsImFuaW1hdGlvbiI6InJvbGxJbkNvbWJvIiwiZGlyIjoicmlnaHQifX0=" modetablet="map" data-anim-desktop="rollInCombo" wr="true" icon="true" surround="true" description="868" adwords="" icon-name="icon-map-marker" street="" city="" country="US" country_full="United States" state="" zip="" business="DISTRIBUIDORA 868 C.A." provider="mapbox" lon="-66.91151" lat="10.50238" zoom="13" dmmapsource="dm">
 <div class="mapContainer" style="height: 100%; width: 100%; overflow: hidden; z-index: 0;"></div>
    </div>
   </div>
 </div>
</div>
<!-- End Mapa de Ubicacion -->

<br><div class="ui hidden divider"></div><br>

<div class="ui container">
 <h2 class="ui header"> <div class="content">Marcas Propios de 868</div></h2>
 <div class="ui three stackable cards">
  <div class="card">
    <div class="image aos-item" aos="fade-right">
      <img src="./imagenes/productos/yesquero-868.jpg">
    </div>
  </div>
  <div class="card">
    <div class="image aos-item" aos="flip-up">
      <img src="./imagenes/640x640/tsdli0402.jpg">
    </div>
  </div>
  <div class="card">
    <div class="image aos-item" aos="fade-left">
      <img src="./imagenes/productos/pilas-aa4-868.jpg">
    </div>
  </div>
 </div>
</div>

<br><div class="ui hidden divider"></div><br>
<div class="ui container">
 <h2 class="ui header"> <div class="content">Clientes Felices</div></h2>
 <div class="ui six doubling cards">
  <div class="card">
    <div class="image aos-item" aos="fade-right">
      <img src="./temp/elliot.jpg">
    </div>
  </div>
  <div class="card">
    <div class="image aos-item" aos="flip-up">
      <img src="./temp/helen.jpg">
    </div>
  </div>
  <div class="card">
    <div class="image aos-item" aos="zoom-in">
      <img src="./temp/jenny.jpg">
    </div>
  </div>
  <div class="card">
    <div class="image aos-item" aos="zoom-in">
      <img src="./temp/veronika.jpg">
    </div>
  </div>
  <div class="card">
    <div class="image aos-item" aos="flip-up">
      <img src="./temp/stevie.jpg">
    </div>
  </div>
  <div class="card">
    <div class="image aos-item" aos="fade-left">
      <img src="./temp/steve.jpg">
    </div>
  </div>
</div>
</div>

<?php
 include("./data/add1.php");
 include("./includes/statusbar.php");
?>
