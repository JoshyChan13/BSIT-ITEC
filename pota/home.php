<?php
include ("Modules/connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script text="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="home.css">
    <title>Mang Inasal v2.0</title>
</head>
<body>
<header>
        <img src="img/logo.png" style="width: 110px;">
        <nav class="navbar">
            <a href="home.php" class="nav">HOME</a>
            <a href="menu.php" class="nav">MENU</a>
            <a href="Celebration.php" class="nav">RESERVATION</a>
            <a href="view_cart.php" class="nav">CART</a>
            <a href="Contact.php" class="nav">CONTACT</a>
            <a href="logout.php" class="login" onclick="logout()">LOGOUT</a>
        </nav>
    </header>

<section class="home" id="home">
    <div class="content">
        <h3>MANG INASAL</h3>
        <p>Laging hinahanap-hanap ni Angel ang <br>
        walang kapantay sa 2-in-1 sa laki at <br>
        #NuotSaSarap na Mang Inasal Chicken!</p>
        <a href="menu.php" class="btn">Order Now!</a>
    </div>

    <div class="image ">
        <img src="img/manok.jpg" alt="">
    </div>
    
    <div class="container bg-light p-3">
        <h2 class="p-2">BEST SELLERS</h2>
            <div class="row">
                <div class="p-4 my-2">
                    <div class="card" style="width: 200px;">
                        <a href="menu.php"><img class="card-img-top" src="img/paa.png" alt="card image" style="width: 100%;"></a>
                        <div class="card-body">
                            <h4 class="card-title">Paa Large - PM1 (solo)</h4>
                            <h6 class="card-text">Starts at ₱146</h6>
                        </div>
                    </div>
                </div>
                <div class="p-4 my-2">
                    <div class="card" style="width: 200px;">
                        <a href="menu.php"><img class="card-img-top" src="img/bbq.png" alt="card image" style="width: 100%;"></a>
                        <div class="card-body">
                            <h4 class="card-title">2 pcs Pork BBQ (solo)</h4>
                            <h6 class="card-text">Starts at ₱112</h6>
                        </div>
                    </div>
                </div>
                <div class="p-4 my-2">
                    <div class="card" style="width: 200px;">
                        <a href="menu.php"><img class="card-img-top" src="img/halohalo.png" alt="card image" style="width: 100%;"></a>
                        <div class="card-body">
                            <h4 class="card-title">Extra Creamy Halo-Halo</h4>
                            <h6 class="card-text">Starts at ₱76</h6>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="container-fluid">
        <div class="jumbotron">
            <h4>All Rights Reserved. Mang Inasal Philippines, Inc. 2023</h4>
        </div>
    </div>
</section>

</body>
</html>
