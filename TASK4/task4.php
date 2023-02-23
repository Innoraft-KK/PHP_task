<?php
/* student class created */
class student
{

    public $fname, $lname, $fullname, $img, $img_temp, $marks,$contact;
    /**
    * Constructor method for the student class.
    *
    * @param string $first First name of the student.
    * @param string $last Last name of the student.
    * @param string $img_name Image name of the student.
    * @param string $img_t Image temporary location of the student.
    * @param string $mark_area Marks obtained by the student.
    * @param string $p_no Contact number of the student.
    */
    function __construct($first, $last, $img_name, $img_t, $mark_area,$p_no)
    {
        $this->fname = $first;
        $this->lname = $last;
        $this->fullname = $this->fname . ' ' . $this->lname;
        $this->img = $img_name;
        $this->img_temp = $img_t;
        $this->marks = $mark_area;
        $this->contact = $p_no;
    }
    /**
    * Method to display a message based on the student's name.
    */
    function message(){ 
        if (!preg_match('/^[a-zA-Z]+$/', $this->fname)) {
            echo "Invalid Input in First Name \n";
        } elseif (!preg_match('/^[a-zA-Z]+$/', $this->lname)) {
            echo "Invalid Input in Last Name \n";
        } else {
            echo "Hello " . $this->fullname;
        }
    }
    /**
    * Method to display a message and upload the student's image.
    */
    function img_msg()
    { //image related message
        echo(move_uploaded_file($this->img_temp, "upload-images/" . $this->img));
        if (move_uploaded_file($this->img_temp, "upload-images/" . $this->img)) {
            echo "<br> Successfully uploaded";
            echo "<img src='./upload-images/" . $this->img . "'>";
        } else {
            echo "<br> Could not upload the file";
        }
    }
    /**
     * Method to generate a mark table.
     */
    function mark_table()
    { //mark table generator
        $sub_mark = explode("\n", $this->marks);
        echo "<table border=1>
                    <tr>
                        <th>Subject</th>
                        <th>Marks</th>
                    </tr>";

        foreach ($sub_mark as $value) {
            $sub = explode('|', $value)[0];
            $mark = explode('|', $value)[1];
            echo "<tr><td>$sub</td><td>$mark</td></tr>";
        }
        echo "</table>";
    }
    /**
     * Method to display the contact number of the student
    */
    function display_contact(){
        echo 'Phone no :'. $this->contact;
    }
}
/* Student object initiated if first and last name are entered */
if (!empty($_POST['first_name']) and !empty($_POST['last_name'])) {
    $f = $_POST['first_name'];
    $l = $_POST['last_name'];
    $mark = $_POST['sub-mark'];
    $img_n = $_FILES['image']['name'];
    $img_tmp = $_FILES['image']['tmp_name'];
    $phone_no=$_POST['phone'];
    $stud = new student($f, $l, $img_n, $img_tmp, $mark,$phone_no);
    if (isset($_FILES["image"])) {

        $stud->message();
        $stud->img_msg();
    } else {
        $img_n = null;
        $img_tmp = null;
        $stud->message();
    }
    if (!empty($_POST['sub-mark'])) {
        $stud->mark_table();
    }
    if(isset($phone_no)){
        $stud->display_contact();
    }
}
?>
