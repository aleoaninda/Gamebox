<?php
    session_start();
    if(isset($_POST['removeitem'])){
        $database = new mysqli("localhost","root","ark112angel","gamebox_db"); 
        if($database->connect_errno){
        	echo "Failed to connect to MySQL: (" . $database->connect_errno . ") " . $database->connect_error;
        }
        $c_id=$_SESSION["CUSTOMER_ID"];
        $p_id=$_POST["product_id"];
        $sql="DELETE FROM `cart` WHERE p_id='$p_id' AND c_id='$c_id'";
        $database->query($sql);
        $database->close();
    	header("location: cart.php");
        exit();
    }    
    else{
	}