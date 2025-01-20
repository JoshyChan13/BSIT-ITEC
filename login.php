<?php
session_start();
include("Modules/connect.php");

if (isset($_SESSION['Username'])) {
    header("Location: home.php");
    exit();
}

if (isset($_POST['loginBtn'])) {
    $user_name = mysqli_real_escape_string($con, $_POST['username']);
    $p_word = mysqli_real_escape_string($con, $_POST['pword']);
    
    $sql = "SELECT * FROM account_details WHERE Username='$user_name' AND Password='$p_word'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $_SESSION['Username'] = $row['Username'];
        $_SESSION['Fname'] = $row['Fname'];
        $_SESSION['Lname'] = $row['Lname'];
        $_SESSION['Cont_num'] = $row['Cont_num'];
        $_SESSION['Email'] = $row['Email'];
        $_SESSION['Password'] = $row['Password'];
        
        header("Location: home.php");
        exit();
    } else {
        echo "<script>
                alert('Incorrect username and/or password!');
                window.location = 'login.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="homer.css">
    <title>Login</title>
</head>
<body class="bg-white">
    <footer>
    <div>
        <h5><a href="home.php"><img class="p-3" style="width: 5%;" src="img/logo.png"></a>Mang Inasal Philippines Inc.</h5>
    </div>
    </footer>

    <div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-12 col-md-6 pt-5">
      <div class="card">
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
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include("Modules/footer.php"); ?>
