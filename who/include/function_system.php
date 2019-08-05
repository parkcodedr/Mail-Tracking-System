<?php
	/*This file have all functions to handle options.
	1) clean ()
	2) 
	3) 
	4) 
	5) 
	6) 
	7) 
	8) 
	*/
	function sms ($sender,$to,$message){

// initialize the curl resource
$jane = curl_init();

// set a single option...
//curl_setopt($ch, OPTION, $value);
$postData = array(
    'sender' => $sender,
    'to' => $to,
    'message' => $message,
    'type' => 0,
    'routing' => 4,
    'token' => 'yVtlGZFOWaYiZqXpeiv4X8QzFYHjglL4gF0HtXwwb3qrsawSeziY6aUW20NBHmBdhPihYoreIfnrlK63hcjvgbs7yNnW2HHrm8fV'
 
);
// ... or an array of options
curl_setopt_array($jane, array(
    CURLOPT_URL => 'https://smartsmssolutions.com/api/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData,
    
));
// execute
$output = curl_exec($jane);
$arrysms = explode("||",$output);
$status = $arrysms[0]; //Return 1000 if successful and 1001 if failure occurs.
return $status;
}
	  function clean($data) {
       //include('config.php');
      global $con;
        $data = stripslashes($data);
        $data = htmlentities( $data, ENT_QUOTES, 'utf-8' );
        $data = strip_tags($data);
        $data = mysqli_real_escape_string($con, $data);

        return $data;
  }

  function clean1($data) {
       //include('config.php');
      global $con;
        $data = stripslashes($data);
        $data = htmlentities( $data, ENT_QUOTES, 'utf-8' );
        $data = strip_tags($data);
        $data = mysqli_real_escape_string($con, $data);

        return $data;
  }


// echo formatMoney($row['amount'], true);
  function formatMoney($number, $fractional=false) {
          if ($fractional) {
            $number = sprintf('%.2f', $number);
          }
          while (true) {
            $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
            if ($replaced != $number) {
              $number = $replaced;
            } else {
              break;
            }
    } 
   return $number;
}



	function send_email_set($message, $mailto, $subject) { 
			//getting set email addresses from database.
			$from_email = get_option('email_from');
			$reply_to = get_option('email_to');
			
			$mailheaders = "From:".$from_email;
			$mailheaders .="Reply-To:".$reply_to;
			$from = $from_email;

			$headers = "FROM: ".$from;
					$semi_rand = md5(time());
					$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
			
					$headers .= "\nMIME-Version: 1.0\n" .
					"Content-Type: multipart/mixed;\n" .
					" boundary=\"{$mime_boundary}\"";
			
					$message .= "This is a multi-part message in MIME format.\n\n" .
					"--{$mime_boundary}\n" .
					"Content-Type:text/html; charset=\"iso-8859-1\"\n" .
					"Content-Transfer-Encoding: 7bit\n\n" .
					$message . "\n\n";
					@$message .= "--{$mime_boundary}\n" .
					"Content-Type: {$fileatt_type};\n" .
					" name=\"{$filename}\"\n" .
					"Content-Transfer-Encoding: base64\n\n" .
					mail($mailto, $subject, $message, $headers);
	}
	function send_email($message, $mailto, $subject) { 
			//getting set email addresses from database.
			$from_email = get_option('email_from');
			$reply_to = get_option('email_to');
			
			$mailheaders = "From:".$from_email;
			$mailheaders .="Reply-To:".$reply_to;
			$from = $from_email;

			$headers = "FROM: ".$from;
					$semi_rand = md5(time());
					$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
			
					$headers .= "\nMIME-Version: 1.0\n" .
					"Content-Type: multipart/mixed;\n" .
					" boundary=\"{$mime_boundary}\"";
			
					$message .= "This is a multi-part message in MIME format.\n\n" .
					"--{$mime_boundary}\n" .
					"Content-Type:text/html; charset=\"iso-8859-1\"\n" .
					"Content-Transfer-Encoding: 7bit\n\n" .
					$message . "\n\n";
					@$message .= "--{$mime_boundary}\n" .
					"Content-Type: {$fileatt_type};\n" .
					" name=\"{$filename}\"\n" .
					"Content-Transfer-Encoding: base64\n\n" .
					mail($mailto, $subject, $message, $headers);
	}
	
	
	function project_log($store_id, $store_log) { 
		global $db;
		$query = "INSERT into store_logs VALUES(NULL, '".date("Y-m-d H:i:s")."', '".$store_log."', '".$store_id."', '".$_SESSION['user_id']."')";
		$result = $db->query($query) or die($db->error);
	}
	
	function set_option($option_name, $option_value) {
			global $db;
			$query = "SELECT * from options WHERE option_name='".$option_name."'";
			$result = $db->query($query) or die($db->error);
			$num_rows = $result->num_rows;
			
			if($num_rows > 0) { 
				$query = "DELETE from options WHERE option_name='".$option_name."'";
				$result = $db->query($query) or die($db->error);
			}//This will delete record
			$query = "INSERT into options VALUES(NULL, '".$option_name."', '".$option_value."')";
			$result = $db->query($query) or die($db->error);
			//this function do not return anything!
	}//set option function ends here.
	


	function randomRef() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $code = array(); 
    $alphaLength = strlen($alphabet) - 1; 
    for ($i = 0; $i < 6; $i++) {
        $n = rand(0, $alphaLength);
        $code[] = $alphabet[$n];
    }
    return implode($code);
	}


	function randomActivate() {
    $alphabet = "ABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); 
    $alphaLength = strlen($alphabet) - 1; 
    for ($i = 0; $i < 7; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
	}
	
	function get_client_ip() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
	
	function time_elapsed_string($datetime, $full = false){
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago); 

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hr',
        'i' => 'min',
        's' => 'sec',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}