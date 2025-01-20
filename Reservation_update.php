<?php
    include ("Modules/connect.php");
    $rid = $_GET['rid'];
    $sql = mysqli_query($con, "SELECT * FROM reservation_details WHERE Reservation_id = '$rid'");
    $rec = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script text="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Update Reservation</title>
</head>
<body>
    <div class="container-fluid bg-success text-white">
        <h5><a href="home.php"><img class="p-3" style="width: 5%;" src="img/logo.png"></a>Mang Inasal Philippines Inc.</h5>
    </div>

    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card show">
                     <div class="text-center">
                        <img class="my-3" style="width:30%" src="img/logo.png">
                        <h4>Update Reservation</h4>
                     </div>

                      <div class="container">
                        <div class="login-form">
                        <form action="" method="post">
                                <div class="form-group">
                                    <label>Reservation_Id</label> 
                                    <input type="text" class="form-control" name = "rid1" value="<?php echo $rec['Reservation_id']; ?>" disabled>
                                    <input type="text" class="form-control" name = "rid" value="<?php echo $rec['Reservation_id']; ?>" hidden>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="" name="name" value="<?php echo $rec['Name']; ?>" required>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="" name="email" value="<?php echo $rec['Email']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" placeholder="Date" name="date" value="<?php echo $rec['Date']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Time</label>
                                    <select id="options" class="form-control" name="time" required>
                                        <option selected> <?php echo $rec['Time']; ?></option>
                                        <option value="9am - 11-am">9am - 11-am</option>
                                        <option value="1pm - 3pm">1pm - 3pm</option>
                                        <option value="4pm - 6pm">4pm - 6pm</option>
                                        <option value="7pm - 9pm">7pm - 9pm</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Number of Guests</label>
                                    <input type="number" class="form-control" placeholder="Maximum of 60 Guests" name="guests" value="<?php echo $rec['Num_of_Guests']; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-success text-dark btn-block my-3" name="reserved_edit">Submit</button>
                                <a href="Celebration.php" class="btn btn-outline-success btn-block text-dark" role="button">Back</a>
                            </form>
                            <?php
                                if(isset($_REQUEST['reserved_edit'])){
                                    $r_id = mysqli_real_escape_string($con, $_POST['rid']);
                                    $name = mysqli_real_escape_string($con, $_POST['name']);
                                    $email_add = mysqli_real_escape_string($con, $_POST['email']);
                                    $date = mysqli_real_escape_string($con, $_POST['date']);
                                    $time = mysqli_real_escape_string($con, $_POST['time']);
                                    $No_of_Guests = mysqli_real_escape_string($con, $_POST['guests']);

                                    $update = mysqli_query($con, "UPDATE reservation_details SET Name = '$name', Email = '$email_add', Date='$date', Time='$time', Num_of_Guests='$No_of_Guests' WHERE Reservation_id='$r_id'");
                                    if($update){ ?>
                                        <script type="text/javascript">
                                            alert("Updated Successfully!");
                                            window.location = "Reservation_details.php";
                                        </script>
                                    <?php
                                    }else{ ?>
                                    <script type="text/javascript">
                                        alert("Failed to reserve, Try again!");
                                        window.alert = "Reservation.php";
                                    </script>
                                    <?php
                                }
                                }
                            ?>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>