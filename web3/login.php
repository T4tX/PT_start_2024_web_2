<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">LOGIN</h1>
        <form method='POST' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
            <div class="form-group">
                <label for="InputUsername1">Username</label>
                <input type="text" name="username" class="form-control" id="InputUsername" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="InputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>

<?php
require_once('bd.php');
$link = mysqli_connect('127.0.0.1', 'root', 'soloway', 'db_name_ptstart');

if (isset( $_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
}
if (!$username || !$password) {
    die('Please fill in all the fields!');
}

echo $username, '<br>', $password;
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) == 1) {
    setcookie("User", $username, time()+7200);
    header('Location: profile.php');
} else {
    echo "неправильное имя или пароль";
}
?>