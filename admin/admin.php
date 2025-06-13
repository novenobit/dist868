<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  admin.php                                                  //
// ****************************************************************
include_once("../includes/session.php");

$accordion="N";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$forms="N";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$popup="N";
$popupWindow="N";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$tabs="S";
$table="S";
$topAdmin="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(!isset($iduser) or !isset($_SESSION['apellido']))
{ include_once("../users/user-check2.php"); }
// --------------------------------------------
if(!isset($areasSistema))
{ include_once("../bots/AreasSistema.php"); }

if($AreaAdmin<>"S")
{
 echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."users/usersection.php>";
 exit();
}
else
{
 include("../includes/leftbar.php");
?>

 <div class="mainContent">
  <div id="content">
   <div class="ui grid">
    <div class="sixteen wide column">
      <?php
       include("sub-menu.php");
       //include("$dirRoot"."data/marquee.php");
      ?>
    </div>
    <div class="eight wide column">
       <div class="ui top attached tabular menu">
        <a class="item active" data-tab="DataBase" style="background-color:#ffffff;color:#171717;">DataDase</a>
        <a class="item" data-tab="Comenta" style="background-color:#ffffff;color:#171717;">Comenta</a>
        <a class="item" data-tab="Menu" style="background-color:#ffffff;color:#171717;">Menu</a>
       </div>
       <div class="ui bottom attached tab segment active" data-tab="DataBase">
         <iframe src="database.php" width="100%" height="510px" style="border:none;"></iframe>
       </div>
       <div class="ui bottom attached tab" data-tab="Comenta">
          <?php
            include("comenta-list1.php");
          ?>
       </div>
       <div class="ui bottom attached tab segment" data-tab="Menu">

         <iframe src="menu.php" width="100%" height="510px" style="border:none;"></iframe>

       </div>
       <div class="ui bottom attached tab segment" data-tab="third">
        <h2>Panel de Control</h2>
        <p>
          <b>Base de Datos</b>
          <br>Administración de la Base de Datos. Solo para el Administrador
          <br><b>Cambiar Clave</b>
          <br>Solo utiliza esta sección puede cambiar la Clave de un Usuario
          <br><b>Empleado Temporal</b>
          <br>Crear un Empleado Temporal con Acceso Limitado al Sistema.
          <br><b>Crear Las Tablas</b>
          <br>Crea Todas las Tablas que Utiliza la Base de Datos del Sistema.
          <br><b>Reparar Datos</b>
          <br>Repara todas las Tables de la Base de Datos de testing.
          <br><b>Agregar y Actualizar Datos</b>
          <br>Solo utiliza esta sección para la instalación del sistema.
          <br><b>Actualizar Tablas Viejas</b>
          <br>Solo utiliza esta sección para Actualizar las Base de Datos viejos. Los que tienen datos antes del 2020.
          <br><b>Reparar Datos de Usuarios</b>
          <br>Repara la Base de Datos de los Usuarios.
          <br><b>Support &#124; Recibir Soporte</b>
          <br>Recibir Soporte Remote en Google Chrome. Google remote desktop
          <?php
          //echo $nota;
          //echo mb_convert_encoding($nota, 'HTML-ENTITIES', "UTF-8");
          //echo $nota2;
         ?>
        </p>
       </div>
       <div class="ui bottom attached tab segment" data-tab="Pedidos">
         en reparacion
        <?php
        // include("pedidos.php");
        ?>
       </div>

    </div>
    <div class="eight wide column">
      <iframe src="right-menu.php" height='700' width='100%' name='data2'  frameborder='0' scrolling='auto' allowtransparency='true' onload='resizeIframe(this)'></iframe>
      <div class="mainContent">
       <div id="content"></div>
      </div>
    </div>
   </div>
 </div>
</div>

<?php
}

$showStatus="N";
include("../includes/statusAdmin.php");
?>
