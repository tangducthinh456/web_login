<?php
$requestMethod = $_SERVER["REQUEST_METHOD"];
$servername = "localhost";
$username = "root";
$password = "";
$dbName = 'databasename';

switch ($requestMethod) {
    case 'POST':
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $current_address = $_POST['current_address'];
    $phone = $_POST['phone'];
    $username_ = $_POST['username'];
    $password_ = $_POST['passworded'];

    $conn = mysqli_connect($servername, $username, $password, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO login (fullname, email, current_address, phone, username, passworded) 
VALUES ('$fullname', '$email', '$current_address', '$phone','$username_', '$password_')";

    $conn->query($sql);
    $conn->close();

    echo "Connected successfully";
    break;

    default:
    header("HTTP/1.0 405 Method Not Allowed");
    break;

}
?>