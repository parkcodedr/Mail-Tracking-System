<?php

require('autoload.php');
 global $con; 

 //ADD nEW admin
       function pressokay($message,$usedt){
   $image = '<li><img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="img" class="img">';
        $image .=  "<p class='ballon color1'>".$message." &nbsp;  &nbsp; <i class='fa  fa-check-square-o'></i> &nbsp; &nbsp;  &nbsp;<i class='fa fa-clock-o'></i>  <small style='color: red'><b>".$usedt." </b></small></p><br> </li>";
        return $image;
}

 if (isset($_POST['waist'])) { 

	 $email =clean($_POST['email']);
	
	 $password =clean($_POST['password']);

            $query = "SELECT * FROM officers WHERE officers_email='$email' ";
            $r = mysqli_query($con,$query);
            if(mysqli_num_rows($r) >= 1){

              $row = mysqli_fetch_assoc($r);

                  if (password_verify($password, $row['password'])) {
                    //Password matches, so create the session
                    $_SESSION['level'] = $row['officers_post'];
                     $_SESSION['office'] = $row['office_id'];
                    $_SESSION['user_id'] = $user_id = $row['officers_id'];
                    echo $_SESSION['level'];
                   
                    }else{
                      echo " Your Password is incorrect, Try Again";
                    }

                
            }else{

               echo " Your Email is wrong. ";
            }

	 
 }



  if (isset($_POST['hardcreate'])) {

      $con->begin_transaction();


      $name =clean($_POST['name']);
       $description =$_POST['hardcreate'];
       $email =clean($_POST['email']);
       $phone =clean($_POST['phone']);
       $subject = clean($_POST['subject']);
       $mailclass =clean($_POST['mailclass']);
       $office=clean($_POST['office']);
       $sending_office =  $_SESSION['office'];
       $code = randomActivate();
       $code = 'UNIUYO-'.$code;
       $tr_code = active_exist($code);
       $type = 'hard';
       $todaydate      = date('d-m-Y');
       $todaytime      = date('H:i:s');
       $status = 0;

       

       $query = "INSERT into mail VALUES(NULL, '".$description."', '".$subject."', '".$todaydate."', '".$todaytime."', '".$type."', '".$name."', '".$phone."', '".$email."', '".$mailclass."', '".$sending_office."', '".$tr_code."')";
      $result1 = $con->query($query) or die($con->error) ;
      $mail_id = $con->insert_id;

       $query2 = "INSERT into route VALUES(NULL, '".$mail_id."', '".$status."')";
      $result2 = $con->query($query2) or die($con->error) ;
       $route_id = $con->insert_id;

  $query3 = "INSERT into transaction VALUES(NULL, '".$route_id."', '".$office."', '".$status."', '".$sending_office."')";
      $result3 = $con->query($query3) or die($con->error) ;
      

      if ($result1 == TRUE && $result2 == TRUE && $result3 == TRUE ) {

        $con->commit();
      
        echo '
            <div class="modal fade" id="codemodal" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Mail Creation Success </h4>
                    </div>
                    <div class="modal-body">
                    <br> <br> 
                      <p>Hello, The Mail you created  was successful. We have directed it to the office you chose for further handling.<br>
                      The Tracking code for this mail is <b>'.$tr_code.' </b>  ; This code has also been sent to the email
                       of the mail owner. This code will be used to track the progress of this mail.</p><br> <br> <br> 

                      
                      <br><br>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>'
              ;
      }
      else{
         $con->rollback();
         echo "oops";
      }
  }



if (isset($_POST['softcreate'])) {

      $con->begin_transaction();


      $name =clean($_POST['name']);
       $description =$_POST['content'];
       $email =clean($_POST['email']);
       $phone =clean($_POST['phone']);
       $subject = clean($_POST['subject']);
       $mailclass =clean($_POST['mailclass']);
       $office=clean($_POST['office']);
       $sending_office =  $_SESSION['office'];
       $code = randomActivate();
       $code = 'UNIUYO-'.$code;
       $tr_code = active_exist($code);
       $type = 'soft';
       $todaydate      = date('d-m-Y');
       $todaytime      = date('H:i:s');
       $status = 0;

       

       $query = "INSERT into mail VALUES(NULL, '".$description."', '".$subject."', '".$todaydate."', '".$todaytime."', '".$type."', '".$name."', '".$phone."', '".$email."',  '".$mailclass."', '".$sending_office."', '".$tr_code."')";
      $result1 = $con->query($query) or die($con->error) ;
      $mail_id = $con->insert_id;

       $query2 = "INSERT into route VALUES(NULL, '".$mail_id."', '".$status."')";
      $result2 = $con->query($query2) or die($con->error) ;
       $route_id = $con->insert_id;

  $query3 = "INSERT into transaction VALUES(NULL, '".$route_id."', '".$office."', '".$status."', '".$sending_office."')";
      $result3 = $con->query($query3) or die($con->error) ;
      

      if ($result1 == TRUE && $result2 == TRUE && $result3 == TRUE ) {

        $con->commit();
      
        echo '
            <div class="modal fade" id="codemodal" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Mail Creation Success </h4>
                    </div>
                    <div class="modal-body">
                    <br> <br> 
                      <p>Hello, The Mail you created  was successful. We have directed it to the office you chose for further handling.<br>
                      The Tracking code for this mail is <b>'.$tr_code.' </b>  ; This code has also been sent to the email
                       of the mail owner. This code will be used to track the progress of this mail.</p><br> <br> <br> 

                      
                      <br><br>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>'
              ;
      }
      else{
         $con->rollback();
         echo "oops";
      }
  }


  if (isset($_GET['mailid'])) {
    $mail_id = clean($_GET['mailid']);
    $trans_id = clean($_GET['transid']);
    $route_id = clean($_GET['routeid']);
    $mail =  select_all('mail', 'mail_id', $mail_id);
    $offices = return_single_valuerow('office_id', 'transaction', 'trans_id', $trans_id);

     $query="SELECT office_name FROM  office WHERE office_id ='".$offices['office_id']."'";   
   $ri = mysqli_query($con, $query);
   $morning = '';
    while ($row = mysqli_fetch_array($ri)) {
      $morning .= $row['office_name'].',';
    }
    

    $mail =  select_all('mail', 'mail_id', $mail_id);
   

          $bitch='      <!-- Start Title -->
                  <div class="title">
                    <h1>'.$mail["subject"].'<small>  From ( '.$mail["sender_email"].' )</small></h1>
                    <p><b>Offices Passed :</b> '.$morning.'</p>
                      
                  </div>
                  <!-- End Title -->

                  <!-- Start Conv -->
              <ul class="conv">

                 <li>
                               
  
                  <!-- Start Row -->
                  <div class="row">
                    

                    <div class="col-md-12">
                      <div class="panel panel-default">

                        <div class="panel-title"> 
                          Mail Details From '.$mail["sender_name"].'   {'.$mail["class_of_sender"].' }
                        </div>

                            <div class="panel-body">

                          <form method="POST" id="emimi">

                                <input type="hidden" class="form-control" id="updatesoft" name="updatesoft" >
                                <input type="hidden" class="form-control" id="mailid" name="mailid" value="'.$mail["mail_id"].'">
                                <input type="hidden" class="form-control" id="transid" name="transid" value="'.$trans_id.'">
                                <input type="hidden" class="form-control" id="routeid" name="routeid" value="'.$route_id.'">
                                <div class="form-group">
                                  <label for="input1" class="form-label">Name Of Mail Owner</label>
                                  <input type="text" class="form-control"  name="name" id="name" value="'.$mail["sender_name"].'" readonly>
                                </div>
                                <div class="form-group">
                                  <label for="input1" class="form-label">Tracking Code Of Mail</label>
                                  <input type="text" class="form-control"  name="trackingcode" id="trackingcode" value="'.$mail["tracking_code"].'" readonly>
                                </div>

                                <div class="form-group">
                                  <label for="input2" class="form-label">Email of Mail Owner</label>
                                  <input type="text" class="form-control" id="email" name="email" value="'.$mail["sender_email"].'" readonly>
                                </div>

                                 <div class="form-group">
                                  <label for="input2" class="form-label">Phone Number of Mail Owner</label>
                                  <input type="text" class="form-control" id="phone" name="phone" value="'.$mail["sender_phone"].'" readonly>
                                </div>

                                <div class="form-group">
                                  <label for="input2" class="form-label">Subject of Mail</label>
                                  <input type="text" class="form-control" id="subject" name="subject" value="'.$mail["subject"].'" readonly>
                                </div>

                                 <div class="form-group">
                                  <label for="class" class="form-label">Class Of Mail Owner</label>
                                   <input type="text" class="form-control" id="mailclass" name="mailclass"  value="'.$mail["class_of_sender"].'" readonly>

                                </div>

                                <div class="form-group">
                                 <label for="summernote" class="form-label">Mail description</label>
                                  </div>
                                 <textarea class="input-block-level" id="summernote" name="content" rows="18" >
                                 '.$mail["body"].' </textarea>

                            
                             

                              <button type="submit" class="btn btn-default" id="forward">Forward Mail</button>

                                <div id="error"></div>


           <div class="modal fade" id="updatesoftmodal" role="dialog">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
 
                      <h4 class="modal-title">Mail Forwarding Verification </h4>
                    </div>
                    <div class="modal-body">
                    <br> <br> 

                    <div id="receipt">
                      <p>Hello, Please Kindly Choose Your Mail Reply Option Below. Please Choose wisely <br> <br>

                      <div id="tongues" class="text-center">
                       <button type="button" id="final" class="btn btn-primary pull-left"> This Is The Final Office </button>

                       <button type="button" id="another" class="btn btn-danger pull-right"> Forward To Another Office </button>
                       </div>
                        </p>

                    </div>
                    <br> <br> <br> 
                     <p id="errorreport"> </p>
                      
                      <br><br>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
            </div>
</div>
                               

                  </form>

                            </div>

                      </div>
                    </div>
                    

                  </div>
                  <!-- End Row -->

           </ul>

           <script>
           $("#forward").click(function (event){
      event.preventDefault();
       $("#updatesoftmodal").modal({
              backdrop: "static",
              keyboard: false
            });


      });

$("#final").click(function (event){
      event.preventDefault();
    var details = $("#emimi").serialize();
  
    $library = " <input type=\"hidden\" class=\"form-control\" id=\"finalpoint\" name=\"finalpoint\" value=\"finalpoint\"> <div class=\"text-center\"> <button type=\"submit\" id=\"finalout\" class=\"btn btn-danger \" onclick=\"come(); return false;\"> Confirm Your Submition </button> </div>";

     $("#tongues").html($library);

});

$("#another").click(function (event){
      event.preventDefault();
    var details = $("#emimi").serialize();

     var queryString = "vote=staff";
  $.get("./include/runthings.php", queryString, function(data) {

      $library=" <div class=\"form-group\">";
   $library += "<label class=\"form-label\"> Select Destination Office of Mail</label>";
     $library += " <select class=\"form-control\" id=\"office\" name=\"office\">"+
     data +"</select></div> <br> <br> <br> ";

  
    $library += " <input type=\"hidden\" class=\"form-control\" id=\"finalmove\" name=\"finalmove\" value=\"finalmove\"> <div class=\"text-center\"> <button type=\"submit\" id=\"finalwaka\" class=\"btn btn-danger \" onclick=\"bia(); return false;\"> Confirm Your Submition </button> </div>";
  });
 
     $("#tongues").html($library);

});


   function come(){

    $(\'textarea[name="content"]\').html($(\'#summernote\').code());
    var details = $("#emimi").serialize();

        $.ajax({

        type: "POST",                                            // GET or POST
        url: "include/runthings.php", 
        data: details,                                          // Path to file
       // timeout: 2000,                                           // Waiting time
        beforeSend: function() {                             // Before Ajax 
          $("#errorreport").text("PROCESSING ... "); 
           $("#finalout").text("PROCESSING ... "); 
           $("#finalout").attr("disabled", true);    // Load message
        },
        complete: function() {                                  // Once finished
         $("#finalout").text(" Confirm Your Submition "); 
         $("#finalout").removeAttr("disabled");                              // Clear message
        },
        success: function(data) {
          var me = data;
          if (me == "great") {
         $("#errorreport").html("Your mail was Updated Succesfully, Please Wait ... ").fadeIn(300);
         $("#finalout").text("DONE");
         setTimeout("window.location.href = \"?action=newema\" ",5000);

         }else{
          $("#errorreport").html(me).fadeIn(300);

         }
        },
        error: function() {                                     // Show error msg 
         $("#errorreport").html(errorme(" Error, Kindly Check Your Internet "));
        }
  });
 };

 function bia(){

   $(\'textarea[name="content"]\').html($(\'#summernote\').code());
    var details = $("#emimi").serialize();

        $.ajax({

        type: "POST",                                            // GET or POST
        url: "include/runthings.php", 
        data: details,                                          // Path to file
       // timeout: 2000,                                           // Waiting time
        beforeSend: function() {                             // Before Ajax 
          $("#errorreport").text("PROCESSING ... "); 
           $("#finalout").text("PROCESSING ... "); 
           $("#finalout").attr("disabled", true);    // Load message
        },
        complete: function() {                                  // Once finished
         $("#finalout").text(" Confirm Your Submition "); 
         $("#finalout").removeAttr("disabled");                              // Clear message
        },
        success: function(data) {
          var me = data;
          if (me == "great") {
         $("#errorreport").html(" Your mail was Updated Succesfully and was moved to the next office. Please Wait ... ").fadeIn(300);
         $("#finalout").text("DONE");
         setTimeout("window.location.href = \"?action=newema\" ",5000);

         }else{
          $("#errorreport").html(me).fadeIn(300);

         }
        },
        error: function() {                                     // Show error msg 
         $("#errorreport").html(errorme(" Error, Kindly Check Your Internet "));
        }
  });
 }


 
      </script>';

           echo $bitch;



  }

  if (isset($_GET['vote'])) {
  selectqueryrr('office' ,'office_id','office_name');
}



  /////////////Update Mail As final

  if (isset($_POST['finalpoint'])) {

      $con->begin_transaction();


      $mailid =clean($_POST['mailid']);
       $transid =$_POST['transid'];
       $routeid =clean($_POST['routeid']);
       $content =clean($_POST['content']);
       
       $status = 1;

       

       $query = "UPDATE mail SET 
               body ='$content' 
          WHERE(mail_id ='$mailid')";
      $result1 = $con->query($query) or die($con->error) ;
     

       $query2 = "UPDATE route SET 
               status ='$status' 
          WHERE(route_id ='$routeid')";
      $result2 = $con->query($query2) or die($con->error) ;

  $query3 = "UPDATE transaction SET 
               status ='$status' 
          WHERE(trans_id ='$transid')";
      $result3 = $con->query($query3) or die($con->error) ;
      

      if ($result1 == TRUE && $result2 == TRUE && $result3 == TRUE ) {

        $con->commit();
      
        echo 'great';
      }
      else{
         $con->rollback();
         echo "Your mail Updating was unsuccessful. Please Try again Later";
      }
  }


    if (isset($_POST['finalmove'])) {

      $con->begin_transaction();


      $mailid =clean($_POST['mailid']);
       $transid =$_POST['transid'];
       $routeid =clean($_POST['routeid']);
       $content =clean($_POST['content']); 
       $office =clean($_POST['office']);
       $sending_office =  $_SESSION['office'];
       $zero = 0;
       $one = 1;

       

       $query = "UPDATE mail SET 
               body ='$content' 
          WHERE(mail_id ='$mailid')";
      $result1 = $con->query($query) or die($con->error) ;
     

       $query2 = "INSERT into transaction VALUES(NULL, '".$routeid."', '".$office."', '".$zero."', '".$sending_office."')";
      $result2 = $con->query($query2) or die($con->error) ;

  $query3 = "UPDATE transaction SET 
               status ='$one' 
          WHERE(trans_id ='$transid')";
      $result3 = $con->query($query3) or die($con->error) ;
      

      if ($result1 == TRUE && $result2 == TRUE && $result3 == TRUE ) {

        $con->commit();
      
        echo 'great';
      }
      else{
         $con->rollback();
         echo "Your mail Updating was unsuccessful. Please Try again Later";
      }
  }

//GETTNG TRACKNG CODE
  if (isset($_GET['gethigh'])) {
    $high = clean($_GET['gethigh']);

    echo $high;

    if (selectparcel('mail','tracking_code',$high)) {
      echo "Your Mail With the Tracking Code --:  <b>".$high."</b>  was found, Please wait while you are redirected to your tracking page";
    }else{

      echo"No";
    }
  }


    if (isset($_POST['btn-input'])) {
       $message =clean($_POST['btn-input']);
       $transid =clean($_POST['transid']);
       $myname =clean($_POST['myname']);

       $todaydate      = date('Y/m/d');
       $todaytime      = date('H:i:s');
       $whosent = "sender";
       $read = 0;

       $query = "INSERT into message VALUES(NULL, '".$transid."', '".$message."', '".$todaytime."', '".$todaydate."', '".$whosent."', '".$read."')";
      $result1 = $con->query($query) or die($con->error) ;
      $mail_id = $con->insert_id;
       if ($result1 == TRUE  ) {
        $con->commit();

        $time = date('Y/m/d')." ".date('H:i:s');
        $usedt = time_elapsed_string( $time, $full = false);
      
        echo package($message,$myname, $usedt);
      }
      else{
         $con->rollback();
         echo "sorry";
      }

       
    }





    function package($angels,$name,$timeit){

    $light =' <li class="right clearfix" id="testcase"><span class="chat-img pull-right">';
        $light .=' <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />';
                       $light .=' </span>';
                           $light .=' <div class="chat-body clearfix">';
                                $light .='<div class="">';
                                   $light .=' <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>'.$timeit.'</small>';
                                    $light .='<strong class="pull-right primary-font">'.$name.'</strong>';
                                $light .='</div>';
                               $light .= '<p>'.$angels.' <small id="sent"> <i class="glyphicon glyphicon-ok"> </i>  </small>  </p> </div> </li>';
                        
                                   
          return $light;                   
    
}


if (isset($_GET['funny'])) {
       $transid =clean($_GET['funny']);
       $one = 1;

$query="SELECT * FROM message WHERE trans_id ='".$transid."'";  


   $ri = mysqli_query($con, $query);
   $morning = '';
   if ($ri->num_rows > 0) {
    while ($row = mysqli_fetch_array($ri)) {

      $th = "SELECT transaction.office_id as officeid, mail.sender_name as sendersname  FROM ((transaction INNER JOIN route ON transaction.route_id = route.route_id) INNER JOIN mail ON mail.mail_id = route.mail_id) WHERE transaction.trans_id = '$transid'";
      $ritual = mysqli_query($con, $th);
      $gas = mysqli_fetch_array($ritual);

  

      $time = $row['message_date']." ".$row['message_time'];
      $usedt = time_elapsed_string( $time, $full = false);


      if ( $row['whosent'] == 'sender' ) {
        $name = $gas['sendersname'];
        $nametime ='<div class="">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>'.$usedt .'</small>
                                    <strong class="pull-right primary-font">'.$name.'</strong>
                                </div>';
        $img = '<li class="right clearfix"><span class="chat-img pull-right"> <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />';
      }else{
        if ($row['reader'] == 0) {
          $message_id = $row['message_id'];
         $askread = "UPDATE message SET 
               reader = '$one' 
          WHERE(message_id ='$message_id')";
      $iveread = $con->query($askread) or die($con->error) ;
        }
        $name = return_value('office', $gas['officeid'],'office_id', 'office_name'). "'s office";
        $nametime ='<div class="">
                                    <strong class="primary-font">'.$name.'</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>'.$usedt .'</small>
                                </div>';
       
        $img = '<li class="left clearfix"><span class="chat-img pull-left"> <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />';
      }



      $morning .= $img;
                       $morning .=' </span>';
                           $morning .=' <div class="chat-body clearfix">';
                                $morning .=$nametime;
                               $morning .= '<p>'.$row['message_body'] .' <small id="sent"> <i class="glyphicon glyphicon-ok"> </i>  </small>  </p> </div> </li>';

    }

   }else{
    $morning = '';
   }

   if ($morning == '') {
      $th = "SELECT transaction.office_id as officeid  FROM ((transaction INNER JOIN route ON transaction.route_id = route.route_id) INNER JOIN mail ON mail.mail_id = route.mail_id) WHERE transaction.trans_id = '$transid'";
      $ritual = mysqli_query($con, $th);
      $gas = mysqli_fetch_array($ritual);
     echo "<p> You Have No Messages Currently, Once you have A message from ".return_value('office', $gas['officeid'],'office_id', 'office_name'). "'s office, It will be displayed here";
   }else{
    echo $morning;
   }
 

       
    }

    //$date = new DateTime();
   // $date->setTimestamp(1507938623);

   // print_r($date->format('Y/m/d s:i:H'));
   // echo "<br>".$date->format('Y-m-d s:i:H')."<br>";
   // echo time_elapsed_string("2017/10/13 20:59", $full = false)
   


  if (isset($_GET['messagemeid'])) {
    $messagemeid = clean($_GET['messagemeid']);
    $trans_id = clean($_GET['transid']);
    $route_id = clean($_GET['routeid']);
    $sender_name = clean($_GET['sender_name']);
    $mailclass = clean($_GET['mailclass']);
    $morning = '';
    $one = 1;
    
    $query="SELECT * FROM message WHERE trans_id ='".$trans_id."'";
    $ri = mysqli_query($con, $query);

    $morning.= '
          <div class="title">
            <h1> Message From <b>'.$sender_name.' </b><small>    ( '.$mailclass.' )</small></h1>
            
          </div> <ul class="conv">';
      
   
    while ($row = mysqli_fetch_array($ri)){

       $time = $row['message_date']." ".$row['message_time'];
      $usedt = time_elapsed_string( $time, $full = false);
      if ($row['whosent'] == 'staff') {
        $image = '<li><img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="img" class="img">';
        $message =  "<p class='ballon color1'>".$row['message_body']." &nbsp;  &nbsp; <i class='fa  fa-check-square-o'></i> &nbsp; &nbsp;   &nbsp;<i class='fa fa-clock-o'></i> &nbsp; <small style='color: red'><b>".$usedt."</b></small></p><br> </li>";

      }else{
        $image = '<li><img src="http://placehold.it/50/55C1E7/fff&text=U" alt="img" class="img">';
        $message =  "<p class='ballon color2'>".$row['message_body']." &nbsp;  &nbsp;  &nbsp;<i class='fa fa-clock-o'></i>  &nbsp; <small style='color: red'><b>".$usedt."</b></small></p><br> </li>";

         if ($row['reader'] == 0) {
          $message_id = $row['message_id'];
         $askread = "UPDATE message SET 
               reader = '$one' 
          WHERE(message_id ='$message_id')";
      $iveread = $con->query($askread) or die($con->error) ;
      }

    }

    $morning .= $image;
    $morning .= $message; 
    

  }

  $_SESSION['trans_id'] = $trans_id;

  $gabriel = ' </ul>
  <form id="chatform"> <input type="hidden" class="form-control" id="hardcreatemessage" name="hardcreatemessage" >
  <input type="hidden" class="form-control" id="messagessd" name="transId" value="'.$trans_id.'" >
  <textarea class="textarea form-control wysihtml5-textarea" placeholder="Type your Messages Here"  style="height:200px; width:100%;" name="description"  id="description"></textarea></p>
                <button class="btn btn-default" id="slapam">Send Message</button>
                <button type="reset" class="btn margin-l-5">Clear</button>
                </form>
<!-- main file -->
<script type="text/javascript" src="js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js"></script>
<!-- bootstrap file -->
<script type="text/javascript" src="js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

  <script type="text/javascript">
   $(".textarea").wysihtml5();

$("#slapam").on("click", function(e) {              // User clicks nav link
   e.preventDefault();

     var html = $("#description").val();
         $("#hardcreatemessage").val(html);
         var hardcreatemessage = $("#hardcreatemessage").val();

    if (hardcreatemessage == "" || hardcreatemessage == " " || hardcreatemessage.length < 1 ) {
      editor.setValue("");
    }else{
             $(".conv").append(package(hardcreatemessage));

                    var message = $("#chatform").serialize();
                    $.ajax({

                    type: "POST",
                    url: "./include/runthings.php", 
                    data: message,
                    beforeSend: function() {                        
                       editor.setValue("");
                    },
                    complete: function() {                                 
                                                
                    },
                    success: function(data) {
                         $("ul li#testcase").remove();
                         $(".conv").append(data);

                    },
                    error: function() {                                    
                    
                    }
              });
        }


});
function package(hardcreatemessage){
   image = \'<li id="testcase"><img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="img" class="img">\';
        image +=  "<p class=\'ballon color1\'>"+hardcreatemessage+" &nbsp;  &nbsp; <i class=\'fa  fa-ellipsis-h\'></i> &nbsp; &nbsp;  &nbsp;<i class=\'fa fa-clock-o\'></i>  <small style=\'color: red\'><b> Now </b></small></p><br> </li>";
        return image;
}


function setDataSource() {
            var source = new EventSource("./include/chatup1.php?funny='.$trans_id.'");

            //source.onerror = function(openevent){
              //setDataSource();
            //}

           source.onerror = function(e) {
             //setTimeout(setDataSource(), 2000);
 //alert(e.data);
           };

            source.onmessage = function(e){
                updatePrice(e.data);
            };
            
    }


    function updatePrice(data) {
        $(".conv")[0].innerHTML += data;
    }

</script>';

   $morning .= $gabriel;

   echo $morning;
}


  if (isset($_POST['hardcreatemessage'])) {
    $hardcreatemessage = $_POST['hardcreatemessage'];
     $transid = clean($_POST['transId']);
     $todaydate      = date('Y/m/d');
       $todaytime      = date('H:i:s');
       $whosent = "staff";
       $read = 0;

       $query = "INSERT into message VALUES(NULL, '".$transid."', '".$hardcreatemessage."', '".$todaytime."', '".$todaydate."', '".$whosent."', '".$read."')";
      $result1 = $con->query($query) or die($con->error) ;
      $mail_id = $con->insert_id;
       if ($result1 == TRUE  ) {
        $con->commit();

        $time = date('Y/m/d')." ".date('H:i:s');
        $usedt = time_elapsed_string( $time, $full = false);
      
        echo pressokay($hardcreatemessage, $usedt);
      }
      else{
         $con->rollback();
         echo "sorry";
      }
    
}

?>
