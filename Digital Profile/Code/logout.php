<?php
   session_start();
   unset($_SESSION['username']);
   unset($_SESSION['nic']);
  
   header('Location:login.php');
   
?>