<?php
// ******************************************************** 2006 - 2018 ***
// Sistema Dist868                 //
// Copyright (c) 2006 NovenoBIT.com                                      //
// ************************************************************************
include("./includes/headfile.php");
include("./libs1/dataBase/config-db.php");
//include("./includes/language.php");
include("./includes/topfile.php");

if(isset($_GET["idcart"]))
{ $idcart="$_GET[idcart]"; }

FechayHora();
$todoBien="N";
$numFilas=0;
$totalD=0;
$Ttotal1=0;
$TtotalD=0;
?>

<main class="responsive">
  <h2 class="center-align">Contenido de la Cesta</h2>
  <div class="large-space"></div>


<?php
$sql=mysqli_query($conex1, "select * from pedir_online1 where idcart='$idcart'");
$numFilas=mysqli_num_rows($sql);
if($numFilas>0)
{
?>
<div class="grid">
 <div class="s12 m6 l6">
  <article class="round padding">
  <?php
   $num=0;
   $pedirData=mysqli_fetch_array($sql);
   if(isset($pedirData))
   {
    $idcart=$pedirData['idcart'];
    $id_cuenta=$pedirData['id_cuenta'];
    $cid_cliente=$pedirData['cid_cliente'];
    $email_cliente=$pedirData['email_cliente'];
    $ip_cliente=$pedirData['ip_cliente'];
    $nota_pedido=$pedirData['nota_pedido'];
    $cerrarcuenta=$pedirData['cerrarcuenta'];
    $envia_retira=$pedirData['envia_retira'];
    $hora_retira=$pedirData['hora_retira'];
    $hora_abierta=$pedirData['hora_abierta'];
    $hora_cerrar=$pedirData['hora_cerrar'];
    $rand_num=$pedirData['rand_num'];
    $fecha=$pedirData['fecha'];
    $ddia=substr($fecha,0,2);
    $dmes=substr($fecha,3,2);
    $dano=substr($fecha,6,4);
    $total_cambio=0;
    //include("$dirRoot"."libs/Calcular_PedidoOnline.php");
    if(!empty($cid_cliente))
    { $sqlfcli=mysqli_query($conex1,"select * from pedir_clientes where cid_cliente='$cid_cliente' or tel1_cliente='$cid_cliente' or tel2_cliente='$cid_cliente'");
      $clienteData=mysqli_fetch_array($sqlfcli);
    }
    echo "<p>Cuenta: $idcart<br>";
    if(!empty($cid_cliente))
    {
        echo "Cliente {$clienteData['nom_cliente']}";
        if(!empty($clienteData['dir1_cliente']))
        { echo "<br>Dir: {$clienteData['dir1_cliente']}"; }
        if(!empty($clienteData['tel1_cliente']))
        { echo "<br>Telf: {$clienteData['tel1_cliente']}"; }
        if(!empty($clienteData['tel2_cliente']))
        { echo "<br>Mobil: {$clienteData['tel2_cliente']}"; }
    }
    else
    {
      echo "<br><span class='font-20 font-red'>Falta Datos Cliente</span>";
    }
    if(!empty($repname))
    { echo "<br><a href='#'>Repartidor: $repname $repsurname"; }
    else
    {
       //echo "<a href='ajustes/cambiar-repartidor1.php?id_cuenta=$id_cuenta&sistema=PO' class='w3-button w3-round-xlarge restButton  w3-border'>Asigna<br>Repartidor</a>";
    }
    if($hora_abierta<>"")
    {
       echo "<br>H.Abierta: {$hora_abierta}<br>";
    }
    if($hora_cerrar<>"")
    {
       echo "<br>H.Entregado: {$hora_cerrar}<br>";
    }
    echo "Fecha de la Reserva: $ddia/$dmes/$dano";
   }
?>
  </article>
</div>
 <div class="s12 m6 l6">
  <article class='round padding'>
    <table class='border stripes'>
     <thead class="fixed">
      <tr><th>Item</th><th>Cant</th><th>Precio</th><th>Total</th></tr>
     </thead>
  <?php
       $num=0;
       $sqlCesta=mysqli_query($conex1,"select * from pedir_online2 where id_cuenta='$id_cuenta' ");
       while($cestaData=mysqli_fetch_array($sqlCesta))
       {
        $id_cuenta=$cestaData['id_cuenta'];
        $cid_cuenta=$cestaData['cid_cliente'];
        $email_cliente=$cestaData['email_cliente'];
        $id_item=$cestaData['id_item'];
        $cantidad=$cestaData['cantidad'];
        $precio1_item=$cestaData['precio1_item'];
        $nota_extra=$cestaData['nota_extra'];
        $hora=$cestaData['hora'];
        $enviado=$cestaData['enviado'];
        $submitted=$cestaData['submitted'];
        $rand_num=$cestaData['rand_num'];
        $numsession=$cestaData['numsession'];
//-----------------------------------------
        $sqlItems=mysqli_query($conex1,"select id_item,nom_item,precio1_item,precio2_item,precio3_item,precio_dolar,foto_item FROM items WHERE id_item='$id_item'");
        $itemData=mysqli_fetch_array($sqlItems);
        if(isset($itemData['nom_item']) and $itemData['nom_item']<>"")
        {
            $id_item=$itemData['id_item'];
            $nom_item=$itemData['nom_item'];
            $precio1_item=$itemData['precio1_item'];
            $precio_dolar=$itemData['precio_dolar'];
            $totalBs=$cantidad*$precio1_item;
            $totalD=$cantidad*$precio_dolar;
            $Ttotal1=$Ttotal1+$totalBs;;
            $TtotalD=$TtotalD+$totalD;
            $foto_item = $itemData['foto_item'];
            echo "<tr><td>$nom_item</td><td>$cantidad</td><td>$precio_dolar</td><td>$totalD</td></tr>";
            $num++;
        }
       }
  ?>
    </table>
     <?php  echo "Total: " . number_format($TtotalD, 2) . ""; ?>
    </article>
 </div>
</div>
<?php
}
else
{
?>
 <article class="no-elevate round">
  <div class="row top-align center-align">
    <div>
    <h2>Sin Datos</h2>
    </div>
  </div>
 </article>
<?php
}
?>


</main>


<?php
include("./includes/footer.php");
?>
