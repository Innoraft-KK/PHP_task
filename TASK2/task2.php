<?php
/**
 * A class representing a student.
 */
class student{

         /**
     * The student's first name.
     *
     * @var string
     */
    public $fname;

    /**
     * The student's last name.
     *
     * @var string
     */
    public $lname;

    /**
     * The student's full name.
     *
     * @var string
     */
    public $fullname;
     /**
     * The name of the student's image file.
     *
     * @var string
     */
    public $img;

    /**
     * The temporary location of the student's image file.
     *
     * @var string
     */
    public $img_temp;
     /**
     * Creates a new instance of the student class.
     *
     * @param string $first The student's first name.
     * @param string $last The student's last name.
     * @param string $img_name The name of the student's image file.
     * @param string $img_t The temporary location of the student's image file.
     * 
     * @return void
     */
        function __construct($first,$last,$img_name,$img_t){
            $this->fname = $first;
            $this->lname = $last;
            $this->fullname = $this->fname .' '. $this->lname;
            $this->img=$img_name;
            $this->img_temp=$img_t;
        }
         /**
     * Outputs a message related to the student's name.
     * 
     * @return void
     */
        function message(){//name related message
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
     * Outputs a message related to the student's image file and moves the file to a specified directory.
     *
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
    }
/* student object initiated if first and last name are entered*/
if(isset($_POST['first_name']) and isset($_POST['last_name'])){
    $f = $_POST['first_name'];
    $l = $_POST['last_name'];
    $img_n=$_FILES['image']['name'];
    $img_tmp=$_FILES['image']['tmp_name'];
    $stud = new student($f,$l,$img_n,$img_tmp);
    if(isset($_FILES["image"])){
       
        $stud->message();
        $stud->img_msg();
        
    }
    else{
        $img_n=null;
        $img_tmp=null;
        $stud->message();
    }
}
?>


