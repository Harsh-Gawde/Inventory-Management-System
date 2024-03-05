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

    // if (isset($_POST['Proc_no_submit'])) {
    //     $Proc_no = $_POST['Proc_no'];
    // }


    ?>
    <div class="container d-flex justify-content-center">
        <div class="add_items">
            <form action="add_items2.php" method="post">
                <label for="inputProcNo" class="form-label h3">Add Items</label>
                <hr>
                <div class="input-group mb-3">
                    <span class="input-group-text " id="basic-addon1">Select Procurement number</span>
                    <select class="form-select" aria-label="Default select example" name="Proc_no" required>
                        <option></option>
                        <?php
                        $query = "SELECT * FROM `display_contract` where status =0";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <option value="<?php echo $row['Procurement_No']; ?>"><?php echo $row['Procurement_No']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-4" name="Proc_no_submit">Proceed</button>
                



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