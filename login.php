<?php
    include ("Modules/connect.php");
    session_start()
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
        <h5><a href="home.php"><img class="p-3" style="width: 5%;" src="img/logo.png"></a>Mang Inasal Philippines Inc.</h5>
    </div>

    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card show">
                     <div class="text-center">
                        <img class="my-3" style="width:30%" src="img/logo.png">
                        <h4>LOG IN</h4>
                     </div>

                      <div class="container">
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control" placeholder="Email Adress" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="pword" required>
                                </div>
                                <button type="submit" class="btn btn-success btn-block my-3" name="loginBtn">Log in</button>
                                <center><p>Don't have an account yet?<a href="signup.php"> Register</a></p></center>

                                <?php
                                    if(isset($_REQUEST['loginBtn'])){
                                        $email_add = mysqli_real_escape_string($con, $_POST['email']);
                                        $p_word = mysqli_real_escape_string($con, $_POST['pword']);
                                        $result = mysqli_query($con, "SELECT * FROM account_details WHERE Email='$email_add' AND password='$p_word'");
                                        $row = mysqli_fetch_array($result);

                                        if(is_array($row)){
                                                $_SESSION['Email'] = $row['Email'];
                                                $_SESSION['password'] = $row['password'];
                                        }else{
                                                ?>
                                                    <script type="text/javascript">
                                                        alert("Incorrect email and/or password!");
                                                        window.location = "login.php";
                                                    </script>
                                                <?php
                                            }}if(isset($_SESSION["password"])){
                                                ?>
                                                    <script type="text/javascript">
                                                        alert("Welcome to Mang-Inasal!");
                                                        window.location = "home.php";
                                                    </script>
                                                <?php
                                            }
                                ?>
                            </form>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
     <br><br><br><br><br><br><br><br><br><br>
    <footer class="bg-light text-center text-lg-start">
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        <h4>All Rights Reserved. Mang Inasal Philippines, Inc. 2023</h4>
    </div>
    </footer>
</body>
</html>
