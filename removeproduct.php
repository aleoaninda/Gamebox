<?php
    session_start();
    if(isset($_POST['removeitem'])){
        include 'database_auth.php';
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
