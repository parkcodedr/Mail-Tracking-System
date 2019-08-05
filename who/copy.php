<script type="text/javascript">
$(document).ready(function () {

    $("#follow").click(function (){
        showLoadMsg ();
        shame();
        return false;
     });

  });

     function shame(){

            var fname = document.getElementById('fname').value;
            var lname = document.getElementById('lname').value;
            var phone = document.getElementById('phone').value;
            var password = document.getElementById('password').value;
            var cpassword = document.getElementById('cpassword').value;

            var fnameerror = document.getElementById('fnameerror');
            var lnameerror = document.getElementById('lnameerror');
            var phoneerror = document.getElementById('phoneerror');
            var passworderror = document.getElementById('passworderror');
            var status = document.getElementById('respond');
            

            var phonevali = /^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/gm;
            var letters = /^[a-zA-Z]+$/;

            if (fname=="" || fname.length < 1 || !letters.test(fname)) {
            var error = errorme("Sorry your First Name input is empty or contains unaccepted characters and numbers");
            fnameerror.innerHTML = error;
            passworderror.innerHTML = "";
            lnameerror.innerHTML = "";
            phoneerror.innerHTML = "";
            status.innerHTML = "";
            document.getElementById('rotate').innerHTML="";
            document.getElementById('respond').innerHTML = " ";
            document.getElementById('fname').focus();

            }
            else if (lname == "" || lname.length < 1 || !letters.test(lname)) {
            var error = errorme(" Sorry your Last Name input is empty or contains unaccepted characters and numbers ");
            lnameerror.innerHTML = error;
            passworderror.innerHTML = "";
            fnameerror.innerHTML = "";
            phoneerror.innerHTML = "";
            status.innerHTML = "";
            document.getElementById('rotate').innerHTML="";
            document.getElementById('respond').innerHTML = " ";
            document.getElementById('lname').focus();
            

            }
            else if (phone == "" || phone==" " || (phone.length < 11) || !phone.match(phonevali) || (phone.length > 17)){
            var error = errorme("  Kindly check your phone number input, it's empty or invalid. ");
            phoneerror.innerHTML = error;
            passworderror.innerHTML = "";
            lnameerror.innerHTML = "";
            fnameerror.innerHTML = "";
            status.innerHTML = "";
             document.getElementById('phone').focus();
            document.getElementById('rotate').innerHTML="";
            document.getElementById('respond').innerHTML = " ";
           
            }
            else if(password == "" || password==" " || (password.length<1)) {
            var error = errorme("  Kindly check your password input, it's empty. ");
            passworderror.innerHTML = error;
            phoneerror.innerHTML = "";
            fnameerror.innerHTML = "";
            status.innerHTML = "";
            document.getElementById('rotate').innerHTML="";
            document.getElementById('respond').innerHTML = "";
            document.getElementById('password').focus();

            }
            else if(!(password == cpassword)) {
            var error = errorme("  Kindly check your password and confirm password input, they dont match. ");
            passworderror.innerHTML = error;
            phoneerror.innerHTML = "";
            fnameerror.innerHTML = "";
            status.innerHTML = "";
            document.getElementById('rotate').innerHTML="";
            document.getElementById('respond').innerHTML = "";
            document.getElementById('cpassword').focus();

            }
  

            else {
                serverwaka();
            }

        }; //end of validation



function objective(){
                             var ajaxRequest;

                                 try{
                                    
                                    // Opera 8.0+, Firefox, Safari
                                    ajaxRequest = new XMLHttpRequest();
                                    return ajaxRequest;
                                 }catch (e){
                                 
                                    // Internet Explorer Browsers
                                    try{
                                       ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                                       return ajaxRequest;
                                    }catch (e) {
                                    
                                       try{
                                          ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                                          return ajaxRequest;
                                       }catch (e){
                                    
                                          // Something went wrong
                                          alert("Your browser broke!");
                                          
                                       }
                                    }
                                 }
             }; //end of xmlhttp object


function serverwaka(){

    ajaxRequest = objective();
                             // Now get the value from user and pass it to
                   // server script.
                   var status = document.getElementById('respond');
                   var form = document.getElementById("theform"); //Get all form elements
                   var FD = new FormData(form); //Seriaslize the form elements into the form Data object
                    ajaxRequest.addEventListener("load", completeHandler, false);
                    ajaxRequest.addEventListener("error", errorHandler, false);
                    ajaxRequest.addEventListener("abort", abortHandler, false);

                    function completeHandler(event){

                       var responsive = event.target.responseText;

                       var len = responsive.length;
                       if (len < 10 ){
                        status.innerHTML = errorme(" Successful login, please wait... "); //function to display output as bootstrap error messAGE
                       document.getElementById('rotate').innerHTML = "";
                       window.location=responsive;

                       }
                       else{
                        document.getElementById('rotate').innerHTML = "";
                        passworderror.innerHTML = "";
                        lnameerror.innerHTML = "";
                        fnameerror.innerHTML = "";
                        phoneerror.innerHTML = "";
                        status.innerHTML = errorme(responsive); //function to display output as bootstrap error messAGE
                       
                       }
                       

                    };
                    function errorHandler(event){
                
                        status.innerHTML = errorme("  Registration failed due to an error. Check your internet connection and Try again  ");
                    };

                    function abortHandler(event){
                
                        status.innerHTML = errorme("  Sorry, Registration was cancelled or aborted. Try again  ");
                    };
                   
                    ajaxRequest.open("POST","reg_process.php",true);
                    ajaxRequest.send(FD);

            }; //End of server query code





function showLoadMsg (){

  var rotate = document.getElementById('rotate');
  rotate.innerHTML = '<img src="rotation.gif" alt="Loading registration" style="width:48px; height:48px;"/> please wait...';


}; //end of loading image

   

  function errorme(msg){
    var display = '<div class="alert alert-danger fade in col-xs-12" role="alert">';
    display += '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    display += '<span class="fa fa-warning" aria-hidden="true"></span>';
    display += '<span class="sr-only">Error:</span>';
    display += '<label>'+ msg +'</label>';
    display += '</div> <br>';

    return display;

   }; //erorr mesage div
 </script>