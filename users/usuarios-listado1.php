<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  usuarios-listado1.php                                                   //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="S";
$icon="S";
$input="S";
$list="N";
$sidebar="S";
$table="S";
$message="S";
$popup="N";
$label="S";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="S";
$divider="S";
$forms="N";
$dropdown="S";
$breadCrumb="S";
$dirRoot="../";
include_once("../includes/config.ini.php");

FechayHora();
$todoBien="N";
$autoUsuarios="S";
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
?>

<div class="ui padded grid">
 <div class="three wide tablet only three wide computer only column sidebar" id="sidebar">
   <?php
    include("../includes/left-menu.php");
   ?>
 </div>
 <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">

  <div class="ui raised segment">
   <div class="ui stackable one column grid">
    <div class="column">
     <?php
      include("sub-menu.php");
     ?>
    </div>
   </div>
  </div>
  <?php
    include("usuarios-list-abc1.php");
//  -----------------------------------------
?>
    <h2 class="menu-label">usuarios</h2>
<?php
     $numFilas=0;
     $sqlNumVentas=mysqli_query($conex1,"select iduserfrom usuarios limit 2");
     $numFilas=mysqli_num_rows($sqlNumVentas);
     if($numFilas>0)
     {
?>
    <h2 class="menu-label">Listado de usuarios</h2>
    <table class="ui unstackable celled long scrolling table">
     <thead>
      <tr>
       <th class='center aligned'>#</th>
       <th class='center aligned'>RIF/CI</th>
       <th>Usuario</th>
       <th class='center aligned'>Telefono</th>
       <th class='center aligned'>Ven</th>
       <th class='center aligned'>OP</th>
      </tr>
     </thead>
     <tbody>
     <?php
      $reg=0;
      $num=1;
      $sqlUsuario=mysqli_query($conex1,"select iduser,cid_usuario,nombre,email from usuarios");
      while($usuarioData=mysqli_fetch_array($sqlUsuario))
      {
       $id=$usuarioData['iduser'];
       $cid_usuario=$usuarioData['cid_usuario'];
       $nombre=$usuarioData['nombre'];
       $email=$usuarioData['email'];
       $numFilas=0;
       $sqlVentas=mysqli_query($conex1,"select id_venta from ventas where cid_usuario='$cid_usuario'");
       $numFilas=mysqli_num_rows($sqlVentas);
       if($numFilas==0)
       { $numFilas=""; }
       echo "<tr><td class='center aligned'>$num</td>
        <td class='center aligned'>$cid_usuario</td>
        <td><a href='abrir-cuenta2.php?id=$id'>$nombre</a></td>
        <td class='center aligned'>$email</td>
        <td class='center aligned'>$numFilas</td>
        <td class='center aligned'>
         <a class='button is-small is-rounded' href='abrir-cuenta2.php?id=$id'><i class='large user tie icon'></i></a>
        </td>
       </tr>";
       $reg++;
       $num++;
      }
    ?>
    </tbody>
   </table>
<?php
     }
    ?>


    </div>
</div>

<?php
// $limit=20;
// include("ingredientes.php");
?>

<br><br><br>
<?php
 include("$dirRoot"."includes/statusAdmin.php");
?>
