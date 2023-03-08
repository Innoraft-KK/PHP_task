<?php
    /**
     * Start a session and check if the user is authenticated, redirect to login page if not.
     * Logout user if requested and redirect to index page.
     * Get task number from query parameter and redirect to respective task form page, or display error message if query parameter is invalid.
     *
     * @return void
     */
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
    if(isset($_GET['form'])){
        $form=$_GET['form'];
        if($form>0 and  $form<7){
            echo "<h2 style='
            margin: 50px 0 0 0;
        '>Task $form</h2>";
            $loc='TASK'.$form.'/form'.$form.'.php';
            include_once $loc;
        }
    }
?>
