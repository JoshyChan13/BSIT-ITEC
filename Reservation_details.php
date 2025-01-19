<?php
    include ("Modules/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script text="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Reservation Details</title>
</head>
<body>
    <div class="container-fluid bg-success text-white">
        <h5><a href="home.php"><img class="p-3" style="width: 5%;" src="img/logo.png"></a>Mang Inasal Philippines Inc.</h5>
    </div>
    <div class = "container p-2 text-center">
        <h4>Reservation Details</h4>
    </div>
    <div class="container p-2">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-dark">Id</th>
                    <th class="text-dark">Name</th>
                    <th class="text-dark">Email</th>
                    <th class="text-dark">Date</th>
                    <th class="text-dark">Time</th>
                    <th class="text-dark">No. of Guests</th>
                    <th class="text-dark">Celebration</th>
                    <th class="text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = mysqli_query($con, "SELECT * FROM reservation_details");
                    while($list = mysqli_fetch_assoc($sql)){
                ?>
                <tr>
                    <th class="table-active"> 2024<?php echo $list['Reservation_Id']?></th>
                    <th><?php echo $list['Name']?> </th>
                    <th><?php echo $list['Email']?> </th>
                    <th><?php echo $list['Date']?> </th>
                    <th><?php echo $list['Time']?> </th>
                    <th><?php echo $list['Num_of_Guests']?> </th>
                    <th><?php echo $list['Celebration']?> </th>
                    <th> <a href="Reservation_update.php"><img src="img/Update.png" width="30" height="30" border="0"> </a>
                        <a href="Reservation_delete.php"><img src="img/Delete.png" width="30" height="30" border="0"> </a> </th>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    
</body>
</html>