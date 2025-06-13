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
$label="S";
$list="S";
$message="S";
$autoPro="S";
$divider="S";
$dropdown="S";
$userLogin="N";
$mainFile="N";
$showTitle="N";
$dirRoot="./";
include_once("./includes/config.ini.php");
include_once("$dirRoot"."libs1/libImages.php");
if($mobile=="S")
{
 //echo "<link href='$dirRoot"."libs2/css/style-mobile.css' rel='stylesheet'>";
 echo "<html><meta http-equiv=refresh content=0;url=user-login-mobile.php>";
 exit();
}
else
{  echo "<link href='$dirRoot"."libs2/css/style-pc.css' rel='stylesheet'>"; }
?>

<div class="area">
 <ul class="circles">
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
 </ul>
</div>

<div class="card">
 <div class="ui middle aligned center aligned grid">
  <div class="column">
   <h2 class="ui image header">
    <img src="./imagenes/people/businessman.png" class="image">
    <div class="content font-white">
      Usuario Registrado
    </div>
   </h2>
   <form class="ui large form" action="./users/user-check.php" method="post" enctype="multipart/form-data" id="sendForm"  style="border-top-left-radius:25px;border-top-right-radius:25px;">
     <div class="ui stacked segment">
       <div class="field">
          <div class="ui left icon input focus">
            <i class="user icon"></i>
            <input type="text" name="usuario" placeholder="CI/RIF Usuario" autocomplete="off">
          </div>
       </div>
       <div class="field">

        <div class="ui grid">
         <div class="fourteen wide column">
           <div class="ui left icon focus input">
            <i class="fingerprint icon"></i>
            <input type="password" name="clave1" placeholder="Contrase&ntilde;a" id="myPass" autocomplete="off">
           </div>
         </div>
         <div class="two wide center aligned column">
          <a onclick="myFunction()"><i class="key icon font-black"></i></a>
         </div>
        </div>

       </div>
       <div class="field">
         <img src="./libs2/captcha/captcha.php" id="img" border="0" alt="captcha">
       </div>
       <div class="field">
        <div class="ui labeled input">
         <div class="ui label">
          Captcha
         </div>
         <input type="text" name="captcha" placeholder="indica numero de arriba" autocomplete="off">
        </div>
       </div>
       <button class="ui fluid large blue submit button">Login</button>
     </div>
     <div class="ui error message"></div>
   </form>
   <div class="ui message">
    Nuevo Usuario? <a class='ui blue button' href="user-registrar1.php">Entra aqui</a>
    <div class="result text-center"></div>
   </div>
  </div>
 </div>
</div>

</div>

<?php
$endPage="N";
$showStatus="N";
include("./includes/statusbar.php");
?>

<script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
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

function myFunction() {
  var x = document.getElementById("myPass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
$(document).ready(function (e) {
 $("#sendForm").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
   url: "./users/user-check.php?dirTra=1",
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
</body></html>
