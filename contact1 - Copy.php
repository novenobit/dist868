<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  contact1.php                                                //
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

if(isset($mobile) and $mobile=="N")
{
?>

<style type="text/css">
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
    text-align: center;
}
.iconlist li .icon-holder {
    position: relative;
    text-align: center;
    border-radius: 50%;
    overflow: hidden;
    padding-bottom: 3px;
    background: #ffffff;
    border: 1px solid #E4E5EA;
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
    color: #1F1142;
}
.iconlist li .icon-holder span {
    font-size: 12px;
    display: block;
    margin-top: 5px;
    border-radius: 3px;
}
</style>

<?php
}
?>

<div class="ui container center aligned">
  <img class="ui fluid image" src="./imagenes/empresa/logo868-l.png" alt="868.com">
  <h2>IMPORTACION DISTRIBUCION Y REPRESENTACION</h2>
  <h4>Ofrecemos gran variedad de productos de uso diario esenciales   nacionales e importados que complementa a las  empresas  de consumo masivo.</h4>
  <hr style="border-top: 1px dashed red;">
</div>

<div class="ui container">
 <div class="ui internally celled grid">
  <div class="ten wide computer ten wide tablet sixteen wide mobile column">
    <h3 class="ui header">Te Invitamos a Visitenos</h3>
    <p>Direccion:  Esquina Peinero A Dr Diaz - Edificio 888 Pb - La Hoyada, Caracas - Distrito Capital 1020, Venezuela</p>
    <h3 class="ui header">Horario de Trabajo</h3>
    <p>Lun - Vie: 8:00 am - 4:00 pm</p>
    <p>Saabado: 8:00 am - 2:00 pm</p>
    <p>Domingo: Cerrado</p>
    <h3 class="ui header">Contacto</h3>
    <p>Correo: com868@hotmail.com</p>
    <p>Telf: +58 212 5417903
    <br>Reciba información sobre nuestras promociones, nuevos productos y las Ofertas.</p>
    <h3 class="ui header">Buscar BarCode</h3>
    <p>Puede buscar un producto por el Codigo de Barra: <?php echo "<a class='item' href='$dirRoot"."barcode1.php'><i class='big barcode icon'></i></a>"; ?></p>
    <h3>Mobile Contact</h3>

    <div class="ui two column grid center aligned">
     <div class="left attached column center aligned">
      <p><a aria-label="Chat en WhatsApp" href="https://wa.me/574241724157">
       <img alt="Chat con WhatsApp" src="./imagenes/empresa/whatsappButton.png" ></a></p>
     </div>
     <div class="right attached column centered">
       <p><a aria-label="Chat en WhatsApp" href="https://wa.me/584228868868">
       <img alt="Chat con WhatsApp" src="./imagenes/empresa/whatsappButton.png" ></a></p>
     </div>
    </div>




  </div>
  <div class="six wide computer six wide tablet sixteen wide mobile column">
<?php
if(isset($mobile) and $mobile=="S")
{
?>
    <div class="ui card padding">
      <a class="fluid ui huge red button" href='comenta1.php'>Puede Deja un Mensaje Aqui</a>
    </div>
    <div class="ui card padding">
       <a class="fluid ui huge blue button" href='user-registrar1.php'>Quieres Ser Parte del Equipo</a>
    </div>
    <div class="ui card padding">
       <a class="fluid ui huge pink button" href='productos-buscar.php'>Ver la Tabla de Productos</a>
    </div>
<?php
 }
else
{
?>
    <div class="card padding2 aos-item" aos="fade-right">
      <a class="fluid ui huge red button" href='comenta1.php'>Puede Deja un Mensaje Aqui</a>
    </div>
    <div class="card padding2 aos-item" aos="fade-up">
       <a class="fluid ui huge blue button" href='user-registrar1.php'>Quieres Ser Parte del Equipo</a>
    </div>
    <div class="card padding2 aos-item" aos="fade-left">
       <a class="fluid ui huge pink button" href='productos-buscar.php'>Ver la Tabla de Productos</a>
    </div>
<?php
 }
?>
  </div>
 </div>
 <hr style="border-top: 1px dashed red;">


</div>

<div class="ui centered padded container">
 <div class="ui hidden divider"></div>
 <div class="ui grid" style="background-color:#17406b;color:#ffffff;border-top-left-radius:25px;border-top-right-radius:25px;border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;">
  <div class="sixteen wide column center aligned" style="background-color:#000000;color:#ffffff;border-top-left-radius:25px;border-top-right-radius:25px;">
    <h1>Distribuidora 868</h1>
  </div>
  <div class="font-16 ten wide computer ten wide tablet sixteen wide mobile column" style="line-height:1.6;text-align:center;padding:25px 25px 25px 25px;">
    <p>Quieres vender los productos de 868 en tu Local o por Internet?<br>Puede ser un vendedor de la Distribuidora 868.
    <br>Para empezar a vender los productos de 868, debes crear una Cuenta de vendedor con solo rellenar el breve formulario de registro.</p>
    <p><a class="ui red button" href='user-registrar1.php'>Formulario de Registro</a></p>
  </div>
  <div class="padded six wide computer six wide tablet sixteen wide mobile column centered" style="text-align:center;">
   <img class="ui centered small image" src="./imagenes/people/dj.png" alt="Venedor" />
  </div>
  <div class="sixteen wide column center aligned">
  </div>
 </div>
 <div class="ui hidden divider"></div>

 <div class="ui widescreen only grid">
  <div class="sixteen wide column center aligned">
   <ul class="iconlist">
     <?php
      $num=1;
      $tableBucar="productos";
      $campo1="id_productos";
      $campo2="cod_subcategoria";
      $sqlProDataAdd=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,foto_producto from productos where foto_producto<>'' and activo='S' order by rand() limit 7");
      while($ProDataAdd=mysqli_fetch_array($sqlProDataAdd))
      {
       $idpro=$ProDataAdd['id_producto'];
       $codProducto=$ProDataAdd['cod_producto'];
       $nomProducto=substr($ProDataAdd['nom_producto'],0,25);
       $precio1_producto=$ProDataAdd['precio1_producto'];
       $fotoProducto=$ProDataAdd['foto_producto'];
       if($fotoProducto=="")
       { $fotoProducto="sinfoto.png"; }

       echo "<a href='vercat3.php?idpro=$idpro'>
        <li>
         <div class='icon-holder' style='text-align:center;'>
          <div class='icon2' style='text-align:center;'>
            <img src='$dirRoot"."imagenes/productos/$fotoProducto' style='width:100%;height:100px;text-align:center;'>
          </div>
         </div>
         <span class='font-8'>$nomProducto</span>
        </li>
       </a>";
       $num++;
      }
      if(isset($sqlProDataAdd))
      { mysqli_free_result($sqlProDataAdd); }
    ?>
   </ul>
  </div>
  </div>
 <hr style="border-top: 1px dashed red;">
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
      <img src="./imagenes/productos/6904567890231.png">
    </div>
  </div>
  <div class="card">
    <div class="image aos-item" aos="fade-left">
      <img src="./imagenes/productos/pilas-aa4-868.jpg">
    </div>
  </div>
 </div>
</div>


<div class="ui centered padded container" style="margin-top:60px;">
 <div class="ui hidden divider"></div>
 <div class="ui grid" style="background-color:#ffffff;color:#000000;border-top-left-radius:25px;border-top-right-radius:25px;border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;">
  <div class="sixteen wide column center aligned" style="background-color:#ffffff;color:#000000;border-top-left-radius:25px;border-top-right-radius:25px;">
    <h1>Compra Existosa en 868</h1>
  </div>
   <div class="padded six wide computer six wide tablet sixteen wide mobile column centered" style="text-align:center;">
       <img class="ui centered medium image" src="./imagenes/people/client-happy.png">
  </div>
  <div class="font-16 ten wide computer ten wide tablet sixteen wide mobile column" style="line-height:1.6;text-align:left;padding:25px 25px 25px 25px;">
    <p>Sabemos que los clientes satisfechos son el alma de cualquier negocio. Por eso los ponemos en primer lugar en todo lo que hacemos. Desde nuestro personal amigable y capacitado hasta nuestro compromiso con productos y servicios de calidad, estamos dedicados a garantizar que nuestros clientes tengan una experiencia positiva cada vez que hacen negocios con nosotros.</p>

    <p>Estas son sólo algunas de las cosas que hacen felices a nuestros clientes:</p>

    <ul><li>Siempre estamos dispuestos a hacer un esfuerzo adicional para satisfacer sus necesidades.</li>
    <li>Ofrecemos una amplia gama de productos para elegir.</li>
    <li>Contamos con una ubicación y horario de atención convenientes.</li>
    <li>Nuestros precios son competitivos.</li>
    <li>Ofrecemos un excelente servicio al cliente.</li>
    </ul>
    <p>Si está buscando una empresa que dé prioridad a sus clientes, entonces ha venido al lugar correcto. Contáctenos hoy para obtener más información sobre cómo podemos hacer de usted un cliente feliz.</p>

    <p>Visite nuestro sitio web o llámenos hoy para obtener más información sobre cómo podemos hacer de usted un cliente feliz.</p>
    <p>Publicidad creada por Bard</p>
  </div>

  <div class="sixteen wide column center aligned">
  </div>
 </div>
</div>


<br><div class="ui hidden divider"></div><br>
<div class="ui container" style="margin-bottom:60px;">
 <h2 class="ui header"> <div class="content">Clientes Felices</div></h2>
 <div class="ui six doubling cards">
  <div class="card">
    <div class="image aos-item" aos="fade-right">
      <img src="./imagenes/people/elliot.jpg">
    </div>
  </div>
  <div class="card">
    <div class="image aos-item" aos="flip-up">
      <img src="./imagenes/people/helen.jpg">
    </div>
  </div>
  <div class="card">
    <div class="image aos-item" aos="zoom-in">
      <img src="./imagenes/people/jenny.jpg">
    </div>
  </div>
  <div class="card">
    <div class="image aos-item" aos="zoom-in">
      <img src="./imagenes/people/matthew.png">
    </div>
  </div>
  <div class="card">
    <div class="image aos-item" aos="flip-up">
      <img src="./imagenes/people/stevie.jpg">
    </div>
  </div>
  <div class="card">
    <div class="image aos-item" aos="fade-left">
      <img src="./imagenes/people/lindsay.png">
    </div>
  </div>
</div>

<div class="ui grid">
  <div class="sixteen wide column">
    <p>Todos nuestros Cliente Dicen: "He sido cliente de esta empresa durante muchos años y siempre he estado contento con el servicio que he recibido. El personal es amable y está bien informado, y siempre hacen un esfuerzo adicional para ayudarme. Definitivamente lo haría Recomiendo esta empresa a cualquiera que busque una excelente experiencia para el cliente". - [todos los clientes]</p>
  </div>
</div>

</div>

<?php
$showStatus="S";
if(isset($mobile) and $mobile=="N")
{
 include("./data/add1.php");
}
include("./includes/statusbar.php");
?>
