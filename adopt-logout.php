<?php
session_start();
unset($_SESSION['userId']);
echo "<script>window.location.href = 'index.php'; </script>";    
?>