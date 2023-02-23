    <?php error_reporting(0); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Task4</title>
    </head>
    <body>
        <!-- form begin -->
        <form method="post" enctype="multipart/form-data">
            <div>
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" required onchange="updateFullName()"><br>
            </div>
            <div>
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" required onchange="updateFullName()"><br>
            </div>
            <div>
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" readonly="/readonly"><br />
            </div>
            <div><input type="file" name="image"></div>
            <div>
                <textarea name="sub-mark" id="sub-mark" cols="30" rows="10">
                </textarea>
                <br>
                Enter subject and marks in this format --> Subject|Marks
            </div>
            <div>
                <label for="phone">Phone No</label>
                <input type="text" id="phone" name="phone" value="+91" pattern="^\+91\d{10}$">
            </div>
            <input type="submit">
            <br />
            <!-- php file included -->
            <?php include("task4.php"); ?>
        </form>
        <!-- form ended -->
    </body>
    <!-- scirpt included -->
    <script type="text/javascript" src="index.js"></script>

    </html>