<h3>Datos para la Facturaci&oacute;n</h3>
<h6>Tus datos personales solo sera utilizado para procesar tu pedido.</h6>
<form method="POST" action="cesta-cliente-nuevo.php"  enctype="multipart/form-data" id="submitForm">
 <div class="ui grid font-14">
  <div class="sixteen wide  column">
    <label>CI/RIF *</label>
    <input class="ui input" id="inp1" type="text" name="cid_cliente" maxlength="20" placeholder="cedula o rif"  style="background:#cccccc;">
  </div>
  <div class="sixteen wide  column">
    <label>Nombre y Apellido o Nombre Empresa *</label>
    <input class="ui input" id="inp2" type="text" name="nom_cliente"  placeholder="nombre del cliente"  style="background:#cccccc;">
  </div>
  <div class="sixteen wide  column">
    <label>Direccion Fisica *</label>
    <input class="ui input" type="text" name="dir1_cliente" placeholder="nombre o n&uacute;mero de la casa/edificio y nombre de la calle" style="background:#cccccc;">
  </div>
  <div class="sixteen wide  column">
    <label>Ciudad *</label>
    <input class="ui input" type="text" name="ciudad_cliente" maxlength="30" placeholder="ciudad" style="background:#cccccc;">
  </div>
  <div class="sixteen wide  column">
    <label>Estado *</label>
    <input class="ui input" type="text" name="estado_cliente" maxlength="30" placeholder="estado" style="background:#cccccc;">
  </div>
  <div class="sixteen wide  column">
    <label>Tel&eacute;fono Local *</label>
    <input class="ui input" id="inp3" type="text" name="tel1_cliente" maxlength="30" placeholder="telefono local" style="background:#cccccc;">
  </div>
  <div class="sixteen wide  column">
    <label>Tel&eacute;fono Mobil *</label>
    <input class="ui input" id="inp4" type="text" name="tel2_cliente" maxlength="30" placeholder="telefono celular" style="background:#cccccc;">
  </div>
  <div class="sixteen wide  column">
   <label>Correo electr&oacute;nico *</label>
   <input class="ui input" id="inp5" type="text" name="email_cliente" maxlength="30" placeholder="email / correo" autocomplete="off" style="background:#cccccc;">
  </div>
  <div class="sixteen wide  column">
   <label>Sitio Web</label>
   <input class="ui input" type="text" name="url_cliente" maxlength="30" placeholder="www.nombreweb.com" style="background:#cccccc;">
  </div>
  <div class="sixteen wide  column">
    <label>Nota Extra </label>
    <input class="ui input" type="text" name="nota_cliente" maxlength="100" placeholder="Informaci&oacute;n adicional" style="background:#cccccc;">
  </div>
  <div class="sixteen wide  column">
   <div class="ui test toggle checkbox">
    <input class="ui input" type="checkbox" name="lista_correo">
    <label>Suscribir a nuestra Lista de Correo</label>
   </div>
  </div>
  <div class="sixteen wide  column">
    <p>(opcional) Puede suscribir a nuestra lista de correos electr&oacute;nicos donde recibiras informaci&oacute;n de nuevos productos y de los descuentos.</p>
  </div>
  <div class="sixteen wide  column">
    <?php
     function password_generate($chars)
     {
      $data='1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
      return substr(str_shuffle($data), 0, $chars);
     }
     $password=password_generate(8);
    ?>
   <label>Clave de Usuario</label>
   <label><span  class='font-red'>Tu Clave *</span></label>
  <div>
  <div class="sixteen wide  column">
    <input class="ui input" type="text" name="clave" value="<?php echo "$password" ?>" autocomplete="off" style="background:#cccccc;">
  </div>

  <div class="sixteen wide  column">
    <p><span class='font-red'>Anota este clave para futuro uso.</span> Para entrar al sistema vas a utilizar esta clave. O puede escribre una clave de tu preferencia. Debe tener minimo 8 caracteres.</p>
  </div>
  <div class="sixteen wide  column">
  <hr>
  </div>
  <div class="sixteen wide  column">
    <img src="../libs2/captcha/captcha.php" id="img" border="0" alt="captcha v1 phpform.net">
  </div>
  <div class="sixteen wide  column">
    <input class="ui input" type="text" name="captcha" placeholder="<< debe escribir el numero" autocomplete="off"  style="background:#cccccc;">
  </div>
  <div class="sixteen wide  column">
    <button class="ui fluid large blue submit button"  id="btnSubmit">Registrar Datos</button>
  </div>
  <div class="sixteen wide column padded">
    <p><span class='font-16'>Al finalizar de agregar los datos personales pisa el boton <b>Registrar Datos</b> para enviar los datos. </p>
  </div>
 </div>
</form>
<div class="description">
 <div class="result text-center"></div>
</div>
