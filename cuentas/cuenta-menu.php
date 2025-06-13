<div class="ui stackable two column grid">
 <?php
  if(isset($id_cuenta) and $id_cuenta<>"")
  {
    if(!isset($nivelprecio))
    { $nivelprecio="1"; }
    // <div class='column'><a class='fluid ui small primary button' href='#' onclick='loadPage(\"$dirRoot"."cuentas/cerrar-cuenta.php?id_cuenta=$id_cuenta\"); return false;'>Cerrar la Cuenta</a></div>
    echo "<div class='column'><a class='fluid ui small primary button' href='agrega-cesta1.php?id_cuenta=$id_cuenta&nivelprecio=$nivelprecio&sistema=$sistema' target='data2' style='border-radius:12px;'>Agregar Item</a></div>";
    echo "<div class='column'><a class='fluid ui small primary button' href='ajustes.php?id_cuenta=$id_cuenta&winClose=S&nivelprecio=$nivelprecio&sistema=$sistema'  target='data2' style='border-radius:12px;'>Ajuste</a></div>";
    // echo "<div class='column'><a class='fluid ui small primary button' href=\"javascript:popup_center('ajustes.php?id_cuenta=$id_cuenta&winClose=S&nivelprecio=$nivelprecio','960','700'); \">Ajuste</a></div>";
    // echo "<div class='column'><a class='fluid ui small primary button' href='#' onclick='loadPage(\"$dirRoot"."cuentas/agrega-cesta1.php?id_cuenta=$id_cuenta\"); return false;'>Agregar Item</a></div>
    // echo "<div class='column'><a class='fluid ui small primary button' href='#' onclick='loadPage(\"$dirRoot"."cuentas/ajustes.php?id_cuenta=$id_cuenta\"); return false;'>Ajuste</a></div>
    // echo "<div class='column'><button class='fluid ui red button'><i class='eraser icon'></i> Borrar</button></div>";
    echo "<div class='column'><a class='fluid ui small primary button' href=\"javascript:popup_center('cuenta-printer.php?id_cuenta=$id_cuenta&winClose=S&sistema=$sistema','960','740'); \" style='border-radius:12px;'><i class='print icon'></i> Imprimir</a></div>";
    $numPagos=0;
    $sqlPagos=mysqli_query($conex1,"select id,montopago from pagoscliente where id_cuenta='$id_cuenta'");
    $numPagos=mysqli_num_rows($sqlPagos);
    if($numPagos>0)
    {
      $pagoData=mysqli_fetch_array($sqlPagos);
      $montopago=$pagoData['montopago'];
      if($montopago<$monto_apagar)
      {
       echo "<div class='column'>
        <center style='padding:0px;'><button class='fluid ui orange button' data-modal='modal1' id='call-modal-1' href='$dirRoot"."cuentas/cerrar-cuenta.php?id_cuenta=$id_cuenta&sistema=$sistema' target='data2' style='border-radius:12px;'>Cerrar la Cuenta</button></center>
       </div>";
    ?>
       <div class="ui modal" id="modal1" style="background-color:#212121;height:500px;">
        <div class="header"><?php echo $clienteData['nom_cliente']; ?></div>
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
                      <a class='ui compact blue button' data-inverted='' data-tooltip='Ver los Datos de {$clienteData['nom_cliente']}' data-position='top left' href='cliente-ver3.php?op=ver&id=$id_cliente&id_cliente=$id_cliente&sistema=$sistema'>Ver</a>
                      <a class='ui compact blue button' data-inverted='' data-tooltip='Cambia los Datos de {$clienteData['nom_cliente']}' data-position='top left' href='clientes-edit1.php?op=edt&id=$id_cliente&id_cliente=$id_cliente&sistema=$sistema'>Edita</a>
                      <a class='ui compact blue button' data-inverted='' data-tooltip='Borra este Cliente de la Tabla' data-position='top left' href='clientes-del1.php?op=del&id=$id_cliente&id_cliente=$id_cliente&sistema=$sistema'>Borrar</a>
                      <a class='ui compact blue button' data-inverted='' data-tooltip='Ver las Compras de {$clienteData['nom_cliente']}' data-position='top left' href='cliente-ver-ventas.php?op=ven&id=$id_cliente&id_cliente=$id_cliente&sistema=$sistema'>Ventas</a>
                      <a class='ui compact blue button' data-inverted='' data-tooltip='Grafico de Compras' data-position='top left' href='clientes-graph.php?op=gra&id=$id_cliente&id_cliente=$id_cliente&sistema=$sistema'>Graphs</a>
                      <a class='ui compact blue button' data-inverted='' data-tooltip='Buscar otro Cliente' data-position='top left' href='clientes-list1-2.php?sistema=$sistema'>Buscar</a>
                      <a data-inverted='' data-tooltip='Imprimir los Datos de {$clienteData['nom_cliente']}' data-position='top left' href=\"javascript:popup_center('../loadpage/load-page-printer.php?op=cl&id=$id_cliente&id_cliente=$id_cliente&exefile=clientes-ver-printer&sistema=$sistema','800','500'); \">Print</a>
                      </div>
                    </div>
                  </div>";
                }
              ?>
        </div>
       </div>
    <?php
      }
    }
    if($preparado=='S' and $chequeado=='S' and $despachado=='S')
    { echo "<div class='column'><a class='fluid ui small orange button' href='cerrar-cuenta.php?id_cuenta=$id_cuenta&sistema=$sistema' target='data2' style='border-radius:12px;'>Puede Cerrar</a></div>"; }
    else
    { echo "<div class='column'><a class='fluid ui small white button' href='#' style='border-radius:12px;'>Puede Cerrar</a></div>"; }
  }
 ?>
</div>
