<?php
session_start();

$conn = mysqli_connect("localhost","root","","materncare");

$ic_number = $_SESSION['IC_Number'];

$sql = "
SELECT *
FROM booking
WHERE IC_Number='$ic_number'
ORDER BY appointment_date DESC";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Appointment History</title>
    <link rel="stylesheet" href="appointmenthistory.css">
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

<h1>Appointment History</h1>

<div class="history-container">

<?php
if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)){
?>

<div class="appointment-card">

    <p><strong>Booking Ref :</strong>
        <?php echo $row['Booking_REF']; ?>
    </p>

    <p><strong>Checkup Date :</strong>
        <?php echo $row['appointment_date']; ?>
    </p>

    <p><strong>Checkup Time :</strong>
        <?php echo $row['Time']; ?>
    </p>

    <p><strong>Doctor Name :</strong>
        <?php echo $row['Doctor_Name'] ? $row['Doctor_Name'] : 'Not Assigned'; ?>
    </p>

    <p><strong>Status :</strong>
        <?php
        $status = $row['Status'];

        if($status == "Approved"){
            echo "<span class='status-approved'>$status</span>";
        }
        else if($status == "Rejected"){
            echo "<span class='status-rejected'>$status</span>";
        }
        else{
            echo "<span class='status-pending'>$status</span>";
        }
        ?>
    </p>

</div>

<?php

    }
}
else{
    echo "<p class='no-record'>No appointment history found.</p>";
}
?>

</div>

</body>
</html>
