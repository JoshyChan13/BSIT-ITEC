<?php 
include ("Modules/connect.php");
include ('Modules/header.php'); 
    $sql = mysqli_query($con, "SELECT * FROM account_details WHERE Username = '$user'");
    $rec = mysqli_fetch_assoc($sql);
?>

<div class="form-container">
  <h3 class="text-success">Update Profile</h3>
  <form action="" method="post">
    <div class="row g-3 mb-3">
      <div class="col-md-6">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" name="username" placeholder="" required>
      </div>
      <div class="col-md-6">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" placeholder="" required>
      </div>
    </div>
    <div class="row g-3 mb-3">
      <div class="col-md-6">
        <label for="firstname" class="form-label">Firstname:</label>
        <input type="text" class="form-control" name="firstname" placeholder="" required>
      </div>
      <div class="col-md-6">
        <label for="lastname" class="form-label">Lastname:</label>
        <input type="text" class="form-control" name="lastname" placeholder="" required>
      </div>
    </div>
    <div class="row g-3 mb-3">
      <div class="col-md-6">
        <label for="old-password" class="form-label">Old Password:</label>
        <input type="password" class="form-control" name="old-password" placeholder="" required>
      </div>
      <div class="col-md-6">
        <label for="new-password" class="form-label">New Password:</label>
        <input type="password" class="form-control" name="new-password" placeholder="">
      </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mt-3">
      <button type="submit" class="btn-update" name="profile_edit">Confirm Update</button>
      <button 
        type="button" 
        class="btn-back" 
        onclick="location.href='logout.php';">
        Log Out
      </button>
    </div>
  </form>
</div>
<?php
  if (isset($_POST['profile_edit'])) {
    $user = isset($_POST['username']) ? mysqli_real_escape_string($con, $_POST['username']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($con, $_POST['email']) : '';
    $firstname = isset($_POST['firstname']) ? mysqli_real_escape_string($con, $_POST['firstname']) : '';
    $lastname = isset($_POST['lastname']) ? mysqli_real_escape_string($con, $_POST['lastname']) : '';
    $old_password = isset($_POST['old-password']) ? mysqli_real_escape_string($con, $_POST['old-password']) : '';
    $new_password = isset($_POST['new-password']) ? mysqli_real_escape_string($con, $_POST['new-password']) : '';

    $sql = mysqli_query($con, "SELECT * FROM account_details WHERE Username = '$user'");
    if (mysqli_num_rows($sql) == 0) {
        echo '<script type="text/javascript">
                alert("Username does not exist!");
              </script>';
    } else {
        $rec = mysqli_fetch_assoc($sql);
        if ($old_password != $rec['Password']) {
            echo '<script type="text/javascript">
                    alert("Old Password is incorrect!");
                  </script>';
        } else {
            $update = mysqli_query($con, "UPDATE account_details SET Email = '$email', Fname = '$firstname', Lname='$lastname', Password='$new_password' WHERE Username='$user'");
            if ($update) { ?>
                <script type="text/javascript">
                    alert("Updated Successfully!");
                </script>
            <?php
            } else { ?>
                <script type="text/javascript">
                    alert("Failed to update, Try again!");
                </script>
            <?php
            }
        }
    }
}
?>

<?php include 'Modules/footer.php'; ?>
