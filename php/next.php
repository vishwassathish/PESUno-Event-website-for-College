<html>
	<?php
    session_start();
	extract($_POST);
	$conn = mysql_connect("localhost","root","");
    mysql_select_db('student');
	if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   $sql = "SELECT usn, pswd FROM stud where usn='$usn'"; 
   if($query_run = mysql_query($query) ) {
      $query_row=mysql_fetch_assoc($query_run);
	  $pass1=$query_row['pswd'];
	  echo $pass1;
   }
   else{
	   echo mysql_error();
   }
   if($pass1==$password){
	   $_SESSION['$usn']=$usn;
  header('Location:pro6.html');
   }
   else{
	header('Location:signIn.php');
   }
 ?>
 </html>
 