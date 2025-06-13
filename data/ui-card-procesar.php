<?php
if(!isset($cardWidth))
{ $cardWidth="100%"; }
if(!isset($cardTitle))
{ $cardTitle=""; }
if(!isset($cardSubTitle))
{ $cardSubTitle=""; }
if(!isset($cardData))
{ $cardData=""; }
if(!isset($cardFooter))
{ $cardFooter=""; }
if(!isset($cardImageWidth))
{ $cardImageWidth="100%"; }
if(!isset($cardImageHeight))
{ $cardImageHeight="100%"; }
if(!isset($cardLink))
{ $cardLink="#"; }
if(!isset($cardLinkTarget))
{ $cardLinkTarget=""; }
if(!isset($cardImage) or $cardImage=="")
{ $cardImage="sinfoto.png"; }
if(!isset($cardMeta))
{ $cardMeta=""; }
if(!isset($useLinkButton))
{ $useLinkButton="N"; }
?>

<div class="ui raised cards <?php echo "$fontSize1 $animation"; ?> hvr-bounce-in">
 <div class="card">
  <div class="content">
   <span class="font-16 left floated like">
      <?php echo $cardLeftTitle; ?>
   </span>
   <span class="right floated">
     <?php echo $cardRightTitle; ?>
   </span>
  </div>
  <div class="content center aligned font-18">
  <span class='font-18'>
   <?php
    echo "({$cestaData['cantidad']}) {$proData['nom_item']}";
     if(!empty($cestaData['nota_extra']))
     {
       if(isset($db_item_extra) and $db_item_extra<>"")
       {
        $sqlmensaje1="select nota_extra from $db_item_extra where id_cuenta='{$procesadoData['id_cuenta']}' and id_producto='{$cestaData['id_producto']}'";
        $sqlmensaje2=mysqli_query($conex1,$sqlmensaje1);
        $notaData=mysqli_fetch_array($sqlmensaje2);
        if($notaData['nota_extra']<>"")
        { echo "<br><span class='font-red'>Nota:{$notaData['nota_extra']}</span>"; }
        mysqli_free_result($sqlmensaje2);
       }
     }
    echo "<br><span class='font-black font-14'>
    Hora Pedido: {$procesadoData['hora_enviado']}
    <br>(Esperando: $esperandoH:$esperandoM) min</span> $num<br></span>";
   ?>
  </div>
  <div class="ui two bottom attached basic buttons">
   <div class="ui button">
    <?php echo "<a class='font-16 lnk1' href='./productos/anular-producto1.php?id={$procesadoData['id_cuenta']}'>Anular</a>"; ?>
   </div>
   <div class="ui button">
    <?php echo "<a class='font-16 lnk1' href='./productos/procesar3.php?id={$procesadoData['id_cuenta']}&cod_categoria=$cod_categoria&id_printer=$id_printer&sistema=$sistema&areaMesas=$areaMesas'>Listo</a>"; ?>
   </div>
  </div>
 </div>
</div>
