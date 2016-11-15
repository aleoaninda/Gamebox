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
      <?php
        include 'database_auth.php';
        if(isset($_POST["reqsubmit"])){
          $sql="INSERT INTO `request` (`g_name`, `url`, `c_name`, `c_email`) VALUES ('$_POST[g_name]', '$_POST[url]', '$_POST[f_name]', '$_POST[email]')";
          if($database->query($sql)==true)
            $regsuccess=true;
          else
            $regsuccess=false;
        }
        else{
        }
        $database->close();
      ?>
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
        <div id="logincontainer">
          <div class="loginclass" id="register">
            <div id="regcont">
              <div id="regbar"><p class="headerlink">Request</p></div>
              <div class="formcontainer">
                <!--Form for registration-->
                <form action="request.php" method="POST" id="registrationform">
                    Game: <input class="formbox" type="text" name="g_name" size="30"/> <br> <br>
                    URL: <input class="formbox" type="url" name="url" size="30"/> <br> <br>
                    Full Name: <input class="formbox" type="text" name="f_name" size="30"/> <br> <br>
                    Email: <input class="formbox" type="email" name="email" size="30"/> <br> <br>
                    <input class="formbox" type="submit" name="reqsubmit" value="Submit"/>
                </form>
                
              </div>
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
