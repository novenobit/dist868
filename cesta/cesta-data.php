<?php
$i=0;
$num=0;
$Ttotal1=0;
$TtotalD=0;

if($mobile=="S")
{
?>

<div class="ui grid">
  <div class="sixteen wide column"><h2 class'font-brown'>Articulos Seleccionados</h2></div>
  <div class="sixteen wide column centered center aligned">
      <a class="ui green button" href='javascript:history.back(1)'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
       <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
       </svg>
         Regresa
       </a>
      <?php echo "<a class='ui red button' href='#' id='borraCesta'>"; ?>
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
       <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
       </svg>
      Borra Todo</a>

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
   <div class='ui grid'>
      <?php
      if (isset($_SESSION['pedido'])) :
        $i = 1;
        foreach ($_SESSION['pedido'] as $pedido) :
         $sqlPro = "SELECT id_producto,nom_producto,precio1_producto,precio2_producto,precio3_producto,foto_producto FROM productos WHERE id_producto='{$pedido['id']}'";
         $queryPro = $conex1->query($sqlPro);
         $itemData = $queryPro->fetch_assoc();
         $id_producto=$itemData['id_producto'];
         $nom_producto=$itemData['nom_producto'];
         $precio1_producto=$itemData['precio1_producto'];
         $precio2_producto=$itemData['precio2_producto'];
      $precio_dolar=$precio2_producto;
         $totalBs=$pedido['cantidad']*$precio1_producto;
         $totalD=$pedido['cantidad']*$precio_dolar;
         //$Ttotal1=$Ttotal1+$totalBs;;
         //$TtotalD=$TtotalD+$totalD;
         $foto_producto = $itemData['foto_producto'];
         if($foto_producto=="")
         { $foto_producto="sinfoto.png"; }
      ?>

         <div class='six wide column'>
           <?php
              echo "<a href='../vercat3.php?idpro=$id_producto'>
                <img  class='ui tiny image centered' src='../imagenes/productos/$foto_producto'>
              </a>";
           ?>
         </div>
         <div class='ten wide column'>
          <h3><?php echo $nom_producto; ?></h3>
<div class='ui grid'>
 <div class='sixteen wide column'>
            <p>Ref: <?php echo number_format($precio_dolar, 2); ?></p>
 </div>
 <div class='six wide column'>
          <form action="<?php echo "cesta-update.php"; ?>" method="post">
           <div class="field border round small text-center">
             <input class="text-center" type="number" value="<?php echo $pedido['cantidad']; ?>" name="cantidad" min="1" style="width:9ch;">
           </div>
           <input type="hidden" name="upid" value="<?php echo $pedido['id']; ?>">
           <div class="absolute middle center">
             Total: <?php echo number_format($totalD, 2); ?>
           </div>
 </div>
 <div class='ten wide column'>
           <div class="small middle text-center">
             <input type="submit" name="update" value="Actualiza" class="small fluid ui blue button">
             <?php echo "<a class='small fluid ui white button' href='removecartitem.php?id={$pedido['id']}'>Delete</a>"; ?>
           </div>
          </form>
 </div>
</div>
         </div>

      <?php
         $i++;
         $Ttotal1=$Ttotal1+$totalBs;;
         $TtotalD=$TtotalD+$totalD;

        endforeach;
      endif;
      if($i==0)
      {
       echo "  <div class='sixteen wide column'>
         <h1 class='text-center center-align'>Carrito Vacio</h1>
       </div>";
      }
      if($Ttotal1>0)
      {
       echo "  <div class='sixteen wide column'>
          <a class='small ui button blue' href='../index.php'>IrTienda</a>
          <a class='small ui button blue' href='#' id='borraCesta'>BorraCesta</a>
          <a class='small ui button orange' href='cesta-checkout.php'>Fin de Compra</a>";
          //echo "<form  method='POST' action='cesta-checkout.php'><button class='button' type='submit'>$saveData</button></form>";
       echo "</div>
       <div class='sixteen wide column'>
         <div class='padding absolute middle centered center aligned'>
          <div class='ui hidden divider'></div>
          <h3 class'font-brown  text-center'>Total Ref: ".number_format($TtotalD, 2)."</h3>
         </div>
       </div>";
      }

      ?>
  </div>

  <?php
   //include("./data/recomienda.php");
  ?>
</main>


<?php
}
else
{
?>

<div class="ui grid">
  <div class="sixteen wide column"><h2>Contenido de la Cesta</h2></div>
  <div class="ten wide column"><h4 class'font-brown'>Articulos Seleccionados</h4></div>
  <div class="six wide column centered center aligned">
      <a class="ui white button" href='javascript:history.back(1)'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
       <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
       </svg>
         Regresa
       </a>
      <?php echo "<a class='ui red button' href='#' id='borraCesta'>"; ?>
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
       <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
       </svg>
      Borra Todo</a>

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
   <table class="ui celled table">
    <thead>
       <th class="ui blue centered center aligned">Imagen</th>
       <th class="ui blue">Producto</th>
       <th class="ui blue centered center aligned">Ref</th>
       <th class="ui blue centered center aligned">Cant.</th>
       <th class="ui blue centered center aligned">SubTotal</th>
       <th class="ui blue centered center aligned">Actualiza</th>
       <th class="ui blue centered center aligned">Del</th>
    </thead>

    <tbody>
      <?php
      if (isset($_SESSION['pedido'])) :
        $i = 1;
        foreach ($_SESSION['pedido'] as $pedido) :
         $sqlPro = "SELECT id_producto,nom_producto,precio1_producto,precio2_producto,precio3_producto,foto_producto FROM productos WHERE id_producto='{$pedido['id']}'";
         $queryPro = $conex1->query($sqlPro);
         $itemData = $queryPro->fetch_assoc();
         $id_producto=$itemData['id_producto'];
         $nom_producto=$itemData['nom_producto'];
         $precio1_producto=$itemData['precio1_producto'];
         $precio2_producto=$itemData['precio2_producto'];
      $precio_dolar=$precio2_producto;
         $totalBs=$pedido['cantidad']*$precio1_producto;
         $totalD=$pedido['cantidad']*$precio_dolar;
         //$Ttotal1=$Ttotal1+$totalBs;;
         //$TtotalD=$TtotalD+$totalD;
         $foto_producto = $itemData['foto_producto'];
         if($foto_producto=="")
         { $foto_producto="sinfoto.png"; }
      ?>
         <tr>
          <td class="ui centered center aligned">
             <?php
               echo "<a href='../vercat3.php?idpro=$id_producto'>
                <img  class='ui tiny image centered' src='../imagenes/productos/$foto_producto'>
               </a>";
             ?>
           </td>
           <td><?php echo $nom_producto; ?></td>
           <td class="ui centered center aligned">
            <div class="absolute middle center">
             <?php echo number_format($precio_dolar, 2); ?>
            </div>
           </td>
           <td class="ui centered center aligned">
            <form action="<?php echo "cesta-update.php"; ?>" method="post">
             <div class="field border round small text-center">
               <input class="text-center" type="number" value="<?php echo $pedido['cantidad']; ?>" name="cantidad" min="1" style="width:9ch;">
             </div>
             <input type="hidden" name="upid" value="<?php echo $pedido['id']; ?>">
           </td>
           <td class="ui centered center aligned">
            <div class="absolute middle center">
             <?php echo number_format($totalD, 2); ?>
            </div>
           </td>
           <td class="ui centered center aligned">
              <div class="small middle text-center">
               <input type="submit" name="update" value="Actualiza"  class="ui blue button">
              </div>
             </form>
           </td>
           <td class="ui centered center aligned">
             <div class="small middle text-center">
              <?php echo "<a class='ui white button' href='removecartitem.php?id={$pedido['id']}'>Del</a>"; ?>
             </div>
           </td>
         </tr>
      <?php
         $i++;
         $Ttotal1=$Ttotal1+$totalBs;;
         $TtotalD=$TtotalD+$totalD;

        endforeach;
      endif;
      if($i==0)
      {
       echo "<tr><td colspan='7' class='text-center center-align'>
         <h1 class='text-center center-align'>Carrito Vacio</h1>
       </td></tr>";
      }
      if($Ttotal1>0)
      {
       echo "<tr>
        <td class='text-center' colspan='4'>
          <a class='small ui button' href='../index.php'>Ir a Tienda</a>
          <a class='small ui button' href='#' id='borraCesta'>Borra la Cesta</a>
          <a class='small ui button'tertiary' href='cesta-checkout.php'>Registrar Datos</a>";
          //echo "<form  method='POST' action='cesta-checkout.php'><button class='button' type='submit'>$saveData</button></form>";
        echo "</td>
        <td class='padding text-center' colspan='3'>
         <div class='padding absolute middle right'>
          <h3 class'font-brown'>Total Ref: ".number_format($TtotalD, 2)."</h3>
         </div>
       </td></tr>";
      }

      ?>
    </tbody>
  </table>

  <?php
   //include("./data/recomienda.php");
  ?>
</main>

<?php
}
?>
