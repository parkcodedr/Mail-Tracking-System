<?php
header("Connection: keep-alive"); 
header("Content-Type: text/event-stream");
header("Cache-Control: no-cache");
require('autoload.php');
 global $con; 
 if (isset($_GET['funny'])) {
 	# code...
$transid =clean($_GET['funny']);
$zero = 0;
$one =1;
$query="SELECT * FROM message WHERE trans_id ='$transid' AND whosent =  'sender' AND reader =  '$zero'";
$ri = mysqli_query($con, $query);
$morning = '';
if ($ri->num_rows > 0) {

$lastId = 0;

 while ($row = mysqli_fetch_array($ri)) {
  $lastId++;
      $time = $row['message_date']." ".$row['message_time'];
      $usedt = time_elapsed_string( $time, $full = false);


if ( $row['whosent'] == 'staff' ) {
$image = '<li><img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="img" class="img">';
        $message =  "<p class='ballon color1'>".$row['message_body']." &nbsp;  &nbsp; <i class='fa  fa-check-square-o'></i> &nbsp; &nbsp;   &nbsp;<i class='fa fa-clock-o'></i> &nbsp; <small style='color: red'><b>".$usedt."</b></small></p><br> </li>";
}else{
if ($row['reader'] == 0) {
$message_id = $row['message_id'];
$askread = "UPDATE message SET reader = '$one' WHERE(message_id ='$message_id')";
$iveread = $con->query($askread) or die($con->error) ;
}
 $image = '<li><img src="http://placehold.it/50/55C1E7/fff&text=U" alt="img" class="img">';
        $message =  "<p class='ballon color2'>".$row['message_body']." &nbsp;  &nbsp;  &nbsp;<i class='fa fa-clock-o'></i>  &nbsp; <small style='color: red'><b>".$usedt."</b></small></p><br> </li>";
}
$morning .= $image;
$morning .=$message;
echo "id: $lastId\n";
echo "data: $morning\n\n";
flush();
ob_flush();
}

sleep(0); 
}


}

?>

