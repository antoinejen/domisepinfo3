<?php
   session_start();

   if(session_destroy()) {
       header("Location: Homepage_Domisep.php");
   }
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 12/12/16
 * Time: 16:36
 */
?>
