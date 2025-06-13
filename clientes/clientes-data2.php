<?php
// ------------------------------------------------------------------
// Clientes Top
// ------------------------------------------------------------------
include("$dirRoot"."libs/fixheader2.php");

?>
<table id='data' class='dataTable'>
<thead><tr>
  <th>CI/RIF</th>
  <th>
   Nombre Cliente
  </th>
  <th>
   Ventas
  </th>
  <th>
   #V
  </th>
  <th>
   B
  </th>
  <th>
   E
  </th>
  <th>
   V
  </th>
 </tr></thead>
<tbody>
<?php
// ------------------------------------------------------------------
// Clientes Data
// ------------------------------------------------------------------
 $fecha="";
 if($ves==1)
  $bgcolor="#ffffff";
 if($ves==2)
  $bgcolor="#cccccc";
 $cid_cliente="{$clienteData['cid_cliente']}";
 $Tventas=0;
 $num=0;

 $sql2=mysqli_query($conex1,"select monto_apagar,dia,mes,ano from ventas where cid_cliente='$cid_cliente'");
 while($ventasData=mysqli_fetch_array($sql2))
 {
  $monto_apagar="{$ventasData['monto_apagar']}";
  $Tventas=$Tventas+$monto_apagar;
 //echo "x $monto_apagar / $Tventas / $cid_cliente <br>";
  $num++;
  $fecha="{$ventasData['dia']}/ {$ventasData['mes']} /{$ventasData['ano']}";
 }
 $STventas="". number_format($Tventas,2,',', '.') . "";
 if($num==0)
  $num="";
 if($STventas==0)
  $STventas="";
 echo "<tr>
  <td>{$clienteData['cid_cliente']}</td>
  <td>";
   if($areasSistema['EditaClientes']=="S")
    echo "<a href=\"javascript:popup_center('../clientes/cliente-ver.php?op=cl&id_cliente={$clienteData['id_cliente']}','800','500'); \">{$clienteData['nom_cliente']}</a>";
   else
    echo "{$clienteData['nom_cliente']}";
  echo "</td>
  <td >
   $STventas&nbsp;
  </td>
  <td>
   $num
  </td>";
  if($areasSistema['EditaClientes']=="S")
  {
   echo "<td><a href='../clientes/clientes-del1.php?op=cl&id_cliente={$clienteData['id_cliente']}' >
   <img src='$dirRoot"."siadre-imagenes/graphs/borrar.png' alt='Borrar {$clienteData['nom_cliente']}'></a></td>
   <td><a href='../clientes/clientes-edit1.php?op=cl&id_cliente={$clienteData['id_cliente']}'>
   <img src='$dirRoot"."siadre-imagenes/graphs/edita.png'  alt='Edita {$clienteData['nom_cliente']}'></a></td>
   <td><a href='../clientes/clientes-ver1.php?op=cl&id_cliente={$clienteData['id_cliente']}' >
   <img src='$dirRoot"."siadre-imagenes/graphs/verdatos.png'  alt='Ver {$clienteData['nom_cliente']}'></a></td>";
  }
  else
  {
   echo "<td>
   <img src='$dirRoot"."siadre-imagenes/graphs/borrar.png' alt='Borrar {$clienteData['nom_cliente']}'></td>
   <td>
   <img src='$dirRoot"."siadre-imagenes/graphs/edita.png'  alt='Edita {$clienteData['nom_cliente']}'></td>
   <td>
   <img src='$dirRoot"."siadre-imagenes/graphs/verdatos.gif'  alt='Ver {$clienteData['nom_cliente']}'></td>";
  }
  echo "</tr>";
   $ves++;
  if($ves==3)
   $ves=1;
if(isset($sql2))
 mysqli_free_result($sql2);
?>
