<!--
Gamebox.com alpha Ver 1.2
for the final project of CSE 391
by Aleo Aninda (ID: 13301113)
-->
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
        $database = new mysqli("localhost","root","ark112angel","gamebox_db"); 
        if($database->connect_errno){
          echo "Failed to connect to MySQL: (" . $database->connect_errno . ") ";
        }

        if(isset($_POST["registersubmit"])){
          $password=md5($_POST["password"]);
          $sql="INSERT INTO customer (c_id, c_name, c_email, phone, c_username, c_password) VALUES (NULL,'$_POST[f_name]', '$_POST[email]','$_POST[phone]','$_POST[username]','$password')";
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
                  <a class="headerlink" href="register.php">Register</a> &nbsp &nbsp
                  <a class="headerlink" href="login.php">Sign in</a> &nbsp &nbsp
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
              <div id="regbar"><p class="headerlink">Register</p></div>
              <div class="formcontainer">
                <!--Form for registration-->
                <form action="register.php" method="POST" id="registrationform">
                    Full Name:<input class="formbox" type="text" name="f_name" size="30"/> <br> <br>
                    Email:<input class="formbox" type="email" name="email" size="30"/> <br> <br>
                    Phone no:<input class="formbox" type="text" name="phone" size="30"/> <br> <br>
                    Username:<input class="formbox" type="text" name="username" size="30"/> <br> <br>
                    Password:<input class="formbox" type="password" name="password" size="30"/> <br> <br>
                    <input class="formbox" type="submit" name="registersubmit" value="Register"/>
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