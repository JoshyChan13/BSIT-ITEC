<?php 
    $con = mysqli_connect('localhost', 'root', '', 'fastfood');
    if(!$con){
        die("Cannot Connect!");
    }
    mysqli_select_db($con, "fastfood") or die("Cannot Connect!");

?>