<?php
if(isset($_GET['title']))
{ $title="$_GET[title]"; }
$num_rows=0;
if(!isset($usuarioData))
{ include("$dirRoot"."bots/bot-usuarios.php"); }
if(isset($usuarioData))
{
 //$nextcli=$iduser+1;
 //$befcli=$iduser-1;
 //$idantes=$iduser-1;
 //$idsiguiente=$iduser+1;
 //if($idantes==0 or $idsiguiente==0)
// {
//   $idantes=$num_rows;
//   $idsiguiente=$num_rows;
// }
?>
 <div class="ui stackable  padded grid">
  <div class="sixteen wide column">
    <h2 class="ui header">
    <?php echo "{$usuarioData['nombre']} {$usuarioData['apellido']}"; ?>
    <div class="ui breadcrumb">
        <?php
         if(!isset($op))
         {  $op=""; }
         //echo "<a class='section' data-='' data-tooltip='Ver los Datos de {$usuarioData['nombre']}' data-position='top left' href='usuario-data.php?op=ver&id=$iduser&iduser=$iduser'>Ver</a>
         //<i class='right angle icon divider'></i>
         //<a class='section' data-='' data-tooltip='Cambia los Datos de {$usuarioData['nombre']}' data-position='top left' href='usuario-edit.php?op=edt&id=$iduser&iduser=$iduser'>Edita</a>
         //<i class='right angle icon divider'></i>
         //<a class='section' data-='' data-tooltip='Borra este usuario de la Tabla' data-position='top left' href='usuario-del1.php?op=del&id=$iduser&iduser=$iduser'>Borrar</a>
         //<i class='right angle icon divider'></i>
         //<a class='section' data-='' data-tooltip='Ver las Compras de {$usuarioData['nombre']}' data-position='top left' href='usuarios-ver-ventas.php?op=ven&id=$iduser&iduser=$iduser'>Ventas</a>
         //<i class='right angle icon divider'></i>
         //<a class='section' data-='' data-tooltip='Grafico de Compras' data-position='top left' href='usuarios-graph.php?op=gra&id=$iduser&iduser=$iduser'>Graphs</a>
         //<i class='right angle icon divider'></i>
         //<a class='section' data-='' data-tooltip='Buscar otro usuario' data-position='top left' href='usuarios-list1-2.php'>Buscar</a>
         //<i class='right angle icon divider'></i>
         //<a data-='' data-tooltip='Imprimir los Datos de {$usuarioData['nombre']}' data-position='top left' href=\"javascript:popup_center('../loadpage/load-page-printer.php?op=cl&id=$iduser&iduser=$iduser&exefile=usuarios-ver-printer','800','500'); \">Print</a>
         //<i class='right angle icon divider'></i>
         //<a href='usuario-ver.php?op=cl&iduser=$iduser'>Reload</a>";
        ?>
    </div>
  </div>
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
