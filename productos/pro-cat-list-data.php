<?php
if(!isset($nomBuscar))
{ $nomBuscar="";}
?>
<table class="ui unstackable celled long scrolling table">
 <tr>
  <thead>
   <th class='center aligned' style="background-color:#5b4ccc;color:#ffffff;">Imagen</th>
   <th class='center aligned'  style="background-color:#5b4ccc;color:#ffffff;">C&oacute;digo</th>
   <th  style="background-color:#5b4ccc;color:#ffffff;">Nom Categor&iacute;a</th>
   <th class='center aligned' style="background-color:#5b4ccc;color:#ffffff;">#SubCat</th>
   <th class='center aligned' style="background-color:#5b4ccc;color:#ffffff;">#Prod</th>
   <th class='center aligned' style="background-color:#5b4ccc;color:#ffffff;">Edita</th>

  </thead>
 </tr>
 <tbody>
 <?php
  $num=0;
  if($op2=="nom" and $nomBuscar<>"")
  {
   if(!isset($nomBuscar) or $nomBuscar=="")
   { $nomBuscar="A"; }
   $sql=mysqli_query($conex1,"select * from categoria where nom_categoria like '$nomBuscar%' order by nom_categoria");
  }
  else
  {
   $sql=mysqli_query($conex1,"select * from categoria order by nom_categoria");
  }
  while($catData=mysqli_fetch_array($sql))
  {
   $numPro=0;
   $numSubCat=0;
   $codCat=$catData['cod_categoria'];
   $foto_categoria=$catData['foto_categoria'];
   $query2="select id_producto from productos where cod_categoria='{$catData['cod_categoria']}' and activo='S'";
   $sql2=mysqli_query($conex1,$query2);
   $numPro=mysqli_num_rows($sql2);
   $query3="select id_subcategoria from subcategoria where cod_categoria='{$catData['cod_categoria']}' ";
   $sql3=mysqli_query($conex1,$query3);
   $numSubCat=mysqli_num_rows($sql3);
   if($foto_categoria=="")
   {
    $foto_categoria="sinfoto.png";
   }

   echo "<tr>
    <td class='center aligned'>
      <a href='productos.php?proDataFoto=S&op2=cat&codCat=$codCat'><img class='ui image' src='../imagenes/menu/$foto_categoria' style='width:100px;'></a>
    </td>
    <td class='center aligned'>
      {$catData['cod_categoria']}
    </td>
    <td>
      {$catData['nom_categoria']}
    </td>
    <td class='center aligned'>
      <a class='ui basic button' href='pro-subcat.php?proDataFoto=S&op2=cat&codCat=$codCat'>$numSubCat</a>
    </td>
    <td class='center aligned'>
      <a class='ui basic button' href='productos.php?proDataFoto=S&op2=cat&codCat=$codCat'>$numPro</a>
    </td>
    <td class='center aligned'>";
?>
     <center style="padding:0px;">
      <button data-modal="modal<?php echo $num; ?>" id="call-modal-<?php echo $num; ?>" class="ui pink button">Edt</button>
     </center>
     <div class="ui modal" id="modal<?php echo $num; ?>" style="background-color:#212121;height:500px;">
      <div class="header">Cat: <?php echo $catData['nom_categoria']; ?></div>
      <div class="scrolling content"  style="background-color:#ededed;">
        <iframe src="<?php echo "pro-cat-edit1.php?id={$catData['id_categoria']}&modalId=$num"; ?>" height='520px' width='100%' name='data2' frameborder='0' scrolling='auto' allowtransparency='true'></iframe>
      </div>
      <div class="actions">

            <a class="ui animated button" tabindex="0" href='#'>
            <div class="visible content">Retornar</div>
            <div class="hidden content">
              <i class="left arrow icon"></i>
            </div>
            </a>
        <div class="ui blue deny button">
            Cerrar/Close
        </div>
      </div>
     </div>
<?php
   echo "</tr>";
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
<div class='spaceSection font-white'>
 Num.Categoria: <?php echo $num; ?>
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
