<?php
// ******************************************************** 2006 - 2018 ***
// Sistema Dist868                 //
// Copyright (c) 2006 NovenoBIT.com                                      //
// ************************************************************************
include("./includes/headfile.php");
include("./libs1/dataBase/config-db.php");
//include("./includes/language.php");
include("./includes/topfile.php");
?>

<main class="responsive center-align">
 <nav class="scroll">
  <button class="circle small pink8"><i>done</i></button>
  <div class="max divider"></div>
  <button class="circle small pink8"><i>done</i></button>
  <div class="max divider"></div>
  <button class="circle small pink8"><i>done</i></button>
 </nav>
</main>

<?php
//include_once("./libs1/loader.php");
if(isset($_POST['tipoCliente']))
{ $tipoCliente="$_POST[tipoCliente]"; }
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
if(isset($_POST['nota_pedido']))
{ $nota_pedido="$_POST[nota_pedido]"; }

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
$id_cuenta=$rand_num;
$enviado="";

if(!isset($clave))
{ $clave=""; }
if(!isset($cod_cliente))
{ $cod_cliente=""; }
if(!isset($cid_cliente))
{ $cid_cliente=""; }
if(!isset($dir1_cliente))
{ $dir1_cliente=""; }
if(!isset($dir2_cliente))
{ $dir2_cliente=""; }
if(!isset($ciudad_cliente))
{ $ciudad_cliente=""; }
if(!isset($estado_cliente))
{ $estado_cliente=""; }
if(!isset($email_cliente))
{ $email_cliente=""; }
if(!isset($nota_cliente))
{ $nota_cliente=""; }
if(!isset($idzona_envio))
{ $idzona_envio=""; }
if(!isset($zona_precio))
{ $zona_precio=0; }
if(!isset($nota_extra))
{ $nota_extra=""; }
if(!isset($tel1_cliente))
{ $tel1_cliente=""; }
if(!isset($tel2_cliente))
{ $tel2_cliente=""; }
if(!isset($nota_pedido))
{ $nota_pedido=""; }

$num=0;
$Ttotal1=0;
$TtotalD=0;
$clientExit="N";

//------------------------------------------

if(empty($tel1_cliente) and empty($tel2_cliente))
{
    $error="falta los datos de telefono local o mobil";
     error();
     exit();
}

if(empty($tel2_cliente))
{
    $error="falta numero telefono celular";
//    error();
//    exit();
}

if(isset($tel1_cliente) and $tel1_cliente<>"")
{ $tel1Lenght=strlen($tel1_cliente);
 if($tel1Lenght <= 5)
 {
    $error="falta algunos datos";
    error();
    exit();
 }
}
if(isset($tel2_cliente) and $tel2_cliente<>"")
{ $tel2Lenght=strlen($tel2_cliente);
  if($tel2Lenght <= 5)
  {
    $error="falta algunos datos";
    error();
    exit();
  }
}

$textoremove=$nom_cliente;
include("./bots/Remove_Simbols.php");
$nom_cliente=$textoremove;

$cid_cliente=trim($cid_cliente);
$textoremove=$cid_cliente;
include("./bots/Remove_Simbols.php");
$cid_cliente=$textoremove;

$tel2_cliente=trim($tel2_cliente);
$textoremove=$tel2_cliente;
include("./bots/Remove_Simbols.php");
$tel2_cliente=$textoremove;

if(isset($tel2_cliente) and $tel2_cliente<>"" or isset($cid_cliente) and $cid_cliente<>"")
{
 $num_filas=0;
 if($tel2_cliente<>"")
 { $sqlCliente=mysqli_query($conex1,"select id_cliente,cid_cliente,tel2_cliente from pedir_clientes where cid_cliente='$cid_cliente' and  tel2_cliente='$tel2_cliente'"); }
 if($tel2_cliente=="" and $tel1_cliente<>"")
 { $sqlCliente=mysqli_query($conex1,"select id_cliente,cid_cliente,tel2_cliente from pedir_clientes where cid_cliente='$cid_cliente' and  tel1_cliente='$tel1_cliente'"); }
 if($tel2_cliente=="" and $tel1_cliente=="")
 { $sqlCliente=mysqli_query($conex1,"select id_cliente,cid_cliente,tel2_cliente from pedir_clientes where cid_cliente='$cid_cliente'"); }
 if(isset($sqlCliente))
 {
  $num_filas=mysqli_num_rows($sqlCliente);
  if($num_filas>0)
  { $todoBien="S";
    $clientExit="S";
  }
 }
}

// --------------------------------------------------

if($todoBien=="N" and $clientExit=="N")
{
 if(isset($cid_cliente) and $cid_cliente<>"")
 { $tchas1=strlen($cid_cliente); }
 if(isset($nom_cliente) and $nom_cliente<>"")
 { $tchas2=strlen($nom_cliente); }

 if(empty($cid_cliente) or empty($nom_cliente) or $tchas1 <= 5 or $tchas2 <= 5)
 {
    $error="falta algunos datos";
    error();
    exit();
 }
 else
 {
  $num_filas=0;

   if(isset($tel1_cliente) and $tel1_cliente<>"")
   { $result=mysqli_query($conex1,"select id_cliente from pedir_clientes where cid_cliente='$cid_cliente' and tel1_cliente='$tel1_cliente'"); }
   if(isset($tel2_cliente) and $tel2_cliente<>"")
   { $result=mysqli_query($conex1,"select id_cliente from pedir_clientes where cid_cliente='$cid_cliente' and tel2_cliente='$tel2_cliente'"); }
  $num_filas=mysqli_num_rows($result);
  if($num_filas>0)
  {
    echo "Gracias por Regresar";
    // echo "<br>$mensaje";
    $todoBien="S";
    $clientExit="S";
  }
  else
  {
    //$cid_cliente=trim($cid_cliente);
    $nom_cliente=ucwords($nom_cliente);
    if(!empty($empresa))
    { $empresa=ucwords($empresa); }
    if(!empty($dir1_cliente))
    { $dir1_cliente=ucwords($dir1_cliente); }
    if(!empty($dir2_cliente))
    { $dir2_cliente=ucwords($dir2_cliente); }
    $textoremove=$nom_cliente;
    include("./bots/Remove_Simbols.php");
    $nom_cliente=ucwords($textoremove);
    $textoremove=$dir1_cliente;
    include("./bots/Remove_Simbols.php");
    $dir1_cliente=ucwords($textoremove);
    if(!isset($cid_cliente) or $cid_cliente=="")
    {
     $cid_cliente=crypt($cid_cliente);
     // $pin_cliente=crypt($cid_cliente);
    }
    if(!isset($tipo_cliente))
    { $tipo_cliente="DET"; }
    if(isset($clave) and $clave<>"")
    { $clave=md5($clave); }
    $activo="S";

    if(isset($tipoCliente) and $tipoCliente<>"")
    {
      $firstLetter=substr($cid_cliente,0,1);
      if(is_numeric($firstLetter))
      {
       $cid_cliente="$tipoCliente$cid_cliente";
      }
    }
   //if(isset($tel1_cliente) and $tel1_cliente<>"")
   //{ echo "<br>select id_cliente from pedir_clientes where cid_cliente='$cid_cliente' or tel1_cliente='$tel1_cliente'"; }
   //if(isset($tel2_cliente) and $tel2_cliente<>"")
   //{ echo "<br>select id_cliente from pedir_clientes where cid_cliente='$cid_cliente' or tel2_cliente='$tel2_cliente'"; }
   $numFilas=0;

   //if(isset($tel1_cliente) and $tel1_cliente<>"")
   //{ echo "<br>select id_cliente from pedir_clientes where cid_cliente='$cid_cliente' and tel1_cliente='$tel1_cliente'"; }
   //if(isset($tel2_cliente) and $tel2_cliente<>"")
   //{ echo "<br>select id_cliente from pedir_clientes where cid_cliente='$cid_cliente' and tel2_cliente='$tel2_cliente'"; }

   if(isset($tel1_cliente) and $tel1_cliente<>"")
   { $sql=mysqli_query($conex1, "select id_cliente from pedir_clientes where cid_cliente='$cid_cliente' and tel1_cliente='$tel1_cliente'"); }
   if(isset($tel2_cliente) and $tel2_cliente<>"")
   { $sql=mysqli_query($conex1, "select id_cliente from pedir_clientes where cid_cliente='$cid_cliente' and tel2_cliente='$tel2_cliente'"); }
   $numFilas=mysqli_num_rows($sql);
   if($numFilas==0)
   {
    $query2="insert into pedir_clientes(cod_cliente,cid_cliente,nom_cliente,tel1_cliente,tel2_cliente,email_cliente,dir1_cliente,nota_cliente,ip_cliente,idzona_envio,zona_precio,lista_correo, activo)
    values('$cod_cliente', '$cid_cliente', '$nom_cliente', '$tel1_cliente', '$tel2_cliente', '$email_cliente', '$dir1_cliente', '$nota_cliente', '$ip_cliente', '$idzona_envio', '$zona_precio', '$lista_correo', '$activo')";
// echo "<br>$query2";
    $result2=mysqli_query($conex1,$query2);
   }
   else
   { $todoBien="S"; }
  }
  if($cid_cliente<>"")
  {
   $num_filas=0;
   //$sqlCliente=mysqli_query($conex1,"select id_cliente from  pedir_clientes where cid_cliente='$cid_cliente' or tel1_cliente='$tel1_cliente' or  tel2_cliente='$tel2_cliente'");
   if(isset($tel1_cliente) and $tel1_cliente<>"")
   { $sqlCliente=mysqli_query($conex1, "select id_cliente from pedir_clientes where cid_cliente='$cid_cliente' and tel1_cliente='$tel1_cliente'"); }
   if(isset($tel2_cliente) and $tel2_cliente<>"")
   { $sqlCliente=mysqli_query($conex1, "select id_cliente from pedir_clientes where cid_cliente='$cid_cliente' and tel2_cliente='$tel2_cliente'"); }
   $num_filas=mysqli_num_rows($sqlCliente);
   if($num_filas>0)
   { $todoBien="S";
     $clientExit="S";
   }
  }
 }
}

if($todoBien=="S" and $clientExit=="S")
{
  if($num_filas>0)
  {
    $sqlCliente=mysqli_query($conex1,"select * from  pedir_clientes where cid_cliente='$cid_cliente' or tel1_cliente='$tel1_cliente' or  tel2_cliente='$tel2_cliente'");
    $clienteData=mysqli_fetch_array($sqlCliente);
    $_SESSION['id_cliente']=$clienteData['id_cliente'];
    $_SESSION['email_cliente']=$clienteData['email_cliente'];
    $_SESSION['tel2_cliente']=$clienteData['tel2_cliente'];
    $_SESSION['cod_cliente']=$clienteData['cod_cliente'];
    $_SESSION['nom_cliente']=$clienteData['nom_cliente'];
    $email_cliente2=$clienteData['email_cliente'];
    $tel2_cliente=$clienteData['tel2_cliente'];
  }
  $time=time();

  $num_filas=0;
  $numFilas=0;
  FechayHora();

  $hora=substr(date('H:i'),0,5);

  $fecha="$dia/$mes/$ano";
  $submitted="$dia/$mes/$ano";
  if(!isset($cerrarcuenta))
  { $cerrarcuenta="N"; }
  if(!isset($envia_retira))
  { $envia_retira=""; }
  if(!isset($hora_retira))
  { $hora_retira=""; }
  if(!isset($nota_pedido))
  { $nota_pedido=""; }

  $hora_abierta="$hoyhora";
  $fecha="$hoydia";
  $hora_cerrar="";

  $sqlCestaExit=mysqli_query($conex1,"select idcart from pedir_online1 where id_cuenta='$numsession' and cid_cliente='$cid_cliente'");
  $numFilas=mysqli_num_rows($sqlCestaExit);
  if($numFilas==0)
  {
    // echo "<br> $cid_cliente<br> $email_cliente<br> $ip_cliente<br> $fecha<br> $nota_cliente<br> $cerrarcuenta<br> $envia_retira<br> $hora_retira<br> $rand_num<br> $numsession";
    $query1="insert into pedir_online1 (id_cuenta,cid_cliente, email_cliente, ip_cliente, fecha, nota_pedido, cerrarcuenta, envia_retira, hora_retira, hora_abierta, hora_cerrar, rand_num, numsession, activo)
    values('$id_cuenta','$cid_cliente', '$email_cliente', '$ip_cliente', '$fecha', '$nota_pedido', '$cerrarcuenta', '$envia_retira', '$hora_retira', '$hora_abierta', '$hora_cerrar', '$rand_num', '$numsession', 'S')";
    //  echo "<br>$query1";
    $result1=mysqli_query($conex1,$query1);
  }
  else
  { $num=1; }
  //initialize total
  $num=0;
  $total = 0;
  if (isset($_SESSION['pedido'])) :
    $i = 1;
    foreach ($_SESSION['pedido'] as $pedido) :
     $sqlPro = "SELECT id_item,nom_item,precio1_item,precio2_item,precio3_item,precio_dolar,foto_item FROM items WHERE id_item='{$pedido['id']}'";
     $queryPro = $conex1->query($sqlPro);
     $itemData = $queryPro->fetch_assoc();
     $id_item=$itemData['id_item'];
     $nom_item=$itemData['nom_item'];
     $precio1_item=$itemData['precio1_item'];
     $precio_dolar=$itemData['precio_dolar'];
     $totalBs=$pedido['cantidad']*$precio1_item;
     $totalD=$pedido['cantidad']*$precio_dolar;
     $Ttotal1=$Ttotal1+$totalBs;;
     $TtotalD=$TtotalD+$totalD;
     $foto_item = $itemData['foto_item'];
     if($foto_item=="")
     { $foto_item="sinfoto.png"; }
     $numFilas=0;
     $sqlCesta2Exit=mysqli_query($conex1,"select idcesta from pedir_online2 where numsession='$numsession' and id_item='$id_item'");
     $numFilas=mysqli_num_rows($sqlCesta2Exit);
     if($numFilas==0)
     {
       if(!isset($cantidad) or $cantidad=="")
       { $cantidad=1;  }
       // echo "<br> $id_cuenta<br> $id_cliente<br> $email_cliente<br> $id_item<br> $cantidad<br> $precio1_item<br> $nota_extra<br> $hora<br> $enviado<br> $submitted<br> $rand_num<br> $numsession";
       $query2="insert into pedir_online2(id_cuenta, cid_cliente, email_cliente, id_item, cantidad, precio1_item, nota_extra, hora, enviado, submitted, rand_num, numsession, activo)
       values('$id_cuenta', '$cid_cliente', '$email_cliente', '$id_item', '$cantidad', '$precio1_item', '$nota_extra', '$hora', '$enviado', '$submitted', '$rand_num', '$numsession', 'S')";
       //   echo "<br>$query2";
       $result2=mysqli_query($conex1,$query2);
       $num++;
     }
     $i++;
    endforeach;
   endif;
}
if($num>0)
{
?>
<main class="responsive">
 <div class="large-space"></div>
 <img class="responsive medium round" src="./images/banners/sushisashimi-taiko-carta2.jpg">
 <article class="no-padding primary-container  center-align">
  <div class="grid no-space s">
   <div class="padding s12">
    <div class="padding">
       <h2 class="center-align"><?php echo $thanks4Buying; ?></h2>
       <h4><?php echo $thanks4Buying2; ?></h4>
       <h6 class='font-red center-align'><?php echo $soonAnswer; ?></h6>
       <p class="font-16 center-align"><?php echo $shopCartAdded; ?></p>
       <p class="font-14 center-align">Esta Seccion se Cierra en unos segundos.</p>
    </div>
   </div>
  </div>

  <div class="grid no-space m l">
   <div class="padding s12 m6 l6">
     <img class="responsive" src="./images/people/gracias.jpg" alt='Gracias'>
   </div>
   <div class="padding s12 m6 l6">
    <div class="padding">
       <h2 class="center-align"><?php echo $thanks4Buying; ?></h2>
       <h4><?php echo $thanks4Buying2; ?></h4>
       <h6 class='font-red center-align'><?php echo $soonAnswer; ?></h6>
       <p class="font-16 center-align"><?php echo $shopCartAdded; ?></p>
       <p class="font-14 center-align">Esta Seccion se Cierra en unos segundos.</p>
    </div>
   </div>
  </div>
 </article>
 <div class="large-space"></div>
 <h6 class="center-align"><?php echo $openHours; ?></h6>
 <div class="large-space"></div>
</main>
<?php
 session_destroy();
 echo "<html><meta http-equiv=refresh content=26;url=./index.php?lan=$lan>";
}
?>
