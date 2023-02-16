<?php
/* student class created */
class student{

        public $fname,$lname,$fullname,$img,$img_temp,$marks;

        function __construct($first,$last,$img_name,$img_t,$mark_area){
            $this->fname = $first;
            $this->lname = $last;
            $this->fullname = $this->fname .' '. $this->lname;
            $this->img=$img_name;
            $this->img_temp=$img_t;
            $this->marks=$mark_area;
        }

        function message(){ //name related message
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
        function mark_table(){//mark table generator
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


