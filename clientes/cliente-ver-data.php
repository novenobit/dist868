<?php
if(isset($clienteData))
{
?>

<div class="ui grid" style="background-color:#ffffff;color:#000000;padding:15px;border-radius:25px;">

     <?php
       echo "<div class='sixteen wide column'>
         <h2>{$clienteData['nom_cliente']}</h2>
       </div>";
       if(!empty($clienteData['foto_cliente']))
       {
       // echo "<tr><td  colspan=2>
       //   <img  src='$dirRoot"."imagenes/people/{$clienteData['foto_cliente']}' style='width:100%'>
       // </td></tr>";
        }
        else
        {
        // echo "<tr><td  colspan=2>
        // <img  src='$dirRoot"."imagenes/people/sinfoto.png' style='width:50%'>
        //</td></tr>";
       }
       echo "<div class='sixteen wide column'>
         CI/RIF: {$clienteData['cid_cliente']}
        </div>";

       if($clienteData['empresa_cliente']<>"" or $clienteData['empresa_cliente']<>"")
       {
         echo "<div class='sixteen wide column'>
          Empresa: {$clienteData['empresa_cliente']}
         </div>";
       }
       if($clienteData['encargado']<>"" or $clienteData['encargado']<>"")
       {
        echo "<div class='sixteen wide column'>
          Encargado: {$clienteData['encargado']}
        </div>";
       }
       if($clienteData['tel1_cliente']<>"" or $clienteData['tel2_cliente']<>"")
       {
        echo "<div class='sixteen wide column'>
         Tel&eacute;fono 1: {$clienteData['tel1_cliente']}";
         if($clienteData['tel2_cliente']<>"")
         { echo " / {$clienteData['tel2_cliente']}"; }
         //if($clienteData['tel3_cliente']<>"")
         //{ echo "/ {$clienteData['tel3_cliente']}"; }
        echo "</div>";
       }
       if($clienteData['email_cliente']<>"")
       {
        echo "<div class='sixteen wide column'>
          eMail: {$clienteData['email_cliente']}
        </div>";
       }
       if($clienteData['url_cliente']<>"")
       {
         echo "<div class='sixteen wide column'>
         Sitio Web: {$clienteData['url_cliente']}
         </div>";
       }
       if($clienteData['tipo_cliente']<>"")
       {
           echo "<div class='sixteen wide column'>
            Tipo Cliente:";
             $sqlTC=mysqli_query($conex1,"select * from tipocliente where inicial='{$clienteData['tipo_cliente']}'");
             $tipoData=mysqli_fetch_array($sqlTC);
             if(isset($tipoData))
             {
               $inicial=$tipoData['inicial'];
               $tipo_cliente=$tipoData['tipo_cliente'];
               echo "<option value='$inicial'>$tipo_cliente</option>";
             }
           echo "</div>";
       }
       if($clienteData['nivelprecio']<>"")
       {
        $nivelprecio=$clienteData['nivelprecio'];
        include("$dirRoot"."datafiles/find-nivel-precios.php");
          //  echo "$nom_nivel";
        if(!isset($nom_nivel))
        { $nom_nivel="sin datos"; }
        echo "<div class='sixteen wide column'>
         Lista Precio: $nom_nivel
        </div>";
       }
       if($clienteData['lista_correo']<>"")
       {
        echo "<div class='sixteen wide column'>
         Lista Correo: <i class='large book reader icon'></i>
        </div>";
       }
       //if($clienteData['cumpleano_cliente']<>"/" and $clienteData['cumpleano_cliente']<>"")
       //{ echo "<tr><td>
       //     Cumplea&ntilde;o</td><td >
       //      {$clienteData['cumpleano_cliente']}
       //     </td></tr>";
       //}
       if($clienteData['dir1_cliente']<>"")
       {
        echo "<div class='sixteen wide column'>
          Direcci&oacute;n: {$clienteData['dir1_cliente']}
        </div>";
       }
       if($clienteData['dir2_cliente']<>"")
       {
        echo "<div class='sixteen wide column'>
          Punto Referencia: {$clienteData['dir2_cliente']}
        </div>";
       }
       //if($clienteData['ciudad_cliente']<>"")
       //{
       //  echo "<tr><td>
       //  Ciudad</td><td >
       //  {$clienteData['ciudad_cliente']}
       //  </td></tr>";
       //}
       //if($clienteData['estado_cliente']<>"")
      // {
      //  echo "<tr><td>
      //  Estado</td><td >
      //   {$clienteData['estado_cliente']}
      //  </td></tr>";
      // }
      // echo "<tr><td>
      //   Pa&iacute;s</td><td >";
      //   $id_pais=$clienteData['id_pais'];
      //   include("$dirRoot"."datafiles/find-pais.php");
       //  if(isset($pais))
       //  { echo "$pais"; }
      // echo "</td></tr>
      // <tr><td>
      //     Contribuyente</td><td >
       //     {$clienteData['contribuyente']}
      // </td></tr>";
       if($clienteData['nota_cliente']<>"")
       {
         echo "<div class='sixteen wide column'>
           Nota: {$clienteData['nota_cliente']}
         </div>";
       }
       // echo "<tr><td>
       //  #Visitas</td><td >
       //</td></tr>
       //<tr><td>
       //  Ventas Bs:</td><td >

       //</td></tr>";
      // $Tdolar=0;
       //$Tdolar=($Tventas/$precioDolarVenta);
      // echo "<tr><td>
      //   Dolar </td><td >
      //   ". number_format($Tdolar,2,',', '.') . "
      // </td></tr>";
       //$Tpetro=0;
      // $Tpetro=($Tventas/$precioPetroBs);
      // echo "<tr><td>
      //   Petro </td><td >
      //   ". number_format($Tpetro,8,',', '.') . "
      // </td></tr>";

      if(isset($clienteData['vendedor']) and $clienteData['vendedor']<>"")
      {
       $vendedorSql=mysqli_query($conex1,"select nombre,apellido from usuarios where cid_usuario='{$clienteData['vendedor']}'");
       $vendedorData=mysqli_fetch_array($vendedorSql);
       if(isset($vendedorData))
       {
        $vendedor=$vendedorData['nombre']." ".$vendedorData['apellido'];
        echo "<div class='sixteen wide column'>
         Vendedor: $vendedor
        </div>";
       }
      }
?>
</div>

<?php
if(isset($sql2))
{ mysqli_free_result($sql2); }
if(isset($sqlpais))
{ mysqli_free_result($sqlpais); }
}
?>
