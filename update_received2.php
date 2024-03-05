<?php
include("template/session_start.php");
include("template/config.php");


if (isset($_POST['submit'])) {
    $proc_no = $_POST['proc_no'];
    $invoice_no = $_POST['invoice_no'];
    $invoice_date = $_POST['invoice_date'];
    $model = $_POST['model'];

    $unit_price = $_POST['unit_price'];

    $qt1 = $_POST['qty'];
    $amount = $_POST['amount'];
    $t_amount = $_POST['t_amount'];
    $remarks = $_POST['remarks'];
    $payment = $_POST['payment'];


    foreach ($model as $key => $value) {

        $s = "select cartridge_model from cartridge_model where pid = $model[$key] ";
        $res = mysqli_query($con, $s);
        $r = mysqli_fetch_assoc($res);
        $mod = $r['cartridge_model'];
        $model1 = $mod;

        $qty2 = (int)$qt1[$key];

        $u_price = (int)$unit_price[$key];
        $amt = (int)$amount[$key];


        $sql1 = "SELECT * FROM `cartridge_model` where cartridge_model = '" . $model1 . "'";
        $res1 = mysqli_query($con, $sql1);

        while ($row = mysqli_fetch_assoc($res1)) {

            $qty = (int)$row['received_qty'];
            $remained_qty1 = (int)$row['remained_qty'];
            $received_qty = $qty + $qty2;
            $remained_qty =  $remained_qty1 - $qty2;

            $current_stock = (int)$row['current_stock'] + $qty2;
        }
        if ($remained_qty1 < $qty2) {
            echo "<script>alert('Only $remained_qty1 $model1 are remaining, please enter correct number');</script>";
            echo '<script>';
            echo 'window.location.href = "update_received.php?proc_no=' . $proc_no . '"';
            echo '</script>';
        } elseif ($remained_qty1 >= $qty2) {

            $sql = "INSERT INTO `invoice` (`procurement_no`, `invoice_no`, `invoice_date`, `model`, `unit_price`, `qty`, `amount`, `t_amount`, `remarks`, `payment`) VALUES('" . $proc_no . "', '" . $invoice_no . "', '" . $invoice_date . "', '" . $model1 . "', '" . $u_price . "','" . $qty2 . "', '" . $amt . "', '" . $t_amount . "', '" . $remarks . "', '" . $payment . "')";
            $query = mysqli_query($con, $sql);
            $sql2 = "Update `cartridge_model` set received_qty = '" . $received_qty . "', remained_qty ='" . $remained_qty . "', current_stock = '" . $current_stock . "' where cartridge_model= '" . $model1 . "'";
            $res2 = mysqli_query($con, $sql2);
            if ($query && $res2) {
                echo '<script type="text/javascript">';
                echo 'alert("Invoice Inserted Successfully");';
                echo 'window.location.href = "display_received.php?proc_no=' . $proc_no . '"';

                echo '</script>';
            }
        }
    }
}
