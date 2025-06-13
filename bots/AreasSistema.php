<?php
// Function areasSistema()
// include_once("../bots/AreasSistema.php");
// include_once("$dirRoot"."bots/AreasSistema.php");
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
}

if(isset($cid_usuario) and $cid_usuario<>"")
{
// echo "select * from areassistema where cid_usuario='$cid_usuario'";
 if(!isset($areasSistema))
 {
  $num_rows=0;
  $sqlAS=mysqli_query($conex1,"select * from areassistema where cid_usuario='$cid_usuario'");
  $num_rows=mysqli_num_rows($sqlAS);
  if($num_rows>0)
  {
     $areasSistema=mysqli_fetch_array($sqlAS);
     mysqli_free_result($sqlAS);
     //return $areasSistema;
  }
 }
}

if(isset($areasSistema))
{
  $AreaAdmin=$areasSistema['AreaAdmin'];
  $AreaProductos=$areasSistema['AreaProductos'];
  $AreaCuentas=$areasSistema['AreaCuentas'];
  $AreaUsuario=$areasSistema['AreaUsuario'];
  $AreaClientes=$areasSistema['AreaClientes'];
  $CrearProductos=$areasSistema['CrearProductos'];
  $CambiarDatos=$areasSistema['CambiarDatos'];
  $CrearCuenta=$areasSistema['CrearCuenta'];
  $Descuento=$areasSistema['Descuento'];
  $LimpiarCuenta=$areasSistema['LimpiarCuenta'];
  $Facturar=$areasSistema['Facturar'];
  $AnularItems=$areasSistema['AnularItems'];
  $VerPrecioMayor=$areasSistema['VerPrecioMayor'];
  $VerPrecioEspecial=$areasSistema['VerPrecioEspecial'];
  $VerVentas=$areasSistema['VerVentas'];
  $CambiaFotos=$areasSistema['CambiaFotos'];
  $CambiarPrecios=$areasSistema['CambiarPrecios'];
}
else
{
  //echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."index.php>";
  // exit();
}
?>

