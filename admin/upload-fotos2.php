<?php
// (A) SOME FLAGS
$total = isset($_FILES["upfile"]) ? count($_FILES["upfile"]["name"]) : 0 ;
$status = [];

// (B) PROCESS FILE UPLOAD
if ($total>0) { for ($i=0; $i<$total; $i++) {
  $source = $_FILES["upfile"]["tmp_name"][$i];
  $destination = $_FILES["upfile"]["name"][$i];
  if (move_uploaded_file($source, $destination) === false) {
    $status[] = "Error uploading to $destination";
  }
}} else { $status[] = "No files uploaded!"; }

/* (C) DONE - WHAT'S NEXT?
if (count($status)==0) {
  // REDIRECT TO OK PAGE?
  header("Location: http://site.com/somewhere/");

  // SHOW AN "OK" PAGE?
  require "OK.PHP"
}

// (D) HANDLE ERRORS?
else {
  // (D1) SHOW ERRORS?
  // print_r($status);

  // (D2) REDIRECT BACK TO UPLOAD PAGE?
  header("Location: http://site.com/1-upload.html/?error=1");
}
*/
