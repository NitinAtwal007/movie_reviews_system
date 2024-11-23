<?php
if (isset($_POST['submit'])) {
    include "connection.php";

    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpass']);

    // Check for existing username
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $count_user = mysqli_num_rows($result);

    // Check for existing email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);

    if ($count_user == 0 && $count_email == 0) {
        // Check if passwords match
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hash')";
            if (mysqli_query($conn, $sql)) {
                echo '<script>
                    alert("Signup successful! Redirecting to login.");
                    window.location.href="login.php";
                    </script>';
            } else {
                echo '<script>
                    alert("Error: Could not register. Try again later.");
                    window.location.href="signup.php";
                    </script>';
            }
        } else {
            echo '<script>
                alert("Passwords do not match");
                window.location.href="signup.php";
                </script>';
        }
    } else {
        echo '<script>
            alert("Username or Email already exists");
            window.location.href="signup.php";
            </script>';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color:  rgb(210, 243, 208);">
<?php include "navbar.php"; ?>
<div class="container mt-5">
    <h1 class="text-center">SIGN UP</h1>
    <form action="signup.php" method="POST" class="mt-3">
        <div class="mb-3">
            <label for="user" class="form-label">Enter Username</label>
            <input type="text" id="user" name="user" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Enter Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Enter Password</label>
            <input type="password" id="pass" name="pass" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cpass" class="form-label">Retype Password</label>
            <input type="password" id="cpass" name="cpass" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
