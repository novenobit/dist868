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
 $id_cliente= $clienteData['id_cliente'];
 $cid=$clienteData['cid_cliente'];
 $nom=$clienteData['nom_cliente'];
 $nivelprecio=$clienteData['nivelprecio'];
 if($clienteData['nivelprecio']<>"")
 {
  include("$dirRoot"."datafiles/find-nivel-precios.php");
  if(isset($nom_nivel))
  { $nivelprecio=$nom_nivel; }
  else
  { $nivelprecio="sin Datos"; }
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
 echo "<tr>";
  //<td class='tdBorder center aligned'>
  // {$clienteData['cid_cliente']}
  //</td>";
  echo "<td class='tdBorder'>
   <a href='goto-page.php?id=$id_cliente' target='data2'>
   <strong>{$clienteData['nom_cliente']}</strong>
   <br>{$clienteData['cid_cliente']} / $nivelprecio / $fecha</a>
  </td>";
  if($sys_ventas=="S")
  {
   //echo "<td class='tdBorder center aligned'>
   // {$clienteData['tel1_cliente']}
   //</td>";
   //echo "<td class='tdBorder center aligned'>
   // $nivelprecio
   //</td>
   //<td class='tdBorder center aligned'>
   // $fecha
   //</td>";
   echo "<td class='tdBorder center aligned' style='width:80px;'>
    <a href='goto-page.php?id=$id_cliente' target='data2'>$numVentas</a>
   </td>
   <td class='tdBorder center aligned' style='width:200px;'>
    <a href='goto-page.php?id=$id_cliente' target='data2'>$vendedor</a>
   </td>";

  // <td class='tdBorder center aligned'>
  //    <a class='ui orange button' href=\"javascript:popup_center('goto-page.php?id=$id_cliente&','800','600'); \">Ver</a>
  // </td>";
  }
 echo "</tr>";

?>
