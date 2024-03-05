<?php
    include("template/config.php");
    $sql="select unit_price from cartridge_model where pid={$_POST["pid"]}";
  $res=$con->query($sql);
  if($res->num_rows>0){
    $row=$res->fetch_assoc();
    echo $row["unit_price"];
  }
  else{
    echo "0";
  }
?>