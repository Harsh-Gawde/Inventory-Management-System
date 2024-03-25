<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- css links -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/multileveldropdown.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="cart_nav">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="home.php"><img src="img/house-solid.svg" alt="home">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="img/file-signature-solid.svg" alt="contract">Contract</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="add_contract.php">New Contract</a></li>
          <li><a class="dropdown-item" href="display_contract.php">Procured Contracts</a></li>

        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="img/boxes-stacked-solid.svg" alt="items">Items</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="add_items1.php">Add New Item</a></li>
          <li><a class="dropdown-item" href="display_items.php">Asset Stock</a></li>

        </ul>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="img/cart-arrow-down-solid.svg" alt="received">Received Inventory</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Add New Invoice</a>
          <ul class="submenu dropdown-menu">
              <?php
              include("template/config.php");
              $sql = " Select * from `display_contract`";
              $query = mysqli_query($con, $sql);
              while ($row = mysqli_fetch_assoc($query)) {
              ?>
                <li><a class="dropdown-item" href="update_received.php?proc_no=<?php echo $row['Procurement_No']; ?>"><?php echo $row['Comp_Name']; ?></a></li>
              <?php
              }
              ?>
            </ul>
          </li>
          <li><a class="dropdown-item dropdown">Display Invoices</a>
            <ul class="submenu dropdown-menu">
              <?php
              include("template/config.php");
              $sql = " Select * from `display_contract`";
              $query = mysqli_query($con, $sql);
              while ($row = mysqli_fetch_assoc($query)) {
              ?>
                <li><a class="dropdown-item" href="display_received.php?proc_no=<?php echo $row['Procurement_No']; ?>"><?php echo $row['Comp_Name']; ?></a></li>
              <?php
              }
              ?>
            </ul>
          </li>

        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="img/user-solid.svg" alt="requisition">Requisition</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="add_requisition.php">New Requisition</a></li>
          <li><a class="dropdown-item dropdown">User Requisitions</a>
            <ul class="submenu dropdown-menu">
              <?php
              include("template/config.php");
              $sql = " Select * from `display_contract`";
              $query = mysqli_query($con, $sql);
              while ($row = mysqli_fetch_assoc($query)) {
              ?>
                <li><a class="dropdown-item" href="display_requisition.php?proc_no=<?php echo $row['Procurement_No']; ?>"><?php echo $row['Comp_Name']; ?></a></li>
              <?php
              }
              ?>
            </ul>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="payment.php"><img src="img/credit-card-solid.svg" alt="payment">Payment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="logout.php"><img src="img/right-from-bracket-solid.svg" alt="logout">Logout</a>
      </li>
    </ul>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
"></script>
  <!-- javascript links -->
  <script src="https://kit.fontawesome.com/e05de82272.js" crossorigin="anonymous"></script>
  <script src="js/multileveldropdown.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.js"></script>

</body>

</html>