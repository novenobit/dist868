<h2>Categoria de Productos</h2>
<?php
    echo "<a class='ui primary button' href='pro-cat-list2.php?mobile=$mobile'><i class='large plus square outline icon'></i></a>
    <a class='ui button' href='pro-cat-list-data.php?mobile=$mobile'><i class='large spinner icon'></i></a>";
?>

<table class="ui unstackable celled long scrolling table">
 <tr>
  <thead>
   <th class='green center aligned'>Imagen</th>
   <th class='green center aligned'>C&oacute;digo</th>
   <th class='green'>Categor&iacute;a</th>
   <th class='green center aligned'>Prod</th>
   <th class='green center aligned'>B</th>
   <th class='green center aligned'>E</th>
  </thead>
 </tr>
 <tbody>
 <?php
  $num=0;
  $sql=mysqli_query($conex1,"select * from categoria order by nom_categoria");
  while($categoria=mysqli_fetch_array($sql))
  {
   $num_filas=0;
   $foto_categoria=$categoria['foto_categoria'];
   $query="select id_producto from productos where cod_categoria='{$categoria['cod_categoria']}'";
   $sql2=mysqli_query($conex1,$query);
   $num_filas=mysqli_num_rows($sql2);
   echo "<tr>
    <td class='center aligned'>
     <a href='subcategoria-list1.php?op=find&id={$categoria['cod_categoria']}'>
     <img class='ui image' src='../imagenes/menu/$foto_categoria'></a>
    </td>
    <td class='center aligned'>
     <a href='subcategoria-list1.php?op=find&id={$categoria['cod_categoria']}'>
     {$categoria['cod_categoria']}</a>
    </td>
    <td>
     <a href='productos-list-todos.php?op2=cat&cod_categoria={$categoria['cod_categoria']}' >{$categoria['nom_categoria']}</a>
    </td>
    <td class='center aligned'>$num_filas";
    //  $foto="{$categoria['foto_categoria']}";
     //if(!empty($categoria['foto_categoria']))
     // echo "<img src='$dirRoot"."imagenes/$fotosDir/{$categoria['foto_categoria']}'>";
     //else
     // echo "---";
    //  echo "<img src='$dirRoot"."imagenes/$fotosDir/sinfoto.png'>";
    echo "</td>
    <td class='center aligned'>";
    //if($num_filas==0)
    echo "<a href='pro-cat-list2.php?op2=del&id={$categoria['id_categoria']}'>";
    echo "<i class='eraser icon'></i></a></td>
    <td class='center aligned'><a href='pro-cat-edit1.php?id={$categoria['id_categoria']}'>
   <i class='edit icon'></i></a></td></tr>";
    //<td class='center aligned'>
    // <a href='listado1.php?id={$categoria['id_categoria']}&cod={$categoria['cod_categoria']}'>
    // <img src='$dirRoot"."imagenes/graphs/icon_related.gif'>
    // </a>
    // </td>
    // <td class='center aligned'><a href='listado1.php?id={$categoria['id_categoria']}&cod={$categoria['cod_categoria']}'><img src='$dirRoot"."imagenes/graphs/openfolder.gif'></a></td>
    // </tr>";
   FlushData();
   $num++;
  }
  ?>
  </tbody>
 </table>


