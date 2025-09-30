<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  cuenta1-ver1.php                                                        //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$breadCrumb="S";
$icon="S";
$image="S";
$label="S";
$list="N";
$message="S";
$table="S";
$tableUse="cuentas1";
$dirRoot="../";
include_once("../includes/headfilePrinter.php");
FechayHora();
?>

<div class="noPrintArea">
 <div class="container">
      <div class="row">
        <div class="col-6">
           <h3>Imprimir Cuenta</h3>
        </div>
        <div class="col-3">
             <a class='ui primary button' href="javascript:window.print()" style='border-radius:25px;'>Imprimir Hoja</a>
        </div>
        <div class="col-3">
             <a class='ui orange button font-10' href="javascript:window.close()" style='border-radius:25px;'>Cierra la Ventana</a>
        </div>
      </div>
 </div>
</div>

<?php

FechayHora();
$todoBien="N";

 //include("../includes/leftbar.php");
 if(isset($_GET['id']))
 { $id=$_GET['id']; }
 if(isset($_GET['op']))
 { $op=$_GET['op']; }
 if(isset($_GET['op2']))
 { $op=$_GET['op2']; }
 if(isset($_GET['codCat']))
 { $codCat=$_GET['codCat']; }
 if(isset($_GET['codSubCat']))
 { $codSubCat=$_GET['codSubCat']; }
 if(isset($_GET['cod_marca']))
 { $cod_marca=$_GET['cod_marca']; }
 if(isset($_GET['cod_proveedor']))
 { $cod_proveedor=$_GET['cod_proveedor']; }
 if(isset($_GET['id_pais']))
 { $id_pais=$_GET['id_pais']; }

 if(!isset($op))
 { $op="all"; }
 if(!isset($codCat))
 { $codCat=""; }
 if(!isset($codSubCat))
 { $codSubCat=""; }
 if(!isset($cod_marca))
 { $cod_marca=""; }
 if(!isset($cod_proveedor))
 { $cod_proveedor=""; }
 if(!isset($id_pais))
 { $id_pais=""; }
 if(!isset($cod_pais))
 { $cod_pais=""; }

 if($op=="all")
 { $titlePage="Todos No Disponble"; }
 if($op=="cat")
 { $titlePage="No Disponble Por Categoria"; }
 if($op=="sub")
 { $titlePage="No Disponble Por Sub-Categoria"; }
 if($op=="prv")
 { $titlePage="No Disponble Por Proveedor"; }
 if($op=="mar")
 { $titlePage="No Disponble Por Marca"; }
 if($op=="pai")
 { $titlePage="No Disponble Por Pais"; }
?>

<h1>No Disponible</h1>

    <?php
      $num=0;
      $num1=1;
  //-------------------------------
      if(!isset($max_results) or $max_results==0 or $max_results=="")
      {
        $max_results=200;
      }
      if(!isset($_GET['page']))
      { $page=1; }
      else
      { $page=$_GET['page']; }
      $campo="nom_producto";
      $exefile2="no-disponible2.php";
      $table="productos";
      $toreturn="no-disponible.php";
      $from=(($page * $max_results) - $max_results);
      if(!isset($start)) $start=0;
  //-------------------------------

      if($op=="all")
      { $sqldata="select * from productos where estado='2'"; }
      if($op=="cat" and $codCat<>"")
      { $sqldata="select * from productos where cod_categoria='$codCat' and estado='2' "; }
      if($op=="sub" and $codSubCat<>"")
      { $sqldata="select * from productos where cod_subcategoria='$codSubCat' and estado='2' "; }
      if($op=="prv" and $cod_proveedor<>"")
      { $sqldata="select * from productos where cod_proveedor='$cod_proveedor' and estado='2' "; }
      if($op=="mar" and $cod_marca<>"")
      { $sqldata="select * from productos where brand_marca='$cod_marca' and estado='2' "; }
      if($op=="pai" and $cod_pais<>"")
      { $sqldata="select * from productos where cod_pais='$cod_pais' and estado='2' "; }
      $numFilas=0;
      if(isset($sqldata))
      {
        $sqlNumPro=mysqli_query($conex1,$sqldata);
        $numFilas=mysqli_num_rows($sqlNumPro);
      }
      if($numFilas>0)
      {

  //--------------------------

?>

<table class="ui padded unstackable celled table">
 <thead>
  <tr>
    <th class='center aligned' style='background-color:#2f50c1;color:#d9e6fd;width:200px'>Foto</th>
    <th  style='background-color:#2f50c1;color:#d9e6fd;'><?php echo $titlePage; ?></th>
  </tr>
 </thead>
 <tbody>
 <?php
  $num=0;
  if(!isset($sqldata) or empty($sqldata))
  {
    $error="No hay Datos, ningun producto o la fecha no fue seleccionado";
    echo "</table>";
    $boxColorH="red";
    $boxTitle="No hay Datos";
    $boxData="<p>No Hay Datos o Ningun producto fue seleccionado .....</p>";
    $boxColor="white";
    $boxFoot="";
    $boxColorF="";
    include("$dirRoot"."data/boxData.php");
    error();
    exit();
  }
  else
  {
    FlushData();
    $sql=mysqli_query($conex1,"$sqldata");
    while($proData=mysqli_fetch_array($sql))
    {
      $findCategoria="S";
      include("$dirRoot"."datafiles/proData.php");
      if($precio1_producto=="0")
      { $precio1_producto=""; }
      if($precio2_producto=="0")
      { $precio2_producto=""; }
      if($precio3_producto=="0")
      { $precio3_producto=""; }
      $fontColor="font-black";

      $bgcolor="white";

      echo "<tr>";
      if($proData['foto_producto']<>"")
      { echo "<td class='center aligned' style='width:200px;background-color:#ffffff;'>"; }
      else
      { echo "<td class='center aligned' style='width:200px'>"; }


        if($proData['foto_producto']<>"")
        {
          echo "<img class='ui small centered image' src='$dirRoot"."imagenes/productos/{$proData['foto_producto']}' style='width:90px'>";
        }
        else
        {
          echo "<img class='ui centered circular image' src='$dirRoot"."imagenes/productos/sinfoto2.png' style='height:90px'>";
        }

      echo "</td><td style='background-color:$bgcolor;'>";

      echo "<span class='font-16 font-black'>{$proData['nom_producto']}</span>";


      if(isset($codigo_barra) and $codigo_barra<>"")
      { echo "<br>Codigo Barra: $codigo_barra"; }

      if(isset($nom_categoria) and $nom_categoria<>"")
      { echo " &#124; Categoria: $nom_categoria"; }

      if(isset($nom_subcategoria) and $nom_subcategoria<>"")
      { echo " &#124; Sub-Categoria: $nom_subcategoria"; }

      if($precio1_producto>0)
      { echo "<br>Precio Detal: $precio1_producto"; }

      if(isset($VerPrecioMayor) and $VerPrecioMayor=="S")
      {
        if($precio2_producto>0 and $precio2_producto<>"")
        { echo " &#124; Precio Mayorista: $precio2_producto"; }
      }
      if(isset($VerPrecioEspecial) and $VerPrecioEspecial=="S")
      {
        if($precio3_producto>0 and $precio3_producto<>"")
        { echo " &#124; Precio Especial: $precio3_producto"; }

      }
      if(isset($proData['nom_unidad']) and $proData['nom_unidad']<>"")
      { echo "<br>Unidad: {$proData['nom_unidad']}"; }
      if(isset($proData['empaque']) and $proData['empaque']<>"")
      { echo " &#124; Empaque: {$proData['empaque']}"; }

      if(isset($proData['stock_actual']) and $proData['stock_actual']>0)
      { echo " &#124; Stock: {$proData['stock_actual']}"; }

      if($datos_producto<>"")
      { echo "<br>Nota: $datos_producto"; }

      echo "</td></tr>";
      $num++;
      FlushData();
    }
    if($num==0)
    {
      echo "<tr><td colspan=2>";
      $boxColorH="cardColor";
      $boxTitle="Nada Aqu&iacute;";
      $boxData="<p>No Hay Datos Para Esta Fecha .....</p>";
      $boxColor="white";
      $boxFoot="";
      $boxColorF="";
      include("$dirRoot"."data/boxData.php");
      echo "</td></tr>";
    }
  }
 ?>
 </tbody>
</table>
<br>Num.Productos: <?php echo $num; ?>

<?php
}

$endPage="N";
// $showStatus="N";
//include("$dirRoot"."includes/statusAdmin.php");
?>
<script language="JavaScript" type="text/javascript">
 if (window.print)
 { window.print(); }
</script>
</body></html>
