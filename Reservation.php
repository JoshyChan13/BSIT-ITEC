<?php
    session_start();
    if (!isset($_SESSION['Username'])) {
        echo '<script type="text/javascript">window.location.href = "login.php";</script>';
        exit();
    }
    include ("Modules/connect.php");
    include ('Modules/header.php'); 

    $sql = mysqli_query($con, "SELECT COUNT(*) AS num FROM reservation_details");
    $ids = mysqli_fetch_assoc($sql);
    $user = $_SESSION['Username'];
    $sql = mysqli_query($con, "SELECT * FROM account_details WHERE Username = '$user'");
    $rec = mysqli_fetch_assoc($sql);
?>

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
                                    <label>Reservation_Id</label>
                                    <input type="text" class="form-control" value="<?php echo 2024 . $ids['num']?>" name="rid1" disabled>
                                    <input type="text" class="form-control" value="<?php echo 2024 . $ids['num']?>" name="rid" hidden>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" value="<?php echo $rec['Username']; ?>" placeholder="" name="name" required>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" value="<?php echo $rec['Email']; ?>" placeholder="" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" placeholder="Date" name="date" required>
                                </div>
                                <div class="form-group">
                                    <label>Time</label>
                                    <select id="options" class="form-control" name="time" required>
                                        <option value="" selected></option>
                                        <option value="9am - 11-am">9am - 11-am</option>
                                        <option value="1pm - 3pm">1pm - 3pm</option>
                                        <option value="4pm - 6pm">4pm - 6pm</option>
                                        <option value="7pm - 9pm">7pm - 9pm</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Number of Guests</label>
                                    <input type="number" class="form-control" placeholder="Maximum of 60 Guests" name="guests" required>
                                </div>
                                <button type="submit" class="btn btn-success text-dark btn-block my-3" name="reserved">Submit</button>
                                <a href="Celebration.php" class="btn btn-outline-success btn-block text-dark" role="button">Back</a>
                            </form>
                            <?php
                                if(isset($_REQUEST['reserved'])){
                                    $r_id = mysqli_real_escape_string($con, $_POST['rid']);
                                    $name = mysqli_real_escape_string($con, $_POST['name']);
                                    $email_add = mysqli_real_escape_string($con, $_POST['email']);
                                    $date = mysqli_real_escape_string($con, $_POST['date']);
                                    $time = mysqli_real_escape_string($con, $_POST['time']);
                                    $No_of_Guests = mysqli_real_escape_string($con, $_POST['guests']);

                                    $insert = mysqli_query($con, "INSERT INTO reservation_details VALUE('$r_id', '$name', '$email_add', '$date', '$time', '$No_of_Guests')");
                                    
                                    if($insert){ ?>
                                            <script type="text/javascript">
                                                alert("Reservation Booked!");
                                                window.location = "Celebration.php";
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
    <?php include 'Modules/footer.php'; ?>