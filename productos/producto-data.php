<table class="ui unstackable celled very long scrolling table">
 <thead>
  <tr>
   <th style='background-color:#2f50c1;color:#d9e6fd;width:400px'><?php echo $titlePage; ?></th>
   <th class='center aligned' style='background-color:#2f50c1;color:#d9e6fd;'>Det</th>
   <?php
    if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
    { echo "<th class='center aligned' style='background-color:#2f50c1;color:#d9e6fd;'>May</th>"; }
    if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
    { echo "<th class='center aligned' style='background-color:#2f50c1;color:#d9e6fd;'>GMa</th>"; }
   ?>
   <th class='center aligned' style='background-color:#2f50c1;color:#d9e6fd;'>Und</th>
   <th class=center aligned' style='background-color:#2f50c1;color:#d9e6fd;'>Emp</th>
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
          <td class='tdBorder' style='width:400px;'>
           <a href='goto-page.php?id=$id_producto' target='data2'>$nomProducto
           <br>$codigo_barra</a>
          </td>
          <td class='tdBorder center aligned'>
           <a href='goto-page.php?id=$id_producto' target='data2'>$precio1_producto</a>
          </td>";
          if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
          { echo "<td class='tdBorder center aligned'>$precio2_producto</td>"; }
          if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
          { echo "<td class='tdBorder center aligned'>$precio3_producto</td>"; }
          echo "<td class='tdBorder center aligned'>$nom_unidad</td>";
          echo "<td class='tdBorder center aligned'>$empaque</td>";
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
