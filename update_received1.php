<?php
include("template/session_start.php");
include("template/config.php");
// echo '<pre>';
// print_r($_POST);

if (isset($_POST['submit'])) {
    $proc_no = $_POST['proc_no'];
    $invoice_no = $_POST['invoice_no'];
    $invoice_date = $_POST['invoice_date'];
    $model = $_POST['model'];
    $unit_price = $_POST['unit_price'];
    // $qty = $_POST['qty'];
    $qt1 = $_POST['qty'];
    $amount = $_POST['amount'];
    $t_amount = $_POST['t_amount'];
    $remarks = $_POST['remarks'];
    $payment = $_POST['payment'];



    if (isset($_FILES['pdf_file']['name'])) {
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];
        // echo $file_name;
        move_uploaded_file($file_tmp, "./Invoice/" . $file_name);
        foreach ($model as $key => $value) {

            $model1 = $model[$key];
            // echo $model1 . "<br>";
            $qty2 = (int)$qt1[$key];
            // echo $qty2 . "<br>";

            $sql1 = "SELECT * FROM `cartridge_model` where cartridge_model = '" . $model[$key] . "'";
            $res1 = mysqli_query($con, $sql1);

            while ($row = mysqli_fetch_assoc($res1)) {
                // echo $row;
                $qty = (int)$row['received_qty'];
                $remained_qty1 = (int)$row['remained_qty'];
                $received_qty = $qty + $qty2;
                $remained_qty =  $remained_qty1 - $qty2;
                echo $remained_qty . "<br>";
                $current_stock = (int)$row['current_stock'] + $qty2;

                if ($remained_qty1 >= $qty2) {
                    foreach ($model as $key => $value) {
                        $sql = "INSERT INTO `invoice` (`procurement_no`, `invoice_no`, `invoice_date`, `model`, `unit_price`, `qty`, `amount`, `t_amount`, `remarks`, `payment`) VALUES('" . $proc_no . "', '" . $invoice_no . "', '" . $invoice_date . "', '" . $key[$model] . "', '" . $key[$unit_price] . "','" . $key[$qt1] . "', '" . $key[$amount] . "', '" . $t_amount . "', '" . $remarks . "', '" . $payment . "')";
                        $query = mysqli_query($con, $sql);
                        $sql2 = "Update `cartridge_model` set received_qty = '" . $received_qty . "', remained_qty ='" . $remained_qty . "', current_stock = '" . $current_stock . "' where cartridge_model= '" . $model1 . "'";
                        $res2 = mysqli_query($con, $sql2);
                    }

                    if ($query && $res1 && $res2) {
                        echo '<script type="text/javascript">';
                        echo 'alert("Invoice Inserted Successfully");';
                        echo 'window.location.href = "display_received.php?proc_no=' . $proc_no . '"';

                        echo '</script>';
                    }
                } else {
                    echo "<script>alert('Only $remained_qty1 cartridges are remaining in $model1, please enter correct number');</script>";
                    echo '<script>';
                    echo 'window.location.href = "update_received.php?proc_no=' . $proc_no . '"';
                    echo '</script>';
                }
            }
        }
    }
} else {

?>
    <div class="alert alert-danger alert-dismissible	fade show text-center">
        <a class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Failed!</strong>
        File must be uploaded in PDF format!
    </div>
<?php
}




?>