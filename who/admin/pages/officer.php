
  
  <!-- Start Row -->
  <div class="row"> 
    

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title"> 
          Fill in the Staff details below.
        </div>

            <div class="panel-body">

              <form method="POST" id="staffadd">

                <input type="hidden" class="form-control" id="realstaff" name="realstaff" >
                <div class="form-group">
                  <label for="name" class="form-label">Name Of New Staff </label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                  <label for="email" class="form-label">Email of New Staff</label>
                  <input type="text" class="form-control" id="email" name="email">
                </div>

                 <div class="form-group">
                  <label for="phone" class="form-label">Phone Number of New Staff</label>
                  <input type="text" class="form-control" id="phone" name="phone">
                </div>

                <div class="form-group">
                  <label for="office" class="form-label">Office of New Staff</label>
                  <select class="form-control" id="office" name="office">
                   <?php selectqueryrr('office' ,'office_id','office_name'); ?>
                  </select>

                </div>

                

                 <div class="form-group">
                  <label for="password" class="form-label">Password of New Staff</label>
                  <input type="text" class="form-control" id="password" name="password">
                </div>


                <p><textarea class="textarea form-control wysihtml5-textarea" placeholder="Job Description Of Staff"  style="height:200px; width:100%;" name="description"  id="description"></textarea></p>

            
                <button class="btn btn-default" id="enter">Submit</button>

                <div id="error"></div>

              </form>

            </div>

      </div>
    </div>
    

  </div>
  <!-- End Row -->

<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="../js/jquery.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="../js/bootstrap/bootstrap.min.js"></script>



<!-- ================================================
Bootstrap WYSIHTML5
================================================ -->
<!-- main file -->
<script type="text/javascript" src="../js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js"></script>
<!-- bootstrap file -->
<script type="text/javascript" src="../js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<!-- ================================================
Summernote
================================================ -->
<script type="text/javascript" src="../js/summernote/summernote.min.js"></script>


<script>


  /* BOOTSTRAP WYSIHTML5 */
  $('.textarea').wysihtml5();

  /* SUMMERNOTE*/

 $('#summernote').summernote();

///////////////////////////////////////////////////////////////////////////


$("#enter").click(function (event){
      event.preventDefault();
      var name = $('#name').val();
      var email = $('#email').val();
       var phone = $('#phone').val();
        var password = $('#password').val();
        var html = $('#description').val();
         $("#realstaff").val(html);
         var real = $('#realstaff').val();
         var letters = /^[a-zA-Z]+$/;
          var phonevali = /^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/gm;


   if (name=="" || name.length < 1 ) {
            $('#error').html(errorme(" Sorry your Name input is empty or contains unaccepted characters and numbers") );
            $('#name')[0].focus();

     }else if (password=="" || password.length < 4 ) {
            $('#error').html(errorme(" Sorry your password must at least be 4 characters") );
            $('#password')[0].focus();

     } else if (emailvali(email)) {
          $('#error').html(errorme(" Your email is either empty or has a wrong format. Please use an authentic email ") );
          $('#email')[0].focus();

     }else if ((phone.length < 11) || !phone.match(phonevali) || (phone.length > 17)) {
          $('#error').html(errorme("  Kindly check your phone number input, it's empty or invalid. ") );
          $('#phone')[0].focus();

     }else if (real=="" || real.length < 1 ) {
            $('#error').html(errorme(" Sorry your Staff Description is empty ") );
            $('#description')[0].focus();

     }else{
        //alert(real);
        var details = $('#staffadd').serialize();
        $.ajax({

        type: "POST",                                            // GET or POST
        url: "process/alladmins.php", 
        data: details,                                          // Path to file
       // timeout: 2000,                                           // Waiting time
        beforeSend: function() {                               // Before Ajax 
          $('#enter').text('PROCESSING ... '); 
         $("#enter").attr("disabled", true);
           $('#error').html(' ');     // Load message
        },
        complete: function() {                                  // Once finished
         $('#enter').text(' Submit '); 
         $("#enter").removeAttr("disabled");                              // Clear message
        },
        success: function(data) {
          var me = data;
          if (me == 'great') {
          document.getElementById("staffadd").reset();
         $('#error').html(errorme("Your New Registration Was Succesful. ")).fadeIn(10000);
         }else{
          $('#error').html(errorme(data)).fadeIn(10000);
         }
        },
        error: function() {                                     // Show error msg 
         $('#error').html(errorme(" Error, Kindly Check Your Internet "));
        }
  });
    
     } //End Of Else 


}); //End Of Onclick

function errorme(msg){
    var display = '<br><div class="alert alert-danger fade in col-xs-12" role="alert">';
    display += '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    display += '<span class="fa fa-warning" aria-hidden="true"></span>';
    display += '<span class="sr-only">Error:</span>';
    display += '<label>  '+ msg +'  </label>';
    display += '</div> <br>';

    return display;

   }; //erorr mesage div

    function emailvali(mail){

        var are = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if (mail == '' || !(are.test(mail))) {
            return true;
        }
    };


</script>


