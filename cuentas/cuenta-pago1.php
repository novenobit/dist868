<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  cuenta-pagos.php                                                        //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************

// Calcula Data -----------------------------------------------
//include("$dirRoot"."libs1/calcular-pedido.php");
//include("$dirRoot"."libs1/calcula-pagos-cliente.php");

// Get Data -----------------------------------------------
$num=1;
$mobile="N";
?>

<div class="ui segments">
 <h4 class='ui top attached block header'>Cerrar la Cuenta</h4>
 <div class="ui readme padded segment">
  <div class="field" placeholder="Last Name">
   <div class="ui pointing below red label">
      <h2>Forma de Pago</h2>
   </div>
  </div>
  <div class="ui five column grid">
      <?php
      $CAFlink="N";
      if(isset($cuentaData['cid_cliente']) and $cuentaData['cid_cliente']<>"")
      {
        $numFilas=0;
        $Table="cliente_saldo";
        TableExit2($Table);
        if($tableExit=="S")
        {
        $sqlSaldo=mysqli_query($conex1,"select id from cliente_saldo where cid_cliente='{$cuentaData['cid_cliente']}'");
        $numFilas=mysqli_num_rows($sqlSaldo);
        }
        if($numFilas>0)
        { $CAFlink="S"; }
        $sqlClient=mysqli_query($conex1,"select id_cliente from clientes where cid_cliente='{$cuentaData['cid_cliente']}'");
        $clienteData=mysqli_fetch_array($sqlClient);
        $id_cliente=$clienteData['id_cliente'];
      }
      $result=mysqli_query($conex1,"select id_formapago,nom_formapago,tipo_formapago,foto_formapago from formadepago");
      while($formapago=mysqli_fetch_array($result))
      {
        $id=$formapago['id_formapago'];
        $foto_formapago=$formapago['foto_formapago'];
        $exefile1="formapago2.php";
        if($formapago['tipo_formapago']=="TRS")
        {
        $exefile1="formapago5.php";
        }
        $showMenu="S";
        if($formapago['tipo_formapago']=="CAF" and $CAFlink=="N")
        {
        $exefile1="#";
        $showMenu="N";
        }
        if($formapago['tipo_formapago']=="CAF" and $CAFlink=="S")
        {
        $exefile1="../clientes/cliente-menu.php";
        }
        // if($cod_empresa=="cmc2018" and $sistema=="B" and $formapago['tipo_formapago']=="CxC" or $formapago['tipo_formapago']=="CT" or $formapago['tipo_formapago']=="COU" or $formapago['tipo_formapago']=="INT")
        if($formapago['tipo_formapago']=="CT" or $formapago['tipo_formapago']=="COU" or $formapago['tipo_formapago']=="INT")
        { $showMenu="N"; }
        if($formapago['tipo_formapago']=="CxC")
        { $showMenu="N"; }
        if($showMenu=="S")
        {
        if(empty($foto_formapago) or $formapago['foto_formapago']=="" or $formapago['foto_formapago']=="Array")
        { $foto_formapago="noimage.jpg"; }
        echo "<div class='column center aligned' style='background-color:#2d2f31;color:#ffffff;'>";
          echo "<a href='cerrar-cesta2.php?id_cuenta=$id_cuenta&idPago=$id&sistema=$sistema'><img class='ui medium rounded image' src='$dirRoot"."/imagenes/bancos/$foto_formapago'></a>";
          echo "<div class='ui attached black message'><span class='font-10'>{$formapago['nom_formapago']}</span></div>";
        echo "</div>";
        $num++;
        if($num>=4)
        { $num=1;
          // echo "</div>
          // <div class='columns is-mobile'>";
        }
        }
        FlushData();
      }
      ?>
  </div>
 </div>
</div>


