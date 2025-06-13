<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                          //
//  list-cesta1.php                                                         //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************

// id_cuenta, id_cuenta, id_producto, cantidad, nota_extra, anulado, usuario, hora, submitted, rand_num
// '$id_cuenta', '$id_cuenta', '$id_producto', '$cantidad', '$nota_extra', '$anulado', '$usuario', '$hora', '$submitted', '$rand_num'
$reg=0;
if(isset($id_cuenta) and $id_cuenta<>"")
{ $sqlCuentas1=mysqli_query($conex1,"select * from cuentas1 where id_cuenta='$id_cuenta'"); }
if(isset($rand_num) and $rand_num<>"")
{ $sqlCuentas1=mysqli_query($conex1,"select * from cuentas1 where rand_num='$rand_num'"); }

$numFilas=mysqli_num_rows($sqlCuentas1);
if($numFilas>0)
{
 $cuentaData=mysqli_fetch_array($sqlCuentas1);
 include("../data/cuenta-data.php");
 if(isset($cuentaData))
 { $cid_cliente=$cuentaData['cid_cliente']; }

 $sqlCliente=mysqli_query($conex1,"select cid_cliente,nom_cliente,dir1_cliente,tel1_cliente,tel2_cliente,email_cliente,nivelprecio,vendedor from clientes where cid_cliente='$cid_cliente'");
 $numFilas=mysqli_num_rows($sqlCliente);
 if($numFilas>0)
 {
  $clienteData=mysqli_fetch_array($sqlCliente);
  $cid_cliente=$clienteData['cid_cliente'];
  $nom_cliente=$clienteData['nom_cliente'];
  $dir1_cliente=$clienteData['dir1_cliente'];
  $tel1_cliente=$clienteData['tel1_cliente'];
  $tel2_cliente=$clienteData['tel2_cliente'];
  $email_cliente=$clienteData['email_cliente'];
  $nivelprecio=$clienteData['nivelprecio'];
  $vendedor=$clienteData['vendedor'];
  $nomVendedor="";
  if($vendedor<>"")
  {
   $numFilas=0;
   $sqlEmp=mysqli_query($conex1,"select nombre,apellido from usuarios where cid_usuario='$vendedor'");
   $numFilas=mysqli_num_rows($sqlEmp);
   if($numFilas>0)
   {
     $empData=mysqli_fetch_array($sqlEmp);
     $nombre=$empData['nombre'];
     $apellido=$empData['apellido'];
     $nomVendedor="$nombre $apellido";
   }
  }
?>

  <div class="ui grid">
  <div class="ten wide column">
  <h2><?php echo $nom_cliente; ?></h2>
    <div class="ui sizer vertical segment">

    <div class="content">
    <?php
      echo "CI/RIF: ".$cid_cliente;
      if(isset($nivelprecio) and $nivelprecio<>"")
      {
      include("$dirRoot"."datafiles/find-nivel-precios.php");
      if(isset($nom_nivel) and $nom_nivel<>"")
      { echo " / NP: $nom_nivel"; }
      }
      if($dir1_cliente<>"")
      { echo " / ".$dir1_cliente;  }
      if($tel1_cliente<>"")
      { echo " / ".$tel1_cliente;  }
      if($tel2_cliente<>"")
      { echo " / ".$tel2_cliente;  }
      if($email_cliente<>"")
      { echo " / ".$email_cliente;  }
    ?>
    </div>
    <div class="content">
    <?php
      if($id_cuenta<>"")
      { echo "#Cuenta: $id_cuenta"; }
      if($nomVendedor<>"")
      { echo " / Vendedor: $nomVendedor"; }
      if($descuento>0)
      { echo " / Descuento: ($descuento%)"; }
      if($id_cuenta=="" and $rand_num<>"")
      { echo "#Num: $rand_num"; }
      if($fecha<>"")
      { echo " / Fecha: ".$fecha;  }
      if($hora<>"")
      { echo " / Hora: ".$hora;  }
    ?>
    </div>
  </div>

  </div>
  <div class="six wide padded column">
    <?php  include("cuenta-menu.php"); ?>
  </div>
  </div>
<?php
 }
 // include("cuenta-menu.php");
 // <form class="ui form"  action="pro-buscar1.php" method="POST" onsubmit="window.open('pro-buscar1.php','width=500,height=300');return false;">
 // echo "<form class='ui form' action='$dirRoot"."productos/pro-buscar1.php' method='POST'>";
?>

 <form class="ui form"  id="data2" method="post" action= "<?php echo "pro-buscar1.php?id_cuenta=$id_cuenta&sistema=$sistema"; ?>" target="data2">
      <div class="fields">
        <div class="seven wide field">
          <input type="text" name="buscar" maxlength="50" placeholder="Datos del Producto">
        </div>
        <div class="eight wide  field">
          <div class="fields">
            <div class="eight wide field">
              <select class="ui fluid search dropdown" name="dondebuscar">
                <option value="nombre">Nombre</option>
                <option value="codbarra">CodBarra</option>
                <option value="precio">Precio</option>
                <option value="ultimos">Ultimos 90</option>
                <option value="pais">Pais Origen</option>
                <option value="upcean">UPC/EAN</option>
              </select>
            </div>
            <div class="field">
                <button class="ui submit blue button" style='border-radius:12px;'>Buscar</button>
            </div>
          </div>
        </div>
      </div>
 </form>
<?php
}

if($reg>0)
{
 // echo "<a 'limpia-cesta.php?id_cuenta=$id_cuenta' target='result'>Limpia Cesta</a>";
}
?>
