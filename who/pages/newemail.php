 <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Mailbox</h1> &nbsp;  &nbsp;  &nbsp;  <span class="loadup"></span> 
  </div>
  <!-- End Page Header -->

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-mail">



<!-- Start Mailbox -->
<div class="mailbox clearfix">
 
  <!-- Start Mailbox Menu -->
  <div class="mailbox-menu">
    <ul class="menu">
      <li><a href="#"><i class="fa fa-inbox"></i> Inbox</a></li>
    
      <li><a href="#" ></li>
    </ul>
    
  </div>
  <!-- End Mailbox Menu -->

  <!-- Start Mailbox Container -->
  <div class="container-mailbox">

        <!-- Start Mailbox Inbox -->
        <div class="col-lg-3 col-md-4 padding-0" >
        <ul class="mailbox-inbox">
        
            <li class="search">
              <form>
                <input type="text" class="mailbox-search" id="mailboxsearch" placeholder="Search">
                <span class="searchbutton"><i class="fa fa-search"></i></span>
              </form>
            </li>

            <?php list_unreademails( $_SESSION['office']); ?>

        </ul>
        </div>
        <!-- End Mailbox Inbox -->

                <!-- Start Chat -->
                <div class="chat col-lg-9 col-md-8 padding-0">

                  <!-- Start Title -->
                  <div class="title">
                    <h1><?php echo return_single_value('office_name', 'office', 'office_id', $_SESSION['office'])."'s Mail Box"; ?></h1>
                    
          
                  </div>
                  <!-- End Title -->

                  <!-- Start Conv -->
              <ul class="conv">

                 <li>
                               
  
                  <!-- Start Row -->
                  <div class="row">
                    

    <!-- Start Panel -->
    <div class="col-md-12 col-lg-12">
      <div class="panel panel-dark">

        <div class="panel-title">
        <?php echo return_single_value('officers_name', 'officers', 'officers_id', $_SESSION['user_id'])."  You are Welcome"; ?> 
          
        </div>

        <div class="panel-heading">Your Most trusted mail Box.</div>

        <div class="panel-body">
         <?php if($igwe){
          echo "Your Messages are currently listed by the left hand side of the screen. You can easily click on them and have them displayed Here for easy response. Please kindly make sure you have a working Internet Connection";
         }else{
           echo "You currently Have no Unresponded Mails. Once you have a mail targeted to your office, It will be displayed right here.  ";
         } ?>
        </div>

        <div class="panel-footer">Have a great time responding to your messages</div>

      </div>
    </div>
    <!-- End Panel -->
                   
                    

                  </div>
                  <!-- End Row -->

           </ul>
          

        </div>
                <!-- End Chat -->

  </div>
  <!-- End Mailbox Container -->

</div>
<!-- End Mailbox -->


</div>
<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<!-- Start Footer -->



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
                },
                error: function() {      // Show error msg 
                  $('.loadup').html('<div class="container">Please try again soon, bad internet.</div>');
                }
            });
        }

//$('#summernote').code('<strong>this is bold</strong>');

$("#forward").click(function (event){
      event.preventDefault();

      $('#updatesoftmodal').modal({
              backdrop: 'static',
              keyboard: false
            });


});




$(document).ready(function() {

$('.champ a').on('click', function(e) {
  e.preventDefault();
  var url = this.href;
  var $content = $('.loadup');

  $.ajax({
    type: "GET",                                            // GET or POST
    url: url,                                               // Path to file
    beforeSend: function() {                                // Before Ajax 
      $content.html('<div id="load">Loading ...</div>');      // Load message
    },
    complete: function() {                                  // Once finished
     $content.html(' ');                                  // Clear message
    },
    success: function(data) {                               // Show content
      $('.chat').html(data);

       $('#summernote').summernote({

  onImageUpload: function(files, editor, welEditable) {
          sendFile(files[0], editor, welEditable);
      }

 });
    },
    error: function() {                                     // Show error msg 
      $content.html('<div class="container">Please try again soon.</div>');
    }
  });

});
  
       
 }); 
 
  


 /* $.ajax({

      type: "Get",                                            // GET or POST
      url: "hi.php?open=door", 
      //data: details,                                          // Path to file
     // timeout: 2000,                                           // Waiting time
      beforeSend: function() {                               // Before Ajax 
        $('#kai').append('<div id="load">Loading</div>');      // Load message
      },
      complete: function() {                                  // Once finished
        $('#load').remove();                                  // Clear message
      },
      success: function(data) {
                                 // Show content
        $('#summernote').code(data);
      },
      error: function() {                                     // Show error msg 
       $('#kai').html('<div class="container">error try again.</div>');
      }
    }); 


    $.ajax({
    type: "POST",                                            // GET or POST
    url: "hello.php", 
    data: details,                                          // Path to file
   // timeout: 2000,                                           // Waiting time
    beforeSend: function() {                               // Before Ajax 
      $('#kai').append('<div id="load">Loading</div>');      // Load message
    },
    complete: function() {                                  // Once finished
      $('#load').remove();                                  // Clear message
    },
    success: function(data) {
     var skrr =  $('#kai').val();
                               // Show content
      $('#kai').html((data + skrr)).fadeIn(10000);
    },
    error: function() {                                     // Show error msg 
     $('#kai').html('<div class="container">error try again.</div>');
    }
  });`                                                                                                                                                                                                                                                                    */

</script>