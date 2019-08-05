

<div class="container-mail">



<!-- Start Mailbox -->
<div class="mailbox clearfix">
 
  <!-- Start Mailbox Menu -->
  <div class="mailbox-menu">
    <ul class="menu"> 
      <li><a href="#"><i class="fa fa-inbox"></i> All Messages</a></li> 
      <li><a href="#"> <span class="loadup"></span>  </a></li> 

       
    </ul> 
    
  </div>
  <!-- End Mailbox Menu -->

  <!-- Start Mailbox Container -->
  <div class="container-mailbox">

        <!-- Start Mailbox Inbox -->
        <div class="col-lg-3 col-md-4 padding-0" >
        <ul class="mailbox-inbox">

          <?php list_allmessages( $_SESSION['office']); ?>

        </ul>
        </div>
        <!-- End Mailbox Inbox -->

                <div class="chat col-lg-9 col-md-8 padding-0">

                  <!-- Start Title -->
                  <div class="title">
                    <h1><?php echo return_single_value('office_name', 'office', 'office_id', $_SESSION['office'])."'s office Message Box"; ?></h1>
                    
          
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
           echo "You currently Have no Unresponded Messages. Once you have a mail targeted to your office, It will be displayed right here.  ";
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
<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="js/bootstrap/bootstrap.min.js"></script>


<script type="text/javascript">

$(document).ready(function() {

$('.champ a').on('click', function(e) {
  e.preventDefault();
  var url = this.href;
  var $content = $('.loadup');

  $.ajax({
    type: "GET",                                          // GET or POST
    url: url,                                               // Path to file
    beforeSend: function() {                                // Before Ajax 
      $content.html('<div id="load">Loading ... </div>');      // Load message
    },
    complete: function() {                                  // Once finished
     $content.html(' ');                                  // Clear message
    },
    success: function(data) {                                // Show content
      $('.chat').html(data);
      setDataSource();
    },
    error: function() {                                    // Show error msg 
      $content.html('<div class="container">Please try again soon.</div>');
    }
  });

});
  
       
 });



</script>
