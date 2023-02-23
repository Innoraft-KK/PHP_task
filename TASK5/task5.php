<?php
/**
 * Represents a student with a first name, last name, image, marks, and contact information.
 */
class student
{

    /**
     * @var string The student's first name.
     */
    public $fname;

    /**
     * @var string The student's last name.
     */
    public $lname;

    /**
     * @var string The student's full name.
     */
    public $fullname;

    /**
     * @var string The name of the student's image file.
     */
    public $img;

    /**
     * @var string The temporary location of the student's image file.
     */
    public $img_temp;

    /**
     * @var string The student's marks in each subject, separated by newlines and pipe symbols.
     */
    public $marks;

    /**
     * @var string The student's contact phone number.
     */
    public $contact;

    /**
     * @var string The student's email address.
     */
    public $email;

    /**
     * Creates a new student with the given information.
     *
     * @param string $first The student's first name.
     * @param string $last The student's last name.
     * @param string $img_name The name of the student's image file.
     * @param string $img_t The temporary location of the student's image file.
     * @param string $mark_area The student's marks in each subject, separated by newlines and pipe symbols.
     * @param string $p_no The student's contact phone number.
     * @param string $eMail The student's email address.
     */

    function __construct($first, $last, $img_name, $img_t, $mark_area,$p_no,$eMail)
    {
        $this->fname = $first;
        $this->lname = $last;
        $this->fullname = $this->fname . ' ' . $this->lname;
        $this->img = $img_name;
        $this->img_temp = $img_t;
        $this->marks = $mark_area;
        $this->contact = $p_no;
        $this->email=$eMail;
    }
    /**
     * Displays a message that includes the student's full name.
     */
    function message()
    { //name related message
        if (!preg_match('/^[a-zA-Z]+$/', $this->fname)) {
            echo "Invalid Input in First Name \n";
        } elseif (!preg_match('/^[a-zA-Z]+$/', $this->lname)) {
            echo "Invalid Input in Last Name \n";
        } else {
            echo "Hello " . $this->fullname;
        }
    }
     /**
     * Displays a message indicating whether the student's image was successfully uploaded.
     * If successful, also displays the uploaded image.
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
     * Generates an HTML table displaying the student's marks in each subject.
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
     * Displays the phone number of the student.
     */
    function display_contact(){
        echo 'Phone no :'. $this->contact;
        echo "<br>";
    }
     /**
     * Validates the email of the student using an external API.
     */
    function validate_email(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=$this->email",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: text/plain",
            "apikey: xN6Jui1sQyIFRpLwt23pzaCFIPuJWOtc"
          ),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET"
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        // echo $response;
        // Decode JSON response:
        $validationResult = json_decode($response, true);
        if ($validationResult['format_valid'] && $validationResult['smtp_check']) {
            echo "Email is valid: ".$this->email;
        } else {
            echo "Email is not valid: ".$this->email;
        }   
    }
}
/* student object initiated */
if (!empty($_POST['first_name']) and !empty($_POST['last_name'])) {
    $f = $_POST['first_name'];
    $l = $_POST['last_name'];
    $mark = $_POST['sub-mark'];
    $img_n = $_FILES['image']['name'];
    $img_tmp = $_FILES['image']['tmp_name'];
    $phone_no=$_POST['phone'];
    $eMail=$_POST['email'];
    $stud = new student($f, $l, $img_n, $img_tmp, $mark,$phone_no,$eMail);
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
    if(isset($_POST['email']))
    {$stud->validate_email();}
   
}
?>
