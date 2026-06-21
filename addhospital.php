<?php

include("connect.php");

$message = "";

if(isset($_POST['add']))
{
    $hospital_id = $_POST['hospital_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $link = $_POST['link'];
    $photo = $_POST['photo'];

    $sql = "INSERT INTO hospital
            (Hospital_ID, Name, Address, Link, Photo)
            VALUES
            ('$hospital_id','$name','$address','$link','$photo')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Hospital Added Successfully!";
    }
    else
    {
        $message = "Failed to Add Hospital!";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Hospital</title>

    <link rel="stylesheet" href="addhospitalstyle.css">

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

<h2>Add Hospital</h2>

<form method="POST">

<div class="form-box">

    <p class="message">
        <?php echo $message; ?>
    </p>

    <div class="row">

        <label>Hospital ID</label>

        <input type="text"
               name="hospital_id"
               required>

    </div>

    <div class="row">

        <label>Name</label>

        <input type="text"
               name="name"
               required>

    </div>

    <div class="row">

        <label>Address</label>

        <textarea
            name="address"
            required>
        </textarea>

    </div>

    <div class="row">

        <label>Website Link</label>

        <input type="text"
               name="link"
               required>

    </div>

    <div class="row">

        <label>Photo</label>

        <input type="text"
               name="photo"
               placeholder="Example: HospitalPantai.jpg"
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