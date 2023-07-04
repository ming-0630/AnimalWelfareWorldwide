<?php
session_start();

include "conn.php";
$id = $_GET['id'];
$surrenderid = $_SESSION['surrenderId'];

$watchlistSQL = "DELETE FROM watchlist_t WHERE listingsID ='$id'";
mysqli_query($conn, $watchlistSQL);

$sql = "DELETE FROM listing_t WHERE (id = $id AND surrenderID = $surrenderid)";
mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) > 0 ) {
    echo '<script>alert("Successfully deleted this entry"); window.history.go(-2); </script>';
} else {
    echo '<script>alert("There was an error deleting this entry. Please try again."); window.history.go(-2);  </script>';
}

?>