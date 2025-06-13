<?php
$Condicion="";
if(isset($_GET['iduser']))
{ $iduser="$_GET[iduser]"; }

if(isset($_GET['cid_usuario']))
{ $cid_usuario="$_GET[cid_usuario]"; }
$Table="usuarios";
if(isset($CamposUsuario))
{ $Campos=$CamposUsuario; }
else
{ $Campos="*"; }
if(isset($iduser) and $iduser<>"" and $iduser<>"")
{ $Condicion="where iduser='$iduser'"; }
if(isset($cid_usuario) and $cid_usuario<>"" and empty($Condicion))
{ $Condicion="where cid_usuario='$cid_usuario'"; }
if(isset($Condicion))
{
 findData($Campos,$Table,$Condicion);
 if(isset($Data)and !empty($Data))
 {
  $usuarioData=$Data;
  return $usuarioData;
 }
}
else
{ echo "error en los datos"; }
?>
