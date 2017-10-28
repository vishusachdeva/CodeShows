<html>
    <head>
        <title>
            <?php echo($title); ?>
        </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="utf-8"/>
		<meta name="keywords" content="Coding,MNIT,DBMS" />
		<script type="application/x-javascript">
			addEventListener("load", function () {
				setTimeout(hideURLbar, 0);
			}, false);

			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
		<link href="<?php echo CSS_PATH.'darkbox.css'; ?>" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo CSS_PATH.'owl.carousel.css'; ?>" rel="stylesheet" type="text/css" media="all">
		<link href="<?php echo CSS_PATH.'wimmViewer.css'; ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS_PATH.'bootstrap.css'; ?>" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo CSS_PATH.'style.css'; ?>" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo CSS_PATH.'font-awesome.css'; ?>" rel="stylesheet">
		<link href="<?php echo CSS_PATH.'w3.css'; ?>" rel="stylesheet">
		<link href="<?php echo CSS_PATH.'style2.css'; ?>" rel="stylesheet">

		<!-- //for bootstrap working -->
		<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
		<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
        <script src="<?php echo JS_PATH.'validation.js'; ?>" ></script>
        <script src="<?php echo JS_PATH.'tab_switch.js'; ?>" ></script>
        <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
        <link rel="manifest" href="/favicon/manifest.json">
        <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">
    </head>
    <body>
		<div class="header" id="home">
			<div class="banner_header_top_wthree">
				<div class="agileits-logo">
					<h1><a href="<?php echo(generate_link('main', 'home')); ?>"><i class="fa fa-linode" aria-hidden="true"></i> Codeshows</a></h1>
				</div>
				<div class="header-top_agileits">
					<div class="container">
						<nav class="navbar navbar-default">
							<div class="navbar-header navbar-left">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
								<nav class="link-effect-2" id="link-effect-2">
									<ul class="nav navbar-nav">
										<li class="active"><a href="<?php echo(generate_link('main', 'home')); ?>"><span data-hover="Home">Home</span></a></li>
										<li><a href="<?php echo(generate_link('problem','all'));?>"><span data-hover="Practice">Practice</span></a></li>
										<li><a href="<?php echo(generate_link('contest','all'));?>"><span data-hover="Compete">Compete</span></a></li>
										<?php if (isset($type)) { ?><li><a href="
										<?php
											if (isset($type) && $type==1) echo(generate_link('asg','all'));
											else echo(generate_link('asg','builder'));
										?>
										"><span data-hover="Assignment">Assignment</span></a></li>
										<?php } ?>
										<li><a href="<?php echo(generate_link('main', 'contact')); ?>"><span data-hover="Contact">Contact</span></a></li>
									</ul>
								</nav>
								<div class="w3_agile_phone">
									<?php
										if(!isset($user_id) and empty($user_id)) { ?>
											<span class="w3-button w3-hover-red w3-text-white w3-round w3-small w3-ripple" style="margin-top:-1%" onclick="document.getElementById('login_form').style.display='block'" id='login_button'><b>LOGIN</b></span>
											<span class="w3-button w3-hover-red w3-text-white w3-round w3-small w3-ripple" style="margin-top:-1%" onclick="location.href='<?php echo(generate_link('user', 'signup')); ?>'"><b>SIGNUP</b></span>
											<div class="w3-modal w3-animate-opacity" id='login_form'>
												<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
														<div class="w3-center"><br>
															<span onclick="document.getElementById('login_form').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
															<h1><b>WELCOME ABROAD</b></h1>
														</div>
														<form class="w3-container" method='post' action='<?php echo(generate_link('user', 'login')); ?>'>
															<div class="w3-section">
															  <label><b>Email ID</b></label>
															  <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Enter Email" name="email" required>
															  <label><b>Password</b></label>
															  <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
															  <button class="w3-btn w3-block w3-green w3-section w3-padding w3-hover-red w3-ripple" type="submit"><i class="fa fa-sign-in"></i> Login</button>
															  <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
															</div>
														</form>
														<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
															<button onclick="document.getElementById('login_form').style.display='none'" type="button" class="w3-left w3-button w3-red">Cancel</button>
															<span class="w3-right w3-padding w3-hide-small"><a href="<?php echo(generate_link('user','load_forgot_password_page'))?>">Forgot password?</a></span>
														</div>
												</div>
											</div>
											<script>
												var modal = document.getElementById('login_form');
												window.onclick = function(event) {
												  if (event.target == modal) {
													modal.style.display = "none";
												  }
												}
											</script>
										<?php } else { ?>
											<div class="w3-dropdown-hover">
												<span class="w3-button w3-hover-black w3-black w3-text-white w3-small w3-ripple" style="margin-top:-7px"><b><i class="glyphicon glyphicon-user"></i> <?php echo($username); ?> <b class="caret"></b></b></span>
												<div class="w3-dropdown-content w3-bar-block w3-border">
													<a href="#" class="w3-bar-item w3-button w3-hover-blue">Profile</a>
													<a href="#" class="w3-bar-item w3-button w3-hover-blue">Account</a>
													<a href="<?php echo(generate_link('user', 'logout')); ?>" class="w3-bar-item w3-button w3-hover-blue fa fa-sign-out"> LogOut</a>
												</div>
										<?php }
									?>
								</div>
							</div>

						</nav>

					</div>
				</div>
			</div>
		</div>
	</div>