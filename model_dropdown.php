<?php 

// add requisition
  include ("template/config.php");
  $sql="select cartridge_model from cartridge_model where procurement_no='{$_POST["proc_no"]}'";
  $res=$con->query($sql);
  echo "<option value=''></option>";
  if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
      echo "<option value='{$row["cartridge_model"]}'>{$row["cartridge_model"]}</option>";
    }
  }

 
  


?>