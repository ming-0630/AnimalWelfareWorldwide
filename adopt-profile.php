<?php
session_start();

if (isset($_SESSION['userId'])) {
} else { 
    echo "<script>alert('You need to be logged in to access this page. Please proceed to login or register a new account. Thank you!'); window.location.href = 'Homepage.php'; </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Welfare Worldwide</title>
    <link rel="stylesheet" href="css\allstyling.css" />
</head>

<body>
    <div class="topnav">
        <div class="nav">
            <a href="index.php" class="hovereffect">HOME</a>
            <a href="Homepage.php" class="hovereffect">ADOPT</a>
            <a href="SurrenderHome.php" class="hovereffect">SURRENDER</a>
            <a href="AboutUs.php" class="hovereffect">ABOUT US</a>
            <a href="ContactUs.php" class="hovereffect">CONTACT US</a>
        </div>

        <a href="adopt-logout.php"><button id="loginbtn" class="logout">Logout</button></a>
    </div>

    <div class="profile-main">

        <div id="open-edit-profile" class="edit-profile">
            <div class="edit-profile-container">
                <span onclick="document.getElementById('open-edit-profile').style.display='none';" class="close-edit-profile">&times;</span>
                <h1>Edit your Profile</h1>
                
                <?php
                    include "conn.php";

                    $sql = "SELECT * FROM mem_t WHERE uid = '".$_SESSION['userId']."'";
                    $query = mysqli_query($conn, $sql);

                    $results = mysqli_fetch_assoc($query);

                    $username= $results['Username'];
                    $password= $results['Password'];
                    $phonenum= $results['PhoneNumber'];
                    $email= $results['Email'];
                    $gender= $results['Gender'];
                    $dob= $results['DateOfBirth'];
                    ?>

                <div class="register-form">
                    <form method="POST" action="adopt-updateProfile.php">
                        

                        <input type="text" name="username" required="required" placeholder="Username" value="<?php echo $username?>" disabled> <br>
                        <input type="tel" name="phone_num" required="required" placeholder="Phone Number (012-3456789)"
                            pattern="[0-9]{3}[-][0-9]{7}[0-9]?" value="<?php echo $phonenum?>"> <br>
                        <input type="email" name="email_address" required="required" placeholder="Email Address" value="<?php echo $email?>"> <br>


                        <label for="gender">Gender:</label>
                        <input type="radio" id="male" name="gender" value="male" required <?php if($gender== "male")echo "checked='checked'";?>>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female" <?php if($gender== "female")echo "checked='checked'";?>>
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender" value="other" <?php if($gender== "other")echo "checked='checked'";?>>
                        <label for="other">Other</label> <br>


                        <label for="dob">Date of Birth:</label>
                        <input type="date" name="dob" required="required" value="<?php echo $dob?>"> <br>
                        <input type="submit" name="submitEdit" required="required" onclick="windows.location.href='adopt-updateProfile.php'">
                    </form>

                </div>
            </div>
        </div>

        <?php    
            echo ("<h1 id='greeting'>Hello, ".$results['Username']."</h1>");
            echo '<div class="button-container">

                    <button onclick="document.getElementById(&quot;open-edit-profile&quot;).style.display=&quot;block&quot;" class="profile-button">Edit Your Profile</button></a>
                </div>';

            echo '<h2>My Watchlist</h2>';
            
            $watchlistSQL = "SELECT * FROM watchlist_t WHERE uid = '".$results['uid']."'";
            $watchlistQuery = mysqli_query($conn, $watchlistSQL);

            if(mysqli_num_rows($watchlistQuery) > 0) {

                echo '<div class="watchlist-container">
                    <table class="watchlist">

                    <tr>
                        <th>Name of Pet</th>
                        <th>Breed of Pet</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Adoption Status</th>
                        <th></th>
                    </tr>';


                while ($row = mysqli_fetch_assoc($watchlistQuery)) {
                    $listingSQL = "SELECT * FROM listing_t WHERE id = '".$row['listingsID']."'";
                    $listingQuery = mysqli_query($conn, $listingSQL);
                    $listingResults = mysqli_fetch_assoc($listingQuery);

                    echo '<tr>
                        <td>'.$listingResults['Name'].'</td>
                        <td>'.$listingResults['Breed'].'</td>
                        <td>'.$listingResults['Gender'].'</td>
                        <td>'.$listingResults['Age'].'</td>
                        <td>'.$listingResults['Status'].'</td>
                        <td>
                        <a href="PetDetails.php?id='.$row["listingsID"].'"><button class="watchlist-button">View</button></a>
                        <a href="delete.php?id='.$row["listingsID"].'" onclick="return confirm(&quot;Are you sure?&quot;)"><button class="watchlist-button" id="watchlist-delete">Delete</button></a>
                        </td>
                        </tr>';
                }
                
                echo '</table> </div>';
                
            } else {
                echo '<div class="watchlist-container">
                    <table class="watchlist">

                    <tr>
                        <th>Name of Pet</th>
                        <th>Breed of Pet</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Adoption Status</th>
                        <th></th>
                    </tr>

                    <tr>
                    <td colspan="6">
                    NO DATA AVAILBLE
                    </td>
                    </tr> 
                    </table>
                    </div>';
            }            
        ?>

    </div>

    <div class="footer">
        <p style="margin:5px 5px 5px 15px;">WDT Asssignment</p>
    </div>

    <script type="text/javascript" src="javascripts.js"></script>
</body>

</html>