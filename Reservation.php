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
    <title>Reservation</title>
</head>
<body>
<div class="container-fluid bg-success text-white">
        <h5><a href="index.php"><img class="p-3" style="width: 5%;" src="img/logo.png"></a>Mang Inasal Philippines Inc.</h5>
    </div>

    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card show">
                     <div class="text-center">
                        <img class="my-3" style="width:30%" src="img/logo.png">
                        <h4>Create a reservation</h4>
                     </div>

                      <div class="container">
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" placeholder="Date" name="date" required>
                                </div>
                                <div class="form-group">
                                    <label>Time</label>
                                    <select id="options" class="form-control" name="time" required>
                                        <option value="" selected></option>
                                        <option value="9am - 12-pm">9am - 12-pm</option>
                                        <option value="1pm - 4pm">1pm - 4pm</option>
                                        <option value="5pm - 7pm">5pm - 7pm</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Number of Guests</label>
                                    <input type="number" class="form-control" placeholder="Maximum of 60 Guests" name="guests" required>
                                </div>
                                <button type="submit" class="btn btn-success text-dark btn-block my-3" name="createBtn">Submit</button>
                            </form>
                            <?php
                                if(isset($_REQUEST['createBtn'])){
                                    $name = mysqli_real_escape_string($con, $_POST['name']);
                                    $email_add = mysqli_real_escape_string($con, $_POST['email']);
                                    $date = mysqli_real_escape_string($con, $_POST['date']);
                                    $time = mysqli_real_escape_string($con, $_POST['time']);
                                    $No_of_Guests = mysqli_real_escape_string($con, $_POST['guests']);
                                    $Event = mysqli_real_escape_string($con, $_POST['event']);

                                    $insert = mysqli_query($con, "INSERT INTO reservation_details VALUE('', '$name', '$email_add', '$date', '$time', '$No_of_Guests', '$Event')");
                                        ?>
                                            <script type="text/javascript">
                                                alert("Reservation Booked!");
                                                window.location = "Celebration.php";
                                            </script>
                                        <?php
                                        }
                            ?>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-light text-center text-lg-start">
   
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        <h4>All Rights Reserved. Mang Inasal Philippines, Inc. 2023</h4>
    </div>
    </footer>
</body>
</html>