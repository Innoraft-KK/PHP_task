<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    if(($_SESSION['user_name'] == 'kaaarrrtik')):
        header('Location: Pager.php');
    
    else:
    
    ?>
    <form  method="post">
        <div class='flexme'>
            <div>
                <label for="user_name">Name</label>
                <input type="text" name="user_name" id="user_name" placeholder="Name">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <input type="submit" value="Login">
        </div>
        <?php
        include "./Login_logic.php";  
        endif;
        ?>
    </form>

</body>
</html>
