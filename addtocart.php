<?php
	session_start();
	$p_id=$_SESSION["PRODUCT_ID"];
	include 'database_auth.php';
    if(isset($_POST["cartsubmit"])){
    	if(isset($_SESSION["CUSTOMER_ID"])){
    		$c_id = $_SESSION["CUSTOMER_ID"];
    		$date=date('Y-m-d');
    		$sql="INSERT INTO cart (p_id, c_id, quantity, date, paid, processed) VALUES ('$p_id','$c_id','$_POST[quantity]','$date','0','0')";
    		$database->query($sql);
    		$database->close();
    		header("location: cart.php");
            exit();
    	}
    	else{
    		header("location: login.php");
            exit();
    	}
    }
    else{}
?>
