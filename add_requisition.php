<?php
include("template/session_start.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Requisition</title>
    <link rel="icon" type="image/x-icon" href="./img/favicon.jpg">
    <!-- css links -->
    <link rel="stylesheet" href="dist/jquery-editable-select.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">




</head>

<body>
    <?php
    include("template/header.php");
    include("template/config.php");


    if (isset($_POST['submit'])) {
        $Proc_no = $_POST['Proc_no'];
        $username = $_POST['username'];
        $department = $_POST['department'];
        $cartridge_model = $_POST['cartridge_model'];
        // $printer_model = $_POST['printer_model'];
        // $printer_serial = $_POST['printer_serial'];
        $issue_date = $_POST['issue_date'];
        // $requisition_form = $_POST['requisition_form'];


        // $timestamp =  date('Y-m-d H:i:s');


        if (isset($_FILES['pdf_file']['name'])) {
            $file_name = $_FILES['pdf_file']['name'];
            $file_tmp = $_FILES['pdf_file']['tmp_name'];
            // echo $file_name;
            move_uploaded_file($file_tmp, "./Requisitions/" . $file_name);

            foreach ($cartridge_model as $key => $value) {
                $sql = "select current_stock from cartridge_model where cartridge_model = '" . $cartridge_model[$key] . "'";
                $res = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_assoc($res)) {

                    $current_stock = (int)$row['current_stock'];

                    if ($current_stock > 0) {
                        $current_stock = (int)$row['current_stock'] - 1;

                        $update = "Update `cartridge_model` set current_stock = '" . $current_stock . "' where cartridge_model= '" . $cartridge_model[$key] . "'";

                        $update1 = mysqli_query($con, $update);

                        $insertquery = "INSERT INTO requisition (`procurement_no`, `username`, `department`, `cartridge_model`, `issue_date`, `requisition_form`) VALUES('" . $Proc_no . "','" . $username . "','" . $department . "','" . $cartridge_model[$key] . "','" . $issue_date . "','" . $file_name . "')";
                        $iquery = mysqli_query($con, $insertquery);
                        if ($iquery && $update1) {
                            echo '<script>';
                            echo 'alert("Requisition Successful");';
                            echo 'window.location.href = "display_requisition.php?proc_no=' . $Proc_no . '"';
                            echo '</script>';
                        }
                        
                    } else {
                        $cm = $cartridge_model[$key];
                        echo '<script>';
                        echo 'alert("No '.$cm.' in stock");';
                        echo '</script>';
                        echo '<script>';
                        echo 'window.location.href = "add_requisition.php"';
                        echo '</script>';
                    }
                }
            
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
    include("template/navigation.php");

    ?>
    <form action="add_requisition.php" method="post" enctype="multipart/form-data">
        <div class="add_requisition_main">

            <div class="add_requisition_body">
                <h3 class="d-flex">Add Requisition</h3>
                <hr>
                <div class="input-group mb-3">
                    <span class="input-group-text " id="basic-addon1">Select Company</span>
                    <select class="form-select" id="proc_no" aria-label="Default select example" name="Proc_no" required>
                        <option value=''></option>
                        <?php
                        $query = "SELECT * FROM `display_contract` ";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <option value="<?php echo $row['Procurement_No']; ?>"><?php echo $row['Procurement_No'] . ' ' . $row['Comp_Name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Username</span>
                    <select class="form-select username" id="username" aria-label="Default select example" name="username" onblur="GetDetail(this.value)" required>
                        <option value=""></option>
                        <?php
                        $sql = "select username from printer_db";
                        $res = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <option value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Department</span>
                    <input class="form-control department" id="department" aria-label="Default select example" name="department" value="" readonly required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Asset Type</span>
                    <select class="form-select js-example-basic-multiple" id="cartridge_model" aria-label="Default select example" multiple="multiple" name="cartridge_model[]" required>
                        <option value=""></option>
                    </select>
                </div>
                <!-- <div class="input-group mb-3 d-none">
                    <span class="input-group-text" id="basic-addon1">Printer Model</span>
                    <input class="form-control" aria-label="Default select example" id="printer_model" name="printer_model" value="" readonly required>

                </div>
                <div class="input-group mb-3 d-none">
                    <span class="input-group-text" id="basic-addon1">Printer Serial no.</span>
                    <input class="form-control" aria-label="Default select example" id="printer_serial" name="printer_serial" value="" readonly required>
                </div> -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Issue Date</span>
                    <input type="date" class="form-control" aria-describedby="basic-addon1" name="issue_date" required>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" accept=".pdf" name="pdf_file" title="Upload PDF" required>
                </div>
                <div class="col-12 mt-4 btncenter">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
            </div>

        </div>

    </form>

    <?php include("template/footer.php"); 
      ?>


    <!-- javascript links -->


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script>
        // onkeyup event will occur when the user  
        // release the key and calls the function 
        // assigned to this event 
        function GetDetail(str) {
            if (str.length == 0) {
                document.getElementById("department").value = "";
                // document.getElementById("printer_model").value = "";
                // document.getElementById("printer_serial").value = "";
                return;
            } else {

                // Creates a new XMLHttpRequest object 
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {

                    // Defines a function to be called when 
                    // the readyState property changes 
                    if (this.readyState == 4 &&
                        this.status == 200) {

                        // Typical action to be performed 
                        // when the document is ready 
                        var myObj = JSON.parse(this.responseText);

                        // Returns the response data as a 
                        // string and store this array in 
                        // a variable assign the value  
                        // received to first name input field 

                        document.getElementById("department").value = myObj[0];

                        // Assign the value received to 
                        // last name input field 
                        // document.getElementById("printer_model").value = myObj[1];
                        // document.getElementById("printer_serial").value = myObj[2];
                    }
                };

                // xhttp.open("GET", "filename", true); 
                xmlhttp.open("GET", "user_details.php?username=" + str, true);

                // Sends the request to the server 
                xmlhttp.send();
            }
        }
    </script>

    <script src="dist/jquery-editable-select.js"></script>

    <script>
        $(document).ready(function() {
            $("#proc_no").change(function() {
                var cid = $(this).val();
                $.ajax({
                    url: 'model_dropdown.php',
                    type: 'post',
                    data: {
                        proc_no: cid
                    },
                    success: function(res) {
                        $("#cartridge_model").html(res);
                    }
                });
            });
        });
    </script>

    <script>
        window.onload = function() {
            $('#username').editableSelect();

        }
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
"></script>
    <script src="https://kit.fontawesome.com/e05de82272.js" crossorigin="anonymous"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>


</body>

</html>