<?php

$uploaded_files = $_FILES['files'];

foreach ($uploaded_files['name'] as $key => $name) {
  $tmp_name = $uploaded_files['tmp_name'][$key];
  $error = $uploaded_files['error'][$key];
  $size = $uploaded_files['size'][$key];

  // Check for errors
  if ($error == UPLOAD_ERR_OK) {
    // Move the uploaded file to the desired location
    move_uploaded_file($tmp_name, "uploads/$name");
  }
}

?>
