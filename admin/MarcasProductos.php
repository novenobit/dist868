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
   <th class='font-14 blue center aligned'>Codigo</th>
   <th class='font-14 blue'>Marcas de Productos</th>
   <th class='font-14 blue center aligned'>Logo</th>
  </tr>
</thead>
<tbody>
  <?php
   $sql=mysqli_query($conex1,"select * from marcas order by nom_marca");
   while($marcaData=mysqli_fetch_array($sql))
   {
    echo "<tr><td class='font-14'>";
        echo "{$marcaData['cod_marca']}";
     echo "</td><td class='font-14'>";
        echo "{$marcaData['nom_marca']}";
     echo "</td>
     <td class='font-14 center aligned'>";
      if($marcaData['logo_marca']<>"")
      { $foto=$marcaData['logo_marca']; }
      else
      { $foto="sinfoto.png"; }
      echo "<img class='ui centered image' src='../imagenes/marcas/$foto' style='height:60px;'></a>
     </td></tr>";
   }
   if(isset($sql))
   { mysqli_free_result($sql); }
  ?>
</tbody></table>
