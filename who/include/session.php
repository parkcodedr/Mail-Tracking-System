<?php
function authenticate_user() { 
global $con;
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')
{		//check user level
    $query = "SELECT * from officers WHERE officers_id = '".$_SESSION['user_id']."'";
	$result = $con->query($query) or die($con->error);
	$num_rows = $result->num_rows;
	if($num_rows > 0) { 
		
}else  HEADER('LOCATION: ../index.php');
           
		
}else  HEADER('LOCATION: ../index.php');
}
?>