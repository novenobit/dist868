<?php
// ******************************************************* 2023 ***
// include_once("./usuario-areas.php");
// ****************************************************************
if(!isset($mAreaAdmin))
{ $mAreaAdmin="N"; }
if(!isset($mAreaProductos))
{ $mAreaProductos="N"; }
if(!isset($mAreaCuentas))
{ $mAreaCuentas="N"; }
if(!isset($mAreaUsuario))
{ $mAreaUsuario="N"; }
if(!isset($mAreaClientes))
{ $mAreaClientes="N"; }
if(!isset($mCrearProductos))
{ $mCrearProductos="N"; }
if(!isset($mCambiarDatos))
{ $mCambiarDatos="N"; }
if(!isset($mCrearCuenta))
{ $mCrearCuenta="N"; }
if(!isset($mDescuento))
{ $mDescuento="N"; }
if(!isset($mLimpiarCuenta))
{ $mLimpiarCuenta="N"; }
if(!isset($mFacturar))
{ $mFacturar="N"; }
if(!isset($mAnularItems))
{ $mAnularItems="N"; }
if(!isset($mVerPrecioMayor))
{ $mVerPrecioMayor="N"; }
if(!isset($mVerPrecioEspecial))
{ $mVerPrecioEspecial="N"; }
if(!isset($mVerVentas))
{ $mVerVentas="N"; }
if(!isset($mCambiaFotos))
{ $mCambiaFotos="N"; }
if(!isset($mCambiarPrecios))
{ $mCambiarPrecios="N"; }
//------------------------------------------------
if(isset($mAreaAdmin) and $mAreaAdmin=="on" or $mAreaAdmin=="S")
{ $mAreaAdmin="S"; }
if(isset($mAreaProductos) and $mAreaProductos=="on" or $mAreaProductos=="S")
{ $mAreaProductos="S"; }
if(isset($mAreaCuentas) and $mAreaCuentas=="on" or $mAreaCuentas=="S")
{ $mAreaCuentas="S"; }
if(isset($mAreaUsuario) and $mAreaUsuario=="on" or $mAreaUsuario=="S")
{ $mAreaUsuario="S"; }
if(isset($mAreaClientes) and $mAreaClientes=="on" or $mAreaClientes=="S")
{ $mAreaClientes="S"; }
if(isset($mCrearProductos) and $mCrearProductos=="on" or $mCrearProductos=="S")
{ $mCrearProductos="S"; }
if(isset($mCambiarDatos) and $mCambiarDatos=="on" or $mCambiarDatos=="S")
{ $mCambiarDatos="S"; }
if(isset($mCrearCuenta) and $mCrearCuenta=="on" or $mCrearCuenta=="S")
{ $mCrearCuenta="S"; }
if(isset($mDescuento) and $mDescuento=="on" or $mDescuento=="S")
{ $mDescuento="S"; }
if(isset($mLimpiarCuenta) and $mLimpiarCuenta=="on" or $mLimpiarCuenta=="S")
{ $mLimpiarCuenta="S"; }
if(isset($mFacturar) and $mFacturar=="on" or $mFacturar=="S")
{ $mFacturar="S"; }
if(isset($mAnularItems) and $mAnularItems=="on" or $mAnularItems=="S")
{ $mAnularItems="S"; }
if(isset($mVerPrecioMayor) and $mVerPrecioMayor=="on" or $mVerPrecioMayor=="S")
{ $mVerPrecioMayor="S"; }
if(isset($mVerPrecioEspecial) and $mVerPrecioEspecial=="on" or $mVerPrecioEspecial=="S")
{ $mVerPrecioEspecial="S"; }
if(isset($mVerVentas) and $mVerVentas=="on" or $mVerVentas=="S")
{ $mVerVentas="S"; }
if(isset($mCambiaFotos) and $mCambiaFotos=="on" or $mCambiaFotos=="S")
{ $mCambiaFotos="S"; }
if(isset($mCambiarPrecios) and $mCambiarPrecios=="on" or $mCambiarPrecios=="S")
{ $mCambiarPrecios="S"; }

//------------------------------------------------
// buscar datos

$num_rows=0;
if(isset($Mcid_usuario) and $Mcid_usuario<>"")
{ $sql4=mysqli_query($conex1,"select id,usuario from areassistema where cid_usuario='$Mcid_usuario'");
  $MuserData=mysqli_fetch_array($sql4);
}
if(isset($Musuario) and $Musuario<>"")
{ $sql4=mysqli_query($conex1,"select id from areassistema where usuario='$Musuario'"); }
if(isset($sql4))
{ $num_rows=mysqli_num_rows($sql4); }

if(!isset($Mcid_usuario) or $Mcid_usuario=="")
{
 $error="Error en los datos del Usuario";
 error();
 exit();
}
if(isset($MuserData))
{
  $Musuario=$MuserData['usuario'];
}

//------------------------------------------------
if($num_rows==0)
{
    $query3="insert into areassistema(usuario, cid_usuario, AreaAdmin, AreaProductos, AreaCuentas, AreaUsuario, AreaClientes, CrearProductos, CambiarDatos, CrearCuenta, Descuento, LimpiarCuenta, Facturar, AnularItems, VerPrecioMayor, VerPrecioEspecial, VerVentas,CambiaFotos, CambiarPrecios)
    values('$Musuario', '$Mcid_usuario', '$mAreaAdmin', '$mAreaProductos', '$mAreaCuentas', '$mAreaUsuario', '$mAreaClientes', '$mCrearProductos', '$mCambiarDatos', '$mCrearCuenta', '$mDescuento', '$mLimpiarCuenta', '$mFacturar', '$mAnularItems', '$mVerPrecioMayor', '$mVerPrecioEspecial', '$mVerVentas','$mCambiaFotos', '$mCambiarPrecios')";
echo "$query3";
    $result3=mysqli_query($conex1,$query3);
}
//------------------------------------------------
if($num_rows==1)
{
   //  echo "$mcid_usuario<br>1 $mAreaAdmin<br>2 $mAreaRestaurante<br>3 $mEditData<br>4 $mCambiarCubiertos<br>5 $mDescuento<br> $mCambiarMesa<br> $mCambiarMesonero<br> $mNotadeConsumo<br> $mDividirCuenta<br> $mLimpiarMesa<br> $mCrearItemsEspecial<br> $mCrearBebidaEspecial<br> $mLimpiarCesta<br> $mBorraMesaTemporal<br> $mTransferirCuenta<br> $mFacturar<br> $mAnularItems<br> $mCrearMesaNueva<br> $mSalirdelSistema<br> $mVentasTrackPrinter<br> $mVentasTrackPantalla<br> $mListadoPreciosPrinter<br> $mTablaVentasPantalla<br> $mReporteXPrinterFiscal<br> $mReporteZPrinterFiscal<br> $mReiniciarPrinterFiscal<br> $mAbrirCajaRegistradora<br> $mVentasClientesPrinter<br> $mVentasDiaPrinter<br> $mVentasTrackDiaPrinter";
   //  usuario='$Musuario',
   //  cid_usuario='$Mcid_usuario'
   $query3="update areassistema set
   AreaAdmin='$mAreaAdmin',
   AreaProductos='$mAreaProductos',
   AreaCuentas='$mAreaCuentas',
   AreaUsuario='$mAreaUsuario',
   AreaClientes='$mAreaClientes',
   CrearProductos='$mCrearProductos',
   CambiarDatos='$mCambiarDatos',
   CrearCuenta='$mCrearCuenta',
   Descuento='$mDescuento',
   LimpiarCuenta='$mLimpiarCuenta',
   Facturar='$mFacturar',
   AnularItems='$mAnularItems',
   VerPrecioMayor='$mVerPrecioMayor',
   VerPrecioEspecial='$mVerPrecioEspecial',
   VerVentas='$mVerVentas',
   CambiaFotos='$mCambiaFotos',
   CambiarPrecios='$mCambiarPrecios'
   where cid_usuario='$Mcid_usuario'";
   $result3=mysqli_query($conex1,$query3);
   // change empleado to un active
}
?>
