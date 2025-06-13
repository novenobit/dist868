
<div class='w3-row w3-padding'>
 <div class='w3-col w3-padding s12 m6 l6'>
  <h2 class='w3-animate-top font-blue'>Listado de usuarios</h2>
 </div>
 <div class='w3-col w3-padding s12 m6 l6'>
   <a href='mesa-usuario-nuevo1.php?id_cuenta=$id_cuenta'>Nuevo Usuario</a>
 </div>
</div>

<table class='w3-table w3-bordered w3-border' style='width:100%'>
 <tr>
  <td class='w3-border w3-center tableHead'>CI/RIF</td>
  <td class='w3-border w3-center tableHead'>Usuario</td>
  <td class='w3-border w3-center tableHead'>Tel&eacute;fono</td>
 </tr>
<?php
$sql=mysqli_query($conex1,"select * from usuarios where  activo='S'");
while($usuarioData=mysqli_fetch_array($sql))
{
 echo "<tr>
  <td class='w3-border tableData w3-center'>{$usuarioData['cid_usuario']}</td>
  <td>{$usuarioData['nombre']}</td>
  <td class='w3-border tableData w3-center'>{$usuarioData['email']}<br>{$usuarioData['celular']}</td>
 </tr>";
}
?>
</table>
<?php
if(isset($sql))
{ mysqli_free_result($sql); }
?>

<br><a class='w3-button w3-round w3-blue' href='mesa-usuario-nuevo1.php?id_cuenta=$id_cuenta'>Nuevo Usuario</a>



