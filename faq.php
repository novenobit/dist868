<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  contact1.php                                                //
// ****************************************************************
include_once("./includes/session.php");

$addVertise="S";
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
.li,.header { line-height: 1.6rem; }
</style>
<div class="ui centered container">
 <div class="ui hidden divider"></div>
 <div class="ui grid">
  <div class="sixteen wide column center aligned" style="background-color:#FF0099;color:#ffffff;border-top-left-radius:25px;border-top-right-radius:25px;">
    <h1>Preguntas y Repuestas por 868</h1>
  </div>
 </div>

 <div class="ui hidden divider"></div>
 <div class="ui grid" style="background-color:#ffffff;color:#17406b;">
  <div class="six wide column center aligned">
   <img class='ui image' src="./imagenes/people/sam.png">
   <br>Pregunta a Distribuidora 868
  </div>
  <div class="ten wide column">
   <h2 style='padding: 10px 0;text-align: center;'>Distribuidora 868 Responde tus Preguntas y da Tips</h2>
   <div class="ui relaxed divided list">
      <div class="item">
        <a class="header">¿Pensando en vender en Internet? Dónde comprar y revender?</a>
        <div class="description li">
          <b>Repuesta:</b> Primero, has venido al lugar correcto, tenemos mas de 6000 productos en 20 categorias y con muchos de ellos puede tener exito vendiendo en internet.
        </div>
      </div>
      <div class="item">
        <a class="header">Que precio tiene los Productos?</a>
        <div class="description">
          <b>Repuesta:</b> Tenemos los mejores precios del mercado, precio especial para revendedores.
        </div>
      </div>
      <div class="item">
        <a class="header">¿Cuál es el mejor artículo para vender en Internet?</a>
        <div class="description li">
          <b>Repuesta:</b> Aunque no hay una respuesta única, hay ciertos productos que se destacan constantemente. Puedo decir que los de uso diario. Existen muchos productos de diferente categorias que son de uso diario.
          En nuestra tienda hay una amplia gama de artículos, desde items para la cocina hasta productos para el mecánico, el carpintero, el plomero y mucho mas.
        </div>
      </div>
      <div class="item">
        <a class="header">¿Necesitas un gran regalo? Como, ahora mismo?</a>
        <div class="description li">
          <b>Repuesta: Distribuidora 868 lo tienes.</b>
          <div class="list">
            <a class="item" href='vercat-foto3.php?op=pl&id=201&codCat=120&codSubCat=1200100'>* Aspiradoras: Distribuidora 868 ofrece las aspiradoras más barata que podemos encontrar.</a>
            <a class="item" href='vercat-foto3.php?op=pl&id=29&codCat=120&codSubCat=1200026'>* Cafeteras: Distribuidora 868 ofrece una variedad de Cafeteras.</a>
            <a class="item" href='vercat-foto3.php?op=pl&id=38&codCat=120&codSubCat=1200055'>* Ollas y Sartenes: Distribuidora 868 ofrece una variedad de Ollas y Sartenes.</a>
            <a class="item" href='vercat-foto3.php?op=pl&id=39&codCat=120&codSubCat=1200060'>* Tostadoras: Distribuidora 868 ofrece una variedad de Tostadoras.</a>
          </div>
        </div>
      </div>

      <div class="item">
        <a class="header">Que productos venden?</a>
        <div class="description li">
          <b>Repuesta:</b> Tenemos todos tus productos Favoritos al Mejor Precio.
        </div>
      </div>
      <div class="item">
        <a class="header">Tienes Despacho o Delivery?</a>
        <div class="description li">
          <b>Repuesta:</b> Si tenemos Servicios de Despacho en la Gran Caracas.
        </div>
      </div>

   </div>
  </div>

 </div>
</div>

<div class="ui hidden divider"></div>
<div class="ui grid container">
  <div class="sixteen wide center aligned column">
    Compra en la nueva tienda virtual de Distribuidora 868 es mas facil.
  </div>
</div>
<div class="ui hidden divider"></div>

<div class="ui grid container" style="margin-top:60px;">
 <div class="sixteen wide column">
   <h4 class="ui horizontal left aligned divider header">
     Distribuidora 868 Recomienda
   </h4>
 </div>
 <div class="four wide column">

   <div class="ui card">
     <a class="image" href="vercat2.php?op=pl&id=18&codCat=193&codSubCat=19332">
        <img src="./imagenes/menu/hogar.png">
     </a>
     <div class="content">
        <a class="header" href="vercat2.php?op=pl&id=18&codCat=193&codSubCat=19332">Hogar</a>
       <div class="description">
         Distribuidora 868 dice que estos son los 10 mejores artículos para la limpieza del hogar.
       </div>
     </div>
   </div>

  </div>
  <div class="four wide column">

   <div class="ui card">
     <a class="image" href="vercat-foto3.php?op=pl&id=201&codCat=120&codSubCat=1200100">
        <img src="./imagenes/productos/7737440279033.jpg">
     </a>
     <div class="content">
        <a class="header" href="vercat-foto3.php?op=pl&id=201&codCat=120&codSubCat=1200100">Cosas Geniales</a>
       <div class="description">
         Cosas geniales para tu hogar que parecen caras pero en realidad son baratas en 868.
       </div>
     </div>
   </div>

  </div>
  <div class="four wide column">

   <div class="ui card">
     <a class="image" href="vercat2.php?op=plcodCat=125&codSubCat=1250010">
        <img src="./imagenes/productos/6925582156744.jpg">
     </a>
     <div class="content">
        <a class="header" href="vercat2.php?op=plcodCat=125&codSubCat=1250010">Aspiradoras</a>
       <div class="description">
         Distribuidora 868 ofrece las aspiradoras más barata que podemos encontrar.
       </div>
     </div>
   </div>

  </div>
  <div class="four wide column">

   <div class="ui card">
     <a class="image" href="vercat-foto3.php?op=pl&id=111&codCat=185&codSubCat=1850020">
        <img src="./imagenes/productos/CEPILLO.png">
     </a>
     <div class="content">
        <a class="header" href="vercat-foto3.php?op=pl&id=111&codCat=185&codSubCat=1850020">Remates</a>
       <div class="description">
         Distribuidora 868 remata algunos de los productos porque necesita espacio.
       </div>
     </div>
   </div>

  </div>

</div>



<?php
include("$dirRoot"."data/one-dolar.php");
?>

<?php
 include("./includes/statusbar.php");
?>
