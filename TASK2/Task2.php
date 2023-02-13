<?php error_reporting(0); ?>
<?php 
if(isset($_POST["first_name"])&&isset($_POST["last_name"])){
     $firstName = $_POST["first_name"];
     $lastName = $_POST["last_name"];
     $fullName = $firstName . " " . $lastName;}
     
    if(isset($_FILES["image"])){
        $file_name=$_FILES['image']['name'];
        $file_tmp=$_FILES['image']['tmp_name'];
        if(move_uploaded_file($file_tmp,"upload-images/".$file_name)){
            echo "Successfully uploaded";
        }
        else{
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
    <title>Task2</title>
</head>

<body>
    <form action="Task2.php" method="POST" enctype="multipart/form-data">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" required><br>
        <?php
        if(isset($firstName)){
        if (!preg_match('/^[a-zA-Z]+$/', $firstName)) {
            echo "Invalid Input in First Name<br\>";
            $firstName=null;
        }}
        ?>
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" required><br>
        <?php
        if(isset($lastName)){
        if (!preg_match('/^[a-zA-Z]+$/', $lastName)) {
            echo "Invalid Input in Last Name <br>";
            $lastName=null;
        }}
       
        ?>
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" disabled value="<?php
                                                                      /*   $firstName = $_POST["first_name"];
                                                                        $lastName = $_POST["last_name"]; */
                                                                        // $fullName = $firstName . " " . $lastName;
                                                                        echo $fullName;
                                                                        ?>"><br>
        
        <input type="file" name="image">
        <input type="submit" value="Submit">
    </form>
     <?php
     echo "<img src='./upload-images/$file_name'>";
   

    if(isset($fullName)){
        echo "<br>";
        echo "Hello $fullName";}
    ?>
</body>
</html>