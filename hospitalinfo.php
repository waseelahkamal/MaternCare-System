<?php

session_start();
include("connect.php");

$result = mysqli_query($conn,"SELECT * FROM hospital");

?>

<!DOCTYPE html>
<html>
<head>

    <title>Hospital Information</title>

    <link rel="stylesheet" href="hospitalinfo.css">

</head>

<body>

<nav>

    <div class="logo">
        <img src="logo.jfif" alt="Logo">
        <h1>MaternCare</h1>
    </div>

    <ul>
        <li><a href="patienthome.php">Home</a></li>
        <li><a href="bookingpage.php">Booking</a></li>
        <li><a href="patientrecord.php">Maternal Record</a></li>
        <li><a href="logout.php" class="logout-btn">Sign Out</a></li>
    </ul>

</nav>


<h1 class="title">Hospital Information</h1>

<div class="hospital-container">

<?php

while($row = mysqli_fetch_assoc($result))
{
?>

    <div class="card">

        <img src="<?php echo $row['Photo']; ?>">

        <h2>
            <?php echo $row['Name']; ?>
        </h2>

        <p>
            <?php echo $row['Address']; ?>
        </p>

        <a href="<?php echo $row['Link']; ?>"
           target="_blank"
           class="btn">
            Learn More
        </a>

    </div>

<?php
}
?>

</div>

</body>
</html>