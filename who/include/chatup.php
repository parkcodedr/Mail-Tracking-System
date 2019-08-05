<?php
require('autoload.php');
 global $con; 
header('Content-Type: text/event-stream; charset=utf-8');
header("Cache-Control: no-cache");
header("Connection: keep-alive");

$transid =clean($_GET['funny']);
$zero = 0;
$one =1;
$query="SELECT * FROM message WHERE trans_id ='$transid' AND whosent =  'staff' AND reader =  '$zero'";
$ri = mysqli_query($con, $query);
$morning = '';
if ($ri->num_rows > 0) {

$lastId = 0;

 while ($row = mysqli_fetch_array($ri)) {
  $lastId++;

      $th = "SELECT transaction.office_id as officeid, mail.sender_name as sendersname  FROM ((transaction INNER JOIN route ON transaction.route_id = route.route_id) INNER JOIN mail ON mail.mail_id = route.mail_id) WHERE transaction.trans_id = '$transid'";
      $ritual = mysqli_query($con, $th);
      $gas = mysqli_fetch_array($ritual);

  

      $time = $row['message_date']." ".$row['message_time'];
      $usedt = time_elapsed_string( $time, $full = false);


if ( $row['whosent'] == 'sender' ) {
$name = $gas['sendersname'];
$nametime ='<div class=""><small class=" text-muted"><span class="glyphicon glyphicon-time"></span>'.$usedt .'</small><strong class="pull-right primary-font">'.$name.'</strong></div>';
$img = '<li class="right clearfix"><span class="chat-img pull-right"> <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />';
}else{
if ($row['reader'] == 0) {
$message_id = $row['message_id'];
$askread = "UPDATE message SET reader = '$one' WHERE(message_id ='$message_id')";
$iveread = $con->query($askread) or die($con->error) ;
}
$name = return_value('office', $gas['officeid'],'office_id', 'office_name'). "'s office";
$nametime ='<div class=""><strong class="primary-font">'.$name.'</strong> <small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>'.$usedt .'</small> </div>';
$img = '<li class="left clearfix"><span class="chat-img pull-left"> <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />';
}
$morning .= $img;
$morning .=' </span>';
$morning .=' <div class="chat-body clearfix">';
$morning .=$nametime;
$morning .= '<p>'.$row['message_body'] .' <small id="sent"> <i class="glyphicon glyphicon-ok"> </i>  </small>  </p> </div> </li>';
}
sendMessage($lastId, $morning);
sleep(0); 
}



function sendMessage($lastId, $morning) {
echo "id: $lastId\n";
echo "data: $morning\n\n";
flush();
ob_flush();
}
?>

