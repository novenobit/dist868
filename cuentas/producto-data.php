<table class="ui unstackable celled long scrolling table">
 <thead>
  <tr>
   <th class='black'>Producto</th>
   <th class='black center aligned'>P.Ref</th>
   <?php
    if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
    { echo "<th class='black center aligned'>P.May</th>"; }
    if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
    { echo "<th class='black center aligned'>Gran.May</th>"; }
   ?>
   <th class='black center aligned'>OP</th>
  </tr>
 </thead>
<tbody>
<?php
if(!isset($sqldata) or empty($sqldata))
{
 $error="No hay Datos, ningun producto o la fecha no fue seleccionado";
 error();
 exit();
}
else
{
 $num=0;
 $ves=0;
 FlushData();
 $sql=mysqli_query($conex1,"$sqldata");
 while($proData=mysqli_fetch_array($sql))
 {
  if(isset($proData))
  {
     $codCat=$proData['cod_categoria'];
     $codSubCat=$proData['cod_subcategoria'];
     $codigo_barra=$proData['codigo_barra'];
     $precio1_producto=$proData['precio1_producto'];
     $precio2_producto=$proData['precio2_producto'];
     $precio3_producto=$proData['precio3_producto'];
     //$precio1_producto="". number_format($precio1_producto,2,',', '.') . "";
     if($precio1_producto=="0")
     { $precio1_producto=""; }
     if($precio2_producto=="0")
     { $precio2_producto=""; }
     if($precio3_producto=="0")
     { $precio3_producto=""; }

     echo "<tr>
      <td class='tdBorder'>
       {$proData['nom_producto']}
       <br>($codigo_barra)
      </td>
      <td class='tdBorder center aligned'>
       $precio1_producto
      </td>";
      if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
      { echo "<td class='tdBorder center aligned'>$precio2_producto</td>"; }
      if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
      { echo "<td class='tdBorder center aligned'>$precio3_producto</td>"; }
      echo "<td class='tdBorder center aligned'>
        <a href='agrega-cesta4.php?id_cuenta=$id_cuenta&codCat=$codCat&codSubCat=$codSubCat&codPro={$proData['cod_producto']}&sistema=$sistema'>
        <i class='big cart arrow down icon'></i></a>
      </td>
     </tr>";
     $ves++;
     $num++;
     if($ves==3)
     { $ves=1; }
     FlushData();
  }
 }
}
?>
</tbody></table>
<p>Num.Productos: <?php echo $num; ?></p>
