<?php
// include_once("../bots/AreaSisUsuario.php");
// Function areasSistema()

if(isset($usuarioData))
{ $Mcid_usuario=$usuarioData['cid_usuario']; }

if(isset($Mcid_usuario) and $Mcid_usuario<>"")
{
 if(!isset($AreaSisUsuario))
 {
  $num_rows=0;
  $sqlAUS=mysqli_query($conex1,"select * from areassistema where cid_usuario='$Mcid_usuario'");
  $num_rows=mysqli_num_rows($sqlAUS);
  if($num_rows>0)
  {
     $AreaSisUsuario=mysqli_fetch_array($sqlAUS);
     mysqli_free_result($sqlAUS);
     //return $AreaSisUsuario;
  }
 }
}

if(isset($AreaSisUsuario))
{
  $usuarioAreaAdmin=$AreaSisUsuario['AreaAdmin'];
  $usuarioAreaProductos=$AreaSisUsuario['AreaProductos'];
  $usuarioAreaCuentas=$AreaSisUsuario['AreaCuentas'];
  $usuarioAreaUsuario=$AreaSisUsuario['AreaUsuario'];
  $usuarioAreaClientes=$AreaSisUsuario['AreaClientes'];
  $usuarioCrearProductos=$AreaSisUsuario['CrearProductos'];
  $usuarioCambiarDatos=$AreaSisUsuario['CambiarDatos'];
  $usuarioCrearCuenta=$AreaSisUsuario['CrearCuenta'];
  $usuarioDescuento=$AreaSisUsuario['Descuento'];
  $usuarioLimpiarCuenta=$AreaSisUsuario['LimpiarCuenta'];
  $usuarioFacturar=$AreaSisUsuario['Facturar'];
  $usuarioAnularItems=$AreaSisUsuario['AnularItems'];
  $usuarioVerPrecioMayor=$AreaSisUsuario['VerPrecioMayor'];
  $usuarioVerPrecioEspecial=$AreaSisUsuario['VerPrecioEspecial'];
  $usuarioVerVentas=$AreaSisUsuario['VerVentas'];
  $usuarioCambiaFotos=$AreaSisUsuario['CambiaFotos'];
  $usuarioCambiarPrecios=$AreaSisUsuario['CambiarPrecios'];
}
else
{ 
  $usuarioAreaAdmin="N";
  $usuarioAreaProductos="N";
  $usuarioAreaCuentas="N";
  $usuarioAreaUsuario="N";
  $usuarioAreaClientes="N";
  $usuarioCrearProductos="N";
  $usuarioCambiarDatos="N";
  $usuarioCrearCuenta="N";
  $usuarioDescuento="N";
  $usuarioLimpiarCuenta="N";
  $usuarioFacturar="N";
  $usuarioAnularItems="N";
  $usuarioVerPrecioMayor="N";
  $usuarioVerPrecioEspecial="N";
  $usuarioVerVentas="N";
  $usuarioCambiaFotos="N";
  $usuarioCambiarPrecios="N";
}
?>
