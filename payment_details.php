<?php
include('template/config.php');

// Get the user id  
$invoice_no = $_REQUEST['invoice_no'];

// Database connection 


if ($invoice_no !== "") {

       
    $sql = "select * from invoice where invoice_no = '$invoice_no'";

    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);

     
    $invoice_date = $row["invoice_date"];

    $t_amount = $row["t_amount"];
    $Proc_no = $row["procurement_no"];
}

// Store it in a array 
$result = array("$invoice_date", "$t_amount","$Proc_no");

// Send in JSON encoded form 
$myJSON = json_encode($result);
echo $myJSON;
?>