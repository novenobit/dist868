<?php
// include_once("../bots/activeUser.php");

if(isset($usuario) and $usuario<>"")
{
 if(!isset($areasSistema))
 {
  $sqlAS=mysqli_query($conex1,"select * from areassistema where usuario='$usuario'");
  $num_rows=0;
  $num_rows=mysqli_num_rows($sqlAS);
  if($num_rows>0)
  {
     $areasSistema=mysqli_fetch_array($sqlAS);
     mysqli_free_result($sqlAS);
     //return $areasSistema;
  }
 }
 if(isset($areasSistema))
 {
  $activeUserAreaAdmin=$areasSistema['AreaAdmin'];
  $activeUserAreaProductos=$areasSistema['AreaProductos'];
  $activeUserAreaCuentas=$areasSistema['AreaCuentas'];
  $activeUserAreaUsuario=$areasSistema['AreaUsuario'];
  $activeUserAreaClientes=$areasSistema['AreaClientes'];
  $activeUserCrearProductos=$areasSistema['CrearProductos'];
  $activeUserCambiarDatos=$areasSistema['CambiarDatos'];
  $activeUserCrearCuenta=$areasSistema['CrearCuenta'];
  $activeUserDescuento=$areasSistema['Descuento'];
  $activeUserLimpiarCuenta=$areasSistema['LimpiarCuenta'];
  $activeUserFacturar=$areasSistema['Facturar'];
  $activeUserAnularItems=$areasSistema['AnularItems'];
  $activeUserVerPrecioMayor=$areasSistema['VerPrecioMayor'];
  $activeUserVerPrecioEspecial=$areasSistema['VerPrecioEspecial'];
  $activeUserVerVentas=$areasSistema['VerVentas'];
  $activeUserCambiaFotos=$areasSistema['CambiaFotos'];
  $activeUserCambiarPrecios=$areasSistema['CambiarPrecios'];
 }
}
?>

