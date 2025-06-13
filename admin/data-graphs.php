<?php
<?php
// *******************************************************************
// Sistema Dist868                                                  //
// Copyright (c) 2023-2024 NovenoBIT.com                            //
// *******************************************************************
//include('../config2.ini.php');
//include('../config2.ini.php');
fechayhora();
$ves=1;
$bgcolor='#ffffff';
include_once('../libs1/maxChart.class.php');
include('total-ventas2.php');
?>
<table border='0' cellspacing='1' cellpadding='3' width=100% bgcolor=gray>
<tr><td align=left bgcolor='#cccccc'>
 Ventas
</td></tr>
</table>
<?php
 //include('plato-graph.php');
 echo "x $data";
 print_r ($data);
 if(!empty($data))
 { $mc=new maxChart($data);
 $mc->displayChart('Ventas',1,600,200,true); }
?>
