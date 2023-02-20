<?php
/* student class created */
class student
{

    public $fname, $lname, $fullname, $img, $img_temp, $marks, $contact, $email, $doc_loc;

    function __construct($first, $last, $img_name, $img_t, $mark_area, $p_no, $eMail)
    {
        $this->fname = $first;
        $this->lname = $last;
        $this->fullname = $this->fname . ' ' . $this->lname;
        $this->img = $img_name;
        $this->img_temp = $img_t;
        $this->marks = $mark_area;
        $this->contact = $p_no;
        $this->email = $eMail;
    }

    function message()
    { //name related message
        if (!preg_match('/^[a-zA-Z]+$/', $this->fname)) {
            echo "Invalid Input in First Name";
            echo "<br/>";
        } elseif (!preg_match('/^[a-zA-Z]+$/', $this->lname)) {
            echo "Invalid Input in Last Name";
            echo "<br/>";
        } else {
            echo "Hello " . $this->fullname;
            echo "<br/>";
        }
    }

    function img_msg()
    { //image related message
        echo (move_uploaded_file($this->img_temp, "upload-images/" . $this->img));
        if (move_uploaded_file($this->img_temp, "upload-images/" . $this->img)) {
            echo "Successfully uploaded";
            echo "<br/>";
            echo "<img src='./upload-images/" . $this->img . "'>";
        } else {
            echo "<br> Could not upload the file";
            echo "<br/>";
        }
    }
    function subject_marks()
    {
        $sub_mark = explode("\n", $this->marks);
        $mark_arr = array();
        foreach ($sub_mark as $value) {
            $sub = explode('|', $value)[0];
            $mark = explode('|', $value)[1];
            $mark_arr[$sub] = $mark;
        }
        return $mark_arr;
    }
    function mark_table()
    { //mark table generator
        //$sub_mark = explode("\n", $this->marks);
        echo "<table border=1>
                    <tr>
                        <th>Subject</th>
                        <th>Marks</th>
                    </tr>";

        foreach ($this->subject_marks() as $sub => $mark) {

            echo "<tr><td>$sub</td><td>$mark</td></tr>";
        }
        echo "</table>";
    }
    function display_contact()
    { //show phone number of student
        echo 'Phone no : ' . $this->contact;
        echo "<br/>";
    }

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
            echo "<br/>";
        } else {
            echo "Email is not valid: ".$this->email;
            echo "<br/>";
        }   
    }

    function create_Doc()
    {
        $doc_name = "Doc_file/" . $this->fname . "_" . $this->lname . ".doc";
        $my_file = fopen($doc_name, 'w') or die('Unable to open file!');
        $txt = "First Name :" . $this->fname."\n";
        fwrite($my_file, $txt);
        $txt =  "Last Name :" . $this->lname."\n";
        fwrite($my_file, $txt);
        $txt = "Full Name :" . $this->fname . " " . $this->lname."\n" ;
        fwrite($my_file, $txt);
        /* $txt= "<img src="./upload-images/" . $this->img . "">"
        fwrite($my_file,$txt); */
        $txt = "Phone No. :" . $this->contact."\n" ;
        fwrite($my_file, $txt);
        $txt = "Subject | Marks" ."\n";
        fwrite($my_file, $txt);
        foreach ($this->subject_marks() as $sub => $mark) {
            $txt = " ".$sub . " | " . $mark. "\n" ;
            fwrite($my_file, $txt);
        }
        $txt="\nEmail :" . $this->email;
        fwrite($my_file,$txt);
        fclose($my_file);
        echo "<a download=" . $this->fname . "_" . $this->lname . " href=" . $doc_name . ">Click here to download all information</a>";
    }
}
/* student object initiated if first and last name are entered*/
if (!empty($_POST['first_name']) and !empty($_POST['last_name'])) {
    $f = $_POST['first_name'];
    $l = $_POST['last_name'];
    $mark = $_POST['sub-mark'];
    $img_n = $_FILES['image']['name'];
    $img_tmp = $_FILES['image']['tmp_name'];
    $phone_no = $_POST['phone'];
    $eMail = $_POST['email'];
    $stud = new student($f, $l, $img_n, $img_tmp, $mark, $phone_no, $eMail);
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
    if (isset($phone_no)) {
        $stud->display_contact();
    }
    
    if(isset($eMail)){
        $stud->validate_email();
    }
    
    $stud->create_Doc();
}
