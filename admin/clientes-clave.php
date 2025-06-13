<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  admin1.php                                                 //
// ****************************************************************
include_once("../includes/session.php");

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
// --------------------------------------------
if(!isset($areasSistema))
{
 include_once("../bots/AreasSistema.php");
}

if(isset($AreaAdmin) and $AreaAdmin<>"S" or $AreaClientes<>"S")
{
  $error="No Tienes Permiso de Usar Esta Seccion";
  error();
  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."users/usersection.php>";
  exit();
}

// --------------------------------------------

if(!isset($iduser) or !isset($_SESSION['apellido']))
{ include_once("../users/user-check2.php"); }

if($AreaAdmin=="N" and $idnivel>=4)
{
 echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."cuentas/cuentas.php>";
 exit();
}
else
{
 //include("../includes/leftbar.php");
 // include("sub-menu.php");
 // include("$dirRoot"."data/marquee.php");
?>
<div class="ui stackable grid">
 <div class="twelve wide column">
  <table class="ui unstackable selectable celled long scrolling table">
   <thead>
       <tr>
        <th class='blue center aligned'>CI/RIF</th>
        <th class='blue'>Nombre Cliente</th>
        <th class='blue'>Clave Nuevo</th>
       </tr>
   </thead>
   <tbody>
    <?php
      $num=0;
      $sql=mysqli_query($conex1,"select id_cliente,cid_cliente,cod_cliente,nom_cliente from clientes where activo='S' order by nom_cliente");
      while($clienteData=mysqli_fetch_array($sql))
      {
        $id_cliente=$clienteData['id_cliente'];
        $cid_cliente=$clienteData['cid_cliente'];
        $cod_cliente=$clienteData['cod_cliente'];
        $nom_cliente=$clienteData['nom_cliente'];
        //if($cod_cliente=="" and strlen($cid_cliente)>6)
        //{ $cod_cliente=substr($cid_cliente, -5); }

        echo "<tr>
         <td class='tdBorder center aligned'>
          $cid_cliente
         </td>
         <td class='tdBorder'>
          $nom_cliente
         </td>
         <td class='tdBorder'>
          {$clienteData['cod_cliente']}
         </td>
        </tr>";

        if($cod_cliente=="" and strlen($cid_cliente)>=6)
        {
          $cod_cliente=substr($cid_cliente, -6);
          $cod_cliente=md5($cod_cliente);
          $queryCLI="UPDATE clientes set cod_cliente='$cod_cliente' where clientes.id_cliente='{$clienteData['id_cliente']}'";
          $result=mysqli_query($conex1,$queryCLI);
        }

      }
     ?>
   </table>
 </div>
 <div class="four wide column">
   <?php
     include_once("../libs1/loader.php");
     // include("../includes/left-menu.php");
     // include("../productos/left-menu.php");
     echo "<html><meta http-equiv=refresh content=4;url=admin.php>";
   ?>
 </div>
</div>

<br><br>
<?php
}
$showStatus="N";
include("../includes/statusAdmin.php");
//exit();
?>
<script>
window.parent.location = window.parent.location
</script>
