<?php
session_start();
//$_SESSION['user_name']='kaaarrrtik';
//$_SESSION['password']='innoraft';
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
/* $_SESSION['user_name']=$username;
        $_SESSION['password']=$pass; */
?> 