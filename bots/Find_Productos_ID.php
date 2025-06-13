<?php
//Function Find_Productos_ID()
//global $conex1, $id, $proData;
if(isset($id) and $id<>"")
{ $sqlFPID=mysqli_query($conex1,"select * from productos where id_producto='$id'"); }
if(isset($id_producto) and $id_producto<>"")
{ $sqlFPID=mysqli_query($conex1,"select * from productos where id_producto='$id_producto'"); }

if(isset($sqlFPID))
{
 $proData=mysqli_fetch_array($sqlFPID);
 mysqli_free_result($sqlFPID);
 return $proData;
}
?>
