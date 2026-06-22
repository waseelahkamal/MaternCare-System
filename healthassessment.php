<?php

$conn = mysqli_connect("localhost","root","","materncare");

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$record_ref = "";

if(isset($_GET['record_ref']))
{
    $record_ref = $_GET['record_ref'];
}

if(isset($_POST['save_assessment']))
    {
        $record_ref=$_POST['record_ref'];

        if(
            empty($_POST['blood_pressure']) ||
            empty($_POST['weight']) ||
            empty($_POST['height']) ||
            empty($_POST['pregnancy_week']) ||
            empty($_POST['heart_rate']) ||
            empty($_POST['blood_sugar']) ||
            empty($_POST['fetal_movement']) ||
            empty($_POST['medical_condition']) ||
            empty($_POST['condition_notes'])
        )
            {
                echo "<script>alert('Please complete all fields before saving');</script>";
            }
            else
                {
                    $blood_pressure=$_POST['blood_pressure'];
                    $weight=$_POST['weight'];
                    $height=$_POST['height'];
                    $pregnancy_week=$_POST['pregnancy_week'];
                    $heart_rate=$_POST['heart_rate'];
                    $blood_sugar=$_POST['blood_sugar'];
                    $fetal_movement=$_POST['fetal_movement'];
                    $medical_condition=$_POST['medical_condition'];
                    $notes=$_POST['condition_notes'];

                    $sql="
                    UPDATE record SET
                        BloodPressure='$blood_pressure',
                        Weight='$weight',
                        Height='$height',
                        PregnancyWeek='$pregnancy_week',
                        BabyHeartRate='$heart_rate',
                        BloodSugarLevel='$blood_sugar',
                        FetalMovement='$fetal_movement',
                        MedicalCondition='$medical_condition',
                        Notes='$notes'
                        WHERE Record_REF='$record_ref'";
                        $result=mysqli_query($conn,$sql);

                        if($result)
                            {
                                echo "<script>alert('Assessment saved successfully');</script>";
                            }
                            else
                                {
                                    echo "<script>alert('Error');</script>";
                                }
                            }
                        }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Medical Health Assessment</title>
    <link rel="stylesheet" href="healthassessment.css">
</head>

<body>

<nav>

    <div class="logo">
        <img src="logo.jfif" alt="Logo">
        <h1>MaternCare</h1>
    </div>

    <ul>
        <li><a href="doctorhome.php">Home</a></li>
        <li><a href="doctorrecord.php">Patient Record</a></li>
        <li><a href="bookinglist.php">Booking List</a></li>
        <li><a href="logout.php" class="logout-btn">Sign Out</a></li>
    </ul>

</nav>

<h1>Medical Health Assessment</h1>

<div class="container">

<form method="POST">

<div class="section">

<h2>Maternal Health Assessment</h2>

<div class="form-group">
    <label>Blood Pressure</label>
    <input type="text" name="blood_pressure" placeholder="mmHg">
</div>

<div class="form-group">
    <label>Weight</label>
    <input type="number" name="weight" placeholder="kg">
</div>

<div class="form-group">
    <label>Height</label>
    <input type="number" name="height" placeholder="cm">
</div>

<div class="form-group">
    <label>Pregnancy Week</label>
    <input type="number" name="pregnancy_week" placeholder="weeks">
</div>

<div class="form-group">
    <label>Baby Heart Rate</label>
    <input type="number" name="heart_rate" placeholder="bpm">
</div>

<div class="form-group">
    <label>Blood Sugar Level</label>
    <input type="number" step="0.1" name="blood_sugar" placeholder="mmol/L">
</div>

<div class="form-group">
    <label>Fetal Movement</label>
    <select name="fetal_movement">
        <option value="Normal">Normal</option>
        <option value="Reduced">Reduced</option>
        <option value="Increased">Increased</option>
    </select>
</div>

</div>

<div class="section">

<h2>Medical Condition</h2>

<div class="form-group">
    <label>Medical Condition</label>

    <select name="medical_condition">
        <option value="">-- Select Condition --</option>
        <option value="Diabetes">Diabetes</option>
        <option value="Hypertension">Hypertension</option>
        <option value="Anaemia">Anaemia</option>
        <option value="Previous C-Section">Previous C-Section</option>
        <option value="High Risk Pregnancy">High Risk Pregnancy</option>
        <option value="None">None</option>
    </select>
</div>

<div class="form-group">
    <label>Additional Notes</label>
    <textarea name="condition_notes" rows="4"></textarea>
</div>

</div>

<input type="hidden" name="record_ref" value="<?php echo $record_ref; ?>">

<button type="submit" name="save_assessment" class="save-btn">
    Save Assessment
</button>

</form>

</div>

</body>
</html>
