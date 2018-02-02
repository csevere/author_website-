<?php
	date_default_timezone_set('America/New_York');
	include 'connect.php'; 
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Dasist Winter</title>
		<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
		<!--build:css css/styles.min.css-->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/styles.css">
		<!--endbuild-->
		<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:700|Lato:700|Poppins|Raleway:700|Righteous|Coming+Soon|Short+Stack|Walter+Turncoat|Sedgwick+Ave+Display" rel="stylesheet">
		<!-- <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> -->
	</head>

	<body class="guestbook">
		<!-- 	NAVBAR -->
		<nav class="navbar navbar-expand-md">
			<div class="container">
				<img src="img/logo.png" width="50" height="50" alt="">
				<a href="index.php" class="navbar-brand">Dasist Winter</a>
				<button class="navbar-toggler" data-toggle="collapse" data-target="#navNavbar"><span class="icon"><i class="fa fa-bars" aria-hidden="true"></i></span></button>
				<div class="collapse navbar-collapse" id="navNavbar">
					<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a href="index.php#about" class="nav-link">About</a>
							</li>
							<li class="nav-item">
								<a href="index.php#characters" class="nav-link">Characters</a>
							</li>
							<li class="nav-item">
								<a href="index.php#read" class="nav-link">Read</a>
							</li>
							<li class="nav-item">
								<a href="index.php#merch" class="nav-link">Merch</a>
							</li>
							<!-- <li class="nav-item">
								<a href="blog" class="nav-link">Blog</a>
							</li> -->
							<li class="nav-item">
								<a href="index.php#donate" class="nav-link">Donate</a>
							</li>
							<li class="nav-item active">
								<a href="guest.php" class="nav-link">Guest Book</a>
							</li>
						</ul>
				</div>
			</div>
    </nav>

    <div class="container my-5">
      <div class="row">
        <div class="col-sm-5">
          <h1 class="display-4 mlabel">Guest Book</h1>
        </div>
      </div>
		</div>           
    <!-- PHP START -->          
		<?php
			$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);
			$stmt = $pdo->query('SELECT * FROM comments
			ORDER BY cid DESC 
			LIMIT 11');

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				echo "
				<section class='messages mt-3'> 
					<div class='container'>
						<div class='row'>
							<label class='person col-sm-2 col-form-label'>".$row['name']." says...</label>
							<div class='input-group-lg d-flex flex-column col-sm-7 u-speechbox p-3'>
								".$row['message']." 
							</div>
							<div class='col-md-8 m-auto text-white' style='margin-left: 11em;'>".$row['date']."</div> 
						</div>
					</div>
				</section>
			";
		}	
		?>
		<!-- PHP END -->   

    <section id="guest" class="guest">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 guestform p-5 m-auto">
						<h3>Leave a Message!</h3>
						<p class="lead text-dark">
							Want to write a comment about the book or just say hi? Write it here. Appropriate messages only please. Thanks! 
						</p>
						<!-- PHP START -->
					<?php
						echo"
							<form action='guest.php' method='POST'>

								<div class='form-group row'>
									<label for='inputName' class='name col-sm-2 col-form-label'>Name</label>
									<div class='input-group-lg d-flex flex-column col-sm-8'>
										<input type='text' class='form-control' name='name'>
									</div>
								</div>

								<div class='form-group row'>
									<label for='inputEmail' class='email col-sm-2 col-form-label'>Email</label>
									<div class='input-group-lg d-flex flex-column col-sm-8'>
										<input type='email' class='form-control' name='email' placeholder='your email will not be displayed'>
									</div>
								</div>
							
								<div class='form-group row'>
									<label for='inputEmail' class='message col-sm-2 col-form-label'>Message</label>
									<div class='input-group-lg d-flex flex-column col-sm-8 speechbox'>
										<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
										<textarea class='form-control' rows = '5' name='message'></textarea>
									</div>
								</div>
							
								<div class='row'>
									<div class='col-sm-8 m-auto'>
											<input type='submit' name ='messageSubmit' value='Post Message' class='btn btn-block btn-lg'>
										</div>
								</div>
							</form>
						"
					?>
						<!-- PHP END -->
					</div>
					<div class="col-lg-3 align-self-center d-none d-lg-block">
						<img src="./img/logo.png" alt="" class="img-fluid">
					</div>
				</div>
			</div>
    </section>

		<footer class="footer">
			<div class="container">
				<div class="row d-flex flex-column no-gutters">
					<div class="footer-socialmedia mr-auto p-2">
            <a href="https://twitter.com/CWritewell"><i class="fa fa-twitter pr-3" aria-hidden="true"></i></a>
            <a href="https://www.instagram.com/severetstorm/"><i class="fa fa-instagram pr-3" aria-hidden="true"></i></a>
					</div>
					<div class="footer-links1 mr-auto p-2">
						For business inqueries or collaboration <i class="fa fa-arrow-right p-2" aria-hidden="true"></i> <a href="#">dasistwinter@gmail.com</a>
					</div>
					<div class="mr-auto rights p-2">
							<p>Please do not take any content from this website without permission.</p>
							<p>&copy; 2018 Artwork by <a href=https://twitter.com/ShawnAlleyneArt>Shawn Alleyne of Pyroglyphics Studio.</a> Colors: Tommy Shelton.</p>
							<p>&copy; 2018 Dasist Winter. All Rights Reserved.</p>
					</div>
				</div>
			</div>
    </footer>

		<!--build:js js/main.min.js -->
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
		<script src = "js/navbar-fixed.js"></script>
		<!-- endbuild -->
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="slick/slick.min.js"></script>

	</body>
</html>
