<?php
include ("Modules/connect.php");
    if(!empty($_SESSION["Username"])){
        $user = $_SESSION["Username"];
        $result = mysqli_query($con, "SELECT * FROM account_details WHERE Username = '$user'");
        $row = mysqli_fetch_assoc($result);
    } else{
        header("Location: login.php");
    }
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
    <a href=""><img src="img/logo.png" style="width: 110px;"></a>
    <nav class="navbar">
    <a href="home.php" class="nav">HOME</a>
            <a href="menu.php" class="nav">MENU</a>
            <a href="Celebration.php" class="nav">RESERVATION</a>
            <a href="Contact.php" class="nav">CONTACT</a>
            <a href="logout.php" class="login" onclick="logout()">LOGOUT</a>
    </nav>
</header>

<div class="container my-5">
    <h2 class="text-success text-center mb-4"><br><br><br><br><strong>Contact Us</strong></h2>
    <div class="row g-4">
      
      <div class="col-md-6">
        <div class="p-4 border rounded shadow-sm">
          <h4 class="fw-bold">Corporate Head Office</h4>
          <p><strong>Phone:</strong> (02) 8-634-1111</p>
          <p><strong>Address:</strong> Unit 407, 4th flr., Jollibee Plaza, F. Ortigas Jr. Avenue, Ortigas Center, Pasig City</p>
          <hr>
          <h5 class="fw-bold">Customer Care</h5>
          <p><strong>Hotline:</strong> #7-33-33</p>
          <p>Our agents are available to assist you daily from <strong>9:00 AM to 9:00 PM</strong>.</p>
         
          </div>
        </div>
      
      
      <div class="col-md-6">
        <div class="p-4 border rounded shadow-sm">
          <h4 class="fw-bold">Visit Us!</h4>
          <p><strong>Facebook:</strong><a href="https://www.facebook.com/manginasalph"> https://www.facebook.com/manginasalph</a></p></p>
          <p><strong>Instagram:</strong><a href="https://www.instagram.com/iammanginasal"> https://www.instagram.com/iammanginasal</a></p></p>
          <p><strong>Tiktok:</strong><a href="https://www.tiktok.com/@manginasalph"> https://www.tiktok.com/@manginasalph</a></p></p>
      </div>
  </div>

          
        
    </div>
  </div>

  

</body>
</html>
