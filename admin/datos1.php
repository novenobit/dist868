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
$dropdown="S";
$topAdmin="S";
$breadCrumb="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
?>

<style type="text/css">
#dataTable { border-collapse: collapse; border:1px solid red; width: 750px; font-size:12px;}
.dataTable { border-collapse: collapse; border:1px solid red; width: 100%; font-size:12px;}
.dataTable td, .dataTable th {border: 1px solid gray; padding: 2px 4px; margin:0px;}
.dataTable thead th { background-color:#3f6daf; color: white; font-weight:bold; } /* text-align:center; */
.dataTable thead a {text-decoration:none; color:white; }
.dataTable thead a:hover { text-decoration: underline;}
/* Firefox has missing border bug! https://bugzilla.mozilla.org/show_bug.cgi?id=410621 */
/* Firefox 2 */
 html>/**/body .dataTable, x:-moz-any-link {margin:1px;}
/* Firefox 3 */
 html>/**/body .dataTable, x:-moz-any-link, x:default {margin:1px}
</style>
<table class='table is-bordered' width=100%>
<tr><td align=left bgcolor='#36648B' class=font-white font-12 height=30>
 Grafico de Ventas
</td></tr>
</table>

<img src="../libs1/phpgraphlibs1/testmysql1.php" />
<?php
//include('data-graphs.php');
?>
<br><br>
<table class='table is-bordered' width=100%>
<tr><td align=left bgcolor='#36648B' class=font-white font-12 height=30>
 Productos en Estado Mínimo
</td></tr>
</table>
<br><br>
<table class='table is-bordered' width=100%>
<tr><td align=left bgcolor='#36648B' class=font-white font-12 height=30>
 Reporte Mensual
</td></tr>
</table>
<br><br>
<?php
$num_filas=0;
$query3="select * from clasificados where cantidad<='1'";
$sql3=mysqli_query($conex1,$query3);
$num_filas2=mysqli_num_rows($sql3);
if($num_filas2>0)
{
 if($num_filas<=3)
 { $height="160px";
  $Theight="160"; }
 else
 { $height="260px";
 $Theight="260"; }
// echo "x $num_filas2";
?>
<table width='100%' cellpadding=6 cellspacing=1 border=0 class=tablegrayborder>
 <tr>
  <td valign=top align=left bgcolor=#253244>
   <span class=font-white font-12>Productos en Estado Mínimo</span>
  </td>
 </tr>
</table>
<?php
$ves=1;
$bgcolor='#ffffff';
echo "<table id='data' class='dataTable' width=100%>
<thead>
 <tr><th height=24 align=left>
  &nbsp;&nbsp;Producto
  </th><th align=center height=24 width=130>
  Existencia
  </th><th align=center height=24 width=130>
  Ventas
 </th></tr></thead>
 <tbody>";
// ALTER TABLE productos CHANGE maxima maxima INT( 4 ) NULL DEFAULT NULL
$sql=mysqli_query($conex1,"select * from clasificados where cantidad<='1'");
while($prodata=mysqli_fetch_array($sql))
{
 if($ves==1)
  $bgcolor="#ffffff";
 if($ves==2)
  $bgcolor="#EAEAEA";
 $num_filas32=0;
 $query32="select idcesta,id_cuenta from respaldo_cesta where idac='{$prodata['idac']}'";
 $sql32=mysqli_query($conex1,$query32);
 $num_filas32=mysqli_num_rows($sql32);
 echo "<tr><td align=left bgcolor=$bgcolor class=proddata1>&nbsp;{$prodata['clastitle']}</td>
 <td align=center bgcolor=$bgcolor class=proddata1>&nbsp;{$prodata['cantidad']}</td>";
 if($num_filas32>0)
  echo "<td align=center bgcolor=$bgcolor width=110 class=proddata1> $num_filas32 &nbsp;</td></tr>";
 else
  echo "<td align=center bgcolor=$bgcolor width=110 class=proddata1></td></tr>";
 $ves++;
 if($ves==3)
  $ves=1;
 }
}
?>
</table>

<br><br>
<table class='table is-bordered' width=100%>
<tr><td align=left bgcolor='#36648B' class=font-white font-12 height=30>
 Otros
</td></tr>
</table>
<br>Anulaciones: (0) Bs. 0
<br>Devoluciones: (0) Bs. 0
<br>Cubiertos: () Media Bs.: 0,00
<br>Media Factura (0) Bs.: 0
<br>
