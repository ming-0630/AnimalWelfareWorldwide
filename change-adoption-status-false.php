<?php
session_start();

include "conn.php";

$id = $_GET['id'];

$sql = "UPDATE listing_t SET Status = 'Not Adopted' WHERE id = '$id'";
$query = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) > 0 ) {
    echo '<script>alert("Successfully changed adoption status!"); window.history.go(-1); </script>';
} else {
    echo '<script>alert("There was an error changing the adoption status. Please try again."); window.history.go(-1);  </script>';
}

?>