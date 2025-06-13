<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-cat-del1.php                                                        //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$topFile="N";
$headFile="N";
$topAdmin="N";
$dirRoot="../";
$autoPro="S";
$dropdown="S";
$findData="S";
$forms="S";
$header="S";
$label="S";
$menu="S";
$message="S";
$icon="S";
$image="S";
$input="S";
$item="S";
$loadPage="S";
$popup="S";
$table="S";
$tabs="S";
$whiteBackground="S";
include_once("../includes/headfileFrame.php");
//-------------------------------------------
if(isset($_GET['id']))
{ $id=$_GET['id'];
 $id_categoria=$id;
}
if(!isset($id) or $id=="")
{
     $error="error en los datos";
     error();
     exit();
}
if(isset($id) and $id<>"")
{
   $id_categoria=$id;
   include("$dirRoot"."bots/bot-categoria.php");
   if(!isset($catData))
   {
      $error="esta categoria no existe en la base de datos";
      error();
      exit();
   }
   else
   {
      $sqldel="delete from categoria where id_categoria='$id'";
      $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $sqldel. " . mysqli_error());
   }
}
$numFilas=0;
$sqlCat=mysqli_query($conex1, "select id_categoria  from categoria where id_categoria='$id'");
$numFilas=mysqli_num_rows($sqlCat);
if($numFilas==0)
{
       echo "<div class='ui red message'>
        <div class='header'>Los Datos Fueron Borrados, Puede Cerrar la Ventana</div>
       </div>";
}
else
{
       echo "<div class='ui red message'>
        <div class='header'>Puede Cerrar la Ventana</div>
       </div>";
}
?>
<script>
window.parent.location = window.parent.location
</script>
