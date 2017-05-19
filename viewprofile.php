
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>view profile</title>
<style>
.first{
	border:1px solid #BF9E9F;
}
.second
{ 
}
</style>
</head>
<body>
<?php
include('connection.php');
session_start();
$roll=$_SESSION['SESS_FIRST_NAME'];
//$sql = "SELECT * FROM 'member' where roll_no=roll";
$result=mysqli_query($bd,"SELECT * FROM member WHERE roll_no='$roll'");
$row = mysqli_fetch_assoc($result);
echo'<table class="first"><tr></tr>';
      echo "<tr><td class>".$row["roll_no"]."</td><td>".$row["fname"]." ".$row["lname"]."</td><td>".$row["college"]."</td><td>".$row["stream"]."</td><td>".$row["semester"]."</td></tr>";;
	  echo'</table>';	
?>
</body>
</html>
