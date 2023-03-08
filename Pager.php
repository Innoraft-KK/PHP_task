<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-.width, initial-scale=1.0">
    <link rel="stylesheet" href="pager_style.css">
    <title>Index of Task</title>
</head>
<body>
    
<header>
    <h2>PHP Task</h2>
    <div>
        <a href="Pager.php?form=1" class="active">Task 1</a>
        <a href="Pager.php?form=2" class="active">Task 2</a>
        <a href="Pager.php?form=3" class="active">Task 3</a>
        <a href="Pager.php?form=4" class="active">Task 4</a>
        <a href="Pager.php?form=5" class="active">Task 5</a>
        <a href="Pager.php?form=6" class="active">Task 6</a>
    </div> 
    <form method="post" class='logout'>
        <input type="submit" value="Log Out" name="logout">
    </form>
</header>
   <?php  include 'pager_logic.php';?> 
</body>
</html>
