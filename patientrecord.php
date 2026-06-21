<?php
session_start();
include("connect.php");

$ic_number = $_SESSION['IC_Number'];

$sql = "SELECT * FROM record
        WHERE IC_Number = '$ic_number'";

$result = mysqli_query($conn, $sql);

if(!$result){
    die("Error: " . mysqli_error($conn));
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Patient Record</title>
    <link rel="stylesheet" href="patientrecord.css">
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
        <li><a href="maternalrecord.php">Maternal Record</a></li>
        <li><a href="logout.php" class="logout-btn">Sign Out</a></li>
    </ul>

</nav>

<h1 class="page-title">Patient Record</h1>

<div class="record-container">

<?php while($row = mysqli_fetch_assoc($result)) { ?>

    <div class="record-card">

        <p><strong>Booking Ref :</strong> <?php echo $row['Booking_REF']; ?></p>

        <p><strong>Name :</strong> <?php echo $row['Name']; ?></p>

        <p><strong>IC Number :</strong> <?php echo $row['IC_Number']; ?></p>

        <p><strong>Checkup Date :</strong> <?php echo $row['CheckupDate']; ?></p>

        <p><strong>Checkup Time :</strong> <?php echo $row['CheckupTime']; ?></p>

        <p><strong>Notes :</strong></p>

        <div class="notes-box">
            <?php echo $row['Notes']; ?>
        </div>

    </div>

<?php } ?>

</div>

</body>
</html>