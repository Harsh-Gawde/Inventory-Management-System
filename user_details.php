<?php
include('template/config.php');
// Get the user id  
$username = $_REQUEST['username'];

// Database connection 


if ($username !== "") {

       
    $sql = "select * from printer_db where username= '$username'";

    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);

     
    $department = $row["department"];

    
    // $printer_model = $row["printer_model"];
    // $printer_serial = $row["printer_serial"];
}

// Store it in a array 
$result = array("$department");

// Send in JSON encoded form 
$myJSON = json_encode($result);
echo $myJSON;
?>