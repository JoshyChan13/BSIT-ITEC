<?php
    include ("Modules/connect.php");
    if(!empty($_SESSION["Username"])){
        header("Location: home.php");
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
    <title>Login</title>
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
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="pword" required>
                                </div>
                                <button type="submit" class="btn-success btn-block my-3" name="loginBtn">Log in</button>
                                <center><p>Don't have an account yet?<a href="signup.php"> Register</a></p></center>

                                <?php
                                    if(isset($_REQUEST['loginBtn'])){
                                        $user_name = mysqli_real_escape_string($con, $_POST['username']);
                                        $p_word = mysqli_real_escape_string($con, $_POST['pword']);
                                        $result = mysqli_query($con, "SELECT * FROM account_details WHERE Username='$user_name' AND Password='$p_word'");
                                        $row = mysqli_fetch_array($result);

                                        if(is_array($row)){
                                                $_SESSION['Username'] = $row['Username'];
                                                $_SESSION['Password'] = $row['Password'];
                                        }else{
                                                ?>
                                                    <script type="text/javascript">
                                                        alert("Incorrect email and/or password!");
                                                        window.location = "login.php";
                                                    </script>
                                                <?php
                                            }}if(isset($_SESSION["Username"])){
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
<?php include 'Modules/footer.php'; ?>
