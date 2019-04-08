<?php
   include("db-config.php");
   include("session.php");
   $email=$_POST['email'];
   $password=$_POST['password'];
   $sql="SELECT * FROM user WHERE email='".$email."' and password='".$password."'";
   $status=mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($status); 
   $_SESSION['email']=$row['email'];
   if($row==true){
      header("Location:main.php");
   }else{
      header("Location:index.php");
   }

?>