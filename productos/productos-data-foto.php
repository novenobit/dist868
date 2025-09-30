<table class="ui padded unstackable celled long scrolling table">
 <thead>
  <tr>
    <th class='center aligned' style='background-color:#2f50c1;color:#d9e6fd;width:200px'>Foto</th>
    <th  style='background-color:#2f50c1;color:#d9e6fd;'><?php echo $titlePage; ?></th>
  </tr>
 </thead>
 <tbody>
 <?php
  $num=0;
  if(!isset($sqldata) or empty($sqldata))
  {
    $error="No hay Datos, ningun producto o la fecha no fue seleccionado";
    echo "</table>";
    $boxColorH="red";
    $boxTitle="No hay Datos";
    $boxData="<p>No Hay Datos o Ningun producto fue seleccionado .....</p>";
    $boxColor="white";
    $boxFoot="";
    $boxColorF="";
    include("$dirRoot"."data/boxData.php");
    error();
    exit();
  }
  else
  {
    FlushData();
    $sql=mysqli_query($conex1,"$sqldata");
    while($proData=mysqli_fetch_array($sql))
    {
      $findCategoria="S";
      include("$dirRoot"."datafiles/proData.php");
      if($precio1_producto=="0")
      { $precio1_producto=""; }
      if($precio2_producto=="0")
      { $precio2_producto=""; }
      if($precio3_producto=="0")
      { $precio3_producto=""; }
      $fontColor="font-black";

      $bgcolor="white";
      if($activo=="N")
      { $bgcolor="yellow"; }
      if($estado<>1)
      { $bgcolor="orange"; }

      echo "<tr>";
      if($proData['foto_producto']<>"")
      { echo "<td class='center aligned' style='width:200px;background-color:#ffffff;'>"; }
      else
      { echo "<td class='center aligned' style='width:200px'>"; }

        if($CambiarDatos=="S")
        {  echo "<a href='goto-page.php?id=$id_producto' target='data2'>"; }
        if($proData['foto_producto']<>"")
        {
          echo "<img class='ui small centered image' src='$dirRoot"."imagenes/productos/{$proData['foto_producto']}' style='width:90px'>";
        }
        else
        {
          echo "<img class='ui centered circular image' src='$dirRoot"."imagenes/productos/sinfoto2.png' style='height:90px'>";
        }
        if($CambiarDatos=="S")
        {  echo "</a>"; }
      echo "</td><td style='background-color:$bgcolor;'>";
      if($CambiarDatos=="S")
      {
        echo "<a href='goto-page.php?id=$id_producto' target='data2'>";
      }
      echo "<span class='font-16 font-black'>{$proData['nom_producto']}</span>";
      if($CambiarDatos=="S")
      { echo "</a>"; }

      if(isset($codigo_barra) and $codigo_barra<>"")
      { echo "<br>Codigo Barra: $codigo_barra"; }

      if(isset($nom_categoria) and $nom_categoria<>"")
      { echo " &#124; Categoria: $nom_categoria"; }

      if(isset($nom_subcategoria) and $nom_subcategoria<>"")
      { echo " &#124; Sub-Categoria: $nom_subcategoria"; }

      if($precio1_producto>0)
      { echo "<br>Precio Detal: $precio1_producto"; }

      if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
      {
        if($precio2_producto>0 and $precio2_producto<>"")
        { echo " &#124; Precio Mayorista: $precio2_producto"; }
      }
      if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
      {
        if($precio3_producto>0 and $precio3_producto<>"")
        { echo " &#124; Precio Especial: $precio3_producto"; }

      }
      if(isset($proData['nom_unidad']) and $proData['nom_unidad']<>"")
      { echo "<br>Unidad: {$proData['nom_unidad']}"; }
      if(isset($proData['empaque']) and $proData['empaque']<>"")
      { echo " &#124; Empaque: {$proData['empaque']}"; }

      if(isset($proData['stock_actual']) and $proData['stock_actual']>0)
      { echo " &#124; Stock: {$proData['stock_actual']}"; }

      if($datos_producto<>"")
      { echo "<br>Nota: $datos_producto"; }

      if($CambiarDatos=="S")
      {
      // echo "<div class='ui grid'>
      //  <div class='sixteen wide column'>
      //    <a class='small red ui button' href='producto-del1.php?op=$op&id={$proData['id_producto']}' target='data2'><i class='trash alternate outline icon'></i></a>
      //    <a class='small blue ui button' href='producto-edit1.php?op=$op&id={$proData['id_producto']}' target='data2'><i class='edit icon'></i></a>
      //  </div>
      // </div>";

         //    <a class='small ui button'  href='productos-cc1.php?op=$op&id={$proData['id_producto']}'>
         //    <img src='../imagenes/graphs/escribir.gif'></a>
         //    <a class='small ui button'  href='productos-salida1.php?op=$op&id={$proData['id_producto']}'>
         //    <img src='../imagenes/graphs/refresh.gif'  alt='Ver {$proData['nom_producto']}'></a>

      }
      else
      {
        // echo "<td >
        // <img src='$dirRoot"."imagenes/graphs/borrar.gif' alt='Borrar {$proData['nom_producto']}'></td>
        // <td >
        // <img src='$dirRoot"."imagenes/graphs/edita.gif' alt='Edita {$proData['nom_producto']}'></td>
        //  <td ><a href='productos-cc1.php?op=$op&id={$proData['id_producto']}'>
        // <img src='$dirRoot"."imagenes/graphs/escribir.gif'></a></td>
        // <td ><img src='$dirRoot"."imagenes/graphs/refresh.gif'  alt='Ver {$proData['nom_producto']}'></td>";
      }

      if($estado>1)
      { echo "<br><span class='font-16 font-yellow'>No Disponible</span>"; }

      echo "</td></tr>";
      $num++;
      FlushData();
    }
    if($num==0)
    {
      echo "<tr><td colspan=2>";
      $boxColorH="cardColor";
      $boxTitle="Nada Aqu&iacute;";
      $boxData="<p>No Hay Datos Para Esta Fecha .....</p>";
      $boxColor="white";
      $boxFoot="";
      $boxColorF="";
      include("$dirRoot"."data/boxData.php");
      echo "</td></tr>";
    }
  }
 ?>
 </tbody>
</table>
<br>Num.Productos: <?php echo $num; ?>
