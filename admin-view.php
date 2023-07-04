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
        <div class="image-container" style="margin-bottom: 0px;">
            <img src="img/Black AWW logo.png" alt="AWW logo" id="smaller-logo">
            <a href="admin-logout.php"><button class="logout-btn">Logout</button></a>
            <button class="logout-btn" onclick="javascript:history.back()">Back</button>
        </div>
        <?php
                    $petsql = "SELECT * FROM listing_t WHERE id = '".$_GET['id']."'";
                    $petQuery = mysqli_query ($conn, $petsql);

                    if (mysqli_num_rows($petQuery) > 0 ) {
                        $results = mysqli_fetch_assoc($petQuery);
                        $gender = $results['Gender'];
                        $ownersql = "SELECT * FROM surrender_t WHERE SurrenderID = '".$results['SurrenderID']."'";
                        $ownerQuery = mysqli_query ($conn, $ownersql);
                        $ownerResults = mysqli_fetch_assoc($ownerQuery);
                    } else {
                        echo "<script>alert('Details not found!'); window.history.go(-1); </script>";
                    }
                    
                ?>

        <div class="redirect">
    
            <?php if ($results['Approval'] === "Not Approved") {
                echo '<a href="admin-approval.php?id='.$results['id'].'" onclick="return confirm(&quot;Are you sure you want to approve this entry?&quot;)"><button class="approveBtn approveBtn-no">Approve</button></a>';
            } else if ($results['Approval'] === "Approved") {
                echo '<a href=""><button class="approveBtn" disabled>Approved</button></a>';
            }
            ?>
            
            <a href="admin-delete.php?id=<?php echo $results['id']?>" onclick="return confirm(&quot;Are you sure you want to delete this entry?&quot;)"><button class="deleteBtn">Delete</button></a>
        </div>
        <div class="pet-form">
            <h1>Pet Details</h1>

            <div class="petimg-container">
                <img src="<?php echo $results['imageurl'] ?>" alt="Uploaded Image">
            </div>


            <form class="approval-form">

                <label for="petname">Name:</label>
                <input type="text" name="petname" required="required" value="<?php echo $results['Name']?>" disabled>

                <label for="pettype">Type:</label>
                <input type="text" name="pettype" required="required" value="<?php echo $results['Type']?>"
                    disabled><br>

                <label for="petbreed">Breed:</label>
                <input type="text" name="petbreed" required="required" value="<?php echo $results['Breed']?>" disabled>

                <label for="petage">Age:</label>
                <input type="text" name="petage" required="required" value="<?php echo $results['Age']?>" disabled><br>

                <label for="location">Location:</label>
                <input type="text" name="location" required="required" value="<?php echo $results['Location']?>"
                    disabled> <br>

                <label for="petdescription">Description:</label>
                <textarea name="petdescription" required="required"
                    disabled><?php echo $results['Description']?></textarea><br>

                <label for="ownUsername">Owner Username:</label>
                <input type="text" name="ownUsername" required="required" value="<?php echo $ownerResults['Username']?>"
                    disabled> <br>

                <label for="ownPhone">Owner Phone Number:</label>
                <input type="text" name="ownPhone" required="required" value="<?php echo $ownerResults['PhoneNumber']?>"
                    disabled> <br>

                <label for="ownEmail">Owner Email:</label>
                <input type="text" name="ownEmail" required="required" value="<?php echo $ownerResults['Email']?>"
                    disabled> <br>

                <div class="gender-container">
                    <label for="petgender">Gender:</label>
                    <input type="radio" id="male" name="petgender" value="Male" required
                        <?php if($gender== "Male")echo "checked='checked'";?> disabled>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="petgender" value="Female"
                        <?php if($gender== "Female")echo "checked='checked'";?> disabled>
                    <label for="female">Female</label>
                    <input type="radio" id="other" name="petgender" value="Other"
                        <?php if($gender== "Other")echo "checked='checked'";?> disabled>
                    <label for="other">Other</label> <br>
                </div>
            </form>

        </div>
    </div>
</body>

</html>