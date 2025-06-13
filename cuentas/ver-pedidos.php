<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  ver-pedidos.php                                                         //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="S";
$icon="S";
$input="S";
$list="N";
$sidebar="S";
$table="S";
$message="S";
$popup="N";
$label="S";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="S";
$divider="S";
$forms="N";
$breadCrumb="S";
$findData="S";
$popup="S";
$topAdmin="S";
$dropdown="S";
$dirRoot="../";
$tableUse="cuentas1";
include_once("../includes/headfileFrame.php");

FechayHora();
$todoBien="N";

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
?>

<div class="ui container">
 <?php include("sub-menu.php"); ?>
</div>

<div class="ui padded grid">
 <div class="three wide tablet only three wide computer only column sidebar" id="sidebar">
   <?php
    include("left-menu.php");
   ?>
 </div>
 <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">

<?php
 $reg=0;
 $num=1;
 $numFilas=0;
 $totalCuenta=0;
 $sqlPedido1=mysqli_query($conex1,"select * from cuentas1");
 $numFilas=mysqli_num_rows($sqlPedido1);
 if($numFilas>0)
 {
  // pedido1
  while($cartData1=mysqli_fetch_array($sqlPedido1))
  {
    $idcart=$cartData1['idcart'];
    $numsession=$cartData1['numsession'];
    $usuario=$cartData1['usuario'];
    $hora=$cartData1['hora'];
    $submitted=$cartData1['submitted'];
    $rand_num=$cartData1['rand_num'];

    $sqlUser=mysqli_query($conex1,"select nombre,apellido,email,telefono,celular from usuarios where usuario='$usuario'");
    $userData=mysqli_fetch_array($sqlUser);
    if(isset($userData))
    {
      $nombre=$userData['nombre'];
      $apellido=$userData['apellido'];
      $email=$userData['email'];
      $telefono=$userData['telefono'];
      $celular=$userData['celular'];
      echo "<div class='ui message'>
       <div class='header'>
         $nombre $apellido / Email: $email / Telf: $telefono / Celular: $celular
        </div>
        <p> Hora Pedido: $hora / Fecha del Pedido: $submitted </p>
      </div>";
    }
?>
    <table class="ui blue table">
     <thead>
        <tr>
        <th class='center aligned'>#</th>
        <th >Producto</th>
        <th class='center aligned'>Cant</th>
        <th class='center aligned'>Precio</th>
        <th class='center aligned'>Total</th>
        </tr>
     </thead>
     <tbody>
<?php
      $sqlpedido2=mysqli_query($conex1,"select * from cuentas2 where numsession='$numsession'");
      while($cartData2=mysqli_fetch_array($sqlpedido2))
      {
        $idcart=$cartData2['idcart'];
        $id_producto=$cartData2['id_producto'];
        $cantidad=$cartData2['cantidad'];
        if($cantidad==0 or $cantidad=="")
        { $cantidad=1; }
        $precio=$cartData2['precio'];
        $usuario=$cartData2['usuario'];
        $hora=$cartData2['hora'];
        $submitted=$cartData2['submitted'];
        $rand_num=$cartData2['rand_num'];
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
 if($reg==0)
 {
    echo "<tr><td class='center aligned' colspan='5' style='padding: 60px;'>
     <h1 class='title'>No Hay Datos</h1>
    </td></tr>";
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


<button class="ui button">
  Cierra la Cuenta
</button>



 </div>
</div>

<?php
 include("$dirRoot"."includes/statusAdmin.php");
?>
