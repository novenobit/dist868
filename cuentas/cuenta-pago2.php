<?php
$mobile="N";
$tableUse="cuentas1";
$id_formapago=$idPago;
$tipo_formapago="";
$debito_bs=0;

if(isset($_GET['idPago']))
{ $id_formapago="$_GET[idPago]";
  include("$dirRoot"."bots/FormadePagoID.php");
}
if(isset($_GET['tipo_formapago']))
{ $tipo_formapago="$_GET[tipo_formapago]";
  include("$dirRoot"."bots/FormadePagoTipo.php");
}
if(isset($_GET['debito_bs']))
{ $debito_bs="$_GET[debito_bs]"; }


if(isset($formapagoData))
{
 $tipo_formapago=$formapagoData['tipo_formapago'];
 if($tipo_formapago=="CxC" or $tipo_formapago=="CXC")
 {
   $sqlM=mysqli_query($conex1, "select cid_cliente from cuentas1 where id_cuenta='$id_cuenta'");
   $mesaData=mysqli_fetch_array($sqlM);
   mysqli_free_result($sqlM);
   if($mesaData['cid_cliente']<>"")
   {
    echo "<html><meta http-equiv=refresh content=0;url=../cxc/cxc-cerrar1.php?id_cuenta=$id_cuenta&id_formapago=$id_formapago&sistema=$sistema&areaMesas=$areaMesas&op=propina>";
    exit();
   }
   else
   {
 //   echo "<html><meta http-equiv=refresh content=0;url=../clientes/cliente1.php?id_cuenta=$id_cuenta&id_formapago=$id_formapago&sistema=$sistema&areaMesas=$areaMesas&op=propina>";
    exit();
   }
 }
//$tipo_formapago=$formapagoData['tipo_formapago'];
 if($tipo_formapago=="MON")
 {
//  echo "<html><meta http-equiv=refresh content=0;url=formapago-moneda1.php?id_cuenta=$id_cuenta&id_formapago=$id_formapago&sistema=$sistema&areaMesas=$areaMesas&op=propina>";
  exit();
 }
 if($tipo_formapago=="ZEL")
 {
//  echo "<html><meta http-equiv=refresh content=0;url=formapago-moneda3.php?id_cuenta=$id_cuenta&id_formapago=$id_formapago&sistema=$sistema&areaMesas=$areaMesas&tipo_formapago=$tipo_formapago>";
  exit();
 }
}

if($tipo_formapago=="CxC" and $saldoDebePagarBs==$mesaData['monto_apagar'])
{
 $id_banco="";
 $cid_cliente=$mesaData['cid_cliente'];
// echo "<html><meta http-equiv=refresh content=0;url=formapago4.php?id_cuenta=$id_cuenta&id_formapago=$id_formapago&montopago={$mesaData['monto_apagar']}&cid_cliente=$cid_cliente&id_banco=$id_banco&sistema=$sistema&areaMesas=$areaMesas&op=propina>";
 exit();
}

if(!isset($cuentaData))
{
 $sql="select cid_cliente, descuento, total_venta2, valor_igtf, impuesto_igtf, monto_apagar, nota_venta from cuentas1 where id_cuenta='$id_cuenta'";
 $sqlM=mysqli_query($conex1, $sql);
 $mesaData=mysqli_fetch_array($sqlM);
 mysqli_free_result($sqlM);
}

// Calcula Data -----------------------------------------------
include("$dirRoot"."libs1/calcular-pedido.php");
//include("$dirRoot"."libs1/calcula-pagos-cliente.php");

// Forma de Pago Data ----------------------------------------
if(!isset($formapagoData))
{ include("$dirRoot"."bots/FormadePagoID.php"); }
if(isset($formapagoData))
{
 $foto_formapago=$formapagoData['foto_formapago'];
 $nom_formapago=$formapagoData['nom_formapago'];
 $cod_alicuota=$formapagoData['cod_alicuota'];
}

$valor_alicuota=0;
if(isset($cod_alicuota) and $cod_alicuota<>"")
{
// include("$dirRoot"."datafiles/alicuota-find.php");
 //include("$dirRoot"."libs1/calcular-alicouta.php");
}

// Segment -------------------------
$segmentTitle="Forma de Pago: <strong>$nom_formapago</strong>";
if(!empty($foto_formapago))
{
 $segmentData="<div class='ui equal width grid'>
  <div class='row'>
   <div class='column'>
    <h2>MONTO PAGAR</h2>
    <div class='ui divider'></div>
     <form action='cerrar-cesta3.php?id_cuenta=$id_cuenta&id_formapago=$id_formapago&sistema=$sistema' method='POST' id='submitform'>
    <div class='ui labeled input'>
     <a class='ui label'>Total: ". number_format($totalDebePagar1, 2, '.', '')."</a>
      <input type='text' name='montopago' placeholder='indica monto'>
    </div>
    <div class='ui divider'></div>
      <input class='big ui blue button' type='submit' name='submit' value=' Enviar '>
      <input class='big ui button' type='reset' value=' Reset '>
     </form>
   </div>
   <div class='column'>
     <a href='formapago1.php?id_cuenta=$id_cuenta&sistema=$sistema'><img src='$dirRoot"."/imagenes/bancos/$foto_formapago'></a>
   </div>
  </div>
 </div>";
}
include("$dirRoot"."data/segment1.php");
// End Segment -----------------------


//include("formapago-list.php");
//$query="update cesta set enviado='S' where id_cuenta='$id_cuenta'";
//$result=mysqli_query($conex1,$query) or die ("Error in query: $query. " . mysqli_error());
//if($mobile=="S")
//{ echo "<p><br></p>"; }
?>
