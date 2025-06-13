<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  abrir-cuenta1.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$accordion="S";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$findData="S";
$forms="S";
$grids="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$jQueryModal="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$popupWindow="S";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$table="S";
$topAdmin="S";
$autoCliente="S";
$dirRoot="../";

$tableUse="cuentas1";
include_once("../includes/headfileFrame.php");
FechayHora();
$todoBien="N";
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php?sistema=$sistema>";
  exit();
}
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
include("submenu-buscar.php");
?>

<h3 class="menu-label">Nueva Cuenta > Listado de Clientes</h3>
<table class="ui unstackable celled selectable table">
 <thead>
   <tr>
    <th class='blue center aligned' style='width:60px'>#</th>
    <th class='blue'>Cliente</th>
    <th class='blue center aligned' style='width:100px;'>Ven</th>
   </tr>
 </thead>
 <tbody>
     <?php
      $reg=0;
      $num=1;
      $sqlCliente=mysqli_query($conex1,"select id_cliente,cid_cliente,nom_cliente,tel1_cliente from clientes order by nom_cliente");
      while($clienteData=mysqli_fetch_array($sqlCliente))
      {
       $id=$clienteData['id_cliente'];
       $cid_cliente=$clienteData['cid_cliente'];
       $nom_cliente=$clienteData['nom_cliente'];
       $tel1_cliente=$clienteData['tel1_cliente'];
       $numFilas=0;
       $sqlVentas=mysqli_query($conex1,"select id_venta from ventas where cid_cliente='$cid_cliente'");
       $numFilas=mysqli_num_rows($sqlVentas);
       if($numFilas==0)
       { $numFilas=""; }
       echo "<tr><td class='center aligned' style='width:60px'>$num</td>
        <td>
         <a class='font-orange' href='$dirRoot"."cuentas/abrir-cuenta2.php?id=$id&sistema=$sistema'>
          $nom_cliente<br>CI/RIF: $cid_cliente";
          if($tel1_cliente<>"")
          { echo " Tel: $tel1_cliente"; }
         echo "</a>
        </td>
        <td class='center aligned' style='width:100px;'>$numFilas</td>
       </tr>";
       $reg++;
       $num++;
      }
    ?>
 </tbody>
</table>


<?php
// $showStatus="N";
$endPage="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
<script>
function openLinkInDiv(linkUrl) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", linkUrl, true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      var div = document.getElementById("myDiv");
      div.innerHTML = xhr.responseText;
    } else {
      console.log("Error loading link: " + xhr.status);
    }
  };
  xhr.send();
}</script>

</body></html>
