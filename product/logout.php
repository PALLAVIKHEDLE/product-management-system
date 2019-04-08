<?php
  session_start();
   if(session_destroy()) {
      header("Location: index.php?msg=Successfully Logged out");
   }
?>
