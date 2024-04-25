<?php
if (!isset($_COOKIE['User'])) {
?>
           <a href="/registration.php">Зарегистрируйтесь</a> или <a href="/login.php">войдите</a>, чтобы просматривать контент!
       <?php
} else {
    header('Location: /profile.php');
    exit;
}