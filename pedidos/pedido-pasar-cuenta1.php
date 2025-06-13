<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  ver-pedidos.php                                                         //
//  Copyright (c) 2023 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$noFrame="N";
$header="N";
$menu="N";
$list="N";
$popup="N";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$forms="N";
$topFile="N";
$topAdmin="N";
$dropdown="N";
$dirRoot="../";

include_once("../includes/headfileFrame.php");

FechayHora();
$todoBien="N";

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(isset($_GET['idcart']))
{ $idcart=$_GET['idcart']; }

if(isset($idcart) and $idcart<>"")
{
?>
  <h2>Pasar Cuenta Online a Pedidos</h2>
  <?php
    $reg=0;
    $num=1;
    $numFilas=0;
    $totalCuenta=0;
    $sqlpedirOnline1=mysqli_query($conex1,"select * from pedironline1 where idcart='$idcart'");
    $numFilas=mysqli_num_rows($sqlpedirOnline1);
    if($numFilas>0)
    {
     // pedirOnline1
     $pedidoData1=mysqli_fetch_array($sqlpedirOnline1);
     if(isset($pedidoData1))
     {
       $idcart=$pedidoData1['idcart'];
       $numsession=$pedidoData1['numsession'];
       $email_cliente=$pedidoData1['usuario'];
       $hora=$pedidoData1['hora'];
       $submitted=$pedidoData1['submitted'];
       $rand_num=$pedidoData1['rand_num'];

   // Clientes Data
       $sqlCliente=mysqli_query($conex1,"select id_cliente,cid_cliente,nom_cliente,tel1_cliente from clientes where email_cliente='$email_cliente'");
       $clienteData=mysqli_fetch_array($sqlCliente);
       if(isset($clienteData))
       {
        $id=$clienteData['id_cliente'];
        $cid_cliente=$clienteData['cid_cliente'];
        $nom_cliente=$clienteData['nom_cliente'];
        $tel1_cliente=$clienteData['tel1_cliente'];
        echo "<div class='ui message' style='background-color:#104E8B;color:#ffffff;'>
         <div class='header'>";
          echo "<p>CI/RIF: $cid_cliente / Cliente: <strong>$nom_cliente</strong>";
           if($tel1_cliente<>"")
           { echo " / Telf: $tel1_cliente"; }
         echo "</p></div>
        </div>";
       }
   ?>

   <table class="ui striped celled inverted table">
    <thead>
     <tr>
      <th class='center aligned blue'>#</th>
      <th class='blue'>Producto</th>
      <th class='center aligned blue'>Cant</th>
      <th class='center aligned blue'>Precio</th>
      <th class='center aligned blue'>Total</th>
      </tr>
    </thead>
    <tbody>

   <?php
     $sqlpedirOnline2=mysqli_query($conex1,"select * from pedironline2 where numsession='$numsession'");
     while($pedidoData2=mysqli_fetch_array($sqlpedirOnline2))
     {
       $idcart=$pedidoData2['idcart'];
       $id_producto=$pedidoData2['id_producto'];
       $cantidad=$pedidoData2['cantidad'];
       if($cantidad==0 or $cantidad=="")
       { $cantidad=1; }
       $precio=$pedidoData2['precio'];
       $usuario=$pedidoData2['usuario'];
       $hora=$pedidoData2['hora'];
       $submitted=$pedidoData2['submitted'];
       $rand_num=$pedidoData2['rand_num'];
       $sqlPro=mysqli_query($conex1,"select id_producto,codigo_barra,cod_categoria,cod_subcategoria,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto from productos where id_producto='$id_producto'");
       $proData=mysqli_fetch_array($sqlPro);
       if(isset($proData))
       {
         $id=$proData['id_producto'];
         //$id_cuenta=$proData['id_cuenta'];
         $codigo_barra=$proData['codigo_barra'];
         $cod_categoria=$proData['cod_categoria'];
         $cod_subcategoria=$proData['cod_subcategoria'];
         $nom_producto=$proData['nom_producto'];
         $precio1_producto=$proData['precio1_producto'];
         $precio2_producto=$proData['precio2_producto'];
         $precio3_producto=$proData['precio3_producto'];
         $precio4_producto=$proData['precio4_producto'];
         $total=$cantidad*$precio1_producto;
         $totalCuenta=$totalCuenta+$total;
       }
       // Cart Data
       echo "<tr>
        <td class='center aligned'>$num</td>
        <td>$nom_producto</td>
        <td class='center aligned'>$cantidad</td>
        <td class='right aligned'>$precio1_producto</td>
        <td class='right aligned'>$total</td>";
       echo "</tr>";
       $num++;
       $reg++;
     }
    }
   }
  if($totalCuenta>0)
  {
       echo "<tr><td class='right aligned' colspan='5'>
        Total: $totalCuenta
       </td></tr>";

    }
   ?>
    </tbody>
   </table>

<style>
.responsive-iframe {
  position: absolute;
  top: 10;
  left: 10;
  bottom: 10;
  right:  10;
  width: 100%;
  height: 100%;
  border: none;
}
</style>
<iframe class="responsive-iframe" src="" loading="lazy" name="data2" onLoad="autoResize();"></iframe>

   <div class="ui grid">
    <div class="column center aligned">
       <a class="ui primary button" href="<?php echo "pedido-pasar-cuenta2.php?idcart=$idcart"; ?>" target="data2">Confirma Pasar a Cuentas</a>
    </div>
   </div>

<?php
}
?>

<?php
$endPage="S";
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
