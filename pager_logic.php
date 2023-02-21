<?php
    session_start();
    if (!isset($_SESSION["user_name"])) {
        header("Location: index.php?msg=login");
        exit;
    }  
    elseif (isset($_POST["logout"])) {
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
    if(isset($_GET['task'])){
        $task=$_GET['task'];
        if($task>0 || $task<7){
            $loc='./TASK'.$task.'./form'.$task.'php';
            header($loc);
        }
        else{
            echo "Wrong Query";
        }
    }
?>