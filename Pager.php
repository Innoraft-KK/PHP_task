<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index of Task</title>
</head>
<body>
    <ul>
        <li><a href="Pager.php?form=1">Task 1</a></li>
        <li><a href="Pager.php?form=2">Task 2</a></li>
        <li><a href="Pager.php?form=3">Task 3</a></li>
        <li><a href="Pager.php?form=4">Task 4</a></li>
        <li><a href="Pager.php?form=5">Task 5</a></li>
        <li><a href="Pager.php?form=6">Task 6</a></li>
    </ul>
    <form method="post">
        <input type="submit" value="Log Out" name="logout">
    </form>
    <?php include 'pager_logic.php';?>
    
</body>
</html>