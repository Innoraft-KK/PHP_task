<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./Login_logic.php" method="post">
        <div>
            <label for="user_name">Name</label>
            <input type="text" name="user_name" id="user_name">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password">
        </div>
        <input type="submit" value="Login">
        <?php include "./Login_logic.php" ?>
    </form>
</body>
</html>