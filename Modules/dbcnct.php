<?php 
    $con = mysqli_connect("localhost", "root", "");
    if(!$con){
        die("Cannot Connect!" . mysqli_error());
    }
    mysqli_select_db($con, "fastfood") or die("Cannot Connect!");

?>