<?php
$mobile="N";
$tableUse="cuentas1";
if(isset($idPago) and $idPago<>"")
{ $id_formapago=$idPago; }
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

FechayHora();
$submitted="$dia/$mes/$ano";

if(!isset($id_banco1))
{ $id_banco1=""; }
if(!isset($cod_banco1))
{ $cod_banco1=""; }
if(!isset($nom_banco1))
{ $nom_banco1=""; }
if(!isset($nc_banco1))
{ $nc_banco1=""; }

if(!isset($id_banco2))
{ $id_banco2=""; }
if(!isset($cod_banco2))
{ $cod_banco2=""; }
if(!isset($nom_banco2))
{ $nom_banco2=""; }
if(!isset($nc_banco2))
{ $nc_banco2=""; }
if(!isset($num_ref))
{ $num_ref=""; }
if(!isset($dia1))
{ $dia1=""; }
if(!isset($mes1))
{ $mes1=""; }
if(!isset($ano1))
{ $ano1=""; }

if(!isset($cod_banco))
{ $cod_banco=""; }
if(!isset($cod_moneda))
{ $cod_moneda=""; }
if(!isset($moneda_monto))
{ $moneda_monto=0; }
if(!isset($precio_moneda))
{ $precio_moneda=0; }
if(!isset($cid_cliente)or $cid_cliente=="")
{ $cid_cliente=$mesaData['cid_cliente']; }
if(!isset($valor_igtf))
{ $valor_igtf=0; }
if(!isset($impuesto_igtf))
{ $impuesto_igtf=0; }
//$rand_num=rand();


if(!isset($submitted))
{ $submitted=""; }
 if(isset($fecha))
 { $dia1=substr($fecha, 0, 2);
   $mes1=substr($fecha, 3, 2);
   $ano1=substr($fecha, 6, 6);
 }

if(isset($formapagoData))
{
 $tipo_formapago=$formapagoData['tipo_formapago'];
 if($tipo_formapago=="CxC" or $tipo_formapago=="CXC")
 {
   $sqlM=mysqli_query($conex1, "select cid_cliente,rand_num from cuentas1 where id_cuenta='$id_cuenta'");
   $cuentaData=mysqli_fetch_array($sqlM);
   mysqli_free_result($sqlM);
   if($cuentaData['cid_cliente']<>"")
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

if($tipo_formapago=="CxC" and $saldoDebePagarBs==$cuentaData['monto_apagar'])
{
 $id_banco="";
 $cid_cliente=$cuentaData['cid_cliente'];
// echo "<html><meta http-equiv=refresh content=0;url=formapago4.php?id_cuenta=$id_cuenta&id_formapago=$id_formapago&montopago={$cuentaData['monto_apagar']}&cid_cliente=$cid_cliente&id_banco=$id_banco&sistema=$sistema&areaMesas=$areaMesas&op=propina>";
 exit();
}

if(!isset($cuentaData))
{
 $sql="select cid_cliente, descuento, total_venta2, valor_igtf, impuesto_igtf, monto_apagar, nota_venta,rand_num from cuentas1 where id_cuenta='$id_cuenta'";
 $sqlM=mysqli_query($conex1, $sql);
 $cuentaData=mysqli_fetch_array($sqlM);
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

exit();
$valor_alicuota=0;
if(isset($cod_alicuota) and $cod_alicuota<>"")
{
// include("$dirRoot"."datafiles/alicuota-find.php");
 //include("$dirRoot"."libs1/calcular-alicouta.php");
}
$id_banco="";
$deposito="";
$sqlInsert="insert into pagoscliente(id_cuenta, cid_cliente, id_formapago, tipo_formapago, montopago,rand_num)
values('$id_cuenta', '$cid_cliente', '$id_formapago', '$tipo_formapago', '$montopago', '$rand_num')";
$result=mysqli_query($conex1,$sqlInsert);

$numFilas=0;
$sqlFPago=mysqli_query($conex1, "select id from pagoscliente where id_cuenta='$id_cuenta' and montopago='$montopago'");
$numFilas=mysqli_num_rows($sqlFPago);
if($numFilas>0)
{
 $update1="update cuentas1 set monto_apagar='$montopago' where id_cuenta='$id_cuenta'";
 $result1=mysqli_query($conex1,$update1);
}
echo "<html><meta http-equiv=refresh content=0;url=cerrar-cesta4.php?id_cuenta=$id_cuenta&sistema=$sistema>";

?>
