<label>Vendedor</label>
<select class='input' name='vendedor'>
 <?php
  if(isset($clienteData['vendedor']) and $clienteData['vendedor']<>"")
  {
    $sqlVendedor=mysqli_query($conex1,"select iduser,cid_usuario,nombre,apellido from usuarios where cid_usuario='{$clienteData['vendedor']}'");
    $vendedorData=mysqli_fetch_array($sqlVendedor);
    if(isset($vendedorData))
    {
    $nombre=$vendedorData['nombre'];
    $apellido=$vendedorData['apellido'];
    echo "<option value='{$clienteData['vendedor']}'>$nombre $apellido</option>";
    }
  }
  else
  { echo "<option class='' selected value=''>vendedor</option>"; }
  $sqlTC=mysqli_query($conex1,"select iduser,cid_usuario,nombre,apellido from usuarios order by nombre");
  while($vendedorData=mysqli_fetch_array($sqlTC))
  {
    $iduser=$vendedorData['iduser'];
    $vendedor=$vendedorData['cid_usuario'];
    $nombre=$vendedorData['nombre'];
    $apellido=$vendedorData['apellido'];
    echo "<option value='$vendedor'>$nombre $apellido</option>";
  }
 ?>
</select>
