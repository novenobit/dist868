<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  view-cart.php                                              //
// ****************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="N";
$icon="S";
$form="S";
$input="S";
$list="S";
$sidebar="N";
$table="N";
$message="S";
$popup="N";
$label="N";
$item="N";
$rating="N";
$autoPro="S";
$label="S";
$divider="S";
$table="S";
$tabs="S";
$topAdmin="N";
$dropdown="S";
$dirRoot="../";

include_once("../includes/config.ini.php");

FechayHora();
$todoBien="N";
//if(empty($iduser) and empty($usuario) and empty($clave))
//{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
//  exit();
//}
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }
if(isset($_GET['op2']))
{ $op2=$_GET['op2']; }
?>

<div class="ui text container">
 <h2>Guardar Cesta</h2>
 <div class="ui top attached tabular menu">
  <a class="active item" data-tab="Form">Form</a>
  <a class="item" data-tab="Cesta">Cesta</a>
 </div>
 <div class="ui bottom attached active tab segment" data-tab="Form">

  <div class="ui middle aligned center aligned grid">
   <div class="column">
    <h2 class="ui teal image header">
     <img src="../imagenes/people/businessman.png" class="image">
     <div class="content">
       Usuario Registrado
     </div>
    </h2>
    <form class="ui large form" action="save-cart2.php" method='post' enctype="multipart/form-data">
     <div class="ui stacked segment">
       <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email_cliente" placeholder="Correo Cliente">
          </div>
       </div>
       <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="clave1" placeholder="Contrase&ntilde;a">
          </div>
       </div>
       <div class="field">
         <img src="../libs2/captcha/captcha.php" id="img" border="0" alt="captcha v1 phpform.net">
       </div>
       <div class="field">
         <div class="ui input">
          <input type="text" name="captcha" placeholder="indica numero de arriba">
         </div>
       </div>

       <button class="ui fluid large blue submit button">Login</button>
      </div>
      <div class="ui error message"></div>
     </form>
     <div class="ui message">
      Nuevo Usuario? <a href="../user-registrar1.php">Entra aqui</a>
     </div>
   </div>
  </div>

 </div>
 <div class="ui bottom attached tab segment" data-tab="Cesta">


   <?php
     //echo ""<a href='view-cart.php'>".count($_SESSION['cart']." Cart </a>";"
   ?>
   <div class="ui grid">
    <div class="ten wide column">
     <h1 class="page-header text-center">Ver Cesta</h1>
    </div>
    <div class="six wide right aligned column">
      <a class="ui animated button" tabindex="0" href='javascript:history.back(1)'>
       <div class="visible content"><i class="left arrow icon"></i> Retornar</div>
       <div class="hidden content">
         <i class="left arrow icon"></i>
       </div>
      </a>
    </div>
   </div>


        <table class="ui celled striped padded table">
            <thead>
               <th class="blue" style="width:300px;">Producto</th>
               <th class="blue center aligned">Precio</th>
               <th class="blue center aligned" style="width:100px;">Cant.</th>
               <th class="blue center aligned">SubTotal</th>
               <th class="blue center aligned">Del</th>
            </thead>
            <tbody>
               <?php
                  //initialize total
                  $total = 0;
                  if(!empty($_SESSION['cart'])){
                  //connection
                 //  $conex2 = new mysqli('localhost', 'root', 'admin2111', 'dist868');
                  // $conex2 = new mysqli('localhost', 'nvbitcom', 'Nov.218421*', 'nvbitcom_dist868');
                  //create array of initail qty which is 1
                  $index = 0;
                  if(!isset($_SESSION['cantidad'])){
                     $_SESSION['cantidad'] = array_fill(0, count($_SESSION['cart']), 1);
                  }
                  $sql = "SELECT * FROM productos WHERE id_producto IN (".implode(',',$_SESSION['cart']).")";
                  $query = $conex2->query($sql);
                     while($row = $query->fetch_assoc()){
                         if(!isset($_SESSION['cantidad'][$index]) or $_SESSION['cantidad'][$index]==0 or $_SESSION['cantidad'][$index]=="")
                         { $_SESSION['cantidad'][$index]=1; }
                        ?>
                        <tr>
                           <td style="width:400px;">
                              <?php echo $row['nom_producto']; ?>
                           </td>
                           <td class='center aligned'>
                             <?php echo number_format($row['precio1_producto'], 2); ?>
                           </td>
                           <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                           <td class='center aligned'>
                             <div class="ui input" style="width:100px;">
                               <input class="ui input" type="text"  value="<?php echo $_SESSION['cantidad'][$index]; ?>" name="qty_<?php echo $index; ?>">
                             </div>
                           </td>
                           <td class='center aligned'>
                             <?php
                              if(!isset($_SESSION['cantidad'][$index]) or $_SESSION['cantidad'][$index]==0 or $_SESSION['cantidad'][$index]=="")
                              { $_SESSION['cantidad'][$index]=1;
                                // echo number_format(1*$row['precio1_producto'], 2);
                              }
                              echo number_format($_SESSION['cantidad'][$index]*$row['precio1_producto'], 2);
                             ?>
                           </td>
                           <?php
                           if(!isset($_SESSION['cantidad'][$index]) or $_SESSION['cantidad'][$index]==0 or $_SESSION['cantidad'][$index]=="")
                           { $_SESSION['cantidad'][$index]=1; }

                            $total += $_SESSION['cantidad'][$index]*$row['precio1_producto']; ?>
                           <td class='center aligned'>
                             <?php echo "<a href='delete-item.php?id={$row['id_producto']}&index=$index'><i class='eraser icon red'></i></a>"; ?>
                           </td>
                        </tr>
                        <?php
                        $index ++;
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
                  <td colspan="3" align="right aligned"><b>Total</b></td>
                  <td class='center aligned'><b><?php echo number_format($total, 2); ?></b></td>
<td></td>
               </tr>
            </tbody>
         </table>



 </div>
</div>

<?php
include("$dirRoot"."includes/statusAdmin.php");
?>
