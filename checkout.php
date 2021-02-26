<?php
session_start();
    
	
if (isset($_GET['name'])) {
    $_SESSION['name'] = $_GET['name'];
    $book_name = $_SESSION['name'];
}
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>BookBasket</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="style.css">

</head>

<body>
    <nav>
        <div class="logo">
            <a href="index.php">Book Basket</a>
        </div>
        <ul class="nav-links">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="store.php">My Store</a></li>
        </ul>
       <div class="burger">
         <div class="line1"></div>
           <div class="line2"></div> 
         <div class="line3"></div>
        </div>
    </nav>
	<main id="main-bg">
    <h1 id="checkout">check out</h1>
	<?php
require('mysqli_connect.php');
?>
<?php


if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$cust_fname = $_POST['cust_fname'];
	$cust_lname = $_POST['cust_lname'];
	
	  $book_name = $_SESSION['name'];
	$errors = true;
	if(empty($cust_fname)) {
		$error_msg ="customer first name is required.";
		$errors = false;
	}
	if(empty($cust_lname)) {
		$error_msg2 = "customer last name is required.";
		$errors = false;
	}
	if(!isset($_POST['payment_option'])) {
		$error_msg3 = "payment option is required.";
		$errors = false;
	}
	if($errors==true) {
		$username = $dbc -> real_escape_string($_POST['cust_fname']);
		$email = $dbc -> real_escape_string($_POST['cust_lname']);
		$payment_option = $dbc -> real_escape_string($_POST['payment_option']);
		$book_name = $dbc -> real_escape_string($_SESSION['name']);
		
	
		$query = "INSERT INTO `book_order`(`cust_fname`, `cust_lname`, `payment_option`,`book_name`) VALUES ('$cust_fname','$cust_lname','$payment_option','$book_name')";
		$insert = mysqli_query($dbc, $query);
		if($insert) {
			$msg = "Your order has been placed!";
		}
	
		$update_inventory = "Update book_inventory SET book_quantity= book_quantity-1 where book_name='$book_name'";
	    mysqli_query($dbc, $update_inventory);
	}
	
	
	mysqli_close($dbc);
}
?>
<form id="frmContact" method="post" action="checkout.php">
 <div class="contact-row ">
        <label style="padding-top: 20px;">First Name</label> <span
            id="userName-info" class="info"><h6><?php if(isset($error_msg)){ echo $error_msg; }?></h6></span><br /> <input
            type="text" name="cust_fname" id="cust_fname"
            class="demoInputBox" value="<?php if(isset($_POST['cust_fname'])) echo $_POST['cust_fname'];?>">
    </div>
	<div class="contact-row">
        <label style="padding-top: 20px;">last Name</label> <span
            id="userName-info" class="info"><h6><?php if(isset($error_msg2)){ echo $error_msg2; }?></h6></span><br /> <input
            type="text" name="cust_lname" id="cust_lname"
            class="demoInputBox" value="<?php if(isset($_POST['cust_lname'])) echo $_POST['cust_lname'];?>">
    </div>
<div class="contact-row">
        <span
            id="userName-info" class="info"><h6><?php if(isset($error_msg3)){ echo $error_msg3; }?></h6></span><br /> <input
            type="radio" name="payment_option" id="payment_option"
             value="debit"<?php if(isset($_POST['payment_option'])) echo $_POST['payment_option'];?>">
			  <label>debit</label>
    </div>
	<div class="contact-row">
        <span
            id="userName-info" class="info"></span><br /> <input
            type="radio" name="payment_option" id="payment_option" 
             value="Credit"<?php if(isset($_POST['payment_option'])) echo $_POST['payment_option'];?>">
			  <label>Credit</label>
    </div>
	<div>
        <input type="submit" value="Check Out" class="btnAction" />
		<h5 style="color:green;"><?php if(isset($msg)) {echo $msg;}?></h5>
    </div>
</form>
</main>

     <footer>
        <h3>Book Basket</h3>
              <p>
                3055 Bode Road <br>
               Schaumburg, IL 60194<br><br>
                <strong>Phone:</strong> +1  847-555-5555<br>
                
              </p>
         <div class="copyright">
        &copy; Copyright 2021<strong><span>Book Basket</span></strong>. All Rights Reserved
      </div>
    </footer>
  <script src="scripts.js"></script>
  </body>
</html>