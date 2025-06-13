<?php

if(isset($usuarioData))
{
?>
    <table class="ui celled blue table">
     <?php
       if(!empty($usuarioData['foto']))
       {
       // echo "<tr><td  colspan=2>
       //   <img  src='$dirRoot"."imagenes/people/{$usuarioData['foto']}' style='width:100%'>
       // </td></tr>";
        }
        else
        {
        // echo "<tr><td  colspan=2>
        // <img  src='$dirRoot"."imagenes/people/sinfoto.png' style='width:50%'>
        //</td></tr>";
       }
       echo "
       <tr><td style='width:120px'>
        CI/RIF</td>
        <td >
        {$usuarioData['cid_usuario']}
       </td></tr>
       <tr><td style='width:120px'>
           Nombre</td><td >
        {$usuarioData['nombre']}
       </td></tr>";
       if($usuarioData['email']<>"" or $usuarioData['celular']<>"")
       {
        echo "<tr><td style='width:120px'>
        Tel&eacute;fono 1</td><td >
         {$usuarioData['email']}";
         if($usuarioData['celular']<>"")
         { echo "/ {$usuarioData['celular']}"; }
        echo "</td></tr>";
       }
       if($usuarioData['email']<>"")
       {
         echo "<tr><td style='width:120px'>
         eMail</td><td >
         {$usuarioData['email']}
         </td></tr>";
       }


       echo "<tr><td style='width:120px'>
         #Visitas</td><td >

       </td></tr>
       <tr><td style='width:120px'>
         Ventas Bs:</td><td >
         
       </td></tr>";
      // $Tdolar=0;
       //$Tdolar=($Tventas/$precioDolarVenta);
      // echo "<tr><td style='width:120px'>
      //   Dolar </td><td >
      //   ". number_format($Tdolar,2,',', '.') . "
      // </td></tr>";
       //$Tpetro=0;
      // $Tpetro=($Tventas/$precioPetroBs);
      // echo "<tr><td style='width:120px'>
      //   Petro </td><td >
      //   ". number_format($Tpetro,8,',', '.') . "
      // </td></tr>";

?>
    </table>


<?php
if(isset($sql2))
{ mysqli_free_result($sql2); }
if(isset($sqlpais))
{ mysqli_free_result($sqlpais); }
}
?>
