<?php
/**
* Start a session and authenticate user credentials
* @param string $username The username to authenticate
* @param string $pass The password to authenticate
* @return void
*/
session_start();

$username='kaaarrrtik';
$pass='innoraft';

if($_GET['msg']=="login")
{
    echo "<br><br> Please Login First";
    if(isset($_POST['user_name']) && isset($_POST['password'])){
        if($_POST['user_name']==$username && $_POST['password']==$pass)
        {
            $_SESSION['user_name']=$username;
            $_SESSION['password']=$pass;
            header("Location: Pager.php");
        }
        else{
            echo "Invalid username or password";
        }
        header('Location:');  
    }
} 


if(isset($_POST['user_name']) && isset($_POST['password'])){
    if($_POST['user_name']==$username && $_POST['password']==$pass)
    {
        $_SESSION['user_name']=$username;
        $_SESSION['password']=$pass;
        header("Location: Pager.php");
        exit;
    }
    else{
        echo "Invalid username or password";
    }
}
?> 
