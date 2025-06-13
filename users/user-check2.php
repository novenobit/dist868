<?php
// ******************************************************* 2023 ***
// *  Pagina Principal del Sistema ven868.net                    //
// *  user-check2.php                                            //
// ****************************************************************
if(isset($usuario) and $usuario<>"")
{
 $sqlUser=mysqli_query($conex1,"select iduser,usuario,cid_usuario,clave,nombre,apellido,idnivel from usuarios where usuario='$usuario'");
 $userData=mysqli_fetch_array($sqlUser);
 if(isset($userData))
 {
   $_SESSION['iduser']=$userData['iduser'];
   $_SESSION['usuario']=$userData['usuario'];
   $_SESSION['cid_usuario']=$userData['cid_usuario'];
   $_SESSION['clave']=$userData['clave'];
   $_SESSION['nombre']=$userData['nombre'];
   $_SESSION['apellido']=$userData['apellido'];
   $_SESSION['idnivel']=$userData['idnivel'];
 }
 else
 {
   echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."user-login.php>";
   exit();
 }
}
else
{
  echo "<html><meta http-equiv=refresh content=0;url=$dirRoot"."user-login.php>";
  exit();
}
?>
