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
$tabs="S";
$table="N";
$topAdmin="N";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
// --------------------------------------------
if(!isset($areasSistema))
{
 include_once("../bots/AreasSistema.php");
}
if(!isset($AreaProductos) or $AreaProductos<>"S" and $AreaAdmin<>"S")
{
  $error="No Tienes Permiso de Usar Esta Seccion";
  error();
  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."users/usersection.php>";
  exit();
}
// --------------------------------------------
$num=0;
$num2=0;
$dia=date("d");
$mes=date("m");
$ano=date("Y");
$amfm=date("a");
$submitted="$dia/$mes/$ano";
$cod_empresa="supermariche";
?>

<div class="table-container">
<h1>Images que no esta en la DataBase de Productos</h1>
<p>Copia el Codigo y agregar manualmente a la Base de Datos.</p>

<table class="ui fixed table" style="width:100%;">
<thead>
 <tr>
  <th style='background-color:#336699;color:#fff;text-align: center;'>Foto</th>
  <th style='background-color:#336699;color:#fff;'>Operacion</th>
 </tr>
</thead>
<tbody>

<?php
$fileList = glob("../imagenes/productos/*");
foreach($fileList as $filename)
{
 if(is_file($filename))
 {
   $numFilas1=0;
   $numFilas2=0;
   $filename=basename($filename);
   $baseName=substr($filename,0, -4);
   $ext=substr($filename,-3);

//Productos
   if($filename<>"" and $ext<>"php" and $ext<>"html" and $ext<>"pdf" and $ext<>"xls")
   {
    $sql1=mysqli_query($conex1,"select codigo_barra,nom_producto,foto_producto from productos where codigo_barra='$baseName'");
    $numFilas1=mysqli_num_rows($sql1);
// UpdateData
    if($numFilas1==0 and $filename<>"sinfoto.png" and $filename<>"sinfoto2.png")
    {
       $unlink="../imagenes/productos/$filename";
       echo "<tr>
        <td class='image center aligned' style='background-color:#ffffff;color:#000000;padding: 0 10px 0 10px;'>
          <img src='../imagenes/productos/$filename' style='width:100px'>
        </td>
        <td style='background-color:#ffffff;color:#000000;padding: 10px;'>
          <p>Nombre Imagen: $filename</p>
          <p class='font-red' id='p$num'>$baseName</p>";

           echo "<div class='ui three column centered grid'>
             <div class='column center aligned'><a class='tiny ui purple button' onclick=\"copyToClipboard('#p$num')\">Copiar Codigo</a></div>
             <div class='column center aligned'><a class='tiny ui grey button' href='image-del1.php?nom=$filename'>Borrar</a></div>
             <div class='column center aligned'><a class='tiny ui grey button' href='image-ren1.php?nom=$filename'>Renombrar</a></div>
           </div>";

          echo "</td>
       </tr>";
       $num++;
       //if($num++ == 15) {
       //  break;
       //}
       // $unlink="../imagenes/productos/$filename";
       // if($baseName<>"sinfoto" and $baseName<>"sinfoto2" and $baseName<>"index")
       // { unlink("../imagenes/productos/$filename"); }
    }
   }
 }
}
?>
</tbody></table>
</div>
<?php
if($num>0)
{
 echo "<h1>Total Fotos: $num Sin Datos: $num</h1>";
}
else
{
?>
<html><meta http-equiv=refresh content=10;url=right-menu.php>
<br><br>
<?php
}
$showStatus="N";
$endPage="N";
include("../includes/statusAdmin.php");
?>

<script>
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
</script>

</body>
</html>
