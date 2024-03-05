<?php
include("template/session_start.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
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
    ?>
    <!-- <div class="cms_instruct text-primary">
        <marquee behavior="scroll" direction="right" scrollamount="8">
        <a href="img/CMS manual.pdf" target="_blank"> <img src="img/circle-info-solid.svg" alt=""> Manual for CMS</a>
        </marquee>
    </div> -->
    <div class="cart_main">
        <div class="card">
            <img src="img/contract.jpg" class="card-img-top" alt="cart_img">
            <div class="card-body">
                <h5 class="card-title">Procurement</h5>
                <p class="card-text">Contract is made according to the user requirement</p>
                <a href="display_contract.php" class="btn btn-primary">Show recent contracts</a>
            </div>
        </div>
        <div class="card">
            <img src="img/inventory.jpg" class="card-img-top" alt="cart_img">
            <div class="card-body">
                <h5 class="card-title">Inventory</h5>
                <p class="card-text">Assets are managed in order as per their company and type</p>
                <a href="display_items.php" class="btn btn-primary">Asset Stock</a>
            </div>
        </div>
        <div class="card">
            <img src="img/requisition.jpg" class="card-img-top" alt="cart_img">
            <div class="card-body">
                <h5 class="card-title">Requisition</h5>
                <p class="card-text">User requests an asset by filling a requisition form</p>
                <a href="add_requisition.php" class="btn btn-primary">Add new requisitions</a>
            </div>
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