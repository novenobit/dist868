<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  user-login.php                                             //
// ****************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="S";
$icon="S";
$input="S";
$list="N";
$sidebar="S";
$table="S";
$message="S";
$popup="N";
$label="N";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="S";
$divider="S";
$forms="N";
$topAdmin="S";
$dropdown="S";
$breadCrumb="S";

$dirRoot="../";
include_once("../includes/headfileFrame.php");
?>

<script LANGUAGE='JavaScript'>
 function popup2(url)
 {window.open(url,'_blank','toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1,width=640,height=500,left=200,top=50');}
</script>
<?php
if($op<>'rbd')
echo "<table id='data' class='dataTable' width=100%>
<thead>";
if($op=='1')
{
 echo "<tr><td align=left bgcolor='#4682B4' class=font-white font-12 height=30 colspan=5>
  Categoría
 </td></tr>";
 $DBtable="clascat1";
 $num_filas=0;
 $query1="select * from $DBtable";
 $sql1=mysqli_query($conex1,$query1);
 $data=mysqli_fetch_array($sql1);
 $num_filas=mysqli_num_rows($sql1);
 if($num_filas>0)
 {
 echo "<tr><th align=center valign=top bgcolor=#666666 class='font-white font-12'>Codigo</th>
  <th align=left valign=top bgcolor=#666666 class='font-white font-12'>Categoria</th>
  <th align=center valign=top bgcolor=#666666 class='font-white font-12'>Productos</th>
  <th align=center valign=top bgcolor=#666666 class='font-white font-12'>B</th>
  <th align=center valign=top bgcolor=#666666 class='font-white font-12'>E</th>
  </tr>
  </thead><tbody>";
  $ves=1;
  $query2="select * from $DBtable order by categoria ";
  $result2=mysqli_query($conex1,$query2);
  while($rows=mysqli_fetch_array($result2))
  {
   if($ves==1)
   $bgcolor="#ffffff";
  if($ves==2)
   $bgcolor="#EDEDED";
   echo "<tr><td align=center valign=top bgcolor=$bgcolor class='font-black font-12'>{$rows['clascat1']}</td>
   <td valign=top bgcolor=$bgcolor class='font-black font-12'>{$rows['categoria']}</td>";
   $numreg=0;
   $finddata=mysqli_query($conex1,"select clascat1 from clasificados where clascat1='{$rows['clascat1']}'");
   while($finddata2=mysqli_fetch_array($finddata))
   { $numreg++; }
   echo "<td valign=top align=center bgcolor=$bgcolor class='font-black font-12'>";
   if($numreg>0)
    echo  $numreg;
   echo "</td>";
   if($numreg==0)
    echo "<td valign=top align=center bgcolor=$bgcolor class='font-black font-12'>
    <a href='deletedata.php?op=$op&id={$rows['clascat1']}'>B</a></td>";
   else
    echo "<td valign=top align=center bgcolor=$bgcolor class='font-black font-12'>B</td>";
   echo "<td valign=top align=center bgcolor=$bgcolor class='font-black font-12'>
   <a href='editdata.php?op=$op&id={$rows['clascat1']}'>E</a></td>
   </tr>";
   $ves++;
   if($ves==3)
    $ves=1;
  }
 }
 else
 {
  echo "
  <tr><td valign=center align=center>
  No Hay Datos en la Tabla .....
  </td></tr>";
  // exit();
 }
}
if($op=='2') // Sub Categoria
{
  echo "<tr><td align=left bgcolor='#4682B4' class=font-white font-12 height=30 colspan=6>
  Sub-Categoría
 </td></tr>
 <tr><th align=center valign=top bgcolor=#ffffff class='font-black font-12'>Categoria</th>
 <th align=center valign=top bgcolor=#ffffff class='font-black font-12'>Codigo</th>
 <th valign=top align=left bgcolor=#ffffff class='font-black font-12'>SubCategoria</th>
 <th valign=top bgcolor=#ffffff class='font-black font-12'>Productos</th>
 <th valign=top align=center bgcolor=$bgcolor class='font-black font-12'>B</th>
 <th valign=top align=center bgcolor=$bgcolor class='font-black font-12'>E</th>
 </tr></thead><tbody>";
 $DBtable="clascat2";
 $num_filas=0;
 $ves=1;
 $sql1=mysqli_query($conex1,"select * from $DBtable");
 $data=mysqli_fetch_array($sql1);
 $num_filas=mysqli_num_rows($sql1);
 if($num_filas>0)
 {
  $result2=mysqli_query($conex1,"select * from $DBtable");
  while($rows=mysqli_fetch_array($result2))
  {
   if($ves==1)
    $bgcolor="#ffffff";
   if($ves==2)
    $bgcolor="#EDEDED";
   $clascat1="{$rows['clascat1']}";
   findclascat1();
   echo "<tr><td align=left valign=top bgcolor=$bgcolor class='font-black font-12' width=200> {$aclascat1['categoria']}</td>
   <td align=center valign=top bgcolor=$bgcolor class='font-black font-12'>{$rows['clascat2']}</td>
   <td valign=top bgcolor=$bgcolor class='font-black font-12'>{$rows['subcategoria']}</td>";
    $numreg=0;
    $query="select clascat2 from clasificados where clascat1='$clascat1'";
    $sql=mysqli_query($conex1,$query);
    $numreg=mysqli_num_rows($sql);
    echo "<td valign=top align=center bgcolor=$bgcolor class='font-black font-12'>";
    if($numreg>0)
     echo "$numreg";
    echo "</td>";
   if($numreg==0)
    echo "<td valign=top align=center bgcolor=$bgcolor class='font-black font-12'>
    <a href='deletedata.php?op=$op&id={$rows['clascat2']}'>B</a></td>";
   else
    echo "<td valign=top align=center bgcolor=$bgcolor class='font-black font-12'>B</td>";
   echo "<td valign=top align=center bgcolor=$bgcolor class='font-black font-12'>
   <a href='editdata.php?op=$op&id={$rows['clascat2']}'>E</a></td>
   </tr>";
   $ves++;
   if($ves==3)
    $ves=1;
  }
 }
 else
 {
  echo "
  <tr><td valign=center align=center>
  No Hay Datos en la Tabla .....
  </td></tr>";
  // exit();
 }
}
if($op=="4") // Fabricantes
{
 echo "<tr><td align=left bgcolor='#4682B4' class=font-white font-12 height=30 colspan=6>
  Fabricantes
 </td></tr>
 <tr>
  <th align=center valign=bottom width='10' bgcolor='#666666' height=24>
   <span class='font-white font-10'><b>Código</b></span>
  </th>
  <th bgcolor='#666666' width=140>
   <span class='font-white font-10'><b>Proveedor</b></span>
  </th>
  <th bgcolor='#666666' width=140>
   <span class='font-white font-10'><b>Datos</b></span>
  </th>
  <th bgcolor='#666666' width=140>
   <span class='font-white font-10'><b>Productos</b></span>
  </th>
  <th align=center valign=top width='14' bgcolor='#666666'>
   <span class='font-white font-10'><b>B</b></span>
  </th>
  <th align=center valign=top width='14' bgcolor='#666666'>
   <span class='font-white font-10'><b>E</b></span>
  </th>
 </tr></thead><tbody>";
 $result1=mysqli_query($conex1,"select * from fabricante order by nomfab");
 while($rows=mysqli_fetch_array($result1))
 {
  include("campos.php");
  echo "<tr><td align=center valign=top bgcolor=#ffffff class='text41' valign=top align=center>{$rows['codfab']}</td>
  <td valign=top align=center bgcolor=#ffffff>";
  // $fotofab="{$rows['fotofab']}";
  if(!empty($fotofab) and $fotofab<>'Array')
  { echo "<img src='../empresas/$fotofab' nosave border=0>"; }
  echo "</td><td valign=top align=left bgcolor=#ffffff class=font-black font-10>";
  if(!empty($dirfab))
  { echo "Direccion: $dirfab"; }
  if(!empty($telfab1))
  { echo "<br>Telf.: $telfab1"; }
  if(!empty($telfab2))
  { echo ", $telfab2"; }
  if(!empty($telfab3))
  { echo ", $telfab3"; }
  if(!empty($webfab))
  { echo "<br>Sitio Web: <a href='$webfab' target='_blank'>$webfab</a>";
  if(!empty($email))
  { echo "<br>Correo: $email"; }
  if(!empty($datafab))
  { echo "<br>Nota: $datafab"; }
  echo "</td><td align=center valign=top bgcolor='#FFFFFF'>";
  $numreg=0;
  $found=mysqli_query($conex1,"select codfab from clasificados where codfab='{$rows['codfab']}'");
  while($rows2=mysqli_fetch_row($found))
  {$numreg++;}
  if($numreg>0)
   echo "$numreg";
  echo "</td><td align=center valign=top bgcolor='#FFFFFF'>
   <a href=\"deletedata.php?op=$op&id={$rows['id']}\"><img src='../imagenes/graphs/x.gif' alt='Borrar datos' nosave border=0></a>
  </td>
  <td align=center valign=top bgcolor='#FFFFFF'>
   <a href=\"editdata.php?op=$op&id={$rows['id']}\"><img src='../imagenes/graphs/carpeta.gif' alt='Modificar datos' nosave border=0></a>
  </td>
  </tr>";
 }
}
if($op=='20') // clientes
{

$DBtable="usuarios";
$campo="iduser";
if(!isset($_GET['page']))
{ $page=1; }
else
{ $page=$_GET['page']; }
$max_results="10";
$from=(($page * $max_results) - $max_results);
if(!isset($start)) $start = 0;

 echo "<tr><td align=left bgcolor='#4682B4' class=font-white font-12 height=30 colspan=6>
   Listados de Usuarios
  </td></tr><tr><td align=center bgcolor='#666666' class=font-white font-12 height=30 colspan=6>";
  include("user-list-abc1.php");
  echo "</td></tr>
  <tr><th align=center valign=top bgcolor=#666666 class='font-white font-12'>#</th>
  <th align=left valign=top bgcolor=#666666 class='font-white font-12'>Nombre Apellido<br></th>
  <th align=left valign=top bgcolor=#666666 class='font-white font-12'>Datos</th>
  <th align=left valign=top bgcolor=#666666 class='font-white font-12'>Publicidad</th>
  <th align=left valign=top bgcolor=#666666 class='font-white font-12'>Ventas</th>
  <th align=left valign=top bgcolor=#666666 class='font-white font-12'>Presupuestos</th>
  </tr>
  </thead><tbody>";

  $num_filas=0;
 if(!isset($op2))
  $op2="";
 if($op2=='')
 { $query1="select * from $DBtable where idnivel<>'1' order by iduser LIMIT  $from, $max_results";
 }
 if($op2=='nom')
 {
  $query1="select * from $DBtable where nombre like '$nom%' order by nombre LIMIT  $from, $max_results";
 }
 $sql1=mysqli_query($conex1,$query1);
 $data=mysqli_fetch_array($sql1);
 $num_filas=mysqli_num_rows($sql1);
 if($num_filas>0)
 {
  $result2=mysqli_query($conex1,$query1);
  while($rows=mysqli_fetch_array($result2))
  {
   $numpublicidad=0;
   $query3="select * from clasificados where usuario='{$rows['usuario']}'";
   $sql3=mysqli_query($conex1,$query3);
   $numpublicidad=mysqli_num_rows($sql3);
   if($numpublicidad==0)
   { $numpublicidad=""; }
//
   $numventas=0;
   $query4="select * from accompra where vendedor='{$rows['usuario']}'";
   $sql4=mysqli_query($conex1,$query4);
   $numventas=mysqli_num_rows($sql4);
   if($numventas==0)
   { $numventas=""; }
//
   $numcompras=0;
   $query5="select * from accompra where usuario='{$rows['usuario']}'";
   $sql5=mysqli_query($conex1,$query5);
   $numcompras=mysqli_num_rows($sql5);
   if($numcompras==0)
   { $numcompras=""; }
//
   echo "<tr><td align=center valign=top bgcolor=#ffffff class='font-black font-10'>{$rows['iduser']}</td>
   <td valign=top bgcolor=#ffffff class='font-black font-10'>{$rows['nombre']} {$rows['apellido']}";
    if(!empty($rows['foto']))
    { echo "<br><img src='../fotos/{$rows['usuario']}/{$rows['foto']}' border=0 width=100 height=100>"; }
   echo "</td>
   <td valign=top bgcolor=#ffffff class='font-black font-10'>
    Usuario: {$rows['usuario']}
    <br>Direccion: {$rows['direccion']}
    <br>{$rows['ciudad']} &#124; {$rows['estado']} &#124; {$rows['id_pais']}
    <br>Telefono: {$rows['telefono']}
    <br>Celular: {$rows['celular']}
    <br>Website: {$rows['website']}
    <br>Correo: {$rows['email']}
   </td>
   <td valign=top align=center bgcolor=#ffffff class='font-black font-12'>";
    if($numpublicidad>0)
    { echo "<a href=\"javascript:popup2('../verdata2.php?op=pub&iduser={$rows['iduser']}&usuario={$rows['usuario']}')\">$numpublicidad<br>Ver</a>"; }
   echo "</td>
   <td valign=top align=center bgcolor=#ffffff class='font-black font-12'>";
    if($numventas>0)
    { echo "<a href=\"javascript:popup2('../verdata.php?op=ventas&iduser={$rows['iduser']}&usuario={$rows['usuario']}')\">$numventas<br>Ver</a>"; }
   echo "</td>
   <td valign=top align=center bgcolor=#ffffff class='font-black font-12'>";
    if($numcompras>0)
    { echo "<a href=\"javascript:popup2('../verdata.php?op=compras&iduser={$rows['iduser']}&usuario={$rows['usuario']}')\">$numcompras<br>Ver</a>"; }
   echo "</td>
   </tr>";
  }
  echo "<table width='100%' cellpadding=0 cellspacing=10>
  <tr><td align=center height='38'>";
  if($op2=='nom')
   $total_results2=mysqli_result(mysqli_query($conex1,"select count(*) as num from $DBtable where nombre like '$nom%' order by nombre"),0);
  else
   $total_results2=mysqli_result(mysqli_query($conex1,"select count(*) as num from $DBtable"),0);
  $total_pages=ceil($total_results2 / $max_results);
   if($total_pages<>'1')
   {
    if($page > 1)
     {$prev=($page - 1);
    echo "<a href='admindatos.php?op=20&op2=nom&nom=$nom&page=$prev'>&#60;&#60; Ant</a>&nbsp; "; }
    for($i=1; $i <= $total_pages; $i++)
    {
     if(($page) == $i)
     {
      echo "$i&nbsp;";
     } else {
      echo "<a href='admindatos.php?op=20&op2=nom&nom=$nom&page=$i'>$i</a>&nbsp; ";
     }
    }
    // Build Next Link
    if($page < $total_pages)
    {
     $next=($page + 1);
     echo "<a href='admindatos.php?op=20&op2=nom&nom=$nom&page=$next'>Sig &#62;&#62;</a> ";
    }

  echo "</td></tr></table>";
  }
 }
 else
 {
  echo "
  <tr><td valign=center align=center colspan=6 height=100>
  Estos Datos no estan en la Tabla .....
  </td></tr>";
  // exit();
}
}
if($op=='22') // Comentarios
{
 echo "<tr><td align=left bgcolor='#4682B4' class=font-white font-12 height=30>
  Comentarios
 </td></tr>";
}
if($op=='5es') // Productos Especiales
{
 echo "<tr><td align=left bgcolor='#4682B4' class=font-white font-12 height=30>
  Productos Especiales
 </td></tr>";
}
if($op=='40') // La Empresa
{
 echo "<tr><td align=left bgcolor='#4682B4' class=font-white font-12 height=30>
  La Empresa
 </td></tr>";
}
?>
<tbody>
</table>
<div class="container2">
<form action='<?php echo "postdata.php?op=$op"; ?>' method='post' enctype='multipart/form-data'>
<table border=0 cellspacing=1 cellpadding=6 width='100%'>
<?php
if($op=='1')
{
?>
<tr><td align=left valign=center bgcolor='#e6e6e6'>
<b>Nueva Categoría</b>
<input size='30' maxlength='40' type='text' name='categoria'>
<input type='submit' value='Enviar Datos'>&nbsp;&nbsp;</td></tr>
<?php
}
elseif($op=='2')
{
?>
<tr><td align=leftt bgcolor='#e6e6e6' class=font-black font-12 colspan=2>
<b>Nueva SubCategoria</b>
</td></tr><tr>
<td align=right bgcolor='#e6e6e6'>Categoria
      <?php
       echo "<select name='clascat1'>
       <option selected>seleccione</option>";
       $resultado=mysqli_query($conex1,"select * from clascat1 order by categoria ");
       while ($rows=mysqli_fetch_array($resultado))
       { echo "<option value='{$rows['clascat1']}'>{$rows['categoria']}</option>"; }
       echo "</select>";
       ?>
</td><td align=left bgcolor='#e6e6e6' class=font-black font-12>
<input size='30' maxlength='50' type='text' name='subcategoria'><input type='submit' value='Enviar Datos'>&nbsp;&nbsp;
</td></tr>
<?php
}
else
{
?>
<tr><td align=leftt class=font-black font-12>
<b>Agrega Nuevo Datos</b>
</td></tr><tr>
<?php
}
?>
</table>
</form>
</div>
<?php
if($op=='rbd') // reparar base de datos
{
 $queryerror="error en la tabla";
 $sql="show tables from clasificados";
// Analiza Tablas
 echo "<br>Analizando las Tablas<br>";
 $result=mysqli_query($conex1,$sql);
 while($row=mysqli_fetch_row($result))
 {
  $DBtable="$row[0]";
  echo "$DBtable <br> ";
  $sqldb="analyze table $DBtable";
  $resultdb=mysqli_query($conex1,$sqldb) or die ("$queryerror $sqldb. " . mysqli_error());
 }
// Repair Tablas
 echo "<br>Reparando las Tablas<br>";
 $result=mysqli_query($conex1,$sql);
 while($row=mysqli_fetch_row($result))
 {
  $DBtable="$row[0]";
  echo "$DBtable <br> ";
  $sql2="repair table $DBtable";
  $result1=mysqli_query($conex1,$sql2) or die ("$queryerror $sql2. " . mysqli_error());
 }
// Optimizar Tablas
 echo "<br>Optimizando las Tablas<br>";
 $result=mysqli_query($conex1,$sql);
 while($row=mysqli_fetch_row($result))
 {
  $DBtable="$row[0]";
 echo "$DBtable <br> ";
  $sql2="optimize table $DBtable";
  $result1=mysqli_query($conex1,$sql2) or die ("$queryerror $sql2. " . mysqli_error());
 }
echo "<html><meta http-equiv=refresh content=0;url=listo.php>";
}
?>

