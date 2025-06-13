<?php
// include_once("../bots/AreasSistemaEmp.php");
// Function areasSistema()
$num_rows=0;
if(isset($cid_usuario) and $cid_usuario<>"")
{
    echo "select * from areassistema where cid_usuario='$cid_usuario'";
    if(!isset($userAreasSistema))
    {
     $num_rows=0;
     $sqlAS=mysqli_query($conex1,"select * from areassistema where cid_usuario='$cid_usuario'");
     $num_rows=mysqli_num_rows($sqlAS);
     if($num_rows>0)
     {
        $userAreasSistema=mysqli_fetch_array($sqlAS);
        mysqli_free_result($sqlAS);
        //return $userAreasSistema;
     }
    }
}
if(isset($userAreasSistema))
{
  $mAreaAdmin=$userAreasSistema['AreaAdmin'];
  $mAreaProductos=$userAreasSistema['AreaProductos'];
  $mAreaCuentas=$userAreasSistema['AreaCuentas'];
  $mAreaUsuario=$userAreasSistema['AreaUsuario'];
  $mCrearProductos=$userAreasSistema['CrearProductos'];
  $mCambiarDatos=$userAreasSistema['CambiarDatos'];
  $mCrearCuenta=$userAreasSistema['CrearCuenta'];
  $mDescuento=$userAreasSistema['Descuento'];
  $mLimpiarCuenta=$userAreasSistema['LimpiarCuenta'];
  $mFacturar=$userAreasSistema['Facturar'];
  $mAnularItems=$userAreasSistema['AnularItems'];
  $mVerPrecioMayor=$userAreasSistema['VerPrecioMayor'];
  $mVerPrecioEspecial=$userAreasSistema['VerPrecioEspecial'];
  $mVerVentas=$userAreasSistema['VerVentas'];
  $mCambiaFotos=$userAreasSistema['CambiaFotos'];
  $mCambiarPrecios=$userAreasSistema['CambiarPrecios'];
}
else
{
  //echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."index.php>";
  // exit();
}
?>

