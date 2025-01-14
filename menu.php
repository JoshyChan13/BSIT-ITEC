<?php 
    include ("Modules/connect.php");

    $sql = "SELECT * FROM products";
    $all_product = $con->query($sql)
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
            <a href="login.php" class="login">LOGIN</a>
        </nav>
    </header>
<BR><BR><BR><BR><BR><BR><BR>
<section class="menu" id="menu">
    <h1 class="heading text-center" style="font-size: 45px;"><strong>Our <span class="text-success">MENU</span></strong> </h1>
    <?php
        while($row = mysqli_fetch_assoc($all_product)){
    ?>
        <div class="box-container">
            <div class="box">
                <img class="image" src="<?php '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>'; ?>" alt="">
                <div class="content">
                    <h3 class="p_name"><?php echo $row["name"]; ?></h3>
                    <p class="p_price"><?php echo $row["price"]; ?></p>
                </div>
                <a href="" class="btn">Add to Cart</a>
        </div>
    <?php
        }
    ?>
</section>
</body>
</html>
