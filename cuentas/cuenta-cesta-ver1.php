<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  agrega-cesta1.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$aos="N";
$findData="S";
$forms="S";
$header="N";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$menu="S";
$message="S";
$popup="N";
$rating="N";
$sidebar="N";
$table="S";
$topAdmin="S";
$dirRoot="../";
$tableUse="cuentas1";

include_once("../includes/headfileFrame.php");

if(!isset($iduser))
{ include_once("../users/user-check2.php"); }
if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

FechayHora();
$todoBien="N";
if(!isset($sistema))
{ $sistema='e'; }

FechayHora();
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['op2']))
{ $op2=$_GET['op2']; }
if(isset($_GET['idcart']))
{ $idcart=$_GET['idcart']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }
if(isset($_GET['sistema']))
{ $sistema=$_GET['sistema']; }
?>

<table class="ui celled padded very long scrolling table">   
   <thead style="background-color:#6a49fa;">
    <tr>
     <th class='center aligned' style="color:#ffffff;">Item/Producto - Precio</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $reg=0;
  $num=0;
  $Tcant=0;
  $Ttotal=0;
  $numFilas=0;
  $sqlpedido2=mysqli_query($conex1,"select * from cuentas2 where id_cuenta='$id_cuenta'");
  $numFilas=mysqli_num_rows($sqlpedido2);
  if($numFilas>0)
  {
    while($pedido2Data=mysqli_fetch_array($sqlpedido2))
    {
      $id_cuenta=$pedido2Data['id_cuenta'];
      $id_cuenta=$pedido2Data['id_cuenta'];
      $id_producto=$pedido2Data['id_producto'];
      $cantidad=$pedido2Data['cantidad'];
      $empaqueCesta=$pedido2Data['empaque'];
      $precio_producto=$pedido2Data['precio_producto'];

  // Find Oroducto
      $sqlPro=mysqli_query($conex1,"select id_producto,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto,nom_unidad,empaque from productos where id_producto='$id_producto'");
      $proData=mysqli_fetch_array($sqlPro);
      if(isset($proData))
      {
        $id_producto=$proData['id_producto'];
        $nom_producto=$proData['nom_producto'];
        $precio1_producto=$proData['precio1_producto'];
        $precio2_producto=$proData['precio2_producto'];
        $precio3_producto=$proData['precio3_producto'];
        $precio4_producto=$proData['precio4_producto'];
        $nom_unidad=$proData['nom_unidad'];
        $empaquePro=$proData['empaque'];
      }
      // Cesta Data
      // <td class='center aligned'>$num</td>
      echo "<tr>
       <td>$nom_producto
         <br>Cant: $cantidad Und: $nom_unidad Precio: $precio_producto</td>
      </tr>";
      $num++;
      $reg++;
    }
  }
  if($reg==0)
  {
      echo "<tr><td class='center aligned' style='padding: 60px;'>
      <h1 class='title'><strong>No Hay Datos</strong></h1>
      </td></tr>";
  }
  ?>
  </tbody>
 </table>

<?php
 if($num>0)
 {
?>
 <div class="ui hidden divider"></div>
 <div class='ui grid'>
  <div class='sixteen wide column'>
  <?php echo "#Cuenta: $id_cuenta - Num Items: $num"; ?>
  </div>
 </div>
<?php
}
//include("$dirRoot"."includes/statusAdmin.php");
?>
