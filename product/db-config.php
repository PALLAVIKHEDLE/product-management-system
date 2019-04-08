<?php
	$conn = mysqli_connect("localhost", "root", "", "product");
    if(!$conn) {

      echo "Connection failed".mysqli_connect_error();
    }
    else {

       //  echo "Connection Established Successfully!";
    }
?>
