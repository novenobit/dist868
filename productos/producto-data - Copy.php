<table class="ui unstackable celled long scrolling table">
 <thead>
  <tr>
   <th>Codigo</th>
   <th>Producto</th>
   <th class='center aligned'>Detal</th>
   <?php
    if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
    { echo "<th class='black center aligned'>Mayor</th>"; }
    if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
    { echo "<th class='black center aligned'>GMayor</th>"; }
   ?>
   <th class='center aligned'>Und</th>
   <th class=center aligned'>Emp</th>
   <th class='center aligned'>OP</th>
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
          echo "<td class='tdBorder center aligned'>
          <a class='ui orange button' href='goto-page.php?id=$id_producto'>Ver</a>
          </td>";
        echo "</tr>";
        $ves++;
        $num++;
        if($ves==3)
        { $ves=1; }
      }
   }
  }
 ?>
 </tbody>
</table>
