<?php
include("template/session_start.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Received Inventory</title>
    <link rel="icon" type="image/x-icon" href="./img/favicon.jpg">
    <!-- css links -->
    <!-- <link rel="stylesheet" media="print" href="invoiceprint.css"> -->


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



    $sql = "select pid,cartridge_model from cartridge_model where procurement_no='" . $_GET['proc_no'] . "'";
    $products = "<option></option>";
    $res = $con->query($sql);
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $products .= "<option value='{$row["pid"]}'>{$row["cartridge_model"]}</option>";
        }
    }


    ?>
    <div class="update_received_main">
        <div class="update_received_body">
            <h3 class="text-center">Invoice Details </h3>
            <hr>
            <form method="post" action="update_received2.php" class="" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group">
                            <!-- <span class="input-group-text">Pro No.</span> -->
                            <input type="text" name="proc_no" class="form-control" value="<?php echo $_GET['proc_no']; ?>" hidden required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Invoice No.</span>
                            <input type="text" name="invoice_no" class="form-control" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Invoice Date</span>
                            <input type="date" name="invoice_date" class="date form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="file" class="form-control" accept=".pdf" name="pdf_file" title="Upload PDF" hidden>
                        </div>

                    </div>
                    <div class="col-6 ">
                        <div class="input-group mb-3 col-2">
                            <span class="input-group-text" id="basic-addon1">Payment Status</span>
                            <input type="text" class="form-control " name="payment" value="Pending" readonly required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Remarks</span>
                            <input type="text" class="form-control " name="remarks" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class='table table-bordered'>
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Asset</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                                <!-- <th>GST (%)</th>
                                <th>Total</th> -->
                                <th>Add</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody id="tbl">
                            <tr>
                                <td class=""><select class='pid form-select' onblur="price_change_model()" id="model" name="model[]" required>
                                        <?php echo $products; ?></select></td>
                                <td><input class='price form-control' type='number' name='unit_price[]' readonly required></td>
                                <td><input class='qty form-control' type='number' id="qty" name='qty[]' required>
                                    <span id="availability"></span>
                                </td>
                                <td><input class='amount form-control' id="amount" type='number' name="amount[]" readonly required></td>
                                <!-- <td><input class='gst form-control' type='number' id="gst" name=''></td>
                                <td><input class='total form-control' type='number' id="total" name='total' value="" readonly></td> -->
                                <td><input type='button' value='+' id='add' class='add btn btn-primary'></td>
                                <td><input type='button' value='-' id='rmv' class='rmv btn' disabled></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="d-flex">
                    <div class="col-8">

                    </div>
                    <div class="input-group mb-3 col">
                        <label for="amount"><span class=" input-group-text btn btn-success" onclick="submit_after_tamount()" title="Click here for Net total">Total Amount</span></label>
                        <input type="number" class="form-control t_amount" id="t_amount" value="" name="t_amount" readonly required>
                    </div>

                </div>
                <hr>
                <div class=" text-center d-contents">
                    <span id="click_tamount" class="text-danger ">*Click on total amount</span>
                    <button type="submit" class="btn btn-primary" id="submit" name="submit" disabled>Submit</button>
                </div>


            </form>

        </div>
    </div>




    <?php
    include("template/footer.php");
    ?>


    <!-- javascript links -->
    <script>

        function submit_after_tamount() {
            document.getElementById("submit").disabled = false;
            document.getElementById("click_tamount").style.display = "none";
        }
    </script>
    <script>
         function price_change_model(){
            document.getElementById("qty").innerHTML= "";
        }
    </script>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(document).on("click", ".amount", function() {
                var sum = 0;
                $(".amount").each(function() {
                    sum += +$(this).val();
                });
                $(".t_amount").val(sum);
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            //Add Row
            $("table").on("click", ".add", function() {
                var products = "<?php echo $products; ?>";
                $("#tbl").append("<tr> <td><select class='pid form-select' onchange='price_change_model()' name='model[]' required>" + products + "</select></td> <td><input class='price form-control' type='number' name='unit_price[]' required readonly></td> <td><input class='qty form-control' type='number' name='qty[]' required><span id='availability'></span></td> <td><input class='amount form-control' type='number' name='amount[]' required readonly></td>  <td><input type='button' value='+' id='add' class='add btn btn-primary' ></td> <td><input type='button' value='-' id='rmv' class='rmv btn btn-danger'></td> </tr>");
                document.getElementById("submit").disabled = true;
                document.getElementById("click_tamount").style.display = "block";
            });

            //adding gst and total
            // <td><input class='gst form-control' type='number' name='' ></td> <td><input class='total form-control' type='number' name='' readonly></td>




            //Remove Row
            $("table").on("click", ".rmv", function() {
                $(this).parents("tr").remove();
                document.getElementById("submit").disabled = true;
                document.getElementById("click_tamount").style.display = "block";
            });

            //Get unit price
            $("table").on("change", ".pid", function() {
                var pid = $(this).val();
    
                var input = $(this).parents("tr").find(".price");
                var qty = $(this).parents("tr").find(".qty");
                $.ajax({
                    url: "rate_dropdown.php",
                    type: "post",
                    data: {
                        pid: pid
                    },
                    success: function(res) {
                        $(input).val(res);
                        $(qty).val("");
                    }
                });
                
            });


            //Find amount
            $("table").on("keyup", ".qty", function() {
                var qty = Number($(this).val());
                var price = Number($(this).parents("tr").find(".price").val());
                $(this).parents("tr").find(".amount").val(qty * price);
                document.getElementById("submit").disabled = true;
                document.getElementById("click_tamount").style.display = "block";
            });

            //find total amount with gst
            $("table").on("keyup", ".gst", function() {
                var gst = Number($(this).val());
                var amount = Number($(this).parents("tr").find(".amount").val());
                gst = (gst / 100) * amount;

                $(this).parents("tr").find(".total").val(gst + amount);

            });



        });
    </script>
    <script>
        $(document).ready(function() {
            $('#qty').keyup(function() {

                var qty = $(this).val();
                
                $.ajax({
                    // url: 'input_validation.php',
                    method: "POST",
                    data: {
                        qty: qty
                    },
                    success: function(data) {

                        if (data > 0) {
                            $('#availability').html('<span class="text-danger">Invalid qty</span>');
                            $('#submit').attr("disabled", true);
                        } else if(data <0) {
                            $('#availability').html('<span class="text-success">Cartridge available</span>');
                            $('#submit').attr("disabled", false);
                        }
                    }
                })

            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
"></script>
    <script src="https://kit.fontawesome.com/e05de82272.js" crossorigin="anonymous"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.2.slim.js"></script> -->

</body>

</html>