<?php
// ******************************************************** 2023 - 2017 ***
// SiAdVe4  System POS 4 Small Business                 //
// Copyright (c) 2023 NovenoBIT.com                                      //
// ************************************************************************
if($mobile=="S")
{ include("cliente-ver-mobile.php"); }
else
{
 //include("cliente-ver-data.php");
?>

<div class="ui stackable grid">
 <div class="four wide column">
   <?php
    $foto="{$clienteData['foto_cliente']}";
    if(!empty($foto))
    {  echo "<img src='$dirRoot"."imagenes/people/{$clienteData['foto_cliente']}'>";  }
    else
    { echo "<img src='$dirRoot"."imagenes/people/sinfoto.png'>"; }
   ?>
 </div>
 <div class="twelve wide column">
   <?php
     if(isset($areasSistema) and $areasSistema['EditaClientes']=="S")
     { echo "<a  href='../clientes/cliente-edit1.php?op=cl&id_cliente={$clienteData['id_cliente']}'>Editar <img src='$dirRoot"."siadre-imagenes/graphs/pen.gif' width='16' height='16' alt='' /></a>"; }
   ?>
   <table class="ui celled table">
   <?php
    echo "<tr><td width='120'>
      CI/RIF
     </td>
     <td>
      {$clienteData['cid_cliente']}
    </td></tr>
    <tr><td width='120'>
      Nombre
    </td>
    <td>
     {$clienteData['nom_cliente']}
    </td></tr>";
    if(isset($clienteData['tel1_cliente']) and $clienteData['tel1_cliente']<>"")
    { echo "<tr><td width='120'>
       Tel&eacute;fono 1</td>
       <td>
       {$clienteData['tel1_cliente']} / {$clienteData['tel2_cliente']}
      </td></tr>";
    }
    if(isset($clienteData['email_cliente']) and $clienteData['email_cliente']<>"")
    {
     echo "<tr><td  width='120'>
      eMail</td><td >
      {$clienteData['email_cliente']}
     </td></tr>";
    }
    if(isset($clienteData['url_cliente']) and $clienteData['url_cliente']<>"")
    {
     echo "<tr><td  width='120'>
     Sitio Web</td><td >
     {$clienteData['url_cliente']}
     </td></tr>";
    }

     if(isset($clienteData['cumpleano_cliente']) and $clienteData['cumpleano_cliente']<>"")
     {
      echo "<tr><td  width='120'>
       Cumplea&ntilde;o</td><td >
       {$clienteData['cumpleano_cliente']}
      </td></tr>";
     }
     if(isset($clienteData['dir1_cliente']) and $clienteData['dir1_cliente']<>"")
     {
       echo "<tr><td  width='120'>
       Direcci&oacute;n</td><td >
       {$clienteData['dir1_cliente']}
      </td></tr>";
     }
     if(isset($clienteData['dir2_cliente']) and $clienteData['dir2_cliente']<>"")
     {
       echo "<tr><td  width='120'>
       Punto Referencia</td><td >
       {$clienteData['dir2_cliente']}
       </td></tr>";
     }
     if(isset($clienteData['ciudad_cliente']) and $clienteData['ciudad_cliente']<>"")
     {
       echo "<tr><td  width='120'>
       Ciudad</td><td >
       {$clienteData['ciudad_cliente']}
       </td></tr>";
     }
     if(isset($clienteData['estado_cliente']) and $clienteData['estado_cliente']<>"")
     {
       echo "<tr><td  width='120'>
        Estado</td><td >
        {$clienteData['estado_cliente']}
       </td></tr>";
     }
     if(isset($clienteData['id_pais']) and $clienteData['id_pais']<>"")
     {
       echo "<tr><td  width='120'>
        Pa&iacute;s</td><td >";
        $id_pais="{$clienteData['id_pais']}";
        $sqlpais=mysqli_query($conex1,"select * from pais where id_pais='$id_pais'");
        $paisData=mysqli_fetch_array($sqlpais);
        echo "{$paisData['pais']}
       </td></tr>";
     }
     if(isset($clienteData['contribuyente']) and $clienteData['contribuyente']<>"")
     {
       echo "<tr><td  width='120'>
        Contribuyente</td><td >
        {$clienteData['contribuyente']}
       </td></tr>";
     }
     if(isset($clienteData['nota_cliente']) and $clienteData['nota_cliente']<>"")
     {
      echo "<tr><td  width='120'>
      Nota</td><td >
      {$clienteData['nota_cliente']}
      </td></tr>";
     }
   ?>
   </table>
 </div>
</div>
<?php
}
?>
