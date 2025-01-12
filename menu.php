<?php 
include 'Modules/connect.php';
if(isset($_POST['add_to_cart'])){
    $product_name=$_POST['product_name'];
    $product_name=$_POST['product_price'];
    $product_name=$_POST['product_image'];
    $product_quantity=1;

    $insert_products=mysqli_query($con, "INSERT INTO 'cart' (name, price, image, quantity) values ('$product_name', '$product_price', '$product_image '$product_quantity', '$product_quantity')");
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
            <a href="home.php">HOME</a>
            <a href="menu.php">MENU</a>
            <a href="">CARTS</a>
            <a href="Celebration.php">CELEBRATIONS</a>
            <a href="">CONTACT US</a>
            <a href="login.php"></a>
        </nav>
    </header>

    <div class="container">
        <section class="products">
            <h1 class="heading"> our <span>menu</span> </h1>
                <div class="product_container">
<?php
$select_products=mysqli_query($con, "SELECT * FROM 'item_menu'");
if(mysqli_num_rows($select_products)>0){
    while($fetch_product=mysqli_fetch_assoc($select_products)){
        ?>
            <form method="post" action="">
                <div class="edit_form">
                    <img src="images/<?php echo $fetch_product['image'] ?>" alt="">
                    <h2><?php echo $fetch_product['item_name'] ?></h2>
                    <div class="price">Price: <?php echo $fetch_product['item_price'] ?></div>
                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['item_name'] ?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch_product['item_price'] ?>">
                    <input type="hidden" name="product_image" value="<?php echo $fetch_product['item_name'] ?>">
                    <input type="submit" value="Add to Cart" name="add_to_cart">

                </div>
                
</form>
<?php
    }
}else{
    echo "No products available";
}
?>

                </div>
        </section>    
    </div>
</body>
</html>
