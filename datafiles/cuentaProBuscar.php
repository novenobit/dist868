<?php
//include("$dirRoot"."datafiles/cuentaProBuscar.php");

if(!isset($buscar) or $buscar=="")
{
      $error="No indico lo que voy a buscar";
      error();
      exit();
}
if(!isset($dondebuscar) or $dondebuscar=="")
{
      $error="No indico lo que voy a buscar";
      error();
      exit();
}
if($dondebuscar=="nombre")
{
      $titleBuscar="Nombre";
      $campoBuscar="nom_producto";
      $buscar = preg_replace("/=/", "=\"\"", $buscar);
      $buscar = preg_replace("/&quot;/", "&quot;\"", $buscar);
      $buscar=substr($buscar,0,20);
      $sqldata="select * from productos where $campoBuscar like '%$buscar%' and activo='S' order by nom_producto";
}
if($dondebuscar=="precio")
{
  if(!is_numeric($buscar))
  {
        $error="No es un valor Numerico; $buscar";
        error();
        exit();
  }
       $titleBuscar="Precio";
       $campoBuscar="precio1_producto";
       $sqldata="select * from productos where $campoBuscar='$buscar' and activo='S' order by nom_producto";
}
if($dondebuscar=="ultimos")
{  $titleBuscar="Ultimos 90";
   $sqldata="select * from productos where activo='S' order by id_producto desc limit 90";
}
if($dondebuscar=="pais")
{      $titleBuscar="Pais Origen";
       $campoBuscar="paisorigen";
       $sqldata="select * from productos where $campoBuscar='$buscar' and activo='S' order by nom_producto";
}
if($dondebuscar=="codbarra")
{      $titleBuscar="Codigo Barra";
       $campoBuscar="codigo_barra";
       // $buscar=trim($buscar);
       $buscar=substr($buscar,0,14);
       $sqldata="select * from productos where $campoBuscar='$buscar' and activo='S'";
}
if($dondebuscar=="codPro")
{      $titleBuscar="Codigo Producto";
       $campoBuscar="cod_producto";
       // $buscar=trim($buscar);
       $buscar=substr($buscar,0,14);
       $sqldata="select * from productos where $campoBuscar='$buscar' and activo='S'";
}
if($dondebuscar=="upcean")
{      $titleBuscar="Codigo UPC/EAN";
       $campoBuscar="cod_upcean";
       $buscar=substr($buscar,0,14);
       $sqldata="select * from productos where $campoBuscar='$buscar' and activo='S'";
}

// echo "<h3>Buscar: $buscar > $titleBuscar</h3><br>$sqldata";
$numFilas=0;
$sqlPro=mysqli_query($conex1,"$sqldata");
$numFilas=mysqli_num_rows($sqlPro);

if($numFilas==0)
{
     $error="Un producto no fue Seleccionado o No Encuentro el Producto";
     error();
     exit();
}
