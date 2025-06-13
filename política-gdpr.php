<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  pol�tica-gdpr.php                                          //
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
$message="S";
$popup="N";
$label="N";
$item="N";
$rating="N";
$aos="S";
$slick="S";
$swiper="S";
$autoPro="S";
$label="S";
$divider="S";
$dropdown="S";
$dirRoot="./";

include_once("./includes/config.ini.php");
?>

<div class="ui container">

   <h1>**Banner de consentimiento de cookies**</h1>
   <h3>Pol�tica y configuraci�n de cookies</h3>
   <p>Este sitio web solo utiliza cookies cuando arma un Presupuesto.</p>
   <p>Los cookies se utiliza para mejorar su experiencia. Al utilizar nuestro sitio web, acepta nuestro uso de cookies.</p>
   <p>Las cookies son peque�os archivos que se almacenan en su computadora o dispositivo m�vil cuando visita un sitio web. Se utilizan para mejorar su experiencia en el sitio web, como recordar sus preferencias y configuraciones.</p>
   <p>Hay dos tipos de cookies:</p>
   <ul>
     <li>Cookies esenciales: estas cookies son esenciales para que el sitio web funcione correctamente. No se pueden deshabilitar.</li>
     <li>Cookies no esenciales: estas cookies se utilizan para mejorar su experiencia en el sitio web, pero no son esenciales para su funcionalidad. Puede deshabilitar estas cookies en cualquier momento.</li>
   </ul>
   <p><b>Este sitio web solo utiliza cookies cuando crea un Presupuesto.</b></p>
   <p>Puede administrar sus preferencias de cookies haciendo clic en el bot�n "Configuraci�n de cookies" a continuaci�n.</p>
   <p>Las cookies nos permiten mejorar tu experiencia en (nuestro sitio web). Puedes aceptarlas todas, configurarlas o conocer m�s de nuestro <a class='ui button' href="pol�tica-privacidad.php">Pol�tica de Privacidad</a>.</p>

   <button class="ui button" id="cookie-accept">Aceptar cookies</button>
   <button class="ui button" id="cookie-settings">Configuraci�n de cookies</button>


</div>
<?php
// include("./data/categoria.php");
// StatusBar
include("./includes/statusbar.php");
?>
