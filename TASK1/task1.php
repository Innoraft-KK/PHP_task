<?php
/* student class created */
class student{

    public $fname,$lname,$fullname;
    function __construct($first,$last){
        $this->fname = $first;
        $this->lname = $last;
        $this->fullname = $this->fname .' '. $this->lname;
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
}
/* student object initiated if first and last name are entered*/
if(isset($_POST['first_name']) and isset($_POST['last_name'])){
    $f = $_POST['first_name'];
    $l = $_POST['last_name'];
    $stud = new student($f,$l);
    $stud->message();
}
?>
