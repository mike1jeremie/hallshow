<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$filename = $_FILES['file']['name'];

$location = "uploads/".$filename;

if ( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) { 
  echo 'Success '; 
} else { 
  echo 'Failure '.$location; 
}


 

?>