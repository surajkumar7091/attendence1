<?php

session_start();
include('connection.php');
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$confirm=$_POST['confirm'];
$roll_no=$_POST['roll_no'];
$password=$_POST['password'];
$college=$_POST['college'];
$stream=$_POST['stream'];
$semester=$_POST['semester'];
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$fp= @fopen($tmpName,'r');
$content = @fread($fp, $fileSize);
$content = addslashes($content);
@fclose($fp);
if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}

/*$bd=mysqli_connect("localhost","root","","simple_login");*/
$check="SELECT * FROM member WHERE roll_no = '$_POST[roll_no]'";
$rs = mysqli_query($bd,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
if($data[0]>1) {
    echo "User Already in Exists with this roll_no <br/>";
} 
else
{
   mysqli_query($bd, "INSERT INTO member(fname, lname, confirm,roll_no,password,college,stream, semester,name,size,type,content)VALUES('$fname','$lname', '$confirm', '$roll_no', '$password', '$college', '$stream', '$semester','$fileName', '$fileSize', '$fileType', '$content')");
        echo "You are now registered<br/>";
		}
 
mysqli_close($bd);
?>