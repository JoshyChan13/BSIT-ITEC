<?php include 'Modules/header.php'; ?>

    <div class="form-container">
      <h3 class="text-success">Update Profile</h3>
      <form>
        <div class="row g-3 mb-3">
          <div class="col-md-6">
             <label for="username" class="form-label">Username:</label>
          <input type="text" class="form-control" id="username" placeholder="" required>
          </div>
          <div class="col-md-6">
            <label for="old-password" class="form-label">Old Password:</label>
            <input type="password" class="form-control" id="" placeholder="">
          </div>
        </div>
        <div class="row g-3 mb-3">
          <div class="col-md-6">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="" required>
          </div>
          <div class="col-md-6">
            <label for="new-password" class="form-label">New Password:</label>
            <input type="password" class="form-control" id="new-password" placeholder="">
          </div>
        </div>
        <div class="row g-3 mb-3">
          <div class="col-md-6 text">
            <label for="confirm-password" class="form-label">Confirm Password:</label>
            <input type="password" class="form-control" id="confirm-password" placeholder="">
          </div>
        </div>
        <div class="d-flex justify-content-between" style="margin-top: 13px;">
          <button type="submit" class="btn btn-update">Account Information</button>
          <button type="button bg" class="btn btn-back">Log Out</button>
        </div>
      </form>
    </div>
    <?php include 'Modules/footer.php'; ?>