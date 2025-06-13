<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                          //
//  list-cesta1.php                                                         //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************

// id_cuenta, id_cuenta, id_producto, cantidad, nota_extra, anulado, usuario, hora, submitted, rand_num
// '$id_cuenta', '$id_cuenta', '$id_producto', '$cantidad', '$nota_extra', '$anulado', '$usuario', '$hora', '$submitted', '$rand_num'
// echo $id_cuenta;
?>

<table class="ui five column celled table">
 <thead>
  <tr>
   <th class='black center aligned'>#</th>
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
    $sqlCesta=mysqli_query($conex1,"select id_cuenta, id_cuenta, id_producto, cantidad, nota_extra from cuentas2 where id_cuenta='$id_cuenta'");
    $numFilas=mysqli_num_rows($sqlCesta);
    if($numFilas>0)
    {
      while($cestaData=mysqli_fetch_array($sqlCesta))
      {
        $id_cuenta=$cestaData['id_cuenta'];
        $id_cuenta=$cestaData['id_cuenta'];
        $id_producto=$cestaData['id_producto'];
        $cantidad=$cestaData['cantidad'];
        // $nota_extra=$cestaData['nota_extra'];
        // $anulado=$cestaData['anulado'];
        // $usuario=$cestaData['usuario'];
        // $hora=$cestaData['hora'];
        // $submitted=$cestaData['submitted'];
        // $rand_num=$cestaData['rand_num'];
        $sqlPro=mysqli_query($conex1,"select id_producto, cod_producto, cod_categoria, cod_subcategoria,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto from productos where id_producto='$id_producto'");
        $proData=mysqli_fetch_array($sqlPro);
        if(isset($proData))
        {
          $id_producto=$proData['id_producto'];
          $cod_producto=$proData['cod_producto'];
          $cod_categoria=$proData['cod_categoria'];
          $cod_subcategoria=$proData['cod_subcategoria'];
          $nom_producto=$proData['nom_producto'];
          $precio1_producto=$proData['precio1_producto'];
          $precio2_producto=$proData['precio2_producto'];
          $precio3_producto=$proData['precio3_producto'];
          $precio4_producto=$proData['precio4_producto'];
          $total=$cantidad*$precio1_producto;
          $Ttotal=$Ttotal+$total;
        }
        // Cesta Data
        echo "<tr>
        <td class='center aligned'>$num</td>
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
        <td class='center aligned grey'></td>
        <td class='grey'><b>Total</b></td>
        <td class='center aligned grey'></td>
        <td class='center aligned grey'></td>
        <td class='center aligned grey'><b>$Ttotal</b></td>
       </tr>";
      }
    }
  ?>
 </tbody>
</table>
<?php
if($reg>0)
{
 echo "<a href='limpia-cesta.php?id_cuenta=$id_cuenta&sistema=$sistema' target='result'>Limpia Cesta</a>";
}
?>
