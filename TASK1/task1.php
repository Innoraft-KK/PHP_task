<?php
/**
 * Represents a student with a first name, last name, and full name.
 */
class student{

    /**
     * @var string $fname The first name of the student.
     */
    public $fname;

    /**
     * @var string $lname The last name of the student.
     */
    public $lname;

    /**
     * @var string $fullname The full name of the student, consisting of the first and last names.
     */
    public $fullname;

    /**
     * Constructs a new instance of the student class with the given first and last names.
     *
     * @param string $first The first name of the student.
     * @param string $last The last name of the student.
     */
    function __construct($first,$last){
        $this->fname = $first;
        $this->lname = $last;
        $this->fullname = $this->fname .' '. $this->lname;
    }
     /**
     * Outputs a message containing the full name of the student, or an error message if the first or last name is invalid.
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
}
/**
 * Creates a new instance of the student class and outputs a message if valid first and last names are provided via POST.
 */
if(isset($_POST['first_name']) and isset($_POST['last_name'])){
    $f = $_POST['first_name'];
    $l = $_POST['last_name'];
    $stud = new student($f,$l);
    $stud->message();
}
?>
