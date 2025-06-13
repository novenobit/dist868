<h2><i class="product hunt icon"></i> Ofertas y Remates - Solo en Nuestra Tienda</h2>
<div class="ui horizontal center aligned divided list">
 <?php
  if(!isset($textColor))
  { $textColor="blueTextBold"; }
  $tableBucar="productos";
  $campo1="cod_categoria";
  $campo2="cod_subcategoria";
  $num=1;
  $sqlPro=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto from productos where cod_subcategoria='1850020' and activo='S' order by rand() limit 20");
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
