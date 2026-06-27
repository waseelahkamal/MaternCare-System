<?php
session_start();

include("connect.php");

$message = "";

if(isset($_POST['login']))
{
    $name = trim($_POST['name']);
    $ic = trim($_POST['ic']);

    //ADMIN LOGIN
    if(substr($ic,0,1) == "A")
    {
        $sql = "SELECT * FROM admins
                WHERE Name='$name'
                AND Admin_ID='$ic'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['username'] = $row['Name'];

            header("Location: adminhome.php");
            exit();
        }
        else
        {
            $message = "Invalid Admin Login!";
        }
    }

    //DOCTOR LOGIN
    else if(substr($ic,0,1) == "D")
    {
        $sql = "SELECT * FROM doctors
                WHERE Name='$name'
                AND Doctor_ID='$ic'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_assoc($result);

    $_SESSION['username'] = $row['Name'];
    $_SESSION['Doctor_ID'] = $row['Doctor_ID'];

    header("Location: doctorhome.php");
    exit();
}
        else
        {
            $message = "Invalid Doctor Login!";
        }
    }

    //PATIENT LOGIN 
    else
    {
        $sql = "SELECT * FROM users
                WHERE Name='$name'
                AND IC_Number='$ic'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['username'] = $row['Name'];
            $_SESSION['IC_Number'] = $row['IC_Number'];

            header("Location: patienthome.php");
            exit();
        }
        else
        {
            $message = "Invalid Patient Login!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="logo">
    <img src="logo.jfif">
    <h1>MaternCare</h1>
</div>

<div class="container">

    <div class="left">

        <h2>Login</h2>

        <p class="message">
            <?php echo $message; ?>
        </p>

        <form method="POST">

            <label>Name</label>
            <input type="text" name="name" required>

            <label>NR-IC / ID Number</label>
            <input type="text" name="ic" required>

            <button type="submit" name="login">
                Login
            </button>

        </form>

        <p style="margin-top:15px;">
            Don't have account?
            <a href="register.php">Register Here</a>
        </p>

    </div>

    <div class="right">
        <img src="mother.jpg">
    </div>

</div>

</body>
</html>
