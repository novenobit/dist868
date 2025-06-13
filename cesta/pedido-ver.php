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
$num=0;
?>

<div class="ui container">

    <?php
     //echo ""<a href='pedido-ver.php'>".count($_SESSION['pedido']." Cart </a>";"
    ?>
   <div class="ui grid">
    <div class="ten wide column">
     <h1 class="page-header text-center">Contenido de tu Cesta</h1>
    </div>
    <div class="six wide right aligned column">
      <a href="pedido-limpiar.php" class="ui blue button"><i class="eraser icon"></i> Limpia Cesta</a>
      <a class="ui animated button" tabindex="0" href='javascript:history.back(1)'>
       <div class="visible content">Retornar</div>
       <div class="hidden content">
         <i class="left arrow icon"></i>
       </div>
      </a>
    </div>
   </div>
       <?php
         if(isset($_SESSION['message'])){
            ?>
            <div class="alert alert-info text-center">
               <?php
               // echo $_SESSION['message'];
               ?>
            </div>
            <?php
            unset($_SESSION['message']);
         }

       ?>

<div class="ui main text container">
    <div class="ui hidden divider"></div>
    <h3 class="ui header red">Articulos Seleccionados</h3>
    <div class="ui hidden divider"></div>
      <form class="ui form" method="POST" action="pedido-save1.php">

         <table class="ui celled striped padded table">
            <thead>
               <th class="blue" style="width:300px;">Img</th>
               <th class="blue" style="width:300px;">Producto</th>
               <th class="blue center aligned">Precio</th>
               <th class="blue center aligned" style="width:100px;">Cant.</th>
               <th class="blue center aligned">SubTotal</th>
               <th class="blue center aligned">Borra</th>
            </thead>
            <tbody>
               <?php
                  //initialize total
                  $total = 0;
                  if(!empty($_SESSION['pedido'])){
                  //connection
                  //create array of initail qty which is 1
                  $index = 0;
                  if(!isset($_SESSION['cantidad'])){
                     $_SESSION['cantidad'] = array_fill(0, count($_SESSION['pedido']), 1);
                  }
                  $sql = "SELECT * FROM productos WHERE id_producto IN (".implode(',',$_SESSION['pedido']).")";
                  $query = $conex2->query($sql);
                     while($row = $query->fetch_assoc()){
                         if(!isset($_SESSION['cantidad'][$index]) or $_SESSION['cantidad'][$index]==0 or $_SESSION['cantidad'][$index]=="")
                         { $_SESSION['cantidad'][$index]=1; }
                        ?>
                        <tr>
                           <td style="width:100px;">
                              <?php
                               if(isset($row['foto_producto']) and $row['foto_producto']<>"")
                               { $foto=$row['foto_producto']; }
                               else
                               { $foto="sinfoto.png"; }
                               echo "<img class='ui image' src='../imagenes/productos/$foto'>";
                              ?>
                           </td>
                           <td style="width:400px;">
                              <?php echo $row['nom_producto']; ?>
                           </td>
                           <td class='center aligned'>
                             <?php echo number_format($row['precio1_producto'], 2); ?>
                           </td>
                           <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                           <td class='center aligned'>
                             <div class="ui input" style="width:100px;">
                               <input class="ui input" type="number"  value="<?php echo $_SESSION['cantidad'][$index]; ?>" name="qty_<?php echo $index; ?>"  size="4" min="0" max="" step="1" inputmode="numeric" autocomplete="off">
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
                        $num++;
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
                  <td colspan="4" align="right aligned"><b>Total</b></td>
                  <td class='center aligned'><b><?php echo number_format($total, 2); ?></b></td>
                  <td></td>
               </tr>
            </tbody>
         </table>
         <?php
          if($num>0)
          {
         ?>
           <a href="../index.php" class="ui blue button"><i class="angle double left icon"></i> Continua enel Site</a>
           <a href="pedido-limpiar.php" class="ui blue button"><i class="eraser icon"></i> Limpia Cesta</a>
           <button class="ui blue button" type="submit"><i class="cart arrow down icon"></i> Usuario Registrado</button>
           <a href="checkout.php" class="ui blue button"><i class="credit card icon"></i> Nuevo Usuario</a>
         <?php
          }
         ?>
      </form>
</div>

</div>


<?php
// echo "<br>xx ".session_id();
// echo '<br><pre>';
// var_dump($_SESSION);
// echo '</pre>';
//   echo "<h3> PHP List All Session Variables</h3>";
//   foreach ($_SESSION as $key=>$val)
//   echo $key." ".$val."<br/>";
include("$dirRoot"."includes/statusAdmin.php");
?>
