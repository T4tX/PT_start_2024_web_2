<?php
$servername = '127.0.0.1';
$username = 'root';
$password = 'soloway';
$dbName = "db_name_ptstart";

$link = mysqli_connect($servername,$username,$password);
if (!$link){
    die("Connection error" . mysqli_connection_error());
}
echo "Connection sucsessful\n";

$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if (!mysqli_query($link,$sql)){
    die("Can`t create database" . $dbName);
}
echo "db creation sucsessful\n";
mysqli_close($link);

$link = mysqli_connect($servername,$username,$password,$dbName);
$sql = "CREATE TABLE IF NOT EXISTS users(
    id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(20) NOT NULL
  )";
if (!mysqli_query($link,$sql)){
    die("Can`t create table users");
}
echo "users table creation sucsessful\n";

$sql = "CREATE TABLE IF NOT EXISTS notes(
    id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(15) NOT NULL,
    test VARCHAR(1500) NOT NULL)";
if (!mysqli_query($link,$sql)){
    die("Can`t create table notes");
}
echo "notes table creation sucsessful\n";
mysqli_close($link);

?>