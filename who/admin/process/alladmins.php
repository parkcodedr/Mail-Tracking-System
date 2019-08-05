<?php

require('../../include/autoload.php');
 global $con;

 //ADD nEW admin
 if (isset($_POST['realad'])) {
 	 $name =clean($_POST['name']);
	 $description =clean($_POST['realad']);
	 $email =clean($_POST['email']);
	 $phone =clean($_POST['phone']);
	 $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	 $office=clean($_POST['office']);
	 $post = 'admin';

	 $query = "INSERT into officers VALUES(NULL, '".$office."', '".$phone."', '".$email."', '".$post."', '".$name."', '".$description."', '".$password."')";
      $result1 = $con->query($query) or die($con->error) ;
      if ( $con->affected_rows > 0) {
      	echo "great";
      }else{
      	echo "Sorry your New Admin Registration was unsuccessful, Try again";
      }

	 
 }

//ADD nEW office
 if (isset($_POST['realoffice'])) {
 	 $name =clean($_POST['name']);
	 $description =clean($_POST['realoffice']);
	 
	 $dept_id = '1';

	 $query = "INSERT into office VALUES(NULL, '".$name."', '".$dept_id."', '".$description."')";
      $result1 = $con->query($query) or die($con->error) ;
      if ($result1 == TRUE ) {
      	echo "great";
      }else{
      	echo "Sorry your New office Registration was unsuccessful, Try again";
      }

	 
 }


//ADD nEW department
 if (isset($_POST['deptadd'])) {
 	 $name =clean($_POST['name']);
	 $description =clean($_POST['deptadd']);

	 $faculty =clean($_POST['faculty']);
	 


	 $query = "INSERT into department VALUES(NULL, '".$name."', '".$faculty."', '".$description."')";
      $result1 = $con->query($query) or die($con->error) ;
      if ($result1 == TRUE ) {
      	echo "great";
      }else{
      	echo "Sorry your New office Registration was unsuccessful, Try again";
      }

	 
 }


//ADD nEW Faculty
 if (isset($_POST['facadd'])) {
 	 $name =clean($_POST['name']);
	 $description =clean($_POST['facadd']);

	 $query = "INSERT into faculty VALUES(NULL, '".$name."', '".$description."')";
      $result1 = $con->query($query) or die($con->error) ;
      if ($result1 == TRUE ) {
      	echo "great";
      }else{
      	echo "Sorry your New office Registration was unsuccessful, Try again";
      }

	 
 }

//ADD nEW sTAFF
  if (isset($_POST['realstaff'])) {
 	 $name =clean($_POST['name']);
	 $description =clean($_POST['realstaff']);
	 $email =clean($_POST['email']);
	 $phone =clean($_POST['phone']);
	 $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	 $office=clean($_POST['office']);
	 $post = 'staff';

	 $query = "INSERT into officers VALUES(NULL, '".$office."', '".$phone."', '".$email."', '".$post."', '".$name."', '".$description."', '".$password."')";
      $result1 = $con->query($query) or die($con->error) ;
      if ( $result1 == TRUE) {
      	echo "great";
      }else{
      	echo "Sorry your New Admin Registration was unsuccessful, Try again";
      }

	 
 }

//echo password_hash('mrincredible', PASSWORD_DEFAULT);
?>