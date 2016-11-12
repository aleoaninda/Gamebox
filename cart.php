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
        <div id="cartbar"><p class="headerlink">Cart</p></div>
        <div id="cartcontainer" style="height:30%;">
        
        <?php

        $database = new mysqli("localhost","root","ark112angel","gamebox_db"); 
        if($database->connect_errno){
          echo "Failed to connect to MySQL: (" . $database->connect_errno . ") ";
        }
        $c_id = $_SESSION["CUSTOMER_ID"];
        $sql = "SELECT * FROM cart, product WHERE cart.p_id=product.p_id AND cart.c_id='$c_id'  AND cart.processed='0' AND cart.paid='0'";
        $result=$database->query($sql);
        $result2=$database->query($sql);
        $row_cnt = $result->num_rows;
        echo '<p id="itemcnt" style="display:none;">'.$row_cnt.'<p>';
        if($row_cnt>0){
          $id=1;
          echo '<form id="checkoutform" action="checkout.php" method="POST" style="height:100%; width=100%;">';
          while($row = mysqli_fetch_array($result)){
              echo '<div class="cartitem">';
              echo '<div class="cartimagecontainer"><a href="product-details.php?product_id='.$row["p_id"].'"><img class="cartimage" src="'.$row["p_img"].'"></a></div>';
              echo '<div class="producttextcontainer">';
              echo '<div id="productname">'.$row["p_name"].'</div><br>';
              echo '<div style="font-size:1.2vw; font-family:Helvetica;">Product Description:</div>';
              echo '<div id="porductdescription">'.$row["p_desc"].'</div>';
              echo '</div>';
              echo '<div class="costinfocontainer">';
              echo '<div><p class="cartprice">Base Price: </p><p class="cartprice" id="baseprice'.$id.'">'.$row["price"].'</p></div>';
              echo '<div>';
              echo 'Quantity: <input name="'.$row["p_id"].'" id="quantity'.$id.'" type="number" min="1" onchange="costcalcFunction()" value="'.$row["quantity"].'" size="1"/>';
              echo '</div>';
              echo '<div><p class="cartprice">Sub Total: </p><p class="cartprice" id="subtotal'.$id.'">'.$row["price"].'</p></div>';
              
              //echo '<input style="visibility:hidden;" type="text" name="product_id" value="'.$row["p_id"].'"/>
              //      <input id="removeproduct" type="submit" name="removeitem" value="Remove"/>';
              
              echo '</div>';  
              echo '</div>';
              $id = $id + 1;
          }
          echo '<div id="totalcostcontainer">';
          echo '<div><p class="cartprice">Total cost: </p><p class="cartprice" id="total"></p></div>';
           echo '<input id="proceedtocheckout" type="submit" name="checkout" value="Proceed to Checkout"/>';  
          echo '</div>';
          echo '</form>';
          /*form for product removal*/
          echo '<div id="removeprodformcont">';
          while($row2 = mysqli_fetch_array($result2)){
            echo '<div class="removeprodform">';
            echo '<form  action="removeproduct.php" method="POST">
                  <input style="visibility:hidden;" type="text" name="product_id" value="'.$row2["p_id"].'"/>
                  <input id="removeproduct" type="submit" name="removeitem" value="Remove"/>
                  </form>';
            echo '</div>';
          }
          echo '</div>';
        }
         else{
          echo "<h1>Nothing has been added to the cart.</h1>";
        }
        $result->close();
        $result2->close();
        $database->close();

        ?>
        </div>
        <div id="tailbox2">
            <div class="tailinfo2"><p>Payment accepted only via</p><a title="Bkash" href="http://www.bkash.com/" target="_blank"><img class="clients2" src="./img/clients/bkash.png"></a></div>
            <div class="tailinfo2"><p>Join us in our Facebook page</p><a title="Facebook" href="https://www.facebook.com/" target="_blank"><img class="clients2" src="./img/clients/facebook.png"></a></div>
            <div class="tailinfo2"><p>Follow us on Twitter</p><a title="Twitter" href="https://twitter.com/" target="_blank"><img class="clients2" src="./img/clients/twitter.png"></a></div>
            <div class="tailinfo2"><p>Play with us on Player Dot Me</p><a title="Player Dot Me" href="https://player.me/" target="_blank"><img class="clients2" src="./img/clients/playerdotme.png"></a></div>
            <div id="tailbar2">&copy 2016 Gamebox &nbsp</div>
        </div>
        <script>
          function costcalcFunction() {
            var noofitems = document.getElementById("itemcnt").innerHTML;
            var total=0;
            var bparray = [];
            var qarray = [];
            var starray= [];
            var i=0;
            var k=1;
            do {
              bparray[i] = "baseprice"+k;
              qarray[i] = "quantity"+k;
              starray[i] = "subtotal"+k;
              i = i+1;
              k = k+1;
             }
            while (i<noofitems)
              var y=0;
              do{
              var baseprice = document.getElementById(bparray[y]).innerHTML;
              var quantity = document.getElementById(qarray[y]).value;
              var subtotal = baseprice * quantity;
              document.getElementById(starray[y]).innerHTML = subtotal;
              total=subtotal+total;
              y = y+1;
            }
            while (y<noofitems)
            document.getElementById("total").innerHTML = total;
          }
        </script>
    </body>
</html>