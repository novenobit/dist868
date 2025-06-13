<h2><i class="product hunt icon"></i> Productos Reci&eacute;n Llegados a Venezuela</h2>
<div class="ui horizontal center aligned divided list">
 <?php
  if(!isset($textColor))
  { $textColor="font-white"; }
  $tableBucar="productos";
  $campo1="cod_categoria";
  $campo2="cod_subcategoria";
  $num=1;
  $sqlPro=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto from productos where activo='S' order by id_producto desc limit 20");
  while($proData=mysqli_fetch_array($sqlPro))
  {
   $id=$proData['id_producto'];
   $cod_producto=$proData['cod_producto'];
   $nom_producto=$proData['nom_producto'];
   $precio1_producto=$proData['precio1_producto'];
   echo "<a class='item' href='vercat3.php?idpro=$id'>
    <span class='font-white'>$num) $nom_producto</span></a>";
   $num++;
  }
  if(isset($sqlPro))
  { mysqli_free_result($sqlPro); }
 ?>
</div>
