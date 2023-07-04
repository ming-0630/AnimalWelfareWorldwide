<?php
session_start();

include "conn.php";
$id = $_GET['id'];

$sql = "UPDATE listing_t SET Approval = 'Approved' WHERE id ='$id'";
mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) > 0 ) {
    echo '<script>alert("Successfully approved entry!"); window.history.go(-2); </script>';
} else {
    echo '<script>alert("There was an error approving this entry. Please try again."); window.history.go(-2);  </script>';
}

?>