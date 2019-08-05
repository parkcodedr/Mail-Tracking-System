<?php


 
function selectqueryrr($tables,$value,$name){
   global $con;
   $query="SELECT * FROM  $tables ";   
   $ri = mysqli_query($con, $query);
   $hi = '';
    while($row = mysqli_fetch_array($ri)){

    $hi .=' <option value="'.$row["$value"].'">  '.$row["$name"] .'</option>';
  }

  echo $hi;
      
}

function selectparcel($tables,$value,$name){
   global $con;
   $query="SELECT * FROM  $tables WHERE $value = '$name'";   
   $ri = mysqli_query($con, $query);
   $hi = '';
  if ($ri->num_rows > 0) {
   return TRUE;
  }else{
    return FALSE;
  }
      
}


function query_rows($tables, $user_id, $primary_key ){
   global $con;
  $sqls = "SELECT * FROM $tables WHERE $primary_key ='".$user_id."'";
            $result = $con->query($sqls) or die($con->error);
            $num_rows = $result->num_rows; 
            return $num_rows;

}

function active_exist($code) {
     global $con;
     $num_user = query_rows('mail', $code, 'tracking_code' );
     if($num_user > 0){
        $code = randomActivate();
        $tr_code = 'UNIUYO-'.$code;
        active_exist($tr_code);
     }
     
    return $code;
  }

  function return_value($tables, $user_id, $field, $rets){
  global $con;
   $query="SELECT * FROM  $tables WHERE $field ='".$user_id."'";   
   $ri = mysqli_query($con, $query) or die($con->error);
    $row = mysqli_fetch_array($ri);
    return $row[$rets];
}

function return_single_valuerow($this_field, $tables, $where_clause, $condition){
  global $con;
   $query="SELECT $this_field FROM  $tables WHERE $where_clause ='".$condition."'";   
   $ri = mysqli_query($con, $query);
    $row = mysqli_fetch_array($ri);
    return $row;
}


  ////////////////List Mail Brief
  
  function list_mail($office_id) {
    global $con;
    $zero = '0';
    $one = '1';
    $three = '3';

     $th = "SELECT  mail.sender_name as mailowner,  mail.sender_email as emailowner,transaction.from_office as from_office,mail.mail_type as mail_type, mail.subject as subject, transaction.status as mailstatus  FROM ((transaction INNER JOIN route ON transaction.route_id = route.route_id) INNER JOIN mail ON mail.mail_id = route.mail_id) WHERE transaction.office_id = '$office_id'" ;
    $rth = $con->query($th) or die($con->error);
  //$rt = $rth->fetch_array();
    $content = '';
      $count = 0;
    while($row = $rth->fetch_array()) {
        extract($row);
        $count++;
        if($count%2 == 0) { 
          $class = 'even';
        } else { 
          $class = 'odd';
        }
        if ($mail_type == 'soft') {
          $typeem = 'Electronic- Mail';
        }else{
          $typeem = 'Hard- Mail';
        }
        if ($mailstatus == 0) {
         $state = 'Un-Attended';
        }elseif($mailstatus == 1) {
         $state = 'Attended';
        }
        $content .= '<tr>';
        $content .= '<td class="text-center"> '.$count.'</td>';
        $content .= ' <td> <b>'.$mailowner.'</b></td>';
        $content .= '<td>'.$emailowner.'</td>';
        $content .= '<td>'.return_value('office', $from_office, 'office_id',  'office_name').'</td>';
        $content .= '<td>'.$typeem.'</td>';
        $content .= ' <td>'.$subject.'</td>';     
        $content .= '<td>'. $state.'</td>';
        $content .= '</tr>';
        unset($class);
    }//loop ends here.

    if ($content == '') {
      $content .= '<tr rowspan= "4">';
        $content .= '<td colspan="7" >';
        $content .= 'You Have No mail Yet resolved to your office, Once you have one: the details will be shown here.';
        $content .= '</td></tr>';
    }
     echo $content;
  }



    function list_unreademails($office_id) {
    global $con;
    $zero = '0';
    $one = '1';
    $three = '3';
    global $igwe;




     $th = "SELECT  mail.mail_id as mail_id,  mail.class_of_sender as mailclass,  transaction.trans_id as trans_id, route.route_id as route_id,mail.mail_type as mail_type, mail.subject as subject, mail.sender_name as sender_name , mail.date_sent as date_sent FROM ((transaction INNER JOIN route ON transaction.route_id = route.route_id) INNER JOIN mail ON mail.mail_id = route.mail_id) WHERE transaction.office_id = '$office_id' AND transaction.status = '0' AND mail.mail_type = 'soft'" ;
    $rth = $con->query($th) or die($con->error);
  //$rt = $rth->fetch_array(); 
    if ($rth->num_rows > 0) {
       $igwe = TRUE;
    }else{
      $igwe = FALSE;
    }
    $content = '';
      $count = 0;
    while($row = $rth->fetch_array()) {
        extract($row);
        $count++;
        if($count%2 == 0) { 
          $class = 'even';
        } else { 
          $class = 'odd';
        }
        if ($mailclass == 'Student') {
          $img = 'profileimg.png';
        }elseif ($mailclass == 'Staff') {
          $img = 'profileimg4.png';
        }elseif ($mailclass == 'Visitor') {
          $img = 'profileimg5.png';
        }
       
        $content .= '<li class="champ">';
        $content .= ' <a href="include/runthings.php?mailid='.$mail_id.'&transid='.$trans_id.'&routeid='.$route_id.'" class="item clearfix">'; 
        $content .= '<img src="img/'.$img.'" alt="img" class="img">';
        $content .= '<span class="from">'.$sender_name.'</span>';
        $content .=  $subject;
        $content .= ' <span class="date">'.$date_sent.'</span> </a>';
        $content .= '</li>';
        unset($class);
    }//loop ends here.

    if ($content == '') {
     $content .= '<li>';
        $content .= ' <a href="#" class="item clearfix">';
        $content .= '<img src="img/profileimg6.png" alt="img" class="img">';
        $content .= '<span class="from"> Sytem BOT</span>';
        $content .=  'Dear Staff, You Have no new Mails to attend to today, Do Have a great Day';
        $content .= ' <span class="date">'.date('d-m-Y').'</span> </a>';
        $content .= '</li>';
    }
     echo $content;
  }



  function list_allmessages($office_id) {
    global $con;
    $zero = '0';
    $one = '1';
    $three = '3';
    global $igwe;


     $th = "SELECT mail.mail_id as mail_id,  mail.class_of_sender as mailclass,  transaction.trans_id as trans_id, route.route_id as route_id, mail.mail_type as mail_type, mail.subject as subject, mail.sender_name as sender_name , mail.date_sent as date_sent, message.message_date as message_date, message.message_time as  message_time,  message.message_id as  message_id FROM ((transaction INNER JOIN route ON transaction.route_id = route.route_id) INNER JOIN mail ON mail.mail_id = route.mail_id) INNER JOIN message ON message.trans_id = transaction.trans_id WHERE transaction.office_id = '$office_id' GROUP BY  mail.mail_id" ;
    $rth = $con->query($th) or die($con->error);
  //$rt = $rth->fetch_array(); 
    if ($rth->num_rows > 0) {
       $igwe = TRUE;
    }else{
      $igwe = FALSE;
    }

   
    $content = '';
      $count = 0;
    while($row = $rth->fetch_array()) {
        extract($row);
         $time = $message_date." ".$message_time;
        $count++;
        if($count%2 == 0) { 
          $class = 'even';
        } else { 
          $class = 'odd';
        }
        if ($mailclass == 'Student') {
          $img = 'profileimg.png';
        }elseif ($mailclass == 'Staff') {
          $img = 'http://placehold.it/50/55C1E7/fff&text=U';
        }elseif ($mailclass == 'Visitor') {
          $img = 'http://placehold.it/50/55C1E7/fff&text=U';
        }
       
        $content .= '<li class="champ">';
        $content .= ' <a href="include/runthings.php?messagemeid='.$message_id.'&transid='.$trans_id.'&routeid='.$route_id.'&sender_name='.$sender_name.'&mailclass='.$mailclass.'" class="item clearfix">';
        $content .= '<img src="'.$img.'" alt="img" class="img">';
        $content .= '<span class="from">'.$sender_name.'</span>';
        $content .=  $subject;
        $content .= ' <span class="date">'.time_elapsed_string( $time, $full = false).'</span> </a>';
        $content .= '</li>';
        unset($class);
    }//loop ends here.

    if ($content == '') {
     $content .= '<li>';
        $content .= ' <a href="#" class="item clearfix">';
        $content .= '<img src="img/profileimg6.png" alt="img" class="img">';
        $content .= '<span class="from"> Sytem BOT</span>';
        $content .=  'Dear Staff, You Have no new Messages to attend to today, Do Have a great Day';
        $content .= ' <span class="date">'.date('d-m-Y').'</span> </a>';
        $content .= '</li>';
    }
     echo $content;
  }




    function list_unreadhardmails($office_id) {
    global $con;
    $zero = '0';
    $one = '1';
    $three = '3';
    global $igwe;




     $th = "SELECT  mail.mail_id as mail_id,  mail.class_of_sender as mailclass,  transaction.trans_id as trans_id, route.route_id as route_id,mail.mail_type as mail_type, mail.subject as subject, mail.sender_name as sender_name , mail.date_sent as date_sent FROM ((transaction INNER JOIN route ON transaction.route_id = route.route_id) INNER JOIN mail ON mail.mail_id = route.mail_id) WHERE transaction.office_id = '$office_id' AND transaction.status = '0' AND mail.mail_type = 'hard'" ;
    $rth = $con->query($th) or die($con->error);
  //$rt = $rth->fetch_array(); 
    if ($rth->num_rows > 0) {
       $igwe = TRUE;
    }else{
      $igwe = FALSE;
    }
    $content = '';
      $count = 0;
    while($row = $rth->fetch_array()) {
        extract($row);
        $count++;
        if($count%2 == 0) { 
          $class = 'even';
        } else { 
          $class = 'odd';
        }
        if ($mailclass == 'Student') {
          $img = 'profileimg.png';
        }elseif ($mailclass == 'Staff') {
          $img = 'profileimg4.png';
        }elseif ($mailclass == 'Visitor') {
          $img = 'profileimg5.png';
        }
       
        $content .= '<li class="champ">';
        $content .= ' <a href="include/runthings.php?mailid='.$mail_id.'&transid='.$trans_id.'&routeid='.$route_id.'" class="item clearfix">';
        $content .= '<img src="img/'.$img.'" alt="img" class="img">';
        $content .= '<span class="from">'.$sender_name.'</span>';
        $content .=  $subject;
        $content .= ' <span class="date">'.$date_sent.'</span> </a>';
        $content .= '</li>';
        unset($class);
    }//loop ends here.

    if ($content == '') {
     $content .= '<li>';
        $content .= ' <a href="#" class="item clearfix">';
        $content .= '<img src="img/profileimg6.png" alt="img" class="img">';
        $content .= '<span class="from"> Sytem BOT</span>';
        $content .=  'Dear Staff, You Have no new Mails to attend to today, Do Have a great Day';
        $content .= ' <span class="date">'.date('d-m-Y').'</span> </a>';
        $content .= '</li>';
    }
     echo $content;
  }


////////////////////////////////////


function showtrack($code){

   global $con;

  $sec = "SELECT * FROM mail INNER JOIN route ON mail.mail_id = route.mail_id WHERE mail.tracking_code = '$code'" ;
  $mr = $con->query($sec) or die($con->error);
  $mrs = $mr->fetch_array();
  if ($mrs['mail_type'] == 'soft') {
    $typeof = "E-Mail";
  }else{
    $typeof = "Hard Copy Mail";
  }

  if ($mrs['status'] == 0) {
    $state = "Processing ";
  }else{
    $state = " Attended To";
  }



  $th = "SELECT mail.sender_name as mailowner,  mail.sender_email as emailowner,transaction.from_office as from_office,transaction.office_id as office, mail.mail_type as mail_type, mail.subject as subject, transaction.status as mailstatus, transaction.trans_id as transid, route.status as routestatus  FROM ((transaction INNER JOIN route ON transaction.route_id = route.route_id) INNER JOIN mail ON mail.mail_id = route.mail_id) WHERE mail.tracking_code = '$code'";

  $rth = $con->query($th) or die($con->error);
  //$rt = $rth->fetch_array();
    $content = '';
      $count = 0;

     $upnepa ='<div class="content1-w3ls">
          <h2>Order Tracking: '.$code.' </h2>
        </div>
          <div class="content2-w3ls">
            <div class="content2-header1">
              <p>Mail Type : <span>'.$typeof.'</span></p>
            </div>
            <div class="content2-header1">
              <p>Status : <span>'.$state.'</span></p> 
            </div>
            <div class="content2-header1">
              <p>Mail Created on : <span>'.$mrs["date_sent"].'</span></p>
            </div>
            <div class="clear"></div>
      </div> <div class="content3-w3ls" ><div class="shipment" style="display: block">';

    $counted = $rth->num_rows;

    while($row = $rth->fetch_array()) {
     
      extract($row);
        $count++;

        if ($mailstatus == 0) {
          include'include/chat.php';
          $shoulder = 'dispatch';
          $line = " ";
          $image='<a href="#" onclick="showme(); return false;"><div class="imgcircle">
              <img src="images/process.png" alt="confirm order">
            </div> </a>' ;
        }else{
          $shoulder = 'confirm';
          if ($count == $counted) {
            $line = " ";
          }else{
            $line = "<span class=\"line\"></span>";
          }

        $image='<div class="imgcircle">
              <img src="images/delivery.png" alt="confirm order">
            </div> ' ;
          
        }

     $content .='<div class="'.$shoulder.'">
            '.$image.$line.'
            
            <p>'.return_value("office", $office, "office_id", "office_name").'</p>
          </div>';
        }


    $end = '<div class="clear"></div>
        </div>
      </div>
      <script src="js/jquery.min.js"></script>
<script src="who/js/bootstrap/bootstrap.min.js"></script>
      <script>

            </script>';


      echo $upnepa;
      echo $content;
      echo $end;

}




function subject($code){
    global $con;
  $sec = "SELECT * FROM mail INNER JOIN route ON mail.mail_id = route.mail_id WHERE mail.tracking_code = '$code'" ;
  $mr = $con->query($sec) or die($con->error);
  $mrs = $mr->fetch_array();


  $plan ='<p class="text-center wthree w3-agileits agileits-w3layouts agile w3-agile">Below is a report for your Mail with Subject <b>"'.ucwords($mrs["subject"]).'"</b></p>';
  echo $plan;
}



























function insert_p_matching($per_id, $gh_id, $matchdate, $timestart, $mk_timestart, $amt_to_matching, $status, $timestop, $datestop, $stopmktime, $gracemkstop, $confirmed, $hashcode, $extend) { 
        global $con;
        $query = "INSERT into p_matching VALUES(NULL, '".$per_id."', '".$gh_id."', '".$matchdate."', '".$timestart."', '".$mk_timestart."', '".$amt_to_matching."', '".$status."', '".$timestop."', '".$datestop."', '".$stopmktime."', '".$gracemkstop."', '".$confirmed."', '".$hashcode."', '".$extend."')";
        $result = $con->query($query) or die($con->error);

      if ($result == TRUE){ 
       return TRUE;
       }
        else{
        return FALSE;
        }
    }

//normal matching 
 function insert_matching($ph_id, $gh_id, $matchdate, $timestart, $mk_timestart, $amt_to_matching, $status, $timestop, $datestop, $stopmktime, $gracemkstop, $confirmed, $hashcode, $extend) { 
        global $con;
        $query = "INSERT into matching VALUES(NULL, '".$ph_id."', '".$gh_id."', '".$matchdate."', '".$timestart."', '".$mk_timestart."', '".$amt_to_matching."', '".$status."', '".$timestop."', '".$datestop."', '".$stopmktime."', '".$gracemkstop."', '".$confirmed."', '".$hashcode."', '".$extend."')";
        $result = $con->query($query) or die($con->error);

       if ($result){
       return TRUE;
       }
        else{
        return FALSE;
        }

    }
///////////////////

function update_GH_PH($gh_id, $gh_prog_check, $gh_remainder, $ph_id,  $progr_check,  $remainder)
 {
  global $con;
  
  $gh1 =mysqli_query($con, "UPDATE gh SET  progress_check = '$gh_prog_check', remainder= '$gh_remainder' WHERE(gh_id ='$gh_id')");

  $ph1 = mysqli_query($con, "UPDATE ph SET  progr_check = '$progr_check', remainder= '$remainder' WHERE(ph_id ='$ph_id')");
  if($gh1 == TRUE && $ph1 == TRUE){
    return TRUE;
  }
  else {
    return FALSE;
  }
}
////////////////////////////////////
function update_GH_per($gh_id, $gh_prog_check, $gh_remainder, $per_id,  $progr_check,  $remainder)
 {
  global $con;
  
  $gh1 =mysqli_query($con, "UPDATE gh SET  progress_check = '$gh_prog_check', remainder= '$gh_remainder' WHERE(gh_id ='$gh_id')");

  $ph1 = mysqli_query($con, "UPDATE percent SET  progr_check = '$progr_check', remainder= '$remainder' WHERE(per_id ='$per_id')");
  if($gh1 == TRUE && $ph1 == TRUE){
    return TRUE;
  }
  else {
    return FALSE;
  }
}

function query_active_ph($user_id){
   global $con;
   $zero ='0';
  $sqls = "SELECT * FROM ph WHERE user_id ='$user_id' AND status = '$zero'";
    $result = $con->query($sqls) or die($con->error);
     $num_rows = $result->num_rows; 
       return $num_rows;
}
function query_active_percent($user_id){
   global $con;
   $zero ='0';
   $one ='1';
  $sqls = "SELECT * FROM percent WHERE user_id ='$user_id' AND status = '$zero' AND ready = '$one'";
    $result = $con->query($sqls) or die($con->error);
     $num_rows = $result->num_rows; 
       return $num_rows;
}

function code_ref_exist($code) {
     global $con;
     $num_user = query_rows('users', $code, 'user_ref' );
     if($num_user > 0){
        $code = randomRef();
        code_ref_exist($code);
     }

    return $code;
  }


  function select_all($table, $where_clause, $condition){
   global $con;
   $sqls = "SELECT * FROM $table WHERE $where_clause ='$condition'";
            $result = $con->query($sqls);
            $rt = $result->fetch_array();
            return $rt;
  }


  function query_rows_activation($phone, $password){
   global $con;
 $one ='1';
  $sqls = "SELECT * FROM users WHERE phone ='$phone' AND password ='$password' AND active ='$one'";
            $result = $con->query($sqls) or die($con->error);
            $num_rows = $result->num_rows; 
            return $num_rows;
  }


  function query_rows_login($phone, $password){
    global $con;
  $sqls = "SELECT * FROM users WHERE phone ='".$phone."' AND password ='".$password."'";
            $result = $con->query($sqls) or die($con->error);
            $num_rows = $result->num_rows; 
            return $num_rows;
  }

  function query_rows_recover($phone){
    global $con;
  $sqls = "SELECT * FROM users WHERE phone ='".$phone."' ";
            $result = $con->query($sqls) or die($con->error);
            $num_rows = $result->num_rows; 
            return $num_rows;
  }

  function query_rows_recover_activation($phone){
   global $con;
 $one ='1';
  $sqls = "SELECT * FROM users WHERE phone ='$phone' AND active ='$one'";
            $result = $con->query($sqls) or die($con->error);
            $num_rows = $result->num_rows; 
            return $num_rows;
  }



function query_rows_ph($user_id, $phgh){
   global $con;
  $sqls = "SELECT * FROM matching WHERE $phgh ='".$user_id."' AND status = '0'";
            $result = $con->query($sqls) or die($con->error);
            //$num_rows = $result->num_rows; 
            return $result;
}



function return_single_value($this_field, $tables, $where_clause, $condition){
  global $con;
   $query="SELECT $this_field FROM  $tables WHERE $where_clause ='".$condition."'";   
   $ri = mysqli_query($con, $query);
    $row = mysqli_fetch_array($ri);
    return $row[$this_field];
}
function return_fullname($condition){
  global $con;
   $query="SELECT fname, lname FROM  users WHERE user_id ='".$condition."'";   
   $ri = mysqli_query($con, $query);
    $row = mysqli_fetch_array($ri);
    return $row['fname'].' '.$row['lname'];
}

function return_count($counts, $tables, $user_id, $field){
     global $con;
     $s = "SELECT COUNT($counts) as total FROM $tables WHERE $field = '".$user_id."'"; 
       $ri = mysqli_query($con,$s);
    $row = mysqli_fetch_array($ri);
    return $row['total'];
}
function update_profile_acc($bname, $acname, $acno, $actype, $user_id)
{
  global $con; 
  mysqli_query($con, "UPDATE users SET 
              bname ='$bname',
              acname ='$acname',
              acno   ='$acno',
              actype ='$actype'
          WHERE(user_id ='$user_id')");
}
//update checks

function update_query($tables, $set_field, $set_field_arg, $where_clause, $condition){
  global $con; 
  mysqli_query($con, "UPDATE $tables SET $set_field = '$set_field_arg' WHERE($where_clause ='$condition')");
}

function updatequery($tables, $user_id, $users_id, $field, $update_field){
  global $con;
  
  mysqli_query($con, "UPDATE $tables SET $field = '$update_field' WHERE( $user_id ='$users_id')");
}

  function update_query_ref($tables, $set_field, $set_field_arg, $where_clause, $condition){
  global $con; 
  $poll = mysqli_query($con, "UPDATE $tables SET $set_field = '$set_field_arg' WHERE($where_clause ='$condition')");
  return $poll;
}



////////////////transaction history
  
  function list_transaction($user_id) {
    global $con;

    $th = "SELECT ph.ph_id as ph_id, gh.gh_id as gh_id , matching.amount as amount FROM ((matching INNER JOIN gh ON matching.gh_id = gh.gh_id) INNER JOIN ph ON matching.ph_id = ph.ph_id) WHERE matching.confirmed = '1' AND  gh.user_id = '$user_id' OR ph.user_id = '$user_id'  LIMIT 10" ;
  $rth = $con->query($th) or die($con->error);
  //$rt = $rth->fetch_array();
    $content = '';
      $count = 0;
    while($row = $rth->fetch_array()) { 
        extract($row);
        $count++;
        if($count%2 == 0) { 
          $class = 'even';
        } else { 
          $class = 'odd';
        }

        $gh_user_id = return_value('gh', $gh_id, 'gh_id', 'user_id');
        $ph_user_id = return_value('ph', $ph_id, 'ph_id', 'user_id');
        $content .= '<tr class="'.$class.'">';
        $content .= '<td align="center">';
    
        $content .= return_fullname($ph_user_id);
        $content .= '</td><td align="center">';
        $content .= return_fullname($gh_user_id);
        $content .= '</td><td class="color-blue-grey" nowrap align="center"><span class="semibold">';
        $content .=formatMoney($amount, true);      
        $content .= '</span></td>';
        $content .= '</tr>';
       
    }//loop ends here.
    
    $th = "SELECT percent.per_id as ph_id, gh.gh_id as gh_id , p_matching.amount as amount FROM ((p_matching INNER JOIN gh ON p_matching.gh_id = gh.gh_id) INNER JOIN percent ON p_matching.ph_id = percent.per_id) WHERE p_matching.confirmed = '1' AND  gh.user_id = '$user_id' OR percent.user_id = '$user_id'  LIMIT 10" ;
    
     $rth = $con->query($th) or die($con->error);
  //$rt = $rth->fetch_array();
   
     
    while($row = $rth->fetch_array()) { 
        extract($row);
        $count++;
        if($count%2 == 0) { 
          $class = 'even';
        } else { 
          $class = 'odd';
        }

        $gh_user_id = return_value('gh', $gh_id, 'gh_id', 'user_id');
        $ph_user_id = return_value('percent', $ph_id, 'per_id', 'user_id');
        $content .= '<tr class="'.$class.'">';
        $content .= '<td align="center">';
        $content .= return_fullname($ph_user_id);
        $content .= '</td><td align="center">';
        $content .= return_fullname($gh_user_id);
        $content .= '</td><td class="color-blue-grey" nowrap align="center"><span class="semibold">';
        $content .=formatMoney($amount, true);      
        $content .= '</span></td>';
        $content .= '</tr>';
        unset($class);
    }//loop ends here.
     echo $content;
  } /// end here



////////////////Recent Casher's List
  
  function list_casher() {
    global $con;
    $zero = '0';
    $one = '1';
    $three = '3';

     $th = "SELECT  matching.amount, users.fname as name, users.phone as phone  FROM ((matching INNER JOIN gh ON matching.gh_id = gh.gh_id) INNER JOIN users ON gh.user_id = users.user_id) WHERE users.priv_id < '4' AND matching.confirmed = '1' AND users.suspended = '0' AND matching.amount > 3000 AND matching.amount < 300000 AND users.user_id != 791 group by users.user_id ORDER BY rand() LIMIT 20" ;
    $rth = $con->query($th) or die($con->error);
  //$rt = $rth->fetch_array();
    $content = '';
      $count = 0;
    while($row = $rth->fetch_array()) { 
        extract($row);
        $count++;
        if($count%2 == 0) { 
          $class = 'even';
        } else { 
          $class = 'odd';
        }
        $content .= '<tr class="'.$class.'">';
        $content .= '<td align="center">';
        $content .= $name;
        $content .= '</td><td align="center">';
        $content .= $phone;
        $content .= '</td><td class="color-blue-grey" nowrap align="center"><span class="semibold">';
        $content .=formatMoney($amount, true);      
        $content .= '</span></td>';
        $content .= '</tr>';
        unset($class);
    }//loop ends here.
     echo $content;
  } 

 

  

  function list_cashout($user_id) {
    global $con; 

    $th = "SELECT ph.ph_id as ph_id, matching.amount as amount, matching.matchdate as matchdate , matching.timestart as timestart FROM ((matching INNER JOIN gh ON matching.gh_id = gh.gh_id) INNER JOIN ph ON matching.ph_id = ph.ph_id) WHERE matching.confirmed = '1' AND  gh.user_id = '$user_id'" ;
  $rth = $con->query($th);
  //$rt = $rth->fetch_array();
  

  $content = '';
      $count = 0;
      $count1 = 0;
  if ($rth->num_rows>0) {
    

    while($row = $rth->fetch_array()) { 
        extract($row);
        $count++;
        
        $ph_user_id = return_value('ph', $ph_id, 'ph_id', 'user_id');
        $content .= '<tr>';
        $content .= '<td align="center">';
        $content .= return_fullname($ph_user_id);
        $content .= '</td><td align="center">₦';
        $content .= formatMoney($amount, true);
        $content .= '</td><td align="center">';
        $content .= $matchdate;      
        $content .= '</td>';
        $content .= '</td><td align="center">';
        $content .= $timestart;      
        $content .= '</td>';
        $content .= '</tr>';
    }//loop ends here.
     

  }

  $the = "SELECT percent.per_id as per_id, p_matching.amount as pamount, p_matching.matchdate as pmatchdate , p_matching.timestart as ptimestart FROM ((p_matching INNER JOIN gh ON p_matching.gh_id = gh.gh_id) INNER JOIN percent ON p_matching.ph_id = percent.per_id) WHERE p_matching.confirmed = '1' AND  gh.user_id = '$user_id'" ;
  $hi = $con->query($the);

   if ($hi->num_rows>0) {
    

    while($nkechi = $hi->fetch_array()) { 
        extract($nkechi);
        $count1++;
        
        $per_user_id = return_value('percent', $per_id, 'per_id', 'user_id');
        $content .= '<tr>';
        $content .= '<td align="center">';
        $content .= return_fullname($per_user_id);
        $content .= '</td><td align="center">₦';
        $content .= formatMoney($pamount, true);
        $content .= '</td><td align="center">';
        $content .= $pmatchdate;      
        $content .= '</td>';
        $content .= '</td><td align="center">';
        $content .= $ptimestart;      
        $content .= '</td>';
        $content .= '</tr>';
    }//loop ends here.
     

  }
  elseif($hi->num_rows < 0 || $rth->num_rows < 0){
      $content .= '<tr rowspan= "4">';
        $content .= '<td colspan="4" >';
        $content .= 'You have not made any withdrawal from this platform. Once you have any withdrawal record, It will definitely appear here!!!.';
        $content .= '</td></tr>';
  }
  echo $content;
} /// end here


function list_mydeposits($user_id) {
    global $con;

    $th = "SELECT gh.gh_id as gh_id, matching.amount as amount, matching.matchdate as matchdate , matching.timestart as timestart FROM ((matching INNER JOIN gh ON matching.gh_id = gh.gh_id) INNER JOIN ph ON matching.ph_id = ph.ph_id) WHERE matching.confirmed = '1' AND  ph.user_id = '$user_id'" ;

    
  $rth = $con->query($th);
  //$rt = $rth->fetch_array();
  $content = '';
      $count = 0;
  if ($rth->num_rows>0) {
    

    while($row = $rth->fetch_array()) { 
        extract($row);
        $count++;
        $gh_user_id = return_value('gh', $gh_id, 'gh_id', 'user_id');
        $content .= '<tr>';
        $content .= '<td align="center">';
        $content .= return_fullname($gh_user_id);
        $content .= '</td><td align="center">₦';
        $content .= formatMoney($amount, true);
        $content .= '</td><td align="center">';
        $content .= $matchdate;      
        $content .= '</td>';
        $content .= '</td><td align="center">';
        $content .= $timestart;      
        $content .= '</td>';
        $content .= '</tr>';
    }//loop ends here.
    

  }

  $the = "SELECT gh.gh_id as pgh_id, p_matching.amount as pamount, p_matching.matchdate as pmatchdate , p_matching.timestart as ptimestart FROM ((p_matching INNER JOIN gh ON p_matching.gh_id = gh.gh_id) INNER JOIN percent ON p_matching.ph_id = percent.per_id) WHERE p_matching.confirmed = '1' AND  percent.user_id = '$user_id'" ;
    $that = $con->query($the);

     if ($that->num_rows>0) {
    

    while($love = $that->fetch_array()) { 
        extract($love);
        $count++;
        $ghper_user_id = return_value('gh', $pgh_id, 'gh_id', 'user_id');
        $content .= '<tr>';
        $content .= '<td align="center">';
        $content .= return_fullname($ghper_user_id);
        $content .= '</td><td align="center">₦';
        $content .= formatMoney($pamount, true);
        $content .= '</td><td align="center">';
        $content .= $pmatchdate;      
        $content .= '</td>';
        $content .= '</td><td align="center">';
        $content .= $ptimestart;      
        $content .= '</td>';
        $content .= '</tr>';
    }//loop ends here.
    

  }

  elseif($rth->num_rows< 1 or $that->num_rows < 1){
      $content .= '<tr rowspan= "4">';
        $content .= '<td colspan="4" >';
        $content .= 'You have not made or completed any deposit on this platform. Once you have any deposit record, it will definitely appear here!!!.';
        $content .= '</td></tr>';
  }
  echo $content;
} /// end here



  function list_refs($user_id) {
    global $con; 

    $th = "SELECT * FROM ref_table INNER JOIN users ON ref_table.referer_id = users.user_id WHERE ref_table.referer_id = '$user_id' LIMIT 10" ;
  $rth = $con->query($th) or die($con->error);
  //$rt = $rth->fetch_array();
  $content = '';
      $count = 0;
  if ($rth->num_rows>0) {
    

    while($row = $rth->fetch_array()) { 
        extract($row);
        $count++;
        $content .= '<tr>';
        $content .= '<td align="center">';
        $content .= $count;
        $content .= '</td><td align="center">';
        $content .= return_fullname($reference_id);
        $content .= '</td><td align="center">';
        $content .= '1st';      
        $content .= '</td><td align="center">';
        $content .= return_single_value('phone', 'users', 'user_id', $reference_id);      
        $content .= '</td>';
        $content .= '</tr>';
    }//loop ends here.
     

  }
  else{
      $content .= '<tr rowspan= "3">';
        $content .= '<td colspan="3" >';
        $content .= 'You have no referals yet, refer more people to earn more on bonuses on WealthStream Global';
        $content .= '</td></tr>';
  }
  echo $content;
} /// end here


?>