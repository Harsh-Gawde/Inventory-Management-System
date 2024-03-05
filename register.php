<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management - Register</title>
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
    include("template/config.php");





    ?>
    <div class="aai_band">

    </div>

    <div class="login_main d-flex w-100 p-3">
        <div class="w-50 login_main1">
            <img src="img/ims.png" alt="login_img">
        </div>
        <div class="login_main2 form-signin  m-auto">
            <form method="post" action="index.php">
                <h1 class="h3 mb-3 fw-normal text-center">Please Register</h1>
                <hr>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control name" id="floatingName" name="name" placeholder="" required>
                    <label for="floatingName">Name</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                    <label for="floatingInput">Email address</label>
                    <span id="availability"></span>

                </div>

                <div class="form-floating mb-2">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="" required>
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="floatingPassword" name="cpassword" placeholder="" required>
                    <label for="floatingPassword">Confirm Password</label>
                </div>

                <button class="btn btn-primary w-100 py-2" id="register" name="register" type="submit" onclick="email()" >Register</button>
                <div class="text-center py-2">
                    <span>Already Have An Account <a class="login_link" href="index.php">Sign In</a></span>
                </div>

                

            </form>
        </div>

    </div>
    <?php include("template/footer.php"); ?>





    <!-- javascript links -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#email').keyup(function() {

                var email = $(this).val();

                $.ajax({
                    url: 'input_validation.php',
                    method: "POST",
                    data: {
                        email: email
                    },
                    success: function(data) {
                        if (data != 0) {
                            $('#availability').html('<span class="text-danger">Email Already Exist</span>');
                            $('#register').attr("disabled", true);
                        } else {
                            $('#availability').html('<span class="text-success"></span>');
                            $('#register').attr("disabled", false);
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

</body>

</html>