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
    <title>Mang Inasal v2.0</title>
</head>
<body class="bg-white">
    <div class="container-fluid bg-success text-white">
        <h5><a href="index.php"><img class="p-3" style="width: 5%;" src="img/logo.png"></a>Mang Inasal Philippines Inc.</h5>
    </div>

    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card show">
                     <div class="text-center">
                        <img class="my-3" style="width:30%" src="logo.png">
                        <h4>CREATE AN ACCOUNT</h4>
                     </div>

                      <div class="container">
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" name="fname" required>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" name="lname" required>
                                </div>
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="number" class="form-control" placeholder="Middle Name" name="contact">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control" placeholder="Email Address" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="pword1" required>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="pword2" required>
                                </div>
                                <button type="submit" class="btn btn-success btn-block my-3" name="createBtn">Create Account</button>
                                <center><p>Already have an account?<a href="login.php"> Log in</a></p></center>
                            </form>
                            <?php
                                if(isset($_REQUEST['createBtn'])){
                                    $f_name = mysqli_real_escape_string($con, $_POST['fname']);
                                    $l_name = mysqli_real_escape_string($con, $_POST['lname']);
                                    $cont_num = mysqli_real_escape_string($con, $_POST['contact']);
                                    $email_add = mysqli_real_escape_string($con, $_POST['email']);
                                    $pword_1 = mysqli_real_escape_string($con, $_POST['pword1']);
                                    $pword_2 = mysqli_real_escape_string($con, $_POST['pword2']);

                                    if($pword_1 == $pword_2){
                                        $insert = mysqli_query($con, "INSERT INTO account_details VALUE('', '$f_name', '$l_name', '$cont_num', '$email_add', '$pword_1')");
                                        ?>
                                            <script>
                                                alert("Account Successfully Created!");
                                                windows.location = login.php
                                            </script>
                                        <?php
                                        }   
                                            else{
                                            ?>
                                            <script>
                                                alert("Confirm password again!");
                                                windows.location = signup.php
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
    <footer class="bg-light text-center text-lg-start">
   
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        <h4>All Rights Reserved. Mang Inasal Philippines, Inc. 2023</h4>
    </div>
    </footer>
</body>
</html>
