<?php
session_start();

include("connect.php");

$message = "";
$type = "";

if(isset($_POST['register']))
{
    $name = trim($_POST['name']);
    $ic = trim($_POST['ic']);
    $email = trim($_POST['email']);

    /* VALIDATE IC */

    if(!preg_match("/^[0-9]{12}$/",$ic))
    {
        $message =
        "IC Number must contain exactly 12 digits and numbers only.";

        $type =
        "error";
    }

    else
    {

        /* CHECK EMAIL */

        $check =
        mysqli_query(
        $conn,
        "SELECT *
        FROM users
        WHERE Email='$email'"
        );

        if(mysqli_num_rows($check)>0)
        {
            $message =
            "Email already registered!";

            $type =
            "error";
        }

        else
        {

            /* INSERT USER */

            $sql =
            "INSERT INTO users
            (
                Name,
                IC_Number,
                Email
            )

            VALUES
            (
                '$name',
                '$ic',
                '$email'
            )";

            $result =
            mysqli_query(
            $conn,
            $sql
            );

            if($result)
            {
                $message =
                "Registration successful! Please login.";

                $type =
                "success";

                header(
                "refresh:2;url=index.php"
                );
            }

            else
            {
                $message =
                "Registration failed!";

                $type =
                "error";
            }

        }

    }

}
?>

<!DOCTYPE html>

<html>

<head>

<title>
MaternCare
</title>

<link
rel="stylesheet"
href="style.css">

</head>

<body>

<div class="logo">

<img src="logo.jfif" alt="logo">

<h1>MaternCare</h1>

</div>

<div class="container">
<div class="left">

<h2>Register Now</h2>

<p class="<?= $type ?>"><?= $message ?></p>

<form method="POST">

<label>Name</label>

<input type="text" name="name" required>

<label> NR-IC / ID Number </label>

<input type="text" name="ic" placeholder="000000000000" pattern="[0-9]{12}" maxlength="12" inputmode="numeric" required>

<label>Email</label>

<input type="email" name="email" required>

<button type="submit" name="register"> Register </button>

<p style="margin-top:15px;">

Already have account?

<a href="index.php"> Login Here</a>
</p>

</form>

</div>

<div class="right">

<img src="mother.jpg" alt="mother">
</div>

</div>

</body>

</html>
