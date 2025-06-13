
<div class='ui grid'>
  <div class='eight wide column'>
  <h2>Listado de Clientes</h2>
 </div>
 <div class='eight wide column'>
   <a href='mesa-cliente-nuevo1.php?id_cuenta=$id_cuenta'>Nuevo Cliente</a>
 </div>
</div>

<table class='ui celled table'>
 <tr>
  <td class='center aligned'>CI/RIF</td>
  <td class='center aligned'>Cliente</td>
  <td class='center aligned'>Direcci&oacute;n</td>
  <td class='center aligned'>Tel&eacute;fono</td>
 </tr>
<?php
$sql=mysqli_query($conex1,"select * from clientes where  activo='S'");
while($clienteData=mysqli_fetch_array($sql))
{
 echo "<tr>
  <td class='center aligned'>{$clienteData['cid_cliente']}</td>
  <td>{$clienteData['nom_cliente']}</td>
  <td>{$clienteData['dir1_cliente']}<br>{$clienteData['dir2_cliente']} {$clienteData['ciudad_cliente']} {$clienteData['estado_cliente']}</td>
  <td class='center aligned'>{$clienteData['tel1_cliente']}<br>{$clienteData['tel2_cliente']}</td>
 </tr>";
}
?>
</table>
<?php
if(isset($sql))
{ mysqli_free_result($sql); }
?>

<br><a class='ui primary button' href='mesa-cliente-nuevo1.php?id_cuenta=$id_cuenta'>Nuevo Cliente</a>



