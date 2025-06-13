<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-buscar2.php                                                         //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
?>
<div class='ui blue message'>
    <h3 class='title is-3'>
    Buscar: <?php echo $buscar; ?>
  </h3>
</div>
<p><a class='ui fluid teal button' href='javascript:history.back(1)' style='border-radius:20px;'><i class='angle double left icon font-white'></i> Retornar</a></p>
<div class='ui grid'>

<?php
while($proData=mysqli_fetch_array($sqlPro))
{
   $findCategoria="S";
   include("$dirRoot"."datafiles/proData.php");
   // Precios
   include("$dirRoot"."datafiles/nivelPrecios.php");
   // end Precios
?>
     <div class='eight wide column left aligned'>
     <?php
        echo "<a class='fluid ui button' href='pro-buscar1.php?id_cuenta=$id_cuenta&dondebuscar=codbarra&buscar=$codigo_barra&sistema=$sistema' style='background-color:#fff;color:#000;'>";
        if($fotoProducto<>"" and $fotoProducto<>"sinfoto.png")
        { echo "<img class='ui image' src='$dirRoot"."imagenes/productos/$fotoProducto' style='height:80px;float:left;'>"; }
        echo "<span>$nomProducto</span>
        <br>$nom_categoria / $nom_subcategoria
        <br>Precio: $precioProducto</a>";
     ?>
   </div>
<?php
     //  echo "<html><meta http-equiv=refresh content=0;url='producto-ver1.php?codigo_barra=$buscar'>";
     //  exit();
     if(!isset($proDataFoto))
     { $proDataFoto="N"; }
}
?>

</div>
<p><a class='ui fluid teal button' href='javascript:history.back(1)' style='border-radius:20px;'><i class='angle double left icon font-white'></i> Retornar</a></p>
