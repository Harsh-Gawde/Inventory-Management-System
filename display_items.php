<?php
include("template/session_start.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Stock</title>
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

        <form action="add_items2.php" method="get">

            <div class="glass_card data_table table-responsive">
                <hr>
                <h3 class="text-center">Asset Stock</h3>
                <hr>
                <table class="table table-striped table-hover table-bordered" id="example">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Asset Type</th>
                            <th scope="col">Asset Quantity </th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Current Stock</th>
                            <th scope="col">Received Quantity</th>
                            <th scope="col">Remained Quantity</th>
                            <th scope="col">Added By</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM `cartridge_model`;";

                        $result = mysqli_query($con, $query);

                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <th scope="row"> <?php echo $i; ?></th>
                                    <td><?php
                                        $cp = $row['procurement_no'];
                                        $com = "select Comp_Name from display_contract where Procurement_No = $cp";
                                        $res = mysqli_query($con, $com);
                                        $r = mysqli_fetch_assoc($res);
                                        echo  $r['Comp_Name']; ?></td>
                                    <td><?php echo $row['cartridge_model']; ?></td>
                                    <td><?php echo $row['cartridge_quantity']; ?></td>
                                    <td><?php echo $row['unit_price']; ?></td>
                                    <td><?php echo $row['current_stock']; ?></td>
                                    <td><?php echo $row['received_qty']; ?></td>
                                    <td><?php echo $row['remained_qty']; ?></td>
                                    <td><?php echo $row['added_by']; ?></td>
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