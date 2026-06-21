```php
<?php

session_start();

$conn = mysqli_connect("localhost","root","","MaternCare");

$message = "";

// Get hospitals
$hospital_query = mysqli_query($conn,
"SELECT Hospital_ID, Name FROM hospital");

if(isset($_POST['submit']))
{
    $name = $_SESSION['username'];

    $IC_Number = $_POST['IC_Number'];
    $age = $_POST['age'];
    $mobile = $_POST['mobile'];
    $date = $_POST['appointment_date'];
    $time = $_POST['time'];

    $hospital_id = $_POST['hospital'];

    // Get hospital name
    $hospital_result = mysqli_query($conn,
    "SELECT Name FROM hospital WHERE Hospital_ID='$hospital_id'");

    $hospital_row = mysqli_fetch_assoc($hospital_result);
    $hospital_name = $hospital_row['Name'];

    $status = "Pending";

    $sql = "INSERT INTO booking
(Name, IC_Number, age, Time, mobile,
appointment_date, Hospital_Name, Status)

VALUES

('$name','$IC_Number','$age',
'$time','$mobile','$date',
'$hospital_name',
'$status')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Thank you for making a booking!";
    }
    else
    {
        $message = "Booking failed! " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Booking Form</title>

    <link rel="stylesheet" href="bookingform.css">

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

<h1 class="title">Booking Form</h1>

<div class="form-box">

<form method="POST">

    <div class="row">
        <label>IC Number</label>
        <input type="text"
        name="IC_Number"
        placeholder="000000-00-0000"
        required>
    </div>

    <div class="row">
        <label>Age</label>
        <input type="number"
        name="age"
        required>
    </div>

    <div class="row">
        <label>Mobile Number</label>
        <input type="text"
        name="mobile"
        placeholder="000-0000-0000"
        required>
    </div>

    <div class="row">
        <label>Preferred Hospital</label>

        <select name="hospital" required>

            <option value="">
                Select Preferred Hospital
            </option>

            <?php
            while($hospital = mysqli_fetch_assoc($hospital_query))
            {
            ?>

            <option value="<?php echo $hospital['Hospital_ID']; ?>">

                <?php echo $hospital['Name']; ?>

            </option>

            <?php
            }
            ?>

        </select>

    </div>

    <div class="row">
        <label>Date of Appointment</label>

        <input type="date"
        name="appointment_date"
        required>
    </div>

    <div class="row">
        <label>Time</label>

        <input type="time"
        name="time"
        required>
    </div>

    <div class="buttons">

        <button type="submit" name="submit">
            Submit
        </button>

        <button type="reset">
            Clear
        </button>

    </div>

</form>

<p class="success-message">
    <?php echo $message; ?>
</p>

</div>

</body>
</html>
```
