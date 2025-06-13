<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  admin1.php                                                 //
// ****************************************************************
include_once("../includes/session.php");

$accordion="S";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$forms="N";
$header="N";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$loadPage="N";
$menu="N";
$message="S";
$modal="N";
$popup="N";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$tabs="N";
$table="S";
$topAdmin="N";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
// --------------------------------------------
if(!isset($areasSistema))
{
 include_once("../bots/AreasSistema.php");
}
if($AreaProductos<>"S" and $AreaAdmin<>"S")
{
  $error="No Tienes Permiso de Usar Esta Seccion";
  error();
  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."users/usersection.php>";
  exit();
}
// --------------------------------------------
$num=0;
$dia=date("d");
$mes=date("m");
$ano=date("Y");
$amfm=date("a");
?>

<?php
if(!isset($zona_envio))
{ $zona_envio=""; }
?>
<table class="ui unstackable celled scrolling very long table">
<thead>
  <tr>
   <th class='font-14 blue'>Zona de Envio</th>
   <th class='font-14 blue center aligned'>Precio</th>
  </tr>
</thead>
<tbody>
  <?php
   $sql=mysqli_query($conex1,"select * from zonas_envio order by zona_envio desc");
   while($zonaData=mysqli_fetch_array($sql))
   {
    echo "<tr><td class='font-14'>";
     if(isset($clienteData))
     {
        echo "<a href='zonas-envio.php?op=add&id={$zonaData['id']}&id_cuenta?id_cuenta&mobile=$mobile'>{$zonaData['zona_envio']}</a>";
     }
     else
     {
        echo "{$zonaData['zona_envio']}";
     }
     echo "</td>
     <td class='font-14 center aligned'>
      ". number_format("{$zonaData['zona_precio']}",2,',', '.') . "
     </td></tr>";
   }
   if(isset($sql))
   { mysqli_free_result($sql); }
  ?>
</tbody></table>
