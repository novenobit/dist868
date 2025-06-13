<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  cuenta1-ver1.php                                                        //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$breadCrumb="S";
$icon="S";
$image="S";
$label="S";
$list="N";
$message="S";
$table="S";
$tableUse="cuentas1";
$dirRoot="../";
include_once("../includes/headfilePrinter.php");
FechayHora();
//if(!isset($printerwidth))
//{ $printerwidth="600px"; }
?>

<div class="noPrintArea">
 <div class="container">
   <div class="row">
     <div class="col-6">
        <h3>Imprimir Cuenta</h3>
     </div>
     <div class="col-3">
       <a class='ui primary button' href="javascript:window.print()"><i class='icofont-print icofont-2x'></i> Imprimir</a>
     </div>
     <div class="col-3">
       <a class='ui orange button font-10' href="javascript:window.close()">Cierra <i class="icofont-close-squared-alt icofont-2x font-pink"></i></a>
     </div>
   </div>
 </div>
</div>

<?php
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['rand_num']))
{ $rand_num=$_GET['rand_num']; }

// --------------------------

$reg=0;
if(isset($id_cuenta) and $id_cuenta<>"")
{ $sqlCuentas1=mysqli_query($conex1,"select * from cuentas1 where id_cuenta='$id_cuenta'"); }
if(isset($rand_num) and $rand_num<>"")
{ $sqlCuentas1=mysqli_query($conex1,"select * from cuentas1 where rand_num='$rand_num'"); }

$numFilas=mysqli_num_rows($sqlCuentas1);
if($numFilas>0)
{
 $cuentaData=mysqli_fetch_array($sqlCuentas1);
 include("../data/cuenta-data.php");
 if(isset($cuentaData))
 { $cid_cliente=$cuentaData['cid_cliente']; }

 $sqlCliente=mysqli_query($conex1,"select cid_cliente,nom_cliente,dir1_cliente,tel1_cliente,tel2_cliente,email_cliente,nivelprecio,vendedor from clientes where cid_cliente='$cid_cliente'");
 $numFilas=mysqli_num_rows($sqlCliente);
 if($numFilas>0)
 {
  $clienteData=mysqli_fetch_array($sqlCliente);
  $cid_cliente=$clienteData['cid_cliente'];
  $nom_cliente=$clienteData['nom_cliente'];
  $dir1_cliente=$clienteData['dir1_cliente'];
  $tel1_cliente=$clienteData['tel1_cliente'];
  $tel2_cliente=$clienteData['tel2_cliente'];
  $email_cliente=$clienteData['email_cliente'];
  $nivelprecio=$clienteData['nivelprecio'];
  $vendedor=$clienteData['vendedor'];
  $nomVendedor="";
  if($vendedor<>"")
  {
   $numFilas=0;
   $sqlEmp=mysqli_query($conex1,"select nombre,apellido from usuarios where cid_usuario='$vendedor'");
   $numFilas=mysqli_num_rows($sqlEmp);
   if($numFilas>0)
   {
     $empData=mysqli_fetch_array($sqlEmp);
     $nombre=$empData['nombre'];
     $apellido=$empData['apellido'];
     $nomVendedor="$nombre $apellido";
   }
  }
?>
  <h2><?php echo $nom_cliente; ?></h2>
  <div class="content">
   <?php
    echo "CI/RIF: ".$cid_cliente;
    if(isset($nivelprecio) and $nivelprecio<>"")
    {
     include("$dirRoot"."datafiles/find-nivel-precios.php");
     //echo " / NP: $nom_nivel";
    }
    if($dir1_cliente<>"")
    { echo " / ".$dir1_cliente;  }
    if($tel1_cliente<>"")
    { echo " / ".$tel1_cliente;  }
    if($tel2_cliente<>"")
    { echo " / ".$tel2_cliente;  }
    if($email_cliente<>"")
    { echo " / ".$email_cliente;  }
   ?>
  </div>
  <div class="content">
   <?php
    if($id_cuenta<>"")
    { echo "#Cuenta: $id_cuenta"; }
    //if($nomVendedor<>"")
    //{ echo " / Vendedor: $nomVendedor"; }
    if($descuento>0)
    { echo " / Descuento: ($descuento)"; }
    if($id_cuenta=="" and $rand_num<>"")
    { echo "#Num: $rand_num"; }
    if($fecha<>"")
    { echo " / Fecha: ".$fecha;  }
    if($hora<>"")
    { echo " / Hora: ".$hora;  }
    echo " / Impreso: $dia/$mes/$ano";
   ?>
  </div>
</div>
<?php
 }
?>

 <table style="width:600px;">
  <thead>
    <tr>
    <th class='grey center aligned'>Cant</th>
    <th class='grey center aligned'>Bulto</th>
    <th class='grey center aligned'>Entrega</th>
    <th class='grey center aligned'>Und</th>
    <th class='grey'>Item / Producto</th>
    <th class='grey center aligned'>Precio</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $reg=0;
    $num=1;
    $Ttotal=0;
    $numFilas=0;
    $sqlpedido2=mysqli_query($conex1,"select * from cuentas2 where id_cuenta='$id_cuenta' order by empaque desc");
    $numFilas=mysqli_num_rows($sqlpedido2);
    if($numFilas>0)
    {
      while($pedido2Data=mysqli_fetch_array($sqlpedido2))
      {
        $id_cuenta=$pedido2Data['id_cuenta'];
        $id_cuenta=$pedido2Data['id_cuenta'];
        $id_producto=$pedido2Data['id_producto'];
        $cantidad=$pedido2Data['cantidad'];
        //$empaque=$pedido2Data['empaque'];
        $precio_producto=$pedido2Data['precio_producto'];
        //$precio=$pedido2Data['precio'];
    // Find Oroducto
        $sqlPro=mysqli_query($conex1,"select id_producto,cod_producto,cod_categoria,cod_subcategoria,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto,nom_unidad,empaque from productos where id_producto='$id_producto'");
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
          $nom_unidad=$proData['nom_unidad'];

          if($pedido2Data['empaque']<>"")
          {
          $empaque=$pedido2Data['empaque'];
          }
          else
          { $empaque=$proData['empaque']; }
          if($empaque==0 or $empaque=="")
          { $empaque=1; }
    // Check Price
          if($precio_producto>0)
          {
            $precio=$precio_producto;
          }
          else
          {
            if(!isset($nivelprecio) or $nivelprecio=="")
            { $nivelprecio=1; }
            if($nivelprecio==1)
            { $precio=$precio1_producto; }
            if($nivelprecio==2)
            { $precio=$precio2_producto; }
            if($nivelprecio==3)
            { $precio=$precio3_producto; }
            if($nivelprecio==4)
            { $precio=$precio4_producto; }
          }

          if($cantidad==0 or $cantidad=="")
          {
            $cantidad=1;
            $queryUP="update cuentas2 set cantidad='$cantidad' where id_cuenta='$id_cuenta' and id_producto='$id_producto'";
            $result=mysqli_query($conex1,$queryUP);
          }
          if(is_numeric($empaque))
          { $Tcant=$empaque*$cantidad; }
          else
          { $Tcant=$cantidad; }

          if($Tcant>0 and $precio>0)
          {
            $total=$Tcant*$precio;
            $Ttotal=$Ttotal+$total;
          }
        }
        if($proData['empaque']<>$pedido2Data['empaque'])
        {
          $empaque="";
          //$Tcant="";
        }
        if($empaque=="" and $cantidad==1)
        { $cantidad=""; }
        if($empaque=="")
        { $cantidad=""; }

        // Cesta Data
        // <td class='center aligned'>$num</td>
        echo "<tr>
        <td class='center aligned' style='border:1px solid;'>$cantidad</td>
        <td class='center aligned' style='border:1px solid;'>$empaque</td>
        <td class='center aligned font-bold font-red font-16' style='border:1px solid;'>$Tcant</td>
        <td class='center aligned' style='border:1px solid;'>$nom_unidad</td>
        <td style='border:1px solid;'>$nom_producto</td>
        <td class='center aligned' style='border:1px solid;'>". number_format($precio, 2, '.', '')."</td>
        </tr>";
        $num++;
        $reg++;
      }
    }
    if($reg==0)
    {
        echo "<tr><td class='center aligned' colspan='6' style='padding: 60px;'>
        <h1 class='title'><strong>No Hay Datos</strong></h1>
        </td></tr>";
    }
    else
    {
    }
  ?>
  </tbody>
 </table>
<?php
// echo "<p>Impreso: $dia/$mes/$ano</p>";
 if($reg>0)
 {
  if(!isset($numPagos))
  {
   $numPagos=0;
  // $sqlPagos=mysqli_query($conex1,"select id,montopago from pagoscliente where id_cuenta='$id_cuenta'");
  // $numPagos=mysqli_num_rows($sqlPagos);
   if($numPagos>0)
   {
   // $pagoData=mysqli_fetch_array($sqlPagos);
   // $montopago=$pagoData['montopago'];
   // if($montopago<$monto_apagar)
   // { }
   }
  }
 }
}

if($reg>0)
{
 // echo "<a 'limpia-cesta.php?id_cuenta=$id_cuenta' target='result'>Limpia Cesta</a>";
}
?>
<script language="JavaScript" type="text/javascript">
 if (window.print)
 { window.print(); }
</script>
