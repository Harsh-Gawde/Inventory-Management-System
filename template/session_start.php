<?php
session_start();
if (empty($_SESSION['login_email']) || $_SESSION['login_password'] == '') {
  header("Location: index.php");
  die();
}



// Set the inactivity time of 15 minutes (900 seconds)
$inactivity_time =  15 * 60;


// Check if the last_timestamp is set
// and last_timestamp is greater then 15 minutes or 9000 seconds
// then unset $_SESSION variable & destroy session data
if (isset($_SESSION['last_timestamp']) && (time() - $_SESSION['last_timestamp']) > $inactivity_time) {
  session_unset();
  session_destroy();

  //Redirect user to login page

  echo "<script type='text/javascript'>alert('Session has been timed out');
  window.location='index.php';
  </script>";
  exit();
} else {
  // Regenerate new session id and delete old one to prevent session fixation attack
  session_regenerate_id(true);

  // Update the last timestamp
  $_SESSION['last_timestamp'] = time();
}
