<?php
session_start();
include "conn.php";

$uid = $_SESSION['userId'];
$id = $_GET['id'];

$sql = "INSERT INTO watchlist_t (uid, listingsID) VALUES ('$uid', '$id')";
mysqli_query($conn, $sql);

if ( mysqli_affected_rows($conn) > 0 ) { 
    echo "<script>alert('Added to watchlist!'); window.history.go(-1);</script>";
} else {
    echo "<script>alert('Failed to add to watchlist. Please try again.'); window.history.go(-1);</script>";
}

?>