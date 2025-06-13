
   <h2 class="ui teal header">Nuevo Usuario</h2>
   <p class="description font-white">Para registrarte en el Sistema s&oacute;lo tienes que rellenar los siguientes datos. <b>ATENCI&Oacute;N</b>: todos los campos se&ntilde;alados en ROJO son necesarios.</span></p>
   <form class="ui large form" action="user-registrar2.php" method='post' enctype="multipart/form-data">
    <div class="ui stacked segment left aligned">

      <h4 class="ui dividing header">Contacto</h4>

      <div class="two fields">
              <div class="field left aligned">
                  <lable>Nombre <span class='font-red'>*</span></label>
                  <input type="text" name="nombre" placeholder="Nombre" style="background-color:#ECECEC;">
              </div>
              <div class="field">
                  <lable>Apellido <span class='font-red'>*</span></label>
                  <input type="text" name="apellido" placeholder="Apellido" style="background-color:#ECECEC;">
              </div>
      </div>
      <div class="two fields">
              <div class="field">
                  <lable>Celular <span class='font-red'>*</span></label>
                  <div class="ui left icon input">
                    <i class="phone icon"></i>
                    <input type="text" name="celular" placeholder="Celular" style="background-color:#ECECEC;" autocomplete="off">
                  </div>
              </div>

              <div class="field">
                  <lable>Correo <span class='font-red'>*</span></label>
                  <div class="ui left icon input">
                    <i class="mail icon"></i>
                    <input type="text" name="email" placeholder="Correo" style="background-color:#ECECEC;">
                  </div>
              </div>

      </div>

      <hr style="border-top: 1px dashed red;">
      <h4 class="ui dividing header">Datos de Usuario</h4>
      <div class="two fields">
              <div class="field">
                  <lable>Usuario <span class='font-red'>*</span></label>
                  <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="usuario" placeholder="Nombre Usuario" style="background-color:#ECECEC;" autocomplete="off">
                  </div>
              </div>

              <div class="field">
                  <lable>Clave <span class='font-red'>*</span></label>
                  <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" name="clave1" placeholder="Contrase&ntilde;a" style="background-color:#ECECEC;" autocomplete="off">
                  </div>
              </div>
      </div>
      <div class="field">
                  <div class="ui ignored message center aligned">
                  Nombre de Usuario y la Contrase&ntilde;a (entre 6 y 20 car&aacute;cteres)
                  </div>
      </div>
      <hr style="border-top: 1px dashed red;">
      <div class="field">
                <img src="./libs2/captcha/captcha.php" id="img" border="0" alt="captcha v1 phpform.net">
      </div>
      <div class="field">
                <div class="ui left icon input">
                  <i class="hand point up icon"></i>
                  <input type="number" name="captcha" placeholder="indica numero de arriba" style="background-color:#ECECEC;">
                </div>
      </div>
      <div class="ui ignored message center aligned">
                Debe indicar el numero de arriba
      </div>
      <button class="ui fluid large green submit button">Enviar Datos</button>
    </div>
    <div class="ui error message"></div>
   </form>
   <div class="ui message center aligned">
    <a href="user-login.php"><b>Usuario Registrado entra aqu&iacute;</b> <i class="folder open outline icon"></i></a>
   </div>

