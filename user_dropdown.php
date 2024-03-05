<?php
include("template/config.php");

$sql1 = "select department from printer_db where users={$_POST["users"]}";
$res1 = $con->query($sql1);
echo "<option value=''></option>";
if ($res1->num_rows > 0) {
  while ($row = $res1->fetch_assoc()) {
    echo "<option value='{$row["department"]}'>{$row["department"]}</option>";
  }
}
