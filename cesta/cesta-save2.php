<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  ver.php                                              //
// ****************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="N";
$icon="S";
$input="S";
$list="S";
$sidebar="N";
$table="N";
$message="N";
$popup="N";
$label="N";
$item="N";
$rating="N";
$aos="N";
$slick="S";
$swiper="N";
$autoPro="S";
$label="S";
$divider="S";
$table="S";
$topAdmin="N";
$dropdown="S";
$dirRoot="../";

include_once("../includes/config.ini.php");
?>
<style>
body {
  background: linear-gradient(0deg, #1d405c 0%, #f4f5f1 100%);
}
</style>

<div class="ui centered grid container">

<?php
FechayHora();
$todoBien="N";
$rand_num=rand();
$submitted="$dia/$mes/$ano";
$numsession=session_id();

if(isset($_SESSION['check']) and isset($_POST['captcha']))
{
 if($_SESSION['check']==$_POST['captcha'])
 {  $captcha="yes"; }
 else
 {  $captcha="No";
   $error="Error de Captcha";
   error();
   echo "<div class='ui negative centered message'>
     <div class='header'>$error</div> <p>Regresa y agrega los Datos</p>
   </div>";
   echo "<html><meta http-equiv=refresh content=3;url=cesta-checkout.php>";
   exit();
 }
}

if($captcha=="yes")
{
 if(isset($_POST['email_cliente']))
 { $email_cliente="$_POST[email_cliente]"; }
 if(isset($_POST['clave1']))
 { $clave1="$_POST[clave1]"; }
 if(!isset($email_cliente) or $email_cliente=="" and !isset($clave1) or $clave1=="")
 { echo "<html><meta http-equiv=refresh content=0;url=cesta-checkout.php>";
   exit();
 }
//--------------------
 if(isset($clave1) and $clave1<>"")
 {
  if($clave1=="1234" or $clave1=="12345" or $clave1=="123456" or $clave1=="1234567" or $clave1=="12345678")
  {
   echo "<h1 class='font-red'>Error de Clave</h1>";
   echo "<html><meta http-equiv=refresh content=3;url=cesta-checkout.php>";
   exit();
  }
 }
}
//--------------------
 $clave=md5($clave1);
 //$email_cliente2=substr("$email_cliente",0,20);
 //$email_cliente=$email_cliente2;
 //echo " $email_cliente / $clave / $clave1";
 //echo "<br>select id_cliente,cid_cliente,cod_cliente,nom_cliente,email_cliente from clientes where email_cliente='$email_cliente' and cod_cliente='$clave' and activo='S'";
 $numCliente1=0;
 $numCliente2=0;
 $numCliente3=0;
 $numCliente4=0;
 if(!isset($tel2_cliente))
 { $tel2_cliente=""; }
//echo "<br>select id_cliente,cid_cliente,cod_cliente,nom_cliente,tel2_cliente,email_cliente from clientes where cod_cliente='$clave' and email_cliente='$email_cliente' and activo='S'";
 $sqlUser=mysqli_query($conex1,"select id_cliente,cid_cliente,cod_cliente,nom_cliente,tel2_cliente,email_cliente from clientes where cod_cliente='$clave' and email_cliente='$email_cliente' and activo='S'");
 $numCliente1=mysqli_num_rows($sqlUser);
 if($numCliente1==0)
 {
//echo "<br>select id_cliente,cid_cliente,cod_cliente,nom_cliente,tel2_cliente,email_cliente from pedido_cliente where cod_cliente='$clave' and email_cliente='$email_cliente' and activo='S'";
  $sqlUser=mysqli_query($conex1,"select id_cliente,cid_cliente,cod_cliente,nom_cliente,tel2_cliente,email_cliente from pedido_cliente where cod_cliente='$clave' and email_cliente='$email_cliente' and activo='S'");
  $numCliente2=mysqli_num_rows($sqlUser);
  if($numCliente2==0)
  {
//echo "<br>select * from usuarios where clave='$clave' and usuariol='$email_cliente' and activo='S'";
   $sqlUser=mysqli_query($conex1,"select * from usuarios where clave='$clave' and usuario='$email_cliente' or email='$email_cliente' and activo='S'");
   $numCliente3=mysqli_num_rows($sqlUser);
   if($numCliente3==0)
   {
     $sqlUser=mysqli_query($conex1,"select id_cliente,cid_cliente,cod_cliente,nom_cliente,tel2_cliente,email_cliente from clientes where cod_cliente='$clave' and cid_cliente='$email_cliente' and activo='S'");
     $numCliente4=mysqli_num_rows($sqlUser);
   }
   if($numCliente4==0)
   {
    $error="Error en los Datos o el Cliente no Existe";
    error();
    echo "<html><meta http-equiv=refresh content=3;url=cesta-checkout.php>";
    exit();
   }
  }
 }

 $clienteData=mysqli_fetch_array($sqlUser);
 //echo print_r($clienteData;

 if(isset($clienteData))
 {
   if($numCliente3>0)
   {
    $id_cliente=$clienteData['iduser'];
    $email_cliente=$clienteData['email'];
    //$cod_cliente=$clienteData['clave'];
    $nom_cliente=$clienteData['nombre']." ".$clienteData['apellido'];
    $email_cliente2=$clienteData['email'];
    $telefono=$clienteData['celular'];
   }
   else
   {
    $id_cliente=$clienteData['id_cliente'];
    $cod_cliente=$clienteData['cod_cliente'];
    $nom_cliente=$clienteData['nom_cliente'];
    $email_cliente=$clienteData['email_cliente'];
    $email_cliente2=$clienteData['email_cliente'];
    $telefono=$clienteData['tel2_cliente'];
   }
   $time=time();
   $num_filas=0;
   //  $query="select * from useronline where email_cliente='$email_cliente2'";
   //  $sql2=mysqli_query($conex1,$query);
   //  $num_filas=mysqli_num_rows($sql2);
   if($num_filas==0)
   {
     //  $query="insert into useronline(email_cliente, time)
     //  values('$email_cliente2','$time')";
     //  $result=mysqli_query($conex1,$query);
   }
   //echo "<html><meta http-equiv=refresh content=0;url=./users/usersection.php>";
   //exit();
   if(isset($_SESSION['message']))
   {
?>
      <div class="alert alert-info text-center">
         <?php
            if(isset($_SESSION['message']))
            { echo $_SESSION['message']; }
         ?>
      </div>
<?php
     if(isset($_SESSION['message']))
     { unset($_SESSION['message']); }
   }
?>
   <div class="row">
    <div class="sixteen wide column">
      <div class="ui horizontal segments">
       <div class="ui segment  center aligned">
         <p>Cuenta de: <?php echo $nom_cliente; ?></p>
       </div>
       <div class="ui segment  center aligned">
         <p>Email: <?php echo $email_cliente; ?></p>
       </div>
       <div class="ui segment  center aligned">
         <p>Telf: <?php echo $telefono; ?></p>
       </div>
      </div>
    </div>
   </div>
<?php
         $numFilas=0;
         $sqlCestaExit=mysqli_query($conex1,"select idcart from pedironline1 where numsession='$numsession' and usuario='$email_cliente' ");
         $numFilas=mysqli_num_rows($sqlCestaExit);
         if($numFilas==0)
         {
           $query1="insert into pedironline1(numsession, usuario, hora, submitted, rand_num)
           values('$numsession', '$email_cliente', '$hora', '$submitted', '$rand_num')";
          // echo "<br>$query1<br>";
           $result1=mysqli_query($conex1,$query1);
         }
         $idcart="";
         $sqlCestaExit=mysqli_query($conex1,"select idcart from pedironline1 where numsession='$numsession' and usuario='$email_cliente'");
         $numFilas=mysqli_num_rows($sqlCestaExit);
         if($numFilas>0)
         {
          $cartData=mysqli_fetch_array($sqlCestaExit);
          $idcart=$cartData['idcart'];
         }
?>

  <table class="ui fixed table">
    <thead>
       <th class="blue middle aligned center aligned">Image</th>
       <th class="blue">Producto</th>
       <th class="blue middle aligned center aligned">Precio</th>
       <th class="blue middle aligned center aligned">Cant.</th>
       <th class="blue middle aligned center aligned">SubTotal</th>
    </thead>

    <tbody>
      <?php
       $TtotalD=0;
       if (isset($_SESSION['pedido'])) :
        $i = 1;
        foreach ($_SESSION['pedido'] as $pedido) :
         $sqlPro = "SELECT id_producto,nom_producto,precio1_producto,precio2_producto,precio3_producto,foto_producto FROM productos WHERE id_producto='{$pedido['id']}'";
         $queryPro = $conex1->query($sqlPro);
         $proData = $queryPro->fetch_assoc();
         $id_producto=$proData['id_producto'];
         $nom_producto=$proData['nom_producto'];
         $precio1_producto=$proData['precio1_producto'];
         $precio2_producto=$proData['precio2_producto'];
         $totalBs=$pedido['cantidad']*$precio2_producto;
         $totalD=$pedido['cantidad']*$precio2_producto;
         //$Ttotal1=$Ttotal1+$totalBs;;
         //$TtotalD=$TtotalD+$totalD;
         $foto_producto = $proData['foto_producto'];
         if($foto_producto=="")
         { $foto_producto="sinfoto.png"; }
      ?>
         <tr>
           <td class='middle aligned center aligned'>
                <?php
               echo "<a href='ver-foto.php?idpro=$id_producto'>
                <img class='ui centered rounded image' src='../imagenes/productos/$foto_producto'>
               </a>";
             ?>
           </td>
           <td><?php echo $nom_producto; ?></td>
           <td class="middle aligned center aligned">
            <div class="absolute middle center">
             <?php echo number_format($precio2_producto, 2); ?>
            </div>
           </td>
           <td class="middle aligned center aligned">
            <form action="cesta-update.php" method="post">
             <div class="field border round small text-center">
              <?php echo $pedido['cantidad']; ?>
             </div>
             <input type="hidden" name="upid" value="<?php echo $pedido['id']; ?>">
           </td>
           <td class="middle aligned center aligned">
            <div class="absolute middle center">
             <?php echo number_format($totalD, 2); ?>
            </div>
           </td>
         </tr>
      <?php
         $i++;
         //$Ttotal1=$Ttotal1+$totalBs;;
         $TtotalD=$TtotalD+$totalD;

        endforeach;
      endif;

      ?>
    </tbody>
  </table>



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
  echo "<html><meta http-equiv=refresh content=5;url=../index.php>";
}
// session_start();
if(isset($_POST['save']))
{
   foreach($_POST['indexes'] as $key){
         $_SESSION['cantidad'][$key] = $_POST['qty_'.$key];
   }
   $_SESSION['message'] = 'Cart updated successfully';
   header('location: ver.php');
}
?>

</div>

<?php
if(empty($id_cliente) and empty($email_cliente) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=cesta-checkout.php>";
  exit();
}
include("$dirRoot"."includes/statusAdmin.php");
?>
