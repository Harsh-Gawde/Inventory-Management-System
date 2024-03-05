<?php
include("template/session_start.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Received</title>
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

    ?>
    <div class="container">
        <form action="update_received.php" method="get" enctype="multipart/form-data">

            <div class="glass_card data_table table-responsive">
                <hr>
                <h3 class="text-center">Invoice Received</h3>
                <hr>
                <table class="table table-striped table-hover table-bordered" id="example">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Invoice No.</th>
                            <th scope="col">Invoice Date</th>
                            <th scope="col">Asset</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Remarks</th>
                            <th scope="col">Payment</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $proc_no = $_GET['proc_no'];
                        $query = "SELECT * FROM `invoice` where `procurement_no` = $proc_no";

                        $result = mysqli_query($con, $query);

                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;

                            foreach ($result as $key => $value) { ?>
                                <tr>
                                    <th scope="row"> <?php echo $i; ?></th>
                                    <td><?php echo $value['invoice_no']; ?></td>
                                    <td><?php echo $value['invoice_date']; ?></td>
                                    <td><?php echo $value['model']; ?></td>
                                    <td><?php echo $value['unit_price']; ?></td>
                                    <td><?php echo $value['qty']; ?></td>
                                    <td><?php echo $value['amount']; ?></td>
                                    <td><?php echo $value['t_amount']; ?></td>
                                    <td><?php echo $value['remarks']; ?></td>
                                    <!-- <?php
                                            // echo '<td><a target="_blank" href="Invoice/' . $row['invoice_doc'] . '" > <img src="img/file-solid.svg" alt="file">  </a></td>';
                                            ?> -->
                                    <td><?php echo $value['payment']; ?></td>

                                </tr>
                        <?php
                                $i++;
                            }
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </form>

    </div>


    <?php include("template/footer.php"); ?>


    <!-- javascript links -->
    <script src="https://kit.fontawesome.com/e05de82272.js" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
"></script>
    <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

    <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>