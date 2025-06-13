<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  user-login.php                                             //
// ****************************************************************
include_once("./includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="S";
$icon="S";
$input="S";
$forms="S";
$checkbox="S";
$label="S";
$list="S";
$sidebar="N";
$table="N";
$message="S";
$popup="N";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="S";
$divider="S";
$dropdown="S";
$userLogin="S";
$dirRoot="./";
include_once("./includes/config.ini.php");
?>


<div class='ui container'>
<?php
//if($mobile=="S" or $tablet=="S")
if($mobile=="S")
{
 include("user-form.php");
}
else
{
?>
</div>
<style type="text/css">
body {
  /* background: linear-gradient(to right, #38c8ff, #4378ba, #983fc3); */
  /* background-color: #c50e1a; */
  background: linear-gradient(90deg, #3700b3 0%, #6200ee 100%);
margin: 30px 0;
}

body > .grid {
   height: 100%;
}


.font-blue { color: #426199; }

.center {
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
<div class="ui two column doubling stackable grid container"  style="margin-top: 30px;">
 <div class="six wide right floated column">

<div class="ui message" style="border-radius:15px;margin-top:30px;">
   <p>Estimado usuario, reg&iacute;strese gratuitamente como miembro de nuestra Portal y ser parte de como868. Para registrarse por primera vez, por favor complete los datos con la informaci&oacute;n necesaria para activar su cuenta.
   Le recordamos que la informaci&oacute;n que usted suministra aqu&iacute; es confidencial. Nosotros no compartirmos informaci&oacute;n de nuestros usuarios con terceros sin su consentimiento. Por ninguna raz&oacute;n, le enviar&aacute; informaci&oacute;n no solicitada a su e-mail.</p>
</div>
  <div class="ui grid">
   <div class="sixteen wide column padded">
     <img src="./imagenes/banners/store1.png" class="ui large bordered rounded image">
   </div>

  </div>
 </div>
 <div class="ten wide column padded">
   <?php include("user-form.php"); ?>
 </div>
 </div>

<?php
}
?>

<script src="./libs2/jquery/jquery.min.js"></script>
<script src="./libs2/components/form.min.js"></script>
<script src="./libs2/components/transition.js"></script>
<script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {

            tipo: {
              identifier  : 'tipo',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'debe indicar el tipo de usuario'
                }
              ]
            },
            $cid_cliente: {
              identifier  : '$cid_cliente',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'debe indicar la Cedula o RIF del usuario'
                }
              ]
            },
            usuario: {
              identifier  : 'usuario',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'debe indicar el nombre de usuario'
                }
              ]
            },
            clave1: {
              identifier  : 'clave1',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'debe indicar la clave'
                },
                {
                  type   : 'length[6]',
                  prompt : 'debe ser mayor a 6 characters'
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
