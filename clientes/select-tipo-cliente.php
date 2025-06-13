<label>Tipo Cliente</label>
<select class='input' name='tipo_cliente'>
 <?php
  if(isset($clienteData) and $clienteData['tipo_cliente']<>"")
  {
    $sqlTC=mysqli_query($conex1,"select * from tipocliente where inicial='{$clienteData['tipo_cliente']}'");
    $tipoData=mysqli_fetch_array($sqlTC);
    if(isset($tipoData))
    {
    $inicial=$tipoData['inicial'];
    $tipo_cliente=$tipoData['tipo_cliente'];
    echo "<option value='$inicial'>$tipo_cliente</option>";
    }
  }
  else
  { echo "<option class='' selected value=''>Tipo</option>"; }

  $sqlTC=mysqli_query($conex1,"select * from tipocliente order by tipo_cliente");
  while($tipoData=mysqli_fetch_array($sqlTC))
  {
    $id=$tipoData['id'];
    $inicial=$tipoData['inicial'];
    $tipo_cliente=$tipoData['tipo_cliente'];
    $nivel_precio=$tipoData['nivel_precio'];
    echo "<option value='$inicial'>$tipo_cliente</option>";
  }
 ?>
</select>
