<?php
if(isset($_GET['title']))
{ $title="$_GET[title]"; }
$num_rows=0;
include("$dirRoot"."bots/bot-cliente.php");
if(isset($clienteData))
{
  // $nextcli=$id_cliente+1;
  // $befcli=$id_cliente-1;
  // $idantes=$id_cliente-1;
  // $idsiguiente=$id_cliente+1;
  // if($idantes==0 or $idsiguiente==0)
  // {
  //   $idantes=$num_rows;
  //   $idsiguiente=$num_rows;
  // }
?>
 <h2 class="ui header">
  <img src="../imagenes/people/patrick.png" class="ui circular image">
  <?php echo "{$clienteData['nom_cliente']}"; ?>
 </h2>
 <div class="ui floating message">
  <div class="ui breadcrumb">
    <?php
    if(!isset($op))
    {  $op=""; }
    echo "<a class='section' data-inverted='' data-tooltip='Ver los Datos de {$clienteData['nom_cliente']}' data-position='top left' href='cliente-ver3.php?op=ver&id=$id_cliente&id_cliente=$id_cliente'>Ver</a>
    <i class='right angle icon divider'></i>
    <a class='section' data-inverted='' data-tooltip='Cambia los Datos de {$clienteData['nom_cliente']}' data-position='top left' href='cliente-edit1.php?op=edt&id=$id_cliente&id_cliente=$id_cliente'>Edita</a>
    <i class='right angle icon divider'></i>
    <a class='section' data-inverted='' data-tooltip='Borra este Cliente de la Tabla' data-position='top left' href='cliente-del1.php?op=del&id=$id_cliente&id_cliente=$id_cliente'>Borrar</a>
    <i class='right angle icon divider'></i>
    <a class='section' data-inverted='' data-tooltip='Ver las Compras de {$clienteData['nom_cliente']}' data-position='top left' href='cliente-ver-ventas.php?op=ven&id=$id_cliente&id_cliente=$id_cliente'>Ventas</a>
    <i class='right angle icon divider'></i>
    <a class='section' data-inverted='' data-tooltip='Grafico de Compras' data-position='top left' href='clientes-graph.php?op=gra&id=$id_cliente&id_cliente=$id_cliente'>Graphs</a>
    <i class='right angle icon divider'></i>
    <a class='section' data-inverted='' data-tooltip='Buscar otro Cliente' data-position='top left' href='clientes-list1-2.php'>Buscar</a>
    <i class='right angle icon divider'></i>
    <a data-inverted='' data-tooltip='Imprimir los Datos de {$clienteData['nom_cliente']}' data-position='top left' href=\"javascript:popup_center('../loadpage/load-page-printer.php?op=cl&id=$id_cliente&id_cliente=$id_cliente&exefile=clientes-ver-printer','800','500'); \">Print</a>";
    ?>
  </div>
 </div>
<?php
}
else
{
?>
 <h1>CLIENTE ELIMINADO</h1>
<?php
}
?>
