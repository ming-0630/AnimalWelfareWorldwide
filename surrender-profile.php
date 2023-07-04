<?php
session_start();

if (isset($_SESSION['surrenderId'])) {
} else { 
    echo "<script>alert('You need to be logged in to access this page. Please proceed to login or register a new account. Thank you!'); window.location.href = 'SurrenderHome.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Welfare Worldwide</title>
    <link rel="stylesheet" href="css\surrender-style.css"/>
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

        <a href="surrender-logout.php"><button class="logout">Logout</button></a>
    </div>

    <div class="profile-main">

        <div id="open-edit-profile" class="edit-profile">
            <div class="edit-profile-container animate">
                <span onclick="document.getElementById('open-edit-profile').style.display='none';" class="close-edit-profile">&times;</span>
                <h1>Edit your Profile</h1>
                
                <?php
                    include "conn.php";

                    $sql = "SELECT * FROM surrender_t WHERE SurrenderID = '".$_SESSION['surrenderId']."'";
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
                    <form method="POST" action="surrender-updateProfile.php">
                        <input type="text" name="username" placeholder="Username" value="<?php echo $username?>" disabled style="color: white;"> <br>
                        <input type="tel" name="phone_num" required="required" placeholder="Phone Number (012-3456789)"
                            pattern="[0-9]{3}[-][0-9]{7}[0-9]?" value="<?php echo $phonenum?>"> <br>
                        <input type="email" name="email_address" required="required" placeholder="Email Address" value="<?php echo $email?>"> <br>

                        <label for="gender">Gender:</label>
                        <input type="radio" id="male" name="gender" value="Male" required <?php if($gender== "Male")echo "checked='checked'";?>>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="Female" <?php if($gender== "Female")echo "checked='checked'";?>>
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender" value="Other" <?php if($gender== "Other")echo "checked='checked'";?>>
                        <label for="other">Other</label> <br>


                        <label for="dob">Date of Birth:</label>
                        <input type="date" name="dob" required="required" value="<?php echo $dob?>"> <br>
                        <input type="submit" name="submitEdit" required="required" onclick="windows.location.href='surrender-updateProfile.php'">
                    </form>

                </div>
            </div>
        </div>


        <?php       
            echo ("<h1 id='greeting'>Hello, ".$results['Username']."</h1>");
            echo '<div class="button-container">
                    <button onclick="document.getElementById(&quot;open-edit-profile&quot;).style.display=&quot;block&quot;" class="profile-button">Edit Your Profile</button></a>
                </div>';

            echo '<h2>My Surrender Requests</h2>';
            
            $requestsSQL = "SELECT * FROM listing_t WHERE SurrenderID = '".$results['SurrenderID']."'";
            $requestsQuery = mysqli_query($conn, $requestsSQL);

            if(mysqli_num_rows($requestsQuery) > 0) {

                echo '<div class="requests-container">
                    <table class="requests">

                    <tr>
                        <th>Name of Pet</th>
                        <th>Breed of Pet</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Approval Status</th>
                        <th></th>
                    </tr>';


                while ($row = mysqli_fetch_assoc($requestsQuery)) {
                
                    echo '<tr>
                        <td>'.$row['Name'].'</td>
                        <td>'.$row['Breed'].'</td>
                        <td>'.$row['Gender'].'</td>
                        <td>'.$row['Age'].'</td>
                        <td>'.$row['Approval'].'</td>
                        <td id="td-buttons">
                        <a href="edit-pet.php?id='.$row["id"].'"><button class="requests-button">Edit</button></a>';

                        if ($row['Status'] === 'Adopted') {
                            echo'<a href="change-adoption-status-false.php?id='.$row['id'].'"><button class="requests-button status-true" id="requests-status">Adopted</button></a>
                            </td>
                            </tr>';
                        } else {
                            echo'<a href="change-adoption-status-true.php?id='.$row['id'].'"><button class="requests-button status-false" id="requests-status">Not Adopted</button></a>
                            </td>
                            </tr>';
                        }
                }
                
                echo '</table> </div>';
                
            } else {
                echo '<div class="requests-container">
                    <table class="requests">

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
        <p style="margin:5px 5px 5px 15px; color: #E98074;">WDT Asssignment</p>
    </div>

    <script type="text/javascript" src="javascripts.js"></script>
</body>

</html>