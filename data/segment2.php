<?php
//include("$dirRoot"."data/segment2.php");

// $segmentTitle
// $segmentData1
// $segmentData2

if(isset($segmentTitle) and $segmentTitle<>"")
{
?>
 <div class="ui segments">
  <?php
   if(isset($segmentTitle))
   {
    echo "<h4 class='ui top attached block header'>$segmentTitle</h4>";
   }
  ?>
   <div class="ui equal width grid">
    <div class="row">
      <div class="column">
       <?php
        if(isset($segmentData1))
        { echo $segmentData1; }
       ?>
      </div>
      <div class="column">
       <?php
        if(isset($segmentData2))
        { echo $segmentData2; }
       ?>
      </div>
    </div>
   </div>
 </div>
<?php
}
?>
