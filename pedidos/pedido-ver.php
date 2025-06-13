<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pedidos-ver.php                                                        //
//  Copyright (c) 2023 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$accordion="N";
$aos="N";
$autoPro="N";
$breadCrumb="S";
$divider="N";
$dropdown="S";
$findData="S";
$forms="S";
$header="S";
$icon="S";
$image="S";
$input="S";
$item="N";
$jQueryModal="N";
$label="S";
$list="N";
$loadPage="S";
$menu="S";
$message="S";
$modal="S";
$popup="N";
$rating="N";
$sidebar="N";
$slick="N";
$swiper="N";
$table="S";
$topAdmin="S";
$tableUse="pedidos";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

$iduser=$_SESSION['iduser'];
$idnivel=$_SESSION['idnivel'];

if(!isset($iduser))
{ include_once("user-check2.php"); }
if(empty($iduser))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}
if(!isset($AreaCuentas))
{
 include_once("../bots/AreasSistema.php");
}
FechayHora();
$todoBien="N";

if($idnivel>=3)
{
 echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."pedironline/pedironline.php>";
 exit();
}
else
{
 include("../includes/leftbar.php");
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
?>

<div class="mainContent">
 <div id="content">
  <?php
//--------------------------------
   include("sub-menu.php");
//--------------------------------
  ?>

   <div class="ui centered grid">
    <div class="twelve wide tablet twelve wide computer column">

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
      $email=$pedidoData1['usuario'];
      $hora=$pedidoData1['hora'];
      $submitted=$pedidoData1['submitted'];
      $rand_num=$pedidoData1['rand_num'];
      if(isset($email) or $email<>"")
      {
   // Find Cliente Data
       $numCliente1=0;
       $numCliente2=0;
       $numCliente3=0;
       $sqlCliente=mysqli_query($conex1,"select id_cliente,cid_cliente,cod_cliente,nom_cliente,tel1_cliente,tel2_cliente,email_cliente from clientes where email_cliente='$email' and activo='S'");
       $numCliente1=mysqli_num_rows($sqlCliente);
       if($numCliente1==0)
       {
        $sqlCliente=mysqli_query($conex1,"select id_cliente,cid_cliente,cod_cliente,nom_cliente,tel1_cliente,tel2_cliente,email_cliente from pedido_cliente where email_cliente='$email' and activo='S'");
        $numCliente2=mysqli_num_rows($sqlCliente);
        if($numCliente2==0)
        {
         $sqlCliente=mysqli_query($conex1,"select * from usuarios where email='$email' and activo='S'");
         $numCliente3=mysqli_num_rows($sqlCliente);
         if($numCliente3==0)
         {
          $error="Error en los Datos o el Cliente no Existe";
          error();
          echo "<html><meta http-equiv=refresh content=3;url=cesta-checkout.php>";
          exit();
         }
        }
       }
       $clienteData=mysqli_fetch_array($sqlCliente);
       if(isset($clienteData))
       {
        if($numCliente3>0)
        {
            $id=$clienteData['iduser'];
            $id_cliente=$clienteData['iduser'];
            $cid_cliente=$clienteData['cid_cliente'];
            $email_cliente=$clienteData['email'];
            $nom_cliente=$clienteData['nombre']." ".$clienteData['apellido'];
            $telefono=$clienteData['telefono'];
            $tel1_cliente=$clienteData['celular'];
        }
        else
        {
            $id=$clienteData['id_cliente'];
            $id_cliente=$clienteData['id_cliente'];
            $cid_cliente=$clienteData['cid_cliente'];
            $email_cliente=$clienteData['email_cliente'];
            $nom_cliente=$clienteData['nom_cliente'];
            $tel1_cliente=$clienteData['tel1_cliente'];
            $telefono=$clienteData['tel2_cliente'];
        }
        echo "<div class='ui message' style='background-color:#2d2f31;color:#bfc7c5;'>
         <div class='header'>";
          echo "<p>CI/RIF: $cid_cliente / Cliente: <strong>$nom_cliente</strong>";
           if($tel1_cliente<>"")
           { echo " / Telf: $tel1_cliente"; }
         echo "</p></div>
        </div>";
       }
       else
       {
        $error="error datos del cliente";
        echo  $error;
       }
      }
      else
      {
        $error="error datos del cliente";
        echo  $error;
      }
   ?>

   <table class="ui striped celled inverted table">
    <thead>
     <tr>
      <th class='center aligned grey'>#</th>
      <th class='grey'>Producto</th>
      <th class='center aligned grey'>Cant</th>
      <th class='center aligned grey'>Precio</th>
      <th class='center aligned grey'>Total</th>
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
    if($reg==0)
    {
       echo "<tr><td class='center aligned' colspan='3' style='padding: 60px;'>
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

<?php
//         <button class="ui primary button" data-modal="modal1" id="call-modal-2"><i class="exchange alternate icon"></i> Cambiar Cliente</button>
//         <button class="ui primary button" data-modal="modal1" id="call-modal-1"><i class="money bill alternate outline icon"></i> Registra Pago</button>
?>
   <div class="ui grid">
    <div class="column">
      <center style="padding:30px;">
         <a class="ui primary red button" href="<?php echo "pedido-borrar1.php?idcart=$idcart"; ?>"><i class="money bill alternate outline icon"></i> Borrar</a>
         <button data-modal="modal1" id="call-modal-1" class="ui primary button"><i class="save outline icon"></i> Pasar a Cuentas</button>
      </center>
    </div>
   </div>

   <div class="ui modal" id="modal1">
     <div class="ui header">
        Pasar a Cuentas
     </div>
     <div class="content">
        <?php
          include("pedido-pasar-cuenta1.php");
        ?>
     </div>
   </div>

    </div>
    <div class="four wide tablet four wide computer column">
       <?php
         include("left-menu.php");
       ?>
       <div class="result text-center"></div>
    </div>
   </div>


 </div>
</div>

<?php
}
?>
<br><br>
<?php
// $showStatus="N";
$endPage="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
<script>
$(document).ready(function (e) {
 $("#submitForm").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "pedido-del.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
        success: function (data) {
          console.log(data);
          $('.result').html(data);
        }
      });
 }));
});
</script>

</body></html>
