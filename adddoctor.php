<?php

include("connect.php");

$message = "";

if(isset($_POST['add']))
{
    $doctor_id = $_POST['doctor_id'];
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];

    $sql = "INSERT INTO doctors
            (Doctor_ID, Name, Specialization, Email)
            VALUES
            ('$doctor_id','$name','$specialization','$email')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Doctor Added Successfully!";
    }
    else
    {
        $message = "Failed to Add Doctor!";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Doctor</title>

    <link rel="stylesheet" href="adddoctorstyle.css">

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
        <li><a href="logout.php"class="logout-btn">Sign Out</a></li>
    </ul>

</nav>

<h2>Add Doctor</h2>

<form method="POST">

<div class="form-box">

    <p class="message">
        <?php echo $message; ?>
    </p>

    <div class="row">

        <label>Doctor ID</label>

        <input type="text"
               name="doctor_id"
               required>

    </div>

    <div class="row">

        <label>Name</label>

        <input type="text"
               name="name"
               required>

    </div>

    <div class="row">

        <label>Specialization</label>

        <select name="specialization" required>
            <option value="">Select</option>
            <option>Obstetrician & Gynecologist (OB-GYN)</option>
            <option>Pediatrician</option>
            <option>Dietitian</option>
            <option>Surgeon</option>
        </select>

    </div>

    <div class="row">

        <label>Email</label>

        <input type="email"
               name="email"
               required>

    </div>

    <div class="button-area">

        <button type="submit"
                name="add">

            Add

        </button>

        <button type="reset">

            Clear

        </button>

    </div>

</div>

</form>

</body>
</html>