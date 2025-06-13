<?php
if(isset($_GET['title']))
{ $title="$_GET[title]"; }
$num_rows=0;
include("$dirRoot"."bots/bot-usuario.php");
if(isset($usuarioData))
{
 $nextcli=$iduser+1;
 $befcli=$iduser-1;
 $idantes=$iduser-1;
 $idsiguiente=$iduser+1;
 if($idantes==0 or $idsiguiente==0)
 {
   $idantes=$num_rows;
   $idsiguiente=$num_rows;
 }
?>

 <h2 class="ui header">
  <img src="../imagenes/people/patrick.png" class="ui circular image">
  <?php echo "{$usuarioData['nombre']}"; ?>
 </h2>

 <div class="ui breadcrumb">

  <?php
   if(!isset($op))
   {  $op=""; }
   echo "<a class='section' data-inverted='' data-tooltip='Ver los Datos de {$usuarioData['nombre']}' data-position='top left' href='usuarios-ver3.php?op=ver&id=$iduser&iduser=$iduser'>Ver</a>
     <i class='right angle icon divider'></i>
   <a class='section' data-inverted='' data-tooltip='Cambia los Datos de {$usuarioData['nombre']}' data-position='top left' href='usuarios-edit1.php?op=edt&id=$iduser&iduser=$iduser'>Edita</a>
   <i class='right angle icon divider'></i>
   <a class='section' data-inverted='' data-tooltip='Borra este usuario de la Tabla' data-position='top left' href='usuarios-del1.php?op=del&id=$iduser&iduser=$iduser'>Borrar</a>
   <i class='right angle icon divider'></i>
   <a class='section' data-inverted='' data-tooltip='Ver las Compras de {$usuarioData['nombre']}' data-position='top left' href='usuarios-ver-ventas.php?op=ven&id=$iduser&iduser=$iduser'>Ventas</a>
   <i class='right angle icon divider'></i>
   <a class='section' data-inverted='' data-tooltip='Grafico de Compras' data-position='top left' href='usuarios-graph.php?op=gra&id=$iduser&iduser=$iduser'>Graphs</a>
   <i class='right angle icon divider'></i>
   <a class='section' data-inverted='' data-tooltip='Buscar otro usuario' data-position='top left' href='usuarios-list1-2.php'>Buscar</a>
   <i class='right angle icon divider'></i>
   <a data-inverted='' data-tooltip='Imprimir los Datos de {$usuarioData['nombre']}' data-position='top left' href=\"javascript:popup_center('../loadpage/load-page-printer.php?op=cl&id=$iduser&iduser=$iduser&exefile=usuarios-ver-printer','800','500'); \">Print</a>";
  ?>
 </div>
<?php
}
else
{
?>
 <h1>USUARIOS ELIMINADO</h1>
<?php
}
?>
