<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                          //
//  pagos-data.php                                                          //
//  Copyright (c) 2023 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
$numFilas=0;
$tableUse="pedidos";
$sqlPagos1=mysqli_query($conex1,"select id from pagoscliente where id_cuenta='$id_cuenta'");
$numFilas=mysqli_num_rows($sqlPagos1);
if($numFilas>0)
{
?>

<table class='ui  table'>
  <thead>
   <tr>
    <th class='center aligned green'>#</th>
    <th class='green'>Forma de Pago</th>
    <th class='right aligned green'>Monto</th>
    <th class='center aligned green'>OP</th>
   </tr>
  </thead>
  <tbody>
  <?php
   // Pagos Data
   $Tmontopago=0;
   $sqlPagos=mysqli_query($conex1,"select id,id_formapago,tipo_formapago,montopago from pagoscliente where id_cuenta='$id_cuenta'");
   while($pagoData=mysqli_fetch_array($sqlPagos))
   {
      $idPago=$pagoData['id'];
      $id_formapago=$pagoData['id_formapago'];
      $tipo_formapago=$pagoData['tipo_formapago'];
      $montopago=$pagoData['montopago'];
      if(isset($id_formapago))
      { include("$dirRoot"."bots/FormadePagoID.php"); }
      if(isset($formapagoData))
      {
       $foto_formapago=$formapagoData['foto_formapago'];
       $nom_formapago=$formapagoData['nom_formapago'];
       $cod_alicuota=$formapagoData['cod_alicuota'];
       $Tmontopago=$Tmontopago+$montopago;
      }

      echo "<tr>
       <td class='center aligned '>
        <img  src='$dirRoot"."imagenes/bancos/$foto_formapago'>
       </td>
       <td>$nom_formapago</td>
       <td class='right aligned'>$montopago</td>
       <td class='center aligned '>
        <a href='erase-pagos.php?id=$idPago&id_cuenta=$id_cuenta'><i class='erase icon' style='visibility: visible;'></i></a>
       </td>
      </tr>";
   }
  ?>
  </tbody>
 </table>
 <?php
 if(!isset($monto_apagar) or $monto_apagar==0)
 {
   include("$dirRoot"."libs/calcular-pedido.php");
 }
 if($Tmontopago>=$monto_apagar)
 {
   echo "<div class='ui raised segment'>
     Ya Puede Cerrar la Cuenta <a class='ui primary button' href='cerrar-cesta5.php?id_cuenta=$id_cuenta'>Cierra la Cuenta</a>
   </div>";
 }
}
//if($Tmontopago==
