<?php
if(!isset($titlePage))
{$titlePage="A"; }
?>

<div class="ui grid">
  <div class="ten wide column">
    <h3>Sub-Categoria de <?php echo $titlePage; ?></h3>
  </div>
  <div class="six wide right aligned column">
   <a class="ui animated button" tabindex="0" href='#'>
    <div class="visible content">Retornar</div>
    <div class="hidden content">
      <i class="left arrow icon"></i>
    </div>
   </a>
  </div>
</div>

<table class="ui unstackable celled long scrolling table">
 <tr>
  <thead>
   <th class='center aligned' style="background-color:#fc411e;color:#ffffff;">Imagen</th>
   <th style="background-color:#fc411e;color:#ffffff;">Sub-Categor&iacute;a</th>
   <th class='center aligned' style="background-color:#fc411e;color:#ffffff;">C&oacute;digo</th>
   <th class='center aligned' style="background-color:#fc411e;color:#ffffff;">Cod-Categor&iacute;a</th>
   <th class='center aligned' style="background-color:#fc411e;color:#ffffff;">Prod</th>
   <th class='center aligned' style="background-color:#fc411e;color:#ffffff;">B</th>
   <th class='center aligned' style="background-color:#fc411e;color:#ffffff;">E</th>
  </thead>
 </tr>
 <tbody>
 <?php
  $num=0;
  $sqlSF=mysqli_query($conex1,"select * from subcategoria where foto_subcategoria='' order by nom_subcategoria");
  while($subCatData=mysqli_fetch_array($sqlSF))
  {
   $num_filas=0;
   include("$dirRoot"."datafiles/subCatData.php");

   $query="select id_producto from productos where cod_subcategoria='$cod_subcategoria' and activo='S'";
   $sql2=mysqli_query($conex1,$query);
   $num_filas=mysqli_num_rows($sql2);
   if($num_filas>=1)
   { $link="productos-list.php?op2=subcat&codSubCat={$subCatData['cod_subcategoria']}"; }
   else
   { $link="#"; }
   $queryCat="select nom_categoria from categoria where cod_categoria='$cod_categoria'";
   $sqlCat=mysqli_query($conex1,$queryCat);
   $catData=mysqli_fetch_array($sqlCat);
   $nom_categoria=$catData['nom_categoria'];

   echo "<tr>
    <td class='center aligned'>
      <a href='$link'><img src='../imagenes/menu/$foto_subcategoria' style='width:100px;'></a>
    </td>
    <td>
      {$subCatData['nom_subcategoria']}
    </td>
    <td class='center aligned'>
      $cod_subcategoria
    </td>
    <td class='center aligned'>
     $nom_categoria<br>$cod_categoria
    </td>
    <td class='center aligned'>
     $num_filas
    </td>
    <td class='center aligned'>";
     if($num_filas==0)
     { echo "<a href='pro-subcat-del1.php?id=$id_subcategoria'><i class='eraser icon'></i></a>"; }
     else
     { echo "<i class='eraser icon'></i>"; }
    echo "</td>
    <td class='center aligned'>
     <a href='pro-subcat-edit1.php?id=$id_subcategoria'>
     <i class='edit icon'></i></a>
    </td></tr>";

   FlushData();
   $num++;
  }
 ?>
 </tbody>
</table>
<div class="ui two column  grid container">
  <div class="column">
    Num.Sub-Categoria: <?php echo $num; ?>
  </div>
  <div class="column right aligned"><i class="print icon"></i></div>
</div>


