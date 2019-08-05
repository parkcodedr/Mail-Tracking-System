<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html> 
<html> 
<head>
<title>Online Mail Tracking System</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Courier Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<!-- css files -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- /css files -->
<!-- font files -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700italic,700,800,800italic' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Exo+2:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<!-- /font files -->
<!-- js files -->

<!-- /js files -->
</head>
<body>
<!-- navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.html"><img src="images/uniuyo.png" style="width: 60px; height: 45px"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="<?php  if(basename($_SERVER['PHP_SELF']) == 'index.php'){
					echo'active';
				}?>"><a href="index.php">Home</a></li>
				<li class="<?php  if(basename($_SERVER['PHP_SELF']) == 'about.php'){
					echo'active';
				}?>"><a href="about.php">About</a></li>
				<li class="<?php  if(basename($_SERVER['PHP_SELF']) == 'process.php'){
					echo'active';
				}?>"><a href="process.php">Process</a></li>

					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-lock" aria-hidden="true"></i> Track Mail<b class="caret"></b></a>
					<div class="dropdown-menu">
						<div class="login-w3ls">
							<h3>Enter Your Tracking Code</h3>
							<form  method="post" id="were">
								<input type="text" name="tracker" id="tracker" placeholder="Enter Tracking Code" required />
								<input type="submit" name="brymo" id="brymo" value="Continue">

								<div id="alone" ></div>
																<br>
								<div id="showerror"></div>
							</form>
						</div>
					</div>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-lock" aria-hidden="true"></i> Login<b class="caret"></b></a>
					<div class="dropdown-menu">
						<div class="login-w3ls">
							<h3>Login To Your Account</h3>
							<form  method="post" id="hello">
								<input type="hidden" class="form-control" id="waist" name="waist">
								<input type="text" id="email" name="email" placeholder="email" required />
								<input type="password" id="password" name='password' placeholder="Password" required>
								
								<input type="submit" name="baby" Id="baby" value="LOGIN">
								<div id="shayo" ></div>
																<br>
								<div id="error"></div>
							</form>
						</div>
					</div>
				</li>
			</ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<!-- navigation -->