<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  admin1.php                                                 //
// ****************************************************************
include_once("../includes/session.php");

$accordion="N";
$aos="N";
$autoPro="N";
$breadCrumb="N";
$divider="N";
$dropdown="N";
$forms="S";
$header="N";
$icon="N";
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
$sidebar="N";
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
if(!isset($AreaProductos) or $AreaProductos<>"S" and $AreaAdmin<>"S")
{
  $error="No Tienes Permiso de Usar Esta Seccion";
  error();
  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."users/usersection.php>";
  exit();
}
// --------------------------------------------
if(isset($_GET['cod']))
{ $cod="$_GET[cod]"; }
?>

<h1>No Esta la Foto en Disco</h1>
<table class="ui unstackable celled very long scrolling table">
<thead>
 <tr>
  <th style='background-color:#336699;color:#fff;'>Producto</th>
  <th style='background-color:#336699;color:#fff;text-align:center;width:200px;'>Foto</th>
 </tr>
</thead>
<tbody>

<?php
$sqldata="select id_producto,codigo_barra,nom_producto,foto_producto from productos where codigo_barra='$cod'";
$sql=mysqli_query($conex1,"$sqldata");
while($proData=mysqli_fetch_array($sql))
{
 $id_producto=$proData['id_producto'];
 $codigo_barra=$proData['codigo_barra'];
 $nom_producto=$proData['nom_producto'];
 $foto_producto=$proData['foto_producto'];
//Productos
 echo "<tr>
  <td style='background-color:#ffffff;color:#000000;'>
     <p>$nom_producto<br>Codigo: $codigo_barra</p>
  </td>
  <td class='center aligned' style='background-color:#ffffff;color:#000000;text-align:center;width:200px;'>
    <p>$foto_producto</p>
  </td>
 </tr>";
}
?>
</tbody></table>

<?php
echo "<form class='ui large form' action='FindImagesNotOnDisk3.php?nom=$foto_producto' method='POST' enctype='multipart/form-data' id='submitForm'>";
?>
   <div class="ui stacked segment">
     <div class="field">
       <lable>Nuevo Nombre</lable>
       <input type="text" name="nombre" value="<?php echo $foto_producto; ?>">
       <input type="hidden" id="nom" name="nom" value="<?php echo $foto_producto; ?>">
       <input type="hidden" id="id" name="id" value="<?php echo $id_producto; ?>">
     </div>
     <button class="ui fluid large teal submit button" type="submit">Cambiar Nombre</button>
   </div>
</form>
<div class="result text-center"></div>

<br><br>
<?php
$showStatus="N";
$endPage="N";
include("$dirRoot"."includes/statusAdmin.php");
?>

<script>
$(document).ready(function (e) {
 $("#submitForm").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
      url: "FindImagesNotOnDisk3.php?nom=<?php echo '$nom_producto&id=$id&nombre=$nombre'; ?>",
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
