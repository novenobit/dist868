<?php
// list-productos.php
$num=1;
$reg=0;
$tableBucar="productos";
$campo1="id_productos";
$campo2="cod_subcategoria";
$sqlProData=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto,foto_producto from productos where cod_subcategoria='$codSubCat' and activo='S' order by nom_producto");
while($proData=mysqli_fetch_array($sqlProData))
{
   $id_producto=$proData['id_producto'];
   $codPro=$proData['cod_producto'];
   $nomProducto=$proData['nom_producto'];
   $precio1_producto=$proData['precio1_producto'];
   $precio2_producto=$proData['precio2_producto'];
   $precio3_producto=$proData['precio3_producto'];
   $precio4_producto=$proData['precio4_producto'];
   $fotoProducto=$proData['foto_producto'];
   if($fotoProducto=="")
   { $fotoProducto="sinfoto.png"; }

   $numPCest=0;
   $sqlPCesta=mysqli_query($conex1, "select id_cuenta from cuentas2 where id_cuenta='$id_cuenta' and id_producto='$id_producto'");
   $numPCest=mysqli_num_rows($sqlPCesta);
   $bgColor="white";
   if($numPCest>0)
   {  $bgColor="pink"; }
   echo "<a class='fluid ui button' href='agrega-cesta4.php?id_cuenta=$id_cuenta&codCat=$codCat&codSubCat=$codSubCat&codPro=$codPro&sistema=$sistema'>
   <span class='font-14'>$nomProducto</span>
   <br>Precio: $precio1_producto</a><br>";
   $num++;
   $reg++;
}

if($reg==0)
{
  echo "<div class='ui red card'>
   <div class='content red'>
    <div class='header red'>Nada Aqui</div>
    <div class='meta'>
       <span>para la fecha no hay datos</span>
    </div>
    <p></p>
   </div>
  </div>";
 }
?>
