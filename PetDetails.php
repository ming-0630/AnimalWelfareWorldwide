<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pet Details</title>
    <link rel="stylesheet" href="css\allstyling.css" />
    <script type="text/javascript" src="javascripts.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        
        <a href="adopt-profile.php"><button id="profile" class="profile" style="margin-right: 30px;">My Profile</button></a>
    </div>

    <div class="details-main">

        <?php
        include "conn.php";
        $id = $_GET['id'];
        $sql = "SELECT * FROM listing_t WHERE id = '$id'";
        $query = mysqli_query($conn, "SELECT * FROM listing_t WHERE id = $id");

        if (mysqli_num_rows ($query) > 0 ) {
            $results = mysqli_fetch_assoc ($query);
        } else {
            echo '<script>alert("Unable to find the details of this pet. Please try again."); window.history.go(-1);</script>';
        }
    ?>

        <div class="details-left">
            <a href="Listings.php"><span class="back">
                    < Back</span> </a> <div class="details-img">
                        <img src="<?php echo $results['imageurl']?>" alt="Pet Image">
        </div>

        <?php
            $uid = $_SESSION['userId'];
            $watchlistCheck = "SELECT * FROM watchlist_t WHERE (uid = $uid AND listingsID = $id)"; 
            $check = mysqli_query($conn, $watchlistCheck);

            if (mysqli_num_rows($check) > 0 ) {
                echo "<button class='details-watchlist'onclick='window.location.href=&quot;delete.php?id=".$id."&quot;;'>Remove from Watchlist</button>";
            } else {
                echo "<button class='details-watchlist' onclick='window.location.href=&quot;watchlist-add.php?id=".$id."&quot;;'>Add to Watchlist</button>";
            }
        ?>

    </div>

    <div class="details-right">


        <?php
        if ($results['Status'] === "Not Adopted") {
            echo '<div class="status-no">
                <p>Not Adopted</p>
                </div>';
        } else {
            echo '<div class="status-yes">
                 <p>Adopted</p>
                 </div>';
        }
        ?>


        <div class="details-right-pet">
            <h2><?php echo $results['Name']?></h2>

            <div class="details-margin">
                <div class="detais-margin-left">
                    <p>Breed:</p>
                    <p>Age:</p>
                    <p>Gender:</p>
                    <p>Location:</p>
                </div>

                <div class="details-margin-right">
                    <p><?php echo $results['Breed']?></p>
                    <p><?php echo $results['Age']?></p>
                    <p><?php echo $results['Gender']?></p>
                    <p><?php echo $results['Location']?></p>
                </div>
            </div>

            <?php
                $owner = $results['SurrenderID'];

                $ownerSQL = "SELECT * FROM surrender_t WHERE (SurrenderID = $owner)";
                $ownerQuery = mysqli_query ($conn, $ownerSQL);
                
                if (mysqli_num_rows($ownerQuery) > 0 ) {
                    $ownerResults = mysqli_fetch_assoc($ownerQuery);
                }
                
            ?>


            <div class="icon-container">
                <div class="icon">
                    <img src="img/Whatsapp.png" alt="Whatsapp Icon">
                    <p><?php echo $ownerResults['PhoneNumber'] ?></p>
                </div>

                <div class="icon">
                    <img src="img/Email.png" alt="Emaii Icon">
                    <p><?php echo $ownerResults['Email'] ?></p>
                </div>
            </div>

            <p>Description:</p>
            <div class="description-box">
                <p><?php echo $results['Description']?></p>
            </div>
        </div>
    </div>
    </div>


    </div>

    <div class="footer">
        <p style="margin:10px 5px 5px 15px;">WDT Asssignment</p>
    </div>

</body>

</html>