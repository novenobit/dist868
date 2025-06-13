<?php
//include("$dirRoot"."datafiles/nivelPrecios.php");
if(isset($proData))
{
 if(!isset($nivelprecio) or $nivelprecio=="")
 { $nivelprecio=1; }
 if($nivelprecio=="1")
 { $precioProducto=$proData['precio1_producto']; }
 if($nivelprecio=="2")
 { $precioProducto=$proData['precio2_producto']; }
 if($nivelprecio=="3")
 { $precioProducto=$proData['precio3_producto']; }
 if($nivelprecio=="4")
 { $precioProducto=$proData['precio4_producto']; }
}
?>
