<?php
if(!isset($sqldata) or empty($sqldata))
{
 $error="No hay Datos, ningun producto o la fecha no fue seleccionado";
 error();
 exit();
}
?>
<table class="ui selectable celled very long scrolling table" style='width:100%'>
 <thead>
  <tr>
   <th class='blue center aligned' style='width:100px;'>Img</th>
   <th class='blue' style='width:400px;'>Producto</th>
   <th class='blue center aligned'>Codigo</th>
   <th class='blue center aligned'>Und</th>
   <th class='blue center aligned'>Emp</th>
   <th class='blue center aligned'>Detal</th>
   <th class='blue center aligned'>Mayor</th>
   <th class='blue center aligned'>OP</th>
  </tr>
 </thead>
 <tbody>
  <?php
   $num=0;
   $ves=0;
   FlushData();
   $sqlA=mysqli_query($conex1,"$sqldata");
   while($proData=mysqli_fetch_array($sqlA))
   {
    if(isset($proData))
    {
      $id_producto=$proData['id_producto'];
      $nomProducto=$proData['nom_producto'];
      //$codSubCat=$proData['cod_subcategoria'];
      $codigo_barra=$proData['codigo_barra'];
      $precio1_producto=$proData['precio1_producto'];
      $precio2_producto=$proData['precio2_producto'];
      $nom_unidad=$proData['nom_unidad'];
      $empaque=$proData['empaque'];
      //$precio1_producto="". number_format($precio1_producto,2,',', '.') . "";
      if($precio1_producto=="0")
      { $precio1_producto=""; }
      $fotoProducto=$proData['foto_producto'];
      if($fotoProducto=="")
      { $fotoProducto="sinfoto.png"; }
      if(file_exists("./imagenes/productos/$fotoProducto")) {
      //echo "The file exists";
      } else {
        $fotoProducto="sinfoto.png";
      }

      // <a href='#' onclick='loadPage(\"$dirRoot"."productos/producto-ver1.php?op=$op&id={$proData['id_producto']}\"); return false;'>
      echo "<tr>";
// style='width:100px;background-color:#ffffff;border: 1px solid #000;'
      if($fotoProducto<>"sinfoto.png")
      { echo "<td class='tdBorder center aligned' style='width:100px;'>"; }
      else
      { echo "<td class='tdBorder center aligned' style='width:100px;'>"; }
        echo "<a href='vercat3.php?idpro=$id_producto' target='_blank'>";
        if($fotoProducto<>"sinfoto.png")
        {
          echo "<img class='ui tiny centered circular image' src='$dirRoot"."imagenes/productos/$fotoProducto' alt='$nomProducto'>";
        }
        else
        {
          echo "<img class='ui tiny centered circular image' src='$dirRoot"."imagenes/productos/sinfoto2.png' alt='$nomProducto'>";
        }
        echo "</a></td>
        <td class='tdBorder' style='width:400px;'><a href='vercat3.php?idpro=$id_producto' target='_blank'>$nomProducto</a></td>
        <td class='tdBorder center aligned'>$codigo_barra</td>
        <td class='tdBorder center aligned'>$nom_unidad</td>
        <td class='tdBorder center aligned'>$empaque</td>
        <td class='tdBorder center aligned'>$precio1_producto</td>
        <td class='tdBorder center aligned'>$precio2_producto</td>
        <td class='tdBorder center aligned'>
        <a class='ui orange button' href='vercat3.php?idpro=$id_producto' target='_blank'>Ver</a>
        </td>";
      echo "</tr>";
      $ves++;
      $num++;
      if($ves==3)
      { $ves=1; }
    }
   }
   if($num==0)
   {
      echo "<tr>
        <td class='tdBorder center aligned' colspan='7' style='backgound-color:red;height:400px;'>";
          if($nomBuscar<>"")
          { echo "<h1>Para la Fecha no Tengo en Existencia: $nomBuscar</h1>"; }
          else
          { echo "<h1>Para la Fecha no Tengo mas Datos</h1>"; }
        echo "</td>";
      echo "</tr>";
   }
  ?>
 </tbody>
</table>
