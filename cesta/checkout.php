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
$forms="S";
$input="S";
$checkbox="S";
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
    <h3 class="ui header red">Tu pedido / Articulos Seleccionados</h3>
    <div class="ui hidden divider"></div>
      <form class="ui form" method="POST" action="pedido-save1.php">

         <table class="ui celled striped padded table">
            <thead>
               <th class="blue" style="width:300px;">Img</th>
               <th class="blue" style="width:300px;">Producto</th>
               <th class="blue center aligned">Precio</th>
               <th class="blue center aligned" style="width:100px;">Cant.</th>
               <th class="blue center aligned">SubTotal</th>
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
                             <?php echo $_SESSION['cantidad'][$index]; ?>
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
                        </tr>
                        <?php
                        $index ++;
                     }
                  }
                  else{
                     ?>
                     <tr>
                        <td colspan="5" class="center aligned">Carrito Vacio</td>
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
<hr>


         <h3>Datos para la Facturación</h3>
         <h6>Tus datos personales solo sera utilizado para procesar tu pedido.</h6>

         <div class="ui form">
            <div class="fields">
             <div class="eight wide field">
               <label>CI/RIF *</label>
               <input type="text" name="cid_cliente" maxlength="20" placeholder="cedula o rif">
             </div>
             <div class="eight wide field">
               <label>Nombre y Apellido *</label>
               <input type="text" name="nom_cliente" maxlength="50" placeholder="nombre del cliente">
             </div>
            </div>
            <div class="fields">
             <div class="sixteen wide field">
               <label>Direccion Fisica *</label>
               <input type="text" name="dir1_cliente" placeholder="nombre o número de la casa/edificio y nombre de la calle">
             </div>
            </div>
            <div class="fields">
             <div class="eight wide field">
               <label>Ciudad *</label>
               <input type="text" name="ciudad_cliente" maxlength="30" placeholder="ciudad">
             </div>
              <div class="eight wide field">
               <label>Estado *</label>
               <input type="text" name="estado_cliente" maxlength="30" placeholder="estado">
             </div>
              <div class="eight wide field">
               <label>Codigo Postal *</label>
               <input type="text" name="codigo_postal" maxlength="20" placeholder="codigo postal">
             </div>
            </div>
            <div class="fields">
             <div class="eight wide field">
               <label>Teléfono Local *</label>
               <input type="text" name="tel1_cliente " maxlength="30" placeholder="telefono local">
             </div>
             <div class="eight wide field">
               <label>Teléfono Mobil *</label>
               <input type="text" name="tel2_cliente " maxlength="30" placeholder="telefono celular">
             </div>
            </div>
            <div class="fields">
             <div class="eight wide field">
               <label>Correo electrónico *</label>
               <input type="text" name="email_cliente " maxlength="30" placeholder="email / correo">
             </div>
             <div class="eight wide field">
               <label>Sitio Web</label>
               <input type="text" name="url_cliente " maxlength="30" placeholder="www.nombreweb.com">
             </div>
            </div>
            <div class="fields">
             <div class="eight wide field">
               <label>Nota Extra </label>
               <input type="text" name="nota_cliente " maxlength="100" placeholder="Información adicional">
             </div>
              <div class="eight wide field">
               <div class="ui test toggle checkbox">
                <input type="checkbox" name="lista_correo">
                <label>Suscribir a nuestra Lista de Correo</label>
               </div>
             </div>
            </div>
            <div class="fields">
             <div class="sixteen wide field">
                <p>(opcional) Puede suscribir a nuestra lista de correos electrónicos donde recibiras información de nuevos productos y de los descuentos.</p>
             </div>
          </div>
            <div class="fields">
             <div class="sixteen wide field">
                <p>Forma de Pago: El pago puede ser: De contado, En efectivo,por Pago Móvil, Trsferencia o similar en el momento de la entrega.</p>
             </div>
          </div>
        </div>

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
