<?php
if (isset($_POST['submit'])){
    include "connection.php";

    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    $sql = "SELECT * FROM users WHERE username= '$username' OR email='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($row){
        if (password_verify($password, $row["password"])){
            header("Location: index.php");
            exit();
        } else {
            echo '<script>
                alert("Invalid username or password");
                window.location.href="login.php";
                </script>';
        }
    } else {
        echo '<script>
            alert("Invalid username or password");
            window.location.href="login.php";
            </script>';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color:  rgb(210, 243, 208);">
<?php include "navbar.php"; ?>
<div class="container mt-5">
    <h1 class="text-center">LOGIN</h1>
    <form action="login.php" method="POST" class="mt-3">
        <div class="mb-3">
            <label for="user" class="form-label">Enter Username/Email</label>
            <input type="text" id="user" name="user" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Enter Password</label>
            <input type="password" id="pass" name="pass" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
