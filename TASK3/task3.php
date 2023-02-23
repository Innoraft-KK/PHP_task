<?php
/**
 * Represents a student with a first name, last name, image, and marks.
 */
class student{

        /** @var string $fname The student's first name. */
    public $fname;
    
    /** @var string $lname The student's last name. */
    public $lname;
    
    /** @var string $fullname The student's full name. */
    public $fullname;
    
    /** @var string $img The name of the student's image. */
    public $img;
    
    /** @var string $img_temp The temporary path of the student's image. */
    public $img_temp;
    
    /** @var string $marks The student's marks. */
    public $marks;
    
    /**
     * Initializes a new instance of the student class.
     *
     * @param string $first The student's first name.
     * @param string $last The student's last name.
     * @param string $img_name The name of the student's image.
     * @param string $img_t The temporary path of the student's image.
     * @param string $mark_area The student's marks.
     */
        
        function __construct($first,$last,$img_name,$img_t,$mark_area){
            $this->fname = $first;
            $this->lname = $last;
            $this->fullname = $this->fname .' '. $this->lname;
            $this->img=$img_name;
            $this->img_temp=$img_t;
            $this->marks=$mark_area;
        }
        /**
        * Displays a message related to the student's name.
        * @return void
        */
        function message(){ 
            if (!preg_match('/^[a-zA-Z]+$/', $this->fname)){
                echo "Invalid Input in First Name";
            } 
            elseif (!preg_match('/^[a-zA-Z]+$/', $this->lname)) {
                echo "Invalid Input in Last Name";
            }
            else {
                echo "Hello ".$this->fullname;
            }
        }
         /**
        * Displays a message related to the student's image.
        * @return void
        */
        function img_msg(){
                if(move_uploaded_file($this->img_temp,"upload-images/".$this->img)){
                    echo "<br> Successfully uploaded";
                    echo "<img src='./upload-images/".$this->img."'>";
                }
                else{
                    echo "Could not upload the file";
                }
            }
         /**
        * Displays a table of the student's marks.
        * @return void
        */
        function mark_table(){
            $sub_mark = explode("\n",$this->marks);
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
    }
/* student object initiated if first and last name are entered*/
if(isset($_POST['first_name']) and isset($_POST['last_name'])){
    $f = $_POST['first_name'];
    $l = $_POST['last_name'];
    $mark=$_POST['sub-mark'];
    $img_n=$_FILES['image']['name'];
    $img_tmp=$_FILES['image']['tmp_name'];

    $stud = new student($f,$l,$img_n,$img_tmp,$mark);
    if(isset($_FILES["image"])){
       
        $stud->message();
        $stud->img_msg();
        
    }
    else{ 
        $img_n=null;
        $img_tmp=null;
        $stud->message();
    }

    if(isset($_POST['sub-mark'])){
        $stud->mark_table();
    }
}
?>


