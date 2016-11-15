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
        $signinsucess=true;
        include 'database_auth.php';

        if(isset($_POST["signinsubmit"])){
          if($_POST["username"]=="admin"){
            echo "<h1>admin</h1>";
          }
          else{
            $username = $_POST['username'];
            $user_password = $_POST['password'];
            $password = md5($user_password);
            $sql="SELECT * FROM customer WHERE c_username='$username' AND c_password='$password'";
            $result = $database->query($sql);
            if($result){
              if(mysqli_num_rows($result) > 0) {
                $row=mysqli_fetch_array($result);
                $_SESSION["CUSTOMER_ID"] = $row["c_id"];
                $_SESSION["USER_NAME"] = $row["c_username"];
                session_write_close();
                $result->close();
                header("location: index.php");
                exit();
              }
              else{
                $signinsucess= false;
              }
            }
            else{
              $signinsucess= false;
            }
          }
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
          <div class="loginclass" id="signin">
            <div id="signcont">
              <div id="signbar"><p class="headerlink">Sign in</p></div>
              <div class="formcontainer">
                <!--Form for sign in-->
                <form action="login.php" method="POST" id="signinform">
                    Username: <input class="formbox" type="text" name="username" size="30"/> <br> <br>
                    Password: <input class="formbox" type="password" name="password" size="30"/> <br><br>
                    <input class="formbox" type="submit" name="signinsubmit" value="Sign in"/>
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
