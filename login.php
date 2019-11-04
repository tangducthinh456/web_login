<?php
if(isset($_POST['login']))
{
    //echo $_POST['login'];
    session_start();
    include('config.php');

    $username=$_POST['username'];
    $password=$_POST['passworded'];

    $query=mysqli_query($conn,"select * from login where username='$username' && passworded='$password'");

    if (mysqli_num_rows($query) == 0){
        $_SESSION['message']="Login Failed. User not Found!";
        header('location:formlogin.php');
    }
    else{
        $row=mysqli_fetch_array($query);
        if (isset($_POST['remember'])){
            //set up cookie
            setcookie("user", $row['username'], time() + (86400 * 30));
            setcookie("pass", $row['passworded'], time() + (86400 * 30));
        }

        $_SESSION['username']=$row['username'];
        header('location:welcome.php');
    }
}
else{
    header('location:formlogin.php');
    $_SESSION['message']="Please Login!";
}
?>