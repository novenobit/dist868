<?php
// ------------------------------------------------------------------
// usuarios Top
// ------------------------------------------------------------------
include("$dirRoot"."libs1/fixheader2.php");

?>
<table id='data' class='dataTable'>
<thead><tr>
  <th>CI/RIF</th>
  <th>
   Nombre
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
// usuarios Data
// ------------------------------------------------------------------
 $fecha="";
 if($ves==1)
  $bgcolor="#ffffff";
 if($ves==2)
  $bgcolor="#cccccc";
 $cid_usuario="{$usuarioData['cid_usuario']}";
 $Tventas=0;
 $num=0;

 $sql2=mysqli_query($conex1,"select monto_apagar,dia,mes,ano from $dbVentasRes where cid_usuario='$cid_usuario'");
 while($ventasData=mysqli_fetch_array($sql2))
 {
  $monto_apagar="{$ventasData['monto_apagar']}";
  $Tventas=$Tventas+$monto_apagar;
 //echo "x $monto_apagar / $Tventas / $cid_usuario <br>";
  $num++;
  $fecha="{$ventasData['dia']}/ {$ventasData['mes']} /{$ventasData['ano']}";
 }
 $STventas="". number_format($Tventas,2,',', '.') . "";
 if($num==0)
  $num="";
 if($STventas==0)
  $STventas="";
 echo "<tr>
  <td>{$usuarioData['cid_usuario']}</td>
  <td>";
   if($areasSistema['Editausuarios']=="S")
    echo "<a href=\"javascript:popup_center('../users/usuarios-ver.php?op=cl&iduser={$usuarioData['iduser']}','800','500'); \">{$usuarioData['nombre']}</a>";
   else
    echo "{$usuarioData['nombre']}";
  echo "</td>
  <td >
   $STventas&nbsp;
  </td>
  <td>
   $num
  </td>";
  if($areasSistema['Editausuarios']=="S")
  {
   echo "<td><a href='../users/usuarios-del1.php?op=cl&iduser={$usuarioData['iduser']}' >
   <img src='$dirRoot"."imagenes/graphs/borrar.png' alt='Borrar {$usuarioData['nombre']}'></a></td>
   <td><a href='../users/usuarios-edit1.php?op=cl&iduser={$usuarioData['iduser']}'>
   <img src='$dirRoot"."imagenes/graphs/edita.png'  alt='Edita {$usuarioData['nombre']}'></a></td>
   <td><a href='../users/usuarios-ver1.php?op=cl&iduser={$usuarioData['iduser']}' >
   <img src='$dirRoot"."imagenes/graphs/verdatos.png'  alt='Ver {$usuarioData['nombre']}'></a></td>";
  }
  else
  {
   echo "<td>
   <img src='$dirRoot"."imagenes/graphs/borrar.png' alt='Borrar {$usuarioData['nombre']}'></td>
   <td>
   <img src='$dirRoot"."imagenes/graphs/edita.png'  alt='Edita {$usuarioData['nombre']}'></td>
   <td>
   <img src='$dirRoot"."imagenes/graphs/verdatos.gif'  alt='Ver {$usuarioData['nombre']}'></td>";
  }
  echo "</tr>";
   $ves++;
  if($ves==3)
   $ves=1;
if(isset($sql2))
 mysqli_free_result($sql2);
?>
