<?php error_reporting(0); ?>
<?php
if (isset($_POST["first_name"]) && isset($_POST["last_name"])) {
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
   
    $fullName = $firstName . " " . $lastName;
}
if(isset($_POST["phone"])){
    $phone_no="+91".strval($_POST["phone"]);
}
if (isset($_FILES["image"])) {
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    if (move_uploaded_file($file_tmp, "upload-images/" . $file_name)) {
        echo "Successfully uploaded";
    } else {
        echo "Could not upload the file";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task4</title>
</head>

<body>
    <form action="Task4.php" method="POST" enctype="multipart/form-data">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" required><br>
        <?php
        if (isset($firstName)) {
            if (!preg_match('/^[a-zA-Z]+$/', $firstName)) {
                echo "Invalid Input in First Name<br\>";
                $firstName = null;
            }
        }
        ?>
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" required><br>
        <?php
        if (isset($lastName)) {
            if (!preg_match('/^[a-zA-Z]+$/', $lastName)) {
                echo "Invalid Input in Last Name <br>";
                $lastName = null;
            }
        }

        ?>
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" disabled value="<?php echo $fullName; ?>"><br>
        <input type="file" name="image"><br>
        <textarea name="sub-mark" id="sub-mark" cols="30" rows="10"></textarea>
        <br>
        <div>Enter subject and marks in this format --> Subject|Marks</div>
        <div>
            <label for="phone">Phone No</label>
            <input type="text" id="phone" name="phone" value="+91" pattern="^\+91\d{10}$"><br>
        </div>
        <input type="submit" value="Submit">
    </form>
    <?php
    if(isset($_FILES["image"])){
    echo "<img src='./upload-images/$file_name'>";}
    if(isset($phone_no)){
        echo "Phone No :". $phone_no;
    }
    if (isset($fullName)) {
        echo "<br>";
        echo "Hello $fullName";
    }
    $sub_mark = explode("\n", $_POST["sub-mark"]);
    
    if (isset($_POST["sub-mark"])){
        echo "<table border=1>
                <tr>
                    <th>Subject</th>
                    <th>Marks</th>
                </tr>";
        foreach ($sub_mark as $value) {
            $sub = explode('|', $value)[0];
            $mark = explode('|', $value)[1];
            echo "<tr>
                    <td>$sub</td>
                    <td>$mark</td>
                   </tr>";
        }
        echo "</table>";
       }
    ?>
</body>
</html>