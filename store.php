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
        <div id="searcharea2"> 
            <div id="searchbox2">
                <form action="searchresult.php" id="searchinput" method="POST">
                    <input id="sI_O2" type="text" name="searchtext" placeholder="Search for your games here.." size="40"/>
                    <input id="sI_O2" type="submit" value="Search"/>
                </form>
            </div>
        </div>
        <?php
            $database = new mysqli("localhost","root","ark112angel","gamebox_db"); 
            if($database->connect_errno){
                echo "Failed to connect to MySQL: (" . $database->connect_errno . ") " . $database->connect_error;
            }
            if(!(isset($_GET['group_id']))){
                $sql = "SELECT * FROM catagory";
                $result = $database->query($sql);
                echo '<div id="cartbar"><p class="headerlink">Product catagory</p></div>';
                echo '<div style="height:45%;" id="productcatagorycont">';
                while($row = mysqli_fetch_array($result)){ 
                    echo '<div class="catagorycont">';
                        echo '<a title="'.$row["p_group"].'" href="store.php?group_id='.$row["p_group"].'"><img class="catimg" src="'.$row["group_img"].'"></img></a>';
                        echo '<div style=" font: bold 2vw sans-serif;">'.$row["p_group"].'</div>';
                    echo '</div>';
                }
                echo '</div>';
                $result->close();
            }
            else{
                $g_id = $_GET['group_id'];
                $sql = "SELECT * FROM product where p_group='$g_id'";
                $result = $database->query($sql);
                echo '<div id="cartbar"><p class="headerlink">'.$g_id.' products</p></div>';
                echo "<div ".'style="height:50%;" '.'id="productdiv">';
                while($row = mysqli_fetch_array($result)){
                    echo "<div ".'class="product">';
                    echo '<a title="'.$row["p_name"].'" href="product-details.php?product_id='.$row["p_id"].'">'.'<img class="prodimg" '.'src="'.$row["p_img"].'"></img></a>';
                    echo '<p class="prodprice">Tk '.$row["price"].'</p>';
                    echo "</div>";
                }
                echo "</div>";
                $result->close();
                
            }
            $database->close();
        ?>
        <div id="tailbox2">
            <div class="tailinfo2"><p>Payment accepted only via</p><a title="Bkash" href="http://www.bkash.com/" target="_blank"><img class="clients2" src="./img/clients/bkash.png"></a></div>
            <div class="tailinfo2"><p>Join us in our Facebook page</p><a title="Facebook" href="https://www.facebook.com/" target="_blank"><img class="clients2" src="./img/clients/facebook.png"></a></div>
            <div class="tailinfo2"><p>Follow us on Twitter</p><a title="Twitter" href="https://twitter.com/" target="_blank"><img class="clients2" src="./img/clients/twitter.png"></a></div>
            <div class="tailinfo2"><p>Play with us on Player Dot Me</p><a title="Player Dot Me" href="https://player.me/" target="_blank"><img class="clients2" src="./img/clients/playerdotme.png"></a></div>
            <div id="tailbar2">&copy 2016 Gamebox &nbsp</div>
        </div>
    </body>
</html>