<?php
// include("../datafiles/insert-catalogo2.php");

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
$queryInsert3="insert into catalogos2(idcatalgo, id_producto, cantidad, empaque, precio_producto, nota_extra, usuario, hora, submitted, rand_num)
values('$idcatalgo','$id_producto','$Mcantidad','$Mempaque','$precio','$nota_extra', '$usuario', '$hora', '$submitted','$rand_num')";
//echo "<font color='#fff'> $$queryInsert3";
$result3=mysqli_query($conex1,$queryInsert3);

?>
