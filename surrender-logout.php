<?php
session_start();
unset($_SESSION['surrenderId']);
echo "<script>window.location.href = 'index.php'; </script>";    
?>