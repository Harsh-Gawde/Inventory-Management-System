<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procured Contracts</title>
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
    include("template/config.php"); ?>

    <div class="container">
        <div class="data_table table-responsive glass_card">
        <hr>
        <h3 class="text-center">Procured Contracts</h3>
        <hr>
            <table id="example" class="table table-bordered table-striped table-hover">
                <thead>
                    <th scope="col">Procurement No.</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Procurement Date</th>
                    <th scope="col">Contract End Date</th>
                    <th scope="col">Items Qty</th>
                    <th scope="col">Work Order</th>
                    <th>Added By</th>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `display_contract`;";

                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <th scope="row"> <?php echo $row['Procurement_No']; ?></th>
                                <td data-title="Released"><?php echo $row['Comp_Name']; ?></td>
                                <td data-title="Studio"><?php echo $row['Procurement_Date']; ?></td>
                                <td data-title="Worldwide Gross" data-type="currency"><?php echo $row['Contract_End_Date']; ?></td>
                                <td data-title="Domestic Gross" data-type="currency"><?php echo $row['item_qty']; ?></td>
                                <?php
                                echo '<td data-title="Domestic Gross" data-type="currency"><a target="_blank" href="WorkOrder/' . $row['Workorder'] . '" > <img src="img/file-solid.svg" alt="file">  </a></td>';
                                ?>
                                <td><?php echo $row['added_by']; ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>

            </table>

        </div>
    </div>
    <?php include("template/footer.php"); ?>




    <script src="https://kit.fontawesome.com/e05de82272.js" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
"></script>
<script src="js/bootstrap.js"></script>

    <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>