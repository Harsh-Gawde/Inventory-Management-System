<?php
    include("template/session_start.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contract</title>
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



    ?>
    <?php
    // include('template/config.php');
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $Procurement_No = $_POST['Procurement_No'];
        $Company_Name = $_POST['name'];
        $Procurement_Date = $_POST['Procurement_Date'];
        $Contract_End_Date = $_POST['Contract_End_Date'];
        $Items_Qty = $_POST['Items_Qty'];
        $added_by = $_SESSION['name'];
        // echo $added_by;
        $timestamp =  date('Y-m-d H:i:s');

     

        if (isset($_FILES['pdf_file']['name'])) {
            $file_name = $_FILES['pdf_file']['name'];
            $file_tmp = $_FILES['pdf_file']['tmp_name'];
            // echo $file_name;
            move_uploaded_file($file_tmp, "./WorkOrder/" . $file_name);

            $insertquery =
                "INSERT INTO display_contract(Procurement_No, Comp_Name, Procurement_Date, Contract_End_Date, item_qty, Workorder, added_by) VALUES('$Procurement_No','$Company_Name','$Procurement_Date','$Contract_End_Date','$Items_Qty','$file_name','$added_by')";
            
            $iquery = mysqli_query($con, $insertquery);
            if ($iquery) {
                echo '<script type="text/javascript">';
                echo 'alert("Contract Inserted Successfully");';
                echo 'window.location.href = "display_contract.php"';
                echo '</script>';
            }
        } else {
    ?>
            <div class="alert alert-danger alert-dismissible 
			fade show text-center">
                <a class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>Failed!</strong>
                File must be uploaded in PDF format!
            </div>
    <?php
        }
    }
    ?>
    <form method="post" enctype="multipart/form-data">
        <div class="add_contract_main">

            <div class="add_contract_body">
                <h3 class="d-flex">Add New Contract</h3>
                <hr>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Procurement No.</span>
                    <input type="number" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" name="Procurement_No" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Company Name</span>
                    <input type="text" class="form-control"  aria-label="Company_Name" aria-describedby="basic-addon1" name="name" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Procurement Date</span>
                    <input type="date" class="form-control"  aria-label="Procurment_Date" aria-describedby="basic-addon1" name="Procurement_Date" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Contract End Date</span>
                    <input type="date" class="form-control"  aria-label="Contract_End_Date" aria-describedby="basic-addon1" name="Contract_End_Date" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Items Qty</span>
                    <input type="number" class="form-control" aria-label="Items Qty" aria-describedby="basic-addon1" name="Items_Qty" required>
                </div>
                <div class="form-group">
                    <input type="file" name="pdf_file" class="form-control" accept=".pdf" title="Upload PDF" required>
                </div>
                <div class="col-12 mt-4 btncenter">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
            </div>

        </div>

    </form>

    <?php
    include("template/footer.php");
    ?>


    <!-- javascript links -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
"></script>
    <script src="https://kit.fontawesome.com/e05de82272.js" crossorigin="anonymous"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

</body>

</html>