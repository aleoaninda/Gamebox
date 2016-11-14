<?php
  $database = new mysqli("localhost","root","ark112angel","gamebox_db"); 
    if($database->connect_errno){
      echo "Failed to connect to MySQL: (" . $database->connect_errno . ") " . $database->connect_error;
    }
?>
