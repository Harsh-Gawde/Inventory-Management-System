<?php
include("template/session_start.php");
include("template/config.php");
if (isset($_POST['iteminsert'])) {
    $procurement_no = $_GET['Proc_no'];
    $cartridge_model = $_POST['Cartridge_Model'];
    $cartridge_quantity = $_POST['Cartridge_Quantity'];
    $unit_price = $_POST['Unit_Price'];
    $timestamp =  date('Y-m-d H:m:s');
    $add_by = $_SESSION['name'];
    $remained_qty = $_POST['Cartridge_Quantity'];
  

    foreach ($cartridge_model as $key => $value) {
        $sql = "INSERT INTO `cartridge_model` (`procurement_no`, `cartridge_model`, `cartridge_quantity`, `unit_price`, `current_timestamp`, `remained_qty`,`added_by`) VALUES ('" . $procurement_no . "', '" . $cartridge_model[$key] . "', '" . $cartridge_quantity[$key] . "', '" . $unit_price[$key] . "', '" . $timestamp . "', '" . $remained_qty[$key] . "','" . $add_by . "')";
        $query = mysqli_query($con, $sql);
        $sql1 = "UPDATE `display_contract` SET `status`= 1 WHERE `Procurement_No` = $procurement_no";
        $query1 =  mysqli_query($con, $sql1);
        if ($query && $query1) {
            echo '<script type="text/javascript">';
            echo 'alert("Item Inserted Successfully");';
            echo 'window.location.href = "display_items.php"';
            echo '</script>';
        }
    }
}
