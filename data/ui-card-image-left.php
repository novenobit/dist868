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

<div class="ui raised cards">
 <div class="card">
  <div class="content">
   <div class="ui grid">
    <div class="two column computer only row">
     <div class="four wide column">
      <?php
       if($cardLink<>"")
       {
         if($cardLinkTarget<>"")
         { echo "<a href='$cardLink' target='$cardLinkTarget'>"; }
         else
         { echo "<a href='$cardLink'>"; }
       }
       echo "<img class='ui image rounded' src='$cardImageDir/$cardImage'>";
       if($cardLink<>"")
       {
         echo "</a>";
       }
      ?>
     </div>
     <div class="eight wide column">
      <?php
       if($cardTitle<>"")
       { echo "<div class='header font-blue font-24 font-bold'>$cardTitle</div>"; }
       if($cardSubTitle<>"")
       { echo "<h3>$cardSubTitle</h3>"; }
       if($cardData<>"")
       { echo "<h2>$cardData</h2>"; }
       if($cardLink<>"" and $useLinkButton=="S")
       {
        echo "<div class=' extra content right aligned'>";
         if($cardLinkTarget<>"")
         { echo "<a class='ui basic button' href='$cardLink' target='$cardLinkTarget'>Ejecutar</a>"; }
         else
         { echo "<a class='ui basic button' href='$cardLink'>Ejecutar</a>"; }
        echo "</div>";
       }
      ?>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
