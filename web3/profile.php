<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solovev M.V.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Hello there <?php echo $_COOKIE['User']   ?></h1>
    <div class="main">
        <div class="main_text">
            <h1>Solovev M.V. 2024</h1>
            <h3>
                Тестовый текст для моего предполагаемого сайта-визитки
            </h3>
        </div>
        <img class='my_image' src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQw4UeEjjERyEVTOIaXIKHlj7snPZAKulH5-z1Kau1lsw&s" alt="">
    </div>
    <div class="container">
        <div class="row">
            <p class="col-1">Данные обо мне</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <p class="col-2">Еще данные обо мне</p>
            <button id="mybutton">Некое действие</button>
            <p id="demo"></p>
        </div>
    </div>
    <script src="js/button.js"></script>
    <div class="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" name="upload">
            <input type="text" name="title" class="form-control" id="InputTitle" placeholder="Title" required>
            <textarea class="form-control" rows="4" name="content" required></textarea>
            <input type="file" name="file">
            <button type="submit" class="btn btn-success">Send my post</button>
        </form>
    </div>
</body>
<footer>

</footer>
</html>

<?php
if (isset($_POST['title'], $_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    if (!$title ||!$content) die("Заполните все поля");

    $link = mysqli_connect('127.0.0.1', 'root', 'soloway', 'db_name_ptstart');
    if (!$link) die("Ошибка подключения к базе данных");

    $sql = "INSERT INTO notes (label, test) VALUES ('$title', '$content')";
    if (!mysqli_query($link, $sql)) die("Не удалось добавить пост");
    mysqli_close($link); // закрыть соединение с базой данных
    echo "We got your note";
}
if (isset($_FILES['file'])) {
    $errors = array();
  
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_ext = strtolower(end(explode('.', $file_name)));
  
    $extensions = array("jpeg", "jpg", "png");
  
    if (in_array($file_ext, $extensions) === false) {
      $errors[] = "Недопустимый тип файла, допустимы только JPEG, JPG и PNG.";
    }
  
    if ($file_size > 2097152) {
      $errors[] = "Размер файла превышает 2 МБ.";
    }
  
    if (empty($errors)) {
      move_uploaded_file($file_tmp, "uploads/" . $file_name);
      echo "Файл успешно загружен.";
    } else {
      foreach ($errors as $error) {
        echo $error . "<br>";
      }
    }
}
?>