<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  admin1.php                                                 //
// ****************************************************************
include_once("../includes/session.php");

$accordion="S";
$aos="N";
$autoPro="S";
$breadCrumb="S";
$divider="S";
$dropdown="S";
$forms="N";
$header="N";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$loadPage="N";
$menu="N";
$message="S";
$modal="N";
$popup="N";
$rating="N";
$sidebar="S";
$slick="N";
$swiper="N";
$tabs="N";
$table="S";
$topAdmin="N";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
// --------------------------------------------
if(!isset($areasSistema))
{
 include_once("../bots/AreasSistema.php");
}
if($AreaProductos<>"S" and $AreaAdmin<>"S")
{
  $error="No Tienes Permiso de Usar Esta Seccion";
  error();
  echo "<html><meta http-equiv=refresh content=3;url=$dirRoot"."users/usersection.php>";
  exit();
}
// --------------------------------------------
$num=0;
$dia=date("d");
$mes=date("m");
$ano=date("Y");
$amfm=date("a");
?>

<div class="ui grid">
  <div class="ten wide column">
    <h2>Importar los Nuevos Usuarios de la Tabla de Clientes</h2>
    <div class="ui pink big message">
      <p>Esta Operacion puede Durar Varios Minutos
      <br>Te Aviso cuando estoy listo</p>
    </div>
  </div>
  <div class="six wide column">
   <?php include("../libs1/loader.php"); ?>
  </div>
</div>


<table class="ui table">
 <tr>
  <td class='tdBorder center aligned'>
    CID/RIF
  </td>
  <td class='tdBorder'>
    Cliente
  </td>
 </tr>

<?php
$conex1=mysqli_connect($DBhost, $DBuser, $DBpass) or die("NO se pudo realizar la conexi&oacute;n");
$db_selected1=mysqli_select_db($conex1,$DBase1);
// ----------------------------

$sqlC=mysqli_query($conex1,"select * from clientes order by nom_cliente");
while($clienteData=mysqli_fetch_array($sqlC))
{
 $id_cliente= $clienteData['id_cliente'];
 $cid_cliente=$clienteData['cid_cliente'];
 $cid_usuario=$clienteData['cid_cliente'];
 $cod_cliente=$clienteData['cod_cliente'];
 $clave=$cod_cliente;
 $nom_cliente=$clienteData['nom_cliente'];
 $empresa_cliente=$clienteData['empresa_cliente'];
 $empresa=$clienteData['empresa_cliente'];
 $encargado=$clienteData['encargado'];
 $dir1_cliente=$clienteData['dir1_cliente'];
 $dir2_cliente=$clienteData['dir2_cliente'];
 $ciudad_cliente=$clienteData['ciudad_cliente'];
 $estado_cliente=$clienteData['estado_cliente'];
 $id_pais=$clienteData['id_pais'];
 $tel1_cliente=$clienteData['tel1_cliente'];
 $tel2_cliente=$clienteData['tel2_cliente'];
 $email_cliente=$clienteData['email_cliente'];
 $url_cliente=$clienteData['url_cliente'];
 $foto_cliente=$clienteData['foto_cliente'];
 $tipo_cliente=$clienteData['tipo_cliente'];
 $nivelprecio=$clienteData['nivelprecio'];
 $nota_cliente=$clienteData['nota_cliente'];
 $contribuyente=$clienteData['contribuyente'];
 $lista_correo=$clienteData['lista_correo'];
 $vendedor=$clienteData['vendedor'];
 $ip_cliente=$clienteData['ip_cliente'];
 $activo=$clienteData['activo'];

//---------------------------------
  if(!isset($dir1_usuario))
  { $dir1_usuario=""; }
  if(!isset($nombre))
  { $nombre=""; }
  if(!isset($apellido))
  { $apellido=""; }

  if(!isset($dir2_usuario))
  { $dir2_usuario=""; }
  if(!isset($ciudad))
  { $ciudad=""; }
  if(!isset($estado))
  { $estado=""; }
  if(!isset($email))
  { $email=""; }
  if(!isset($telefono))
  { $telefono=""; }
  if(!isset($celular))
  { $celular=""; }
  if(!isset($website))
  { $website=""; }
  if(!isset($foto))
  { $foto=""; }
  if(!isset($id_tipoemp))
  { $id_tipoemp=""; }
  if(!isset($idnivel))
  { $idnivel="5"; }
  if(!isset($tipousuario) or $tipousuario=="C")
  { $tipousuario="C"; }
  if(isset($tipo_cliente) or $tipo_cliente=="")
  { $tipo_cliente="DIS"; }

  if(!isset($nivelprecio) or $nivelprecio=="1" or $nivelprecio=="N")
  { $nivelprecio="1"; }
  if(!isset($lista_correo) or $lista_correo=="")
  { $lista_correo="S"; }
  if(!isset($vendedor))
  { $vendedor=""; }
  if(!isset($nota))
  { $nota=""; }
  if(!isset($submitted))
  { $submitted="$dia/$mes/$ano"; }
  if(!isset($activo))
  { $activo="S"; }
//---------------------------------
 echo "<tr>
  <td class='tdBorder center aligned'>
   $cid_cliente
  </td>
  <td class='tdBorder'>
   $nom_cliente &#124; $nivelprecio
  </td>
 </tr>";
//---------------------------------
 $numFilas2=0;
 $numFilas3=0;
 $sql2=mysqli_query($conex1, "select iduser from usuarios where cid_usuario='$cid_usuario'");
 $numFilas2=mysqli_num_rows($sql2);
// $sql3=mysqli_query($conex1, "select iduser from usuarios where usuario='$usuario'");
// $numFilas3=mysqli_num_rows($sql3);

 if($numFilas2==0)
 {
   $query2="insert into usuarios(usuario, cid_usuario, clave, empresa, nombre, apellido, dir1_usuario, dir2_usuario, ciudad, estado, email, telefono, celular, website, foto, id_tipoemp, idnivel, tipousuario, tipo_cliente, nivelprecio, lista_correo, vendedor, nota, submitted, activo)
   values('$cid_usuario', '$cid_usuario', '$clave', '$empresa', '$nombre', '$apellido', '$dir1_usuario', '$dir2_usuario', '$ciudad', '$estado', '$email', '$telefono', '$celular', '$website', '$foto', '$id_tipoemp', '$idnivel', '$tipousuario', '$tipo_cliente', '$nivelprecio', '$lista_correo', '$vendedor', '$nota', '$submitted', '$activo')";
   echo "<tr>
    <td class='tdBorder' colspan='2'>
     $query2
   </td></tr>";
   $result2=mysqli_query($conex1,$query2);
 }
//---------------------------------
} // end DoWhile
?>
</table>
