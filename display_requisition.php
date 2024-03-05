<?php
include("template/session_start.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Requisitions</title>
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




        <form action="add_requisition.php" method="get">

            <div class="glass_card data_table table-responsive">
                <hr>
                <h3 class="text-center">User Requisitions</h3>
                <hr>
                <table class="table table-striped table-hover table-bordered" id="example">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Username</th>
                            <th scope="col">Department</th>
                            <th scope="col">Asset Type</th>
                            <!-- <th scope="col">Printer Model</th> -->
                            <!-- <th scope="col">Printer Serial Number</th> -->
                            <th scope="col">Issue Date</th>
                            <th scope="col">Requisition Form</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $Proc_no = $_GET['proc_no'];
                        $query = "SELECT * FROM `requisition` where `procurement_no` = $Proc_no";

                        $result = mysqli_query($con, $query);

                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;

                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <th scope="row"> <?php echo $i; ?></th>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['department']; ?></td>
                                    <td><?php echo $row['cartridge_model']; ?></td>
                                    <!-- <td><?php echo $row['printer_model']; ?></td> -->
                                    <!-- <td><?php echo $row['printer_serial']; ?></td> -->
                                    <td><?php echo $row['issue_date']; ?></td>
                                    <?php
                                    echo '<td><a target="_blank" href="Requisitions/' . $row['requisition_form'] . '" > <img src="img/file-solid.svg" alt="file">  </a></td>';
                                    ?>
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
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>