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

//------------
if($cardLink<>"")
{
 if($cardLinkTarget<>"")
 { echo "<a class='ui raised card' href='$cardLink' target='$cardLinkTarget'>"; }
 else
 { echo "<a class='ui raised card' href='$cardLink'>"; }
}
 echo "<div class='content'>";
   if($cardTitle<>"")
   { echo "<div class='header'>$cardTitle</div>"; }

?>
   <div class='description'>
    <?php
     echo "<img class='ui wireframe image' src='$cardImageDir/$cardImage'>";
    ?>
   </div>
 </div>
 <?php
   if($cardSubTitle<>"")
   { echo "<div class='meta'>
      <span class='category'>$cardSubTitle</span>
     </div>";
   }
  ?>
</a>

