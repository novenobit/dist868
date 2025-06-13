<?php
// ************************************************************* 2023 ********
//  agrega-cesta1.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$aos="N";
$findData="S";
$forms="S";
$header="N";
$icon="S";
$image="S";
$input="S";
$item="N";
$label="S";
$list="N";
$menu="S";
$message="S";
$popup="N";
$rating="N";
$sidebar="N";
$table="S";
$topAdmin="S";
$dirRoot="../";
$tableUse="cuentas1";

include_once("../includes/headfileFrame.php");
FechayHora();
$todoBien="N";
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['id_cuenta']))
{ $id_cuenta=$_GET['id_cuenta']; }
if(isset($_GET['idCat']))
{ $idCat=$_GET['idCat']; }
if(isset($_GET['codCat']))
{ $codCat=$_GET['codCat']; }
if(isset($_GET['codSubCat']))
{ $codSubCat=$_GET['codSubCat']; }
if(isset($_GET['nivelprecio']))
{ $nivelprecio=$_GET['nivelprecio']; }
if(!isset($nivelprecio))
{ $nivelprecio=1; }
$linkpage="agrega-cesta4.php";

if(isset($codCat) and $codCat<>"")
{ include("../bots/find-categoria.php"); }
if(isset($catData))
{
  echo "<div class='ui blue message'>
    <h3 class='title is-3'>$nom_categoria</h3>
  </div>";
  // include("../bots/find-subcategoria.php");
  // include("list-subcategoria-h.php");
  //include("list-productos.php");
  // list-productos.php
  $num=1;
  $reg=0;
  $tableBucar="productos";
  $campo1="id_productos";
  $campo2="cod_subcategoria";
?>

 <p><a class='ui fluid blue button' href='javascript:history.back(1)' style='border-radius:20px;'><i class='angle double left icon font-white'></i> Retornar</a></p>
 <div class='ui hidden divider'></div>
 <div class="ui grid">
<?php
  $sqlProData=mysqli_query($conex1,"select id_producto,cod_producto,nom_producto,precio1_producto,precio2_producto,precio3_producto,precio4_producto,nom_unidad,empaque,stock_actual,foto_producto,estado from productos where cod_subcategoria='$codSubCat' and activo='S' order by nom_producto");
  while($proData=mysqli_fetch_array($sqlProData))
  {
   $id_producto=$proData['id_producto'];
   $codPro=$proData['cod_producto'];
   $nomProducto=$proData['nom_producto'];
   $precio1_producto=$proData['precio1_producto'];
   $precio2_producto=$proData['precio2_producto'];
   $precio3_producto=$proData['precio3_producto'];
   $precio4_producto=$proData['precio4_producto'];
   $nom_unidad=$proData['nom_unidad'];
   $empaque=$proData['empaque'];
   $stock_actual=$proData['stock_actual'];
   $fotoProducto=$proData['foto_producto'];
   $estado=$proData['estado'];
   if($fotoProducto=="")
   { $fotoProducto="sinfoto.png"; }
   if(file_exists("../imagenes/productos/$fotoProducto")) {
     //echo "The file exists";
   } else {
     $fotoProducto="sinfoto.png";
   }
   $numPCest=0;
   $sqlPCesta=mysqli_query($conex1, "select id_cuenta from cuentas2 where id_cuenta='$id_cuenta' and id_producto='$id_producto'");
   $numPCest=mysqli_num_rows($sqlPCesta);
   $bgColor="white";
   if($numPCest>0)
   { $bgColor="#ffff00"; }
//   echo "<div class='eight wide column' style='background-color:$bgColor;border-radius:25px;'>";
   echo "<div class='sixteen wide column' style='background-color:$bgColor;'>";
//      echo "<a href='pro-buscar1.php?id_cuenta=$id_cuenta&buscar=$codPro&dondebuscar=codPro&nivelprecio=$nivelprecio&sistema=$sistema'>";
       if($fotoProducto<>"sinfoto.png")
       {
         echo "<a href='$dirRoot"."imagenes/productos/$fotoProducto' target='_blank'>";
         echo "<img class='ui tiny left floated image' src='$dirRoot"."imagenes/productos/$fotoProducto'>";
         echo "</a>";
       }
       else
       {
       // echo "<img class='ui tiny centered circular image' src='$dirRoot"."imagenes/productos/sinfoto2.png'>";
       }

    echo "<a href='pro-buscar1.php?id_cuenta=$id_cuenta&buscar=$codPro&dondebuscar=codPro&nivelprecio=$nivelprecio&sistema=$sistema'>";
      //echo "<a  href='pro-buscar1.php?id_cuenta=$id_cuenta&buscar=$codPro&dondebuscar=codPro&nivelprecio=$nivelprecio&sistema=$sistema'>";
      echo "$nomProducto<br>";
      if(!isset($nom_unidad) or $nom_unidad<>"")
      { echo "<span class='font-10'>Und: $nom_unidad</span>"; }
      if(!isset($empaque) or $empaque<>"")
      { echo "<span class='font-10'> / Emp: $empaque</span>"; }
      if(!isset($stock_actual) or $stock_actual>0)
      { echo " / Stock: $stock_actual"; }
      if(!isset($nivelprecio) or $nivelprecio=="")
      { echo "<br>Precio: $precio1_producto</a>"; }
      if($nivelprecio==1)
      { echo "<br>Precio: $precio1_producto</a>"; }
      if($nivelprecio==2)
      { echo "<br>Precio: $precio2_producto</a>"; }
      if($nivelprecio==3)
      { echo "<br>Precio: $precio3_producto</a>"; }
      if($nivelprecio==4)
      { echo "<br>Precio: $precio4_producto</a>"; }
      if($estado=="" or $estado==1)
      { $Testado="Disponible"; }
      else
      { $Testado="No Disponible";
        echo "<br><b>Estado</b>: <span class='font-16 font-red'>$Testado</span>";
      }
?>
  </div>
<?php
    $num++;
    $reg++;
  }
?>
 </div>
<?php
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
}
?>

<div class="ui hidden divider"></div>
<div class='ui grid'>
  <div class='sixteen wide column'>
   <p><a class='ui fluid blue button' href='javascript:history.back(1)' style='border-radius:20px;'><i class='angle double left icon font-white'></i> Retornar</a></p>
  </div>
</div>

<?php
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
