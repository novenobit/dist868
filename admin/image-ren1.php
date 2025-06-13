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
$table="N";
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
$num2=0;
$dia=date("d");
$mes=date("m");
$ano=date("Y");
$amfm=date("a");
$submitted="$dia/$mes/$ano";
if(isset($_GET['nom']))
{ $nom="$_GET[nom]"; }

if(isset($_GET['returnTo']))
{ $returnTo="$_GET[returnTo]"; }
if(!isset($returnTo))
{
 $returnTo="FindImagesNotDataBase";
}
?>


<div class="ui grid">
 <div class="ten wide column"><h1>Renombrar Imagen</h1></div>
 <div class="six wide column" style"float: right;text-align: right;"><a class='fluid ui blue button' href='blank.php?fileToRun=FindImagesNotDataBase'>Regresa</a></div>
</div>

<div class="table-container">
<table class="ui fixed table" style="width:100%;">
<thead>
 <tr>
  <th style='background-color:#336699;color:#fff;text-align: center;'>Foto</th>
  <th style='background-color:#336699;color:#fff;'>Operacion</th>
 </tr>
</thead>
<tbody>

<?php
$filename=$nom;
$fileList = glob("../imagenes/productos/*");
//foreach($fileList as $filename=$nom)
//{
// if(is_file($filename))
// {
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
        <td style='background-color:#ffffff;color:#000000;padding: 0 10px 0 10px;'>
          <img class='ui centered medium image' src='../imagenes/productos/$filename' style='width:100px'>
        </td>
        <td style='background-color:#ffffff;color:#000000;padding: 10px;'>
          <h3>Nombre: $filename</h3>";
           echo "<form class='ui large form' action='image-ren2.php?nom=$filename' method='POST' enctype='multipart/form-data' id='submitForm'>";
?>
             <div class="ui stacked segment">
               <div class="field">
                 <lable>Nuevo Nombre</lable>
                <input type="text" name="nombre" value="<?php echo $filename; ?>">
                 <input type="hidden" id="nom" name="nom" value="<?php echo $nom; ?>">
                 <input type="hidden" id="returnTo" name="returnTo" value="<?php echo $returnTo; ?>">

               </div>
               <button class="ui fluid large teal submit button" type="submit">Cambiar Nombre</button>
             </div>
          </form>
<?php
          echo "</td>
       </tr>";
       $num++;
       //if($num++ == 15) {
       //  break;
       //}
       // $unlink="../imagenes/productos/$filename";
       // if($baseName<>"sinfoto" and $baseName<>"sinfoto2" and $baseName<>"index")
       // { unlink("../imagenes/productos/$filename"); }

// rename("/tmp/tmp_file.txt", "/home/user/login/docs/my_file.txt");

    }
   }
 //}
//}
?>
</tbody></table>
<div class="result text-center"></div>
</div>

<?php
if($num>0)
{
 //echo "<h2>Total Fotos: $num </h2>";
}
else
{
 echo "<h1>No Encuentro la Imagen</h1>";
}

$showStatus="N";
$endPage="N";
include("$dirRoot"."includes/statusAdmin.php");
?>

<script>
$(document).ready(function (e) {
 $("#submitForm").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
      url: "image-ren2.php?nom=<?php echo '$nom&nombre=$nombre&returnTo=$returnTo'; ?>",
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
