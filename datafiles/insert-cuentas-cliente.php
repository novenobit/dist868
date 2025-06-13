<?php
// include("../datafiles/insert-cuentas-cliente.php");
$query2="insert into cuentas_cliente(cid_cliente, cod_cliente, nom_cliente,  dir1_cliente, dir2_cliente, ciudad_cliente, estado_cliente, tel1_cliente, tel2_cliente,  email_cliente, tipo_cliente, nota_cliente,  lista_correo,  ip_cliente, activo)
values('$cid_cliente', '$clave', '$nom_cliente', '$dir1_cliente', '$dir2_cliente', '$ciudad_cliente', '$estado_cliente', '$tel1_cliente', '$tel2_cliente',  '$email_cliente', '$tipo_cliente', '$nota_cliente', '$lista_correo', '$ip_cliente','S')";
$result2=mysqli_query($conex1,$query2);
?>
