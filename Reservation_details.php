<?php
    include ("Modules/connect.php");
    include("Modules/header.php");
?>

    <div class = "container p-2 text-center">
        <h4>Reservation Details</h4>
    </div>
    <div class="container p-2">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-dark table-active" >Id</th>
                    <th class="text-dark">Name</th>
                    <th class="text-dark">Email</th>
                    <th class="text-dark">Date</th>
                    <th class="text-dark">Time</th>
                    <th class="text-dark">No. of Guests</th>
                    <th class="text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = mysqli_query($con, "SELECT * FROM reservation_details");
                    while($list = mysqli_fetch_assoc($sql)){
                ?>
                <tr>
                    <th class="table-active"><?php echo $list['Reservation_id']?></th>
                    <th><?php echo $list['Name']?> </th>
                    <th><?php echo $list['Email']?> </th>
                    <th><?php echo $list['Date']?> </th>
                    <th><?php echo $list['Time']?> </th>
                    <th><?php echo $list['Num_of_Guests']?> </th>
                    <th> <a href="Reservation_update.php?rid=<?php echo $list['Reservation_id']; ?>"><img src="img/Update.png" width="30" height="30" border="0" style="border-radius: 100px;"> </a>
                        <a href="Reservation_delete.php?rid=<?php echo $list['Reservation_id']; ?>"><img src="img/Delete.png" width="30" height="30" border="0" style="border-radius: 100px;"> </a> </th>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    
</body>
</html>