		<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>CodeHack</title>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="<?= base_url('assets/public/css/bootstrap.min.css'); ?>"/>
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="<?= base_url('assets/public/css/font-awesome.min.css');?>">
		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="<?= base_url('assets/public/css/style.css');?>"/>
		
	    <!-- CK Editor -->
		<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- Header -->
		<header id="header" class="transparent-nav">
			<div class="container">
				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<?= anchor('user', 'CodeHack',['class'=>'white-text','id'=>'logoname']); ?>
					</div>
					<!-- /Logo -->

					<!-- Mobile toggle -->
					<button class="navbar-toggle">
						<span></span>
					</button>
					<!-- /Mobile toggle -->
				</div>

				<!-- Navigation -->
				<nav id="nav">
					<ul class="main-menu nav navbar-nav navbar-right">
						<li><?= anchor('user', 'Home');?></li>
						<li><?= anchor('user/about', 'About');?></li>
						<li><?= anchor('user/trendingnow', 'Trending Now');?></li>
						<li><?= anchor('user/contact', 'Contact');?></li>
					</ul>
				</nav>
				<!-- /Navigation -->
			</div>
		</header>
		<!-- /Header -->