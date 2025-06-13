<?php
if(!isset($titlePage))
{ $titlePage="A"; }

if($op2=="nom" and $nomBuscar<>"")
{
?>
   <div class="ui grid">
     <div class="ten wide font-white column">
       <h3>Sub-Categoria de <?php echo $nomBuscar; ?></h3>
     </div>
   </div>
<?php
}
else
{
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
<?php
}
?>



<table class="ui unstackable celled long scrolling inverted table">
 <tr>
  <thead>
   <th class='black center aligned'>Imagen</th>
   <th class='black'>Sub-Categor&iacute;a</th>
   <th class='black center aligned'>C&oacute;digo</th>
   <th class='black center aligned'>Cod-Categor&iacute;a</th>
   <th class='black center aligned'>Prod</th>
   <th class='black center aligned'>OP</th>
  </thead>
 </tr>
 <tbody>
 <?php
  $num=0;
  if($op2=="nom" and $nomBuscar<>"")
  {
   if(!isset($nomBuscar) or $nomBuscar=="")
   { $nomBuscar="A"; }
   $sql=mysqli_query($conex1,"select * from subcategoria where nom_subcategoria like '$nomBuscar%' order by nom_subcategoria");
  }
  else
  {
   if(isset($codCat) and $codCat<>"")
   { $sql=mysqli_query($conex1,"select * from subcategoria where cod_categoria='$codCat' order by nom_subcategoria"); }
   else
   { $sql=mysqli_query($conex1,"select * from subcategoria order by nom_subcategoria"); }
  }
  while($subCatData=mysqli_fetch_array($sql))
  {
   $num_filas=0;
   include("$dirRoot"."datafiles/subCatData.php");
   $query="select id_producto from productos where cod_subcategoria='$cod_subcategoria'";
   $sql2=mysqli_query($conex1,$query);
   $num_filas=mysqli_num_rows($sql2);
   if($num_filas>=1)
   { $link="productos-list.php?op2=subcat&codSubCat=$cod_subcategoria"; }
   else
   { $link="#"; }
   if(isset($cod_categoria) and $cod_categoria<>"")
   {
    $queryCat="select nom_categoria from categoria where cod_categoria='$cod_categoria'";
    $sqlCat=mysqli_query($conex1,$queryCat);
    if(isset($catData))
    {
     $catData=mysqli_fetch_array($sqlCat);
     $nom_categoria=$catData['nom_categoria'];
    }
    else
    { $nom_categoria=""; }
   }
   else
   { $nom_categoria=""; }
   echo "<tr>
    <td class='center aligned'>
      <img src='../imagenes/menu/$foto_subcategoria' style='width:100px;'>
    </td>
    <td>
      $nom_subcategoria
    </td>
    <td class='center aligned'>
      $cod_subcategoria
    </td>
    <td class='center aligned'>
     <a href='#' onclick='loadPage(\"$dirRoot"."productos/pro-cat-list.php?codCat=$cod_categoria\"); return false;'>
     $cod_categoria</a>
    </td>
    <td class='center aligned'>
      <a href='$dirRoot"."productos/productos.php?op2=subcat&codSubCat=$cod_subcategoria'>$num_filas</a>
    </td>
    <td class='center aligned'>
      <a class='ui orange button' href=\"javascript:popup_center('pro-subcat-edit1.php?id=$id_subcategoria&modalId=$num','800','600');\">Ver</a>
    </td></tr>";
   FlushData();
   $num++;
  }
 ?>
 </tbody>
</table>





<?php
if($num>0)
{
?>
<div class="ui two column  grid container">
  <div class="column font-white">
    Num.Sub-Categoria: <?php echo $num; ?>
  </div>
  <div class="column right aligned font-white"><i class="print icon"></i></div>
</div>
<?php
}
else
{
?>
<div class="ui massive red message" style="text-align: center;">
 No Hay Datos Disponible: <?php echo $nomBuscar; ?>
</div>
<?php
}
?>
