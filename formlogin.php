<?php
	session_start();
	include('config.php');
if (isset($_COOKIE["user"]) && (isset($_COOKIE["pass"]))) {
    //foreach($_COOKIE as $a) {echo $a;};
    echo "YES";
    $user = $_COOKIE["user"];
    $pass = $_COOKIE["pass"];
    $query=mysqli_query($conn,"select * from login where username='$user' && passworded='$pass'");
    //header("Location:welcome.php");
if (mysqli_num_rows($query) == 0){
    $_SESSION['message']="Login Failed. User not Found!";
    header('location:formlogin.php');
}
else{
    $row=mysqli_fetch_array($query);
    $_SESSION['username']=$row['username'];
    header('location:welcome.php');
}
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Using Cookie with Logout</title>
</head>
<body>
<h2>Login Form</h2>
<form method="POST" action="login.php">

    <label>Username:</label> <input type="text" value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>" name="username">
    <label>Password:</label> <input type="password" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" name="passworded"><br><br>
    <input type="checkbox" name="remember"> Remember me <br><br>
    <input type="submit" value="Login" name="login">
</form>

<span>
	<?php
		if (isset($_SESSION['message'])){
			echo $_SESSION['message'];
		}
		unset($_SESSION['message']);
	?>
</span>
</body>
</html>