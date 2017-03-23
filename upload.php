<?php

$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES['editorList']['tmp_name']);
$upload_yes = 1;

//check if file exists
if ( 0 < $_FILES['file']['error'] ) {
  echo 'Error: ' . $_FILES['editorList']['error'] . '<br>';
}
else if(file_exists($target_file)){
  echo "sorry, file already exists.";
  $upload_yes = 0;
}
else if($_FILES['editorList']['size'] > 50000){
  echo "sorry file is too large";
  $upload_yes = 0;
}//tested and working up to here
else{
  if(move_uploaded_file($_FILES['editorList']['tmp_name'], $target_file)){
    echo basename($_FILES['editorList']['tmp_name']). " has been uploaded."; 
  }
  else{
    echo "sorry issue uploading the file, please try again";
  }
}

