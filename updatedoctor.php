<?php

$conn = mysqli_connect("localhost","root","","MaternCare");

$id = $_GET['id'];

/* AMBIL DATA DOCTOR */

$sql = "SELECT * FROM doctors WHERE Doctor_ID='$id'";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);


/* UPDATE DATA */

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];

    $update = "UPDATE doctors
               SET Name='$name',
                   Specialization='$specialization',
                   Email='$email'
               WHERE Doctor_ID='$id'";

    $run = mysqli_query($conn,$update);

    if($run)
    {
        echo "
        <script>
            alert('Doctor updated successfully!');
            window.location='doctorlist.php';
        </script>
        ";

        exit();
    }
}

?>

<!DOCTYPE html>

<html>

<head>
<title>Update Doctor</title>
<link rel="stylesheet" href="updatedoctor.css">
</head>

<body>

<div class="box">

<h1>Update Doctor</h1>

<form method="POST">

<label>Doctor ID</label>

<input type="text"
value="<?= $row['Doctor_ID'] ?>"
readonly>

<label>Name</label>

<input type="text"
name="name"
value="<?= $row['Name'] ?>"
required>

<label>Specialization</label>

<input type="text"
name="specialization"
value="<?= $row['Specialization'] ?>"
required>

<label>Email</label>

<input type="email"
name="email"
value="<?= $row['Email'] ?>"
required>

<button type="submit" name="update">
Save
</button>

</form>

</div>

</body>

</html>