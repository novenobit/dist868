<?php
// ------------------------------------------------------------------
// Clientes Data
// ------------------------------------------------------------------
if(!isset($mobile))
{ $mobile="N"; }

 $fecha="";
 $Tventas=0;
 $sys_ventas="S";
 if($sys_ventas=="S")
 {
  $numVentas=0;
  $sql2=mysqli_query($conex1,"select monto_apagar,dia,mes,ano from ventas where cid_cliente='{$clienteData['cid_cliente']}'");
  while($ventasData=mysqli_fetch_array($sql2))
  {
   $Tventas=$Tventas+$ventasData['monto_apagar'];
   $numVentas++;
   $fecha="{$ventasData['dia']}/{$ventasData['mes']}/{$ventasData['ano']}";
  }
 }
 if($numVentas==0)
 { $numVentas=""; }
 $cid=$clienteData['cid_cliente'];
 $nom=$clienteData['nom_cliente'];
 $nivelprecio=$clienteData['nivelprecio'];
 if($clienteData['nivelprecio']<>"")
 {
  include("$dirRoot"."datafiles/find-nivel-precios.php");
  $nivelprecio=$nom_nivel;
 }
 $dir="";
 if($clienteData['dir1_cliente']<>"")
 { $dir=" / ".$clienteData['dir1_cliente']; }
 $tel="";
 if($clienteData['tel1_cliente']<>"")
 { $tel=" / ".$clienteData['tel1_cliente']; }
 $mail="";
 if($clienteData['email_cliente']<>"")
 { $mail=" / ".$clienteData['email_cliente']; }
 $CliData="$nom $dir $tel $mail";
 // ". number_format($Tventas,2,',', '.') . "
 // <a  data-inverted='' data-tooltip='$CliData' data-position='top left' href='#' onclick='loadPage(\"$dirRoot"."clientes/cliente-ver3.php?op=cl&id_cliente={$clienteData['id_cliente']}\"); return false;'>{$clienteData['cid_cliente']}</a>
 // <a  href='#' onclick='loadPage(\"$dirRoot"."clientes/cliente-ver3.php?op=cl&id_cliente={$clienteData['id_cliente']}\"); return false;'>
 if(isset($clienteData['vendedor']) and $clienteData['vendedor']<>"")
 {
   $vendedorSql=mysqli_query($conex1,"select nombre,apellido from usuarios where cid_usuario='{$clienteData['vendedor']}'");
   $vendedorData=mysqli_fetch_array($vendedorSql);
   if(isset($vendedorData))
   {
    $vendedor=$vendedorData['nombre']." ".$vendedorData['apellido'];
   }
   else
   { $vendedor=""; }
 }
 if(!isset($vendedor))
 { $vendedor=""; }
 echo "<tr>
  <td class='tdBorder center aligned'>
   {$clienteData['cid_cliente']}
  </td>";
  echo "<td class='tdBorder'>
   {$clienteData['nom_cliente']}
  </td>";
  if($sys_ventas=="S")
  {
   //echo "<td class='tdBorder center aligned'>
   // {$clienteData['tel1_cliente']}
   //</td>";
   echo "<td class='tdBorder center aligned'>
    $nivelprecio
   </td>
   <td class='tdBorder center aligned'>
    $fecha
   </td>";
   echo "<td class='tdBorder center aligned'>
    $numVentas
   </td>
   <td class='tdBorder center aligned'>
    $vendedor
   </td>
   <td class='tdBorder center aligned'>";
?>
    <center style="padding:0px;">
    <button data-modal="modal<?php echo $num; ?>" id="call-modal-<?php echo $num; ?>" class="ui orange button">Ver</button>
    </center>

    <div class="ui modal" id="modal<?php echo $num; ?>" style="background-color:#212121;height:500px;">
    <div class="header"><?php echo $clienteData['nom_cliente']; ?></div>
    <div class="scrolling content"  style="background-color:#ededed;">
      <iframe src="<?php echo "cliente-ver3.php?id={$clienteData['id_cliente']}&modalId=$num"; ?>" height='520px' width='100%' name='data2' frameborder='0' scrolling='auto' allowtransparency='true'></iframe>
    </div>
    <div class="actions">
      <a class="ui animated button" tabindex="0" href='javascript:history.back(1)'>
        <div class="visible content">Retornar</div>
        <div class="hidden content"><i class="left arrow icon"></i></div>
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
                  <a class='ui compact blue button' data-inverted='' data-tooltip='Cambia los Datos de {$clienteData['nom_cliente']}' data-position='top left' href='cliente-edit1.php?op=edt&id=$id_cliente&id_cliente=$id_cliente'>Edita</a>
                  <a class='ui compact blue button' data-inverted='' data-tooltip='Borra este Cliente de la Tabla' data-position='top left' href='cliente-del1.php?op=del&id=$id_cliente&id_cliente=$id_cliente'>Borrar</a>
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
   </td>
<?php
  }
 echo "</tr>";
?>
