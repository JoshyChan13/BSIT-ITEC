<?php
    include ("Modules/connect.php");
    $r_id = $_GET['rid'];
    mysqli_query($con, "DELETE FROM reservation_details WHERE Reservation_Id = '$r_id'")
?>

<script type="text/javascript">
    alert("Your reservation has been deleted!");
    window.location = "Reservation_details.php";
</script>