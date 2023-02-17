<?php
//$my_file=fopen('Doc_file/Kartik_Khandelwal.doc','w') or die('Unable to op3en file!');
//fwrite($my_file,'Kartik');
//fclose($my_file);
//echo "<a download='Kartik_Khandelwal' href='Doc_file/Kartik_Khandelwal.doc'>Click here to download all information</a>";
?> 
 <?php
/* $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile); */
?> 
<?php
/* function subject_marks(){
        $sub_mark = explode("\n", $this->marks);
        $mark_arr=array();
        foreach ($sub_mark as $value) {
            $sub = explode('|', $value)[0];
            $mark = explode('|', $value)[1];
            $mark_arr[$sub]=$mark;
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

        foreach ($this->subject_marks() as $sub=>$mark) {

            echo "<tr><td>$sub</td><td>$mark</td></tr>";
        }
        echo "</table>";
    } */
?>
