<?php
// include("../datafiles/insert-cuentas2.php");

//  $Tcantidad
//  $Tempaque
//  $Tprecio_producto
// Add New Data
if(!isset($nota_extra))
{ $nota_extra=""; }
if(!isset( $cid_usuario))
{ $cid_usuario=$usuario; }

// Empaque -------------------------------

if($empaque>1 and $Munidad=="S")
{
  $Mempaque=1;
}
if(!isset($Mempaque))
{ $Mempaque=1;}
if(isset($bultos) and $bultos=="S")
{ $Mempaque=$empaque; }
if(!isset($Mempaque))
{ $Mempaque=1; }
if(!isset($bultos))
{ $bultos=""; }
if(isset($Mempaque))
{ $empaque=$Mempaque; }
else
{ $empaque=1; }

// Precio --------------------------------
if(isset($Mprecio) and $Mprecio>0)
{
  $precio=$Mprecio;
}
else
{
  if(!isset($nivelprecio) or $nivelprecio=="")
  { $nivelprecio=1; }
  if($nivelprecio==1)
  {
    if(isset($precio1_producto) and $precio1_producto>0)
    { $precio=$precio1_producto; }
    else
    {
     if(isset($precio2_producto) and $precio2_producto>0)
     { $precio=$precio2_producto; }
    }
  }
  if($nivelprecio==2)
  {
     if(isset($precio2_producto) and $precio2_producto>0)
     { $precio=$precio2_producto; }
  }
  if($nivelprecio==3)
  {
     if(isset($precio3_producto) and $precio3_producto>0)
     { $precio=$precio3_producto; }
  }
  if($nivelprecio==4)
  {
     if(isset($precio4_producto) and $precio4_producto>0)
     { $precio=$precio4_producto; }
  }
}

$anulado="";
$queryInsert2="insert into cuentas2(id_cuenta, usuario, id_producto, cantidad, empaque, precio_producto, nota_extra, hora, numsession, submitted, rand_num, sistema, anulado)
values('$id_cuenta', '$usuario', '$id_producto','$Mcantidad','$Mempaque','$precio','$nota_extra', '$hora', '$numsession', '$submitted','$rand_num', '$sistema', '$anulado')";
//echo "<font color='#fff'> $query3";
$result3=mysqli_query($conex1,$queryInsert2);
?>
