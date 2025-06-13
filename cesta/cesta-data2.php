<main class="responsive center-align s">
  <h2 class="center-align">Contenido de tu Cesta</h2>
  <div class="large-space"></div>
  <div class="grid">
     <div class="s12"><h4>Articulos Seleccionados</h4></div>
     <div class="s12">
      <a class="button small-round" href='javascript:history.back(1)'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
       <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
       </svg>
         <?php echo $return; ?>
       </a>
      <?php echo "<a class='button small-round' href='cesta-limpiar.php?lan=$lan'>"; ?>
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
       <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
       </svg>
      <?php echo $deleteAll; ?></a>
     </div>
  </div>
  <div class="large-space"></div>
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
      ?>

<article class='no-padding'>
  <div class='grid no-space'>
    <div class='s4'>
      <?php
         echo "<a href='vercat3.php?idpro=$id_item&lan=$lan'>
           <img class='small-width small-height round' src='./images/productos/$foto_item'>
         </a>";
      ?>
    </div>
    <div class='s8'>
      <div class='padding'>
        <h5><?php echo $nom_item; ?></h5>
        <p><?php echo "$price : ". number_format($precio_dolar, 2).""; ?></p>
        <form action="<?php echo "cesta-update.php?lan=$lan"; ?>" method="post">
          <div class="field label border extra">
           <input class="text-center" type="number" value="<?php echo $pedido['cantidad']; ?>" name="cantidad" min="1">
           <label><?php echo $pedido['cantidad']; ?></label>
           <span class="helper">Cantidad</span>
          </div>
          <div class="field label border extra">
           <input type="hidden" name="upid" value="<?php echo $pedido['id']; ?>">
           <div class="small middle text-center">
 <nav class="tabbed small">
  <?php echo "<a class='button round' href='removecartitem.php?id={$pedido['id']}&lan=$lan'><span>$delete</span></a>"; ?>
  <a>
    <input type="submit" name="update" value="<?php echo $update; ?>" class="button">
  </a>
</nav>



           </div>
          </div>
        </fotm>
      </div>
    </div>
  </div>
</article>
<div class="large-space"></div>
<div class="grid">
  <div class="s12 center-align">
      <?php
        $i++;
        endforeach;
      endif;
      if($i==0)
      {
       echo "Carrito Vacio</h1>";
      }
      if($Ttotal1>0)
      {
       echo "<a class='button round' href='index.php?lan=$lan'>Continua</a>
          <a class='button round' href='cesta-limpiar.php?lan=$lan'>$cleanBasket</a>
          <a class='button round tertiary' href='cesta-checkout.php?lan=$lan'>$stopBuying</a>";
          //echo "<form  method='POST' action='cesta-checkout.php'><button class='button' type='submit'>$saveData</button></form>";
        echo "<h3 class='center-align'>Total: ".number_format($TtotalD, 2)."</h3>";
      }
      ?>
 </div>
</div>

</main>

<main class="responsive center-align m l">
  <h2 class="center-align">Contenido de tu Cesta</h2>
  <div class="large-space"></div>
  <div class="grid">
    <div class="s6"><h4>Articulos Seleccionados</h4></div>
    <div class="absolute middle right s6">
     <a class="button small-round" href='javascript:history.back(1)'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
      </svg>
        <?php echo $return; ?>
      </a>
     <?php echo "<a class='button small-round' href='cesta-limpiar.php?lan=$lan'>"; ?>
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
      </svg>
     <?php echo $deleteAll; ?></a>
    </div>
  </div>

  <?php
   include("./data/subcat-scroll.php");
  ?>

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
   <table class="border">
    <thead>
       <th class="primary-container center-align  center-align"><?php echo $image; ?></th>
       <th class="primary-container"><?php echo $product; ?></th>
       <th class="primary-container center-align"><?php echo $price; ?></th>
       <th class="primary-container center-align ">Cant.</th>
       <th class="primary-container center-align">SubTotal</th>
       <th class="primary-container center-align"><?php echo $change; ?></th>
       <th class="primary-container center-align"><?php echo $delete; ?></th>
    </thead>

    <tbody>
      <?php
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
      ?>
         <tr>
           <td class='text-center'>
             <?php
               echo "<a href='vercat3.php?idpro=$id_item&lan=$lan'>
                <img class='small-width small-height round' src='./images/productos/$foto_item'>
               </a>";
             ?>
           </td>
           <td><?php echo $nom_item; ?></td>
           <td class="text-center">
            <div class="absolute middle center">
             <?php echo number_format($precio_dolar, 2); ?>
            </div>
           </td>
           <td>
            <form action="<?php echo "cesta-update.php?lan=$lan"; ?>" method="post">
             <div class="field border round small text-center">
               <input class="text-center" type="number" value="<?php echo $pedido['cantidad']; ?>" name="cantidad" min="1">
             </div>
             <input type="hidden" name="upid" value="<?php echo $pedido['id']; ?>">
           </td>
           <td>
            <div class="absolute middle center">
             <?php echo number_format($totalD, 2); ?>
            </div>
           </td>
           <td>
              <div class="small middle text-center">
               <input type="submit" name="update" value="<?php echo $update; ?>" class="button">
              </div>
             </form>
           </td>
           <td class="right">
             <div class="small middle text-center">
              <?php echo "<a class='button' href='removecartitem.php?id={$pedido['id']}&lan=$lan'>$delete</a>"; ?>
             </div>
           </td>
         </tr>
      <?php
         $i++;
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
          <a class='button round' href='index.php?lan=$lan'>Continua</a>
          <a class='button round' href='cesta-limpiar.php?lan=$lan'>$cleanBasket</a>
          <a class='button round tertiary' href='cesta-checkout.php?lan=$lan'>$stopBuying</a>";
          //echo "<form  method='POST' action='cesta-checkout.php'><button class='button' type='submit'>$saveData</button></form>";
        echo "</td>
        <td class='padding text-center' colspan='3'>
         <div class='padding absolute middle right'>
          <h3>Total: ".number_format($TtotalD, 2)."</h3>
         </div>
       </td></tr>";
       echo "<tr>
        <td class='text-center center-align font-red' colspan='7'>
          <h6 class='text-center  center-align'>$notIncluded</h6>
       </td></tr>";
      }

      ?>
    </tbody>
  </table>
  <?php
   include("./data/recomienda.php");
  ?>
</main>
