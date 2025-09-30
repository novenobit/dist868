<table class="ui unstackable celled long scrolling table">
 <thead>
  <tr>
   <th class='black'>Codigo</th>
   <th class='black'>Producto</th>
   <th class='black center aligned'>Detal</th>
   <?php
    if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
    { echo "<th class='black center aligned'>Mayor</th>"; }
    if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
    { echo "<th class='black center aligned'>GMayor</th>"; }
   ?>
   <th class='black center aligned'>Und</th>
   <th class='black center aligned'>Emp</th>
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
     $id_producto=$proData['id_producto'];
     $nomProducto=$proData['nom_producto'];
     //$codSubCat=$proData['cod_subcategoria'];
     $codigo_barra=$proData['codigo_barra'];
     $precio1_producto=$proData['precio1_producto'];
     $precio2_producto=$proData['precio2_producto'];
     $precio3_producto=$proData['precio3_producto'];
     $precio4_producto=$proData['precio4_producto'];
     $nom_unidad=$proData['nom_unidad'];
     $empaque=$proData['empaque'];
     //$precio1_producto="". number_format($precio1_producto,2,',', '.') . "";
     if($precio1_producto=="0")
     { $precio1_producto=""; }
     if($precio2_producto=="0")
     { $precio2_producto=""; }
     if($precio3_producto=="0")
     { $precio3_producto=""; }

     echo "<tr>
      <td class='tdBorder'>
       $codigo_barra
      </td>
      <td class='tdBorder'>
       $nomProducto
      </td>
      <td class='tdBorder center aligned'>
       $precio1_producto
      </td>";
       if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
       { echo "<td class='tdBorder center aligned'>$precio2_producto</td>"; }
       if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
       { echo "<td class='tdBorder center aligned'>$precio3_producto</td>"; }
      echo "<td class='tdBorder center aligned'>$nom_unidad</td>";
      echo "<td class='tdBorder center aligned'>$empaque</td>";
      echo "<td class='tdBorder center aligned'>";
?>

<center style="padding:0px;">
 <button data-modal="modal<?php echo $num; ?>" id="call-modal-<?php echo $num; ?>" class="ui orange button">Ver</button>
</center>

<div class="ui modal" id="modal<?php echo $num; ?>" style="background-color:#212121;height:500px;">
 <div class="header"><?php echo $nomProducto; ?></div>
 <div class="scrolling content"  style="background-color:#ededed;">
   <iframe src="<?php echo "goto-page.php?id=$id_producto&modalId=$num"; ?>" height='500px' width='100%' name='data2' frameborder='0' scrolling='auto' allowtransparency='true'></iframe>
 </div>
 <div class="actions">

       <a class="ui animated button" tabindex="0" href='#'>
       <div class="visible content">Retornar</div>
       <div class="hidden content">
         <i class="left arrow icon"></i>
       </div>
      </a>

  <div class="ui blue deny button">
       Cerrar/Close
  </div>

 </div>
</div>

<?php
       echo "
      </td>";

     echo "</tr>";
     $ves++;
     $num++;
     if($ves==3)
     { $ves=1; }

if (ob_get_level() == 0) ob_start();
for ($i = 0; $i<10; $i++){
        ob_flush();
        flush();
      //  sleep(1);
}

    // FlushData();
// echo "br".sprintf( '%8d: ', $i ), memory_get_usage() - $baseMemory, "\n";
//    sleep(1);
   }
 }
?>
</tbody></table>
<?php
}
?>
