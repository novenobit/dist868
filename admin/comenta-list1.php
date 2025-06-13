<?php
// Variables 2
$ves=1;
$num=1;
if(isset($_GET['num2']))
{ $num2="$_GET[num2]"; }
if(!isset($num2))
{ $num2=0; }
$subdir="../";
?>

<table class="ui unstackable selectable celled long scrolling table">
 <thead>
  <tr>
   <th class='blue'>Nombre</th>
   <th class='blue center aligned'>Correo</th>
   <th class='blue center aligned'>Telf</th>
   <th class='blue center aligned'>Fecha</th>
   <th class='blue center aligned' style='width:140px;'>OP</th>
  </tr>
 </thead>
 <tbody>
 <?php
  $numFilas=0;
  $sql=mysqli_query($conex1,"select id,nombre,email,celular,dia,mes,ano,hora
  from comentarios order by id");
  $numFilas=mysqli_num_rows($sql);
  if($numFilas>0)
  {
   while($comentaData=mysqli_fetch_array($sql))
   {
     $id=$comentaData['id'];
     $nombre=$comentaData['nombre'];
     $email=$comentaData['email'];
     $celular=$comentaData['celular'];
     $dia=$comentaData['dia'];
     $mes=$comentaData['mes'];
     $ano=$comentaData['ano'];
     $hora=$comentaData['hora'];

     if($comentaData['email']<>"")
     { $mail=" &#124; ".$comentaData['email']; }
     if(!isset($dir))
     { $dir=""; }
     if(!isset($tel))
     { $tel=""; }
     $numCuentas=0;
     if($email<>"")
     {
      $numCliente=0;
      $sqlCliente="select cid_cliente from clientes where email_cliente='$email'";
      $resultCliente=mysqli_query($conex1,$sqlCliente);
      $numCliente=mysqli_num_rows($resultCliente);
      if($numCliente>0)
      {
        $clienteData=mysqli_fetch_array($resultCliente);
        $cid_cliente=$clienteData['cid_cliente'];
        $sqlCliente="select id_cuenta from cuentas1 where cid_cliente='$cid_cliente'";
        $sqlCuentas2=mysqli_query($conex1,$sqlCliente);
        $numCuentas=mysqli_num_rows($sqlCuentas2);
      }
     }
     // $CliData="$nom $dir $tel $mail";
     // <a href='#' onclick='loadPage(\"$dirRoot"."users/usuario-ver.php?op=cl&iduser={$comentaData['iduser']}\");return false;'>
     echo "<tr>
       <td class='tdBorder'>
         $nombre
       </td>
       <td class='tdBorder center aligned'>
          $email
       </td>
       <td class='tdBorder center aligned'>
         $celular
       </td>
       <td class='tdBorder center aligned'>
         $dia-$mes
       </td>
       <td class='tdBorder center aligned' style='width:140px;'>";
         // <a class='tiny ui orange button' href='#' onclick='loadPage(\"$dirRoot"."users/usuario-ver.php?op=cl&iduser={$comentaData['iduser']}\");return false;'>Ver</a>
        ?>
        <center style="padding:0px;">
         <button data-modal="modal<?php echo $num; ?>" id="call-modal-<?php
          echo $num; ?>" class="ui orange button">Ver</button>
        </center>
        <div class="ui modal" id="modal<?php echo $num; ?>" style="background-color:#212121;height:500px;">
           <div class="header">Comenta: <?php echo $nombre; ?></div>
           <div class="scrolling content"  style="background-color:#ededed;">
             <iframe src="<?php echo "comenta-ver.php?id=$id&modalId=$num"; ?>" height='520px' width='100%' name='data2' frameborder='0' scrolling='auto' allowtransparency='true'></iframe>
           </div>
           <div class="actions">
             <a class="ui animated button" tabindex="0" href='#'>
             <div class="visible content">Retornar</div>
             <div class="hidden content">
               <i class="left arrow icon"></i>
             </div>
             </a>
             <div class="ui blue deny button">
                Cerrar/Close
             </div>
           </div>
        </div>
        <?php
       echo "</td>
      </tr>";

    FlushData();
    $num++;
   }
  }
 ?>
 </tbody>
</table>

<?php
if($numFilas==0)
{
  $boxColorH="cardColor";
  $boxTitle="Nada Aqu&iacute;";
  $boxData="<p>No Hay Datos Para Esta Fecha .....</p>";
  $boxColor="white";
  $boxFoot="";
  $boxColorF="";
  include("$dirRoot"."data/boxData.php");
}

if(isset($sql))
{ mysqli_free_result($sql); }
?>

