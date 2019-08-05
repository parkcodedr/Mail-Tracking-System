<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

 				$curd = date('d');
               $curmo = date('m');
               $curye = date('y');

               $curhr = date('H');
               $curmin = date('i');
               $cursec = date('s');

               $today = mktime($curhr, $curmin, $cursec, $curmo, $curd, $curye);
                $stoptime = 1507402869;
                 $rem = $stoptime - $today;
                        $days_remaining = floor($rem / 86400);
                        $hoursrem = floor(($rem % 86400) / 3600);
                        $min = floor(($rem % 3600) / 60);
                        $secrem = $rem % 60;
                        $hrs = $days_remaining." day(s) ".$hoursrem." Hr(s) ".$min. "  Mins  ".$secrem." Secs" ;

//echo "data:  {$hrs} \n\n";
flush();
?> 


<?php
session_start();
$_SESSION['last_line'] = "";
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<script>
var source, chattext, last_data, chat_btn, conx_btn, disconx_btn, text;
var hr = new XMLHttpRequest();
function connect(){
    if(window.EventSource){
        source = new EventSource("server.php");
        source.addEventListener("message", function(event){
            if(event.data != last_data && event.data != ""){
                chattext.innerHTML += event.data+"<hr>";
            }
            last_data = event.data;
        });
        chat_btn.disabled = false;
        conx_btn.disabled = true;
        disconx_btn.disabled = false;
    } else {
        alert("event source does not work in this browser, author a fallback technology");
        // Program Ajax Polling version here or another fallback technology like flash
    }
}
function disconnect(){
    source.close();
    disconx_btn.disabled = true;
    conx_btn.disabled = false;
    chat_btn.disabled = true;
}
function chatPost(){
    chat_btn.disabled = true;
    hr.open("POST", "chat_intake.php", true);
    hr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            chat_btn.disabled = false;
            text.value = "";
        }
    }
    hr.send("text="+text.value);
}
var promptValue = prompt('Enter your name:', '');
if(promptValue != null){
	hr.open("POST", "chat_intake.php", true);
	hr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    if(hr.responseText == "success"){
				chattext = document.getElementById("chattext");
				chat_btn = document.getElementById("chat_btn");
				conx_btn = document.getElementById("conx_btn");
				disconx_btn = document.getElementById("disconx_btn");
				text = document.getElementById("text");
				conx_btn.disabled = false;
				alert("Welcome to the chat "+promptValue+", press connect when ready.");
			}
	    }
    }
	hr.send("uname="+promptValue);
}
</script>
<style>
div#chatbox{
    width: 300px;
    height: 330px;
    padding: 20px;
    background:#FFE1A4;
    border-radius: 5px;
}
div#chatbox > #chattext{
    height: 200px;
    padding: 10px;
    background: #FFF;
    margin: 10px 0px;
    overflow-y: auto;
}
div#chatbox > #text{
	width: 100%;
}
</style>
</head>
<body>
<div id="chatbox">
  <b>SSE Chatbox <small>shared hosting test</small></b>
  <div id="chattext"></div>
  <textarea id="text"></textarea>
  <input type="button" id="chat_btn" onclick="chatPost()" value="Submit Text" disabled> &nbsp; &nbsp;
  <input type="button" id="conx_btn" onclick="connect()" value="Connect" disabled>
  <input type="button" id="disconx_btn" onclick="disconnect()" value="Disconnect" disabled>
</div>
</body>
</html>



<?php

//server.php

session_start();
header('Content-Type: text/event-stream');
header("Cache-Control: no-cache"); // Prevent Caching
$data = file_get_contents("chat.txt");
// Trim the last new line character from the data
$trimmed = rtrim($data, "\n");
// Create an array in which each new line is an element
$data_array = explode("\n", $trimmed);
// Grab just the last line from the end of the array
$last_line = end($data_array);
// If $last_line is not equal to 'last_line' session variable
if($last_line != $_SESSION['last_line']){
     echo "data: $last_line\n\n";
    // Update last line session variable
    $_SESSION['last_line'] = $last_line;
}
// Do not make retry less than 15000(15 seconds) on shared hosting
// And limit simultaneous users to prevent exceeding server resources
echo "retry: 15000\n";
ob_flush();
flush();
?>




<?php

//chat_intake.php

session_start();
$text = "";
if(isset($_POST['text']) && isset($_SESSION['uname'])) {
    $text = $_SESSION['uname']." said: ".$_POST['text']."\n";
    $handle = fopen("chat.txt", "a");
    fwrite($handle, $text);
    fclose($handle);
    exit();
}
if(isset($_POST['uname'])) {
    $_SESSION['uname'] = $_POST['uname'];
    echo "success";
    exit();
}
?>