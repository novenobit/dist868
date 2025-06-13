<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-subcat-del1.php                                                     //
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
include_once("../libs1/loader.php");
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}

if(isset($_GET['id']))
{ $id="$_GET[id]"; }

$sqldel="delete from subcategoria where id_subcategoria='$id'";
$resultdel=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
$sql1="repair table subcategoria";
$result2=mysqli_query($conex1,$sql1) or die ("$queryerror $query. " . mysqli_error());
$numFilas=0;
$sqlSubCat=mysqli_query($conex1, "select id_subcategoria from subcategoria where id_subcategoria='$id'");
$numFilas=mysqli_num_rows($sqlSubCat);
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
<p><a class='ui orange button' href="javascript:window.close()"><i class="window close outline icon"></i> Cierra la Ventana</a></p>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }
</script>
