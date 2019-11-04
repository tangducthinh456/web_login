<?php
$requestMethod = $_SERVER["REQUEST_METHOD"];

$servername = "localhost";
$username = "root";
$password = "";
$dbName = 'datacustomer';

switch ($requestMethod) {
    case 'POST':
        $amount = $_POST['amount'];
        $duration = $_POST['duration'];
        $fullname = $_POST['fullname'];
        $identity_id = $_POST['identity_id'];
        $phone = $_POST['phone'];
        $current_address = $_POST['current_address'];

        $conn = mysqli_connect($servername, $username, $password, $dbName);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";

        $sql = "INSERT INTO data (amount, duration, fullname, identity_id, phone, current_address) 
VALUES ($amount, $duration, '$fullname', '$identity_id', '$phone', '$current_address')";
        $conn->query($sql);
        $conn->close();

        echo "Connected successfully";
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
?>