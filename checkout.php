<!--
Gamebox.com alpha Ver 1.2
for the final project of CSE 391
by Aleo Aninda (ID: 13301113)
-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Game Box</title>
        <link rel="icon" href="g_favicon.ico"> 
        <link rel="stylesheet" href="stylesheet_gamebox .css" type="text/css" />
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
    </head>
    <body onload="costcalcFunction()">
       <div id="headerobx">
              <div id="logodiv"><a href="index.php"><img id="logo" src="gamebox.png"></img></a></div> 
              <div id="headerinfo">
                  <a class="headerlink" href="store.php">Store</a> &nbsp &nbsp
                  <a class="headerlink" href="request.php">Request Order</a> &nbsp &nbsp
                  <a class="headerlink" href="contact.php">Contact</a> &nbsp &nbsp
                  <?php
                    if(isset($_SESSION["CUSTOMER_ID"])){
                        echo '<a class="headerlink"'.' href="cart.php">Cart</a> &nbsp &nbsp';
                        echo '<a class="headerlink"'.' href="myaccount.php">My Account</a> &nbsp &nbsp';
                        echo '<a class="headerlink"'.' href="logout.php">Sign out</a> &nbsp &nbsp';
                    }
                    else{
                        header("location: login.php");
                        exit();
                    }
                  ?>
              </div>
        </div>
        <div id="searcharea2"> 
            <div id="searchbox2">
                <form action="searchresult.php" id="searchinput" method="POST">
                    <input id="sI_O2" type="text" name="searchtext" placeholder="Search for your games here.." size="40"/>
                    <input id="sI_O2" type="submit" value="Search"/>
                </form>
            </div>
        </div>
        <div id="checkoutcontainer">
          <?php
            $database = new mysqli("localhost","root","ark112angel","gamebox_db"); 
            if($database->connect_errno){
              echo "Failed to connect to MySQL: (" . $database->connect_errno . ") ";
            }
            $c_id = $_SESSION["CUSTOMER_ID"];
            $sql = "SELECT * FROM cart, product WHERE cart.p_id=product.p_id AND cart.c_id='$c_id'  AND cart.processed='0' AND cart.paid='0'";
            $result=$database->query($sql);
            while ($row = mysqli_fetch_array($result)) {
              $quantity=$_POST[$row["p_id"]];
              $sql = "UPDATE cart SET quantity='$quantity' WHERE p_id='$row[p_id]'";
              $database->query($sql);
            }
            $sql2 = "SELECT * FROM cart, product WHERE cart.p_id=product.p_id AND cart.c_id='$c_id'  AND cart.processed='0' AND cart.paid='0'";
            $result2=$database->query($sql2);
            $total=0;
            while ($row2 = mysqli_fetch_array($result2)) {
              $price=$row2["price"];
              $quantity=$row2["quantity"];
              $subtotal = $price * $quantity;
              $total=$total+$subtotal;
            }
            echo '<div id="costinfo">';
            echo 'Total Cost: Tk '.$total ;
            echo '</div>';

            $result->close();
            $result2 ->close();
            $database->close();
          ?>
          <br>
          <div id="paymentdetails">
            <div id="Bkashnumber">BKash number: 01XXXXXXXXX</div>
            <br>
            <div id="trxIDcont">
              <form action="checkoutfinish.php" method="POST">
                    <input id="trxinput" type="text" name="trxin" placeholder="Transaction ID as given by Bkash" size="40"/>
                    <input id="trxsubmit" type="submit" value="Submit"/>
              </form>
            </div>
            <div id="paymentprocess">
              <a style="text-decoration:none;" id="costinfo" target="_blank" href="http://www.bkash.com/">Bkash Payment process</a>
            </div>
          </div>
        </div>
        <div id="tailbox2">
            <div class="tailinfo2"><p>Payment accepted only via</p><a title="Bkash" href="http://www.bkash.com/" target="_blank"><img class="clients2" src="./img/clients/bkash.png"></a></div>
            <div class="tailinfo2"><p>Join us in our Facebook page</p><a title="Facebook" href="https://www.facebook.com/" target="_blank"><img class="clients2" src="./img/clients/facebook.png"></a></div>
            <div class="tailinfo2"><p>Follow us on Twitter</p><a title="Twitter" href="https://twitter.com/" target="_blank"><img class="clients2" src="./img/clients/twitter.png"></a></div>
            <div class="tailinfo2"><p>Play with us on Player Dot Me</p><a title="Player Dot Me" href="https://player.me/" target="_blank"><img class="clients2" src="./img/clients/playerdotme.png"></a></div>
            <div id="tailbar2">&copy 2016 Gamebox &nbsp</div>
        </div>
    </body>
</html>