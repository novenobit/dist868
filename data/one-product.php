<?php
//include("$dirRoot"."data/one-product.php");

$tableBucar="productos";
$campo1="id_productos";
$campo2="cod_subcategoria";
if(!isset($cod_subcategoria))
{ $cod_subcategoria="1250060"; }
if(!isset($numRegShow))
{ $numRegShow=1; }

//$sqlProDataAdd=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,foto_producto from productos where cod_subcategoria='$cod_subcategoria' and foto_producto<>'' order by rand() limit $numRegShow");
//$sqlProDataAdd=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,foto_producto from productos where nom_producto like '%pointer%' and foto_producto<>'' order by rand() limit $numRegShow");
$sqlProDataAdd=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,precio2_producto,foto_producto from productos where especial='S' and foto_producto<>'' and activo='S' order by rand() limit $numRegShow");
while($ProDataAdd=mysqli_fetch_array($sqlProDataAdd))
{
 $idpro=$ProDataAdd['id_producto'];
 $codProducto=$ProDataAdd['cod_producto'];
 $nomProducto=$ProDataAdd['nom_producto'];
 $precio1_producto=$ProDataAdd['precio1_producto'];
 $precio2_producto=$ProDataAdd['precio2_producto'];
 $antes=(($precio1_producto*15)/100)+$precio1_producto;
 $fotoProducto=$ProDataAdd['foto_producto'];
 if($fotoProducto=="")
 { $fotoProducto="sinfoto.png"; }
 ?>
 <div class="ui fluid centered card aos-item" aos="flip-left" data-aos-delay='300' style="border-radius:15px;">
  <div class="content">
    <div class="right floated meta"><i class="heart outline icon"></i></div>
    <span class='font-16 font-bold font-blue'>Sugeridos</span>
  </div>
  <div class="image center aligned" style='background-color:#ffffff;'>
   <?php
    echo "<a href='vercat3.php?idpro=$idpro'>";
     if(!file_exists("$dirRoot"."imagenes/productos/$fotoProducto"))
     {
       echo "<img class='ui small rounded centered image' src='$dirRoot"."imagenes/sinfoto.png' alt='$nomProducto'>";
     }
     else
     {
       echo "<img class='ui small rounded centered image' src='$dirRoot"."imagenes/productos/$fotoProducto' alt='$nomProducto'>";
     }
    echo "</a>";
   ?>
  </div>
  <div class="content">
    <a class="header"><span class='font-pink'>Mayor</span> <?php echo $precio2_producto; ?></a>
    <div class="meta">
     <span class="date">Detal <?php echo $precio1_producto; ?></span>
    </div>
    <div class="description">
      <?php echo $nomProducto; ?>
    </div>
  </div>
 </div>
<?php
 $Data="";
}
if(isset($sqlProDataAdd))
{ mysqli_free_result($sqlProDataAdd); }
?>
