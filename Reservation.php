<?php
    include("Modules/connect.php");
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
                                    <input type="text" class="form-control" placeholder="QWERTY" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="QWERTY@gmail" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" placeholder="Date" name="date" required>
                                </div>
                                <div class="form-group">
                                    <label>Time</label>
                                    <input type="text" class="form-control" placeholder="Time" name="time" required>
                                </div>
                                <div class="form-group">
                                    <label>Number of Guests</label>
                                    <input type="number" class="form-control" placeholder="Maximum of 60 Guests" name="guests" required>
                                </div>
                                <div class="form-group">
                                    <label>Event</label>
                                    <input type="text" class="form-control" placeholder="Birthday" name="event" optional>
                                </div>
                                <button type="submit" class="btn btn-success btn-block my-3" name="createBtn">Submit</button>
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