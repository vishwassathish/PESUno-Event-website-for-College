<html>
		<?php
		
		require_once 'pro6.html'; 
		 $conn = new mysqli("localhost", "root", "", "student");
		 if ($conn->connect_error) die($conn->connect_error);
		
		 if (isset($_POST['usn'])&&      
		 isset($_POST['name'])&&      
		 isset($_POST['pswd'])&&      
		 isset($_POST['emailid'])&&      
		 isset($_POST['gender'])) 
			 {    
		 $usn   = get_post($conn, 'usn'); 
	   
		 $pswd = get_post($conn, 'pswd'); 
		   
		  $query  = 'SELECT * FROM stud ';

         $result = $conn->query($query); 
		 if (!$result) die ("Database access failed: " . $conn->error);
		 $rows = $result->num_rows;
		 //echo($rows);
		 for ($j = 0 ; $j < $rows ; ++$j)
		{   
		 //echo("hiiiii");
				$result->data_seek($j);
				$rows = $result->fetch_array(MYSQLI_NUM);
				
				if($rows[2]==$pswd && $rows[0]==$usn){
					header("Location:pro6.html");
			   }
		}
			
	    } 
         
         function get_post($conn, $var) 
		 {   
			return $conn->real_escape_string($_POST[$var]);  
		 } 
		?>
</html>	