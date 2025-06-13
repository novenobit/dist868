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
    <h2>Importar los Clientes</h2>
    <div class="ui pink big message">
      <p>Esta Operacion puede Durar Varios Minutos
      <br>Te Aviso cuando estoy listo</p>
    </div>
  </div>
  <div class="six wide column">
   <?php include("../libs1/loader.php"); ?>
  </div>
</div>

<?php
$conex1=mysqli_connect($DBhost, $DBuser, $DBpass) or die("NO se pudo realizar la conexi&oacute;n");
$db_selected1=mysqli_select_db($conex1,$DBase1);
// ----------------------------
$fileD868="clientes.csv";
if(!file_exists("../docs/$fileD868")) {
 echo "<p class='font-red font-bold'>El Archivo NO Existe</p>";
 echo "<html><meta http-equiv=refresh content=6;url=right-menu.php>";
 exit();
}

$fileOpenD868=fopen("../docs/$fileD868", 'r');
if($fileOpenD868 !== FALSE)
{
 while(($dataD868 = fgetcsv($fileOpenD868, 200, '|')) !== FALSE)
 {
   $nom_cliente=$dataD868[0];
   $cid_cliente=$dataD868[1];
   $dir1_cliente=$dataD868[2];
   $tel1_cliente=$dataD868[3];
   $tel2_cliente=$dataD868[4];
   $vendedor=$dataD868[5];
 // ---------------------
   //$cid_cliente
   $cod_cliente="";
   //$nom_cliente
   $empresa_cliente=$nom_cliente;
   //$dir1_cliente
   $dir2_cliente="";
   $ciudad_cliente="";
   $estado_cliente="";
   $id_pais="ve";
   //$tel1_cliente
   //$tel2_cliente
   $email_cliente="";
   $url_cliente="";
   $foto_cliente="";
   $tipo_cliente="";
   $nivelprecio="";
   $nota_cliente="";
   $contribuyente="S";
   $lista_correo="S";
   //$vendedor
   $ip_cliente="";
   if($cid_cliente<>"")
   {
    $num_filas=0;
    $result=mysqli_query($conex1,"select id_cliente from clientes where cid_cliente='$cid_cliente'");
    $num_filas=mysqli_num_rows($result);
    if($num_filas==0)
    {
     $query2="insert into clientes(cid_cliente, cod_cliente, nom_cliente, empresa_cliente, dir1_cliente, dir2_cliente, ciudad_cliente, estado_cliente, id_pais, tel1_cliente, tel2_cliente,  email_cliente, url_cliente, foto_cliente, tipo_cliente, nivelprecio, nota_cliente, contribuyente, lista_correo, vendedor, ip_cliente, activo)
     values('$cid_cliente', '$cod_cliente', '$nom_cliente', '$empresa_cliente', '$dir1_cliente', '$dir2_cliente', '$ciudad_cliente', '$estado_cliente', '$id_pais', '$tel1_cliente', '$tel2_cliente',  '$email_cliente', '$url_cliente', '$foto_cliente', '$tipo_cliente', '$nivelprecio', '$nota_cliente', '$contribuyente', '$lista_correo','$vendedor','$ip_cliente','S')";
     $result2=mysqli_query($conex1,$query2);
     $todoBien="S";
     echo "<br>$query2";
    }
   }
 } // end DoWhile
}
fclose($fileOpenD868);
?>
