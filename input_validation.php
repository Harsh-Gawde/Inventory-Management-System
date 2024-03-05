<?php
//check.php 
include "template/config.php";


if (isset($_POST["email"])) {
    $email =  $_POST["email"];
    $query = "SELECT email FROM register WHERE email = '" . $email . "'";
    $result = mysqli_query($con, $query);
    echo mysqli_num_rows($result);
}


?>