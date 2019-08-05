<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
  <body>
    <div class="container">
      <div class="chat">
        <div id="chatZone" name="chatZone">
        </div>
        <form onsubmit="chat.sendMsg(); return false;">
          <label for="msg" style="float:left">Message:
          </label>
          <input type="text" id="msg" name="msg" autofocus="true" placeholder="Type Your Meassage Here" />
          <input type="submit" />
        </form>
      </div>
    </div>
    <script type="text/javascript" src="chat.js">
    </script>
  </body>
</html>

<script type="text/javascript">
//Chat.js(ChatEngine)

var ChatEngine = function() {
    var name = " ";
    var msg = "";
    var chatZone = document.getElementById("chatZone");
    var oldata = "";
    var sevr = " ";
    var xhr = " ";
    //initialzation
    this.init = function() {
        if (EventSource) {
            this.setName();
            this.initSevr();
        } else {
            alert("Use latest Chrome or FireFox");
        }
    };
    //Setting user name
    this.setName = function() {
        name = prompt("Enter your name:", "Chater");
        if (!name || name === "") {
            name = "Chater";
        }
        name = name.replace(/(<([^>]+)>)/ig, "");
    };
    //For sending message
    this.sendMsg = function() {
        msg = document.getElementById("msg").value;
        chatZone.innerHTML += '<div class="chatmsg"><b>' + name + '</b>: ' + msg + '<br/></div>';
        oldata = '<div class="chatmsg"><b>' + name + '</b>: ' + msg + '<br/></div>';
        this.ajaxSent();
        return false;
    };
    //sending message to server
    this.ajaxSent = function() {
        try {
            xhr = new XMLHttpRequest();
        } catch (err) {
            alert(err);
        }
        xhr.open('GET', 'chatprocess200.php?msg=' + msg + '&name=' + name, false);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == ) {
                    msg.value = "";
                }
            }
        };
        xhr.send();
    };
    //HTML5 SSE(Server Sent Event) initilization
    this.initSevr = function() {
        sevr = new EventSource('chatprocess.php');
        sevr.onmessage = function(e) {
            if (oldata != e.data) {
                chatZone.innerHTML += e.data;
                oldata = e.data;
            }
        };
    };
};
// Createing Object for Chat Engine
var chat = new ChatEngine();
chat.init();

</script>



<?php
//chatprocess.php
// creating Event stream

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
$name = strip_tags($_GET['name']);
$msg = strip_tags($_GET['msg']);

function sendMsg($msg)
{
    echo "data: $msg" . PHP_EOL;
    ob_flush();
    flush();
}

if (!empty($name) && !empty($msg))
{
    $fp = fopen("_chat.txt", 'a');
    fwrite($fp, '<div class="chatmsg"><b>' . $name . '</b>: ' . $msg . '<br/></div>' . PHP_EOL);
    fclose($fp);
}

if (file_exists("_chat.txt") && filesize("_chat.txt") > 0)
{
    $arrhtml = array_reverse(file("_chat.txt"));
    $html = $arrhtml[0];
}

if (filesize("_chat.txt") > 100)
{
    unlink("_chat.txt");
}

sendMsg($html);
?>
<style type="text/css">

body {
    font-family: "Comic Sans MS", Helvetica, Arial, sans-serif;
    font-size: 14px;
    line-height: 32px;
    color: #333333;
    font-weight: normal;
}
.container {
    margin: 0 auto;
    width: 600px;
}
.chat-zone {
    padding: 20px;
    height: 400px;
}
.chatmsg {
    margin: 0 5px;
}
.chatmsg b {
    text-transform: uppercase;
    color: orange;
}
.chat {
    margin: 0 auto;
}
.chat #chatZone {
    width: 500px;
    height: 400px;
    border: 1px solid #ddd;
    border-radius: 7px;
    overflow-y: scroll;
    background: #333;
    color: #fff;
}
.chat form {
    margin: 10px 0 0 0;
}
input[type="text"] {
    border: 1px solid #cccccc;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    outline: none;
    padding: 4px 6px;
    font-size: 14px;
    line-height: 20px;
    color: #555555;
    border-radius: 3px;
    width: 425px;
}
input[type="submit"] {
    display: block;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
    margin: 5px 0 0 60px;
    padding: 6px 10px;
    border: 1px solid #777;
    background: #333537;
    border-radius: 5px;
}

</style>