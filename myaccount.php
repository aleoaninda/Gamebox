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
        <div id="logincontainer">
          <div class="loginclass" id="register">
            <div id="regcont">
              <div id="regbar"><p class="headerlink">Account Details</p></div>
              <div class="formcontainer">
                <!--Form for registration-->
                <form action="myaccount.php" method="POST" id="registrationform">
                  <?php
                    $database = new mysqli("localhost","root","ark112angel","gamebox_db"); 
                    if($database->connect_errno){
                    echo "Failed to connect to MySQL: (" . $database->connect_errno . ") ";
                    }
                    $c_id=$_SESSION["CUSTOMER_ID"];
                    if(isset($_POST["accountsubmit"]) && isset($_POST["old_c_password"]) && isset($_POST["new_c_password"])){
                      $old_password = $_POST["old_c_password"];
                      $hashedoldpass = md5($old_password);
                      $sql="SELECT * FROM customer WHERE c_id='$c_id' AND c_password='$hashedoldpass'";
                      $result=$database->query($sql);
                      $row = mysqli_fetch_array($result);
                      if($result){
                        if(mysqli_num_rows($result) > 0){
                          $c_name=$_POST["c_name"];
                          $c_email=  $_POST["c_email"];
                          $phone=  $_POST["c_phone"];
                          $c_username=  $_POST["c_username"];
                          $passowrd= md5($_POST["new_c_password"]);
                          $c_password=  $passowrd;
                          $sql="UPDATE customer SET c_name='$c_name',c_email='$c_email',phone='$phone',c_username='$c_username',c_password='$c_password' WHERE c_id='$c_id'";
                          if($database->query($sql)==true)
                            $regsuccess=true;
                          else
                            $regsuccess=false;
                        }
                      }
                      else{
                        $regsuccess=false;
                      }
                    }
                    elseif(isset($_POST["accountsubmit"])) {
                        $c_name=$_POST["c_name"];
                        $c_email=  $_POST["c_email"];
                        $phone=  $_POST["c_phone"];
                        $c_username=  $_POST["c_username"];
                        $sql="UPDATE customer SET c_name='$c_name',c_email='$c_email',phone='$phone',c_username='$c_username' WHERE c_id='$c_id'";
                        if($database->query($sql)==true)
                          $regsuccess=true;
                        else
                          $regsuccess=false;
                    }
                    else{}

                    $sql2="SELECT `c_name`, `c_email`, `phone`, `c_username`, `c_password`, `trxid` FROM `customer` WHERE c_id='$c_id'";
                    $result=$database->query($sql2);
                    $row = mysqli_fetch_array($result);

                    echo 'Full Name: <input value="'.$row["c_name"].'" class="formbox" type="text" name="c_name" size="30"/> <br> <br>';
                    echo 'Email: <input value="'.$row["c_email"].'" class="formbox" type="email" name="c_email" size="30"/> <br> <br>';
                    echo 'Phone no: <input value="'.$row["phone"].'" class="formbox" type="text" name="c_phone" size="30"/> <br> <br>';
                    echo 'Username: <input value="'.$row["c_username"].'" class="formbox" type="text" name="c_username" size="30"/> <br> <br>';
                    echo 'Old Passowrd: <input value="" class="formbox" type="password" name="old_c_password" size="30"/> <br> <br>';
                    echo 'New Passowrd: <input value="" class="formbox" type="password" name="new_c_password" size="30"/> <br> <br>';
                    echo 'Last Transaction: <input value="'.$row["trxid"].'" class="formbox" type="text" name="trx" size="30"/> <br> <br>';
                    $result->close();
                    $database->close();
                  ?>
                  <input class="formbox" type="submit" name="accountsubmit" value="Save Changes"/>
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