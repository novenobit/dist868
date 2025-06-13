<table class="ui padded unstackable celled long scrolling table">
<thead>
 <tr>
  <th class='ui green' style='width:200px'>Foto</th>
  <th class='ui green'>Producto</th>
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
  $codigo_barra=$proData['codigo_barra'];
  $cod_categoria=$proData['cod_categoria'];
  $codCat=$proData['cod_categoria'];
  $cod_subcategoria=$proData['cod_subcategoria'];
  $codSubCat=$proData['cod_subcategoria'];
  $datos_producto=$proData['datos_producto'];

  $precio1_producto=$proData['precio1_producto'];
  $precio2_producto=$proData['precio2_producto'];
  $precio3_producto=$proData['precio3_producto'];
  if($precio1_producto=="0")
  { $precio1_producto=""; }
  if($precio2_producto=="0")
  { $precio2_producto=""; }
  if($precio3_producto=="0")
  { $precio3_producto=""; }
  $fontColor="font-black";
  if(isset($codCat) and $codCat<>"")
  { include("../bots/find-categoria.php"); }
  if(isset($codSubCat) and $codSubCat<>"")
  { include("../bots/find-subcategoria.php"); }

  echo "<tr>
    <td style='width:200px'>";
     if($CambiarDatos=="S")
     {  echo "<a href='producto-ver1.php?op=$op&id={$proData['id_producto']}&sistema=$sistema'>"; }
      if($proData['foto_producto']<>"")
      {
      echo "<img class='ui image ' src='$dirRoot"."imagenes/productos/{$proData['foto_producto']}' style='height:100px'>";
      }
      else
      {
      echo "<img class='ui image ' src='$dirRoot"."imagenes/productos/sinfoto.png' style='height:100px'>";
      }
     if($CambiarDatos=="S")
     {  echo "</a>"; }
    echo "</td><td>";
      if($CambiarDatos=="S")
      { echo "<a href='producto-ver1.php?op=$op&id={$proData['id_producto']}&sistema=$sistema'>{$proData['nom_producto']}"; }
      else
      { echo "{$proData['nom_producto']}"; }
      if($CambiarDatos=="S")
      { echo "</a>"; }
      if(isset($codigo_barra) and $codigo_barra<>"")
      { echo "<br>Codigo Barra: $codigo_barra"; }

      if(isset($nom_categoria) and $nom_categoria<>"")
      { echo "<br>Categoria: $nom_categoria"; }

      if(isset($nom_subcategoria) and $nom_subcategoria<>"")
      { echo "<br>Sub-Categoria: $nom_subcategoria"; }

      if($precio1_producto>0)
      { echo "<br>Precio Detal: $precio1_producto"; }

      if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
      {
        if($precio2_producto>0 and $precio2_producto<>"")
        { echo "<br>Precio Mayorista: $precio2_producto"; }
      }
      if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
      {
        if($precio3_producto>0 and $precio3_producto<>"")
        { echo "<br>Precio Especial: $precio3_producto"; }

      }
      if($proData['nom_unidad']<>"")
      { echo "<br>Unidad: {$proData['nom_unidad']}"; }

      if($datos_producto<>"")
      { echo "<br>$datos_producto"; }

      if($CambiarDatos=="S")
      {
        // echo "<td ><a href='producto-del1.php?op=$op&id={$proData['id_producto']}'>
        // <img src='$dirRoot"."imagenes/graphs/borrar.gif' alt='Borrar {$proData['nom_producto']}'></a></td>
        // <td ><a href='producto-edit1.php?op=$op&id={$proData['id_producto']}'>
        // <img src='$dirRoot"."imagenes/graphs/edita.gif' alt='Edita {$proData['nom_producto']}'></a></td>
        // <td ><a href='productos-cc1.php?op=$op&id={$proData['id_producto']}'>
        // <img src='$dirRoot"."imagenes/graphs/escribir.gif'></a></td>
        // <td ><a href='productos-salida1.php?op=$op&id={$proData['id_producto']}'>
        // <img src='$dirRoot"."imagenes/graphs/refresh.gif'  alt='Ver {$proData['nom_producto']}'></a></td>";
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
 ?>
</tbody></table>
 Num.Productos: <?php echo $num; ?>
<?php
}
?>

