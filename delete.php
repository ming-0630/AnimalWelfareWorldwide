<?php
session_start();

include "conn.php";

$uid = $_SESSION['userId'];
$listingID = $_GET['id'];

$sql = "DELETE FROM watchlist_t WHERE (uid = $uid AND listingsID = $listingID)";
$query = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) > 0 ) {
    echo '<script>alert("Successfully deleted from your watchlist"); window.history.go(-1); </script>';
} else {
    echo '<script>alert("There was an error deleting from your watchlist. Please try again."); window.history.go(-1);  </script>';
}

?>