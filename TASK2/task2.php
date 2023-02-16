<?php
/* student class created */
class student{

        public $fname,$lname,$fullname,$img,$img_temp;

        function __construct($first,$last,$img_name,$img_t){
            $this->fname = $first;
            $this->lname = $last;
            $this->fullname = $this->fname .' '. $this->lname;
            $this->img=$img_name;
            $this->img_temp=$img_t;
        }

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

        function img_msg(){//image related message
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


