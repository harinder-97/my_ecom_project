<?php
require('mysqli_connect.php');
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
             <div class="overlay">
           <div class="main-text">
      <h1>Welcome to Book Basket</h1>
      <h2>If you are a book reader then you are on right place.</h2>
            <p class="p-color">Book Basket provides you number of books to buy.</p>
            
    </div>
                 </div>
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