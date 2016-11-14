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
    <body>
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
                        echo '<a class="headerlink"'.' href="register.php">Register</a> &nbsp &nbsp';
                        echo '<a class="headerlink"'.' href="login.php">Sign in</a> &nbsp &nbsp';
                    }
                  ?>
              </div>
        </div> 
        <div id="searcharea">
            <div id="seartxt">BEST BANGLADESHI STORE FOR ORIGINAL GAMES</div>
            <div id="searchbox">
                <form action="searchresult.php" id="searchinput" method="POST">
                    <input id="sI_O" type="text" name="searchtext" placeholder="Search for your games here.." size="40"/>
                    <input id="sI_O" type="submit" value="Search"/>
                </form>
            </div>
        </div>
        <?php
            $database = new mysqli("localhost","root","ark112angel","gamebox_db"); 
            if($database->connect_errno){
                echo "Failed to connect to MySQL: (" . $database->connect_errno . ") " . $database->connect_error;
            }
            $sql = "SELECT p_name, p_id, price, p_img FROM product;";
            $result = $database->query($sql);
            $i;
            echo "<div ".'style="height:50%;" '.'id="productdiv">';
            for($i=0; $i<4; $i++){
                $row=mysqli_fetch_array($result);
                echo "<div ".'class="product">';
                    echo '<a title="'.$row["p_name"].'" href="product-details.php?product_id='.$row["p_id"].'">'.'<img class="prodimg" '.'src="'.$row["p_img"].'"></img></a>';
                    echo '<p class="prodprice">Tk '.$row["price"].'</p>';
                    echo "</div>";
            }
            echo "</div>";
            $result->close();
            $database->close();
        ?>
        <div id="infocontainer">
            <div id="infodescont"><p id="infodes">We provide products for the following services:</p></div>
            <div class="infos"><a target="_blank" href="http://store.steampowered.com/" title="Steam"><img alt="Steam" class="clients" src="./img/clients/steam.png"></a></div>
            <div class="infos"><a target="-blank" href="http://origin.com/" title="Origin"><img alt="Origin" class="clients" src="./img/clients/origin.png"></a></div>
            <div class="infos"><a target="_blank" href="https://uplay.ubi.com/" title="Uplay"><img alt="Uplay" class="clients" src="./img/clients/uplay.png"></a></div>
            <div class="infos"><a target="_blank" href="https://play.google.com/store" title="Google Play"><img alt="Google Play" class="clients" src="./img/clients/gplay.png"></a></div>         
            <div class="infos"><a target="_blank" href="http://www.apple.com/itunes/" title="iTunes"><img alt="iTune" class="clients" src="./img/clients/itune.png"></a></div>
            <div class="infos"><a target="_blank" href="https://www.netflix.com/" title="Netflix"><img alt="Netflix" class="clients" src="./img/clients/netflix.jpg"></a></div>  
        </div>
        <div id="tailbox">
            <div class="tailinfo"><p>Payment accepted only via</p><a title="Bkash" href="http://www.bkash.com/" target="_blank"><img class="clients" src="./img/clients/bkash.png"></a></div>
            <div class="tailinfo"><p>Join us in our Facebook page</p><a title="Facebook" href="https://www.facebook.com/" target="_blank"><img class="clients" src="./img/clients/facebook.png"></a></div>
            <div class="tailinfo"><p>Follow us on Twitter</p><a title="Twitter" href="https://twitter.com/" target="_blank"><img class="clients" src="./img/clients/twitter.png"></a></div>
            <div class="tailinfo"><p>Play with us on Player Dot Me</p><a title="Player Dot Me" href="https://player.me/" target="_blank"><img class="clients" src="./img/clients/playerdotme.png"></a></div>
            <div id="tailbar">&copy 2016 Gamebox &nbsp</div>
        </div>
    </body>
</html>
