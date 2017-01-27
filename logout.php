<?php
   session_start();
   if(session_destroy()) {
       header("Location:NEW_homepage.php");
   }
 
?>
