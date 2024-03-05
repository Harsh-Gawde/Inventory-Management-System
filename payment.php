<?php
include("template/session_start.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="icon" type="image/x-icon" href="./img/favicon.jpg">
    <!-- css links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
">
    <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php
    include("template/header.php");
    include("template/navigation.php");
    include("template/config.php");

    if (isset($_POST['trans_insert'])) {
        $Proc_no = $_POST['Proc_no'];
        $transaction_no = $_POST['transaction_no'];
        $invoice_no = $_POST['invoice_no'];
        $payment_date = $_POST['payment_date'];

        $sql = "update `invoice` set payment= 'Paid on $payment_date against $transaction_no'  where `invoice_no` = '$invoice_no'";

        $res = mysqli_query($con, $sql);
        if ($res) {
            echo '<script type="text/javascript">';
            echo 'alert("Payment updated Successfully");';
            echo '</script>';
            echo '<script>';
            echo 'window.location.href = "display_received.php?proc_no='.$Proc_no.'"';
            echo '</script>';
        }
    }


    ?>

    <div class="container d-flex justify-content-center">
        <div class="glass_card payment">
            <form action="payment.php" method="post">
                <h3>Payment</h3>
                <hr>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Enter Invoice number</span>
                    <select class="form-select" onchange="invoice_det()" onclick="GetDetail(this.value)" id="invoice_no" aria-label="Default select example" name="invoice_no" required>
                        <option value=""></option>
                        <?php
                        $sql = "select distinct invoice_no from invoice";
                        $res = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <option value="<?php echo $row['invoice_no']; ?>"><?php echo $row['invoice_no']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div id="invoice_det" class="invoice_det">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Invoice Date</span>
                        <input class="form-control" id="invoice_date" aria-label="Default select example" name="invoice_date" value="" readonly required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Procurement No.</span>
                        <input class="form-control" id="Proc_no" aria-label="Default select example" name="Proc_no" value="" readonly required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Total Amount</span>
                        <input class="form-control" id="t_amount" aria-label="Default select example" name="t_amount" value="" readonly required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Payment Date</span>
                        <input type="date" class="form-control" aria-describedby="basic-addon1" name="payment_date" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Enter transaction / payment number</span>
                        <input type="text" class="form-control" aria-describedby="basic-addon1" name="transaction_no" required>
                    </div>
                </div>
                <button type="submit" name="trans_insert" class="btn btn-primary">Proceed</button>
            </form>
        </div>
    </div>


    <?php include("template/footer.php"); ?>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- javascript links -->
    <script>
        document.getElementById("invoice_det").style.display = "none";

        function invoice_det() {
            document.getElementById("invoice_det").style.display = "block";
        }
    </script>

    <script>
        // onkeyup event will occur when the user  
        // release the key and calls the function 
        // assigned to this event 
        function GetDetail(str) {
            if (str.length == 0) {
                document.getElementById("invoice_date").value = "";

                document.getElementById("t_amount").value = "";
                document.getElementById("Proc_no").value = "";
                return;
            } else {

                // Creates a new XMLHttpRequest object 
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {

                    // Defines a function to be called when 
                    // the readyState property changes 
                    if (this.readyState == 4 &&
                        this.status == 200) {

                        // Typical action to be performed 
                        // when the document is ready 
                        var myObj = JSON.parse(this.responseText);

                        // Returns the response data as a 
                        // string and store this array in 
                        // a variable assign the value  
                        // received to first name input field 

                        document.getElementById("invoice_date").value = myObj[0];

                        // Assign the value received to 
                        // last name input field 

                        document.getElementById("t_amount").value = myObj[1];
                        document.getElementById("Proc_no").value = myObj[2];
                    }
                };

                // xhttp.open("GET", "filename", true); 
                xmlhttp.open("GET", "payment_details.php?invoice_no=" + str, true);

                // Sends the request to the server 
                xmlhttp.send();
            }
        }
    </script>


    <script src="https://kit.fontawesome.com/e05de82272.js" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
"></script>

    <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>