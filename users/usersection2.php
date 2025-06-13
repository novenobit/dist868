<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Usuarios                                          //
//  usersection2.php                                                        //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform�tica, C.A.          //
// ***************************************************************************
$bgcolor1="#ffffff";
$bgcolor2="#e9e9e9";
$height=10;
?>
<center>
<table cellpadding=4 cellspacing=1 border=0 width='<?php echo "$webwidth"; ?>' bgcolor=#ffffff>
 <tr>
  <td valign=top align=left width=180>
   <?php include("userleft.php");
   include("userright.php"); ?>
  </td>
  <td valign=top align=left>
   <?php
    $title="Ultimos Avisos ";
    $sqlbycat="select * from clasificados where activo='S' order by idac desc limit 11";
    listacbycat($sqlbycat,$title);
   ?>
  </td>
 </tr>
</table>
</center>
