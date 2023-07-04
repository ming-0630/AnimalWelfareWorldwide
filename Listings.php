<?php
session_start(); 

if (isset($_SESSION['userId'])) {
} else { 
    echo "<script>alert('You need to be logged in to access this page. Please proceed to login or register a new account. Thank you!'); window.location.href = 'Homepage.php'; </script>";
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Animal Welfare Worldwide</title>
  <link rel="stylesheet" href="css\allstyling.css" />
  <script type="text/javascript" src="javascripts.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <div class="overflow">

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

    <div class="listings-container">
      <div class="cards-wrap">

        <?php
        include "conn.php";

        $query = mysqli_query($conn, "SELECT * FROM listing_t WHERE Approval = 'Approved'");

        while ($row = $query->fetch_assoc()){
        echo '<div class="listings-item">
        <a href="PetDetails.php?id='.$row["id"].'"><div class="item-content">

        <div class="card-image">
        <img src='.$row["imageurl"].' alt="Item">
        </div>

        <h1>'.$row["Name"].'</h1>
        <h2>'.$row["Breed"].'</h2>
        </div></a>
        </div>';
      }

      mysqli_close($conn);
      ?>

      </div>
    </div>


    <div class="footer">
    <p style="margin:10px 5px 5px 15px;">WDT Asssignment</p>
    </div>

  </div>

</body>

</html>