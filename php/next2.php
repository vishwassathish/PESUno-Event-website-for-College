<HTML>
<?php
		 
		 require_once 'Login.html';  
		 $conn = new mysqli("localhost", "root", "", "student");
		 if ($conn->connect_error) die($conn->connect_error);
		
		 if (isset($_POST['usn'])  
			 &&      isset($_POST['name'])   
		 &&      isset($_POST['pswd']) &&    
		 isset($_POST['emailid'])     &&    
		 isset($_POST['gender'])) 
			 {    
		 $usn   = get_post($conn, 'usn'); 
		 $name    = get_post($conn, 'name');   
		 $pswd = get_post($conn, 'pswd'); 
		 $emailid    = get_post($conn, 'emailid');   
		 $gender     = get_post($conn, 'gender');   
		 $query    = "INSERT INTO stud VALUES" .      "('$usn', '$name', '$pswd', '$emailid', '$gender')"; 
		 $result   = $conn->query($query);   
		 if (!$result) 
			 echo "INSERT failed: $query<br>" .  $conn->error . "<br><br>"; 
		 else
			 header("Location:pro6.html");
		 }
          $result->close();
		  $conn->close();
         function get_post($conn, $var) 
		 {   
		 return $conn->real_escape_string($_POST[$var]);  
		 } 
		?>
</HTML>		