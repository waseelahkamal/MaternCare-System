<?php
session_start();

include("connect.php");

$message = "";

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $ic = $_POST['ic'];
    $email = $_POST['email'];

    // CHECK EMAIL
    $check = "SELECT * FROM users WHERE email='$email'";
    $resultCheck = mysqli_query($conn, $check);

    if (mysqli_num_rows($resultCheck) > 0) {

        $message = "Email already registered!";

    } else {

        // INSERT DATA
        $sql = "INSERT INTO users(name, ic_number, email)
                VALUES('$name','$ic','$email')";

        $result = mysqli_query($conn, $sql);

        if ($result) {

            // SAVE NAME INTO SESSION
            $_SESSION['username'] = $name;

            // GO TO HOME PAGE
            header("Location: patienthome.php");
            exit();

        } else {

            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>MaternCare</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="logo">

    <img src="logo.jfif" alt="logo">
    <h1>MaternCare</h1>

</div>

<div class="container">

    <div class="left">

        <h2>Register Now</h2>

        <p class="message">
            <?php echo $message; ?>
        </p>

        <form method="POST">

            <label>Name</label>
            <input type="text" name="name" required>

            <label>NR-IC / ID Number</label>
            <input type="text" name="ic" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <button type="submit" name="register">
                Register
            </button>

            <p style="margin-top:15px;">

                Already have account?
                <a href="index.php">Login Here</a>

            </p>

        </form>

    </div>

    <div class="right">

        <img src="mother.jpg" alt="mother">

    </div>

</div>

</body>
</html>
