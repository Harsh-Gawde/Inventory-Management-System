<!-- <?php
//check.php 
include "template/config.php";
if (isset($_POST["qty"])) {
    $qty = $_POST['qty'];
    
    $query = "SELECT remained_qty FROM cartridge_model WHERE remained_qty = '" . $qty . "' ";
    $result = mysqli_query($con, $query);
    echo mysqli_num_rows($result);

}
?> -->