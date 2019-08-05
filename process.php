
<?php 

include'who/include/runthings.php';
if (isset($_GET['gethigh'])) {
	$code=clean($_GET['gethigh']);
	if (selectparcel('mail','tracking_code',$code)){ ?>

		<?php include'include/head.php'; ?>
		<?php include'include/banner.html'; ?>

		<!-- tracking section -->

		<section class="shipment-w3ls" >
			<div class="container">
				<i class="fa fa-braille" aria-hidden="true"></i>
				<h3 class="text-center wthree w3-agileits agileits-w3layouts agile w3-agile">MAIL TRACKING REPORT</h3>
				<?php subject($code) ?>
			</div>
			<div class="container">
				<div class="content-w3ls" style="overflow: scroll" >	
					<?php showtrack($code); ?>
					
						
							
							
				</div>
			</div>	
		</section>	

		 
		<!-- /tracking section -->

		<!-- /transit section -->
		<!-- footer section -->
		<?php include'include/foot.php'; ?>


			<?php 
			}else{
					header("location:index.php");
				}
}else{
	header("location:index.php");
}
?>

