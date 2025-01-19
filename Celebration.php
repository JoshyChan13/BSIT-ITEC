<?php
include ("Modules/connect.php");
include ("Modules/header.php");
    if(!empty($_SESSION["Username"])){
        $user = $_SESSION["Username"];
        $result = mysqli_query($con, "SELECT * FROM account_details WHERE Username = '$user'");
        $row = mysqli_fetch_assoc($result);
    } else{
        header("Location: login.php");
    }
?>
    <br><br><br><br><br><br><br>
    <p class="text-success text-center" style="font-size: 50px;"><i> Book &nbsp&nbsp <span style="font-size: 35px;">your</span> <strong> &nbsp&nbsp Celebration!</strong</i></p>
   
    <div class="container">
        <div class="text">
            <i style="font-size: 40px; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Have a Special Occasion?!</i>
            <p style="font-size: medium;">
                Ready for a Surprise?!
                The hottest take in celebrating a special day is coming to town, Readily served by your beloved Mang Inasal Fast Food Chain
            </p>
        </div>
        <div class="image">
            <img src="img/Celebrate.jpg" alt="Celebration">
        </div>
    </div>

    <div class="container">
        <div class="image1">
            <img src="img/logo.png" alt="Description of the image">
        </div>
        <div class="text1">
            <i style="font-size: 40px; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Did you see it Coming!!</i>
            <p style="font-size: medium;">
              One of your favorite fast food chains in the philippines is now offering the one of the hottest 
              and gri-lliest Special Celebrations in the phillipines, Introducing the <span style="text-decoration: underline;"> Mang-Party Celebration </span>
            </p>
        </div>
    </div>


    <div class="container mt-5">
        <a href="Reservation.php" class="btn1 btn-success btn-lg text-dark m-1" role="button"> <strong style="font-size:33px"> Book Now!</strong> </a>
        <a href="Reservation_details.php" class="btn1 btn-primary btn-lg text-dark m-4 py-3" role="button"> <strong style="font-size:29px"> Reservations</strong> </a>
    </div>
    <br>
    <?php include 'Modules/footer.php'; ?>
