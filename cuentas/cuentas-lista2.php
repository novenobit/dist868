<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                             //
//  list-cuentas2.php                                                        //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.    //
// ***************************************************************************
?>

<table class="ui celled padded very long scrolling table">
 <thead>
  <tr>
   <th class='center aligned' style="background-color:#6a49fa;color:#e6e1fe;">Fec</th>
   <th class='center aligned' style="background-color:#6a49fa;color:#e6e1fe;">Rif/Ci</th>
   <th style="background-color:#6a49fa;color:#e6e1fe;width:300px;">Cliente</th>
   <th class='center aligned' style="background-color:#6a49fa;color:#e6e1fe;">Items</th>
   <th class='center aligned' style="background-color:#6a49fa;color:#e6e1fe;">Total</th>
   <th class='center aligned' style="background-color:#6a49fa;color:#e6e1fe;">Vendedor</th>
   <th class='center aligned' style="background-color:#6a49fa;color:#e6e1fe;">PCD</th>
   <th class='center aligned' style="background-color:#6a49fa;color:#e6e1fe;width:40px;">S</th>
  </tr>
 </thead>
 <tbody>
<?php
 $reg=0;
 $num=1;
 
 if($idnivel<=1 or $AreaCuentas=="S")
 {
   if($filter<>"")
   {
    $sqlCuentas=mysqli_query($conex1,"select usuario,id_cuenta,cid_cliente,descuento,monto_apagar,preparado,chequeado,despachado,fecha,sistema from cuentas1 where sistema='$filter'");
   }
   else
   { $sqlCuentas=mysqli_query($conex1,"select usuario,id_cuenta,cid_cliente,descuento,monto_apagar,preparado,chequeado,despachado,fecha,sistema from cuentas1"); }
 }
 else
 { $sqlCuentas=mysqli_query($conex1,"select usuario,id_cuenta, cid_cliente, descuento, monto_apagar,preparado,chequeado,despachado,fecha,sistema from cuentas1 where usuario='$usuario'"); }
 while($cuentasData=mysqli_fetch_array($sqlCuentas))
 {
    $vendedor=$cuentasData['usuario'];
    $id_cuenta=$cuentasData['id_cuenta'];
    $cid_cliente=$cuentasData['cid_cliente'];
    $monto_apagar=$cuentasData['monto_apagar'];
    $descuento=$cuentasData['descuento'];
    $preparado=$cuentasData['preparado'];
    $chequeado=$cuentasData['chequeado'];
    $despachado=$cuentasData['despachado'];
    $fecha=substr($cuentasData['fecha'],0,5);
    $sistema=strtoupper($cuentasData['sistema']);
    $telf="";
    // Datos Cliente
    $sqlCliente=mysqli_query($conex1,"select nom_cliente,tel1_cliente,tel2_cliente,nivelprecio from clientes where cid_cliente='$cid_cliente'");
    $clienteData=mysqli_fetch_array($sqlCliente);
    if(isset($clienteData))
    {
      $nom_cliente=$clienteData['nom_cliente'];
      $tel1_cliente=$clienteData['tel1_cliente'];
      $tel2_cliente=$clienteData['tel2_cliente'];
      $nivelprecio=$clienteData['nivelprecio'];
      if($tel1_cliente<>"")
      { $telf=$tel1_cliente; }
      if($tel2_cliente<>"")
      { $telf=$tel2_cliente; }
    }
    else
    {
      $nom_cliente="Sin Datos";
      $tel1_cliente="Sin Datos";
      $nivelprecio=1;
    }
// Venededor
      $vendedorName="";
      if(isset($vendedor) and $vendedor<>"")
      {
       $vendedorSql=mysqli_query($conex1,"select nombre,apellido from usuarios where usuario='$vendedor' or cid_usuario='$vendedor'");
       $vendedorData=mysqli_fetch_array($vendedorSql);
       if(isset($vendedorData))
       {
        $vendedorName=$vendedorData['nombre']." ".$vendedorData['apellido'];
       }
      }
// Datos Cesta
    $numCesta=0;
    $Tmonto_apagar=0;
    $sqlCuentas2=mysqli_query($conex1,"select id_cuenta,id_producto,cantidad,empaque,precio_producto from cuentas2 where id_cuenta='$id_cuenta'");
    while($cuentas2Data=mysqli_fetch_array($sqlCuentas2))
    {
      $id_cuenta=$cuentas2Data['id_cuenta'];
      $id_producto=$cuentas2Data['id_producto'];
      $cantidad=$cuentas2Data['cantidad'];
     //$empaque=$cuentas2Data['empaque'];
      $precio_producto=$cuentas2Data['precio_producto'];
// Producto Data
      $precio=0;
      $sqlPro=mysqli_query($conex1,"select nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto,empaque from productos where id_producto='$id_producto'");
      $proData=mysqli_fetch_array($sqlPro);
      if(isset($proData))
      {
       $nom_producto=$proData['nom_producto'];
       if($cuentas2Data['empaque']<>"")
       { $empaque=$cuentas2Data['empaque']; }
       else
       { $empaque=$proData['empaque']; }
       if(!is_numeric($empaque))
       { $empaque=1; }
// Precios
       if($precio_producto>0)
       {
         $precioProducto=$precio_producto;
       }
       if($precio_producto==0 or $precio_producto=="")
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
       $cant=($cantidad*$empaque);
       $precio=$cant*$precioProducto;
      }
      $Tmonto_apagar=$Tmonto_apagar+$precio;
      $numCesta++;
    }

    // Show Data
    echo "<tr>
     <td class='center aligned'><a href='cuenta-ver1.php?id_cuenta=$id_cuenta&sistema=$sistema'>$fecha</a></td>
     <td class='center aligned'><a href='cuenta-ver1.php?id_cuenta=$id_cuenta&sistema=$sistema'>$cid_cliente</a></td>
     <td style='width:300px;'><a href='cuenta-ver1.php?id_cuenta=$id_cuenta&sistema=$sistema'>$nom_cliente</a>
     <br>$telf";
      if($descuento<>"")
      { echo "<span class='font-orange font-10'><i class='percent icon'></i></span>"; }
     echo "</td>
     <td class='center aligned'><a href='cuenta-cesta-ver1.php?id_cuenta=$id_cuenta&sistema=$sistema' target='data2'>$numCesta</a></td>
     <td class='center aligned'>$Tmonto_apagar</td>
     <td class='center aligned'>";
      if($vendedorName<>"")
      { echo "".$vendedorName.""; }
      else
      { echo $vendedor; }
     echo "</td>
     <td class='center aligned'>";
      if($numCesta==0)
      {
        // echo "<a class='fluid ui button' href='#cuenta-ver1.php?id_cuenta=$id_cuenta'><i class='folder red delete icon'></i></a>";
        echo "<a class='fluid ui button' href='cuenta-del1.php?id_cuenta=$id_cuenta&sistema=$sistema'><i class='folder red delete icon'></i></a>";
      }
      else
      {
         if($preparado=="S")
         { echo "<span class='font-red'>X</span>"; }
         else
         { echo "O"; }
         if($chequeado=="S")
         { echo "<span class='font-red'> X </span>"; }
         else
         { echo " O "; }
         if($despachado=="S")
         { echo "<span class='font-red'>X</span>"; }
         else
         { echo "O"; }
      }
     echo "</td>";
     // <td class='center aligned'>";
     // echo "<a class='fluid ui button' href='cuenta-ver1.php?id_cuenta=$id_cuenta'><i class='folder open icon'></i></a>";/
     //  echo "<a class='fluid ui orange button' href='cuenta-ver1.php?id_cuenta=$id_cuenta&sistema=$sistema'><i class='folder open icon'></i></a>";
     echo "<td class='center aligned' style='width:40px;'>
      <a href='cuenta-cesta-ver1.php?id_cuenta=$id_cuenta&sistema=$sistema' target='data2'>$sistema</a>
     </td>
    </tr>";
    $num++;
    $reg++;
 }
 if($reg==0)
 {
    echo "<tr><td class='center aligned' colspan='9' style='padding: 60px;'>
     <h1 class='title'>No Hay Datos</h1>
    </td></tr>";
 }
?>
 </tbody>
</table>


