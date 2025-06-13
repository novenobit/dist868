<?php
//  include("../data/pedido-online.php");
if(isset($cuentas2Data))
{
 $id_cuenta=$cuentas2Data['id_cuenta'];
 $idcart=$cuentas2Data['idcart'];
 $usuario=$cuentas2Data['usuario'];
 $id_producto=$cuentas2Data['id_producto'];
 $cantidad=$cuentas2Data['cantidad'];
 if($cantidad==0 or $cantidad=="")
 { $cantidad=1; }
 $empaque=$cuentas2Data['empaque'];
 if($empaque==0 or $empaque=="")
 { $empaque=1; }
 $precio=$cuentas2Data['precio'];
 $nota_extra=$cuentas2Data['nota_extra'];
 $hora=$cuentas2Data['hora'];
 $numsession=$cuentas2Data['numsession'];
 $submitted=$cuentas2Data['submitted'];
 $rand_num=$cuentas2Data['rand_num'];
}
?>
