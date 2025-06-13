<?php
 include_once("../configFrame.php");
 $found="N";
 FechayHora();
 include("../lib/find-cesta.php");
 $fechacreado=$cestaData['submitted'];
 $id_empleado=$id;
 $personas=2;
 $hora_cerrar=0;
 $dia=substr($fechacreado, 8);
 $mes=substr($fechacreado, 5, 2);
 $ano=substr($fechacreado, 0, 4);
 $hoyhora="03:24 pm";
 $hoydia="$dia/$mes/$ano";
 if(!empty($id_cuenta) and !empty($id))
 {
  $numFilas=0;
  $sql=mysqli_query($conex1, "select id_cuenta from delivery where id_cuenta='$id_cuenta'");
  $numFilas=mysqli_num_rows($sql);
  if($numFilas==0)
  { include("../lib/abrir-mesa.php"); }
  else
  {
   $query="update delivery set id_empleado='$id' where id_cuenta='$id_cuenta'";
   $result=mysqli_query($conex1,$query) or die ("Error in query: $query. " . mysqli_error());
  }
 }
 echo "<html><meta http-equiv=refresh content=0;url=../cuentas/cuentas1.php?id_cuenta=$id_cuenta&sistema=D>";
?>
