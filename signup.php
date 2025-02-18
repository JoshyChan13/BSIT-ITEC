<?php
    include("Modules/connect.php");
    session_start();
    if (isset($_SESSION['Username'])) {
        header("Location: home.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script text="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="homer.css">
    <title>Signup</title>
</head>
<body class="bg-white">
    <footer>
    <div>
        <h5><a href="home.php"><img class="p-3" style="width: 5%;" src="img/logo.png"></a>Mang Inasal Philippines Inc.</h5>
    </div>
    </footer>

    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card show">
                     <div class="text-center">
                        <img class="my-3" style="width:30%" src="img/logo.png">
                        <h4>CREATE AN ACCOUNT</h4>
                     </div>

                      <div class="container">
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="" name="fname" required>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="" name="lname" required>
                                </div>
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" placeholder="" name="contact" required>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control" placeholder="" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="" name="pword1" required>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="" name="pword2" required>
                                </div>
                                <button type="submit" class="btn btn-success btn-block my-3" name="createBtn">Create Account</button>
                                <center><p>Already have an account?<a href="login.php"> Log in</a></p></center>
                            </form>
                            <?php
                                if (isset($_REQUEST['createBtn'])) {
                                $f_name = mysqli_real_escape_string($con, $_POST['fname']);
                                $l_name = mysqli_real_escape_string($con, $_POST['lname']);
                                $cont_num = mysqli_real_escape_string($con, $_POST['contact']);
                                $user_name = mysqli_real_escape_string($con, $_POST['username']);
                                $email_add = mysqli_real_escape_string($con, $_POST['email']);
                                $pword_1 = mysqli_real_escape_string($con, $_POST['pword1']);
                                $pword_2 = mysqli_real_escape_string($con, $_POST['pword2']);

                                if ($pword_1 === $pword_2) {
                                    $check_query = "SELECT * FROM account_details WHERE Username = ?";
                                    $stmt = $con->prepare($check_query);
                                    $stmt->bind_param("s", $user_name);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                            ?>
                                <script type="text/javascript">
                                    alert("The username already exists, Please enter again!");
                                    window.location = "signup.php";
                                </script>
                            <?php
                                    } else {
                                    $insert_query = "INSERT INTO account_details VALUE(?, ?, ?, ?, ?, ?)";
                                    $insert_stmt = $con->prepare($insert_query);
                                    $insert_stmt->bind_param("ssssss", $f_name, $l_name, $cont_num, $user_name, $email_add, $pword_1);
                                    $insert_stmt->execute();
                                ?>
                                <script type="text/javascript">
                                    alert("Account Successfully Created!");
                                    window.location = "login.php";
                                </script>
                                <?php
                                }
                                } else {
                            ?>
                                <script type="text/javascript">
                                    alert("Passwords do not match. Please try again.");
                                    window.location = "signup.php";
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
    <?php include("Modules/footer.php"); ?>