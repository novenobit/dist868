<?php
//include("$dirRoot"."datafiles/categoria-last-num.php");
$fileCat="$dirRoot"."datafiles/data/categoria.txt";
$dataNumCat = file($fileCat);
$line = $dataNumCat[count($dataNumCat)-1];
$dataNumCat=array_values(array_filter(explode('|', $line)));
$numID=$dataNumCat[0]+1;
$numCat=$dataNumCat[1]+10;
?>
