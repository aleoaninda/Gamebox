<?php
	session_start();
	$p_id=$_SESSION["PRODUCT_ID"];
	$database = new mysqli("localhost","root","ark112angel","gamebox_db"); 
    if($database->connect_errno){
    	echo "Failed to connect to MySQL: (" . $database->connect_errno . ") ";
    }

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