<table class="ui five column celled long scrolling table">
 <thead>
  <tr>
   <th class='center aligned' style="background-color:#3970fe;color:#ffffff;width:100px">#</th>
   <th class='center aligned' style="background-color:#3970fe;color:#ffffff;">Fecha</th>
   <th style="background-color:#3970fe;color:#ffffff;">Cliente</th>
   <th class='center aligned' style="background-color:#3970fe;color:#ffffff;">Prod</th>
   <th class='center aligned' style="background-color:#3970fe;color:#ffffff;">Total</th>
   <th class='center aligned'  style="background-color:#3970fe;color:#ffffff;width:160px">OP</th>
   </tr>
 </thead>
 <tbody>
<?php
 $reg=0;
 $num=1;
 $Ttotal=0;
 $numFilas=0;
 $sqlFind=mysqli_query($conex1,"select id_venta from ventas limit 2");
 $numFilas=mysqli_num_rows($sqlFind);
 if($numFilas>0)
 {
  $sqlVentas=mysqli_query($conex1,"select id_venta,numfactura,cid_cliente,monto_apagar,dia,mes,ano from ventas order by id_venta desc limit 100");
  while($ventaData=mysqli_fetch_array($sqlVentas))
  {
    $id_venta=$ventaData['id_venta'];
    $numfactura=$ventaData['numfactura'];
    $cid_cliente=$ventaData['cid_cliente'];
    $monto_apagar=$ventaData['monto_apagar'];
    $Ttotal=$Ttotal+$monto_apagar;
    $dia=$ventaData['dia'];
    $mes=$ventaData['mes'];
    $ano=$ventaData['ano'];
    // Cliente Data
    $sqlCliente=mysqli_query($conex1,"select nom_cliente from clientes where cid_cliente='$cid_cliente'");
    $clienteData=mysqli_fetch_array($sqlCliente);
    if(isset($clienteData))
    {
      $nom_cliente=$clienteData['nom_cliente'];
    }
    else
    {
      $nom_cliente="";
    }
    // Productos Data
    $numPro=0;
    $sql=mysqli_query($conex1, "select idcesta,id_cuenta from respaldo_cesta where numfactura='$numfactura'");
    $numPro=mysqli_num_rows($sql);

    // Ventas Data
    echo "<tr>
     <td class='center aligned' style='width:100px'>$id_venta</td>
     <td class='center aligned'>$dia/$mes/$ano</td>
     <td>$nom_cliente</td>
     <td class='center aligned'>$numPro</td>
     <td class='center aligned'>$monto_apagar</td>
     <td class='center aligned' style='width:160px'>";
      //if($numPro==0)
      //{ echo "<a class='ui orange button' href='venta-del.php?id=$id_venta'>del</a>"; }
      //else
      //{ echo "<a class='ui orange button' href='venta-ver.php?id=$id_venta'>ver</a>"; }
//------------------------------
?>
<center style="padding:0px;">
 <button data-modal="modal<?php echo $num; ?>" id="call-modal-<?php echo $num; ?>" class="ui blue button">Ver</button>
</center>

<div class="ui modal" id="modal<?php echo $num; ?>" style="background-color:#212121;height:500px;">
 <div class="header"><?php echo $nom_cliente; ?></div>
 <div class="scrolling content"  style="background-color:#ededed;">
   <iframe src="<?php echo "venta-ver.php?id=$id_venta&modalId=$num&sistema=$sistema"; ?>" height='520px' width='100%' name='data2' frameborder='0' scrolling='auto' allowtransparency='true'></iframe>
 </div>
 <div class="actions">

       <a class="ui animated button" tabindex="0" href='javascript:history.back(1)'>
       <div class="visible content">Retornar</div>
       <div class="hidden content">
         <i class="left arrow icon"></i>
       </div>
      </a>

  <div class="ui blue deny button">
       Cerrar/Close
  </div>

        <?php
         if(isset($CambiarDatos) and $CambiarDatos=="Sss")
         {
          echo "<div class='ui grid'>
            <div class='sixteen wide column'>
              <div class='ui wrapping spaced stackable buttons'>
               <a class='ui compact blue button' data-inverted='' data-tooltip='Ver los Datos de {$clienteData['nom_cliente']}' data-position='top left' href='cliente-ver3.php?op=ver&id=$id_cliente&id_cliente=$id_cliente'>Ver</a>
               <a class='ui compact blue button' data-inverted='' data-tooltip='Cambia los Datos de {$clienteData['nom_cliente']}' data-position='top left' href='clientes-edit1.php?op=edt&id=$id_cliente&id_cliente=$id_cliente'>Edita</a>
               <a class='ui compact blue button' data-inverted='' data-tooltip='Borra este Cliente de la Tabla' data-position='top left' href='clientes-del1.php?op=del&id=$id_cliente&id_cliente=$id_cliente'>Borrar</a>
               <a class='ui compact blue button' data-inverted='' data-tooltip='Ver las Compras de {$clienteData['nom_cliente']}' data-position='top left' href='cliente-ver-ventas.php?op=ven&id=$id_cliente&id_cliente=$id_cliente'>Ventas</a>
               <a class='ui compact blue button' data-inverted='' data-tooltip='Grafico de Compras' data-position='top left' href='clientes-graph.php?op=gra&id=$id_cliente&id_cliente=$id_cliente'>Graphs</a>
               <a class='ui compact blue button' data-inverted='' data-tooltip='Buscar otro Cliente' data-position='top left' href='clientes-list1-2.php'>Buscar</a>
               <a data-inverted='' data-tooltip='Imprimir los Datos de {$clienteData['nom_cliente']}' data-position='top left' href=\"javascript:popup_center('../loadpage/load-page-printer.php?op=cl&id=$id_cliente&id_cliente=$id_cliente&exefile=clientes-ver-printer','800','500'); \">Print</a>
              </div>
            </div>
          </div>";
         }
        ?>
 </div>
</div>
<?php
//------------------------------

     echo "</td>
     </tr>";
    $num++;
    $reg++;
  }
 }
 if($reg==0)
 {
    echo "<tr><td class='center aligned' colspan='6' style='padding: 60px;'>
     <h1 class='title'><strong>No Hay Datos</strong></h1>
    </td></tr>";
 }
 if($Ttotal>0)
 {
    echo "<tr>
     <td class='center aligned black' style='width:100px'></td>
     <td class='center aligned black'><b>Total</b></td>
     <td class='center aligned black'></td>
     <td class='center aligned black'></td>
     <td class='center aligned black'><b>$Ttotal</b></td>
     <td class='center aligned black' style='width:160px'></td>
    </tr>";
 }

?>
 </tbody>
</table>
