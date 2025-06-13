<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  comenta1.php                                               //
// ****************************************************************
include_once("./includes/session.php");

$aos="S";
$autoPro="S";
$countUp="S";
$dirRoot="./";
$divider="S";
$dropdown="S";
$forms="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="S";
$mainFile="N";
$menu="S";
$message="S";
$nags="N";
$popup="N";
$rating="N";
$sidebar="N";
$slick="N";
$swiper="N";
$table="N";
include_once("./includes/config.ini.php");
?>

<style type="text/css">
body {
      background-color: #DADADA;
}
body2 > .grid {
      height: 100%;
}
.image2 {
   margin-top: -100px;
}

.font-blue { color: #426199; }
</style>

<div class='ui container'>
 <div class="ui middle aligned center aligned grid">
  <div class="column center aligned" style="max-width:450px;text-align: center;">
   <div class="ui horizontal card" style="max-width:100%;">
     <div class="image">
       <img src="./imagenes/people/sam.png">
     </div>
     <div class="content">
       <div class="header">Comentario</div>
       <div class="description">
         <p>Deja tu mensaje y pronto te damos una repuesta.</p>
       </div>
     </div>
   </div>
   <div class="ui attached message black">
     <div class="header">
        COMENTARIO
     </div>
   </div>
   <form class="ui large form" action="comenta2.php" method='post' enctype="multipart/form-data">
      <div class="ui stacked segment">
        <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" name="nombre" placeholder="tu Nombre">
            </div>
        </div>
        <div class="field">
            <div class="ui left icon input">
              <i class="mail icon"></i>
              <input type="text" name="email" placeholder="tu Correo">
            </div>
        </div>
        <div class="field">
            <div class="ui left icon input">
              <i class="phone icon"></i>
              <input type="text" name="celular" placeholder="tu Celular">
            </div>
        </div>
        <div class="field">
            <label>Mensaje para Distribuidora 868</label>
            <textarea name="mensaje" rows="4"></textarea>
        </div>

        <div class="field">
          <img src="./libs2/captcha/captcha.php" id="img" border="0" alt="captcha v1 phpform.net">
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="hand point up icon"></i>
            <input type="text" name="captcha" placeholder="indica numero de arriba">
          </div>
        </div>
        <div class="ui ignored message">
          Debe indicar el numero de arriba
        </div>
        <button class="ui fluid large blue submit button">Enviar Datos a Distribuidora 868</button>
        </div>
        <div class="ui error message"></div>
   </form>
  </div>
 </div>
</div>
<br><div class="ui hidden divider"></div><br>
<div class='ui container'>
 <div class="ui grid">
    <div class="four wide column">
      <div class="ui card">
        <div class="image center aligned">
         <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
           <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
         </svg>
        </div>
        <div class="content">
          <div class="header">Whatsapp</div>
          <div class="description">
            +58 0424 2729756
          </div>
        </div>
      </div>
    </div>
    <div class="four wide column">

      <div class="ui card">
        <div class="image center aligned">
         <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
           <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z"/>
           <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
         </svg>
        </div>
        <div class="content">
          <div class="header">eMail/Correo</div>
          <div class="description">
            com868@hotmail.com
          </div>
        </div>
      </div>

    </div>
    <div class="four wide column">

      <div class="ui card">
        <div class="image center aligned">
         <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
           <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022M6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z"/>
           <path d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z"/>
         </svg>
        </div>
        <div class="content">
          <div class="header">Oficina</div>
          <div class="description">
            +58 212 5417903
          </div>
        </div>
      </div>

    </div>
    <div class="four wide column">

      <div class="ui card">
        <div class="image center aligned">
         <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
           <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/>
           <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
         </svg>
        </div>
        <div class="content">
          <div class="header">Horario Especial</div>
          <div class="description">
            Lun - Vie: 8:00 am - 4:00 pm
            <br>Sábado: 8:00 am - 2:00 pm
            <br>Domingo: Cerrado
          </div>
        </div>
      </div>
    </div>
 </div>
</div>

<br><div class="ui hidden divider"></div><br>

<?php
$endPage="N";
$showStatus="S";
include("./includes/statusbar.php");
?>

<script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            nombre: {
              identifier  : 'nombre',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'debe indicar tu nombre'
                }
              ]
            },
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'debe indicar tu correo'
                }
              ]
            },
            mensaje: {
              identifier  : 'mensaje',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'no dejo ningun mensaje'
                },
                {
                  type   : 'length[10]',
                  prompt : 'no dijo nada'
                }
              ]
            }
          }
        })
      ;
    })
  ;
</script>
</body></html>
