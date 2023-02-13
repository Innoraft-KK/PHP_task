<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="Task1.php" method="post">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" required><br>
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" required><br>
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" readonly="/readonly" value="<?php
                                                                        $firstName = $_POST["first_name"];
                                                                        $lastName = $_POST["last_name"];
                                                                        echo $fullName;
                                                                        ?>"><br>
        <input type="submit">
    </form>
    <?php
    
    if (!preg_match('/^[a-zA-Z]+$/', $firstName)) {
        echo "Invalid Input First Name";
    } elseif (!preg_match('/^[a-zA-Z]+$/', $lastName)) {
        echo "Invalid Input Last Name";
    } else {
        $fullName = $firstName . " " . $lastName;
        echo "Hello $fullName";
    }
    ?>
</body>

</html>