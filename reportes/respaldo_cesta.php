<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                          //
//  respaldo-cesta.php                                                    //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
?>
<h4>Datos de Productos</h4>
<table class="ui  celled table">
 <thead>
  <tr>
   <th class='black center aligned' style='width:100px;'>Img</th>
   <th class='black'>Producto</th>
   <th class='black center aligned'>Cant</th>
   <th class='black center aligned'>Precio</th>
   <th class='black center aligned'>Total</th>
  </tr>
 </thead>
 <tbody>
<?php
 $reg=0;
 $num=1;
 $Ttotal=0;
 $numFilas=0;
//echo "select id_cuenta, id_cuenta, id_producto, cantidad, nota_extra from respaldo_cesta where numfactura='$numfactura'";
 if(isset($numfactura) and $numfactura<>"")
 { $sqlCesta=mysqli_query($conex1,"select idcesta,id_cuenta,cod_producto,cantidad,precio1_producto from respaldo_cesta where numfactura='$numfactura'"); }
 $numFilas=mysqli_num_rows($sqlCesta);

 if($numFilas>0)
 {
  while($cestaData=mysqli_fetch_array($sqlCesta))
  {
    $idcesta=$cestaData['idcesta'];
    $id_cuenta=$cestaData['id_cuenta'];
    $cod_producto=$cestaData['cod_producto'];
    $cantidad=$cestaData['cantidad'];
    $precio1_producto=$cestaData['precio1_producto'];
    $sqlPro=mysqli_query($conex1,"select cod_categoria,cod_subcategoria,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto,foto_producto from productos where cod_producto='$cod_producto'");
    $proData=mysqli_fetch_array($sqlPro);
    if(isset($proData))
    {
      $foto_producto=$proData['foto_producto'];
      $cod_categoria=$proData['cod_categoria'];
      $cod_subcategoria=$proData['cod_subcategoria'];
      $nom_producto=$proData['nom_producto'];
      $total=$cantidad*$precio1_producto;
      $Ttotal=$Ttotal+$total;
    }
    // Show Cesta Data
    echo "<tr>
     <td class='center aligned' style='width:100px;'>";

        if($proData['foto_producto']<>"")
        {
          echo "<img class='ui small centered image' src='$dirRoot"."imagenes/productos/{$proData['foto_producto']}' style='height:60px'>";
        }
        else
        {
          echo "<img class='ui centered circular image' src='$dirRoot"."imagenes/productos/sinfoto2.png' style='height:50px'>";
        }
     echo "</td>
     <td>$nom_producto</td>
     <td class='center aligned'>$cantidad</td>
     <td class='center aligned'>$precio1_producto</td>
     <td class='center aligned'>$total</td>
    </tr>";
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
