<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  clientes-nuevo2.php                                                     //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$dirRoot="../";
$topAdmin="N";
$topFile="N";
include_once("$dirRoot"."libs1/config-db.php");
include_once("$dirRoot"."libs1/libUsers.php");
include_once("$dirRoot"."libs1/libGeneral.php");
//include_once("../includes/headfileFrame.php");
include_once("../libs1/loader.php");


if(isset($_POST['cid_cliente']))
{ $cid_cliente="$_POST[cid_cliente]"; }
if(isset($_POST['clave']))
{ $clave="$_POST[clave]"; }
if(isset($_POST['nom_cliente']))
{ $nom_cliente="$_POST[nom_cliente]"; }
if(isset($_POST['dir1_cliente']))
{ $dir1_cliente="$_POST[dir1_cliente]"; }
if(isset($_POST['dir2_cliente']))
{ $dir2_cliente="$_POST[dir2_cliente]"; }
if(isset($_POST['ciudad_cliente']))
{ $ciudad_cliente="$_POST[ciudad_cliente]"; }
if(isset($_POST['estado_cliente']))
{ $estado_cliente="$_POST[estado_cliente]"; }

if(isset($_POST['tel1_cliente']))
{ $tel1_cliente="$_POST[tel1_cliente]"; }
if(isset($_POST['tel2_cliente']))
{ $tel2_cliente="$_POST[tel2_cliente]"; }
if(isset($_POST['email_cliente']))
{ $email_cliente="$_POST[email_cliente]"; }
if(isset($_POST['tipo_cliente']))
{ $tipo_cliente="$_POST[tipo_cliente]"; }
if(isset($_POST['nivelprecio']))
{ $nivelprecio="$_POST[nivelprecio]"; }
if(isset($_POST['nota_cliente']))
{ $nota_cliente="$_POST[nota_cliente]"; }
$lista_correo="N";
if(isset($_POST['lista_correo']))
{ $lista_correo="$_POST[lista_correo]";
  if($lista_correo=="on")
  { $lista_correo="S"; }
}
$ip_cliente=$_SERVER["REMOTE_ADDR"];
$numsession=session_id();
$num=0;
$todoBien="N";
$rand_num=rand();

//------------------------------------------
$tchas1=strlen($clave);
if(empty($clave) or $tchas1 <= 5)
{
   $error="la clave no es mayor a 6 caracteres";
   error();
   exit();
}

//------------------------------------------
$tchas1=strlen($cid_cliente);
$tchas2=strlen($nom_cliente);
if(empty($cid_cliente) or empty($nom_cliente) or $tchas1 <= 5 or $tchas2 <= 5)
{
   $error="falta algunos datos";
   error();
   exit();
}
else
{
  $num_filas=0;
  $result=mysqli_query($conex1,"select id_cliente from  pedido_cliente where cid_cliente='$cid_cliente'");
  $num_filas=mysqli_num_rows($result);
  if($num_filas>0)
  {
    $error="esta cliente ya fue publicado";
    echo "<br>$error";
    $todoBien="S";
  }
  else
  {
    $cid_cliente=trim($cid_cliente);
    $nom_cliente=ucwords($nom_cliente);
    if(!empty($empresa))
    { $empresa=ucwords($empresa); }
    if(!isset($dir1_cliente))
    { $dir1_cliente=""; }
    if(!isset($dir2_cliente))
    { $dir2_cliente=""; }

    if(!isset($ciudad_cliente))
    { $ciudad_cliente=""; }
    if(!isset($estado_cliente))
    { $estado_cliente=""; }

    if(!empty($dir1_cliente))
    { $dir1_cliente=ucwords($dir1_cliente); }
    if(!empty($dir2_cliente))
    { $dir2_cliente=ucwords($dir2_cliente); }


    $textoremove=$nom_cliente;
    include("$dirRoot"."bots/Remove_Simbols.php");
    $nom_cliente=ucwords($textoremove);
    $textoremove=$dir1_cliente;
    include("$dirRoot"."bots/Remove_Simbols.php");
    $dir1_cliente=ucwords($textoremove);
    if(!isset($cid_cliente) or $cid_cliente=="")
    {
     $cid_cliente=crypt($cid_cliente);
     // $pin_cliente=crypt($cid_cliente);
    }
    if(!isset($tipo_cliente))
    { $tipo_cliente="DET"; }
    $clave=md5($clave);
    $query2="insert into pedido_cliente(cid_cliente, cod_cliente, nom_cliente,  dir1_cliente, dir2_cliente, ciudad_cliente, estado_cliente, tel1_cliente, tel2_cliente,  email_cliente, tipo_cliente, nota_cliente,  lista_correo,  ip_cliente, activo)
    values('$cid_cliente', '$clave', '$nom_cliente', '$dir1_cliente', '$dir2_cliente', '$ciudad_cliente', '$estado_cliente', '$tel1_cliente', '$tel2_cliente',  '$email_cliente', '$tipo_cliente', '$nota_cliente', '$lista_correo', '$ip_cliente','S')";
    $result2=mysqli_query($conex1,$query2);
  }

  if($todoBien=="N" and $cid_cliente<>"")
  {
   $num_filas=0;
   $sqlCliente=mysqli_query($conex1,"select * from pedido_cliente where cid_cliente='$cid_cliente' and email_cliente='$email_cliente'");
   $num_filas=mysqli_num_rows($sqlCliente);
   if($num_filas>0)
   { $todoBien="S"; }
  }
}

if($todoBien=="S" and $cid_cliente<>"")
{
  if($num_filas>0)
  {
    if(!isset($sqlCliente))
    {
     $sqlCliente=mysqli_query($conex1,"select * from pedido_cliente where cid_cliente='$cid_cliente' and email_cliente='$email_cliente'");
    }
    $clienteData=mysqli_fetch_array($sqlCliente);
    $_SESSION['id_cliente']=$clienteData['id_cliente'];
    $_SESSION['email_cliente']=$clienteData['email_cliente'];
    $_SESSION['cod_cliente']=$clienteData['cod_cliente'];
    $_SESSION['nom_cliente']=$clienteData['nom_cliente'];
    $email_cliente2=$clienteData['email_cliente'];
  }
  $time=time();
  $hora=date('H:i');
  $num_filas=0;
  $numFilas=0;
  FechayHora();
  $submitted="$dia/$mes/$ano";
  $sqlCestaExit=mysqli_query($conex1,"select idcart from pedironline1 where numsession='$numsession' and usuario='$email_cliente' ");
  $numFilas=mysqli_num_rows($sqlCestaExit);
  if($numFilas==0)
  {
    $query1="insert into pedironline1(numsession, usuario, hora, submitted, rand_num)
    values('$numsession', '$email_cliente', '$hora', '$submitted', '$rand_num')";
    $result1=mysqli_query($conex1,$query1);
  }
  //initialize total
  $num=0;
  $total = 0;
  if(!empty($_SESSION['pedido']))
  {

   //connection
   //create array of initail qty which is 1
   if(!isset($usuario))
   { $usuario=""; }

   $index = 0;
  // if (isset($_SESSION['pedido'])) :
    $i = 1;
    foreach ($_SESSION['pedido'] as $pedido) :
     $sqlPro = "SELECT id_producto,nom_producto,precio1_producto,precio2_producto,precio3_producto,foto_producto FROM productos WHERE id_producto='{$pedido['id']}'";
     $queryPro = $conex1->query($sqlPro);
     $itemData = $queryPro->fetch_assoc();

     $idcart=$pedido['id'];
     $cantidad=$pedido['cantidad'];

     $id_producto=$itemData['id_producto'];
     $nom_producto=$itemData['nom_producto'];
     $precio1_producto=$itemData['precio1_producto'];
     $precio2_producto=$itemData['precio2_producto'];
     $precio3_producto=$itemData['precio3_producto'];
     $precio_dolar=$precio2_producto;

     if(!isset($empaque))
     { $empaque=""; }
     if(!isset($nota_extra))
     { $nota_extra=""; }
     $totalBs=$pedido['cantidad']*$precio2_producto;
     $totalD=$pedido['cantidad']*$precio2_producto;
     //$Ttotal1=$Ttotal1+$totalBs;;
     //$TtotalD=$TtotalD+$totalD;
     $foto_producto = $itemData['foto_producto'];
     if($foto_producto=="")
     { $foto_producto="sinfoto.png"; }
     $i++;
     //$Ttotal1=$Ttotal1+$totalBs;;
     //$TtotalD=$TtotalD+$totalD;

     $numFilas=0;
     $sqlCesta2Exit=mysqli_query($conex1,"select idcart from pedironline2 where numsession='$numsession' and id_producto='$id_producto'");
     $numFilas=mysqli_num_rows($sqlCesta2Exit);
     if($numFilas==0)
     {
      $insertPO="insert into pedironline2(idcart, numsession, usuario, id_producto, cantidad,  empaque, precio,  nota_extra, hora, submitted, rand_num)
      values('$idcart', '$numsession', '$usuario','$id_producto','$cantidad','$empaque','$precio2_producto', '$nota_extra', '$hora', '$submitted','$rand_num')";
      $result3=mysqli_query($conex1,$insertPO);
      $num++;
     }
    endforeach;


  }
  else
  {
?>
    <tr>
     <td colspan="5" class="center aligned">Carrito Vacio</td>
    </tr>
<?php
  }
?>
   <tr class='ui blue'>
    <td colspan="3" align="right aligned"><b>Total</b></td>
    <td class='center aligned'><b><?php echo number_format($total, 2); ?></b></td>
    <td></td>
   </tr>
 </tbody>
</table>
<?php

}
if($num>0)
{
?>
    <div class="ui icon message">
      <i class="notched circle loading icon"></i>
      <div class="content">
        <div class="header">
          <h1 class='font-red'>Gracias por su Compra</h1>
          Los Datos Fueron Agregaros a la Cesta. Esta Seccion se Cierra en 3s.
        </div>
        <p>Pronto nuestro personal va a contactarlo.</p>
      </div>
    </div>
<?php
 session_destroy();
 echo "<html><meta http-equiv=refresh content=4;url=../index.php>";
}
?>
