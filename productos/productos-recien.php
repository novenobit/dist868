<!-- productos-recien.php -->
<?php
if(!isset($op))
{ $op=""; }
$submitted="$dia/$mes/$ano";
$sqldata="select * from productos where submitted='$submitted' and activo='S' order by id_producto DESC";
?>
<table class="ui unstackable celled long scrolling table">
 <thead>
  <tr>
   <th class='black'>Cod.Barra</th>
   <th class='black'>Producto</th>
   <th class='black center aligned'>P.Detal</th>
   <?php
    if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
    { echo "<th class='black center aligned'>P.Mayorista</th>"; }
    if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
    { echo "<th class='black center aligned'>P.Especial</th>"; }
   ?>
   <th class='black center aligned'>Und</th>
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
        <td>
         <a href=\"javascript:popup_center('producto-ver-simple.php?op=$op&id={$proData['id_producto']}&winClose=S','600','500'); \">$codigo_barra</a>
        </td>
        <td>
         <a href=\"javascript:popup_center('producto-ver-simple.php?op=$op&id={$proData['id_producto']}&winClose=S','600','500'); \">{$proData['nom_producto']}</a>
        </td>
        <td class='center aligned'>
          $precio1_producto
        </td>";
            if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
            { echo "<td class='center aligned'>$precio2_producto</td>"; }
            if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
            { echo "<td class='center aligned'>$precio3_producto</td>"; }
        echo "<td class='center aligned'>{$proData['nom_unidad']}</td>
        </tr>";
        $ves++;
        $num++;
        if($ves==3)
        { $ves=1; }
        FlushData();
      }
    }
 ?>
 </tbody>
</table>
<br>Num.Productos: <?php echo $num; ?>
