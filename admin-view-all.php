<?php 
session_start();
include "conn.php";

if (!isset($_SESSION['adminId'])) {
    echo "<script>alert('Please login first.'); window.location.href='admin-home.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\admin-style.css" />
    <script type="text/javascript" src="javascripts.js"></script>
    <title>Admin Page</title>
</head>

<body>

    <div class="main-container">

        <div id="open-add-new" class="add-new-bg">

            <div class="add-new-container animate">

                <div class="add-new-form">

                    <div class="form-header">
                        <span onclick="document.getElementById('open-add-new').style.display='none';">&times;</span>
                    </div>

                    <form method="POST" action="admin-add-new.php" class="admin-form" enctype="multipart/form-data">

                        <input type="text" name="petname" required="required" placeholder="Pet Name">
                        <input type="text" name="pettype" required="required"
                            placeholder="Type of Pet (Dog, Cat, etc)"><br>
                        <input type="text" name="petbreed" required="required" placeholder="Breed of Pet">
                        <input type="text" name="petage" required="required" placeholder="Age">
                        <input type="text" name="location" required="required" placeholder="Location"> <br>
                        <textarea name="petdescription" required="required" placeholder="Description"></textarea>

                        <div class="gender-container">
                            <label for="petgender" style="color:white;">Gender:</label>
                            <input type="radio" id="male" name="petgender" value="Male" required>
                            <label for="male" style="color:white;">Male</label>
                            <input type="radio" id="female" name="petgender" value="Female">
                            <label for="female" style="color:white;">Female</label>
                            <input type="radio" id="other" name="petgender" value="Other">
                            <label for="other" style="color:#white;">Other</label> <br>
                        </div>


                        <div class="upload-container">
                            <input type="submit" name="submit" required="required" id="submitsurrender">
                            <label for="petimg">Upload a picture of the pet.</label><br>
                            <input type="file" required="required" name="petimg">
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="image-container">
            <img src="img/Black AWW logo.png" alt="AWW logo" id="smaller-logo">
            <a href="admin-logout.php"><button class="logout-btn">Logout</button></a>
        </div>

        <h1>Lists of Pets</h1>

        <div class="listing-edit-container">
            <table class="listing-edit-table">
                <tr>
                    <th>Pet Name</th>
                    <th>Status</th>
                    <th>Approval Status</th>
                    <th></th>
                </tr>

                <?php
                    $petsql = "SELECT * FROM listing_t";
                    $petQuery = mysqli_query ($conn, $petsql);
                    if (mysqli_num_rows($petQuery) > 0) {
                        while ($row = mysqli_fetch_assoc($petQuery)) {
                            echo '<tr>
                                <td>'.$row['Name'].'</td>
                                <td>'.$row['Status'].'</td>
                                <td>'.$row['Approval'].'</td>
                                <td>
                                 <a href="admin-view.php?id='.$row["id"].'"><button class="view-button">View Details</button></a>
                                 </td>';
                        }
                    }
                ?>
            </table>
        </div>

        <div class="button-container">
            <a href="admin-view-not-approved.php"><button class="sort-button button-not">Sort by "Not
                    Approved"</button></a>
            <button class="sort-button button-not"
                onclick="document.getElementById('open-add-new').style.display='flex';">Add New Listing</button>
        </div>

    </div>
</body>

</html>