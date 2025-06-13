<?php
$sqlNumCompra=0;
$sqlFD1=mysqli_query($conex1, "select cantidad,precio1_producto,dia,mes,ano from respaldo_cesta where cid_cliente='$cid_cliente' and codigo_barra='$codigo_barra'");
$sqlNumCompra=mysqli_num_rows($sqlFD1);
if($sqlNumCompra>0)
{
?>
<table class="ui unstackable celled long scrolling table">
 <thead>
  <tr>
   <th class='center aligned' style='background-color:#cccccc;color:#fff;'>Historia</th>
   <th class='center aligned' style='background-color:#cccccc;color:#fff;'>Cantidad</th>
   <th class='center aligned' style='background-color:#cccccc;color:#fff;'>Precio</th>
  </tr>
 </thead>
 <tbody>
 <?php
  if(!isset($mobile))
  { $mobile="N"; }
  $num=0;

  while($compraData=mysqli_fetch_array($sqlFD1))
  {
    $cantidad=$compraData['cantidad'];
    $precio1_producto=$compraData['precio1_producto'];
    $dia=$compraData['dia'];
    $mes=$compraData['mes'];
    $ano=$compraData['ano'];
    echo "<tr>
      <td class='center aligned tdBorder'>
        $dia/$mes/$ano
      </td>
      <td class='tdBorder center aligned'>
       $cantidad
      </td>
      <td class='tdBorder center aligned'>
       ". number_format($precio1_producto,2,',', '.') . "
      </td>
    </tr>";
     $num++;
  }
 ?>
 </tbody>
</table>
<?php
}
?>
