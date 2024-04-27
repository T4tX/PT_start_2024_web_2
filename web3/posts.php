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
<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $link = mysqli_connect('127.0.0.1', 'root', 'soloway', 'db_name_ptstart');
    $sql = "SELECT * FROM notes WHERE id = $id";
    $res = mysqli_query($link, $sql);
    if (mysqli_num_rows($res)>0){
        $post = mysqli_fetch_array($res);
        echo "<div class='shuffle-highlight-element'><h1>" . $post["label"] ."</h1></div>";
        echo "<div class='shuffle-highlight-element'>" . $post["test"] ."</div>";
    } else {
        echo "No notes";
    }
}
?>


</body>


