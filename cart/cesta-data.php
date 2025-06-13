
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
