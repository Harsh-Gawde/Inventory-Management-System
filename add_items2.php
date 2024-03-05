<?php
include("template/session_start.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <title>Add Items</title>
    <link rel="icon" type="image/x-icon" href="./img/favicon.jpg">
    <!-- css links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php
    include("template/header.php");
    include("template/navigation.php");
    include("template/config.php");

    if (isset($_POST['Proc_no_submit'])) {
        $Proc_no = $_POST['Proc_no'];

        $sql = "select * from display_contract where Procurement_No=$Proc_no ";

        $res = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
            $No_list = $row['item_qty'];
        }
    }

  ?>
    <div class="container">
        <div class="glass_card">
            <form action="add_items3.php?Proc_no=<?php echo $Proc_no; ?>" method="post">
                <label for="inputProcNo" class="form-label">Procurement No.</label>
                <input type="number" id="inputProcNo" name="Proc_no" value="<?php echo $Proc_no; ?>" class="form-control" disabled>
                <hr>
                <div class="table-responsive">
                    <table class=" table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Asset Type</th>
                                <th>Asset Quantity</th>
                                <th>Unit Price</th>
                            </tr>

                        </thead>
                        <?php
                        $i = 1;
                        while ($i <= $No_list) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><input class="form-control border-dark" type="text" name="Cartridge_Model[]" required></td>
                                    <td><input class="form-control border-dark" type="number" name="Cartridge_Quantity[]" required></td>
                                    <td><input class="form-control border-dark" type="number" name="Unit_Price[]" required></td>
                                </tr>
                            </tbody>
                        <?php
                            $i++;
                        }

                        ?>
                    </table>
                </div>
                <button type="submit" name="iteminsert" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>




    <?php include("template/footer.php"); ?>



    <!-- javascript links -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
"></script>
    <script src="https://kit.fontawesome.com/e05de82272.js" crossorigin="anonymous"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>


</body>


</html>