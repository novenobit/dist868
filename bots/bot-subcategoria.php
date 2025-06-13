<?php
//include("$dirRoot"."bots/bot-subcategoria.php");
$Condicion="";
$Table="subcategoria";
if(isset($CamposSC))
{ $Campos=$CamposSC; }
else
{ $Campos="*"; }

if(isset($Campos))
{
 if(isset($id) and $id<>"")
 { $Condicion="where cod_subcategoria='$id'"; }
 //if(isset($codigo_barra) and $codigo_barra<>"")
 //{ $Condicion="where codigo_barra='$codigo_barra'"; }
 if(isset($id_subcategoria) and $id_subcategoria<>"")
 { $Condicion="where id_subcategoria='$id_subcategoria'"; }
 if(isset($cod_subcategoria) and $cod_subcategoria<>"")
 { $Condicion="where cod_subcategoria='$cod_subcategoria'"; }
 if(isset($_GET['cod_subcategoria']))
 { $Condicion="where cod_subcategoria='{$_GET['cod_subcategoria']}'"; }
 if(isset($codSubCat) and $codSubCat<>"")
 { $Condicion="where cod_subcategoria='$codSubCat'"; }
 findData($Campos,$Table,$Condicion);
 if(isset($Data))
 {
   $subCatData=$Data;
   return $subCatData;
 }
}
?>
