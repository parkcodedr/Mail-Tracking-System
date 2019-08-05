<script src="js/jquery.min.js"></script>
<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.chat
{
    list-style: none !important;
    margin: 0 !important;
    padding: 0 !important;
}

.chat li 
{
    margin-bottom: 10px !important;
    padding-bottom: 5px !important;
    border-bottom: 1px dotted #B3A9A9 !important; 
}

.chat li.left .chat-body
{
    margin-left: 60px !important;
}

.chat li.right .chat-body
{
    margin-right: 60px !important;
}


.chat li .chat-body p
{
    margin: 0 !important;
    color: #777777 !important;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px !important;
}

.panel-body
{
    overflow-y: scroll !important;
    height: 250px !important;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3) !important;
    background-color: #F5F5F5 !important;
}

::-webkit-scrollbar
{
    width: 12px !important;
    background-color: #F5F5F5 !important;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3) !important;
    background-color: #555 !important;
}

</style>


<!-- The Modal -->
<div id="myModal" class="modal ">

  <!-- Modal content -->
  <div class="modal-content">
    <div> <span class="close">&times;</span>
    <p>Some text in the Modal..</p> 
    </div>
    <hr>
        <div class="going">
       
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary"> 
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment" id="result"> </span> Chat
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                    </div>
                </div>
            <div class="" id="collapseOne">
                <div class="panel-body">
                    <ul class="chat">
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales. <small id="sent"><i class="glyphicon glyphicon-minus-sign"></i></small>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <form name="chatform" id="chatform">
                    <div class="input-group">
                        <input type="hidden" name="transid" value="<?php echo $transid ?>">
                        <input type="hidden" name="myname" value="<?php echo $mailowner ?>">
                        <input id="btn-input" name="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat" name="btn-chat" onclick="sendus(); return false;">
                                Send</button>
                        </span>
                    </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>

        </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function showme() {
    modal.style.display = "block";
    setDataSource();
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
    source.close();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        source.close();
    }
}

$(document).ready(function() {
     idea();
});

function setDataSource() {
            var source = new EventSource("./who/include/chatup.php?funny=<?php echo $transid; ?>");

            source.onmessage = function(e){
                updatePrice(e.data);
            };
            
    }


    function updatePrice(data) {
        $(".chat")[0].innerHTML += data;
    }



function sendus(){

      var mess = $('#btn-input').val();
     
    if (mess == "" || mess == " ") {

    }else{
        name = "<?php echo $mailowner; ?>";
             $(".chat").append(package(mess,name));

                    var message = $("#chatform").serialize();

                    $.ajax({

                    type: "POST",
                    url: "./who/include/runthings.php", 
                    data: message,                                          // Path to file
                   // timeout: 2000,                                           // Waiting time
                    beforeSend: function() {                         // Before Ajax 
                        $('#btn-input').val("");
                    },
                    complete: function() {                                 // Once finished
                                                  // Clear message
                    },
                    success: function(data) {
                         $("ul li#testcase").remove();
                         $(".chat").append(data);

                    },
                    error: function() {                                     // Show error msg 
                     //$( "#sent" ).last().html( "<i class='glyphicon glyphicon-ok'></i>" );
                    }
              });
        }
}

function idea(){ 

                    $.ajax({

                    type: "GET",
                    url: "./who/include/runthings.php?funny=<?php echo $transid; ?>", 
                                                           // Path to file
                   // timeout: 2000,                                           // Waiting time
                    beforeSend: function() {                         // Before Ajax 
                       
                    },
                    complete: function() {                                 // Once finished
                                                  // Clear message
                    },
                    success: function(data) {
                        if (data == 'No') {

                        }else{
                            $(".chat").html(data);
                        }

                    },
                    error: function() {                                     // Show error msg 
                     //$( "#sent" ).last().html( "<i class='glyphicon glyphicon-ok'></i>" );
                    }
              });
        
}

function package(angels,name){

   var light =' <li class="right clearfix" id="testcase"><span class="chat-img pull-right">';
        light +=' <img src="http://placehold\.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />';
                       light +=' </span>';
                           light +=' <div class="chat-body clearfix">';
                                light +='<div class="">';
                                   light +=' <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>Just Now</small>';
                                    light +='<strong class="pull-right primary-font">'+name+'</strong>';
                                light +='</div>';
                               light += '<p>'+angels+' <small id="sent"> <i class="glyphicon glyphicon-minus-sign"> </i>  </small>  </p> </div> </li>';
                        
                                   
          return light;                   
    
}


</script>