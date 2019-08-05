
  <!-- Start Row -->
  <div class="row">
    

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title"> 
          Fill in the mail details below.
        </div>

            <div class="panel-body">

              <form method="POST" id="drake">

                <input type="hidden" class="form-control" id="softcreate" name="softcreate" >
                <div class="form-group">
                  <label for="input1" class="form-label">Name Of Mail Owner</label>
                  <input type="text" class="form-control"  name="name" id="name">
                </div>

                <div class="form-group">
                  <label for="input2" class="form-label">Email of Mail Owner</label>
                  <input type="text" class="form-control" id="email" name="email">
                </div>

                 <div class="form-group">
                  <label for="input2" class="form-label">Phone Number of Mail Owner</label>
                  <input type="text" class="form-control" id="phone" name="phone">
                </div>

                <div class="form-group">
                  <label for="input2" class="form-label">Subject of Mail</label>
                  <input type="text" class="form-control" id="subject" name="subject">
                </div>

               <div class="form-group">
                  <label for="office" class="form-label">Destination Office of Mail</label>
                  <select class="form-control" id="office" name="office">
                   <?php selectqueryrr('office' ,'office_id','office_name'); ?>
                  </select>

                </div>

                 <div class="form-group">
                  <label for="class" class="form-label">Class Of Mail Owner</label>
                  <select class="form-control" id="mailclass" name="mailclass">
                  <option value="Staff">Staff</option>
                  <option value="Student">Student</option>
                  <option value="Visitor">Visitor</option>
                  </select>

                </div>




                <textarea class="input-block-level" id="summernote" name="content" rows="18">
</textarea>
                <button class="btn btn-default" id="enter">Create Mail</button>

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
<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="js/bootstrap/bootstrap.min.js"></script>

<!-- ================================================
Bootstrap WYSIHTML5
================================================ -->
<!-- main file -->
<script type="text/javascript" src="js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js"></script>
<!-- bootstrap file -->
<script type="text/javascript" src="js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<!-- ================================================
Summernote
================================================ -->
<script type="text/javascript" src="js/summernote/summernote.min.js"></script>

<script>
  /* BOOTSTRAP WYSIHTML5 */
  $('.textarea').wysihtml5();

  /* SUMMERNOTE*/

 $('#summernote').summernote({

  onImageUpload: function(files, editor, welEditable) {
          sendFile(files[0], editor, welEditable);
      }

 });
 $('#summernote').code('Type Your Mail Body Content Here');

  function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);//You can append as many data as you want. Check mozilla docs for this
            $.ajax({
                data: data,
                type: "POST",
                url: "include/savetheuploadedfile.php",
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    editor.insertImage(welEditable, data);
                    $('#kai').html(data);
                },
                error: function() {      // Show error msg 
                  $('#kai').html('<div class="container">Please try again soon, bad internet.</div>');
                }
            });
        }





$("#enter").click(function (event){
      event.preventDefault();
      $('textarea[name="content"]').html($('#summernote').code());
      var name = $('#name').val();
      var email = $('#email').val();
       var phone = $('#phone').val();
       var subject = $('#subject').val();
         var softcreate = $('#summernote').val();
         var letters = /^[a-zA-Z]+$/;
          var phonevali = /^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/gm;


   if (name=="" || name.length < 1 ) {
            $('#error').html(errorme(" Sorry your Name input is empty ") );
            $('#name')[0].focus();

     }else if (subject=="" || subject.length < 1 ) {
            $('#error').html(errorme(" Sorry your mail subject input is empty ") );
            $('#subject')[0].focus();

     }else if (emailvali(email)) {
          $('#error').html(errorme(" Your email is either empty or has a wrong format. Please use an authentic email ") );
          $('#email')[0].focus();

     }else if ((phone.length < 11) || !phone.match(phonevali) || (phone.length > 17)) {
          $('#error').html(errorme("  Kindly check your phone number input, it's empty or invalid. ") );
          $('#phone')[0].focus();

     }else if (softcreate=="" || softcreate.length < 1 || softcreate == 'Type Your Mail Body Content Here') {
            $('#error').html(errorme(" Sorry your Mail Body is empty ") );
            $('#summernote')[0].focus();

     }else{
        //alert(real);
        var details = $('#drake').serialize();
        $.ajax({

        type: "POST",                                            // GET or POST
        url: "include/runthings.php", 
        data: details,                                          // Path to file
       // timeout: 2000,                                           // Waiting time
        beforeSend: function() {                               // Before Ajax 
          $('#enter').text('PROCESSING ... '); 
         $("#enter").attr("disabled", true);
           $('#error').html(' ');     // Load message
        },
        complete: function() {                                  // Once finished
         $('#enter').text(' Create Mail '); 
         $("#enter").removeAttr("disabled");                              // Clear message
        },
        success: function(data) {
          var me = data;
          if (me == 'oops') {
         $('#error').html(errorme("Your mail was not sent successfully, Please try again . ")).fadeIn(1000);
         }else{
          document.getElementById("drake").reset();
          $('#error').html(data);

           $('#codemodal').modal({
              backdrop: 'static',
              keyboard: false
            });
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

