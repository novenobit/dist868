<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  pedido-ver.php                                              //
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
   echo "<html><meta http-equiv=refresh content=3;url=pedido-save1.php>";
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
 { echo "<html><meta http-equiv=refresh content=0;url=pedido-save1.php>";
   exit();
 }
//--------------------
 if(isset($clave1) and $clave1<>"")
 {
  if($clave1=="1234" or $clave1=="12345" or $clave1=="123456" or $clave1=="1234567" or $clave1=="12345678")
  {
   echo "<h1 class='font-red'>Error de Clave</h1>";
   echo "<html><meta http-equiv=refresh content=3;url=pedido-save1.php>";
   exit();
  }
 }
}
//--------------------
 $clave=md5($clave1);
 //$email_cliente2=substr("$email_cliente",0,20);
 //$email_cliente=$email_cliente2;
 //echo " $email_cliente / $clave / $clave1";
// echo "<br>select id_cliente,email_cliente,clave,idnivel from email_clientes where email_cliente='$email_cliente' and clave='$clave' and activo='S'";
 $sqlUser=mysqli_query($conex1,"select id_cliente,cid_cliente,cod_cliente,nom_cliente,email_cliente from clientes where email_cliente='$email_cliente' and cod_cliente='$clave' and activo='S'");
 $numFilas=0;
 $numFilas=mysqli_num_rows($sqlUser);
 if($numFilas==0)
 {
  $error="Error en los Datos";
  error();
  exit();
 }
 $clienteData=mysqli_fetch_array($sqlUser);
 if(isset($clienteData))
 {
   $_SESSION['id_cliente']=$clienteData['id_cliente'];
   $_SESSION['email_cliente']=$clienteData['email_cliente'];
   $_SESSION['cod_cliente']=$clienteData['cod_cliente'];
   $_SESSION['nom_cliente']=$clienteData['nom_cliente'];
   $email_cliente2=$clienteData['email_cliente'];
   $time=time();
   $num_filas=0;
 //  $query="select * from useronline where email_cliente='$email_cliente2'";
 //  $sql2=mysqli_query($conex1,$query);
 //  $num_filas=mysqli_num_rows($sql2);
   if($num_filas==0)
   {
 //   $query="insert into useronline(email_cliente, time)
 //   values('$email_cliente2','$time')";
 //   $result=mysqli_query($conex1,$query);
   }
   //echo "<html><meta http-equiv=refresh content=0;url=./users/usersection.php>";
   //exit();

            if(isset($_SESSION['message'])){
            ?>
            <div class="alert alert-info text-center">
               <?php echo $_SESSION['message']; ?>
            </div>
            <?php
            unset($_SESSION['message']);
         }
         $numFilas=0;
         $sqlCestaExit=mysqli_query($conex1,"select idcart from cuentas1 where numsession='$numsession' and usuario='$email_cliente' ");
         $numFilas=mysqli_num_rows($sqlCestaExit);
         if($numFilas==0)
         {
             $query1="insert into pedido1(numsession, usuario, hora, submitted, rand_num)
             values('$numsession', '$email_cliente', '$hora', '$submitted', '$rand_num')";
             // echo "$query1";
             $result1=mysqli_query($conex1,$query1);
         }
         ?>

         <table class="ui celled table">
            <thead>
               <th class="blue center aligned">Del</th>
               <th class="blue">Producto</th>
               <th class="blue center aligned">Precio</th>
               <th class="blue center aligned">Cant.</th>
               <th class="blue center aligned">SubTotal</th>
            </thead>
            <tbody>
               <?php
                  //initialize total
                  $total = 0;
                  if(!empty($_SESSION['pedido'])){
                  //connection
            // $conex2 = new mysqli('localhost', 'root', 'admin2111', 'dist868');
                  //create array of initail qty which is 1
                  $index = 0;
                  if(!isset($_SESSION['cantidad'])){
                     $_SESSION['cantidad'] = array_fill(0, count($_SESSION['pedido']), 1);
                  }
                  $sql = "SELECT id_producto,nom_producto,precio1_producto FROM productos WHERE id_producto IN (".implode(',',$_SESSION['pedido']).")";
                  $query = $conex2->query($sql);
                     while($row = $query->fetch_assoc()){
                        $cantidad=$_SESSION['cantidad'][$index];
                        ?>
                        <tr>
                           <td class='center aligned'>
                             <?php echo $index; ?>
                           </td>
                           <td><?php echo $row['nom_producto']; ?></td>
                           <td class='center aligned'>
                             <?php echo number_format($row['precio1_producto'], 2); ?>
                           </td>
                           <?php echo $index; ?>
                           <td class='center aligned'>
                              <?php echo $_SESSION['cantidad'][$index]; ?>
                           </td>
                           <td class='center aligned'>
                             <?php echo number_format($_SESSION['cantidad'][$index]*$row['precio1_producto'], 2); ?>
                           </td>
                           <?php $total += $_SESSION['cantidad'][$index]*$row['precio1_producto']; ?>
                        </tr>
                        <?php
                        $index ++;

                        $id_producto=$row['id_producto'];
                        //$cantidad=$_SESSION['cantidad'][$index];
                        $precio=$row['precio1_producto'];
                        $numFilas=0;


                        $sqlCesta2Exit=mysqli_query($conex1,"select idcart from cuentas2 where numsession='$numsession' and id_producto='$id_producto'");
                        $numFilas=mysqli_num_rows($sqlCesta2Exit);
                        if($numFilas==0)
                        {
                           if(!isset($cantidad) or $cantidad=="")
                           { $cantidad=1;  }
                           $query2="insert into pedido2(numsession,id_producto, cantidad, precio, usuario, hora, submitted, rand_num)
                           values('$numsession', '$id_producto', '$cantidad', '$precio', '$email_cliente', '$hora', '$submitted', '$rand_num')";
                           // echo "<br>$query2";
                           $result2=mysqli_query($conex1,$query2);
                        }
                    }
                  }
                  else{
                     ?>
                     <tr>
                        <td colspan="4" class="center aligned">Carrito Vacio</td>
                     </tr>
                     <?php
                  }

               ?>
               <tr class='ui blue'>
                  <td colspan="4" align="right aligned"><b>Total</b></td>
                  <td class='center aligned'><b><?php echo number_format($total, 2); ?></b></td>
               </tr>
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
  echo "<html><meta http-equiv=refresh content=4;url=../index.php>";
 }
 // session_start();
   if(isset($_POST['save'])){
      foreach($_POST['indexes'] as $key){
         $_SESSION['cantidad'][$key] = $_POST['qty_'.$key];
      }

      $_SESSION['message'] = 'Cart updated successfully';
      header('location: pedido-ver.php');
   }
?>

</div>

<?php
if(empty($id_cliente) and empty($email_cliente) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=pedido-save1.php>";
  exit();
}
include("$dirRoot"."includes/statusAdmin.php");
?>
