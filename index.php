<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Inventory Management - Login</title>
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
    session_start();
    include("template/header.php");
    include("template/config.php");

    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];


        $sql1 = "select email from register";
        $res1 = mysqli_query($con, $sql1);
        $i = 0;
        if (mysqli_num_rows($res1) >= 0) {


            while ($row = mysqli_fetch_assoc($res1)) {
                
                if (isset($row['email']) && $row['email'] == $email) {
                    $i = 1;
                    echo '<script>alert("User Already Exist")</script>';
                }
            }
            echo $i;
            if ($i === 0) {
                if ($password != $cpassword) {
                    echo '<script>alert("Please match the password");</script>';
                    echo '<script>window.location.href = "register.php";</script>';
                } else {
                    $sql = " INSERT INTO `register` (`name`, `email`, `password`, `cpassword`) VALUES ('$name', '$email', '$password', '$cpassword') ";

                    $res = mysqli_query($con, $sql);

                    if ($res) {
                        echo '<script>alert("Registered Successfully")</script>';
                    } else {
                        echo '<script>alert("Error 200: Registration Failed")</script>';
                    }
                }
            }
        }
    }




    if (isset($_POST['login_email']) && isset($_POST['login_password'])) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $login_email = validate($_POST['login_email']);
        $login_password = validate($_POST['login_password']);

        $sql = "Select * from register where email='$login_email' and password='$login_password' ";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $login_email && $row['password'] === $login_password) {

                // echo "Welcome to Cartridges";

                $_SESSION['login_email'] = $row['email'];
                $_SESSION['login_password'] = $row['password'];

                $_SESSION['name'] = $row['name'];
                // header("Location: home.php");
                // echo '<script type="text/javascript">';
                // echo 'alert("Welcome ");';
                $c = $_SESSION['name'];
                echo '<script>alert("Login Successful, Welcome '.$c.'");</script>';
                echo '<script>';
                echo 'window.location.href = "home.php"';
                echo '</script>';

                exit();
            }
        } else {
            echo '<script>alert("Incorrect Email or Password")</script>';

            // header("Location: index.php");
        }
    }












    ?>
    <div class="aai_band">

    </div>

    <div class="login_main d-flex w-100 p-3">
        <div class="w-50 login_main1">
            <img src="img/ims.png" alt="login_img">

        </div>

        <div class="login_main2 form-signin  m-auto">
            <form method="post" action="index.php">
                <h1 class="h3 mb-3 fw-normal text-center">Please Sign In</h1>
                <hr>
                <div class="form-floating mb-2">
                    <input type="email" name="login_email" class="form-control" id="floatingInput" placeholder="" required>
                    <label for="floatingInput">Email address</label>
                </div>
                <!-- <br> -->
                <div class="form-floating mb-4">
                    <input type="password" name="login_password" class="form-control" id="floatingPassword" placeholder="" required>
                    <label for="floatingPassword">Password</label>
                </div>

                <!-- <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember me
                    </label>
                </div> -->
                <button class="btn btn-primary w-100 py-2" name="signin" type="submit">Sign in</button>
                <div class="text-center py-2">
                    <span>Don't Have An Account <a class="register" href="register.php">Register</a></span>
                </div>
                <hr>
               
            </form>
        </div>

    </div>

    <?php include("template/footer.php"); ?>
    <script>
        function funk(yy) {
            alert(yy);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
"></script>
    <!-- javascript links -->
    <script src="https://kit.fontawesome.com/e05de82272.js" crossorigin="anonymous"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>


</body>

</html>