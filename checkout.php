<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Checkout</title>
</head>
<body>
<h1 class="text-center">E-BookStore</h1>
      <h4 class="text-center">Buy Books From Our Store</h4>
    <form role="form" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="margin:auto;width:50%;margin-top:20px">
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="" name="name" placeholder="Your name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="" name="phone" placeholder="Phone Number">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="" name="email" placeholder="Email">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Card Number</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="" name="payment" placeholder="card number" maxlength="12">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <textarea type="text" name="address" class="form-control" placeholder="Your Address..." rows="3"></textarea>
            </div>
        </div>
        <div class="form-group row">
        <div class="offset-sm-2 col-sm-10 text-center">
          <input type="submit" value="Purchase" name="submit" class="btn btn-primary"/>
        </div>
      </div>
        <!-- <input type="text" name="Fname" id="" placeholder="First Name"> <br><br>
        <input type="text" name="Lname" id="" placeholder="Last Name"> <br><br>
        <input type="email" name="Email" id="" placeholder="Email"> <br><br>
        <input type="number" name="Cnum" id="" placeholder="Card number"> <br><br> -->
        <!-- <input type="submit" value="Purchase" name="submit"> -->
    </form>

<?php
    // if(isset($_POST["submit"])){
    //     order_check();
    // }
?>
    

<?php
require("mysqli_connect.php");
session_start();
if(!isset($_GET["bid"])){
    if(!$_SESSION["bid"]){
        echo "<br>Book id is not set!!!!<br>";
       
    }
}
else{
    $_SESSION["bid"] =  $_GET["bid"];
}

$sID = intval($_SESSION['bid']);

    if(empty($_POST["name"]) || empty($_POST["phone"]) || empty($_POST["email"]) || empty($_POST["payment"]) || empty($_POST["payment"]) || empty($_POST["address"])) {
        echo "<span style='color:red; font-size:2em'>Please fill required fields!!</span>";
    }
    else{
        //echo "updated";
    // Get Item details----------------------------------------------------
        //echo $sID;
        $collectOrder = "SELECT * FROM bookinventory WHERE id = {$sID}";
        $getItem = @mysqli_query($dbc, $collectOrder);
        $itemsGot = @mysqli_fetch_array($getItem);
       // print_r($itemsGot);
    
        $title = $itemsGot['title'];

        // echo $i_id;
        // echo $i_name;
    // Insert into Order Table---------------------------------------------
            $orderQuery = "INSERT INTO bookinventoryorder (C_name, title, number, address, email) 
            VALUES ('{$_POST['name']}', '{$title}', '{$_POST['phone']}', '{$_POST['address']}', '{$_POST['email'   ]}')";

        $order_item = @mysqli_query($dbc,$orderQuery);

        echo "  <br><b><span style='color:red;font-size:2em'>". $title ." Book Ordered !!</span>";
    // Update Quantiy of perticular item in inventory table-----------------
        $updateQuery = "UPDATE bookinventory SET quantity = {$itemsGot['quantity']}- 1 WHERE id= {$sID}";
        $update_table = @mysqli_query($dbc, $updateQuery);

        unset ($_SESSION['bid']);
        session_destroy();

    }
   
?>

   
<footer class="page-footer font-small blue">

<!-- Copyright -->  
<div class="footer-copyright text-center py-3">Pankil© 2021 Copyright:
  <a href="bookstore.php    "> E-BookStore</a>
</div>
<!-- Copyright -->

</footer>

</body>
</html>
