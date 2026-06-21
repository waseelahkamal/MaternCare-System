<?php

session_start();

$conn = mysqli_connect("localhost","root","","MaternCare");

$name = $_SESSION['username'];

$total_patient = "SELECT * FROM booking";
$total_result = mysqli_query($conn,$total_patient);
$total = mysqli_num_rows($total_result);

$total_doctor = "SELECT * FROM doctors"; 
$doctor_result = mysqli_query($conn,$total_doctor); 
$doctor = mysqli_num_rows($doctor_result);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Home</title>
    <link rel="stylesheet" href="adminhome.css">

</head>

<body>

<nav>

    <div class="logo">
        <img src="logo.jfif" alt="Logo">
        <h1>MaternCare</h1>
    </div>
    
    <ul>
        <li><a href="adminhome.php">Home</a></li>
        <li><a href="adminrecord.php">Record</a></li>
        <li><a href="logout.php"class="logout-btn">Sign Out</a>
    </li>
    </ul>

</nav>


<div class="hero">

    <div class="text">

        <h1>HI, <?php echo $name; ?>!</h1>
        <h2>Welcome to MaternCare Admin Dashboard</h2>

    </div>

    <div class="stats">

        <div class="total-card">

            <h2>Total Patients</h2>
            <h1><?php echo $total; ?></h1>

        </div>

        <div class="total-card">

            <h2>Total Doctors</h2>
            <h1><?php echo $doctor; ?></h1>

        </div>

    </div>

</div>

<div class="menu-section">

    <div class="menu-card">

        <img src="icondoctor.webp">

        <h3>Doctor Info</h3>
        <p>Add and manage doctor information.</p>

        <a href="adddoctor.php">
            <button>
                ADD
            </button>
        </a>

    </div>

    <div class="menu-card">

        <img src="iconhospital.png">

        <h3>Hospital Info</h3>
        <p>Manage hospital details and information.</p>

        <a href="addhospital.php">
            <button>
                ADD
            </button>
        </a>

    </div>

</div>

</div>

</body>
</html>