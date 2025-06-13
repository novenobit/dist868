<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                          //
//  respaldo-cesta.php                                                    //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
?>
<h4>Datos de Pagos</h4>
<table class="ui five column celled table">
 <thead>
  <tr>
   <th class='black center aligned'>#</th>
   <th class='black'>Empleado</th>
   <th class='black center aligned'>Forma Pago</th>
   <th class='black center aligned'>Monto</th>
   <th class='black center aligned'>Fecha</th>
  </tr>
 </thead>
 <tbody>
<?php
 $reg=0;
 $num=1;
 $Ttotal=0;
 $numFilas=0;
 if(isset($numfactura) and $numfactura<>"")
 { $sqlPagos=mysqli_query($conex1,"select id,empleado,id_formapago,tipo_formapago,montopago,dia,mes,ano from respaldo_pagos where numfactura='$numfactura'"); }
 $numFilas=mysqli_num_rows($sqlPagos);

 if($numFilas>0)
 {
  while($pagosData=mysqli_fetch_array($sqlPagos))
  {
    $id=$pagosData['id'];
    $empleado=$pagosData['empleado'];
    $id_formapago=$pagosData['id_formapago'];
    $tipo_formapago=$pagosData['tipo_formapago'];
    $montopago=$pagosData['montopago'];
    $dia=$pagosData['dia'];
    $mes=$pagosData['mes'];
    $ano=$pagosData['ano'];
    $nom_formapago="";
    if(isset($id_formapago) and $id_formapago<>"")
    { include("../bots/FormadePagoID.php");
      $nom_formapago=$formapagoData['nom_formapago'];
    }
// Datos del Empleado
    //$sqlPro=mysqli_query($conex1,"select nombre,apellido from usuarios where empleado='$empleado'");
    //$proData=mysqli_fetch_array($sqlPro);
    // Show Pagos Data
    echo "<tr>
     <td class='center aligned'>$num</td>
     <td>Falta Agregar</td>
     <td class='center aligned'>$nom_formapago</td>
     <td class='center aligned'>$montopago</td>
     <td class='center aligned'>$dia/$mes/$ano</td>
    </tr>";
    $Ttotal=$Ttotal+$montopago;
    $num++;
    $reg++;
  }
 }
 if($reg==0)
 {
    echo "<tr><td class='center aligned' colspan='5' style='padding: 60px;'>
     <h1 class='title'><strong>No Hay Datos</strong></h1>
    </td></tr>";
 }
 else
 {
   if($Ttotal>0)
   {
    echo "<tr>
     <td class='center aligned black'></td>
     <td class='black'><b>Total</b></td>
     <td class='center aligned black'></td>
     <td class='center aligned black'></td>
     <td class='center aligned black'><b>$Ttotal</b></td>
    </tr>";
   }
 }

?>
 </tbody>
</table>
