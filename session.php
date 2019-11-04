<?php
include('config.php');
session_start();

$user_check = $_SESSION['username'];

$ses_sql = mysqli_query($conn,"select username from login where username = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['fullname'];

if(!isset($_SESSION['username'])){
    header("location:login.php");
    die();
}
?>
