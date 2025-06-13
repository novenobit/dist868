<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  ver.php                                              //
// ****************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="N";
$icon="S";
$forms="S";
$input="S";
$checkbox="S";
$list="S";
$sidebar="N";
$tabs="S";
$table="N";
$message="N";
$popup="N";
$label="N";
$item="N";
$rating="N";
$aos="N";
$slick="S";
$swiper="N";
$step="S";
$autoPro="S";
$label="S";
$divider="S";
$table="S";
$topAdmin="N";
$dropdown="S";
$dirRoot="../";

//include_once("../includes/headfileFrame.php");
include_once("../includes/config.ini.php");

FechayHora();
$todoBien="N";
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['op2']))
{ $op2=$_GET['op2']; }
//echo ""<a href='ver.php'>".count($_SESSION['pedido']." Cart </a>";"
if(isset($_SESSION['message'])){
?>
 <div class="alert alert-info text-center">
  <?php
   // echo $_SESSION['message'];
  ?>
 </div>
<?php
 unset($_SESSION['message']);
}

?>

<div class="ui container">

<?php
if($mobile=="N")
{
?>
<div class="ui ordered steps">
  <div class="completed step">
    <div class="content">
      <div class="title">Cesta</div>
      <div class="description">Productos estan en la Cesta.</div>
    </div>
  </div>
  <div class="completed step">
    <div class="content">
      <div class="title">Registrar</div>
      <div class="description">Cliente registra sus datos.</div>
    </div>
  </div>
  <div class="active step">
    <div class="content">
      <div class="title">Confirma Compra</div>
      <div class="description">La compra fue confirmado.</div>
    </div>
  </div>
  <div class="active step">
    <div class="content">
      <div class="title">Enviado</div>
      <div class="description">La compra fue entregado al cliente.</div>
    </div>
  </div>
</div>

<?php
}
?>

 <h2>Guardar la Cesta</h2>
 <div class="ui top attached tabular menu" style="background-color:#ffffff;color:#000000;">
  <a class="active item" data-tab="Registrado">Registrado</a>
  <a class="item" data-tab="Nuevo">Nuevo Cliente</a>
  <a class="item" data-tab="Cesta">Cesta</a>
 </div>
 <div class="ui bottom attached active tab segment" data-tab="Registrado">

  <div class="ui text container">

  <div class="ui middle aligned center aligned grid">
   <div class="column">
    <h2 class="ui teal image header">
     <img src="../imagenes/people/businessman.png" class="image">
     <div class="content">
       Usuario Registrado
     </div>
    </h2>
    <?php
    if($mobile=="S")
    {
     echo "<form action='cesta-save2.php' method='post' enctype='multipart/form-data'>";
    }
    else
    {
      echo "<form class='ui large form' action='cesta-save2.php' method='post' enctype='multipart/form-data'>";
    }
    ?>
     <div class="ui stacked segment">
       <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email_cliente" placeholder="Correo Cliente">
          </div>
       </div>
       <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="clave1" placeholder="Contrase&ntilde;a">
          </div>
       </div>
       <div class="field">
         <img src="../libs2/captcha/captcha.php" id="img" border="0" alt="captcha v1 phpform.net">
       </div>
       <div class="field">
         <div class="ui input">
          <input type="text" name="captcha" placeholder="indica numero de arriba"  autocomplete="off">
         </div>
       </div>

       <button class="ui fluid large blue submit button">Login</button>
      </div>
      <div class="ui error message"></div>
     </form>
   </div>
   </div>
  </div>

 </div>
 <div class="ui bottom attached tab segment" data-tab="Nuevo">

  <?php
   if($mobile=="S")
   {
      include("mobil-form.php");
   }
   else
   {
  ?>

  <div class="ui text container"   style="background: linear-gradient(90deg, #56e2d7 0%, #58cff1 100%);">


     <form class="ui form font-black" method="POST" action="cesta-cliente-nuevo.php"  enctype="multipart/form-data" id="submitForm">
         <h3>Datos para la Facturaci&oacute;n</h3>
         <h6>Tus datos personales solo sera utilizado para procesar tu pedido.</h6>

         <div class="ui form">
            <div class="fields">
             <div class="eight wide field">
               <label>CI/RIF *</label>
               <input id="inp1" type="text" name="cid_cliente" maxlength="20" placeholder="cedula o rif">
             </div>
             <div class="eight wide field">
               <label>Nombre y Apellido o Nombre Empresa *</label>
               <input id="inp2" type="text" name="nom_cliente" maxlength="50" placeholder="nombre del cliente">
             </div>
            </div>
            <div class="fields">
             <div class="sixteen wide field">
               <label>Direccion Fisica *</label>
               <input type="text" name="dir1_cliente" placeholder="nombre o n&uacute;mero de la casa/edificio y nombre de la calle">
             </div>
            </div>
            <div class="fields">
             <div class="eight wide field">
               <label>Ciudad *</label>
               <input type="text" name="ciudad_cliente" maxlength="30" placeholder="ciudad">
             </div>
              <div class="eight wide field">
               <label>Estado *</label>
               <input type="text" name="estado_cliente" maxlength="30" placeholder="estado">
             </div>
            </div>
            <div class="fields">
             <div class="eight wide field">
               <label>Tel&eacute;fono Local *</label>
               <input id="inp3" type="text" name="tel1_cliente" maxlength="30" placeholder="telefono local">
             </div>
             <div class="eight wide field">
               <label>Tel&eacute;fono Mobil *</label>
               <input id="inp4" type="text" name="tel2_cliente" maxlength="30" placeholder="telefono celular">
             </div>
            </div>
            <div class="fields">
             <div class="eight wide field">
               <label>Correo electr&oacute;nico *</label>
               <input id="inp5" type="text" name="email_cliente" maxlength="30" placeholder="email / correo" autocomplete="off">
             </div>
             <div class="eight wide field">
               <label>Sitio Web</label>
               <input type="text" name="url_cliente" maxlength="30" placeholder="www.nombreweb.com">
             </div>
            </div>
            <div class="fields">
             <div class="eight wide field">
               <label>Nota Extra </label>
               <input type="text" name="nota_cliente" maxlength="100" placeholder="Informaci&oacute;n adicional">
             </div>
              <div class="eight wide field">
               <div class="ui test toggle checkbox">
                <input type="checkbox" name="lista_correo">
                <label>Suscribir a nuestra Lista de Correo</label>
               </div>
             </div>
            </div>
            <div class="fields">
             <div class="sixteen wide field">
                <p>(opcional) Puede suscribir a nuestra lista de correos electr&oacute;nicos donde recibiras informaci&oacute;n de nuevos productos y de los descuentos.</p>
             </div>
            </div>
            <div class="fields">
             <div class="sixteen wide field">
                <p>Forma de Pago: El pago puede ser: De contado, En efectivo,por Pago M&oacute;vil, Trsferencia o similar en el momento de la entrega.</p>
             </div>
            </div>
            <div class="fields">
              <div class="field font-black">
                <label>Clave de Usuario</label>
                 <p>Tu Clave: <span class='font-red'>Anota este clave para futuro uso.</span> Para entrar al sistema vas a utilizar esta clave. O puede escribre una clave de tu preferencia. Debe tener minimo 8 caracteres.</p>
                <?php
                  function password_generate($chars)
                  {
                     $data='1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
                     return substr(str_shuffle($data), 0, $chars);
                  }
                  $password=password_generate(8);
                ?>
              </div>
              <div class="field">
                <label><span  class='font-red'>Tu Clave *</span></label>
               <div class="ui input">
                <input type="text" name="clave" value="<?php echo "$password" ?>" autocomplete="off">
               </div>
              </div>
            </div>
            <div class="fields">
              <div class="field">
               <img src="../libs2/captcha/captcha.php" id="img" border="0" alt="captcha v1 phpform.net">
              </div>
              <div class="field">
               <div class="ui input">
               <input type="text" name="captcha" placeholder="<< debe escribir el numero" autocomplete="off">
               </div>
              </div>
            </div>
           <button class="ui fluid large blue submit button"  id="btnSubmit">Registrar Datos</button>

        </div>
     </form>
     <div class="description">
      <div class="result text-center"></div>
     </div>
   </div>
   <?php
    }
   ?>
 </div>
 <div class="ui bottom attached tab segment" data-tab="Cesta">

   <h3 class="ui header red">Tu pedido</h3>
   <?php
   include("cesta-data.php");
   ?>

 </div>
</div>

<?php
// echo "<br>xx ".session_id();
// echo '<br><pre>';
// var_dump($_SESSION);
// echo '</pre>';
//   echo "<h3> PHP List All Session Variables</h3>";
//   foreach ($_SESSION as $key=>$val)
//   echo $key." ".$val."<br/>";
$endPage="N";
$showStatus="S";
include("$dirRoot"."includes/statusbar.php");
?>

<script>
$(document).ready(function (e) {
 $("#submitForm").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "cesta-cliente-nuevo.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
        success: function (data) {
          console.log(data);
          $('.result').html(data);
        }
      });
 }));
});
</script>
<script src="../libs2/scripts/superplaceholder.js"></script>
<script>
      superplaceholder({
         el: inp1,
         sentences: [ 'Cedula, o Numero de RIF', 'Eg. Persona: V0000000, Empresa: J0000000' ],
         options: {
            loop: true
         }
      })

      superplaceholder({
         el: inp2,
         sentences: [ 'Nombre del Cliente', 'Personal o Empresa', 'Eg. Super Mariche, cs' ],
         options: {
            loop: true,
            letterDelay: 60
         }
      })
      superplaceholder({
         el: inp3,
         sentences: [ 'numero Telefono Local', 'Telefono fijo', 'Ej. 02129930000' ],
         options: {
            letterDelay: 120,
            loop: true,
            // startOnFocus: false
         }
      })
      superplaceholder({
         el: inp4,
         sentences: [ 'numero Telefono Personal', 'celular', 'Ej. 04240000000' ],
         options: {
            letterDelay: 120,
            loop: true,
            // startOnFocus: false
         }
      })
      superplaceholder({
         el: inp5,
         sentences: [ 'Agrega un correo personal', 'nombre@correo.com', 'nombre@correo.com' ],
         options: {
            letterDelay: 90,
            loop: true,
            // startOnFocus: false
         }
      })


</script>
</body></html>




