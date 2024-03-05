<?php

session_start();
unset($_SESSION["login_email"]);
unset($_SESSION["login_password"]);
session_destroy();
// header("Location: index.php");
echo '<script type="text/javascript">';
echo 'alert("Logout Successful");';
echo 'window.location.href = "index.php"';
echo '</script>';


?>