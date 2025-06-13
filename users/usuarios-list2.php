
<div class='ui grid'>
  <div class='ten wide column'><h2 class='font-blue'>Listado de usuarios</h2></div>
  <div class='six wide column'><a href='mesa-usuario-nuevo1.php?id_cuenta=$id_cuenta'>Nuevo Usuario</a></div>
</div>

<table class="ui celled table">
 <tr>
  <td class='center align'>CI/RIF</td>
  <td class='center align'>Usuario</td>
  <td class='center align'>Tel&eacute;fono</td>
 </tr>
<?php
$sql=mysqli_query($conex1,"select * from usuarios where  activo='S'");
while($usuarioData=mysqli_fetch_array($sql))
{
 echo "<tr>
  <td class='center align'>{$usuarioData['cid_usuario']}</td>
  <td>{$usuarioData['nombre']}</td>
  <td class='center align'>{$usuarioData['email']}<br>{$usuarioData['celular']}</td>
 </tr>";
}
?>
</table>
<?php
if(isset($sql))
{ mysqli_free_result($sql); }
?>

<br><a class='ui primary button' href='mesa-usuario-nuevo1.php?id_cuenta=$id_cuenta'>Nuevo Usuario</a>



