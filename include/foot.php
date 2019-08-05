<!-- footer section -->
<section class="footer-agileits" style="padding-bottom: 2px;display: block" >
	<div class="container">
		<div class="col-lg-3 col-md-3 col-sm-6">
			<h3>More Info</h3>
			<ul class="info-links">
				<li><a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i> About Us</a></li>
				<li><a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Contact Us</a></li>
				
			</ul>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6">
			<h3>Our Links</h3>
			<ul class="footer-links">
				<li><a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Our Services</a></li>
				<li><a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Our Work</a></li>
				
			</ul>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6">
			<h3>Contact Info</h3>
			<div class="contact-info">
				<div class="address">	
					<i class="glyphicon glyphicon-globe"></i>
					<p class="p3">111 Nwaniba Road, Uyo</p>
					<p class="p4">AkwaIbom, Nigeria</p>
				</div>
				<div class="phone">
					<i class="glyphicon glyphicon-phone-alt"></i>
					<p class="p3">+234 8105605545</p>
					
				</div>
				
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6">
			<h3>Subscribe Us</h3>
			<div class="subscribe">
				<form action="#" method="post">
					<div class="form-group">
						<input type="email" name="email2" class="form-control" id="inputEmail1" placeholder="Email">
					</div>
					<div class="form-group">
						<input type="text" name="user" class="form-control" id="text1" placeholder="Your Name">
					</div>
					<div class="form-group">
						<button type="submit" class="btn-outline">Subscribe</button>
					</div>
				</form>
			</div>	
			
		</div>
		<div class="clearfix"></div>
		<hr>
		<p class="copyright">© 2017 All Rights Reserved | Design by <a href="http://facebook.com/nwabueze121" target="_blank">Nwabueze Miracle</a></p>
	</div>
</section>

<!-- js files -->
<script src="js/jquery.min.js"></script>
<script src="who/js/bootstrap/bootstrap.min.js"></script>
<script src="js/SmoothScroll.min.js"></script>
<script src="js/index.js"></script>
<script src="js/top.js"></script> 
<script src="js/bgfader.js"></script>
<script>
var myBgFader = $('.header').bgfader([
  'images/banner1-1.jpg',
  'images/banner1-2.jpg',
  'images/banner1-3.jpg',
  'images/banner1-4.jpg',
], {
  'timeout': 2000,
  'speed': 3000,
  'opacity': 0.4
})

myBgFader.start()
</script>

<script>


///////////////////////////////////////////////////////////////////////////


$("#baby").click(function (event){
      event.preventDefault();
      var password = $('#password').val();
      var email = $('#email').val();
       
         var letters = /^[a-zA-Z]+$/;
          var phonevali = /^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/gm;


  if (password=="" || password.length < 4 ) {
            $('#error').html(errorme(" Sorry your password must at least be 4 characters") );
            $('#password')[0].focus();

     } else if (emailvali(email)) {
          $('#error').html(errorme(" Your email is either empty or has a wrong format. Please use an authentic email ") );
          $('#email')[0].focus();

     }else{
        //alert(real);
        var details = $('#hello').serialize();
        $.ajax({

        type: "POST",                                            // GET or POST
        url: "who/include/runthings.php", 
        data: details,                                          // Path to file
       // timeout: 2000,                                           // Waiting time
        beforeSend: function() {                               // Before Ajax 
          $('#shayo').text(' PROCESSING ... '); 
         $("#baby").attr("disabled", true);
           $('#error').html(' ');     // Load message
        },
        complete: function() {                                  // Once finished
         $('#shayo').text(' '); 
         $("#baby").removeAttr("disabled");                             // Clear message
        },
        success: function(data) {
          var me = data;
              if (me == 'admin') {
                document.getElementById("hello").reset();
               $('#error').html(errorme("Your Login Was Succesful. ")).fadeIn(10000);
               setTimeout('window.location.href = "who/admin/"',1000);
               }else if (me == 'staff') {
                document.getElementById("hello").reset();
               $('#error').html(errorme("Your Login Was Succesful. ")).fadeIn(10000);
               setTimeout('window.location.href = "who/index.php"',1000);
               }else{
                $('#error').html(errorme(data)).fadeIn(2000);
               }
        },
        error: function() {                                     // Show error msg 
         $('#error').html(errorme(" Error, Kindly Check Your Internet "));
        }
  });
    
     } //End Of Else


}); //End Of Onclick


$("#brymo").click(function (event){
      event.preventDefault();
      var tracker = $('#tracker').val();
       
         var letters = /^[a-zA-Z]+$/;
          var phonevali = /^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/gm;


  if (tracker==" " || tracker.length < 4 ) {
            $('#showerror').html(errorme(" Sorry your tracking code is incomplete") );
            $('#tracker')[0].focus();

     }else{
        //alert(real);
     	
        $.ajax({

        type: "POST",                                            // GET or POST
        url: "who/include/runthings.php?gethigh="+tracker,        // Waiting time
        beforeSend: function() {                               // Before Ajax 
          $('#alone').text(' PROCESSING ... '); 
         $("#brymo").attr("disabled", true);
           $('#showerror').html(' ');     // Load message
        },
        complete: function() {                                  // Once finished
         $('#alone').text(' '); 
         $("#brymo").removeAttr("disabled");                         // Clear message
        },
        success: function(data) {
          var me = data;
              if (me == 'No') {
                document.getElementById("were").reset();
               $('#showerror').html(errorme("Your Mail With the Tracking Code --:  <b>"+tracker+"</b>  Couldn't be found , Please Try again With a real code")).fadeIn(10000);
               
               }else{
                $('#showerror').html(errorme(data)).fadeIn(2000);
                setTimeout(function(){
                	window.location.href = "process.php?gethigh="+tracker;
                },3000);
                
               }
        },
        error: function() {                                    // Show error msg 
         $('#showerror').html(errorme(" Error, Kindly Check Your Internet "));
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
<!-- /js files -->
</body>
</html>
		