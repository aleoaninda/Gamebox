<?php
	session_start();	
	unset($_SESSION["CUSTOMER_ID"]);
	unset($_SESSION["USER_NAME"]);
    header("location: index.php");
    exit();
?>