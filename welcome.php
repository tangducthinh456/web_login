<?php
session_start();

if (!isset($_SESSION['username']) ||(trim ($_SESSION['username']) == ''))
{
    header('location:formlogin.php');
    exit();
}
include('config.php');
$query=mysqli_query($conn,"select * from login where username='".$_SESSION['username']."'");
$row=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Setting Up Cookie on User Login</title>
</head>
<body>
<h2>Login Success</h2>
<?php echo $row['fullname']; ?>
<br>
<a href="logout.php">Logout</a>
</body>
</html>