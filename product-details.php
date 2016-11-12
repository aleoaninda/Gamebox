<!--
Gamebox.com alpha Ver 1.2
for the final project of CSE 391
by Aleo Aninda (ID: 13301113)
-->
<?php
    session_start();
    $p_id = $_GET['product_id'];
    $_SESSION["PRODUCT_ID"] = $p_id;
    session_write_close();
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
          $p_id=$_GET["product_id"];
          $sql = "SELECT * FROM product WHERE p_id=$p_id";
          $result = $database->query($sql);
          $row=mysqli_fetch_array($result);
          echo '<div id="productarea">';
          echo '<div id="imgbox">';
          echo '<img class="prodimg" src="'.$row["p_img"].'">';
          echo '<div id="addtocarcontainer">';
          echo '<p class="cartprice">Tk '.$row["price"]."</p>";
          echo '<form action="addtocart.php" method="POST" id="cartinput">';
          echo '<input id="cI_O" type="number" min="0" name="quantity" placeholder="Quantity" size="1"/>';
          echo '<input class="addtocart" type="submit" name="cartsubmit" value="Add to cart" size="5"/>';
          echo '</form>';
          echo '</div>';
          echo '</div>';
          echo '<div id="proddes">';
          echo '<div id="productname">'.$row["p_name"].'</div><br>';
          echo '<div style="font-size:1.2vw; font-family:Helvetica;">Product Description:</div>';
          echo '<div id="porductdescription">'.$row["p_desc"].'</div>';
          echo '<table style="width:100%">
          <tr>
          <th></th>
          <th>Minimum Requirements</th>   
          <th>Reccomended</th>
          </tr>
          <tr>
          <td>Processor</td>
          <td>AMD Athlon X2 2.8 GHZ <br> Intel Core 2 Duo 2.4 GHZ</td>    
          <td>AMD Six-Core CPU <br> Intel quad-core CPU</td>
          </tr>
          <tr>
          <td>Memory</td>
          <td>4 GB</td>    
          <td>8 GB</td>
          </tr>
          <tr>
          <td>Graphics Card</td>
          <td>AMD Radeon HD 3870 <br> NVIDIA Geforce 8800 GT</td>    
          <td>AMD Radeon HD 7870 <br> NVIDIA Geforce GTX 660</td>
          </tr>
        </table>';
          echo "</div>";
          echo "</div>";
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