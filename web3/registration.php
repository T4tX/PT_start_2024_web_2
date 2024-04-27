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
        <h1 class="text-center">Registration</h1>
        <form method='POST' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
            <div class="form-group">
                <label for="InputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="InputUsername1">Username</label>
                <input type="text" name="username" class="form-control" id="InputUsername" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="InputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

<?php
require_once('bd.php');
$link = mysqli_connect('127.0.0.1', 'root', 'soloway', 'db_name_ptstart');

if (isset($_POST['email'], $_POST['username'], $_POST['password'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
}
if (!$email || !$username || !$password) {
    die('Please fill in all the fields!');
}

echo $email, '<br>', $username, '<br>', $password;
$sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
if(!mysqli_query($link, $sql)) {
    echo "Не удалось добавить пользователя";
  }
?>